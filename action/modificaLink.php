<?php
session_start();

include "../config/conecta.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $link = $_POST['link'] ?? "";

    //Adiciona htpps ao link 
    if (stristr($link, "http://") !== false) {
        $link = str_replace("http://", "", $link);
        $link = "https://" . $link;
    } elseif (stristr($link, "https://") === false) {
        $link = "https://" . $link;
    }

    do {
        $cod = mt_rand(10000, 999999); //gera código
        $cod = dechex($cod); //transforma o código em hexadecimal

        //testa se o código já existe no bd
        $sqlConsulta = "SELECT mylink FROM mylink WHERE mylink = ?";
        $executa = $con->prepare($sqlConsulta);
        $executa->bind_param("s", $cod);
        $executa->execute();
        $resultado = $executa->get_result();
        $linhas = $resultado->fetch_assoc();
    } while ($linhas !== null);//Se for diferente de null gera um novo código

    //Salva o link original modificado e o novo link no BD
    $sql = "INSERT INTO mylink (link, mylink) VALUES (?,?)";
    $consulta = $con->prepare($sql);
    $consulta->bind_Param("ss", $link, $cod);
    $consulta->execute();

    $_SESSION['mylink'] = $cod;
    header('Location: ../form.php');
}
