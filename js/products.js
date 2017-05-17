$(document).ready(function(){
    $('.carousel').carousel({
        pause: true,
        interval: false
    });
});




$(document).ready(function(){
    $(".col-md-3 ").mouseenter(function(){
        $(this).find(".col-img-responsive02").show(200);
    }); 


    $(".col-md-3").mouseleave(function(){
        $(this).find(".col-img-responsive02").hide();
    });

    $('.btn-order').click(function(e){
        e.preventDefault();
        //send order to cart
        var id = $(this).attr('data-id');
        window.location.replace('/products/cart_add?id=' +id);
    });
}); 