var once = true;

$('#logout').on('click', function () {
	window.location.replace("../deconnexion");
});

$('#avatar-img').on('click', function() {
	$('#avatar-modal').css("display", "block");
	$('#content').addClass('is-blur');

	$('#content').on('click', onContent);
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
