$(document).ready(function () {

    $('.bookForm').css('display', 'none');
    $('.furnitureForm').css('display', 'none');
    $('.dvdForm').css('display', 'none');

    $("#cancel-btn").click(function () {
        location.href = "index.php";
    })

    //validation and rules for the product form
    $("#product_form").validate({
        rules: {
            sku: {
                required: true,
                minlength: 9,
                maxlength: 10,
            },
            name: {
                required: true,
                maxlength: 20,
            },
            price: {
                required: true,
                maxlength: 5,
            },
            weight: {
                required: true,
                maxlength: 4,
            },
            size: {
                required: true,
                maxlength: 4,
            },
            height: {
                required: true,
                maxlength: 3,
            },
            width: {
                required: true,
                maxlength: 3,
            },
            length: {
                required: true,
                maxlength: 3,
            }
        }
    });
});

//onClick functions for dynamically changing the product form when type is switched
function displayBookForm(){
    $('.bookForm').css('display', 'inline-block');
    $('.furnitureForm').css('display', 'none');
    $('.dvdForm').css('display', 'none');
}
function displayDvdForm(){
    $('.bookForm').css('display', 'none');
    $('.furnitureForm').css('display', 'none');
    $('.dvdForm').css('display', 'inline-block');
}
function displayFurnitureForm(){
    $('.bookForm').css('display', 'none');
    $('.furnitureForm').css('display', 'inline-block');
    $('.dvdForm').css('display', 'none');
}