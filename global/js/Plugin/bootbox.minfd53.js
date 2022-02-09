/*!
 * Remark Material (http://getbootstrapadmin.com/remark)
 * Copyright 2017 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */

!function(global,factory){if("function"==typeof define&&define.amd)define("/Plugin/bootbox",["exports","jquery","Plugin"],factory);else if("undefined"!=typeof exports)factory(exports,require("jquery"),require("Plugin"));else{var mod={exports:{}};factory(mod.exports,global.jQuery,global.Plugin),global.PluginBootbox=mod.exports}}(this,function(exports,_jquery,_Plugin2){"use strict";Object.defineProperty(exports,"__esModule",{value:!0});var _jquery2=babelHelpers.interopRequireDefault(_jquery),_Plugin3=babelHelpers.interopRequireDefault(_Plugin2),Bootbox=function(_Plugin){function Bootbox(){return babelHelpers.classCallCheck(this,Bootbox),babelHelpers.possibleConstructorReturn(this,(Bootbox.__proto__||Object.getPrototypeOf(Bootbox)).apply(this,arguments))}return babelHelpers.inherits(Bootbox,_Plugin),babelHelpers.createClass(Bootbox,[{key:"getName",value:function(){return"bootbox"}},{key:"render",value:function(){this.$el.data("bootboxWrapApi",this)}},{key:"show",value:function(){if("undefined"!=typeof bootbox){var options=this.options;if(options.classname&&(options.className=options.classname),options.className&&(options.className=options.className+" modal-simple"),"string"==typeof options.callback&&_jquery2.default.isFunction(window[options.callback])&&(options.callback=window[options.callback]),options.type)switch(options.type){case"alert":bootbox.alert(options);break;case"confirm":bootbox.confirm(options);break;case"prompt":bootbox.prompt(options);break;default:bootbox.dialog(options)}else bootbox.dialog(options)}}}],[{key:"getDefaults",value:function(){return{message:"",className:"modal-simple"}}},{key:"api",value:function(){return"click|show"}}]),Bootbox}(_Plugin3.default);_Plugin3.default.register("bootbox",Bootbox),exports.default=Bootbox});