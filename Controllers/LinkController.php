<?php
require_once "Models/Link.php";

class LinkController
{

   public function encurtar($url, $con)
   {
      $link = new Link;
      $url = $link->sanitiza($url);
      $cod = $link->geraCod($con);
      $bo = $link->salva($url, $cod, $con);
      
      include "Views/form.php";
   }
}
