(this.webpackJsonptable=this.webpackJsonptable||[]).push([[0],{11:function(t,e,n){},12:function(t,e,n){},15:function(t,e,n){"use strict";n.r(e);var r=n(1),c=n.n(r),a=n(6),s=n.n(a),i=(n(11),n(2)),o=(n(12),n(3)),u=n.n(o),l=n(4);function d(){return j.apply(this,arguments)}function j(){return(j=Object(l.a)(u.a.mark((function t(){return u.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.abrupt("return",fetch("http://students.yss.su/PSTGU/2019/gritskova/2021/2021.02.15/api/list.php").then((function(t){return t.json()})));case 1:case"end":return t.stop()}}),t)})))).apply(this,arguments)}function h(){return(h=Object(l.a)(u.a.mark((function t(e,n){return u.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.abrupt("return",fetch("http://students.yss.su/PSTGU/2019/gritskova/2021/2021.02.15/api/add.php",{method:"POST",headers:{"Content-Type":"application/json;charset=utf-8"},body:JSON.stringify({name:e,description:n})}).catch((function(t){console.error("Error:",t)})));case 1:case"end":return t.stop()}}),t)})))).apply(this,arguments)}function b(){return(b=Object(l.a)(u.a.mark((function t(e){return u.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.abrupt("return",fetch("http://students.yss.su/PSTGU/2019/gritskova/2021/2021.02.15/api/delete.php",{method:"POST",headers:{"Content-Type":"application/json;charset=utf-8"},body:JSON.stringify({id:e})}).catch((function(t){console.error("Error:",t)})));case 1:case"end":return t.stop()}}),t)})))).apply(this,arguments)}function p(){return(p=Object(l.a)(u.a.mark((function t(e,n,r){return u.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.abrupt("return",fetch("http://students.yss.su/PSTGU/2019/gritskova/2021/2021.02.15/api/update.php",{method:"POST",headers:{"Content-Type":"application/json;charset=utf-8"},body:JSON.stringify({id:e,name:n,description:r})}).catch((function(t){console.error("Error:",t)})));case 1:case"end":return t.stop()}}),t)})))).apply(this,arguments)}var f=n(0);function O(t){var e=function(t){return function(e){(function(t){return b.apply(this,arguments)})(t).then((function(){return v()}))}},n=c.a.useState(null),r=Object(i.a)(n,2),a=r[0],s=r[1],o=c.a.useState(""),u=Object(i.a)(o,2),l=u[0],d=u[1],j=c.a.useState(""),h=Object(i.a)(j,2),O=h[0],x=h[1],m=t.data,v=t.onDelete,g=t.onUpdate,y=function(t){return function(e){(function(t,e,n){return p.apply(this,arguments)})(t,l,O).then((function(){s(null),d(""),x(""),g()}))}};return Object(f.jsxs)(f.Fragment,{children:[Object(f.jsx)("div",{className:"row",children:Object(f.jsx)("div",{className:"col text-center mt-5",children:Object(f.jsx)("h4",{children:"Table"})})}),Object(f.jsx)("div",{className:"row",children:m&&Object(f.jsxs)("table",{className:"table table-bordered table-striped mr-3 ml-3 mt-1",children:[Object(f.jsx)("thead",{children:Object(f.jsxs)("tr",{children:[Object(f.jsx)("th",{children:m.data[0][0]}),Object(f.jsx)("th",{children:m.data[0][1]}),Object(f.jsx)("th",{children:m.data[0][2]}),Object(f.jsx)("th",{children:m.data[0][3]}),Object(f.jsx)("th",{children:m.data[0][4]}),Object(f.jsx)("th",{children:"Edit"}),Object(f.jsx)("th",{children:"Delete"})]})}),Object(f.jsx)("tbody",{children:m.data.slice(1).map((function(t){return Object(f.jsxs)("tr",{children:[Object(f.jsx)("td",{children:t[0]}),Object(f.jsx)("td",{children:t[0]===a?Object(f.jsx)("input",{onChange:function(t){return d(t.target.value)},value:l}):t[1]}),Object(f.jsx)("td",{children:t[0]===a?Object(f.jsx)("input",{onChange:function(t){return x(t.target.value)},value:O}):t[2]}),Object(f.jsx)("td",{children:t[3]}),Object(f.jsx)("td",{children:t[4]}),Object(f.jsx)("td",{children:t[0]===a?Object(f.jsx)("button",{onClick:y(t[0]),className:"btn btn-success",children:"Save"}):Object(f.jsx)("button",{onClick:function(){s(t[0]),d(t[1]),x(t[2])},className:"btn btn-light",children:"Edit"})}),Object(f.jsx)("td",{children:Object(f.jsx)("button",{onClick:e(t[0]),className:"btn btn-danger",children:"Delete"})})]},t[0])}))})]})})]})}function x(t){var e=t.onSubmit,n=c.a.useState(""),r=Object(i.a)(n,2),a=r[0],s=r[1],o=c.a.useState(""),u=Object(i.a)(o,2),l=u[0],d=u[1];return Object(f.jsx)("div",{className:"auth-form-body mt-16 rounded-sm",children:Object(f.jsxs)("form",{onSubmit:function(t){t.preventDefault(),function(t,e){return h.apply(this,arguments)}(a,l).then((function(){return e()}))},children:[Object(f.jsx)("div",{className:"form-group",children:Object(f.jsxs)("p",{children:["Name:",Object(f.jsx)("input",{value:a,onChange:function(t){s(t.target.value)},type:"text",className:"form-control",placeholder:"Enter name"})]})}),Object(f.jsx)("div",{className:"form-group",children:Object(f.jsxs)("p",{children:["Description:",Object(f.jsx)("input",{value:l,onChange:function(t){d(t.target.value)},type:"text",className:"form-control",placeholder:"Enter description"})]})}),Object(f.jsx)("div",{className:"form-group",children:Object(f.jsx)("button",{className:"btn btn-info",children:"Add"})})]})})}var m=function(){var t=c.a.useState(null),e=Object(i.a)(t,2),n=e[0],r=e[1];function a(){d().then((function(t){return r(t)}))}return c.a.useEffect((function(){d().then((function(t){return r(t)}))}),[]),Object(f.jsxs)("div",{className:"App container",children:[Object(f.jsx)(O,{data:n,onDelete:a,onUpdate:a}),Object(f.jsx)(x,{onSubmit:a})]})},v=function(t){t&&t instanceof Function&&n.e(3).then(n.bind(null,16)).then((function(e){var n=e.getCLS,r=e.getFID,c=e.getFCP,a=e.getLCP,s=e.getTTFB;n(t),r(t),c(t),a(t),s(t)}))};s.a.render(Object(f.jsx)(c.a.StrictMode,{children:Object(f.jsx)(m,{})}),document.getElementById("root")),v()}},[[15,1,2]]]);
//# sourceMappingURL=main.67acdb62.chunk.js.map