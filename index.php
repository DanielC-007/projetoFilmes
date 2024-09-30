<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/imagemPagInicial1.css">
    <title>Filmes</title>
</head>

<body>
    <?php
    require_once("conexao/Conexao.php");

    // Consulta para obter todos os filmes
    $consultaComplementaresFilmes = "SELECT * FROM complementaresFilmes";

    if ($stmt = mysqli_prepare($conecta, $consultaComplementaresFilmes)) {
        mysqli_stmt_execute($stmt);
        $_consultaComplementaresFilme = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
    } else {
        die("Erro na preparação da consulta complementaresFilmes: " . mysqli_error($conecta));
    }

    if (!$_consultaComplementaresFilme) {
        die("Falha na consulta ao banco de dados: " . mysqli_error($conecta));
    }
    ?>
    <div>
    <head>
    <link rel="stylesheet" href="styles/header.css">
</head>
<header>
    <div class="logo" id="logo" onclick="window.location='index.php'">
        <img src="imagens/icon.jpg">
        <h3>Prof Vector </h3>
    </div>

    <div class="botoes" onclick="window.location='inicial.php'">
        <a href="">Inicio</a>
        <a href="">Categorias</a>
        <a href="php/sobrenos.php">Sobre Nós</a>
    </div>
</header> 
    </div>
    <main>
        <h1>Filmes Disponíveis</h1>
        <ul class="container">
            <?php
            while ($registro = mysqli_fetch_array($_consultaComplementaresFilme)) {
                $codigoFilme = (int) $registro["codigo_Filme"];

                // Consulta para obter nome e sinopse do filme
                $consultaNomeFilme = "SELECT nome_Filme, sinopse FROM filme WHERE codigo_Filme = ?";
                if ($stmt = mysqli_prepare($conecta, $consultaNomeFilme)) {
                    mysqli_stmt_bind_param($stmt, "i", $codigoFilme);
                    mysqli_stmt_execute($stmt);
                    $resultado = mysqli_stmt_get_result($stmt);
                    $registroNomeFilme = mysqli_fetch_array($resultado);
                    mysqli_stmt_close($stmt);
                } else {
                    die("Erro na preparação da consulta nome_Filme: " . mysqli_error($conecta));
                }

                // Ajuste o caminho da imagem aqui
                $imagemCapa = htmlspecialchars(str_replace('../', '', $registro["imagem_Capa"]));
            ?>
                <div class="conteudo">
                    <div class="hover-text">
                        <li class="item">
                            <a href="php/descricaoFilme.php?codigo=<?php echo htmlspecialchars($registro["codigo_Filme"]); ?>" target="_blank">
                                <img src="<?php echo $imagemCapa; ?>" alt="Capa do filme">
                                <span class="tooltip-text" id="fade"><?php echo htmlspecialchars($registroNomeFilme["sinopse"]); ?></span>
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
    <head>
    <link rel="stylesheet" href="styles/footer.css">
</head>
<footer>
    <div id="logoRodape" onclick="window.location='index.php'">
        <img src="imagens/icon.jpg">
        <h3>Prof Vector </h3>
    </div>
    <div class="Texto">
        Conteudo Desenvolvido por: Profº Vector.
        para ser usado nas aulas de SW2.
        ETEC Rio Grande Da Serra
    </div>
</footer>

    <?php

    // Liberar resultados e fechar a conexão
    mysqli_free_result($_consultaComplementaresFilme);
    mysqli_close($conecta);
    ?>

</body>

</html>
