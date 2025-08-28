$(document).on('click',".deleteCartItems",function () {
    var cart_id = $(this).attr('param-id');
    var cart_route = $(this).attr('param-route');
    var cart_user = $(this).attr('param-user');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to delete this item!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {

        if (result.value) {
          window.location.href=cart_user+"/"+cart_route+"/"+cart_id;
        }
    })
});


$(document).on('click',".addtocartBtn",function () {
  var product_id = $(this).attr('id');

  $.ajax({
      url: '/frontend/addtocartAjax/'+product_id,
      success: data_sess => {
        $("#myModal").modal('show');
          setTimeout(function(){
          $('#myModal').modal('hide')
        }, 2000);

        $("#cart_icon_btn").attr("data-badge", data_sess);
      }
  });
});

$(document).on('click','.inc',function(){
    var product_id = $(this).attr('id');

    var row = $(this).closest("tr");
    var row_no = row[0].rowIndex;

    var quantityyy = document.getElementById("qty"+row_no).value;
    quantityyy = parseInt(quantityyy);

    quantityyy = quantityyy+1;
    document.getElementById("qty"+row_no).value = quantityyy;

    var quantity = document.getElementById("qty"+row_no).value;

    $.ajax({
      url: '/frontend/quantitycartAjax/'+product_id+'/'+quantity+'/inc',
      success: data => {
        console.log(data);
        $("#subTotal"+row_no).html(data);
        loadData();
      }
    });

    $.ajax({
      url: '/frontend/quantitycartweightAjax/'+product_id+'/'+quantity+'/inc',
      success: data => {
        console.log(data);
        $("#subWei"+row_no).html(data);
        loadData();
      }
    });

});

$(document).on('click','.dec',function(){
    var product_id = $(this).attr('id');

    var row = $(this).closest("tr");
    var row_no = row[0].rowIndex;

    var quantityyy = document.getElementById("qty"+row_no).value;
    quantityyy = parseInt(quantityyy);
    if(quantityyy <= 1){
      document.getElementById("qty"+row_no).value = 1;
    }else{
      quantityyy = quantityyy-1;
      document.getElementById("qty"+row_no).value = quantityyy;
    }
      
    var quantity = document.getElementById("qty"+row_no).value;

    $.ajax({
      url: '/frontend/quantitycartAjax/'+product_id+'/'+quantity+'/dec',
      success: data => {
        $("#subTotal"+row_no).html(data);
        loadData();
      }
    });

    $.ajax({
      url: '/frontend/quantitycartweightAjax/'+product_id+'/'+quantity+'/dec',
      success: data => {
        $("#subWei"+row_no).html(data);
        loadData();
      }
    });

});

function loadData(){
    var sum=0;
    $(".tot").each(function(){
        sum+=parseFloat($(this).text());
    })
    $("#id").html(sum.toFixed(2));
    var limit = $("#amountLimit").val();
    var cost = $("#shippingCost").val();
    var total = parseInt(cost) + parseInt(sum);
    if (sum <= limit) {
      $("#shipping").html(cost);
      $("#totalId").html(total.toFixed(2));
    }
    else
    {
      $("#shipping").html('Free'); 
      $("#totalId").html(sum.toFixed(2));
    }

    var weight_sum=0;
    $(".tot_wei").each(function(){
        weight_sum+=parseFloat($(this).text());
    })
    $("#idweight").html(weight_sum);
    // var weight_total = parseInt(cost) + parseInt(weight_sum);
    // $("#idweight").html(weight_total.toFixed(2));
}
