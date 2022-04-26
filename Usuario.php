<?php

namespace Alura;

class Usuario
{
    private $nome;
    private $sobrenome;

    function __construct(string $nome)
    {
        $nome_sobrenome = explode(' ', $nome, 2); // Retorna um array com no máximo duas outras string baseadas na string de origem.
        $this->nome = $nome_sobrenome[0];
        $this->sobrenome = $nome_sobrenome[1];
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getSobreNome()
    {
        return $this->sobrenome;
    }
}