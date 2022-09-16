<?php

namespace App\CriarCSV;

class CriarNomeArquivo
{
    public static function NomeAleatorio()
    {
        return "Dados" . time();
    }
}