<?php

namespace App\Alura;

class Usuario
{
    private $nome;
    private $sobrenome;

    function __construct(string $nome)
    {
        $nomeSobrenome = explode(' ', $nome, 2); // Retorna um array com no máximo duas outras string baseadas na string de origem.
        if ($nomeSobrenome[0] === "") {
            $this->nome = 'Nome inválido';
        } else {
            $this->nome = $nomeSobrenome[0];
        }
        // if ($nomeSobrenome[1] === null) { // Esta é a linha proposta pelo curso, mas exibiu um warning de chave de array não definida.
        if (count($nomeSobrenome) < 2 || $nomeSobrenome[1] === null) {
            $this->sobrenome = 'Sobrenome inválido';
        } else {
            $this->sobrenome = $nomeSobrenome[1];
        }
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