﻿CKEDITOR.dialog.add("simpleimageDialog",function(e){function h(a){return/data\:image/.test(a)}var f,d,g;d=!1;g=CKEDITOR.config.simpleImageBase64allowed||!1;return{allowedContent:"img[src,alt,width,height]",title:"Insert Image",minWidth:550,minHeight:100,resizable:CKEDITOR.DIALOG_RESIZE_NONE,contents:[{id:"SimpleImage",label:"Details",elements:[{type:"text",label:"Source",id:"edp-src",validate:CKEDITOR.dialog.validate.notEmpty(g?"Source cannot be empty.":"Source can neither be empty nor have Base64 format. Type an external url."),
setup:function(a){a.getAttribute("src")&&(a.getAttribute("width")&&a.getAttribute("height")&&(d=!0),this.setValue(a.getAttribute("src")))},commit:function(a){a.setAttribute("src",this.getValue())},onChange:function(){if(h(this.getValue()))if(g)if(d)d=!1;else{var a=new Image,b=this.getDialog();a.onload=function(a){a&&(f=this.width/this.height,b.setValueOf("Dimensions","edp-width",this.width),b.setValueOf("Dimensions","edp-height",this.height))};a.src=this.getValue()}else this.setValue("")}},{type:"text",
label:"Image Description",id:"edp-text-description",setup:function(a){a.getAttribute("alt")&&this.setValue(a.getAttribute("alt"))},commit:function(a){this.getValue()&&a.setAttribute("alt",this.getValue())}}]},{id:"Dimensions",label:"Dimensions (in pixels)",elements:[{type:"text",label:"Width",id:"edp-width",setup:function(a){a.getAttribute("width")&&this.setValue(a.getAttribute("width"))},commit:function(a){this.getValue()&&a.setAttribute("width",this.getValue())},onKeyUp:function(){var a=this.getDialog(),
b=a.getValueOf("Dimensions","edp-width"),d=a.getValueOf("Dimensions","edp-height"),c=1/f*this.getValue();isNaN(c)||(c=c.toFixed(1),b&&(d&&c!=d)&&a.setValueOf("Dimensions","edp-height",c))}},{type:"text",label:"Height",id:"edp-height",setup:function(a){a.getAttribute("height")&&this.setValue(a.getAttribute("height"))},commit:function(a){this.getValue()&&a.setAttribute("height",this.getValue())},onKeyUp:function(){var a=this.getDialog(),b=a.getValueOf("Dimensions","edp-width"),d=a.getValueOf("Dimensions",
"edp-height"),c=f*this.getValue();isNaN(c)||(c=c.toFixed(1),b&&(d&&c!=b)&&a.setValueOf("Dimensions","edp-width",c))}}]}],onShow:function(){var a=e.getSelection().getStartElement(),b;a&&(b=a.getAscendant("img",!0));!b||"img"!=b.getName()?(b=e.document.createElement("img"),this.insertMode=!0):this.insertMode=!1;this.element=b;this.setupContent(this.element)},onOk:function(){this.commitContent(this.element);this.insertMode&&e.insertElement(this.element)}}});