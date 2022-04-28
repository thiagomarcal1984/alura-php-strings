<?php

namespace App\Alura;

class Usuario
{
    private $nome;
    private $sobrenome;
    private $senha;
    private $tratamento;

    public function __construct(string $nome, string $senha, string $genero)
    {
        $this->setNomeSobrenome($nome);
        $this->validaSenha($senha);
        $this->adicionaTratamentoAoSobrenome($nome, $genero);
    }

    private function adicionaTratamentoAoSobrenome(string $nome, string $genero)
    {
        // A função preg_replace retorna uma string que substitui o conteúdo de uma string original. 
        // Há 4 parâmetros: a expressão regular, a string substituta, a string de origem e o limite de substituição (inteiro).
        if ($genero === 'M') {
            $this->tratamento = preg_replace("/^(\w+)\b/", "Sr. ", $nome, 1); 
            // \w casa com letras maiúsculas e minúsculas; \b casa com o fim de uma palavra
        }
        if ($genero === 'F') {
            $this->tratamento = preg_replace("/^(\w+)\b/", "Srª. ", $nome, 1); 
            // \w casa com letras maiúsculas e minúsculas; \b casa com o fim de uma palavra
        }
    }

    private  function setNomeSobrenome($nome)
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

    public function getNome() : string
    {
        return $this->nome;
    }

    public function getSobreNome() : string
    {
        return $this->sobrenome;
    }

    public function getSenha() : string
    {
        return $this->senha;
    }

    private function validaSenha(string $senha) : void
    {
        $senha = trim($senha); // A função trim remove espaços e outros caracteres vazios do início e do fim da string. O segundo parâmetro opcional é a lista de caracteres que serão retirados da string.
        $tamanhoSenha = strlen($senha);
        if ($tamanhoSenha > 6) {
            $this->senha = $senha;
        } else {
            $this->senha = "Senha inválida";
        }
    }

    public function getTratamento()  : string
    {
        return $this->tratamento;
    }
}