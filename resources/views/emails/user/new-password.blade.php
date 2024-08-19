<!DOCTYPE html>
  <head>
     <meta charset="utf-8">
     <title></title>
  </head>
  <body>
  <table>
    <tr>  <td>Dear {{$name}}  </td></tr>
    <tr>  <td> &nbsp; </td></tr>
    <tr>  <td> you can put new password from below</td></tr>
    <tr>  <td> &nbsp; <br> </td></tr>
    <tr> click below to set new password <td><br> 
    <tr>  <td>  <a href="{{url('user/new-password-form/'.$code)}}">click here</a>  <br> </td></tr>
   
  
  </td></tr>
    <tr>  <td> &nbsp; <br> </td></tr>
    <tr>  <td> phone : {{$phone}}  </td></tr>
    <tr>  <td> &nbsp; <br> </td></tr>
    <tr>  <td> ahmed devoloper </td></tr>
 </table>
  </body>


</html>