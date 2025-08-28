// function fillDropDownLoad(selectedcategoryid){
//   if($.cookie('countrycookie') && $.cookie('countrycookie') != '-1' && $.cookie('citycookie') && $.cookie('citycookie') != '-1')
//   {
//     window.location = '/categoryproduct/'+selectedcategoryid;
//   }
//   else{
//     $('.cakeModal').modal('show');
//     var base_url = window.location.origin;
//     var html = '<div class="modal-dialog modal-lg modal-dialog-centered">';
//     html += '<div class="modal-dialog modal-dialog-centered modal-lg"><div class="modal-content" style="margin: auto; width:800px;">';
//     html += '<div class="modal-body" style="padding:4px; border: 4px solid #c452a3;">';
//     html += '<div class="row m-0">';
//     html += '<div class="col-12 col-md-6 col-lg-6" style="background-repeat: no-repeat; background-image:url(&quot;';
//     html +=  base_url;
//     html += '/images/frontend_images/Banner-popup.jpeg")&quot;);">';
//     html += '</div>';
//     html += '<div class="col-12 col-md-6 col-lg-6" style="padding:0px;">';
//     html += '<button type="button" class="close" id="modalclosebtn" onclick="modalclose()">&times;</button>';
//     html += '<div style="padding: 0px; display:block; margin:auto; text-align:center;">'
//     html += '<img style="width:150px;" src="'
//     html += base_url
//     html += '/images/frontend_images/lilac2express-logo100x100.png">';
//     html += '</div>';
//     html += '<div class="modal-header" style="padding:0.5rem; background:white; border-radius:0px;">';
//     html += '<h4 class="modal-title" style="font-size:1rem; color:#b84691;">SHIP TO</h4>';
//     html += '</div>';
//     html += '<form action="" class="form-horizontal">';
//     html += '<div class="form-row" style="margin: 0px;background: #c452a3;padding: 5% 15%;">';
//     html += '<div class="form-group col-md-12">';
//     html += '<select class="form-control form-control-sm select-country-option" onchange="populatepopup()" id="selectcountry" name="cake_country" onchange="">';
//     html += '<option value="-1">Select Country</option>';
//     html += '</select>';
//     html += '</div>';
//     html += '<div class="form-group col-md-12">';
//     html += '<select class="form-control form-control-sm select-city-option" id="selectcity" name="cake_city" onchange="">';
//     html += '<option value="-1">Select City</option>';
//     html += '</select>';
//     html += '</div>';
//     html += '</div>';
//     html += '<div style="padding:0.5rem; background:white; border-radius:0px; text-align:center;">';
//     html += '<button type="button" class="btn btn-sm" style="width:123px; background-color:#f7941d; color:#ffffff; border-radius:0; margin-right:5px;" data-dismiss="modal" onclick="modalclose()">Cancel</button>';
//     html += '<button type="button" onclick="categoryProduct(';
//     html += selectedcategoryid;
//     html += ')" class="btn btn-sm" style="width:123px; background-color:#c452a3; color:#ffffff; border-radius:0;">Select</button>';
//     html += '</div>';
//     html += '</div>';
//     html += '</form>';
//     html += '</div>';
//     html += '</div>';
//     html += '</div>';
//     html += '</div>';
//     html += '</div>';
//     $('#cakeModal').append(html);
//     $(".select-country-option").select2({
//     placeholder: "Select Country",
//     allowClear: true
//     });
//     $(".select-city-option").select2({
//     placeholder: "Select City",
//     allowClear: true
//     });
//     ddpopulate(selectedcategoryid);
//   }
// }

// function ddpopulate(selectedcategory){

//   if($.cookie('countrycookie') && $.cookie('countrycookie') != '-1' && $.cookie('citycookie') && $.cookie('citycookie') != '-1')
//   {
//     window.location = '/categoryproduct/'+selectedcategory;
//   }
//          $.ajax({
//            url: '/countryname',
//            type: 'get',
//            dataType: 'json',
//            success: function(result){
//             var countrydd = document.getElementById("selectcountry");
//             $(countrydd).empty();
//             for(var option =0; option<result.length; option++)
//             {
//                 if( option==0)
//                 {
//                     var newOption = document.createElement("option");
//                     newOption.value = -1;
//                     newOption.innerHTML = 'Select Country';
//                     countrydd.options.add(newOption);
//                 }
//                 var newOption = document.createElement("option");
//                 if(result[option]['id'] == $.cookie('countrycookie'))
//                 {
//                     newOption.selected = true;
//                 }
//                 newOption.value = result[option]['id'];
//                 newOption.innerHTML = result[option]['name'];

