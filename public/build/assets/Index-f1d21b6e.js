import{_ as m}from"./AuthenticatedLayout-9c73c55a.js";import{f as o,a as i,u as r,w as d,F as c,o as s,X as _,b as e,m as u,t as x,c as h,l as n,d as l}from"./app-44978cf3.js";import"./ApplicationLogo-3cfb4d02.js";import"./_plugin-vue_export-helper-c27b6911.js";const g=e("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"},"Banners",-1),f={class:"py-12"},y={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},v={class:"bg-white overflow-hidden shadow-sm sm:rounded-lg"},w={class:"max-w-screen-xl mx-auto px-4 md:px-8"},b={class:"items-start justify-between md:flex mt-4"},k={class:"mt-3 md:mt-0"},B=["href"],A={class:"mt-12 shadow-sm border rounded-lg overflow-x-auto"},N={class:"w-full table-auto text-sm text-left"},V=e("thead",{class:"bg-gray-50 text-gray-600 font-medium border-b"},[e("tr",null,[e("th",{class:"py-3 px-6"},"Image"),e("th",{class:"py-3 px-6"},"Title"),e("th",{class:"py-3 px-6 text-right"},"Actions")])],-1),D={class:"text-gray-600 divide-y"},F={class:"px-6 py-4 whitespace-nowrap"},I=["src"],T={class:"px-6 py-4 whitespace-nowrap"},j={class:"px-6 py-4 whitespace-nowrap"},C={key:0},E={key:1},L={class:"text-right px-6 whitespace-nowrap"},z={__name:"Index",props:{banners:{type:Array}},setup(p){return(a,R)=>(s(),o(c,null,[i(r(_),{title:"Banners"}),i(m,null,{header:d(()=>[g]),default:d(()=>[e("div",f,[e("div",y,[e("div",v,[e("div",w,[e("div",b,[e("div",k,[e("a",{href:a.route("banner.create"),class:"inline-block px-4 py-2 text-white duration-150 font-medium bg-indigo-600 rounded-lg hover:bg-indigo-500 active:bg-indigo-700 md:text-sm"}," Add Banner ",8,B)])]),e("div",A,[e("table",N,[V,e("tbody",D,[(s(!0),o(c,null,u(p.banners,t=>(s(),o("tr",{key:t.id},[e("td",F,[e("img",{src:t.url,class:"w-96"},null,8,I)]),e("td",T,x(t.title),1),e("td",j,[t.archived?(s(),o("span",E,"Archived")):(s(),o("span",C,"Active"))]),e("td",L,[t.archived?(s(),h(r(n),{key:1,href:a.route("banner.restore",t.id),method:"post",class:"py-2 px-3 font-medium text-indigo-600 hover:text-indigo-500 duration-150 hover:bg-gray-50 rounded-lg"},{default:d(()=>[l(" Restore ")]),_:2},1032,["href"])):(s(),h(r(n),{key:0,href:a.route("banner.archive",t.id),method:"post",class:"py-2 px-3 font-medium text-indigo-600 hover:text-indigo-500 duration-150 hover:bg-gray-50 rounded-lg"},{default:d(()=>[l(" Archive ")]),_:2},1032,["href"])),i(r(n),{href:a.route("banner.destroy",t.id),method:"delete",class:"py-2 leading-none px-3 font-medium text-red-600 hover:text-red-500 duration-150 hover:bg-gray-50 rounded-lg"},{default:d(()=>[l(" Delete ")]),_:2},1032,["href"])])]))),128))])])])])])])])]),_:1})],64))}};export{z as default};
