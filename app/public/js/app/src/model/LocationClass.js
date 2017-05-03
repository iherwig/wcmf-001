/**
 * This file was generated by ChronosGenerator wcmf-1.0.15.0001 from model.uml.
 * Manual modifications should be placed inside the protected regions.
 */
define([
    "dojo/_base/declare",
    "app/js/model/meta/Node"
// PROTECTED REGION ID(app/public/js/model/types/app/src/model/LocationClass.js/Define) ENABLED START
// PROTECTED REGION END
], function(
    declare,
    Node
// PROTECTED REGION ID(app/public/js/model/types/app/src/model/LocationClass.js/Params) ENABLED START
// PROTECTED REGION END
) {
    var Location = declare([Node
// PROTECTED REGION ID(app/public/js/model/types/app/src/model/LocationClass.js/Declare) ENABLED START
// PROTECTED REGION END
    ], {
        typeName: "app.src.model.Location",
        description: "",
        isSortable: true,
        displayValues: ["name", "category", "user"],
        pkNames: ["id"],
        relationOrder: [],

        attributes: [{
            name: "id",
            type: "",
            description: "",
            isEditable: false,
            inputType: "text",
            displayType: "text",
            validateType: "",
            validateDesc: "",
            tags: ["DATATYPE_IGNORE"],
            defaultValue: null,
            isReference: false
        }, {
            name: "name",
            type: "String",
            description: "",
            isEditable: true,
            inputType: "text",
            displayType: "text",
            validateType: "",
            validateDesc: "",
            tags: ["DATATYPE_ATTRIBUTE"],
            defaultValue: null,
            isReference: false
        }, {
            name: "category",
            type: "String",
            description: "",
            isEditable: true,
            inputType: "select:{\"list\":{\"type\":\"node\",\"types\":[\"Category\"]}}",
            displayType: "text",
            validateType: "",
            validateDesc: "",
            tags: ["DATATYPE_ATTRIBUTE"],
            defaultValue: null,
            isReference: false
        }, {
            name: "address",
            type: "String",
            description: "",
            isEditable: true,
            inputType: "textarea",
            displayType: "text",
            validateType: "",
            validateDesc: "",
            tags: ["DATATYPE_ATTRIBUTE"],
            defaultValue: null,
            isReference: false
        }, {
            name: "notes",
            type: "String",
            description: "",
            isEditable: true,
            inputType: "ckeditor:{\"toolbarSet\":\"wcmf\"}",
            displayType: "text",
            validateType: "",
            validateDesc: "",
            tags: ["DATATYPE_ATTRIBUTE"],
            defaultValue: null,
            isReference: false
        }, {
            name: "user",
            type: "String",
            description: "",
            isEditable: true,
            inputType: "select:{\"list\":{\"type\":\"node\",\"types\":[\"User\"]}}",
            displayType: "text",
            validateType: "",
            validateDesc: "",
            tags: ["DATATYPE_ATTRIBUTE"],
            defaultValue: null,
            isReference: false
        }, {
            name: "created",
            type: "Date",
            description: "",
            isEditable: false,
            inputType: "text",
            displayType: "text",
            validateType: "",
            validateDesc: "",
            tags: ["DATATYPE_ATTRIBUTE", "GROUP_INTERNAL"],
            defaultValue: null,
            isReference: false
        }, {
            name: "creator",
            type: "String",
            description: "",
            isEditable: false,
            inputType: "text",
            displayType: "text",
            validateType: "",
            validateDesc: "",
            tags: ["DATATYPE_ATTRIBUTE", "GROUP_INTERNAL"],
            defaultValue: null,
            isReference: false
        }, {
            name: "modified",
            type: "Date",
            description: "",
            isEditable: false,
            inputType: "text",
            displayType: "text",
            validateType: "",
            validateDesc: "",
            tags: ["DATATYPE_ATTRIBUTE", "GROUP_INTERNAL"],
            defaultValue: null,
            isReference: false
        }, {
            name: "last_editor",
            type: "String",
            description: "",
            isEditable: false,
            inputType: "text",
            displayType: "text",
            validateType: "",
            validateDesc: "",
            tags: ["DATATYPE_ATTRIBUTE", "GROUP_INTERNAL"],
            defaultValue: null,
            isReference: false
        }],

        relations: [{
            name: "Rating",
            type: "Rating",
            fkName: "fk_rating_id",
            aggregationKind: "composite",
            maxMultiplicity: "unbounded",
            thisEndName: "Location",
            isSortable: false,
            relationType: "child"
        }, {
            name: "Image",
            type: "Image",
            fkName: "fk_image_id",
            aggregationKind: "composite",
            maxMultiplicity: "unbounded",
            thisEndName: "Location",
            isSortable: true,
            relationType: "child"
        }]

// PROTECTED REGION ID(app/public/js/model/types/app/src/model/LocationClass.js/Body) ENABLED START
        , listView: 'app/js/ui/data/widget/EntityListWidget'
        , detailView: 'app/js/ui/data/widget/EntityFormWidget'
// PROTECTED REGION END
    });
// PROTECTED REGION ID(app/public/js/model/types/app/src/model/LocationClass.js/Static) ENABLED START
// PROTECTED REGION END
    return Location;
});