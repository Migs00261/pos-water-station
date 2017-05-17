$(document).ready(function(){
    $('.btn-modify').click(function(e){
        e.preventDefault();
        $parent = $(this).parent().parent();

        if ($(this).html() == "Modify") {
            
            $parent.find('.text').hide();
            $parent.find('#description').attr('type', 'text');
            $(this).html('Save');
        } else {
            var desc = $parent.find('#description').val();
            var id = $parent.find('#description').attr('data-id');
            
            window.location.replace('/products/cat_edit?text=' + desc + '&id=' + id);
        }
        
    });
    $('.btn-register').click(function(e){
        e.preventDefault();
        var desc = $('#description').val();
        window.location.replace('/products/cat_add?text=' + desc);
    });
    $('.btn-delete').click(function(e){
        e.preventDefault();
        var ans = confirm('Are you sure you want to delete this category?');
        if (ans === true) {
            window.location.replace('/products/cat_del?id=' + $(this).attr('data-id'));
        }
    });
     
});