// $(document).ready(function(){
    
//     $(".product_check").click(function(){
//         var action = 'data';
//         var category = get_filter_text('category');
//         var brand = get_filter_text('brand');
//         var amount = get_filter_text('amount');
        
//         $.ajax({
//             url:'',
//             method:'POST',
//             data:{action:action,category:category,brand:brand,amount:amount},
//             success:function(response){
//                 $("#result").html(response);
//                 $("#filter-text-title").text("Filtered Products");
//             }
//         })
//     });
    
//     function get_filter_text(text_id)
//     {
//         var filterData = [];
//         $('#'+text_id+':checked').each(function(){
//            filterData.push($(this).val()); 
//         });
//         return filterData;
//     }
// });