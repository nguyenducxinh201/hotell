@extends('layouts.template_admin')

@section('main-content')
    <div id="bookroom-hotel">
    <h2>Thong tin khach hang</h2>
 
    <form class="form" action="{{url('ksdatphong')}}" method="post">
    {{csrf_field() }}
        <div class="row">
            <div class="col-md-5">
                <label>Name</label>
                <input type="" name="name" class="form-control" >
            </div>
            <div class="col-md-5">
                <label>Cmnd</label>
                <input type="number" name="cmnd" class="form-control">
            </div>

            <div class="col-md-5">
                <label>SDT</label>
                <input type="number" name="phone" class="form-control">
            </div>

            <div class="col-md-5">
                <label>Dia chi</label>
                <input type="" name="address" class="form-control" >
            </div>
            <div class="col-md-5">
                <label>Ngay sinh</label>
                <input type="text" name="dob" class="form-control" id="dob">
            </div>
            <div class="col-md-5">
                <label>Email</label>
                <input type="" name="email" class="form-control">
             </div>
         </div>

         <div class="row">  
               <h2>Thong tin check-in</h2>
                <div class="col-md-5">
                    <label>Ngay hen Nhan</label>
                    <input  name="ngayhennhan" class="form-control" id="checkin" readonly ='true' value="{{date('d-m-Y',time())}}">
                </div>
                <div class="col-md-5">
                    <label>Ngay Hen tra</label>
                    <input  name="ngayhentra" class="form-control" id="checkout" readonly ='true' value="{{date('d-m-Y',time()+86400)}}">
                </div>
                                <div class="room">
                                    <div class="col-md-5  bbb">
                                    <label>Loai Phong</label>
                                    <select type="" name="roomtype_id[]" class="form-control">
                                    @foreach($room as $value)
                                            <option value="{{$value->id}}">{{$value->roomtype_name}}</option>
                                    @endforeach
                                    </select>
                                    </div>
                                    <div class="col-md-5">
                                    <label>SL</label>
                                    <input type="number" name="quantity[]" class="form-control">
                                    </div>
                                </div><!--end rooom -->
                                <div class="room" style="display: none">
                                    <div class="col-md-5  bbb">
                                    <label>Loai Phong</label>
                                    <select type="" name="roomtype_id[]" class="form-control aa">
                                    @foreach($room as $value)
                                            <option value="{{$value->id}}">{{$value->roomtype_name}}</option>
                                    @endforeach
                                    </select>
                                    </div>
                                    <div class="col-md-5">
                                    <label>SL</label>
                                    <input type="number" name="quantity[]" class="form-control">
                                    </div>
                                </div><!--end rooom -->
                                <div class="room" style="display: none;">
                                    <div class="col-md-5  bbb">
                                    <label>Loai Phong</label>
                                    <select type="" name="roomtype_id[]" class="form-control aa">
                                     @foreach($room as $value)
                                            <option value="{{$value->id}}">{{$value->roomtype_name}}</option>
                                    @endforeach                                       
                                    </select>
                                    </div>
                                    <div class="col-md-5">
                                    <label>SL</label>
                                    <input type="number" name="quantity[]" class="form-control">
                                    </div>
                                </div><!--end rooom -->
                     
                        <button type="button" id="abc">them</button>

                        <script type="text/javascript">
                            $('#abc').click(function(){
                                    $('.room').each(function(){
                                        var x= $(this).css('display');
                                        if($(this).css('display')=='none'){
                                            $(this).css('display','block');
                                            return false;
                                        }
                           });     
                            });
                           
                        </script>

                    <div class="col-md-10">
                    <label>Tien coc</label>
                    <input type="number" name="tiencoc" class="form-control">
                 </div>
            </div>
                <div style="margin-top:20px; width:82%">
                    <input type="submit" name="" value="submit" class="btn btn-success form-control ">
                </div>
    </form>
    </div>


                <script type="text/javascript">
                $(function(){
                    $('#checkout').datepicker({format: "dd/mm/yyyy", autoClose: true});
                    $('#checkin').datepicker({format: "dd/mm/yyyy", autoClose: true});
                    $('#dob').datepicker({format: "dd/mm/yyyy", autoClose: true});

                    $('#checkin').on('changeDate', function(ev){
                        $(this).datepicker('hide');
                    }); 
                    $('#checkout').on('changeDate', function(ev){
                        $(this).datepicker('hide');
                    });
                });
            </script>
@endsection