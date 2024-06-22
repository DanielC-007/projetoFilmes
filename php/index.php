<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar um filme</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <header>
            <h1>Criar um filme</h1>
    </header>
    <main class="container">
        <form method="post" action="descricaoFilme.php">
            <input type="text" name="filme" placeholder="Nome do filme" required><br>
            <input type="text" name="sinopse" placeholder="Sinopse" required><br>
            <input type="text" name="produtora" placeholder="Produtora" required><br>
            <input type="date" name="lancamento" placeholder="Lançamento" required><br>
            <div id="check">
                <p>Gênero:</p>
                <input type="checkbox" name="Gen" value="genero1">gen1 <br>
                <input type="checkbox" name="Gen" value="genero2">gen2 <br>
                <input type="checkbox" name="Gen" value="genero3">gen3 <br>
                <input type="checkbox" name="Gen" value="genero4">gen4 <br>
                <input type="checkbox" name="Gen" value="genero5">gen5 <br>
            </div>
            <input type="number" name="orcamento" placeholder="Orçamento" required><br>
            <input type="text" name="diretor" placeholder=" Diretor" required><br>
            <input type="text" name="elenco" placeholder="Elenco" required><br>
            <input type="submit" id="enviar" placeholder="Enviar" value="Enviar">
        </form>
    </main>
    
</body>
</html>