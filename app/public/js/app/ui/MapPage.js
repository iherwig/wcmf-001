define([
    "require",
    "dojo/_base/declare",
    "dojo/_base/lang",
    "dojo/_base/config",
    "dojo/when",
    "dojo/topic",
    "dojo/dom-construct",
    "../../ui/_include/_PageMixin",
    "../../ui/_include/_NotificationMixin",
    "../../ui/_include/widget/NavigationWidget",
    "../../ui/_include/widget/GridWidget",
    "../../ui/data/display/Renderer",
    "../../ui/data/input/widget/TextBox",
    "../../ui/data/input/widget/SelectBox",
    "../../ui/data/input/widget/CheckBox",
    "../../model/meta/Model",
    "../../persistence/Store",
    "../../persistence/HistoryStore",
    "../../ui/home/HistoryEntry",
    "../../action/Edit",
    "../../locale/Dictionary",
    "dojo/text!./template/MapPage.html",
    "leaflet/leaflet",
    "leaflet-geocoder/Control.Geocoder"
], function (
    require,
    declare,
    lang,
    config,
    when,
    topic,
    domConstruct,
    _Page,
    _Notification,
    NavigationWidget,
    GridWidget,
    Renderer,
    TextBox,
    Select,
    CheckBox,
    Model,
    Store,
    HistoryStore,
    HistoryEntry,
    Edit,
    Dict,
    template,
    L
) {
    var Page = declare([_Page, _Notification], {

        templateString: lang.replace(template, Dict.tplTranslate),
        contextRequire: require,
        title: Dict.translate('Home'),

        map: null,
        markers: [],
        category: null,
        categories: {},
        categoryMarkers: {},
        selectedCategoryMarkers: [],
        query: null,
        lastCallTS: null,

        constructor: function(params) {
            // register search result type if not done already
            if (!Model.isKnownType("HistoryEntry")) {
              Model.registerType(new HistoryEntry());
            }
            // get package locations
            var packageLocations = {};
            for(var i=0, count=config.packages.length; i<count; i++) {
                var curPackage = config.packages[i];
                packageLocations[curPackage.name] = curPackage.location;
            }
            // add leaflet css
            this.setCss(packageLocations['leaflet']+'/leaflet.css', 'all');
            this.setCss(packageLocations['leaflet-geocoder']+'/Control.Geocoder.css', 'all');
            this.setCss(packageLocations['leaflet-markers']+'/leaflet.awesome-markers.css', 'all');
        },

        postCreate: function() {
            this.inherited(arguments);

            // create widget
            this.buildForm();

            this.own(
                topic.subscribe("store-error", lang.hitch(this, function(error) {
                    this.showBackendError(error);
                }))
            );
        },

        buildForm: function() {
            // load leaflet plugins (require leaflet to be loaded)
            require([
                'leaflet-markers/leaflet.awesome-markers'
            ], lang.hitch(this, function() {
                // create map
                this.map = L.map('map').setZoom(13);
                L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
                    id: 'mapbox.streets',
                    accessToken: config.app.mapAccessToken
                }).addTo(this.map);

                // search field
                var searchField = new TextBox({
                    name: 'query',
                    inputType: 'text',
                    placeHolder: Dict.translate('Search')
                }, this.searchControl);
                searchField.startup();
                searchField.on('change', lang.hitch(this, function() {
                    var query = searchField.get('value');
                    this.loadMarkers(this.category, query);
                }));

                // category filter
                var inputType = 'select:{"list":{"type":"node","types":["Category"]}}';
                var categoryFilter = new Select({
                    name: 'category',
                    inputType: inputType
                }, this.categoryControl);
                categoryFilter.startup();
                categoryFilter.on('change', lang.hitch(this, function() {
                    var id = categoryFilter.get('item').value;
                    this.loadMarkers(this.categories[id]);
                }));

                // load categories and set default category
                var categoryStore = Store.getStore('Category', config.app.defaultLanguage);
                categoryStore.setExtraParam('values', 'id,name,icon,color');
                categoryStore.fetch().then(lang.hitch(this, function(items) {
                    for (var i=0, count=items.length; i<count; i++) {
                        var item = items[i];
                        this.categories[item.id] = item;
                    }
                    if (items.length > 0) {
                        var category = this.categories[items[0].id];
                        categoryFilter.set('value', category.id);
                    }
                }));

                // latest changes
                var renderOptions = { truncate: 50 };
                new GridWidget({
                    type: "HistoryEntry",
                    store: HistoryStore.getStore(),
                    height: 400,
                    columns: [{
                        label: Dict.translate("_displayValue"),
                        field: "_displayValue",
                        canEdit: false,
                        sortable: true,
                        renderCell: function(object, data, td, options) {
                            var typeClass = Model.getType(object["_type"]);
                            var displayValues = typeClass.displayValues;
                            for (var i=0, count=displayValues.length; i<count; i++) {
                                var displayValue = displayValues[i];
                                when(Renderer.render(object[displayValue],
                                    typeClass.getAttribute(displayValue), renderOptions), function(value) {
                                    if (value) {
                                        td.innerHTML += value+" ";
                                    }
                                });
                            }
                        }
                    }, {
                        label: Dict.translate("_type"),
                        field: "_type"
                    }, {
                        label: Dict.translate("created"),
                        field: "created"
                    }, {
                        label: Dict.translate("creator"),
                        field: "creator"
                    }, {
                        label: Dict.translate("modified"),
                        field: "modified"
                    }, {
                        label: Dict.translate("last_editor"),
                        field: "last_editor"
                    }],
                    actions: this.getGridActions(),
                    enabledFeatures: []
                }, this.gridNode);
            }));
        },

        loadMarkers: function(category, query) {
            var id = parseInt(category.id);
            if (this.category === null || id !== this.category.id || query !== this.query) {
                this.category = category;
                this.query = query;
                this.lastCallTS = Date.now();

                // clear map
                for (var i=0, count=this.markers.length; i<count; i++) {
                    this.map.removeLayer(this.markers[i]);
                }
                this.mapErrorNode.innerHTML = "";

                // load category markers
                this.categoryMarkers = {};
                this.categoryMarkersNode.innerHTML = "";
                var markerStore = Store.getStore('Marker', config.app.defaultLanguage);
                markerStore.setExtraParam('values', 'id,name,color');
                var markerFilter = new markerStore.Filter().eq('Marker.fk_category_id', category.id);
                markerStore.filter(markerFilter).fetch().then(lang.hitch(this, function(items) {
                    var itemMap = {};
                    for (var i=0, count=items.length; i<count; i++) {
                        var item = items[i];
                        this.categoryMarkers[item.id] = item;
                        itemMap[item.id] = item.name;
                    }
                    var markerCategoryControl = new CheckBox({
                        name: 'markerCategories',
                        inputType: 'checkbox:{"list":{"type":"fix","items":'+JSON.stringify(itemMap)+'}}'
                    }, this.categoryMarkersNode);
                    markerCategoryControl.startup();
                    markerCategoryControl.on('change', lang.hitch(this, function(value) {
                        this.selectedCategoryMarkers = value.split(',').filter(function(val) {
                            return val !== '';
                        });
                        this.loadMarkers(this.category, this.query);
                    }));

                    // load location markers
                    var geocoder = new L.Control.Geocoder.Nominatim();
                    this.markers = [];
                    var locationStore = Store.getStore('Location', config.app.defaultLanguage);
                    locationStore.setExtraParam('values', 'id,name,address,website,user,rating,marker,lat,lng');
                    var locationFilter = new locationStore.Filter().eq('Location.category', category.id).or(
                              new locationStore.Filter().ne('Location.archived', 1),
                              new locationStore.Filter().eq('Location.archived', null)
                    );
                    if (query) {
                        locationFilter = locationFilter.and(
                            new locationStore.Filter().match('Location.name', new RegExp('.*'+query+'.*', 'i'))
                        );
                    }
                    if (this.selectedCategoryMarkers.length > 0) {
                        locationFilter = locationFilter.and(
                            new locationStore.Filter()['in']('Location.marker', this.selectedCategoryMarkers.join(',')),
                            new locationStore.Filter().ne('Location.marker', null)
                        );
                    }
                    var localCallTS = this.lastCallTS;
                    locationStore.filter(locationFilter).fetch().then(lang.hitch(this, function(locations) {
                        this.statusNode.innerHTML = Dict.translate("%0% item(s)", ["0/"+locations.length]);
                        for (var i=0, count=locations.length; i<count; i++) {
                            var location = locations[i];
                            var coords = location.lat && location.lng ? {
                                lat: location.lat,
                                lng: location.lng
                            } : null;
                            if (coords) {
                                this.setMarker(category, location, coords.lat, coords.lng, localCallTS);
                                this.statusNode.innerHTML = Dict.translate("%0% item(s)", [this.markers.length+"/"+locations.length]);
                            }
                            else {
                                this.mapErrorNode.innerHTML +=
                                        Dict.translate("Error")+': <a href="'+this.getLocationUrl(location.id)+'">'+location.address+'</a><br>';
                            }
                        }
                    }));
                }));
            }
        },

        setMarker: function(category, location, lat, lng, ts) {
            if (ts < this.lastCallTS) {
                // skip markers from former call
                return;
            }
            var icon = L.AwesomeMarkers.icon({
                prefix: 'fa',
                icon: category.icon,
                markerColor: location.marker && this.categoryMarkers[location.marker] ? this.categoryMarkers[location.marker].color : 
                    (category.color ? category.color : 'white')
            });
            var ratingStr = '';
            var rating = location.rating;
            if (rating === parseFloat(rating)) {
              for (var i=1; i<=5; i++) {
                var star = rating >= i ? 'star' :
                        (rating >= i-0.5 ? 'star-half-o' : 'star-o');
                ratingStr += '<i class="fa fa-'+star+'" aria-hidden="true"></i>';
              }
            }
            var latLng = new L.LatLng(lat, lng);
            var marker = new L.Marker(latLng, {icon: icon});
            marker.bindPopup(
                    '<strong>'+location.name+'</strong><br>'+
                    ratingStr+'<br>'+
                    location.address.replace(/\n/g, '<br>')+
                    (location.website ? '<br><a href="'+location.website+'" target="_blank">'+location.website+'</a>' : '')+
                    '<br><a href="'+this.getLocationUrl(location.id)+'">'+Dict.translate('Edit')+'</a>'
            );
            marker.on('mouseover', function (e) {
                this.openPopup();
            });
            marker.addTo(this.map);
            this.markers.push(marker);
            var group = new L.featureGroup(this.markers);
            this.map.fitBounds(group.getBounds().pad(0.5));
        },

        getLocationUrl: function(id) {
            var route = this.router.getRoute('entity');
            var pathParams = { type:'Location', id:id };
            return route.assemble(pathParams);
        },

        getGridActions: function() {
            var editAction = new Edit({
                page: this,
                route: "entity"
            });
            return [editAction];
        },

        _navigateContent: function(e) {
            // prevent the page from navigating after submit
            e.preventDefault();

            var type = Model.getSimpleTypeName(config.app.rootTypes[0]);
            var route = this.router.getRoute("entityList");
            var pathParams = { type:type };
            var url = route.assemble(pathParams);
            this.pushState(url);
        },

        _navigateMedia: function(e) {
            // prevent the page from navigating after submit
            e.preventDefault();

            var route = this.router.getRoute("media");
            var url = route.assemble();
            window.open(url, '_blank', 'width=800,height=700');
        }
    });
    return Page;
});