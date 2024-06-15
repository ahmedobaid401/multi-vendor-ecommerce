

<!DOCTYPE html>
  <head>
     <meta charset="utf-8">
     <title></title>
  </head>
  <body>
    <tr>  <td>Dear {{$name}}  </td></tr>
    <tr>  <td> &nbsp; </td></tr>
    <tr>  <td> please click on below link to confirm your account: </td></tr>
    <tr>  <td> &nbsp; <br> </td></tr>
    <tr>  <td><a href="{{url('vendor/confirm/'.$code)}} ">{{url('vendor/confirm/'.$code)}}    </a>  </td></tr>
    <tr>  <td> &nbsp; <br> </td></tr>
    <tr>  <td>thanks & regards </td></tr>
    <tr>  <td> &nbsp; <br> </td></tr>
    <tr>  <td> ahmed devoloper </td></tr>
  </body>


</html>