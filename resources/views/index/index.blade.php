<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>
<!-- Styles -->
<link rel="stylesheet" type="text/css" href="{{Asset('css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{Asset('css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{Asset('css/index/index.css')}}">  

<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="{{Asset('js/datepicker/css/datepicker.css')}}"> 
<script type="text/javascript" src="{{Asset('js/datepicker/js/bootstrap-datepicker.js')}}"></script> 

<!-- <script src="{{ Asset('js/jquery/jquery-3.1.1.min.js') }}"></script> -->
<!-- <script src="{{ Asset('js/validate/jquery.validate.js') }}"></script> -->
<!-- <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script> -->
<!-- <script type="text/javascript" src="{{Asset('jqueryui112/jquery-ui.js')}}"></script> -->


    <!-- Scripts -->
    <script>
    window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
    ]); ?>
    </script>
</head>

<body>
<div id=wrapper>
    @include('index.head')

                <script>
                  $( function() {
                    var availableTags = [
                        "An Giang",
                        "Bà Rịa - Vũng Tàu",
                        "Bắc Giang",
                        "Bắc Kạn",
                        "Bạc Liêu",
                        "Bắc Ninh",
                        "Bến Tre",
                        "Bình Định",
                        "Bình Dương",
                        "Bình Phước",
                        "Bình Thuận",
                        "Cà Mau",
                        "Cao Bằng",
                        "Đắk Lắk",
                        "Đắk Nông",
                        "Điện Biên",
                        "Đồng Nai",
                        "Đồng Tháp",
                        "Gia Lai",
                        "Hà Giang",
                        "Hà Nam",
                        "Hà Tĩnh",
                        "Hải Dương",
                        "Hậu Giang",
                        "Hòa Bình",
                        "Hưng Yên",
                        "Khánh Hòa",
                        "Kiên Giang",
                        "Kon Tum",
                        "Lai Châu",
                        "Lâm Đồng",
                        "Lạng Sơn",
                        "Lào Cai",
                        "Long An",
                       " Nam Định",
                       " Nghệ An",
                       " Ninh Bình",
                       " Ninh Thuận",
                       " Phú Thọ",
                       " Quảng Bình",
                       " Quảng Nam",
                       " Quảng Ngãi",
                       " Quảng Ninh",
                       " Quảng Trị",
                       " Sóc Trăng",
                       " Sơn La",
                       "Tây Ninh",
                       "Thái Bình",
                        "Thái Nguyên",
                        "Thanh Hóa",
                        "Thừa Thiên Huế",
                        "Tiền Giang",
                        "Trà Vinh",
                        "Tuyên Quang",
                        "Vĩnh Long",
                        "Vĩnh Phúc",
                        "Yên Bái",
                        "Phú Yên",
                        "Cần Thơ",
                        "Đà Nẵng",
                        "Hải Phòng",
                        "Hà Nội",
                        "TP HCM",
                        "Nha Trang",
                        "Đà Lạt"
                    ];
                    $( "#search" ).autocomplete({
                      source: availableTags
                    });
                  } );
                  </script>
    <div id="slide" style="background-image:url({{Asset('image/index/slide.jpg')}})">
            <div class="container">
                <div class="form_search">
                    <div class="phong">
                        <div class="phong_left"><h3>Tìm phòng</h3></div>
                        <div class="phong_right">
                        <h3>Du lịch 4 phương, Nhanh chóng</h3>
                        </div>
                    </div><!-- end phong-->
                    <table>
                        <tr>
                            <td>Bạn muốn đi đâu</td>
                            <td>Nhận phòng</td>
                            <td>Trả phòng</td>
                            <td>Du khách</td>
                            <td></td>
                        </tr>
                        <tr><form  autocomplete="false" action="{{url('indexx/getcity')}}" method="GET" >
                            <td  class="phong1">
                                <input  id="search" autofocus="true"  class="form-control " type="" name="city" placeholder="Thanh pho, khach san, diem du lich">
                            </td>
                            <td>
                                <input  class="form-control phong2" name="checkin" id="checkin"  value="{{date('d/m/Y',time()+86400)}}" readonly ='true' > 
                            </td>
                            <td>
                                <input  class="form-control phong3" name="checkout" id="checkout" value="{{date('d/m/Y',time()+172800)}}" readonly='true' >
                            </td>
                            <td><input type="number"  class="form-control phong4" name="" value=2></td>
                            <td><button  class="btn btn-primary" type="submit" name="" >Tìm kiếm</button></td>
                            </form>
                        </tr>
                    </table><!-- end table -->
                    <div class="chonloctimkiem">
                    </div>
                </div><!-- end form_search -->
            </div><!-- end container -->
    </div>
        <div class="container">
            <div id="img">
                    <div class="imgitem item1  "><img src="image/index/hochiminh.jpg"></div>
                    <div class="imgitem item2 "><img src="image/index/hanoi.jpg"></div>
                    <div class="imgitem item3 "><img src="image/index/thailan.jpg"></div>
                    <div class="imgitem item4  "><img src="image/index/dalat.jpg"></div>
                    <div class="imgitem item5 "><img src="image/index/danang.jpg"></div>
                    <div class="imgitem item6  "><img src="image/index/nhatrang.jpg"></div>
<!--                     <div class="imgitem item7  "><img src="image/index/vungtau.jpg"></div>
                    <div class="imgitem item8  "><img src="image/index/singapore.jpg"></div>
 -->
            </div>
        </div>
        <script type="text/javascript">
            $(function(){
                $('#checkout').datepicker({format: "dd/mm/yyyy", autoClose: true});
                $('#checkin').datepicker();

                $('#checkin').on('changeDate', function(ev){
                    $(this).datepicker('hide');
                }); 
                $('#checkout').on('changeDate', function(ev){
                    $(this).datepicker('hide');
                });
            });
        </script>

</div>
    
<style type="text/css">
    header{
        height: 3%
    }
</style>
</body>
</html>
