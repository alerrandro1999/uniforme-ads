<?php

namespace App\CriarCSV;

class CriarCSV
{
    public static function criarArquivo($arquivo, $dados)
    {
        $csv = fopen($arquivo, 'w');
        foreach ($dados as $linha) {
            fputcsv($csv, $linha, ';');
        }
        fclose($csv);
        return true;
    }
}