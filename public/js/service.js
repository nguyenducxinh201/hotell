$('.btn-show-dichvu').click(function(){
    $('form.them-dichvu').slideToggle();
});

$(document).mouseup(function(e)
{
    var container = $('form.them-dichvu');
    if( !container.is(e.target) && container.has(e.target).length ===0)
    {
        container.hide();
    }
});


$('.off-ses').click(function(){
    $(this).parent(".ses").slideToggle();
});

$('.btn-delete-service').on('click',function(event){
    event.preventDefault();
    var msg = "Are you sure delete Service?";
    if(confirm(msg)){
        $(this).parent('.form-delete-service').submit();
    }
});
