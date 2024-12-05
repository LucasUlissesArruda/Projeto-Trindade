<?php 

    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "trindadeimoveis";

    $conn = mysqli_connect($host, $user, $password, $database);

    if(!$conn){
        echo "A conexão Falhou. Erro: ". mysqli_connect_error();
    }

?>