webpackJsonp([1],{"8NIx":function(t,i){},B5iK:function(t,i){},Bu0h:function(t,i){},HIYs:function(t,i){},JsOw:function(t,i){},KRvK:function(t,i){},M6Sr:function(t,i){},NHnr:function(t,i,s){"use strict";Object.defineProperty(i,"__esModule",{value:!0});var a=s("7+uW"),e={render:function(){var t=this.$createElement,i=this._self._c||t;return i("div",{attrs:{id:"app"}},[i("router-view")],1)},staticRenderFns:[]};var n=s("VU/8")({name:"App"},e,!1,function(t){s("KRvK")},null,null).exports,r=s("/ocq"),c=s("bOdI"),o=s.n(c),l=(s("k3b4"),s("+2ln")),m=(s("sEnP"),{name:"homeHader",components:o()({},l.a.name,l.a)}),v={render:function(){var t=this.$createElement,i=this._self._c||t;return i("div",{staticClass:"headertop"},[i("div",{staticClass:"header"},[i("router-link",{staticClass:"input",attrs:{tag:"div",to:"/"}},[i("span",{staticClass:"icon-bg"},[i("van-icon",{attrs:{name:"search"}})],1),this._v(" "),i("span",{staticClass:"input-title"},[this._v("121活动套餐大优惠")])]),this._v(" "),i("div",{staticClass:"icon-right"},[i("van-icon",{attrs:{name:"cart-o"}})],1)],1)])},staticRenderFns:[]};var d,p=s("VU/8")(m,v,!1,function(t){s("HIYs")},"data-v-2ac21c3a",null).exports,u=(s("zP7x"),s("rD0v")),_=(s("3AsM"),s("7ZPY")),g={name:"homeBanner",components:(d={},o()(d,_.a.name,_.a),o()(d,u.a.name,u.a),d)},h={render:function(){var t=this.$createElement,i=this._self._c||t;return i("div",{staticClass:"banner"},[i("van-swipe",{attrs:{autoplay:3e3,"indicator-color":"white"}},[i("van-swipe-item",[i("div",{staticClass:"item"},[i("img",{staticClass:"item-img",attrs:{src:"https://cimgs1.fenqile.com/ibanner2/M00/32/7F/jqgHAFwHk1GAOjvaAAHVTZtgBys011_750x320.jpg",alt:""}})])]),this._v(" "),i("van-swipe-item",[i("div",{staticClass:"item"},[i("img",{staticClass:"item-img",attrs:{src:"https://cimgs1.fenqile.com/ibanner2/M00/32/7E/jqgHAFwHNdWALvquAAEjnP3iyJw640_750x320.jpg",alt:""}})])]),this._v(" "),i("van-swipe-item",[i("div",{staticClass:"item"},[i("img",{staticClass:"item-img",attrs:{src:"https://cimgs1.fenqile.com/ibanner2/M00/32/82/jqgHAFwI2_qAIZZdAAGoO_8-BGQ809_750x320.jpg",alt:""}})])]),this._v(" "),i("van-swipe-item",[i("div",{staticClass:"item"},[i("img",{staticClass:"item-img",attrs:{src:"https://cimgs1.fenqile.com/ibanner2/M00/32/7D/jqgHAFwGPF-AOliqAAEhV7nTqoI095_750x320.jpg",alt:""}})])])],1)],1)},staticRenderFns:[]};var f,C=s("VU/8")(g,h,!1,function(t){s("B5iK")},"data-v-3ff0d66f",null).exports,A=(s("JRZP"),s("LK01")),w=(s("ZuV/"),s("37Xn")),b={name:"homeBoutique",components:(f={},o()(f,w.a.name,w.a),o()(f,A.a.name,A.a),f)},q={render:function(){var t=this.$createElement,i=this._self._c||t;return i("div",{staticClass:"boutique"},[i("van-row",{staticClass:"row",attrs:{type:"flex",justify:"space-between",align:"bottom"}},[i("van-col",{staticClass:"row-li",attrs:{span:"12"}},[i("img",{staticClass:"row-li-img",attrs:{src:"https://cimgs1.fenqile.com/ibanner2/M00/00/F0/j6gHAFwI4waAEPhPAABobgIN_b8557_344x144.png",alt:""}})]),this._v(" "),i("van-col",{staticClass:"row-li",attrs:{span:"12"}},[i("img",{staticClass:"row-li-img",attrs:{src:"https://cimgs1.fenqile.com/ibanner2/M00/33/5B/jagHAFwI5IqAWwoAAAAY9bZicmk356_344x144.png",alt:""}})]),this._v(" "),i("van-col",{staticClass:"row-li",attrs:{span:"12"}},[i("img",{staticClass:"row-li-img",attrs:{src:"https://cimgs1.fenqile.com/ibanner2/M00/33/5B/jagHAFwI5IqAWwoAAAAY9bZicmk356_344x144.png",alt:""}})]),this._v(" "),i("van-col",{staticClass:"row-li",attrs:{span:"12"}},[i("img",{staticClass:"row-li-img",attrs:{src:"https://cimgs1.fenqile.com/ibanner2/M00/33/5B/jagHAFwI5IqAWwoAAAAY9bZicmk356_344x144.png",alt:""}})])],1)],1)},staticRenderFns:[]};var H=s("VU/8")(b,q,!1,function(t){s("y09t")},"data-v-c8406bc6",null).exports,x=(s("3ab0"),s("bHMa")),y={name:"countDown",data:function(){return{content:""}},props:{endTime:{type:String,default:""},endText:{type:String,default:"已结束"}},mounted:function(){this.countinit(this.endTime),this.countdowm(this.endTime)},methods:{countinit:function(t){var i=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null,s=new Date,a=new Date(1e3*t).getTime()-s.getTime();if(a>0){var e=Math.floor(a/864e5),n=Math.floor(a/36e5%24),r=Math.floor(a/6e4%60),c=Math.floor(a/1e3%60);n=n<10?"0"+n:n,r=r<10?"0"+r:r,c=c<10?"0"+c:c;var o=void 0;e>0&&(o='<span style="color:rgb(255, 68, 68);font-size:.28rem;">'+e+"天"+n+"小时"+r+"分"+c+"秒</span>"),e<=0&&n>0&&(o='<span style="color:rgb(255, 68, 68);font-size:.28rem;">'+n+"小时"+r+"分"+c+"秒</span>"),e<=0&&n<=0&&(o='<span style="color:rgb(255, 68, 68);font-size:.28rem;">'+r+"分"+c+"秒</span>"),this.content=o}else clearInterval(i),this.content=this.endText},countdowm:function(t){var i=this,s=setInterval(function(){i.countinit(t,s)},1e3)}}},F={render:function(){var t=this.$createElement,i=this._self._c||t;return i("div",{staticClass:"count-down",attrs:{endTime:this.endTime,endText:this.endText}},[i("span",{staticClass:"time-tip"},[this._v("距离本场结束")]),this._v(" "),this._t("default",[i("div",{staticClass:"time-content",domProps:{innerHTML:this._s(this.content)}})])],2)},staticRenderFns:[]};var E,M=s("VU/8")(y,F,!1,function(t){s("Ylnn")},"data-v-62f6990e",null).exports,j={name:"recommendedSlider",components:(E={},o()(E,_.a.name,_.a),o()(E,u.a.name,u.a),o()(E,"countDown",M),o()(E,x.a.name,x.a),E)},T={render:function(){var t=this,i=t.$createElement,s=t._self._c||i;return s("div",{staticClass:"slider"},[s("div",{staticClass:"slider-top"},[s("div",{staticClass:"title"},[t._v("今日秒杀")]),t._v(" "),s("div",{staticClass:"time"},[s("count-down",{attrs:{endTime:"1544578507",endText:"已经结束了"}})],1)]),t._v(" "),s("van-swipe",{attrs:{autoplay:0,width:110,loop:!1,"show-indicators":!1}},[s("van-swipe-item",[s("div",{staticClass:"item"},[s("div",{staticClass:"item-img"},[s("img",{attrs:{src:"https://cimgs1.fenqile.com/product3/M00/7E/2E/RbQHAFvFebCAbHLdAANyrdoLK_E476_156x156.jpg",alt:""}})]),t._v(" "),s("div",{staticClass:"item-info"},[s("div",{staticClass:"item-pay"},[s("span",[s("i",[t._v("¥")]),t._v("299\n                        ")])]),t._v(" "),s("div",{staticClass:"item-price"},[t._v("¥599")])]),t._v(" "),s("div",{staticClass:"pro-tag"},[s("van-tag",{attrs:{mark:"",type:"danger"}},[t._v("超级秒杀")])],1)])]),t._v(" "),s("van-swipe-item",[s("div",{staticClass:"item"},[s("div",{staticClass:"item-img"},[s("img",{attrs:{src:"https://cimgs1.fenqile.com/product3/M00/7E/2E/RbQHAFvFebCAbHLdAANyrdoLK_E476_156x156.jpg",alt:""}})]),t._v(" "),s("div",{staticClass:"item-info"},[s("div",{staticClass:"item-pay"},[s("span",[s("i",[t._v("¥")]),t._v("299\n                        ")])]),t._v(" "),s("div",{staticClass:"item-price"},[t._v("¥599")])]),t._v(" "),s("div",{staticClass:"pro-tag"},[s("van-tag",{attrs:{mark:"",type:"danger"}},[t._v("超级秒杀")])],1)])]),t._v(" "),s("van-swipe-item",[s("div",{staticClass:"item"},[s("div",{staticClass:"item-img"},[s("img",{attrs:{src:"https://cimgs1.fenqile.com/product3/M00/7E/2E/RbQHAFvFebCAbHLdAANyrdoLK_E476_156x156.jpg",alt:""}})]),t._v(" "),s("div",{staticClass:"item-info"},[s("div",{staticClass:"item-pay"},[s("span",[s("i",[t._v("¥")]),t._v("299\n                        ")])]),t._v(" "),s("div",{staticClass:"item-price"},[t._v("¥599")])]),t._v(" "),s("div",{staticClass:"pro-tag"},[s("van-tag",{attrs:{mark:"",type:"danger"}},[t._v("超级秒杀")])],1)])]),t._v(" "),s("van-swipe-item",[s("div",{staticClass:"item"},[s("div",{staticClass:"item-img"},[s("img",{attrs:{src:"https://cimgs1.fenqile.com/product3/M00/7E/2E/RbQHAFvFebCAbHLdAANyrdoLK_E476_156x156.jpg",alt:""}})]),t._v(" "),s("div",{staticClass:"item-info"},[s("div",{staticClass:"item-pay"},[s("span",[s("i",[t._v("¥")]),t._v("299\n                        ")])]),t._v(" "),s("div",{staticClass:"item-price"},[t._v("¥599")])]),t._v(" "),s("div",{staticClass:"pro-tag"},[s("van-tag",{attrs:{mark:"",type:"danger"}},[t._v("超级秒杀")])],1)])])],1)],1)},staticRenderFns:[]};var I={name:"home",components:{homeHerder:p,homeBanner:C,homeBoutique:H,recommendedSlider:s("VU/8")(j,T,!1,function(t){s("TSLh")},"data-v-a6b3a3cc",null).exports}},R={render:function(){var t=this.$createElement,i=this._self._c||t;return i("div",[i("home-herder"),this._v(" "),i("home-banner"),this._v(" "),i("home-boutique"),this._v(" "),i("recommended-slider")],1)},staticRenderFns:[]};var B=s("VU/8")(I,R,!1,function(t){s("Bu0h")},"data-v-38d20a52",null).exports;a.a.use(r.a);var K=new r.a({routes:[{path:"/",name:"Home",component:B}]}),L=s("v5o6"),k=s.n(L);s("M6Sr");k.a.attach(document.body),a.a.config.productionTip=!1,new a.a({el:"#app",router:K,components:{App:n},template:"<App/>"})},RUOb:function(t,i){},TSLh:function(t,i){},W0KU:function(t,i){},Ylnn:function(t,i){},nsZj:function(t,i){},sEnP:function(t,i){},sKgQ:function(t,i){},y09t:function(t,i){}},["NHnr"]);
//# sourceMappingURL=app.61730ceb34818ceca3ef.js.map