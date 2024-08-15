<!DOCTYPE html>
<html lang="pt-br">
<?php
require_once("../conexao/Conexao.php");
require_once("../conexao/funcoes.php");
if (isset($_GET["codigo"])){
 $codigo = $_GET["codigo"];
} else {
 header("Location: index.php");
}

$consultaFilme = "SELECT * from filme where codigo_filme = {$codigo}";
$consultaProducaoFilme = "SELECT * from producaoFilme where codigo_Filme = $codigo";
$consultaComplementares = "SELECT * from complementarFilmes where codigo_Filme = $codigo";
$detalheFilme = mysqli_query($conecta, $consultaFilme);
$detalheProducaoFilme = mysqli_query($conecta, $consultaProducaoFilme);
$detalheComplementares = mysqli_query($conecta,$consultaComplementares )  

if(!$detalheFilme) {
 die("falha no banco de Dados");
}else{
$dados_detalheFilme = mysqli_fetch_assoc($detalheFilme);
$codigoFilme = $dados_detalheFilme['codigo_Filme'];
$nome_Filme = $dados_detalheFilme['nome_Filme'];
$sinopse = $dados_detalheFilme['sinopse'];
$produtora = $dados_detalheFilme['produtora'];
$dat_Lancamento = $dados_detalheFilme['data_Lancamento'];
$genero = $dados_detalheFilme['genero'];
$orcamento = $dados_detalheFilme['orcamento'];
$idioma = $dados_detalheFilme['idioma'];
$receita = $dados_detalheFilme['receita'];
}
if (!$detalheProducaoFilmea){
    die("Falha no banco de dados");
} else {
    $dados_detalheProducaoFilme = mysqli_fetch_assoc($detalheComplementares);
    $imagem_capa = $dados_detalheComplementares['imagem_Capa'];
    $trailer1 = $dados_detalheComplementares['link_Trailer1'];
    $trailer2 = $dados_detalheComplementares['link_Trailer2'];
}

?>
<head>
    <!-- <meta charset="UTF-8"> -->
    <meta charset="ISO-8859-15">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/descricaoFilme2.css">
    <link rel="stylesheet" href="../styles/cabecalho.css">
    <link rel="stylesheet" href="../styles/rodape.css">
    <title><?php echo $nome_Filme ?></title>
</head>
<body>
    <div>
        <?php require_once("cabecalho.php"); ?>
    </div>
    <main>
        <div class="conteudo">
            <ul>
                <li>
                    <h1> <?php echo $nome_Filme; ?> </h1>
                </li>
                <li> <img src="<?php echo $imagem_capa ?>" class="imagem_Capa"> </li>
                <li>
                    <h3>Sinopse:</h3> <?php echo $sinopse; ?>
                </li>
                <li>
                    <h3>Produtora:</h3> <?php echo $produtora; ?>
                </li>
                <li>
                    <h3>Ano de lançamento:</h3> <?php echo $dat_Lancamento; ?>
                </li>
                <li>
                    <h3>Gênero:</h3> <?php echo $genero; ?>
                </li>
                <li>
                    <h3>Orçamento:</h3> <?php echo dolar_format($orcamento); ?>
                </li>
                <li>
                    <h3>Idioma(original):</h3> <?php echo $idioma; ?>
                </li>
                <li>
                    <h3>Receita:</h3> <?php echo dolar_format($receita); ?>
                </li>
                <li>
                    <h3>Diretor(es):</h3> <?php echo $diretor; ?>
                </li>
                <li>
                    <h3>Elenco:</h3> <?php echo $elenco; ?>
                </li>
                <li>
                    <h3>Distribuição:</h3> <?php echo $distribuicao; ?>
                </li>
                <li>
                    <h3>Roteiro:</h3> <?php echo $roteiro; ?>
                </li>
                <li>
                    <h3>Compositores:</h3> <?php echo $musica; ?>
                </li>
                <li>
                    <h3 style="clear:both">Trailer(português):</h3> <?php echo $trailer1; ?>
                </li>
                <li>
                    <h3>Trailer(original):</h3> <?php echo $trailer2; ?>
                </li>
            </ul>
        </div>
    </main>
    <?php require_once("rodape.php");?>
</body>
</html>