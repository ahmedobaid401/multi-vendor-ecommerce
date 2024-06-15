//const { get } = require("https");

$(document).ready(function(){

$("#sort").on("change",function(){
     //this.form.submit();
      
        var sort=$("#sort").val();
         var url=$("#url").val();
         
  // alert(url);
        $.ajax({
            
            type:"post",
            data:{
                url:url,
                sort:sort,
                _token:csrf,
            },
           success:function(data){
             $(".products_filter").html(data);
           },
           error:function(error){
             alert(error)
           }

        });

     });
//// end fun 


     ///////////////// 
     $(".check-box").on("click",function(){

         var brand=get_data("brand");
         var price=get_data("price");
         var sizes=get_data("size");
         var colors=get_data("color");
         var sort=$("#sort option:selected").text();
          var url=$("#url").val();
       var fil= get_filter();
      
         $.ajax({
             
             type:"post",
             data:{
                 url:url,
                 filter:fil,
                 sort:sort,
                 sizes:sizes,
                 colors:colors,
                 price:price,
                 brand:brand,
                 _token:csrf,
             },
            success:function(data){
              $(".products_filter").html(data);
            },
            error:function(error){
              alert(error)
            }
 
         });
 
      });






});
   
     
  
function get_filter(){
  var filter=[];
  
  $(".filter:checked").each(function(){
   
   filter.push($(this).attr("data-index")+"-"+ $(this).val());
  });
  
  return filter;
}// end get_filter


function get_data(class_name){
  var arr=[];
  $("."+class_name+":checked").each(function(){
    arr.push($(this).val());

  });

  return arr;
}






/*
function get_sizes(){
  var sizes_arr=[];
  $(".size:checked").each(function(){
    sizes_arr.push($(this).val());

  });

  return sizes_arr;
}

function get_colors(){
  var colors_arr=[];
  $(".color:checked").each(function(){
    colors_arr.push($(this).val());

  });

  return colors_arr;
}


function get_prices(){
  var prices_arr=[];
  $(".price:checked").each(function(){
    prices_arr.push($(this).val());

  });

  return prices_arr;
}
   
*/