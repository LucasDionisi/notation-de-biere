$('#uploaded-img').on('click', selectImg);
$('#btn-upload-img').on('click', selectImg);

function selectImg() {
	$('#file-input').trigger('click');
}

$('#file-input').on('change', function() {

	new Compressor(this.files[0], {
		maxWidth: 800,
		maxHeight: 800,
		success:  function (compressedFile) {
			document.getElementById('uploaded-img').src = window.URL.createObjectURL(compressedFile);
		}
	});
});