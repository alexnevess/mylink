<?php
include "config/conecta.php";
require "Controllers/LinkController.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $route = $_POST['route'] ?? null; //Recebe um GET do form para lógica da rota

    if ($route === "form") {
        $encurta = new LinkController;
        $res = $encurta->encurtar($_POST['link'], $con);
        echo $res; 
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    $link = $_GET['ml'] ?? null;

    if (isset($link)) {
        $redireciona = new LinkController;
        $busca = $redireciona->redireciona($link, $con);
        header("Location:".$busca['link']); 
    } else {
        require_once "views/form.php";
    }
}
