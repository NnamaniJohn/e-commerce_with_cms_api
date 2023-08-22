import{v as b,f as v,b as r,r as g,a as s,u as t,w as V,T as x,e as _,o as y,d as k,g as w}from"./app-44978cf3.js";import{a as i,b as n,_ as m}from"./TextInput-4f68e705.js";import{P as N}from"./PrimaryButton-95394e40.js";import"./_plugin-vue_export-helper-c27b6911.js";const S={class:"flex items-center gap-4"},$={key:0,class:"text-sm text-gray-600"},U={__name:"EditForm",props:{product:{type:Object}},setup(u){var d,c,p;const l=u,e=b({name:(d=l.product)==null?void 0:d.name,price:(c=l.product)==null?void 0:c.price,description:(p=l.product)==null?void 0:p.description});return(f,a)=>(y(),v("section",null,[r("header",null,[g(f.$slots,"header")]),r("form",{onSubmit:a[3]||(a[3]=_(o=>t(e).patch(f.route("product.update",u.product.id)),["prevent"])),class:"mt-6 space-y-6"},[r("div",null,[s(m,{for:"name",value:"Name"}),s(i,{id:"name",type:"text",class:"mt-1 block w-full",modelValue:t(e).name,"onUpdate:modelValue":a[0]||(a[0]=o=>t(e).name=o),required:"",autofocus:"",autocomplete:"name"},null,8,["modelValue"]),s(n,{class:"mt-2",message:t(e).errors.name},null,8,["message"])]),r("div",null,[s(m,{for:"price",value:"Price"}),s(i,{id:"price",type:"number",class:"mt-1 block w-full",modelValue:t(e).price,"onUpdate:modelValue":a[1]||(a[1]=o=>t(e).price=o),required:"",autocomplete:"username"},null,8,["modelValue"]),s(n,{class:"mt-2",message:t(e).errors.price},null,8,["message"])]),r("div",null,[s(m,{for:"description",value:"Description"}),s(i,{id:"description",type:"text",class:"mt-1 block w-full",modelValue:t(e).description,"onUpdate:modelValue":a[2]||(a[2]=o=>t(e).description=o),required:"",autofocus:"",autocomplete:"name"},null,8,["modelValue"]),s(n,{class:"mt-2",message:t(e).errors.description},null,8,["message"])]),r("div",S,[s(N,{disabled:t(e).processing},{default:V(()=>[k("Save")]),_:1},8,["disabled"]),s(x,{"enter-from-class":"opacity-0","leave-to-class":"opacity-0",class:"transition ease-in-out"},{default:V(()=>[t(e).recentlySuccessful?(y(),v("p",$,"Saved.")):w("",!0)]),_:1})])],32)]))}};export{U as default};