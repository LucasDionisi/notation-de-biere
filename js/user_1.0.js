var once = true;

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
	unSelectAll();
	e.currentTarget.classList.add('selected');
	$('#file-name-input').val(e.currentTarget.name);
});

function unSelectAll() {
	$('.avatars .selected').each(function () {
		this.classList.remove('selected');
	});
}