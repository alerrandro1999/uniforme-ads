<?php
require __DIR__ . '/../vendor/autoload.php';

App\VariaviesDeAmbiente\Variaveis::load(__DIR__ . '/../');

use App\Queries\Alunos;

$alunos = new Alunos;
// $dados = $alunos->getAlunos();


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Fadesa - ADS</title>
</head>

<body>
    <section class="main">
        <div class="container">
            <div class="imagem">
                <img src="imagem/image.svg" alt="">
            </div>
            <div class="textos">
                <form name="alunos" method="post">
                    <label for="">Nome Completo</label>
                    <input type="text" name="nome" id="">
                    <label for="">Quantidade</label>
                    <select name="quantidade" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <label for="">Tamanho</label>
                    <select name="tamanho" id="">
                        <option value="P">P</option>
                        <option value="M">M</option>
                        <option value="G">G</option>
                        <option value="GG">GG</option>
                    </select>
                    <button type="alunos" name="enviar">Enviar</button>
                </form>
            </div>
        </div>
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>Cod</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Tamanho</th>
                    </tr>
                </thead>
                <tbody id="result">
            </table>
        </div>
    </section>

    <?php
    if (isset($_POST['nome'])) {
        $nome = $_POST['nome'];
        $quantidade = $_POST['quantidade'];
        $tamanho = $_POST['tamanho'];
        $alunos->insertAluno($nome, $tamanho, $quantidade);
    }
    ?>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

<!-- <script src="javascript/scripts.js"></script> -->

<script>
    $(document).ready(function(){
    $.ajax({
        url: 'Ajax.php',//arquivo php onde serão buscados os dados
        type:'post',     //método HTTP usado
        success: function(dados){
            $('#result').html(dados);
        }
    });
});
</script>

</body>
</html>