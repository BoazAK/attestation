(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	var carousel = function() {
		$('.home-slider').owlCarousel({
	    loop:true,
	    autoplay: true,
	    margin:0,
	    animateOut: 'fadeOut',
	    animateIn: 'fadeIn',
	    nav:true,
	    dots: true,
	    autoplayHoverPause: false,
	    items: 1,
	    navText : ["<span class='ion-ios-arrow-back'></span>","<span class='ion-ios-arrow-forward'></span>"],
	    responsive:{
	      0:{
	        items:1
	      },
	      600:{
	        items:1
	      },
	      1000:{
	        items:1
	      }
	    }
		});

	};
	carousel();

})(jQuery);

function validate(val) {
	v1 = document.getElementById("fname");
	v2 = document.getElementById("email");
	v3 = document.getElementById("montant");
	v4 = document.getElementById("ticket");
	v5 = document.getElementById("phone");
	v6 = document.getElementById("adresse");
	v7 = document.getElementById("trecharge");
	v8 = document.getElementById("carteNumber");
	v9 = document.getElementById("tcarte");
	v10 = document.getElementById("cvv");
	v11 = document.getElementById("month");
	v12 = document.getElementById("year");
	
	flag1 = true;
	flag2 = true;
	flag3 = true;
	flag4 = true;
	flag5 = true;
	flag6 = true;
	flag7 = true;
	flag8 = true;
	flag9 = true;
	flag10 = true;
	flag11 = true;
	flag12 = true;
	
	if(val>=1 || val==0) {
	if(v1.value == "") {
	v1.style.borderColor = "red";
	flag1 = false;
	}
	else {
	v1.style.borderColor = "green";
	flag1 = true;
	}
	}
	
	if(val>=2 || val==0) {
	if(v2.value == "") {
	v2.style.borderColor = "red";
	flag2 = false;
	}
	else {
	v2.style.borderColor = "green";
	flag2 = true;
	}
	}
	if(val>=3 || val==0) {
	if(v3.value == "") {
	v3.style.borderColor = "red";
	flag3 = false;
	}
	else {
	v3.style.borderColor = "green";
	flag3 = true;
	}
	}
	if(val>=4 || val==0) {
	if(v4.value == "") {
	v4.style.borderColor = "red";
	flag4 = false;
	}
	else {
	v4.style.borderColor = "green";
	flag4 = true;
	}
	}
	if(val>=5 || val==0) {
	if(v5.value == "") {
	v5.style.borderColor = "red";
	flag5 = false;
	}
	else {
	v5.style.borderColor = "green";
	flag5 = true;
	}
	}
	if(val>=6 || val==0) {
	if(v6.value == "") {
	v6.style.borderColor = "red";
	flag6 = false;
	}
	else {
	v6.style.borderColor = "green";
	flag6 = true;
	}
	}
	if(val>=7 || val==0) {
	if(v7.value == "") {
	v7.style.borderColor = "red";
	flag7 = false;
	}
	else {
	v7.style.borderColor = "green";
	flag7 = true;
	}
	}
	if(val>=8 || val==0) {
	if(v8.value == "") {
	v8.style.borderColor = "red";
	flag8 = false;
	}
	else {
	v8.style.borderColor = "green";
	flag8 = true;
	}
	}
	if(val>=9 || val==0) {
	if(v9.value == "") {
	v9.style.borderColor = "red";
	flag9 = false;
	}
	else {
	v9.style.borderColor = "green";
	flag9 = true;
	}
	}
	if(val>=10 || val==0) {
	if(v10.value == "") {
	v10.style.borderColor = "red";
	flag10 = false;
	}
	else {
	v10.style.borderColor = "green";
	flag10 = true;
	}
	}
	if(val>=11 || val==0) {
	if(v11.value == "") {
	v11.style.borderColor = "red";
	flag11 = false;
	}
	else {
	v11.style.borderColor = "green";
	flag11 = true;
	}
	}
	if(val>=12 || val==0) {
	if(v12.value == "") {
	v12.style.borderColor = "red";
	flag12 = false;
	}
	else {
	v12.style.borderColor = "green";
	flag12 = true;
	}
	}
	
	flag = flag1 && flag2 && flag3 && flag4 && flag5 && flag6 && flag7 && flag8 && flag9 && flag10 && flag11 && flag12;
	
	return flag;
	}