<?php
session_start();
include "config/conecta.php";
require "Controllers/LinkController.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $url = $_POST['link'] ?? null; //Recebe um GET do form para lógica da rota

    if (isset($url)) {
        $encurta = new LinkController;
        $res = $encurta->encurtar($url, $con);
        echo $res;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    $link = $_GET['ml'] ?? null;
    $sucesso = $_GET['s'] ?? null;

    if (isset($link)) {
        $redireciona = new LinkController;
        $busca = $redireciona->redireciona($link, $con);
        header("Location:" . $busca['link']);
    } elseif (isset($sucesso)) {
        require_once "views/form.php";
    } else {
        require_once "views/form.php";
    }
}
