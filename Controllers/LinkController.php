<?php
require_once "Models/Link.php";

class LinkController {

   public function encurtar($link, $con)
   {
      $novoCod = new Link;
      $res = $novoCod->geraCod($con);
      return $res;
   }
}
?>
