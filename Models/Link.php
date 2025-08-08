<?php
class Link
{
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
}
