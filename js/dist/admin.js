(()=>{var e={n:o=>{var t=o&&o.__esModule?()=>o.default:()=>o;return e.d(t,{a:t}),t},d:(o,t)=>{for(var a in t)e.o(t,a)&&!e.o(o,a)&&Object.defineProperty(o,a,{enumerable:!0,get:t[a]})},o:(e,o)=>Object.prototype.hasOwnProperty.call(e,o),r:e=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})}},o={};(()=>{"use strict";e.r(o);const t=flarum.core.compat["admin/app"];var a=e.n(t);const r=flarum.extensions["fof-oauth"];a().initializers.add("ianm/oauth-amazon",(function(){a().extensionData.for("ianm-oauth-amazon").registerPage(r.ConfigureWithOAuthPage)}))})(),module.exports=o})();
//# sourceMappingURL=admin.js.map