<?php
require_once_DIR_ .  "../Models/Link.php";

class LinkController {

   public function encurtar($link)
   {
      $novoCod = new Link;
      $res = $novoCod->geraCod();
      return $res;
   }

}
