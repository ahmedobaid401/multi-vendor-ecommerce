<!DOCTYPE html>
  <head>
     <meta charset="utf-8">
     <title></title>
  </head>
  <body>
  <table>
    <tr>  <td>Dear {{$name}}  </td></tr>
    <tr>  <td> &nbsp; </td></tr>
    <tr>  <td> please click on link below to confirm your email</td></tr>
    <tr>  <td> &nbsp; <br> </td></tr>
    <tr>  <td>  <a href="{{url('user/confirm/'.$code)}}">Confirm account</a>  <br> </td></tr>
    <tr>  <td> &nbsp; <br> </td></tr>
    <tr>  <td> phone : {{$phone}}  </td></tr>
    <tr>  <td> &nbsp; <br> </td></tr>
    <tr>  <td> ahmed devoloper </td></tr>
 </table>
  </body>


</html>