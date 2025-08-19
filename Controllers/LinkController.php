<?php
require_once "Models/Link.php";

class LinkController
{
   public function encurtar($url, $con)
   {
      $encurta = new Link;
      $url = $encurta->sanitiza($url);
      if($url !== false)
      {
      $_SESSION['erro_url'] = false;
      $cod = $encurta->geraCod($con);
      $bo = $encurta->salva($url, $cod, $con);
      }
      else
      {
         $_SESSION['erro_url'] = true;
         header('Location: index.php');
      }

      $_SESSION['mylink'] = $cod;
      header('Location: index.php');
   }
   public function redireciona($link, $con) 
   {
     $redireciona = new Link;
     return $redireciona->pesquisa($link, $con);
   }
}
