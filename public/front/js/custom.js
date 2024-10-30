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
  
   
  $.ajax({
      url:"/ecom9/public/product/get_price_attribute",
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

   // put color in the form
  $("#selected-color").val(color);
  $(".color-ajax").text(color);

  // put image name in the form
  var image_name=$(this).attr("image-name");
  $("#image-item").val(image_name);
 //alert(image_name);


$.ajax({
  type:"post",
  url:"/ecom9/public/product/get_color_product",
  data:{color:color, size:size ,product_id:product_id,_token:csrf},
  
  success:function(response){
   // alert(response);
    if(response <1){
      $(".in-stock-ajax").text("   not available");
      $("#submit-button").prop("disabled",true);
    }else{
      $("#submit-button").prop("disabled",false);
      $(".in-stock-ajax").text( response);
    } 
           
  },
  error:function(error){
   alert(error);
  }

});

//alert(color);


});

// disable add to cart button when stock is empty
disableButtonAdd();
 
$("#add-cart").on("submit",function(event){
  event.preventDefault();
  var color=$(".color-ajax").html();
    
  var data=$(this).serialize();

  $.ajax({
    url:"cart/add",
    type:"post",
    dat:{data:data,color:color,_token:csrf},
    success:function(response){

    },
  });
});

// update quantity function
$('#update-quantity').on("change",function(){
  var quantity=$(this).val();
  var price= $("#discount-price").text();
 // alert(price * quantity);
  $.ajax({
    url:"update",
    type:"post",
    data:{quantity:quantity,_token:csrf},
    success:function(response){
      if(response["status"]=="error"){
        alert("this quantity not avialable");
      }else{
        $("#update-quantity").val(response);
        $("#grand-price").html(response["quantity"] * price);
        $("#count-header").html(response["count"]);


      }
    
    },error:function(){

    }


  });

});

//cart item delete
$("#cartItemDelete").on("click",function(){
 
 var id= $(this).attr('item-id');
 var row= $(this).closest('tr');
 
 $.ajax({
  url:"delete",
  type:"post",
  data:{id:id,_token:csrf},
  success:function(response){
   // if(response["status"]=="success"){
      //row.fadeOut(300,function(){
        //$(this).remlove();
     // });
  //  }
  $("#count-header").html(response["count"]);

     row.remove();
     updateTotal();
  
  },error:function(){
    alert("failed.try again");
  }

}); // end ajax 


});// end cartitem delete



// user register 
$('#registerForm').submit(function(event){
  $(".load").show();
  event.preventDefault();
  var formData=$(this).serialize();
 //alert(formData);
  $.ajax({
    url:"store",
    type:"post",
    data:{formData:formData, _token:csrf},
    success:function(response){
  $(".load").hide();

        if(response.type=="success"){
         window.location.href=response.url;
        }else if(response.type=="error"){
          $("#registerForm p").css({
            "display":"none"
          });
          $.each(response.errors,function(i,error){
            
            $("#user-"+i).text(error);
            $("#user-"+i).attr("style","color:red");
         //  setTimeout(function(){
           //   $("#user-"+i).css({
            //    "display":"none"
            //  });
           // },3000);
          });    
        }
    
    },error:function(){
      alert("failed.try again");
    }
  
  }); // end ajax 
   
  
  }); // end '#registerForm').submit
 
 // user login 
$('#loginForm').submit(function(event){
  event.preventDefault();
  var formData=$(this).serialize();
 //alert(formData);
  $.ajax({
    url:"login",
    type:"post",
    data:{formData:formData, _token:csrf},
    success:function(response){
        if(response.type=="success"){
         window.location.href=response.url;
        }else if(response.type=="error"){
          $("#registerForm p").css({
            "display":"none"
          });
          $.each(response.errors,function(i,error){
            
            $("#user-"+i).text(error);
            $("#user-"+i).attr("style","color:red");
         //  setTimeout(function(){
           //   $("#user-"+i).css({
            //    "display":"none"
            //  });
           // },3000);
          });    
        }else if(response.type=="incorrect"){
          $("#user-incorrect").text(response.message);
          $("#user-incorrect").attr("style","color:red");
        }
    
    },error:function(){
      alert("failed.try again");
    }
  
  }); // end ajax 
   
  
  }); // end user login



 // forget password 
 $('#forgetPasswordForm').submit(function(event){
  event.preventDefault();
  var email=$("#email").val();
 //alert(formData);
  $.ajax({
    url:"new-password",
    type:"post",
    data:{email:email, _token:csrf},
    success:function(response){
        if(response.type=="success"){
         window.location.href=response.url;
        }else if(response.type=="error"){
          $("#forgetPasswordForm p").css({
            "display":"none"
          });
          $.each(response.errors,function(i,error){
            
            $("#user-"+i).text(error);
            $("#user-"+i).attr("style","color:red");
         //  setTimeout(function(){
           //   $("#user-"+i).css({
            //    "display":"none"
            //  });
           // },3000);
          });    
        }else if(response.type=="incorrect"){
          $("#user-incorrect").text(response.message);
          $("#user-incorrect").attr("style","color:red");
        }
    
    },error:function(){
      alert("failed.try again");
    }
  
  }); // end ajax 
   
  
  }); // end user login





// check address
$('#check-address').on('submit', function (e) {
  e.preventDefault(); // Prevent the form from submitting immediately

  $.ajax({
      url: "check/address", // Route to check address
      method: "POST",
      data: {
          _token: csrf, // CSRF token for security
      },
      success: function (response) {
          if (response.has_address) {
              // If user has an address, submit the form
             // alert('Address exists! Proceeding...');
              $('#check-address').unbind('submit').submit(); // Allow the form to submit normally
          } else {
              // If no address, show a prompt to add an address
             // alert('Please add your address!');
              // You can also show a modal or input box here for the user to add an address
               
              $('#add-new-address').click();
          }
      }
  });
});





// add new address
$('#add-address-form').on('submit', function (e) {
  e.preventDefault(); // Prevent the form from submitting immediately

  $.ajax({
      url: "/user/account-update", // Route to check address
      method: "POST",
      data: {
          _token: csrf, // CSRF token for security
      },
      success: function (response) {
          if (response.success) {
              
              alert(success);
              
          } else {
            alert("error"); 
               
          }
      }
  });
});// end fun




});// end document














 
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



// disable button add to cart
function disableButtonAdd(){
  var stock=$(".in-stock-ajax").text();
 // alert(quantity);
if(stock < 1){
  $("#submit-button").prop("disabled",true)
}


}// end disable button 


// update total
function updateTotal(){
  var total=$("#total").text();
  $.ajax({
    url:"update-total",
    type:"post",
    data:{_token:csrf},
    success:function(response){
     
      $("#total").text("Total :"+response["total"]);
    
    },error:function(){
      alert("failed.try again");
    }
  
  }); // update total ajax 
 
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