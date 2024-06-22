<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/styleTeste.css">
        <title>Document</title>
    </head>
    <body>
        <?php
            $servidor = "localhost";
            $usuario = "root";
            $senha = "";
            $banco = "projetoFilmes";
            $conecta = mysqli_connect($servidor, $usuario, $senha, $banco);

            if(mysqli_connect_errno()){
            die("Conexão falhou" . mysqli_connect_errno());
            }

            $consultafilme = "SELECT * FROM  filme";
            $_consultafilme = mysqli_query($conecta, $consultafilme);

            if (!$_consultafilme) {
            die("falha na consulta ao banco de dados");
            }

            while($registro = mysqli_fetch_array($_consultafilme)) {
        ?>
        <h1>
            <?php echo $registro["nome_Filme"]; ?>
        </h1>
        <p>
            <?php
            echo $registro["sinopse"];
            }
            ?>
        </p>
    </body>
</html>