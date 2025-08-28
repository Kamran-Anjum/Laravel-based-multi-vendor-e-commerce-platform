$(document).ready(function(){

	//$('#new_pwd').click(function(){
	$('#current_pwd').keyup(function(){
		var current_pwd = $('#current_pwd').val();
		$.ajax({
			type:'get',
			url:'/admin/check-pwd',
			data:{current_pwd:current_pwd},
			success:function(resp){
				//alert(resp);
				if(resp=='false'){
					$('#chkpwd').html("<font color='red'>Current Password is Incorrect</font>");
				}else{
					$('#chkpwd').html("<font color='green'>Current Password is Correct</font>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	$(document).on('click',".sa-confirm-delete",function () {
        var id = $(this).attr('param-id');
		var route = $(this).attr('param-route');
		var user = $(this).attr('param-user');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {

            if (result.value) {
            	window.location.href="/"+user+"/"+route+"/"+id;
            }
        })
    });

    $(document).on('click',".sa-confirm-delete-promo",function () {
        var id = $(this).attr('param-id');
		var route = $(this).attr('param-route');
		var user = $(this).attr('param-user');
		var count = $(this).attr('param-count');
        Swal.fire({
            title: 'Not Delete',
            text: "This Promotion Is Apply On "+count+" Products.",
            type: 'warning',
        })
    });

    // rider order popups
	$(document).on('click',".rider-order-accept",function () {
	    var id = $(this).attr('param-id');
	    var route = $(this).attr('param-route');
	    var user = $(this).attr('param-user');
	    Swal.fire({
	        title: 'Are you sure?',
	        text: "You want to accept this order!",
	        type: 'warning',
	        showCancelButton: true,
	        confirmButtonColor: '#3085d6',
	        cancelButtonColor: '#d33',
	        confirmButtonText: 'Yes, Accept it!',
	    }).then((result) => {

	        if (result.value) {
	          window.location.href="/rider/"+route+"/"+id;
	        }
	    })
	});

	$(document).on('click',".rider-order-delivered",function () {
	    var id = $(this).attr('param-id');
	    var route = $(this).attr('param-route');
	    var user = $(this).attr('param-user');
	    Swal.fire({
	        title: 'Are you sure?',
	        text: "You delivered this order!",
	        type: 'warning',
	        showCancelButton: true,
	        confirmButtonColor: '#3085d6',
	        cancelButtonColor: '#d33',
	        confirmButtonText: 'Yes, Deliver it!',
	    }).then((result) => {

	        if (result.value) {
	          window.location.href="/rider/"+route+"/"+id;
	        }
	    })
	});

	$(document).on('click',".rider-order-cancel",function () {
	    var id = $(this).attr('param-id');
	    var route = $(this).attr('param-route');
	    var user = $(this).attr('param-user');
	    Swal.fire({
	        title: 'Are you sure?',
	        text: "You want to cancel this order!",
	        type: 'warning',
	        showCancelButton: true,
	        confirmButtonColor: '#3085d6',
	        cancelButtonColor: '#d33',
	        confirmButtonText: 'Yes, Cancel it!',
	    }).then((result) => {

	        if (result.value) {
	          window.location.href="/rider/"+route+"/"+id;
	        }
	    })
	});
	
	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	//$('select').select2();
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
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

		// Form Validation
    $("#add_category").validate({
		rules:{
			category_name:{
				required:true
			},
			description:{
				required:true,
			},
			url:{
				required:true,
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
	
    	// Form Validation
    $("#edit_category").validate({
		rules:{
			category_name:{
				required:true
			},
			description:{
				required:true,
			},
			url:{
				required:true,
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

		// Add Product Form Validation
    $("#add_product").validate({
		rules:{
			category_id:{
				required:true
			},
			brand_id:{
				required:true
			},
			priceunit_id:{
				required:true
			},
			name:{
				required:true,
			},
			code:{
				required:false,
			},
			quantity:{
				number:true
			},
			price:{
				required:true,
				number:true
			},
			saleprice:{
				required:false,
				number:true
			},
			productunit_id:{
				required:true
			},
			color:{
				required:false,
			},
			height:{
				required:false,
			},
			width:{
				required:false,
			},
			weight:{
				required:false,
			},
			description:{
				required:true,
			},
			long_description:{
				required:false,
			},
			image:{
				required:true,
			},
			galeryimage1:{
				required:false,
			},
			galeryimage2:{
				required:false,
			},
			galeryimage3:{
				required:false,
			},
			galeryimage4:{
				required:false,
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

		// Edit Product Form Validation
    $("#edit_product").validate({
		rules:{
			category_id:{
				required:true
			},
			name:{
				required:true,
			},
			code:{
				required:false,
			},
			priceunit_id:{
				required:true
			},
			price:{
				required:true,
				number:true
			},
			saleprice:{
				required:false,
				number:true
			},
			productunit_id:{
				required:true
			},
			quantity:{
				number:true
			},
			color:{
				required:false,
			},
			height:{
				required:false,
			},
			width:{
				required:false,
			},
			weight:{
				required:false,
			},
			description:{
				required:true,
			},
			long_description:{
				required:false,
			},
			image:{
				required:false,
			},
			galeryimage1:{
				required:false,
			},
			galeryimage2:{
				required:false,
			},
			galeryimage3:{
				required:false,
			},
			galeryimage4:{
				required:false,
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

	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
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
	
	$("#password_validate").validate({
		rules:{
			current_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			new_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
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
	// Category delete confirmation
	// $(".delCat").click(function(){
	// 	if(confirm("Are you sure you want to delete this Category?"))
	// 	{
	// 		return true;
	// 	}
	// 	else{
	// 		return false;
	// 	}
	// });
	$(".deleteCategory").click(function(){

        var id = $(this).attr('cat');
        var deleteFunction = $(this).attr('catt');
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this record again",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes delete it!"
            },
            function(){
                window.location.href="/admin/"+deleteFunction+"/"+id;

            });
    });
	// $(".delPod").click(function(){
	// 	if(confirm("Are you sure you want to delete this Product?")){
	// 		return true;
	// 	}
	// 	else{
	// 		return false;
	// 	}
	// });
	$(".deleteRecord").click(function(){

		var id = $(this).attr('rel');
		var deleteFunction = $(this).attr('rel1');
		swal({
			title: "Are you sure?",
			text: "You will not be able to recover this record again",
			type: "warning",
			showCancelButton: true,
			confirmButtonClass: "btn-danger",
			confirmButtonText: "Yes delete it!"
		},
		function(){
			window.location.href="/admin/"+deleteFunction+"/"+id;
		
		});
	});
	// Delete country

	$(".deleteCountry").click(function(){

		var id = $(this).attr('con');
		var deleteFunction = $(this).attr('conn');
		swal({
				title: "Are you sure?",
				text: "You will not be able to recover this record again",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes delete it!"
			},
			function(){
				window.location.href="/admin/"+deleteFunction+"/"+id;

			});
	});
//Delete City

	$(".deleteCity").click(function(){

		var id = $(this).attr('cit');
		var deleteFunction = $(this).attr('citt');
		swal({
				title: "Are you sure?",
				text: "You will not be able to recover this record again",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes delete it!"
			},
			function(){
				window.location.href="/admin/"+deleteFunction+"/"+id;

			});
	});
//Delete State

	$(".deleteState").click(function(){

		var id = $(this).attr('sta');
		var deleteFunction = $(this).attr('staa');
		swal({
				title: "Are you sure?",
				text: "You will not be able to recover this record again",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes delete it!"
			},
			function(){
				window.location.href="/admin/"+deleteFunction+"/"+id;

			});
	});

// Delete Coustomer
	$(".deleteCustomer").click(function(){

		var id = $(this).attr('customerid');
		var deleteFunction = $(this).attr('customerurl');
		swal({
				title: "Are you sure?",
				text: "You will not be able to recover this record again",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes delete it!"
			},
			function(){
				window.location.href="/admin/"+deleteFunction+"/"+id;

			});
	});

	// Delete Store
	$(".deleteStore").click(function(){

		var id = $(this).attr('storeid');
		var deleteFunction = $(this).attr('storeurl');
		swal({
				title: "Are you sure?",
				text: "You will not be able to recover this record again",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes delete it!"
			},
			function(){
				window.location.href="/admin/"+deleteFunction+"/"+id;

			});
	});

	//delete order
	$(".deleteOrder").click(function(){

		var id = $(this).attr('ord');
		var deleteFunction = $(this).attr('ordd');
		swal({
				title: "Are you sure?",
				text: "You will not be able to recover this record again",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes delete it!"
			},
			function(){
				window.location.href="/admin/"+deleteFunction+"/"+id;

			});
	});

	$(".deleteOrderDetail").click(function(){

		var id = $(this).attr('od');
		var deleteFunction = $(this).attr('odd');
		swal({
				title: "Are you sure?",
				text: "You will not be able to recover this record again",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes delete it!"
			},
			function(){
				window.location.href="/admin/"+deleteFunction+"/"+id;

			});
	});

	$("#edit_order").validate({
		rules:{
            product_id:{
				required:true
			},
			unit_price:{
				required:true,
			},
			qty:{
				required:false,
			},
			total_price:{
				required:false,
			},
			status:{
				required:true,
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

	$("#edit_brand").validate({
        rules:{
            name:{
                required:true
            },
            short_name:{
                required:false,
            },
            description:{
                required:true,
            },
            image:{
                required:false,
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

	$("#edit_shippingcost").validate({
        rules:{
            amountLimit:{
                required:true
            },
            shippingCost:{
                required:true,
            },
            notes:{
                required:true,
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

    $(".deleteBrand").click(function(){

        var id = $(this).attr('brn');
        var deleteFunction = $(this).attr('brnn');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this record again",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes delete it!"
        },
        function(){
            window.location.href="/admin/"+deleteFunction+"/"+id;

        });
    });

	$("#add_brand").validate({
        rules:{
            name:{
                required:true
            },
            description:{
                required:true,
            },
            short_name:{
                required:false,
            },
            image:{
                required:true,
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

    // hone banner
    $(document).on("change", "#condition_id", function() {

        var condition_id = $("#condition_id").val();    

        if (condition_id == 1) {

            $('#full_b_img').removeClass('hidden'); 
            $('#half_b_img').addClass('hidden'); 
            $('#leftside_b_img').addClass('hidden'); 
            $('#side_by_side').addClass('hidden'); 

        } else if (condition_id == 2) {

            $('#full_b_img').addClass('hidden'); 
            $('#half_b_img').removeClass('hidden'); 
            $('#leftside_b_img').addClass('hidden'); 
            $('#side_by_side').removeClass('hidden');
            
        }  else if (condition_id == 3) {

            $('#full_b_img').addClass('hidden'); 
            $('#half_b_img').addClass('hidden'); 
            $('#leftside_b_img').removeClass('hidden'); 
            $('#side_by_side').addClass('hidden');
            
        } 
        
    });

});

// for category only
$('#en_parent_id').change(function(){

	$('#ar_parent_id').change(function(){

		var chk = $('#en_parent_id').val();
		var chk2 = $('#ar_parent_id').val();

		if (chk == chk2) {
			$('#sub_both_data').prop('disabled', false);
		}else{
			$('#sub_both_data').prop('disabled', true);
		}

	});
	
});

// for products
$('#en_category_id').change(function(){

	$('#ar_category_id').change(function(){

		$('#en_brand_id').change(function(){

			$('#ar_brand_id').change(function(){

				$('#en_priceunit_id').change(function(){

					$('#ar_priceunit_id').change(function(){

						$('#en_productunit_id').change(function(){

							$('#ar_productunit_id').change(function(){

								var en_cat = $('#en_category_id').val();
								var ar_cat = $('#ar_category_id').val();

								var en_brand = $('#en_brand_id').val();
								var ar_brand = $('#ar_brand_id').val();

								var en_p_u = $('#en_priceunit_id').val();
								var ar_p_u = $('#ar_priceunit_id').val();

								var en_pro_u = $('#en_productunit_id').val();
								var ar_pro_u = $('#ar_productunit_id').val();

								console.log("en_cat "+ en_cat);
								console.log("ar_cat "+ ar_cat);
								console.log("en_brand "+ en_brand);
								console.log("ar_brand "+ ar_brand);
								console.log("en_p_u "+ en_p_u);
								console.log("ar_p_u "+ ar_p_u);
								console.log("en_pro_u "+ en_pro_u);
								console.log("ar_pro_u "+ ar_pro_u);

								if ( en_brand == ar_brand && en_p_u == ar_p_u && en_pro_u == ar_pro_u) {
									$('#sub_both_products').prop('disabled', false);
								}else{
									$('#sub_both_products').prop('disabled', true);
								}

							});
							
						});

					});
					
				});

			});
			
		});

	});
	
});

$(document).on("change", "#get_analytics_data", function() {

    var get_data = $("#get_analytics_data").val();    

    if (get_data == 'over_all') {

    	$('#over_all').removeClass('hidden'); 
    	$('#products').addClass('hidden');  
    	$('#products_add_to_cart').addClass('hidden');  
    	$('#products_delete_from_cart').addClass('hidden');  
    	$('#products_order_checkout').addClass('hidden'); 

    } else if (get_data == 'products') {

    	$('#over_all').addClass('hidden'); 
    	$('#products').removeClass('hidden');
    	$('#products_add_to_cart').addClass('hidden');  
    	$('#products_delete_from_cart').addClass('hidden');  
    	$('#products_order_checkout').addClass('hidden'); 
    	
    }  else if (get_data == 'products_add_to_cart') {

    	$('#over_all').addClass('hidden'); 
    	$('#products').addClass('hidden');
    	$('#products_add_to_cart').removeClass('hidden');  
    	$('#products_delete_from_cart').addClass('hidden');  
    	$('#products_order_checkout').addClass('hidden'); 
    	
    }  else if (get_data == 'products_delete_from_cart') {

    	$('#over_all').addClass('hidden'); 
    	$('#products').addClass('hidden');
    	$('#products_add_to_cart').addClass('hidden');  
    	$('#products_delete_from_cart').removeClass('hidden');  
    	$('#products_order_checkout').addClass('hidden'); 
    	
    }  else if (get_data == 'products_order_checkout') {

    	$('#over_all').addClass('hidden'); 
    	$('#products').addClass('hidden');
    	$('#products_add_to_cart').addClass('hidden');  
    	$('#products_delete_from_cart').addClass('hidden');  
    	$('#products_order_checkout').removeClass('hidden');
    	
    }  
    
});

// get category products for promotion
$(document).on("change", "#cat_dd", function() {

    var cat_id = $("#cat_dd").val();    
    var promo_id = $("#promotion_id").val();    

    window.location.href="/admin/assign-promotion/"+promo_id+"/"+cat_id;
    
});