//                 countrydd.options.add(newOption);
//             }

//         }
//         ,
//         error: function (errormessage) {
//                 alert('error!');
//             }
//     });
// }
// // $('#modalclosebtn' ).click(function()
// //  {
// //     console.log('Hello');
// //     $('#cakeModal').modal('hide');
// //  });
// function modalclose()
// {
//   // $('#cakeModal').modal('hide');
//   $('.cakeModal').modal('toggle');
//   $('.cakeModal').html('');
//   // $('#cakeModal').hide();
//   // $("#cakeModal").modal({backdrop: false});
//   // $('#cakeModal').removeClass('modal');
//   // alert('Pagal');
//   // var aa = document.getElementById('cakeModal');
//   // console.log('hello');
//   // aa.modal('hide');
// }

// $( document ).ready(function() {
//     $(".select-one").select2({
//     placeholder: "Select Country",
//     allowClear: true
//     });
//     $(".select-two").select2({
//     placeholder: "Select City",
//     allowClear: true
//     });


// });


// $(document).ready(function(){
//          $.ajax({
//            url: '/countryname',
//            type: 'get',
//            dataType: 'json',
//            success: function(result){
//             var countrydd = document.getElementById('sl-country');
//             for(var option =0; option<result.length; option++)
//             {
//                 var newOption = document.createElement("option");
//                 if(result[option]['id'] == $.cookie('countrycookie'))
//                 {
//                     newOption.selected = true;
//                 }
//                 newOption.value = result[option]['id'];
//                 newOption.innerHTML = result[option]['name'];

//                 countrydd.options.add(newOption);
//             }
//         }
//     });

//     if($.cookie('countrycookie') && $.cookie('countrycookie') != '-1')
//     {
//         $('#sl-city').removeAttr('disabled');
//         if($.cookie('citycookie') && $.cookie('citycookie') != '-1')
//         {
//             $('#search-product').removeAttr('disabled');
//         }
//          $.ajax({
//            url: '/cityname/'+$.cookie('countrycookie'),
//            type: 'get',
//            dataType: 'json',
//            success: function(result){
//             var citydd = document.getElementById('sl-city');
//             for(var option =0; option<result.length; option++)
//             {
//                 if( option==0)
//                 {
//                     var newOption = document.createElement("option");
//                     newOption.value = '-1';
//                     newOption.innerHTML = 'Select City';
//                     citydd.options.add(newOption);
//                 }
//                 var newOption = document.createElement("option");
//                 if(result[option]['id'] == $.cookie('citycookie'))
//                 {
//                     newOption.selected = true;
//                 }
//                 newOption.value = result[option]['id'];
//                 newOption.innerHTML = result[option]['name'];
//                 citydd.options.add(newOption);
//             }
//         },
//         error: function (errormessage) {
//                 alert('error!');
//             }
//     });

//     }

// });


//   $('#sl-country').change(function() {
//     var value = $('#sl-country').val();
//     var countrycookie = $.cookie('countrycookie',value);
//     document.cookie = "citycookie= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
//     if (value == ""){
//         $('#sl-city').attr('disabled', 'disabled');
//         $('#search-product').attr('disabled', 'disabled');
//     }
//     if(!$.cookie('citycookie'))
//     {
//         $('#search-product').attr('disabled', 'disabled');
//     }
//     if (value == "-1"){
//         $('#sl-city').attr('disabled', 'disabled');
//         $('#search-product').attr('disabled', 'disabled');
//     }

//     else{
//         $('#sl-city').removeAttr('disabled');
//         }

// });
// $('#sl-city').change(function() {
//   var ivalue = $('#sl-city').val();
//   var citycookie = $.cookie('citycookie',ivalue);
//   if (ivalue == ""){
//       $('#search-product').attr('disabled', 'disabled');
//   }
//     if (ivalue == '-1'){

