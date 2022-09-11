var once = true;

$(document).ready(function () {
	document.title = $(".user-header-right-top h1")[0].innerHTML;;
});

$('#logout').on('click', function () {
	window.location.replace("../deconnexion");
});

$('#avatar-img').on('click', function() {
	$('#avatar-modal').css("display", "block");
	$('#content').addClass('is-blur');

	unSelectAll();
	$('#content').on('click', onContent);
});

$('#close-modal').on('click', function() {
	onContent();
});

function onContent() {
	if (!once) {
		$('#avatar-modal').css("display", "none");
		$('#content').removeClass('is-blur');
		$('#content').off('click', onContent);
		once = true;
	} else {
		once = false;
	}
}

$('.avatars img').on('click', function(e) {
	if (!e.currentTarget.classList.contains('black-and-white')) {
		unSelectAll();
		e.currentTarget.classList.add('selected');
		$('#avatar-value').val(e.currentTarget.name);
	}
});

function unSelectAll() {
	$('.avatars .selected').each(function () {
		this.classList.remove('selected');
	});
}

$('.delete-advice a').on('click', function() {
	$('#input-advice-id')[0].value = this.getAttribute('value');
	$('#delete-modal').css("display", "block");
	$('#content').addClass('is-blur');
});

$('#close-delete-modal').on('click', function() {
	$('#delete-modal').css("display", "none");
	$('#content').removeClass('is-blur');
})