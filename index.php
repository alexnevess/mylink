<?php
include "config/conecta.php";
require "Controllers/LinkController.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $codLink = $_GET['ml'] ?? null;
    $route = $_GET['route'] ?? null;//Recebe um GET do form para lógica da rota

    if ($route === null) {
        if ($codLink !== null) {
            //Busca o link no BD através da query GET
            $sql = "SELECT link , mylink FROM mylink WHERE mylink = ?";
            $consulta = $con->prepare($sql);
            $consulta->bind_param("s", $codLink);
            $consulta->execute();
            $resultado = $consulta->get_result();
            $linhas = $resultado->fetch_assoc();

            if ($linhas === null) {
                header('Location: form.php');
            } else {
                echo "Redirecionando...";
                header('Location:' . $linhas['link']); //Redireciona link
            }
        }
    }elseif($route === "form")
    {
        $controller = new LinkController;
        $res = $controller->encurtar($_POST['link'], $con);
        echo $res;
        
    }
}else{
    header('Location: Views/form.php');
}
