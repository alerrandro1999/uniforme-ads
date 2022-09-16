<?php

namespace App\Queries;

use App\Database\Connection;

class Alunos extends Connection
{
    public function insertAluno($nome, $tamanho, $quantidade)
    {
        try {
            $sql = Connection::connectionDatabase()->prepare("INSERT INTO alunos (nome, tamanho, quantidade) VALUES(:a, :b, :c)");
            $sql->bindValue(':a', $nome);
            $sql->bindValue(':b', $tamanho);
            $sql->bindValue(':c', $quantidade);
            $sql->execute();
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAlunos()
    {
        try {
            $sql = Connection::connectionDatabase()->prepare("SELECT id, nome, tamanho, quantidade FROM alunos");
            $sql->execute();
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}