<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>


<body>






    <div class="control-group">
        <div class="controls">
            <span>Country Name: </span>
            <select class="countrycity" name="country_id" id="country_id"style="width: 220px;">
              <option value="0" disabled="true" selected="true" >--select country--</option>
                @foreach($countries as $cont)
                    <option value="{{$cont->id}}">{{$cont->name}}</option>
                @endforeach

            </select>

            <br>
            <span> City name: </span>
            <select style="width: 220px;" class="cityname">
                <option value="0" disabled="true" selected="true" >--select city--</option>
                {{--                <option></option>--}}
            </select>
            <br>



            <div class="input-group">
{{--                <span> product name: </span>--}}
                <input type="search" name="search_pro" id="search_pro"  class="form-control" placeholder="Search Products" />

            <span class="input-group-prepend">
                <button id="text_value"  class="btn btn-primary">
                    search
                </button>
            </span>

            </div>

        </div>
    </div>







    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script type="text/javascript">

        // for country to state
        $(document).ready(function () {

            $(document).on('change','.countrycity',function () {
                // console.log('jhjk');
                var cont_id=$(this).val();
                console.log(cont_id);
                var div=$(this).parent();
                var op=" ";
                //country to state
                $.ajax({
                    type:'get',
                    url:'{!! URL::to('/subadmin/findcityname') !!}',
                    data:{'id':cont_id },
                    success:function (data) {
                        // console.log('done');
                        // console.log(data);
                        // console.log(data.length);

                        op+='<option value="0" selected disabled>chose city</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                        }

                        // console.log(data);
                        div.find('.cityname').html('');
                        div.find('.cityname').append(op);

                    },
                    error:function () {

                    }
                });




            })
        });




        // Function to get input value.

        var city_id;
            $(document).ready(function() {
            $(document).on('change','.cityname',function (){
            city_id=$(this).val();
            console.log(city_id);



            });
        });



            $('#text_value').click(function () {
                //id
                var text_value = $("#search_pro").val();
                if (text_value == '') {
                    alert("Enter Some Text In Input Field");
                } else {

                    $.ajax({
                        url:'{!! URL::to('/subadmin/productname') !!}',
                        method:'get',
                        data :{
                            'search':text_value,
                            'id':city_id,
                        },
                        success:function (data){
                        alert(data)
                        },
                        error:
                            function (data) {
                                alert('not found')
                            }
                    });

                }

            });
            // debugger;

        // $(document).read(function () {
        //     $(#text_value).click('change','.form-control',function () {
        //        console.log('dsadas');
        //     });
        //
        // });






        {{--$(document).ready(function () {--}}

        {{--    $(document).on('change','.cityname',function () {--}}

        {{--        var city_id=$(this).val();--}}
        {{--        console.log(city_id);--}}



        {{--        --}}{{--                function fetch_product(query ='') {--}}
        {{--        --}}{{--     debugger;--}}
        {{--        --}}{{--    $.ajax({--}}
        {{--        --}}{{--        url:'{!! URL::to('/subadmin/productname') !!}',--}}
        {{--        --}}{{--        method:'get',--}}
        {{--        --}}{{--        data:{--}}
        {{--        --}}{{--            query:query--}}
        {{--        --}}{{--        },--}}
        {{--        --}}{{--        dataType:'json',--}}
        {{--        --}}{{--        success:function(data){--}}
        {{--        --}}{{--            $('tbody').html(data.table_data);--}}
        {{--        --}}{{--        }--}}
        {{--        --}}{{--    })--}}
        {{--        --}}{{--}--}}
        {{--        //             $(document).on('keyup', '#search_pro', function(){--}}
        {{--        //                 var query = $(this).val();--}}
        {{--        //                 // var city_id = $(this).val();--}}
        {{--        //                 fetch_product(query);--}}
        {{--        //             });--}}



        {{--        //     })--}}
        {{--        // });--}}



        {{--    })--}}
        {{--});--}}






    </script>


</body>
</html>
