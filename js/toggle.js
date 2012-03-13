var Dom = YAHOO.util.Dom;
var Event = YAHOO.util.Event;
var $ = function(id) {
      return document.getElementById(id);
} 
//++++++++++++++++++++++++++++++++++++
// YUI TOGGLE
// 12/21/2007 - Edwart Visser & Arjen Weeber
//
// toggle the visibility
//
// REQUIRES: yahoo-dom-event.js
// OPTIONAL: animation-min.js
//
//++++++++++++++++++++++++++++++++++++
YAHOO.namespace("lutsr");

YAHOO.lutsr.doToggle = {
	init : function() {
		this.toggleLinks = Dom.getElementsByClassName("toggle");
		for(var i=0; i<this.toggleLinks.length; i++) {
			  Event.addListener(this.toggleLinks[i],"click",this.animateElements,this);
		}
	},
	toggleElements : function(e,controlNode,refEl) {
		if(controlNode && refEl) {
			if(Dom.hasClass(refEl,"show")) {
				Dom.removeClass(controlNode,"selected");
				Dom.removeClass(refEl,"show");
			} else {
				Dom.addClass(controlNode,"selected");
				Dom.addClass(refEl,"show");
			}
		}
		// to disable control node's default behaviour
		return false;
	},
	animateElements : function(e,obj) {
		// obj = javascript toggle object
		// this = link clicked
		Event.preventDefault(e);

		if(this.rel) {
			  controlNode = this;
		}
		if(typeof(controlNode) == "string") {
			  controlNode = Dom.get(controlNode);
		}

		// objParameters
		// [0] = object id
		// [1] = animation type (fade, slide)
		// [2] = animation duration (seconds)
		var linkClicked = this;
		var objParameters = controlNode.rel.split(",");
		var refEl = Dom.get(objParameters[0]);
		var objStatus = Dom.hasClass(refEl,"show"); // if true, object is shown
		
		switchClasses = function() {
			obj.toggleOtherElements(e,linkClicked,refEl);
			obj.toggleElements(e,linkClicked,refEl);
		}

		if(objParameters[1] == "fade") {
			if(objStatus == true) {
				var attributes = {
					opacity: { from: .999, to: 0 }
				}
				var objAnim = new YAHOO.util.Anim(objParameters[0],attributes);
				objAnim.useSeconds = false;
				objAnim.duration = objParameters[2];
				objAnim.onComplete.subscribe(switchClasses);
				objAnim.animate();
			} else {
				Dom.setStyle(objParameters[0],"opacity",0);
				switchClasses();
				var attributes = {
					opacity: { from: 0, to: .999 }
				}
				var objAnim = new YAHOO.util.Anim(objParameters[0],attributes);
				objAnim.useSeconds = false;
				objAnim.duration = objParameters[2];
				objAnim.animate();
			}
		} else if (objParameters[1] == "slide") {
				// not implemented yet
		} else {
			// NO ANIMATION - switch classes
			switchClasses();
		}
	},
	toggleOtherElements : function(e,linkClicked,refEl) {
		// toggle selected state of other elements pointing to the same source
		for(var i=0; i<this.toggleLinks.length; i++) {
			var objParameters = this.toggleLinks[i].rel.split(",");
			var linkClickedParameters = linkClicked.rel.split(",");
			
			if(objParameters[0] == linkClickedParameters[0]) {
				if(Dom.hasClass(this.toggleLinks[i],"selected")) {
					Dom.removeClass(this.toggleLinks[i],"selected");
				} else {
					Dom.addClass(this.toggleLinks[i],"selected");
				}
			}
		}
	}
}

initPage = function() {
	YAHOO.lutsr.doToggle.init();
}

Event.addListener(window,"load",initPage);