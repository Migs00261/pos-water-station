$(document).ready(function(){
    $('.btn-modify').click(function(e){
        e.preventDefault();
        $('.modal-container .modal-body').load('/account/modal?id=' + $(this).attr('data-id'));
    });
    $('.btn-register').click(function(e){
        e.preventDefault();
        $('.modal-container .modal-body').load('/account/modal');
    });
    $('.btn-delete').click(function(e){
        e.preventDefault();
        var ans = confirm('Are you sure you want to delete this account?');
        if (ans === true) {
            window.location.replace('/account/remove?id=' + $(this).attr('data-id'));
        }
    });
     
});