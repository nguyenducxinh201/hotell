

$('.img-room').click(function(){
    $(this).parent('.panel-room').children('.detail-room-hidden').slideToggle();
});

$(document).mouseup(function (e)
{
    var container = $('.detail-room-hidden');
    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.hide();
    }
}); 

$('.btn-add-room').click(function(){
    $('.form-add-room').slideToggle();
});

$(document).mouseup(function (e)
{
    var container = $('.form-add-room');
    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.hide();
    }
});  




