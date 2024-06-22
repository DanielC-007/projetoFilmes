<?php
    if(isset($_POST["filme"])){
        $_filme = $_POST["filme"];
    }

    if(isset($_POST["sinopse"])){
        $_sinopse = $_POST["sinopse"];
    }

    if(isset($_POST["produtora"])){
        $_produtora = $_POST["produtora"];
    }
    
    if(isset($_POST["lancamento"])){
        $_lancamento = $_POST["lancamento"];
    }
    
    if(isset($_POST["orcamento"])){
        $_orcamento = $_POST["orcamento"];
    }
    
    if(isset($_POST["diretor"])){
        $_diretor = $_POST["diretor"];
    }
    
    if(isset($_POST["elenco"])){
        $_elenco = $_POST["elenco"];
    }

    if(isset($_POST["Gen"])){
        $_gen = $_POST["Gen"];
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title><?php echo $_filme?></title>
</head>
<body>
    <header><h1><?php echo $_filme;?></h1></header>
    <main class="container">
        <ul>
            <p>Filme: <?php echo $_filme;?></p>
            <p>Sinopse: <?php echo $_sinopse;?></p>
            <p>Produtora: <?php echo $_produtora;?></p>
            <p>Lançamento: <?php echo $_lancamento;?></p>
            <p>Gênero: <?php echo $_gen;?></p>
            <p>Orçamento: <?php echo $_orcamento;?></p>
            <p>Diretor: <?php echo $_diretor;?></p>
            <p>Elenco: <?php echo $_elenco;?></p>
        </ul>
    </main>
</body>
</html>