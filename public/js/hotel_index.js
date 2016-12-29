$('.btn-delete-hotel').on('click', function(event){
    event.preventDefault();
    var msg ="Bạn có chắc chắn muốn xóa không?";
    if(confirm(msg)){
        $('.form-delete-hotel').submit();
    }else{
        return false;
    }
});

$('.btn-accept-hotel').on('click', function(event){
    event.preventDefault();
    var msg = "Bạn có chắc chắn xác nhận không?";
    if(confirm(msg)){
        $('.form-accept-hotel').submit();
    } else{
        return false;
    }
});