//         // alert('here');
//       $('#search-product').attr('disabled', 'disabled');
//   }
//   else{

//         // alert(citycookie);
//       $('#search-product').removeAttr('disabled');
//       }

// });

//     function populate(s1,s2)
// {
//     var cc = '#'+s1;
//     if($.cookie('countrycookie')){
// var countryid = $.cookie('countrycookie');
//     }else{
//        var countryid = $(cc).val();
//     }
//     if(countryid!= -1){

//          $.ajax({
//            url: '/cityname/'+countryid,
//            type: 'get',
//            dataType: 'json',
//            success: function(result){
//             var citydd = document.getElementById(s2);
//             $(citydd).empty();
//             for(var option =0; option<result.length; option++)
//             {
//                 if( option==0)
//                 {
//                     var newOption = document.createElement("option");
//                     newOption.value = -1;
//                     newOption.innerHTML = 'Select City';
//                     citydd.options.add(newOption);
//                 }
//                 var newOption = document.createElement("option");
//                 newOption.value = result[option]['id'];
//                 newOption.innerHTML = result[option]['name'];
//                 citydd.options.add(newOption);
//             }
//         },
//         error: function (errormessage) {
//                 alert('error!');
//             }
//     });
// }else{
//     $('#sl-city').empty();
// }

// }

// function populatepopup()
// {
//     var countryid = $('#selectcountry').find(":selected").val();
//     if(countryid!= -1){
//          $.ajax({
//            url: '/cityname/'+countryid,
//            type: 'get',
//            dataType: 'json',
//            success: function(result){
//             var citydd = document.getElementById("selectcity");
//             $(citydd).empty();
//             for(var option =0; option<result.length; option++)
//             {
//                 if( option==0)
//                 {
//                     var newOption = document.createElement("option");
//                     newOption.value = -1;
//                     newOption.innerHTML = 'Select City';
//                     citydd.options.add(newOption);
//                 }
//                 var newOption = document.createElement("option");
//                 newOption.value = result[option]['id'];
//                 newOption.innerHTML = result[option]['name'];
//                 citydd.options.add(newOption);
//             }
//         },
//         error: function (errormessage) {
//                 alert('error!');
//             }
//     });
// }else{
//     $('.selectcity').empty();
// }

// }

// function categoryProduct(categoryid){

// var checkcountry = $('#selectcountry').find(":selected").val();
// var checkcity = $('#selectcity').find(":selected").val();
// /*
// // var existingCookie = $.cookie('citycookie');
// //             debugger;
// //             if (existingCookie != undefined && existingCookie != "" && existingCookie != null)
// //             {

// //             }
// //             else
// //             {
// //                 $.cookie('citycookie',checkcity);
// //             }
// */
// $.cookie('citycookie',checkcity);
// $.cookie('countrycookie',checkcountry);
// window.location = '/categoryproduct/' + categoryid;
// }

//Product Rating Script Muzaffar 21-08-2019
// function ratingstar(userid,productid,star){
//     $.ajaxSetup({
//       headers: {
//           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//       }
//     });
//     $.ajax({
//         url: "/postproductratings",
//         type: "post",
//         data: {user_id:userid,p_id:productid,star:star},
//         success: function (response) {
// 			console.log(response);
//            // You will get response from your PHP page (what you echo or print)
//         },
//         error: function(jqXHR, textStatus, errorThrown) {
//            console.log(textStatus, errorThrown);
//         }
//     });
//  }

// function comments(userid,productid){
// var comment = $('#txtcomment').val();
// $('#btncomment').attr('disabled',true);
//     $.ajaxSetup({
//       headers: {
//           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//       }
//     });
//     $.ajax({
//         url: "/postproductreviews",
//         type: "post",
//         data: {user_id:userid,p_id:productid,comment:comment},
//         success: function (response) {
// 		console.log(response);
//            // You will get response from your PHP page (what you echo or print)
//         },
//         error: function(jqXHR, textStatus, errorThrown) {
//            console.log(textStatus, errorThrown);
//         }
//     });
 // }
