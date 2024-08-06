<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta charset="ISO-8859-15">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/imagemPagInicial1.css">
    <!-- <link rel="stylesheet" href="../css/cabecalho.css"> -->
    <!-- <link rel="stylesheet" href="../css/rodape.css"> -->
    <title>Filmes</title>
</head>

<body>
    <?php
    require_once("conexao/Conexao.php");

    $consultaComplementaresFilmes = "SELECT * FROM complementaresFilmes";
    $consultaFilmes = "SELECT * FROM filme where codigo_filme = ";
    $consultaProducaoFilme = "SELECT * FROM producaofilme where codigo_filme = ";

    $_consultaComplementaresFilme = mysqli_query($conecta, $consultaComplementaresFilmes);

    if (!$_consultaComplementaresFilme) {
        die("Falha na consulta ao banco de dados");
    }
    ?>
    <div>
        <?php require_once("public/cabecalho.php"); ?>
    </div>
    <main>
        <h1>Filmes Disponiveis</h1>
        <ul class="container">
            <?php //Exemplo de funcionamento.
            $_i = 0;
            while ($registro = mysqli_fetch_array($_consultaComplementaresFilme)) {
                $codigoFilme = $registro["codigo_Filme"];
                $consultaNomeFilme = "SELECT nome_Filme, sinopse FROM filme WHERE codigo_Filme = $codigoFilme";
                $_consultaNomeFilme = mysqli_query($conecta, $consultaNomeFilme);
                $registroNomeFilme = mysqli_fetch_array($_consultaNomeFilme);

                // Ajuste o caminho da imagem aqui
                $imagemCapa = str_replace('../', '', $registro["imagem_Capa"]);
            ?>
                <div class="conteudo">
                    <div class="hover-text">
                        <li class="item">
                            <a href="php/descricaoFilme.php?codigo=<?php echo $registro["codigo_Filme"] ?>" target="_blank">
                                <img src="<?php echo $imagemCapa ?>">
                                <span class="tooltip-text" id="fade"><?php echo $registroNomeFilme["sinopse"]; ?></span>
                            </a>
                        </li>
                    </div>
                </div>
                <br>
            <?php
            }
            ?>
        </ul>
    </main>

    <?php
    require_once("public/rodape.php");

    mysqli_free_result($_consultaComplementaresFilme);
    mysqli_free_result($_consultaNomeFilme);
    mysqli_close($conecta);
    ?>

</body>

</html>
