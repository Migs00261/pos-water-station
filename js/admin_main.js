$(document).ready(function(){
    $('.btn-remarks').click(function(e){
        var ans = confirm("Are you sure you want to close this?");
        if (ans === true) {
            var id = $(this).attr('data-id');
            window.location.replace('/admin/close?id=' + id);
        }
    });

    $('.btn-status').click(function(e){
        var ans = confirm("This product has been delivered?");
        if (ans === true) {
            var id = $(this).attr('data-id');
            window.location.replace('/admin/deliver?id=' + id);
        }
    });
});