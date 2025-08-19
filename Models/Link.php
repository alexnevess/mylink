<?php
class Link
{
    public function sanitiza($url)
    {
        if (stristr($url, "http://") !== false) {
            $url = str_replace("http://", "", $url);
            $url = "https://" . $url;
        } elseif (stristr($url, "https://") === false) {
            $url = "https://" . $url;
        }

        $url_validada = filter_var($url, FILTER_VALIDATE_URL);
        return $url_validada;
    }
    public function geraCod($con)
    {
        do {
            //Gera código
            $num = mt_rand(10000, 99999);
            $num = dechex($num);

            //Consulta se o código existe no BD
            $sql = "SELECT mylink FROM mylink WHERE mylink = ?";
            $consulta = $con->prepare($sql);
            $consulta->bind_param("s", $num);
            $consulta->execute();
            $resultado = $consulta->get_result();
            $linhas = $resultado->fetch_assoc();
        } while ($linhas !== null);

        return $num;
    }
    public function salva($url, $cod, $con)
    {
        $sql = "INSERT INTO mylink (link, mylink) VALUES (?,?)";
        $consulta = $con->prepare($sql);
        $consulta->bind_Param("ss", $url, $cod);
        return $consulta->execute();
    }
    public function pesquisa($link, $con)
    {
        $sql = "SELECT link FROM mylink WHERE mylink = ?";
        $consultaMyLink = $con->prepare($sql);
        $consultaMyLink->bind_param("s", $link);
        $consultaMyLink->execute();
        $resultado = $consultaMyLink->get_result();
        return $resultado->fetch_assoc();

    }
}
