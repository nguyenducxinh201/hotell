$('.btn-delete-bookroom').on('click', function(event){
    event.preventDefault();
    var msg = " Bạn có chắc chắn xóa khôngs?";
    if(confirm(msg)){
         $(this).parent().submit();
        // $('.form-delete-bookroom').submit();
    } else {
        return false;
    }
});

$('.btn-accept-bookroom').on('click', function(event){
    event.preventDefault();
    var msg= "Bạn có chắc chắn xác nhận không?";
    if(confirm(msg)){
        $('.form-delete-bookroom').submit();
    } else {
        return false;
    }
});