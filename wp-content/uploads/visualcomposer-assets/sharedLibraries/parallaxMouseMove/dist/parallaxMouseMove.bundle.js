(function(e){var t={};function s(n){if(t[n]){return t[n].exports}var r=t[n]={i:n,l:false,exports:{}};e[n].call(r.exports,r,r.exports,s);r.l=true;return r.exports}s.m=e;s.c=t;s.d=function(e,t,n){if(!s.o(e,t)){Object.defineProperty(e,t,{configurable:false,enumerable:true,get:n})}};s.r=function(e){Object.defineProperty(e,"__esModule",{value:true})};s.n=function(e){var t=e&&e.__esModule?function t(){return e["default"]}:function t(){return e};s.d(t,"a",t);return t};s.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)};s.p=".";return s(s.s=0)})({"./src/parallax.css":function(e,t){},"./src/parallax.js":function(e,t){window.vcv.on("ready",function(e,t){if(e!=="merge"){var s="[data-vce-assets-parallax-mouse-move]";s=t?'[data-vcv-element="'+t+'"] '+s:s;window.vceAssetsParallaxMouseMove(s)}})},"./src/plugin.js":function(e,t){(function(e,t){function s(s){var n={element:null,bgElement:null,waypoint:null,observer:null,reverse:false,speed:30,setup:function e(s){this.resize=this.resize.bind(this);this.handleAttributeChange=this.handleAttributeChange.bind(this);this.mouseParallax=this.mouseParallax.bind(this);this.update=this.update.bind(this);if(!s.getVceParallaxMouseMove){s.getVceParallaxMouseMove=this;this.element=s;this.bgElement=s.querySelector(s.dataset.vceAssetsParallaxMouseMove);this.elementRoot=t.getElementById("el-"+s.dataset.vceAssetsParallaxMouseMoveElement);this.prepareElement();this.create()}else{this.update()}return s.getVceParallaxMouseMove},handleAttributeChange:function e(){if(this.element.getAttribute("data-vce-assets-parallax-move-mouse")){this.update()}else{this.destroy()}},addScrollEvent:function t(){e.addEventListener("scroll",this.resize);this.resize()},removeScrollEvent:function t(){e.removeEventListener("scroll",this.resize)},resize:function t(){if(!this.element.clientHeight){return}var s=e.innerHeight;var n=this.element.getBoundingClientRect();var r=n.height+s;var i=(n.top-s)*-1;var a=0;if(i>=0&&i<=r){a=i/r}var l=this.speed*2*a*-1+this.speed;if(this.reverse==="true"){l=l*-1}this.bgElement.style.transform="translateY("+l+"vh)"},prepareElement:function e(){this.speed=parseInt(s.dataset.vceAssetsParallaxSpeed)||30;if("vceAssetsParallaxReverse"in s.dataset){this.reverse=s.dataset.vceAssetsParallaxReverse}this.bgElement.style.left="-"+this.speed+"vw";this.bgElement.style.top="-"+this.speed+"vh";this.bgElement.style.right="-"+this.speed+"vw";this.bgElement.style.bottom="-"+this.speed+"vh";this.bgElement.style.transform=`translate(0px, 0px)`},addMouseMoveEvent:function t(){this.elementRoot.addEventListener("mousemove",this.mouseParallax);e.addEventListener("resize",this.update)},removeMouseMoveEvent:function t(){this.elementRoot.removeEventListener("mousemove",this.mouseParallax);e.removeEventListener("resize",this.update)},create:function e(){this.addMouseMoveEvent();this.observer=new MutationObserver(this.handleAttributeChange);this.observer.observe(this.element,{attributes:true})},mouseParallax:function t(s){var n=s.clientX;var r=s.clientY;var i=this.bgElement.parentNode;var a=i.getBoundingClientRect();var l=a.left+a.width/2;var o=a.top+a.height/2;var u;var h;if(this.reverse==="true"){u=n-l-this.speed;h=r-o-this.speed}else{u=l-n-this.speed;h=o-r-this.speed}var v=e.innerWidth/100;var c=e.innerHeight/100;if(u<-(this.speed*v)){u=-(this.speed*v)}else if(u>this.speed*v){u=this.speed*v}if(h<-(this.speed*c)){h=-(this.speed*c)}else if(h>this.speed*c){h=this.speed*c}this.bgElement.style.transform=`translate(${u}px, ${h}px)`},update:function e(){this.prepareElement()},destroy:function e(){this.removeMouseMoveEvent();this.bgElement.style.top=null;this.bgElement.style.bottom=null;this.bgElement.style.transform=null;this.bgElement=null;this.observer.disconnect();this.observer=null;delete this.element.getVceParallaxMouseMove;this.element=null}};return n.setup(s)}var n={init:function e(n){var r=t.querySelectorAll(n);r=[].slice.call(r);r.forEach(function(e){if(!e.getVceParallaxMouseMove){s(e)}else{e.getVceParallaxMouseMove.update()}});if(r.length===1){return r.pop()}return r}};e.vceAssetsParallaxMouseMove=n.init})(window,document)},0:function(e,t,s){s("./src/plugin.js");s("./src/parallax.js");e.exports=s("./src/parallax.css")}});