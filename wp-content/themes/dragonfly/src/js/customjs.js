//Navigation transition
$( "nav button.navbar-toggler" ).click(function() {
		$('body').toggleClass("overflow-hidden");
		var clicks = $(this).data('clicks');
		if (clicks) {
			$("nav").removeClass("fixed-top");
			$("nav").addClass("sticky-top");
		} else {
			$("nav").removeClass("sticky-top");
			$("nav").addClass("fixed-top");
		}
		$(this).data("clicks", !clicks);
	$("nav").toggleClass("navbar-dark");
});

//Contact form 7 Events 
/* Validation Events for changing response CSS classes */
document.addEventListener( 'wpcf7invalid', function( event ) {
    $('.wpcf7-response-output').addClass('alert alert-danger');
}, false );
document.addEventListener( 'wpcf7spam', function( event ) {
    $('.wpcf7-response-output').addClass('alert alert-warning');
}, false );
document.addEventListener( 'wpcf7mailfailed', function( event ) {
    $('.wpcf7-response-output').addClass('alert alert-warning');
}, false );
document.addEventListener( 'wpcf7mailsent', function( event ) {
    $('.wpcf7-response-output').addClass('alert alert-success').removeClass("alert-danger");
}, false );

//Filtering Gallery
(function() {
	var $parent = $('#gallery #parent');
	var $buttons = $('#galleryButtons');
	var buttonsNumber = $parent.length;
	var taggedParent = {};

	$parent.each(function() {
		var parent = this;
		var tagsParent = $(this).data('tags');

		if(tagsParent) {
			tagsParent.split(',').forEach(function(tagNameParent) {
				if(taggedParent[tagNameParent] == null) {
					taggedParent[tagNameParent] = [];
				}
				taggedParent[tagNameParent].push(parent);
			});
		}
	});
	
if (buttonsNumber >= 1) {
	$('<button />', {
		text: 'Wyświetl wszystko',
		class: 'active btn btn-outline-primary',
			click: function() {
				$(this)
					.addClass('active')
					.siblings()
					.removeClass('active');
				$parent.show(500);
			}
		}).appendTo($buttons);
	}
	$.each(taggedParent,  function(tagNameParent) {
		$('<button/>', {
			text: tagNameParent + ' (' + taggedParent[tagNameParent].length + ')',
			class: 'btn btn-outline-primary ml-3',
			click: function() {
				$(this)
					.addClass('active')
					.siblings()
					.removeClass('active');
				$parent
					.hide(500)
					.filter(taggedParent[tagNameParent])
					.show(500);
			}
		}).appendTo($buttons);
	})
}());

