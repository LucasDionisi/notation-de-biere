$(document).ready(function () {
	document.title = $(".title-info h1")[0].innerHTML;;
});

$('.delete-advice a').on('click', function() {
	$('#input-advice-id')[0].value = this.getAttribute('value');
	$('#delete-modal').css("display", "block");
	$('.beer-page').addClass('is-blur');
});

$('#close-delete-modal').on('click', function() {
	$('#delete-modal').css("display", "none");
	$('.beer-page').removeClass('is-blur');
})