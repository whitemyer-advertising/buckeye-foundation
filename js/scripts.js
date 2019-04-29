$(window).load(function() {
  // News rotator at top of page
  $('.small').flexslider({
	controlNav: false,
	animationSpeed:600,
	slideshowSpeed: 6000,
	directionNav: false
  });
  
  // Nav submenus
  $('.subnav').hover(function() {
	$(this).find('.submenu').stop(true,true).slideToggle("fast");
  });
  
  // Sidebar image rotators
  $('.side').flexslider({
	controlNav: false,
	animationSpeed:700,
	slideshowSpeed: 5000,
	directionNav: false,
	randomize: true
  });
});