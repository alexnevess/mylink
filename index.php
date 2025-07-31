<?php
include "config/conecta.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $codLink = $_GET['ml'] ?? null;

    if ($codLink === null) {
        header('Location: form.php');
    } else {
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
}
