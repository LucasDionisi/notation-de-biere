$('#uploaded-img').on('click', selectImg);
$('#btn-upload-img').on('click', selectImg);

function selectImg() {
	$('#file-input').trigger('click');
}

$('#file-input').on('change', function() {

	new Compressor(this.files[0], {
		maxWidth: 500,
		maxHeight: 500,
		success:  function (compressedFile) {
			document.getElementById('uploaded-img').src = window.URL.createObjectURL(compressedFile);

			const file = new File([compressedFile], compressedFile.name, {
				type: compressedFile.type
			})

			const dataTransfere = new DataTransfer();
			dataTransfere.items.add(file);
			$('#file-input')[0].files = dataTransfere.files;
		}
	});
});