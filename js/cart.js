$(document).ready(function(){
    $('.btn-delete').click(function(e){
        var id = $(this).attr('data-id');

        var ans = confirm("Are you sure you want to cancel this order?");
        if (ans === true) {
            window.location.replace('/products/cart_del?id=' + id);
        }
    });

    $('#cash').keyup(function(e){
        var total = $('#total').val();
        var cash = $(this).val();
        $('.change').html('P' + (cash - total));
    });

    $('.btn-cashout').click(function(e){
        e.preventDefault();
        var total = $('#total').val();
        var cash = $('#cash').val();
        var worker = $('#delivery').val();
        var customer = $('#customer').val();
        
        //send cashout
        var ans = confirm("Are you sure you want to cashout?");
        if (ans === true) {
            window.location.replace('/cart/cashout?total=' + total + '&cash=' + cash + '&worker=' + worker + '&customer=' + customer);
        }
    });
});