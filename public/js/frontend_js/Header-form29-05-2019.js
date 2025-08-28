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
                newOption.value = result[option]['id'];
                newOption.innerHTML = result[option]['name'];
                countrydd.options.add(newOption);
            }
        }
    });

});

  var ivalue;
  var value;
  $('#sl-country').change(function() {
    value = $('#sl-country').val();
    if (value == ''){
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

        $('#sl-city').change(function() {
          ivalue = $('#sl-city').val();
          if (ivalue == ""){
              $('#search-product').attr('disabled', 'disabled');
          }
          else{
              $('#search-product').removeAttr('disabled');
              }
        });
        if(!$('#sl-country').val())
        {
          $('#sl-city').attr('disabled', 'disabled');
          $('#search-product').attr('disabled', 'disabled');
        }


});

// function populate(s1,s2)
// {
//     var s1 = document.getElementById(s1);
//     var s2 = document.getElementById(s2);
//     s2.innerHTML = "";

//     if(s1.value == "Pakistan"){
//         var optionArray = ["|","karachi|Karachi","islamabad|Islamabad","lahore|Lahore"];
//     }
//     else if(s1.value == "India"){
//         var optionArray = ["|","mumbai|Mumbai","chennai|Chennai","delhi|Delhi"];
//     }
//     for(var option in optionArray)
//     {
//         var pair = optionArray[option].split("|");
//         var newOption = document.createElement("option");
//         newOption.value = pair[0];
//         newOption.innerHTML = pair[1];
//         s2.options.add(newOption);
//     }

// }
    function populate(s1,s2)
{
    var cc = '#'+s1;
    var countryid = $(cc).val();
    if(countryid!= -1){
    // var countryidt = $(cc).html();
    // var editorText = $('#editorText').html();
// alert(countryid);
// alert(countryidt);
    // $.ajax({
    //     url: 'cityname',
    //     type: 'get',
    //     dataType: 'json',
    //     success: function(result){
    //         var citydd = document.getElementById(s2);
    //         citydd.innerHTML = "";
    //         // var countrydd = document.getElementById('sl-country');
    //         for(var cityoption =0; cityoption<result.length; cityoption++)
    //         {
    //             var newOption = document.createElement("option");
    //             newOption.value = result[cityoption]['id'];
    //             newOption.innerHTML = result[cityoption]['name'];
    //             citydd.options.add(newOption);
    //         }

    //     }

    // });
         $.ajax({
           url: '/cityname/'+countryid,
           type: 'get',
           dataType: 'json',
           success: function(result){
            // alert('in success');
            var citydd = document.getElementById(s2);
            $(citydd).empty();
            var s=0;
            for(var option =0; option<result.length; option++)
            {
                var newOption = document.createElement("option");
                if(s == '0')
                {
                newOption.value = '-2';
                newOption.innerHTML = 'Select City';
                citydd.options.add(newOption);
                s = s+1;
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
}else{
    $('#sl-city').empty();
}






    // var s1 = document.getElementById(s1);
    // alert(s1);
    // var s2 = document.getElementById(s2);
    // s2.innerHTML = "";

    // if(s1.value == "Pakistan"){
    //     var optionArray = ["|","karachi|Karachi","islamabad|Islamabad","lahore|Lahore"];
    // }
    // else if(s1.value == "India"){
    //     var optionArray = ["|","mumbai|Mumbai","chennai|Chennai","delhi|Delhi"];
    // }
    // for(var option in optionArray)
    // {
    //     var pair = optionArray[option].split("|");
    //     var newOption = document.createElement("option");
    //     newOption.value = pair[0];
    //     newOption.innerHTML = pair[1];
    //     s2.options.add(newOption);
    // }

}
