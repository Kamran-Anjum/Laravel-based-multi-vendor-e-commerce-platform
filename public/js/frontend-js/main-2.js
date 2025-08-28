$().ready(function(){
	$("#registerForm").validate({
		rules:{
			username:{
				required:true,
				minlength:2,
				// lettersonly:true
			},
			password1:{
				required:true,
				minlength:6
			},
			cell:{
				required:true,
				minlength:14,
				maxlength:14
			},
			email:{
				required:true,
				email:true,
				remote:"/check-email"
			},
			fname:{
				required:true
			}
		},
		messages:{
			username: "Please enter your Username",
			password1:{
				required: "Please Provide your Password",
				minlength: "Your Password must be atleast 6 characters long"
			},
			email:{
				required: "Please enter your Email",
				email: "Please enter valid Email",
				remote: "Email already exists!"
			}				
		}

	});

	$("#add_product").validate({
		rules:{
			fname:{
				required:true,
				minlength:2
				// lettersonly:true
			},
			lname:{
				required:false,
				minlength:2
				// lettersonly:true
			},
			cell:{
				required:true,
				minlength:14,
				maxlength:14
			},
			email:{
				required:true,
				email:true
				// remote:"/check-email"
			}
		},
		messages:{
			fname: "Please enter your Username",
			cell:{
				required: "Please Provide your Cell No.",
				minlength: "Your cell no. must be atleast 14 characters long"
			},
			  //    country: {
     //  required: "Please select an option from the list, if none are appropriate please select 'Other'",
     // },
     // 			     state: {
     //  required: "Please select an option from the list, if none are appropriate please select 'Other'",
     // },
			email:{
				required: "Please enter your Email",
				email: "Please enter valid Email",
				remote: "Email already exists!"
			}				
		}

	});
// login form validations
	$("#loginForm").validate({
		rules:{
			email:{
				required:true,
				email:true
			},
			password:{
				required:true
			}
		},
		messages:{
			email:{
				required: "Please enter your Email",
				email: "Please enter valid Email"
			},
			password:{
				required: "Please Provide your Password"
			}
				
		}

	});
	$('#myPassword').passtrength({
          minChars: 4,
          passwordToggle: true,
          tooltip: true,
          eyeImg : "/images/frontend_images/eye.svg"
        });
		$('#newPassword').passtrength({
          minChars: 6,
          passwordToggle: true,
          tooltip: true,
          eyeImg : "/images/frontend_images/eye.svg"
        });
	$("#customer_password_validate").validate({
		rules:{
			currentPassword:{
				required: true,
				minlength:6,
				maxlength:20
			},
			newPassword:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirmPassword:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#newPassword"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$("#edit_MyAccount").validate({
		
		rules:{
			fname:{
				required:true,
				minlength:2
				// lettersonly:true
			},
			lname:{
				required:false,
				minlength:2
				// lettersonly:true
			},
			cell:{
				required:true,
				minlength:14,
				maxlength:14
			},
			email:{
				required:true,
				email:true
				// remote:"/check-email"
			},
			shippingAddress:{
				required:true,
				minlength:20
				// lettersonly:true
			},
			billingAddress:{
				required:true,
				minlength:20
				// lettersonly:true
			}
		},
		messages:{
			fname: "Please enter your First Name",
			lname: "Please enter your Last Name",
			cell:{
				required: "Please Provide your Cell No.",
				minlength: "Your cell no. must be atleast 14 characters long"
			},
			shippingAddress: "Please enter your Shipping Address",
			billingAddress: "Please enter your Billing Address"
		}
	});

	$("#add_shop").validate({
        errorPlacement: function errorPlacement(error, element) {
             element.before(error); 
        },
		rules:{
			email:{
				required:true,
				email:true,
				remote:"/check-email"
			},
			password:{
				required:true,
				minlength:6
			},
			country:{
				required:true
			},
			city:{
				required:true
			},
			store_name:{
				required:true
			},
			company_legal_name:{
				required:true
			},
			product_kind:{
				required:true
			},
			full_address:{
				required:true
			},
			trade_license:{
				required:true
			},
			national_id:{
				required:true
			},
			beneficiary_name:{
				required:true
			},
			bank_name:{
				required:true
			},
			barnch_name:{
				required:true
			},
			account_number:{
				required:true
			},
			iban_number:{
				required:true
			},
			swift_code:{
				required:true
			},
			currency:{
				required:true
			},
			stemped_doc:{
				required:true
			},
			tax_reg_number:{
				required:true
			},
			tax_reg_certificate:{
				required:true
			},
			password:{
				required:true,
				minlength:6
			},
			email:{
				required:true,
				email:true,
				remote:"/check-email"
			},
		},
		messages:{
			password:{
				required: "Please Provide your Password",
				minlength: "Your Password must be atleast 6 characters long"
			},
			email:{
				required: "Please enter your Email",
				email: "Please enter valid Email",
				remote: "Email already exists!"
			}				
		},
        onfocusout: function(element) {
            $(element).valid();
        },
        highlight : function(element, errorClass, validClass) {
            $(element.form).find('.actions').addClass('form-error');
            $(element).removeClass('valid');
            $(element).addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element.form).find('.actions').removeClass('form-error');
            $(element).removeClass('error');
            $(element).addClass('valid');
        }

	});

	// frontend start code by adil
	$(document).on('change',".frontend_country_class",function () {
        var country_id = $(this).val();

        $('#city_id').html("");
        if(country_id == 0 || country_id == '0'){
        	$('#city_id').html("<option value='0'>All Cities</option>");
        	$("#country_city_session_id").prop('disabled', true);
        }else{
	        $.ajax({
	            url: '/frontend/cityname/'+country_id,
	            success: data => {
	            	console.log(data);
	                for(var option =0; option<data.length; option++)
	                {
	                  var newOption = document.createElement("option");
	                  newOption.value = data[option]['id'];
	                  newOption.innerHTML = data[option]['name'];
	                  $("#city_id").append('<option value='+data[option].id+'>'+ data[option].name +'</option>')
	                }
	            }
	        });

	        $("#country_city_session_id").prop('disabled', false);
    	}
    });

    $(document).on('change',".frontend_customer_country_class",function () {
        var country_id = $(this).val();

        $('#customer_city_id').html("");
        $.ajax({
            url: '/frontend/customer/cityname/'+country_id,
            success: data => {
            	console.log(data);
            	$("#customer_city_id").append("<option selected value='0' disabled>Select City</option>");
                for(var option =0; option<data.length; option++)
                {
                  var newOption = document.createElement("option");
                  newOption.value = data[option]['id'];
                  newOption.innerHTML = data[option]['name'];
                  $("#customer_city_id").append('<option value='+data[option].id+'>'+ data[option].name +'</option>')
                }
            }
        });

        $('#customer_state_id').html("");
        $.ajax({
            url: '/frontend/customer/statename/'+country_id,
            success: data => {
            	console.log(data);
            	$('#customer_state_id').html("<option value='0'>Select State (optional)</option>");
                for(var option =0; option<data.length; option++)
                {
                  var newOption = document.createElement("option");
                  newOption.value = data[option]['id'];
                  newOption.innerHTML = data[option]['name'];
                  $("#customer_state_id").append('<option value='+data[option].id+'>'+ data[option].name +'</option>')
                }
            }
        });
    });

	$(document).on('change',".frontend_customer_state_class",function () {
	    var state_id = $(this).val();
	    var country_id = $("#country_id").val();

	    $('#customer_city_id').html("");
	    if(state_id != 0 || state_id != "0"){
		    $.ajax({
		        url: '/frontend/customer/statecityname/'+state_id,
		        success: data => {
	            	$("#customer_city_id").append("<option selected value='0' disabled>Select City</option>");
		            for(var option =0; option<data.length; option++)
		            {
			            var newOption = document.createElement("option");
			            newOption.value = data[option]['id'];
			            newOption.innerHTML = data[option]['name'];
			            $("#customer_city_id").append('<option value='+data[option].id+'>'+ data[option].name +'</option>')
		            }
		        }
		    })
		}else{
	        $.ajax({
	            url: '/frontend/customer/cityname/'+country_id,
	            success: data => {
	            	console.log(data);
	            	$("#customer_city_id").append("<option selected value='0' disabled>Select City</option>");
	                for(var option =0; option<data.length; option++)
	                {
	                  var newOption = document.createElement("option");
	                  newOption.value = data[option]['id'];
	                  newOption.innerHTML = data[option]['name'];
	                  $("#customer_city_id").append('<option value='+data[option].id+'>'+ data[option].name +'</option>')
	                }
	            }
	        });
		}
	});

	// only one select
	$(document).on('change',".frontend_customer_city_class",function () {
	    var state_id = $(this).val();

	    $('#customer_area_id').empty();
	    $.ajax({
	        url: '/frontend/customer/getcityareas/'+state_id,
	        success: data => {
	            var citydd = $("#customer_area_id").html();

                $("#customer_area_id").append('<option>Select Area</option>');
	            console.log(data + citydd);
	            for(var option =0; option<data.length; option++)
	            {
		            var newOption = document.createElement("option");
		            newOption.value = data[option]['id'];
		            newOption.innerHTML = data[option]['name'];
		            $("#customer_area_id").append('<option value='+data[option].id+'>'+ data[option].name +'</option>')
	            }
	        }
	    })
	});

    $(document).on('click',".language_class",function () {
	    var lang_code = $(this).html();
	    if (lang_code == "English") {
	    	code = "en"; 
	    } else {
	    	code = "ar"; 
	    }

	    var url = window.location.href;
	    console.log(lang_code);
	    console.log(url);
	    if(url.indexOf("/en/") != -1){
	    	var drived_url = url.split("/en/");
	    	var url1 = drived_url[0];
	    	var url2 = drived_url[1];
	    }
	    else
	    if(url.indexOf("/ar/") != -1){
	    	var drived_url = url.split("/ar/");
	    	var url1 = drived_url[0];
	    	var url2 = drived_url[1];
	    }

	    $.ajax({
	        url: '/getLanguageCode/'+code,
	        success: data => {
	        	var cur_url = url1+"/"+data+"/"+url2;
	        	// var cur_url = url1+data;
	        	window.location.href = cur_url;
	        }
	    });
	});

	$(document).on('click',"#v-pills-home-tab",function () {

	    var category_id = $(this).attr('get-cat-id');
	    console.log(category_id);
	    $.ajax({
	        url: '/get-sub-category/'+category_id,
	        success: data => {
	        	console.log(data);
	        	$("#show-sub-category").html('');
	        	$("#show-sub-category").append(data);
	        }
	    });
	});

	$(window).on('load', function() {
		$.ajax({
          	url: '/frontend/checkCountryCitySession',
          	success: data => {
          		console.log(data);
          		if(data == 0){

		          	setTimeout(function() {
				        $('.cityyModal').modal('show');
				    }, 1000);
	          	}
          	}
	    });
	});

	$(document).on('click',".country_city_session_class",function () {
	    var country_id = $("#country_id").val();
	    var city_id = $("#city_id").val();

	    $.ajax({
	        url: '/frontend/addCountryCitySession/'+country_id+'/'+city_id,
	        success: data => {
	            location.reload();
	        }
	    });
	});

	// shipping cost according zone/area
	// only one select
	$(document).on('change',"#customer_area_id",function () {
	    var area_id = $(this).val();
	    var total_weight = $("#over_total_weight").val();
	    console.log(total_weight);

	    $('#shipping').empty();
	    $.ajax({
	        url: '/frontend/customer/getcityareasshippingcost/'+area_id+'/'+total_weight,
	        success: data => {
	        	// console.log(data);
	            // $("#shipping").html(data);
	            for(var option =0; option<data.length; option++)
	            {

	            	var cost = data[option].cost;

	            	// var main_total = total_amount + cost;
	        		// console.log(main_total);
		            $("#shipping").html(data[option].cost);
		            $("#shippingCost").val(data[option].cost);
		            // $("#total_with_shipping").html(data[option].shippingCost);

		            var vat_value = $("#vat_value").val();
				    var sum=0;
				    $(".tot").each(function(){
				        sum+=parseFloat($(this).text());
				    })

				    var sum_one = sum / 100;
				    var vat_amount = sum_one * vat_value;

				    var total = parseInt(sum) + parseInt(cost) + parseInt(vat_amount);
				    $(".totalId").html('');
				    $(".totalId").html(total);

	            }
	        }
	    })
	});

	$(document).on('load',"#shipping",function () {
	    var area_id = $(this).val();
	    var total_amount = $("#overalltotal").val();
	    console.log(area_id);
	    console.log(total_amount);

	    
	});


	// front support chat send msg on click
	$(document).on('click',"#msg_Send",function () {
	    var front_user = $("#front_user").val();
	    var to_id = $("#admin").val();
	    var message = $("#message").val();

	    $.ajaxSetup({
		      headers: {
		          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		      }
		  });

	    $.ajax({
	    	type: 'POST',
	        url: '/send/support-chat/msgs',
           	data: {
           		front_user:front_user,
           		message:message, 
           		to_id:to_id
           	},

           	success: function( msg ) {
               	console.log( msg );

               	$("#message").val('');

               	// for view msg
               	var html = '';
				$("#view_chats").empty();
			    $.ajax({
			        url: '/get/support-chat/msgs',
			        success: data => {
			        	// console.log(data);
			            for(var option =0; option<data.length; option++)
			            {
			            	var msg = data[option].message;
			            	var msg_by = data[option].msg_by;
				            console.log(msg);
				            console.log(msg_by);
				            if (msg_by == 1 || msg_by == '1') {
				            	html += '<p class="chat chat-left" >'+msg+'</p>';
				            } else {
				            	html += '<p class="chat chat-right" >'+msg+'</p>';
				            }
				             
			            }
			            
			            $("#view_chats").append(html);
			        }
			    })

           	}

	    })

	});

	// front support chat send msg on key press enter
	$('#message').keyup(function(e) {

	  	if (e.keyCode == 13) {

	  		var front_user = $("#front_user").val();
		    var to_id = $("#admin").val();
		    var message = $("#message").val();

		    $.ajaxSetup({
			      headers: {
			          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			      }
			  });

		    $.ajax({
		    	type: 'POST',
		        url: '/send/support-chat/msgs',
	           	data: {
	           		front_user:front_user,
	           		message:message, 
	           		to_id:to_id
	           	},

	           	success: function( msg ) {
	               console.log( msg );

	               $("#message").val('');

	               // for view msg
	               	var html = '';
					$("#view_chats").empty();
				    $.ajax({
				        url: '/get/support-chat/msgs',
				        success: data => {
				        	// console.log(data);
				            for(var option =0; option<data.length; option++)
				            {
				            	var msg = data[option].message;
				            	var msg_by = data[option].msg_by;
					            console.log(msg);
					            console.log(msg_by);
					            if (msg_by == 1 || msg_by == '1') {
					            	html += '<p class="chat chat-left">'+msg+'</p>';
					            } else {
					            	html += '<p class="chat chat-right">'+msg+'</p>';
					            }
					             
				            }
				            $("#view_chats").append(html);
				        }
				    })

	           	}

		    })

	  	}

	});

	// fornt support chat msgs get
	$(document).on('click',"#open_chats",function () {

		var html = '';
		$("#view_chats").empty();
	    $.ajax({
	        url: '/get/support-chat/msgs',
	        success: data => {
	        	// console.log(data);
	            for(var option =0; option<data.length; option++)
	            {
	            	var msg = data[option].message;
	            	var msg_by = data[option].msg_by;
		            console.log(msg);
		            console.log(msg_by);
		            if (msg_by == 1 || msg_by == '1') {
		            	html += '<p class="chat chat-left" >'+msg+'</p>';
		            } else {
		            	html += '<p class="chat chat-right" >'+msg+'</p>';
		            }
		             
	            }
	            $("#view_chats").append(html);
	        }
	    })
	    
	});

	// $(document).ready(function(){

	// 	getmsg();

	// 	function getmsg(){
	// 		$.ajax({
	// 			url: '/get/support-chat/msgs',
	// 	        success: data => {
	// 	        	// console.log(data);
	// 	            for(var option =0; option<data.length; option++)
	// 	            {
	// 	            	var msg = data[option].message;
	// 	            	var msg_by = data[option].msg_by;
	// 		            console.log(msg);
	// 		            console.log(msg_by);
	// 		            if (msg_by == 1 || msg_by == '1') {
	// 		            	html += '<p class="chat chat-left" >'+msg+'</p>';
	// 		            } else {
	// 		            	html += '<p class="chat chat-right" >'+msg+'</p>';
	// 		            }
			             
	// 	            }
	// 	            $("#view_chats").append(html);
	// 	        }

	// 			complete: function() {
	// 			// Schedule the next request when the current one's complete
	// 				setInterval(getmsg, 2000); // The interval set to 5 seconds
	// 			}

	// 		});

	// 	};

	// });

});
