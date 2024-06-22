<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "projetoFilmes";
$conect = mysqli_connect($servidor, $usuario, $senha, $banco);

if(mysqli_connect_errno()){
    die("Conexão falhou" . mysqli_connect_errno());
}

$_selectFilmes = "SELECT * FROM filme";
$_selectProducaoFilme = "SELECT * FROM  producaofilme";
$_selectComplementarFilme = "SELECT * FROM complementaresfilmes";

$_consultaFilme = mysqli_query($conect, $_selectFilmes);
$_consultaProducaoFilme = mysqli_query($conect, $_selectProducaoFilme);
$_consultaComplementarFilme = mysqli_query($conect, $_selectComplementarFilme);


//mysqli_fetch_assoc(recomendável) ou mysqli_fetch_row(resumido) ou mysqli_fetch_array(completo)
while ($registro1 = mysqli_fetch_row($_consultaFilme)){
    print_r($registro1);
    echo "<br><br>";
}
echo "<br><br><br>";
while ($registro2 = mysqli_fetch_row($_consultaProducaoFilme)){
    print_r($registro2);
    echo "<br><br>";
}
echo "<br><br><br>";
while ($registro3 = mysqli_fetch_row($_consultaComplementarFilme)){
    print_r($registro3);
    echo "<br>";
}
?>