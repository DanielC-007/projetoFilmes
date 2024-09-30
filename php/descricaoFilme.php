<?php require_once("../conexao/Conexao.php");?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../styles/descricaoFilme2.css"> -->
    <link rel="stylesheet" href="../styles/dFilmes.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <title><?php echo "$nome_Filme"; ?></title>
</head>

<body>
    <?php
    // Verifique e sanitize o código do filme
    if (isset($_GET["codigo"]) && is_numeric($_GET["codigo"])) {
        $codigo = (int) $_GET["codigo"];
    } else {
        die("Código inválido.");
    }

    // Consultas preparadas
    $consultaFilme = "SELECT * FROM filme WHERE codigo_Filme = ?";
    $consultaProducaoFilme = "SELECT * FROM producaoFilme WHERE codigo_Filme = ?";
    $consultaComplementares = "SELECT * FROM complementaresFilmes WHERE codigo_Filme = ?";

    // Consulta de filme
    if ($stmt = mysqli_prepare($conecta, $consultaFilme)) {
        mysqli_stmt_bind_param($stmt, "i", $codigo);
        mysqli_stmt_execute($stmt);
        $detalheFilme = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        if ($detalheFilme) {
            $dados_detalheFilme = mysqli_fetch_assoc($detalheFilme);
            $nome_Filme = $dados_detalheFilme['nome_Filme'];
            $sinopse = $dados_detalheFilme['sinopse'];
            $produtora = $dados_detalheFilme['produtora'];
            $dat_Lancamento = $dados_detalheFilme['data_Lancamento'];
            $genero = $dados_detalheFilme['genero'];
            $orcamento = $dados_detalheFilme['orcamento'];
            $idioma = $dados_detalheFilme['idioma'];
            $receita = $dados_detalheFilme['receita'];
        } else {
            die("Nenhum filme encontrado.");
        }
    } else {
        die("Erro na preparação da consulta filme: " . mysqli_error($conecta));
    }

    // Consulta de dados complementares
    if ($stmt = mysqli_prepare($conecta, $consultaComplementares)) {
        mysqli_stmt_bind_param($stmt, "i", $codigo);
        mysqli_stmt_execute($stmt);
        $detalheComplementares = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        if ($detalheComplementares) {
            $dados_detalheComplementares = mysqli_fetch_assoc($detalheComplementares);
            $imagem_capa = $dados_detalheComplementares['imagem_Capa'];
            $trailer1 = $dados_detalheComplementares['link_Trailer1'];
            $trailer2 = $dados_detalheComplementares['link_Trailer2'];
        } else {
            $imagem_capa = $trailer1 = $trailer2 = 'Não disponível';
        }
    } else {
        die("Erro na preparação da consulta complementares: " . mysqli_error($conecta));
    }
    ?>
    <div>
        <?php require_once("../public/cabecalho.php"); ?>
    </div>
    <main>
        <div class="conteudo">
            <ul>
                <li>
                    <h1><?php echo htmlspecialchars($nome_Filme); ?></h1>
                </li>
                <div class="disflex">
                <li> <img src="<?php echo htmlspecialchars($imagem_capa); ?>" class="imagem_Capa"> </li>
                <div class="div1">
                <li>
                    <h3>Sinopse:</h3> <?php echo htmlspecialchars($sinopse); ?>
                </li>
                <li>
                    <h3>Produtora:</h3> <?php echo htmlspecialchars($produtora); ?>
                </li>
                <li>
                    <h3>Ano de lançamento:</h3> <?php echo htmlspecialchars($dat_Lancamento); ?>
                </li>
                <li>
                    <h3>Gênero:</h3> <?php echo htmlspecialchars($genero); ?>
                </li>
                <li>
                    <h3>Orçamento:</h3> <?php echo htmlspecialchars($orcamento); ?>
                </li>
                <li>
                    <h3>Idioma (original):</h3> <?php echo htmlspecialchars($idioma); ?>
                </li>
                </div>
                <div class="div2">
                <li>
                    <h3>Receita:</h3> <?php echo htmlspecialchars($receita); ?>
                </li>
                <li>
                    <h3>Diretor(es):</h3> <?php echo htmlspecialchars(isset($diretor) ? $diretor : 'Não disponível'); ?>
                </li>
                <li>
                    <h3>Elenco:</h3> <?php echo htmlspecialchars(isset($elenco) ? $elenco : 'Não disponível'); ?>
                </li>
                <li>
                    <h3>Distribuição:</h3> <?php echo htmlspecialchars(isset($distribuicao) ? $distribuicao : 'Não disponível'); ?>
                </li>
                <li>
                    <h3>Roteiro:</h3> <?php echo htmlspecialchars(isset($roteiro) ? $roteiro : 'Não disponível'); ?>
                </li>
                <li>
                    <h3>Compositores:</h3> <?php echo htmlspecialchars(isset($musica) ? $musica : 'Não disponível'); ?>
                </li>
                </div>
                </div>
                <li>
                    <h3 style="clear:both">Trailer (português):</h3> <?php echo ($trailer1); ?>
                </li>
                <li>
                    <h3>Trailer (original):</h3> <?php echo ($trailer2); ?>
                </li>
            </ul>
        </div>
    </main>
    <?php require_once("../public/rodape.php");?>
</body>
</html>
