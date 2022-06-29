$(document).ready(function () {
    let rateInputVal = $('#rate-input').val();
    if (rateInputVal !== '')
    {
        $('div.rate-img img[name=' +rateInputVal +']').click();
    }
});

$('.rate-img img').hover(function () {
    changeImage(this.parentElement, this.name);
    
    let message = '< Selectionnez pour noter';

    $('#rate-input').val(this.name);

    switch(this.name){
        case '1':
            message = 'Horrible >';
            break;
        case '2':
            message = 'Médiocre >';
            break;
        case '3':
            message = 'Moyen >';
            break;
        case '4':
            message = 'Très bien >';
            break;
        case '5':
            message = 'Excellent >';
            break;
    }

    $('#rate-message').html(message);
});

function changeImage(parent, id) {
    let childs = parent.children;
    for (let i = 0; i < childs.length; i++) { 
        if (parseInt(childs[i].name) <= parseInt(id)) {
            childs[i].src = childs[i].src.replace('beer-0', 'beer-100');
        } else {
            childs[i].src = childs[i].src.replace('beer-100', 'beer-0');
        }
    }
}