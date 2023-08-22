import{_ as m}from"./AuthenticatedLayout-9c73c55a.js";import{f as a,a as s,u as i,w as o,F as l,o as r,X as _,b as t,m as x,t as n,l as c,d as h}from"./app-44978cf3.js";import"./ApplicationLogo-3cfb4d02.js";import"./_plugin-vue_export-helper-c27b6911.js";const u=t("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"},"Products",-1),g={class:"py-12"},f={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},y={class:"bg-white overflow-hidden shadow-sm sm:rounded-lg"},w={class:"max-w-screen-xl mx-auto px-4 md:px-8"},b={class:"items-start justify-between md:flex mt-4"},v={class:"mt-3 md:mt-0"},k=["href"],N={class:"mt-12 shadow-sm border rounded-lg overflow-x-auto"},P={class:"w-full table-auto text-sm text-left"},A=t("thead",{class:"bg-gray-50 text-gray-600 font-medium border-b"},[t("tr",null,[t("th",{class:"py-3 px-6"},"Name"),t("th",{class:"py-3 px-6"},"Price"),t("th",{class:"py-3 px-6"},"Description"),t("th",{class:"py-3 px-6 text-right"},"Actions")])],-1),B={class:"text-gray-600 divide-y"},D={class:"px-6 py-4 whitespace-nowrap"},V={class:"px-6 py-4 whitespace-nowrap"},E={class:"px-6 py-4 whitespace-nowrap"},F={class:"text-right px-6 whitespace-nowrap"},T={__name:"Index",props:{products:{type:Array}},setup(p){return(d,j)=>(r(),a(l,null,[s(i(_),{title:"Products"}),s(m,null,{header:o(()=>[u]),default:o(()=>[t("div",g,[t("div",f,[t("div",y,[t("div",w,[t("div",b,[t("div",v,[t("a",{href:d.route("product.create"),class:"inline-block px-4 py-2 text-white duration-150 font-medium bg-indigo-600 rounded-lg hover:bg-indigo-500 active:bg-indigo-700 md:text-sm"}," Add Product ",8,k)])]),t("div",N,[t("table",P,[A,t("tbody",B,[(r(!0),a(l,null,x(p.products,e=>(r(),a("tr",{key:e.id},[t("td",D,n(e.name),1),t("td",V,n(e.price),1),t("td",E,n(e.description),1),t("td",F,[s(i(c),{href:d.route("product.edit",e.id),class:"py-2 px-3 font-medium text-indigo-600 hover:text-indigo-500 duration-150 hover:bg-gray-50 rounded-lg"},{default:o(()=>[h(" Edit ")]),_:2},1032,["href"]),s(i(c),{href:d.route("product.destroy",e.id),method:"delete",class:"py-2 leading-none px-3 font-medium text-red-600 hover:text-red-500 duration-150 hover:bg-gray-50 rounded-lg"},{default:o(()=>[h(" Delete ")]),_:2},1032,["href"])])]))),128))])])])])])])])]),_:1})],64))}};export{T as default};