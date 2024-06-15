<?php

 function activSidebar(int $segment_param , string $segment_res){
 
  return  request()->segment($segment_param)==$segment_res? true  : false   ;


}


?>