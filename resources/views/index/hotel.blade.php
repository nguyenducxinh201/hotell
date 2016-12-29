@extends('includes')
@section('head')
     <script src="{{ Asset('js/jquery/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ Asset('js/validate/jquery.validate.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{Asset('index/css/hotel.css')}}">
 
@endsection

@section('content')
<div id="wrapper">
        @include('index.head')
        <div id="index1">
            <div class="container">
                    <div class="form_search">
                        <table>
                            <tr><td></td><td></td><td></td><td></td><td></td></tr>
                            <tr>
                                <td class="phong1"><input  class="form-control "  name="city" placeholder="Thanh pho, khach san, diem du lich" value=""></td>
                                <td><input  class="form-control phong2"  name="checkin" value="{{$checkin}}"></td>
                                <td><input  class="form-control phong3"  name="checkout" value="{{$checkout}}"></td>
                                <td><input  class="form-control phong4"  name=""></td>
                                <td><button  class="btn btn-primary" type="submit" name="">Tìm kiếm</button></td>
                            </tr>
                        </table>
                        <div class="chonloctimkiem">
                        </div>
                    </div>
            </div>
        </div>
          <section class="title">
                <div class="container">
                  <p class="fg"><span style="font-size: 20px;">Khach san {{$hotel->hotel_name}} {{$hotel->city}}</span><br>
                      {{$hotel->street}}, {{$hotel->township}}, {{$hotel->city}}- <a href="">Xem ban do</a>
                  </p>

                </div>
          </section>

            <div id=slide>
                <div class="container">
                  <img src="{{asset('image/danang1.jpg')}}" >
                </div>  
            </div> 

            <div id="contain">
            <div class="container" >
                      <div id=item_room >
                              <div class="row_title">
                                  <div class="col-md-3">Loai phong</div>
                                  <div class="col-md-3">Mo ta</div>
                                  <div class="col-md-1">Suc chua</div>
                                  <div class="col-md-2">Gia Phong/dem</div>
                                  <div class="col-md-1">SL</div>
                                  <div class="col-md-2">Dat phong</div>
                              </div>

                                @foreach($roomtype as $value)
                                    <div class="roomtype">
                                      <!-- <form style="height: 100%; width: 100%" id="datphong{{$value->id}}"> -->
                                        <div class="col-md-12 room_name">{{$value->roomtype_name}}</div>
                                        <div class="row list_room">
                                            <div class="col-md-3 img"><img src="{{asset('image/danang1.jpg')}}"></div>

                                            <div class="col-md-3">
                                            <p>Huong Phong: {{$value->direct}}<br>Dien tich: {{$value->area}}m<sup>2</sup><br>
                                                Giuong: {{$value->bed_count}} {{$value->bed_type}}
                                            </p>
                                            </div>

                                            <div class="col-md-1">{{$value->guest_count}}</div>

                                            <div class="col-md-2 price"><span><strong>{{$value->day_price}}</strong> <i>VND</i></span></div>

                                            <div class="col-md-1">
                                                <input type="hidden" value="{{$value->id}}">
                                                <select class="form-control" role="{{$value->id}}" name="quantity" id="{{$value->id}}">
                                                    <option selected=""  >0</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>                                       
                                            </div>
                                            <div class="col-md-2"><button class="btn btn-prymary test" role="{{$value->id}}" >Dat phong
                                                <!-- <a href="{{route('muahang',['id'=>'1','abc'=>'ah'])}}">Dat phong</a> -->
                                                </button><br>
                                                <span>Con 3 phong</span>
                                            </div>                                 
                                        </div>
                                    <!-- </form> -->
                                    </div>
                              @endforeach 
                              <!-- <input type="submit" name="" value="submit" id="test" class="btn btn-primary"> -->
                              <!-- </form> -->
                                <p id="rs"></p>
                                <form action="{{Asset('datphong')}}" method="post">
                                 {{ csrf_field() }}
                                    <input type="hidden" name="user_id" value="Auth::user()->id">
                                    <input type="submit" name="" value="Dat Phong">
                                </form>
                                <script type="text/javascript">
                                        $.ajaxSetup({
                                          headers:
                                              { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                                      });

    $('.test').click(function(){
            var roomtype_id=$(this).attr('role');
            var quantity=$("select[id="+roomtype_id+"]").val();

            if(quantity>0){
                    $.ajax({
                        type: 'POST',
                        url: '{{url('c')}}',
                        data:{
                            roomtype_id: roomtype_id,
                            quantity:quantity,
                            checkin:"{{$checkin}}",
                            checkout:"{{$checkout}}",
                            hotel_id: "{{$hotel->id}}"
                        }
                        ,
                        dataType:'text', // data will return
                        success: function(data){
                            $('#rs').append(data);
                        },
                        error: function(){
                            $('#rs').append('error');
                        }
                    });
            }
    });
                                </script>
                         </div>
            </div> 
      </div>  
      </div>

@endsection