/**
 * This file was generated by ChronosGenerator wcmf-1.0.16.0001 from model.uml.
 * Manual modifications should be placed inside the protected regions.
 */
define([
    "dojo/_base/declare",
    "app/js/model/meta/Node"
// PROTECTED REGION ID(app/public/js/model/types/app/src/model/wcmf/LanguageClass.js/Define) ENABLED START
// PROTECTED REGION END
], function(
    declare,
    Node
// PROTECTED REGION ID(app/public/js/model/types/app/src/model/wcmf/LanguageClass.js/Params) ENABLED START
// PROTECTED REGION END
) {
    var Language = declare([Node
// PROTECTED REGION ID(app/public/js/model/types/app/src/model/wcmf/LanguageClass.js/Declare) ENABLED START
// PROTECTED REGION END
    ], {
        typeName: "app.src.model.wcmf.Language",
        description: "A language for which a translation of the model can be created. The code is arbitrary but it is recommended to use the ISO language codes (en, de, it, ...).",
        isSortable: false,
        displayValues: ["name"],
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
            isReference: false
        }, {
            name: "name",
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
            name: "code",
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
        }],

        relations: []

// PROTECTED REGION ID(app/public/js/model/types/app/src/model/wcmf/LanguageClass.js/Body) ENABLED START
        , listView: 'app/js/ui/data/widget/EntityListWidget'
        , detailView: 'app/js/ui/data/widget/EntityFormWidget'
// PROTECTED REGION END
    });
// PROTECTED REGION ID(app/public/js/model/types/app/src/model/wcmf/LanguageClass.js/Static) ENABLED START
// PROTECTED REGION END
    return Language;
});
