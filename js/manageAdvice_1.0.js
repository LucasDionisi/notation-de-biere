$('.delete-advice a').on('click', function() {
    var id = $(this).data("id");
    $('#delete-modal').css("display", "block");
    $('#content').addClass('is-blur');
});

$('#delete-modal #close-modal').on('click', function() {
    $('#delete-modal').css("display", "none");
    $('#content').removeClass('is-blur');
});