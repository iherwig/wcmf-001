define([
    "require",
    "dojo/_base/declare",
    "dojo/_base/lang",
    "dojo/_base/config",
    "dojo/when",
    "dojo/topic",
    "../../ui/_include/_PageMixin",
    "../../ui/_include/_NotificationMixin",
    "../../ui/_include/widget/NavigationWidget",
    "../../ui/_include/widget/GridWidget",
    "../../ui/data/display/Renderer",
    "../../ui/data/input/widget/SelectBox",
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
    _Page,
    _Notification,
    NavigationWidget,
    GridWidget,
    Renderer,
    Select,
    Model,
    Store,
    HistoryStore,
    HistoryEntry,
    Edit,
    Dict,
    template
) {
    return declare([_Page, _Notification], {

        templateString: lang.replace(template, Dict.tplTranslate),
        contextRequire: require,
        title: Dict.translate('Home'),

        map: null,
        markers: [],
        category: null,

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
            // create map
            this.map = L.map('map').setZoom(13);
            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
                id: 'mapbox.streets',
                accessToken: config.app.mapAccessToken
            }).addTo(this.map);

            // category filter
            var inputType = 'select:{"list":{"type":"node","types":["Category"]}}';
            var categoryFilter = new Select({
                name: 'category',
                inputType: inputType
            }, this.categoryControl);
            categoryFilter.startup();
            categoryFilter.on('change', lang.hitch(this, function() {
                var item = categoryFilter.get('item');
                this.loadMarkers(item.value);
            }));

            // set location markers
            Store.getStore('Category', config.app.defaultLanguage).fetch().then(lang.hitch(this, function(items) {
                if (items.length > 0) {
                    var id = Model.getIdFromOid(items[0].oid);
                    this.loadMarkers(id);
                    categoryFilter.set('value', id);
                }
            }))

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
        },

        loadMarkers: function(category) {
            category = parseInt(category);
            if (category !== this.category) {
                // clear map
                for (var i=0, count=this.markers.length; i<count; i++) {
                    this.map.removeLayer(this.markers[i]);
                }

                // load markers
                this.category = category;
                var geocoder = new L.Control.Geocoder.Nominatim();
                this.markers = [];
                var type = 'Location';
                var route = this.router.getRoute('entity');
                var store = Store.getStore(type, config.app.defaultLanguage);
                store.setExtraParam('values', 'address');
                var filter = {};
                filter[type+'.category'] = category;
                store.filter(filter).forEach(lang.hitch(this, function(location) {
                    var address = location.address;
                    var id = Model.getIdFromOid(location.oid);
                    var pathParams = { type:type, id:id };
                    var url = route.assemble(pathParams);
                    geocoder.geocode(address, lang.hitch(this, function(results) {
                        var latLng = new L.LatLng(results[0].center.lat, results[0].center.lng);
                        var marker = new L.Marker(latLng);
                        marker.bindPopup(address.replace(/\n/g, "<br>")+'<br><a href="'+url+'">Edit</a>');
                        marker.addTo(this.map);
                        this.markers.push(marker);
                        var group = new L.featureGroup(this.markers);
                        this.map.fitBounds(group.getBounds().pad(0.5));
                    }));
                }));
            }
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
});