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

 
// get price for a size attribute
$("#get_price").change(function(){
  var product_id=$(this).attr('product_id');
  var size = $(this).val();
  var color=$(".color-ajax").text();
  //alert(color);
   
  $.ajax({
      url:"get_price_attribute",
      type:"post", 
      data:{size:size,color:color,product_id:product_id ,_token:csrf,},
      
      success:function(response){
        
        if(response['discount_price']>0){
          //alert(response['pattribute_price']);
        $(".price-after-discount").html('<span class="price"> $'+response['discount_price']+'</span>    ');
        $(".price-before-discount").html("$"+ response["attribute_price"] );

                    
        }else{
        $(".price-orginal").html("$"+ response['attribute_price'] );

        }  
        
        if(response['stock']<1){
          $(".in-stock-ajax").text("   not available");
        }else{
          $(".in-stock-ajax").text( response['stock']);

        }
        
      },// end success

      error:function(error){
        alert(error);
      }// end error

  });// end ajax
  
  
  
  
  });// end get price attribute


  
// get color in product page
$(".color-photo").on("click",function(){
  var color=$(this).attr("color");
  var product_id=$("#get_price").attr("product_id");
  var size=$("#get_price").val();
// alert(product_id);
 $(".color-ajax").text(color);

$.ajax({
  type:"post",
  url:"get_color_product",
  data:{color:color, size:size ,product_id:product_id,_token:csrf},
  
  success:function(response){
   // alert(response);
    if(response <1){
      $(".in-stock-ajax").text("   not available");
      
    }else{

      $(".in-stock-ajax").text( response);
    } 
           
  },
  error:function(error){
   alert(error);
  }

});

//alert(color);


});








});// document 









   
  ///   ///    //// ////// //// ///// /// //// ///  //// ///   
  // get filter
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
}// end get_data






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