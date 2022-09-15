$(document).ready(function () {
	document.title = $(".title-info h1")[0].innerHTML;;
});

$('.delete-advice a').on('click', function() {
	$('#input-advice-id')[0].value = this.getAttribute('value');
	$('#delete-modal').css("display", "block");
	var left = parseInt($('#delete-modal').css('width')) / 2;
	$('#delete-modal').css('left', 'calc(50vw - '+left +'px)');
	$('.beer-page').addClass('is-blur');
});

$('#close-delete-modal').on('click', function() {
	$('#delete-modal').css("display", "none");
	$('.beer-page').removeClass('is-blur');
})