<?php
require_once "Models/Link.php";

class LinkController
{
   public function encurtar($url, $con)
   {
      $encurta = new Link;
      $url = $encurta->sanitiza($url);
      $cod = $encurta->geraCod($con);
      $bo = $encurta->salva($url, $cod, $con);

      include "Views/form.php";
   }
   public function redireciona($link, $con) 
   {
     $redireciona = new Link;
     return $redireciona->pesquisa($link, $con);
   }
}
