$(document).ready(function(){
    $('.btn-modify').click(function(e){
        e.preventDefault();
        $('.modal-container .modal-body').load('/products/modal?id=' + $(this).attr('data-id'));
    });
    $('.btn-register').click(function(e){
        e.preventDefault();
        $('.modal-container .modal-body').load('/products/modal');
    });
    $('.btn-delete').click(function(e){
        e.preventDefault();
        var ans = confirm('Are you sure you want to delete this product?');
        if (ans === true) {
            window.location.replace('/products/remove?id=' + $(this).attr('data-id'));
        }
    });
     
});