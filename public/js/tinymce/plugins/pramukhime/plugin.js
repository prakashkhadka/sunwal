/**
* @license
* PramukhIME TinyMCE Plugin v 4.0.0 - http://www.vishalon.net/PramukhIME/TinyMCEPlugin.aspx
* Copyright (c) 2005-2017 Vishal Monpara (http://www.vishalon.net)
* 
* License:
* Please read license.txt file for detailed license terms.
* 
* License Summary
*   Personal and Commercial use - Allowed (Except noted below)
*   Use in Software as a Service (SaaS), Distribution Application/Module/Add-on/Plugin, OEM - Not Allowed
*   Modify source code or any file? - Not Allowed
*   Hosting for sharing/distribution - Not Allowed
*/
tinymce.PluginManager.add("pramukhime",function(e,t){"use strict";var a=this;a.options=tinymce.extend({keyboards:[{js_file:"pramukhindic.js",kb_class_name:"PramukhIndic"}],languages:[],selected_value:"pramukhime:english",create_dedicated_pramukhime:!1,files_externally_loaded:!1,toggle_key:{key:120,ctrl:!1,alt:!1,title:"F9"}},e.getParam("pramukhime_options",{}));var n,i,s,o,r,l,g=tinymce.settings.language||"en",u=function(){if("undefined"!=typeof l){var e=l.getLanguage(),t=l.getLastLanguage(),i=e.kb+":"+e.language,s=t.kb+":"+t.language;if(n.value(i),n.menu)n.menu.items().each(function(e,t){e.getEl().getElementsByTagName("div")[0].innerHTML=e.value()===s?a.options.toggle_key.title:" "});else{var o="undefined"==typeof n.state?n._values:n.state.get("menu");tinymce.each(o,function(e,t){e.value===s?e.shortcut=a.options.toggle_key.title:e.shortcut=" "})}}},m=function(){if("undefined"!=typeof l){var e=l.getLanguage();i.disabled(!l.hasHelp());var t=i.getEl().firstChild,a=t.getElementsByTagName("i")[0];a.className="mce-ico mce-i-pramukhimehelp pi-"+e.kb+"-"+e.language+"-help"}},c=function(){if("undefined"!=typeof l){var e=l.getLanguage();s.disabled(!l.hasSettings());var t=s.getEl().firstChild,a=t.getElementsByTagName("i")[0];a.className="mce-ico mce-i-pramukhimesettings pi-"+e.kb+"-"+e.language+"-settings"}},d=function(){if("undefined"!=typeof l){var e=l.getLanguage(),t=r.getEl().firstChild,a=t.getElementsByTagName("i")[0];a.className="mce-ico mce-i-pramukhimeresetsettings pi-"+e.kb+"-"+e.language+"-resetsettings"}},p=function(){if("undefined"!=typeof l){var e=l.getLastLanguage(),t=o.getEl().firstChild,a=t.getElementsByTagName("i")[0];a.className="mce-ico mce-i-pramukhimetogglelanguage pi-"+e.kb+"-"+e.language}},h=0,k=function(){if(0===h)return void h++;l=a.options.create_dedicated_pramukhime?pramukhIME.createPramukhIME():pramukhIME,e.pramukhime=l;var t=function(){n&&u(),i&&m(),s&&c(),r&&d(),o&&p()};l.on("languagechange",t),l.setToggleKey(a.options.toggle_key.key,a.options.toggle_key.ctrl||!1,a.options.toggle_key.alt||!1);var g=[],k=a.options.languages.length>0;tinymce.each(a.options.keyboards,function(t){if("undefined"==typeof t.kb_class_name)return!0;var n=tinymce.DOM.win[t.kb_class_name],i=new n;if(l.addKeyboard(i),k)return!0;var s=i.getKeyboardName();tinymce.each(i.getLanguages(),function(n,i){a.options.languages.push({value:s+":"+n,text:e.editorManager.i18n.translate("pramukhime."+t.kb_class_name.toLowerCase()+"."+n)})})}),k||a.options.languages.push({value:"pramukhime:english",text:"English"}),g=a.options.languages,tinymce.each(g,function(e,t){e.shortcut=" "}),""!==a.options.selected_value?l.setLanguage(a.options.selected_value.split(":")[1],a.options.selected_value.split(":")[0]):t(),e.inline?l.enable([e.getElement()]):l.enable([e.getWin().frameElement])};if(a.options.files_externally_loaded)h+=1;else{var y=[],f=[],b="";if(b=t+"/js/pramukhime.js",tinymce.ScriptLoader.isDone(b)||y.push(b),tinymce.each(a.options.keyboards,function(e,a){"undefined"!=typeof e.js_file&&(b=t+"/js/"+e.js_file,tinymce.ScriptLoader.isDone(b)||y.push(b),f.push(t+"/js/"+e.kb_class_name.toLowerCase()+"_settings.js"),b=t+"/langs/"+(e.i18n_js_file||g+"_"+e.kb_class_name.toLowerCase())+".js",tinymce.ScriptLoader.isDone(b)||y.push(b),tinymce.DOM.loadCSS(t+"/css/"+e.kb_class_name.toLowerCase()+".css"))}),0!==y.length){var v=0,_=function(){},E=function(){v++,v===y.length&&(k(),tinymce.each(f,function(e,t){tinymce.ScriptLoader.load(e)}),tinymce.ScriptLoader.loadQueue(_))};tinymce.each(y,function(e,t){tinymce.ScriptLoader.load(e,E)}),tinymce.ScriptLoader.loadQueue(_)}else k()}e.on("postrender",k),e.addCommand("mcePramukhIMEHelp",function(){var a=l.getLanguage(),n=e.editorManager.i18n.translate,i=e.windowManager.open({title:"PramukhIME Help",bodyType:"tabpanel",padding:10,body:[{title:"Quick Typing Help",type:"container",style:"overflow:auto;",html:"<div>"+n("pramukhime."+a.kb+".help_quick_help1")+'</div><div><img src="'+t+"/img/"+a.kb+"-"+a.language+'.png" /></div><div>'+n("pramukhime."+a.kb+".help_quick_help2")+"</div>"},{title:"Detailed Typing Help",type:"container",html:'<iframe src="'+t+"/help/"+l.getHelp()+'"></iframe>'},{title:"About",type:"container",html:"<div>"+n("PramukhIME 4.0.0")+"<br /><br />"+n("TinyMCE Supported Version: 4.x")+"<br /><br />"+n("PramukhIME plugin is a platform independent web based typing plugin derived from PramukhIME")+"<br />"+n('javascript library (<a href="http://www.vishalon.net/PramukhIME/JavaScriptLibrary.aspx" target="_blank">http://www.vishalon.net/PramukhIME/JavaScriptLibrary.aspx</a>). It is developed by')+"<br />"+n('Vishal Monpara (<a href="http://www.vishalon.net" target="_blank">http://www.vishalon.net</a>). Please visit the website to get latest version of this')+"<br />"+n("plugin as well as other resources.")+"<br /><br />"+n("Copyright &copy; Vishal Monpara")+"<br /><br /></div><hr /><div>"+n("pramukhime."+a.kb+".help_about_kb")+"</div>"}],buttons:[{text:"Close",subtype:"primary",onclick:function(){i.close()}}]})}),e.addCommand("mcePramukhIMESettings",function(){var e=l.getLanguage(),t=tinymce.ui.Factory.create({type:"window",layout:"flex",pack:"center",align:"center",buttons:[{text:"Save",subtype:"primary",onclick:function(){l.setSettings(l.getKeyboard().getUpdatedSettings(t)),t.close()}},{text:"Close",name:"close",onclick:function(){t.close()}}],title:"pramukhime."+e.kb+".settings",items:{type:"form",padding:20,labelGap:30,spacing:10,items:l.getKeyboard().getSettingsItems()}}).renderTo().reflow()}),e.addCommand("mcePramukhIMEResetSettings",function(){e.windowManager.confirm("Are you sure you want to reset keyboard settings?",function(e){e&&l.resetSettings()})}),e.addCommand("mcePramukhIMEToggleLanguage",function(){l.toggleLanguage()}),e.addButton("pramukhimesettings",{title:"Change Keyboard Settings",cmd:"mcePramukhIMESettings",disabled:!0,onPostRender:function(){s=this,c()}}),e.addButton("pramukhimeresetsettings",{title:"Reset Keyboard Settings",cmd:"mcePramukhIMEResetSettings",onPostRender:function(){r=this,d()}}),e.addButton("pramukhimehelp",{title:"PramukhIME Typing Help",cmd:"mcePramukhIMEHelp",disabled:!0,onPostRender:function(){i=this,m()}}),e.addButton("pramukhimetogglelanguage",{title:"Last Selected Language",cmd:"mcePramukhIMEToggleLanguage",onPostRender:function(){o=this,p()}}),e.addButton("pramukhime",{type:"listbox",text:"PramukhIME",tooltip:"Select Language",values:a.options.languages,value:null,onselect:function(t){var a=t.control.value();e.pramukhime.setLanguage(a.split(":")[1],a.split(":")[0])},onPostRender:function(){n=this,u()}})});