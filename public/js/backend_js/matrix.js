
$(document).ready(function(){
	
	// === Sidebar navigation === //
	
	$('.submenu > a').click(function(e)
	{
		e.preventDefault();
		var submenu = $(this).siblings('ul');
		var li = $(this).parents('li');
		var submenus = $('#sidebar li.submenu ul');
		var submenus_parents = $('#sidebar li.submenu');
		if(li.hasClass('open'))
		{
			if(($(window).width() > 768) || ($(window).width() < 479)) {
				submenu.slideUp();
			} else {
				submenu.fadeOut(250);
			}
			li.removeClass('open');
		} else 
		{
			if(($(window).width() > 768) || ($(window).width() < 479)) {
				submenus.slideUp();			
				submenu.slideDown();
			} else {
				submenus.fadeOut(250);			
				submenu.fadeIn(250);
			}
			submenus_parents.removeClass('open');		
			li.addClass('open');	
		}
	});
	
	var ul = $('#sidebar > ul');
	
	$('#sidebar > a').click(function(e)
	{
		e.preventDefault();
		var sidebar = $('#sidebar');
		if(sidebar.hasClass('open'))
		{
			sidebar.removeClass('open');
			ul.slideUp(250);
		} else 
		{
			sidebar.addClass('open');
			ul.slideDown(250);
		}
	});
	
	// === Resize window related === //
	$(window).resize(function()
	{
		if($(window).width() > 479)
		{
			ul.css({'display':'block'});	
			$('#content-header .btn-group').css({width:'auto'});		
		}
		if($(window).width() < 479)
		{
			ul.css({'display':'none'});
			fix_position();
		}
		if($(window).width() > 768)
		{
			$('#user-nav > ul').css({width:'auto',margin:'0'});
            $('#content-header .btn-group').css({width:'auto'});
		}
	});
	
	if($(window).width() < 468)
	{
		ul.css({'display':'none'});
		fix_position();
	}
	
	if($(window).width() > 479)
	{
	   $('#content-header .btn-group').css({width:'auto'});
		ul.css({'display':'block'});
	}
	
	// === Tooltips === //
	$('.tip').tooltip();	
	$('.tip-left').tooltip({ placement: 'left' });	
	$('.tip-right').tooltip({ placement: 'right' });	
	$('.tip-top').tooltip({ placement: 'top' });	
	$('.tip-bottom').tooltip({ placement: 'bottom' });	
	
	// === Search input typeahead === //
	$('#search input[type=text]').typeahead({
		source: ['Dashboard','Form elements','Common Elements','Validation','Wizard','Buttons','Icons','Interface elements','Support','Calendar','Gallery','Reports','Charts','Graphs','Widgets'],
		items: 4
	});
	
	// === Fixes the position of buttons group in content header and top user navigation === //
	function fix_position()
	{
		var uwidth = $('#user-nav > ul').width();
		$('#user-nav > ul').css({width:uwidth,'margin-left':'-' + uwidth / 2 + 'px'});
        
        var cwidth = $('#content-header .btn-group').width();
        $('#content-header .btn-group').css({width:cwidth,'margin-left':'-' + uwidth / 2 + 'px'});
	}
	
	// === Style switcher === //
	$('#style-switcher i').click(function()
	{
		if($(this).hasClass('open'))
		{
			$(this).parent().animate({marginRight:'-=190'});
			$(this).removeClass('open');
		} else 
		{
			$(this).parent().animate({marginRight:'+=190'});
			$(this).addClass('open');
		}
		$(this).toggleClass('icon-arrow-left');
		$(this).toggleClass('icon-arrow-right');
	});
	
	$('#style-switcher a').click(function()
	{
		var style = $(this).attr('href').replace('#','');
		$('.skin-color').attr('href','css/maruti.'+style+'.css');
		$(this).siblings('a').css({'border-color':'transparent'});
		$(this).css({'border-color':'#aaaaaa'});
	});
	
	$('.lightbox_trigger').click(function(e) {
		
		e.preventDefault();
		
		var image_href = $(this).attr("href");
		
		if ($('#lightbox').length > 0) {
			
			$('#imgbox').html('<img src="' + image_href + '" /><p><i class="icon-remove icon-white"></i></p>');
		   	
			$('#lightbox').slideDown(500);
		}
		
		else { 
			var lightbox = 
			'<div id="lightbox" style="display:none;">' +
				'<div id="imgbox"><img src="' + image_href +'" />' + 
					'<p><i class="icon-remove icon-white"></i></p>' +
				'</div>' +	
			'</div>';
				
			$('body').append(lightbox);
			$('#lightbox').slideDown(500);
		}
		
	});

	$(document).on('click',".view_Admin_vendorApprovalRequest",function () {
	    $.ajax({
	        url: '/admin/update_vendorApprovalRequest',
	        success: data => {
	            window.location.href = "view-vendors?approvalRequested=true";
	        }
	    })
	});

	$(document).on('click',".view_Subadmin_vendorApprovalRequest",function () {
	    $.ajax({
	        url: '/subadmin/update_vendorApprovalRequest',
	        success: data => {
	            window.location.href = "view-vendors?approvalRequested=true";
	        }
	    })
	});

	$(document).on('click',".view_Admin_vendorCityRequest",function () {
	    $.ajax({
	        url: '/admin/update_vendorCityRequest',
	        success: data => {
	            window.location.href = "view-vendors?cityRequested=true";
	        }
	    })
	});

	$(document).on('click',".view_Subadmin_vendorCityRequest",function () {
	    $.ajax({
	        url: '/subadmin/update_vendorCityRequest',
	        success: data => {
	            window.location.href = "view-vendors?cityRequested=true";
	        }
	    })
	});
	

	$('#lightbox').live('click', function() { 
		$('#lightbox').hide(200);
	});

	$(document).on('change',".privilege_city_class",function () {
	    var city_id = $(this).val();

	    $.ajax({
	        url: '/subadmin/getPrivilegeItems/'+city_id,
	        success: pri_data => {
	            window.location.href = "dashboard";
	        }
	    });
	});

	$(document).on('change',".vendor_privilege_city_class",function () {
	    var city_id = $(this).val();

	    $.ajax({
	        url: '/vendor/getVendorPrivilegeItems/'+city_id,
	        success: pri_data => {
	            window.location.href = "dashboard";
	        }
	    });
	});

	$(document).on('change',".vendor_user_privilege_city_class",function () {
	    var city_id = $(this).val();

	    $.ajax({
	        url: '/vendoruser/getVendorUserPrivilegeItems/'+city_id,
	        success: pri_data => {
	            window.location.href = "dashboard";
	        }
	    });
	});

	// product city country
	$(document).on('click','.rmv', function(){
	    var row = $(this).attr("id");
	    if(row > 1){
	        $("#dynamic"+row).remove();
	    }
	});

	// admin side
	$(document).on('click',".admincountryclass_addRow",function () {
	    var sno = $("#countrowdata").val();
		sno = (parseInt(sno) + 1);
	    var html = '';

	    html += '<tr id="dynamic'+sno+'">';
	        // html += '<td style="text-align:center;">'+sno+'</td>';

		    $.ajax({
	            url: '/admin/getproductcountryname',
	            async: false,
	            success: data => {
	                html += '<td>';
	                html += '<select class="admin_product_country_class" name="countryid_'+sno+'" id="countryid_'+sno+'">';
	                html += '<option selected disabled>Select</option>';
	                for(var option = 0; option < data.length; option++)
	                {
	                    html += '<option value='+data[option].id+'>'+ data[option].name +'</option>';
	                }
	                html += '</select>';
	                html += '</td>';
	            }
	        });

	        html += '<td>';
	        	html += '<select name="cityid_'+sno+'" id="cityid_'+sno+'">';
                    html += '<option value="0">Select</option>';
                html += '</select>';
	        html += '</td>';
	        html += '<td style="text-align:center;"><button id="'+sno+'" class="btn btn-danger btn-md rmv"><i style="color: #fff;" class="icon icon-trash" aria-hidden="true"></i></button></td>';
	    html += '</tr>';

	    $("#AdminCountryCity_MultiRecGrid").append(html);
	    $("#countrowdata").val(sno);
	});

	$(document).on('change',".admin_product_country_class",function () {
	    var country_id = $(this).val();
	    var row = $(this).attr("id");
	    var curr_id = row.split("_");
	    var sno = curr_id[1];

	    $('#cityid_'+sno).empty();
	    $.ajax({
	        url: '/admin/getproductcityname/'+country_id,
	        success: data => {
	            var citydd = $("#cityid_"+sno).html("");
	            console.log(data + citydd);
	            for(var option =0; option<data.length; option++)
	            {
		            var newOption = document.createElement("option");
		            $("#cityid_"+sno).append('<option value='+data[option].id+'>'+ data[option].name +'</option>')
	            }
	        }
	    })
	});

	$(document).on('change',".admin_privilege_country_class",function () {
	    var country_id = $(this).val();

	    $('#city_id').empty();
	    $.ajax({
	        url: '/admin/getprivilegecityname/'+country_id,
	        success: data => {
	            var citydd = $("#city_id").html("");
	            console.log(data + citydd);
	            for(var option =0; option<data.length; option++)
	            {
		            var newOption = document.createElement("option");
		            $("#city_id").append('<option value='+data[option].id+'>'+ data[option].name +'</option>')
	            }
	        }
	    })

	    $('#state_id').empty();
	    $.ajax({
	        url: '/admin/getprivilegestatename/'+country_id,
	        success: data2 => {
	            var statedd = $("#state_id").html("");
	            console.log(data2 + statedd);
	            $("#state_id").append('<option value="0" selected>Select</option>');
	            for(var option2 =0; option2<data2.length; option2++)
	            {
	            var newOption2 = document.createElement("option");
	            newOption2.value = data2[option2]['id'];
	            newOption2.innerHTML = data2[option2]['name'];
	            $("#state_id").append('<option value='+data2[option2].id+'>'+ data2[option2].name +'</option>')
	            }
	        }
	    });
	});

	// subadmin side
	$(document).on('click',".subadmincountryclass_addRow",function () {
	    var sno = $("#countrowdata").val();
		sno = (parseInt(sno) + 1);
	    var html = '';

	    html += '<tr id="dynamic'+sno+'">';
	        // html += '<td style="text-align:center;">'+sno+'</td>';

		    $.ajax({
	            url: '/subadmin/getproductcountryname',
	            async: false,
	            success: data => {
	                html += '<td>';
	                html += '<select class="subadmin_product_country_class" name="countryid_'+sno+'" id="countryid_'+sno+'">';
	                html += '<option selected disabled>Select</option>';
	                for(var option = 0; option < data.length; option++)
	                {
	                    html += '<option value='+data[option].countryId+'>'+ data[option].countryName +'</option>';
	                }
	                html += '</select>';
	                html += '</td>';
	            }
	        });

	        html += '<td>';
	        	html += '<select name="cityid_'+sno+'" id="cityid_'+sno+'">';
                    html += '<option value="0">Select</option>';
                html += '</select>';
	        html += '</td>';
	        html += '<td style="text-align:center;"><button id="'+sno+'" class="btn btn-danger btn-md rmv"><i style="color: #fff;" class="icon icon-trash" aria-hidden="true"></i></button></td>';
	    html += '</tr>';

	    $("#SubAdminCountryCity_MultiRecGrid").append(html);
	    $("#countrowdata").val(sno);
	});

	$(document).on('change',".subadmin_product_country_class",function () {
	    var country_id = $(this).val();
	    var row = $(this).attr("id");
	    var curr_id = row.split("_");
	    var sno = curr_id[1];

	    $('#cityid_'+sno).empty();
	    $.ajax({
	        url: '/subadmin/getproductcityname/'+country_id,
	        success: data => {
	            var citydd = $("#cityid_"+sno).html("");
	            console.log(data + citydd);
	            for(var option =0; option<data.length; option++)
	            {
		            var newOption = document.createElement("option");
		            $("#cityid_"+sno).append('<option value='+data[option].cityId+'>'+ data[option].cityName +'</option>')
	            }
	        }
	    })
	});

	$(document).on('change',".sub_privilege_country_class",function () {
	    var country_id = $(this).val();

	    $('#city_id').empty();
	    $.ajax({
	        url: '/subadmin/subprivilegecityname/'+country_id,
	        success: data => {
	            var citydd = $("#city_id").html("");
	            console.log(data + citydd);
	            for(var option =0; option<data.length; option++)
	            {
		            var newOption = document.createElement("option");
		            newOption.value = data[option]['cityId'];
		            newOption.innerHTML = data[option]['cityName'];
		            $("#city_id").append('<option value='+data[option].cityId+'>'+ data[option].cityName +'</option>')
	            }
	        }
	    })
	});

	// vendor side
	$(document).on('click',".vendorcountryclass_addRow",function () {
	    var sno = $("#countrowdata").val();
		sno = (parseInt(sno) + 1);
	    var html = '';

	    html += '<tr id="dynamic'+sno+'">';
	        // html += '<td style="text-align:center;">'+sno+'</td>';

		    $.ajax({
	            url: '/vendor/getproductcountryname',
	            async: false,
	            success: data => {
	                html += '<td>';
	                html += '<select class="vendor_product_country_class" name="countryid_'+sno+'" id="countryid_'+sno+'">';
	                html += '<option selected disabled>Select</option>';
	                for(var option = 0; option < data.length; option++)
	                {
	                    html += '<option value='+data[option].countryId+'>'+ data[option].countryName +'</option>';
	                }
	                html += '</select>';
	                html += '</td>';
	            }
	        });

	        html += '<td>';
	        	html += '<select name="cityid_'+sno+'" id="cityid_'+sno+'">';
                    html += '<option value="0">Select</option>';
                html += '</select>';
	        html += '</td>';
	        html += '<td style="text-align:center;"><button id="'+sno+'" class="btn btn-danger btn-md rmv"><i style="color: #fff;" class="icon icon-trash" aria-hidden="true"></i></button></td>';
	    html += '</tr>';

	    $("#VendorCountryCity_MultiRecGrid").append(html);
	    $("#countrowdata").val(sno);
	});

	$(document).on('change',".vendor_product_country_class",function () {
	    var country_id = $(this).val();
	    var row = $(this).attr("id");
	    var curr_id = row.split("_");
	    var sno = curr_id[1];

	    $('#cityid_'+sno).empty();
	    $.ajax({
	        url: '/vendor/getproductcityname/'+country_id,
	        success: data => {
	            var citydd = $("#cityid_"+sno).html("");
	            console.log(data + citydd);
	            for(var option =0; option<data.length; option++)
	            {
		            var newOption = document.createElement("option");
		            $("#cityid_"+sno).append('<option value='+data[option].cityId+'>'+ data[option].cityName +'</option>')
	            }
	        }
	    })
	});

	$(document).on('change',".ven_privilege_country_class",function () {
	    var country_id = $(this).val();

	    $('#city_id').empty();
	    $.ajax({
	        url: '/vendor/venprivilegecityname/'+country_id,
	        success: data => {
	            var citydd = $("#city_id").html("");
	            console.log(data + citydd);
	            for(var option =0; option<data.length; option++)
	            {
		            var newOption = document.createElement("option");
		            newOption.value = data[option]['cityId'];
		            newOption.innerHTML = data[option]['cityName'];
		            $("#city_id").append('<option value='+data[option].cityId+'>'+ data[option].cityName +'</option>')
	            }
	        }
	    })
	});

	// vendor user side
	$(document).on('click',".vendorusercountryclass_addRow",function () {
	    var sno = $("#countrowdata").val();
		sno = (parseInt(sno) + 1);
	    var html = '';

	    html += '<tr id="dynamic'+sno+'">';
	        // html += '<td style="text-align:center;">'+sno+'</td>';

		    $.ajax({
	            url: '/vendoruser/getproductcountryname',
	            async: false,
	            success: data => {
	                html += '<td>';
	                html += '<select class="vendoruser_product_country_class" name="countryid_'+sno+'" id="countryid_'+sno+'">';
	                html += '<option selected disabled>Select</option>';
	                for(var option = 0; option < data.length; option++)
	                {
	                    html += '<option value='+data[option].countryId+'>'+ data[option].countryName +'</option>';
	                }
	                html += '</select>';
	                html += '</td>';
	            }
	        });

	        html += '<td>';
	        	html += '<select name="cityid_'+sno+'" id="cityid_'+sno+'">';
                    html += '<option value="0">Select</option>';
                html += '</select>';
	        html += '</td>';
	        html += '<td style="text-align:center;"><button id="'+sno+'" class="btn btn-danger btn-md rmv"><i style="color: #fff;" class="icon icon-trash" aria-hidden="true"></i></button></td>';
	    html += '</tr>';

	    $("#VendorUserCountryCity_MultiRecGrid").append(html);
	    $("#countrowdata").val(sno);
	});

	$(document).on('change',".vendoruser_product_country_class",function () {
	    var country_id = $(this).val();
	    var row = $(this).attr("id");
	    var curr_id = row.split("_");
	    var sno = curr_id[1];

	    $('#cityid_'+sno).empty();
	    $.ajax({
	        url: '/vendoruser/getproductcityname/'+country_id,
	        success: data => {
	            var citydd = $("#cityid_"+sno).html("");
	            console.log(data + citydd);
	            for(var option =0; option<data.length; option++)
	            {
		            var newOption = document.createElement("option");
		            $("#cityid_"+sno).append('<option value='+data[option].cityId+'>'+ data[option].cityName +'</option>')
	            }
	        }
	    })
	});

	$(document).on('change',".ven_user_privilege_country_class",function () {
	    var country_id = $(this).val();

	    $('#city_id').empty();
	    $.ajax({
	        url: '/vendor/venuserprivilegecityname/'+country_id,
	        success: data => {
	            var citydd = $("#city_id").html("");
	            console.log(data + citydd);
	            for(var option =0; option<data.length; option++)
	            {
		            var newOption = document.createElement("option");
		            newOption.value = data[option]['id'];
		            newOption.innerHTML = data[option]['name'];
		            $("#city_id").append('<option value='+data[option].id+'>'+ data[option].name +'</option>')
	            }
	        }
	    })
	});

	$(document).on('change',".language_class",function () {
	    var lang = $(this).val();

	    if(lang == "en"){
	    	$("#ar_div").css('visibility', 'hidden');
	    	$("#en_div").css('visibility', 'visible');

	    	$("#sub_ar").hide();
	    	$("#sub_both").hide();
	    	$("#sub_en").show();
	    }
	    else
	    if(lang == "ar"){
	    	$("#en_div").css('visibility', 'hidden');
	    	$("#ar_div").css('visibility', 'visible');

	    	$("#sub_en").hide();
	    	$("#sub_both").hide();
	    	$("#sub_ar").show();
	    }
	    else{
	    	$("#en_div").css('visibility', 'visible');
	    	$("#ar_div").css('visibility', 'visible');

	    	$("#sub_en").hide();
	    	$("#sub_ar").hide();
	    	$("#sub_both").show();
	    }
	});

	// country/state/city/city area
	$(document).on('change',".countryname",function () {
	    var country_id = $(this).val();

	    $('#state_id').empty();
	    $.ajax({
	        url: '/admin/getstates/'+country_id,
	        success: data => {
	            var citydd = $("#state_id").html();

                $("#state_id").append('<option>--select state--</option>');
	            console.log(data + citydd);
	            for(var option =0; option<data.length; option++)
	            {
		            var newOption = document.createElement("option");
		            newOption.value = data[option]['id'];
		            newOption.innerHTML = data[option]['name'];
		            $("#state_id").append('<option value='+data[option].id+'>'+ data[option].name +'</option>')
	            }
	        }
	    });

	    $('#city_id').empty();
	    $.ajax({
	        url: '/admin/getprivilegecityname/'+country_id,
	        success: data => {
	            var citydd = $("#city_id").html();

                $("#city_id").append('<option>--select city--</option>');
	            console.log(data + citydd);
	            for(var option =0; option<data.length; option++)
	            {
		            var newOption = document.createElement("option");
		            $("#city_id").append('<option value='+data[option].id+'>'+ data[option].name +'</option>')
	            }
	        }
	    })
	});

	$(document).on('change',".statename",function () {
	    var state_id = $(this).val();

	    $('#city_id').empty();
	    $.ajax({
	        url: '/admin/getcities/'+state_id,
	        success: data => {
	            var citydd = $("#city_id").html();

                $("#city_id").append('<option>--select city--</option>');
	            console.log(data + citydd);
	            for(var option =0; option<data.length; option++)
	            {
		            var newOption = document.createElement("option");
		            newOption.value = data[option]['id'];
		            newOption.innerHTML = data[option]['name'];
		            $("#city_id").append('<option value='+data[option].id+'>'+ data[option].name +'</option>')
	            }
	        }
	    })
	});

	// only one select
	$(document).on('change',".cityname",function () {
	    var state_id = $(this).val();

	    $('#city_area_id').empty();
	    $.ajax({
	        url: '/admin/getcityareas/'+state_id,
	        success: data => {
	            var citydd = $("#city_area_id").html();

                $("#city_area_id").append('<option>--select area--</option>');
	            console.log(data + citydd);
	            for(var option =0; option<data.length; option++)
	            {
		            var newOption = document.createElement("option");
		            newOption.value = data[option]['id'];
		            newOption.innerHTML = data[option]['name'];
		            $("#city_area_id").append('<option value='+data[option].id+'>'+ data[option].name +'</option>')
	            }
	        }
	    })
	});


	// for multiple selection
	$(document).on('change',".cityareaname",function () {
	    var state_id = $(this).val();

	    $('#cityareanamemultiple').empty();
	    $.ajax({
	        url: '/admin/getcityareas/'+state_id,
	        success: data => {
	            var citydd = $("#cityareanamemultiple").html("");
	            console.log(data + citydd);
	            for(var option =0; option<data.length; option++)
	            {
		            var newOption = document.createElement("option");
		            newOption.value = data[option]['id'];
		            newOption.innerHTML = data[option]['name'];
		            $("#cityareanamemultiple").append('<label><input type="checkbox" name="city_area_id[]" value='+data[option].id+'>'+ data[option].name +'</label>')
	            }
	        }
	    })
	});


	// add multiple audio script
	var max_fields      = 10; //maximum input boxes allowed
	var wrapper2       = $(".fields_wrap"); //Fields wrappeD
	var add_audio_button = $(".add_field"); //Add button ID
	var x = 1; //initlal text box count

	//adding images field 
	$(add_audio_button).click(function(e){ //on add input button click

	e.preventDefault();
	if(x < max_fields){ //max input box allowed
	  x++; //text box increment

	   $(wrapper2).append('<div class="wraper"><button style="height: 35px; margin-left:430px; margin-bottom: -70px" class="mdi mdi-minus remove_field btn btn-danger">-</button><div class="control-group"><label class="control-label"><strong>Weight Upto <small>(In Grams)</small>:<span style="color:red;">*</span></strong></label><div class="controls"><input type="number" name="weight_up_to[]" id="weight_up_to" placeholder="500"  required=""></div></div> <div class="control-group"><label class="control-label"><strong>Amount/Cost:<span style="color:red;">*</span></strong></label><div class="controls"><input type="number" name="cost[]" id="cost"  required=""></div> </div></div>');

	}

	});

	// remove fields
	$(wrapper2).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	});
	// add multiple vedio script end here

});




