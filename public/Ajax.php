<?php
require __DIR__ . '/../vendor/autoload.php';

App\VariaviesDeAmbiente\Variaveis::load(__DIR__ . '/../');


use App\Queries\Alunos;

$alunos = new Alunos;

$alunos = $alunos->getAlunos();

foreach ($alunos as $value) {
    echo $dado = '<tr>
            <td>' . $value['id'] .       '</td>
            <td>' . $value['nome'] .      '</td>
            <td>' . $value['quantidade'] . '</td>
            <td>' . $value['tamanho'] .   '</td></tr>';
}                    
