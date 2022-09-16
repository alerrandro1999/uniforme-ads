<?php
require __DIR__ . '/../vendor/autoload.php';

App\VariaviesDeAmbiente\Variaveis::load(__DIR__ . '/../');

use App\Queries\Alunos;

use App\CriarCSV\CriarCSV;

use App\CriarCSV\CriarNomeArquivo;

$alunos = new Alunos;

$getalunos = $alunos->getAlunos();

    

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Fadesa - ADS</title>
</head>

<body>
    <section class="main">
        <div class="container">
            <div class="imagem">
                <img src="public/imagem/image.svg" alt="">
            </div>
            <div class="textos">
                <form name="alunos" method="post">
                    <label for="">Nome Completo</label>
                    <input type="text" name="nome" id="" required>
                    <label for="">Quantidade</label>
                    <select name="quantidade" id="" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <label for="">Tamanho</label>
                    <select name="tamanho" id="" required>
                        <option value="P">P</option>
                        <option value="M">M</option>
                        <option value="G">G</option>
                        <option value="GG">GG</option>
                    </select>
                    <!-- <button type="submit" name="enviar">Enviar</button> -->
                    <!-- <button type="submit" name="pdf">Gerar PDF</button> -->
                    <input class="botoes" type="submit" value="Enviar" name="enviar">

                </form>
                <form action="" method="post">
                    <input class="botoes" type="submit" value="PDF" name="csv">
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

    if (isset($_POST['csv'])) {
        // foreach ($getalunos as $value) {
        //     $dados = [
        //         [
        //             'ID',
        //             'Nome',
        //             'Tamanho',
        //             'Quantidade',
        //         ],
        //         [
        //             $value['id'],
        //             $value['nome'],
        //             $value['tamanho'],
        //             $value['quantidade']
        //         ]
        //     ];

        // }
        CriarCSV::criarArquivo(CriarNomeArquivo::NomeAleatorio() . '.csv', $getalunos);
    }


    ?>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <!-- <script src="javascript/scripts.js"></script> -->

    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'public/Ajax.php', //arquivo php onde serão buscados os dados
                type: 'post', //método HTTP usado
                success: function(dados) {
                    $('#result').html(dados);
                }
            });
        });
    </script>

</body>

</html>