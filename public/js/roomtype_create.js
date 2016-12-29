$(document).mouseup(function (e)
  {
    var container = $('#form_themphong');
    if (!container.is(e.target) // if the target of the click isn't the container...
    && container.has(e.target).length === 0) // ... nor a descendant of the container
  {
    container.hide();
  }
});  

      $('#themphong').click(function(){
        $('#form_themphong').slideToggle("slow");
      });

      $('#off').click(function(){
        $('#form_themphong').slideToggle();
      });

      $('#save-type').on('click',function(event){
          event.preventDefault();
          var msg="Bạn có chắc thêm phòng không?";
          if(confirm(msg)){
              $('#form-create-room-type').submit();
          }
          return false;
      });



