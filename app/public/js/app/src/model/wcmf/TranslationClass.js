/**
 * This file was generated by ChronosGenerator wcmf-1.0.16.0001 from model.uml.
 * Manual modifications should be placed inside the protected regions.
 */
define([
    "dojo/_base/declare",
    "app/js/model/meta/Node"
// PROTECTED REGION ID(app/public/js/model/types/app/src/model/wcmf/TranslationClass.js/Define) ENABLED START
// PROTECTED REGION END
], function(
    declare,
    Node
// PROTECTED REGION ID(app/public/js/model/types/app/src/model/wcmf/TranslationClass.js/Params) ENABLED START
// PROTECTED REGION END
) {
    var Translation = declare([Node
// PROTECTED REGION ID(app/public/js/model/types/app/src/model/wcmf/TranslationClass.js/Declare) ENABLED START
// PROTECTED REGION END
    ], {
        typeName: "app.src.model.wcmf.Translation",
        description: "Instances of this class are used to localize entity attributes. Each instance defines a translation of one attribute of one entity into one language.",
        isSortable: false,
        displayValues: ["objectid", "attribute", "language"],
        pkNames: ["id"],
        relationOrder: [],

        attributes: [{
            name: "id",
            type: "Integer",
            description: "",
            isEditable: false,
            inputType: "text",
            displayType: "text",
            validateType: "",
            validateDesc: "",
            tags: ["DATATYPE_IGNORE"],
            defaultValue: null,
            isReference: false,
            isTransient: false
        }, {
            name: "objectid",
            type: "String",
            description: "The object id of the object to which the translation belongs",
            isEditable: false,
            inputType: "text",
            displayType: "text",
            validateType: "",
            validateDesc: "",
            tags: ["DATATYPE_ATTRIBUTE"],
            defaultValue: null,
            isReference: false,
            isTransient: false
        }, {
            name: "attribute",
            type: "String",
            description: "The attribute of the object that is translated",
            isEditable: false,
            inputType: "text",
            displayType: "text",
            validateType: "",
            validateDesc: "",
            tags: ["DATATYPE_ATTRIBUTE"],
            defaultValue: null,
            isReference: false,
            isTransient: false
        }, {
            name: "translation",
            type: "String",
            description: "The translation",
            isEditable: false,
            inputType: "textarea",
            displayType: "text",
            validateType: "",
            validateDesc: "",
            tags: ["DATATYPE_ATTRIBUTE"],
            defaultValue: null,
            isReference: false,
            isTransient: false
        }, {
            name: "language",
            type: "String",
            description: "The language of the translation",
            isEditable: false,
            inputType: "text",
            displayType: "text",
            validateType: "",
            validateDesc: "",
            tags: ["DATATYPE_ATTRIBUTE"],
            defaultValue: null,
            isReference: false,
            isTransient: false
        }],

        relations: []

// PROTECTED REGION ID(app/public/js/model/types/app/src/model/wcmf/TranslationClass.js/Body) ENABLED START
        , listView: 'app/js/ui/data/widget/EntityListWidget'
        , detailView: 'app/js/ui/data/widget/EntityFormWidget'
// PROTECTED REGION END
    });
// PROTECTED REGION ID(app/public/js/model/types/app/src/model/wcmf/TranslationClass.js/Static) ENABLED START
// PROTECTED REGION END
    return Translation;
});
