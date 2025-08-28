$( document ).ready(function() {
    $(".select-one").select2({
    placeholder: "Select Country",
    allowClear: true
    });
    $(".select-two").select2({
    placeholder: "Select City",
    allowClear: true
    });

});


$(document).ready(function(){
         $.ajax({
           url: '/countryname',
           type: 'get',
           dataType: 'json',
           success: function(result){
            var countrydd = document.getElementById('sl-country');
            for(var option =0; option<result.length; option++)
            {
                var newOption = document.createElement("option");
                if(result[option]['id'] == $.cookie('countrycookie'))
                {
                    newOption.selected = true;
                }
                newOption.value = result[option]['id'];
                newOption.innerHTML = result[option]['name'];

                countrydd.options.add(newOption);
            }
        }
    });
         if($.cookie('citycookie'))
            { 

        $('#sl-city').removeAttr('disabled');
        $('#search-product').removeAttr('disabled');

         $.ajax({
           url: '/cityname/'+$.cookie('countrycookie'),
           type: 'get',
           dataType: 'json',
           success: function(result){
            var citydd = document.getElementById('sl-city');
            for(var option =0; option<result.length; option++)
            {
                var newOption = document.createElement("option");
                if(result[option]['id'] == $.cookie('citycookie'))
                {
                    newOption.selected = true;
                }
                newOption.value = result[option]['id'];
                newOption.innerHTML = result[option]['name'];
                citydd.options.add(newOption);
            }
        },
        error: function (errormessage) {
                alert('error!');
            }
    });

    }

});


  $('#sl-country').change(function() {
    var value = $('#sl-country').val();
    var countrycookie = $.cookie('countrycookie',value);
    if (value == ""){
        $('#sl-city').attr('disabled', 'disabled');
        $('#search-product').attr('disabled', 'disabled');
    }
    if (value == "-1"){
        $('#sl-city').attr('disabled', 'disabled');
        $('#search-product').attr('disabled', 'disabled');
    }
    else{
        $('#sl-city').removeAttr('disabled');
        }

});
$('#sl-city').change(function() {
  var ivalue = $('#sl-city').val();
  if (ivalue == ""){
      $('#search-product').attr('disabled', 'disabled');
  }
  else{
        var citycookie = $.cookie('citycookie',ivalue);
        // alert(citycookie);
      $('#search-product').removeAttr('disabled');
      }

});

    function populate(s1,s2)
{
    var cc = '#'+s1;
    if($.cookie('countrycookie')){
var countryid = $.cookie('countrycookie');
    }else{
       var countryid = $(cc).val(); 
    }
    if(countryid!= -1){
       
         $.ajax({
           url: '/cityname/'+countryid,
           type: 'get',
           dataType: 'json',
           success: function(result){
            var citydd = document.getElementById(s2);
            $(citydd).empty();
            for(var option =0; option<result.length; option++)
            {
                var newOption = document.createElement("option");
                newOption.value = result[option]['id'];
                newOption.innerHTML = result[option]['name'];
                citydd.options.add(newOption);
            }
        },
        error: function (errormessage) {
                alert('error!');
            }
    });
}else{
    $('#sl-city').empty();
}

}
