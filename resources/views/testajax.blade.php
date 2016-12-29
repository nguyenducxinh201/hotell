@extends('app.common')
@section('head')

@endsection

@section('content')
<style type="text/css">
    ul{
        list-style: none;
    }
    .ui-autocomplete li:hover{
        cursor: pointer;

    }
</style>
<div class="container">

    <input id="search" type="text" name="key" >

    <button class="btn btn-primary both">both Method</button>

    <div id="result_both">
        Both:
    </div>
</div>

<script type="text/javascript">
    $.ajaxSetup({
        headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    //-------------------------------------- 
    $(document).ready(function()
    {
        $( "input#search" ).autocomplete({ 
            source:'abc', 
        });
    });

    // $.post('countries',function(data){
    //     $('#search').attr('data-source',data);
    // })

    //--------------------------------------
    $('.both').click(function(){
        $.ajax({
            type: 'POST',
            url: 'testbothajax',
            data:{
                id:"1",
                email:"ducxinh@gmail.com"
            },
            dataType:'text', // data will return
            success: function(data){
                $('#result_both').append(data);
            },
            error: function(){
                $('#result_both').append('error');
            }
        });
    });


</script>
@endsection