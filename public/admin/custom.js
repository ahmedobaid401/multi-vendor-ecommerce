$(document).ready(function() {
  $('#d_Table').DataTable();
   //$(".nav-item").removeClass("active");
  // $(".nav-link").removeClass("active");
////////////////// update password validation  //////////////////
    $('#current_password').keyup(function(){
        var current_password= $('#current_password').val();
         
        $.ajax({
            type: "post",
          
            url:"check-current-password",
            data:{
               current_password:current_password,
               _token:csrf,
            },
            
            success:function(resp){
                
                if(resp=='true'){
                    $("#check_password").html('<font color="green"> correct password </font>');
                }else if(resp=='false'){
                    $("#check_password").html('<font color="red"> incorrect password </font>');
                }
            },
             error:function(error){
              alert(error);
             }
          
        });
    });

 
/////////////////  apdate status  ///////////////////////////////////////////////////////////
 $(document).on('click', '.updateStatus', function(){
  
   
         
      var id=$(this).attr("object_id");
      var current_status=$(this).attr("status");
      var object=$(this).attr("object");
 
   
  //alert(object);
  
     $.ajax({  
          type:"post",
          url:"/ecom9/public/admin/update-status",
          data:{
            current_status:current_status,
            id:id,
            object:object,
            _token:csrf,
          },
          success:function(data){
          
             if(data["status"]==1){
             
                  $("#Inactive-"+id).html( '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" width="20" height="20" fill="currentColor" class="bi bi-x-lg" >'
                                   +' <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>'
                                   + '</svg> '                                                        
                                );  
                  $("#Inactive-"+id).attr('status','Active');
                  $("#Inactive-"+id).attr('id','Active-'+id);
                 
             }else{
             // alert("else");
              
                $("#Active-"+id).html( '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">'
                             +' <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>'
                             +' </svg> '                                                    
                           );    
                $("#Active-"+id).attr('status','Inactive');
                $("#Active-"+id).attr('id','Inactive-'+id);
               
             }

          },
          error:function(error){
            alert(error);
           },
     });  
 });

////////////////////////////////// confirm section delete/////////////////////////////////////////////
 $(".confirmDelete").click(function(){

  var title= $(this).attr("title");
  if(confirm("Are you sure to delete this " + title +"?")){
    return true;
  }else{
    return false;
  }      
 });
 
  
 // end confirm function

 

////////////////////////////////// append categories for a section////////////////////////////////

$("#section_id").change( function(){
      var section_id = $(this).val();
     // alert("aaaaaaaaaaaaa");
      $.ajax({
          type:"post",
          url:"/ecom9/public/admin/append_categories",
          data:{
             section_id:section_id,
             _token:csrf
            },
          success:function(data){
           // alert(data);
              $("#append_categories").html(data);
          },
          error:function(error){
             alert("error");
          }

      });// end ajax function

});// end append categories

 //////////////////////// add-rempve fields //////////////////////////////
    // Once add button is clicked
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var addColor = $('.add_button').attr("id"); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="mb-3">  <input type="text" name="size[]" style="width:110px;"  placeholder="size" required/>'
                             + ' <input type="text" name="sku[]"  style="width:110px;" placeholder="sku" required/>'                         
                             +' <input type="text" name="price[]" style="width:110px;" placeholder="price" required/>'
                             + ' <input type="text" name="stock[]"  style="width:110px;" placeholder="stock" required/>' 
                             + '<a href="javascript:void(0);" class="remove_button"> remove </a>'
                    + ' </div>'; //New input field html 
                     
    var x = 1; //Initial field counter is 1
 
    // add color
  if(addColor=="add-color"){
    //alert(addColor);
        var fieldHTML = '<div class="mb-3">  <input type="text" name="color[]" style="width:110px;"  placeholder="color" required/>'
                                                 
                              
                             + ' <input type="text" name="stock[]"  style="width:110px;" placeholder="stock" required/>' 
                             + '<a href="javascript:void(0);" class="remove_button"> remove </a>'
                    + ' </div>'; //New input field html 
  }
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increase field counter
            $(wrapper).append(fieldHTML); //Add field html
        }else{
            alert('A maximum of '+maxField+' fields are allowed to be added. ');
        }
    });
    
    // Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrease field counter
    });
 /////////////////////////////////////////////////////////////////////////
 

//============== append category filters ================//
$("#category_filters").on("change",function(){
    var category_id=$(this).val();
    //alert(category_id);

    $.ajax({

        type:"post",
        url:"append_filters",
        data:{
           category_id:category_id,
           _token:csrf
          },
        success:function(data){
         // alert(data);
            $("#append_filters").html(data.view);
        },
        error:function(error){
           alert("error");
        }

    });
});



});








 