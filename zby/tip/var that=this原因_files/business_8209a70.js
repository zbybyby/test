define("question:widget/js/business/business.js",function(n,e,i){function s(n){"undefined"==typeof window.CLIENT_WIN||window.CLIENT_WIN&&window.CLIENT_WIN.closed?(window.CLIENT_WIN=window.open(n,"clientwin","width=1150,height=680,status=no,resizable=yes"),(null==window.CLIENT_WIN||window.CLIENT_WIN.document.location.href!=n)&&(window.CLIENT_WIN=window.open(n,"clientwin","width=1150,height=680,status=no,resizable=yes"))):window.CLIENT_WIN.focus()}function t(n,e){o.get("/business/api/anyonline",{businessId:n},function(i){var t=!!i.data[n];t?(e.html('<i class="i-business-chat"></i>\u5411TA\u54a8\u8be2'),e.removeClass("disabled"),a.fire("login.check",{isLogin:function(){e.click(function(e){try{if(e.preventDefault(),F.context("user").isBusiness)return void u.alert("\u4e3a\u4fdd\u8bc1\u516c\u6b63\u6027\uff0c\u60a8\u4e0d\u80fd\u5bf9\u673a\u6784\u8fdb\u884c\u54a8\u8be2\uff08\u5305\u62ec\u60a8\u7684\u673a\u6784\uff09");c.send({module:"question",page:"question",area:"hangjia-chat-btn",action:"goChat",isOnline:1}),s("/business/client?businessId="+n)}catch(e){"undefined"!=typeof alog&&alog("exception.fire","catch",{msg:e.message,path:"question:widget/js/business/business.js",method:"",ln:60})}})},noLogin:function(){e.click(function(e){try{e.preventDefault(),a.fire("login.log",{onLoginSuccess:function(){s("/business/client?businessId="+n)}})}catch(e){"undefined"!=typeof alog&&alog("exception.fire","catch",{msg:e.message,path:"question:widget/js/business/business.js",method:"",ln:70})}})}}),l||(c.send({module:"question",page:"question-hangjia",area:"hangjia-chat-btn",action:"pv",isOnline:1}),l=!0)):(e.html('<i class="i-business-chat"></i>\u7ed9TA\u7559\u8a00'),a.fire("login.check",{isLogin:function(){e.click(function(e){try{if(e.preventDefault(),F.context("user").isBusiness)return void u.alert("\u4e3a\u4fdd\u8bc1\u516c\u6b63\u6027\uff0c\u60a8\u4e0d\u80fd\u5bf9\u673a\u6784\u8fdb\u884c\u54a8\u8be2\uff08\u5305\u62ec\u60a8\u7684\u673a\u6784\uff09");c.send({module:"question",page:"question",area:"hangjia-chat-btn",action:"goChat",isOnline:0}),s("/business/client?businessId="+n)}catch(e){"undefined"!=typeof alog&&alog("exception.fire","catch",{msg:e.message,path:"question:widget/js/business/business.js",method:"",ln:108})}})},noLogin:function(){e.click(function(e){try{e.preventDefault(),a.fire("login.log",{onLoginSuccess:function(){s("/business/client?businessId="+n)}})}catch(e){"undefined"!=typeof alog&&alog("exception.fire","catch",{msg:e.message,path:"question:widget/js/business/business.js",method:"",ln:118})}})}}),l||(c.send({module:"question",page:"question",action:"pv",area:"hangjia-chat-btn",isOnline:0}),l=!0))},"json")}var o=n("common:widget/js/util/tangram/tangram.js"),a=n("common:widget/js/util/event/event.js"),c=n("common:widget/js/util/log/log.js"),u=n("common:widget/js/ui/dialog/dialog.js"),l=!1;window.CLIENT_WIN,i.exports={checkOnline:t}});