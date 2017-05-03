/**
 * This file was generated by ChronosGenerator wcmf-1.0.15.0001 from model.uml.
 * Manual modifications should be placed inside the protected regions.
 */
define([
    "dojo/_base/declare",
    "app/js/model/meta/Node"
// PROTECTED REGION ID(app/public/js/model/types/app/src/model/wcmf/LockClass.js/Define) ENABLED START
// PROTECTED REGION END
], function(
    declare,
    Node
// PROTECTED REGION ID(app/public/js/model/types/app/src/model/wcmf/LockClass.js/Params) ENABLED START
// PROTECTED REGION END
) {
    var Lock = declare([Node
// PROTECTED REGION ID(app/public/js/model/types/app/src/model/wcmf/LockClass.js/Declare) ENABLED START
// PROTECTED REGION END
    ], {
        typeName: "app.src.model.wcmf.Lock",
        description: "",
        isSortable: false,
        displayValues: ["objectid", "login", "created"],
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
            name: "objectid",
            type: "String",
            description: "",
            isEditable: false,
            inputType: "text",
            displayType: "text",
            validateType: "",
            validateDesc: "",
            tags: ["DATATYPE_ATTRIBUTE"],
            defaultValue: null,
            isReference: false
        }, {
            name: "login",
            type: "String",
            description: "",
            isEditable: false,
            inputType: "text",
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
            inputType: "date",
            displayType: "text",
            validateType: "",
            validateDesc: "",
            tags: ["DATATYPE_ATTRIBUTE"],
            defaultValue: null,
            isReference: false
        }],

        relations: []

// PROTECTED REGION ID(app/public/js/model/types/app/src/model/wcmf/LockClass.js/Body) ENABLED START
        , listView: 'app/js/ui/data/widget/EntityListWidget'
        , detailView: 'app/js/ui/data/widget/EntityFormWidget'
// PROTECTED REGION END
    });
// PROTECTED REGION ID(app/public/js/model/types/app/src/model/wcmf/LockClass.js/Static) ENABLED START
// PROTECTED REGION END
    return Lock;
});