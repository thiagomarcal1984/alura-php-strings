<?php

namespace App\Alura;

class Contato 
{
    private $email;
    private $endereco;
    private $cep;
    private $telefone;

    public function __construct(string $email, string $endereco, string $cep, string $telefone)
    {
        $this->email = $email;

        if ($this->validaEmail($email) !== false) 
        {
            $this->setEmail($email);
        } else {
            $this->setEmail("E-mail inválido.");
        }

        if ($this->validaTelefone($telefone)) {
            $this->setTelefone($telefone);
        } else {
            $this->setTelefone("Telefone inválido.");
        }

        $this->endereco = $endereco;
        $this->cep = $cep;
    }

    public function validaTelefone(string $telefone) : int
    {
        // Telefone fixo: 4321-6789
        $resultado = preg_match('/^[0-9]{4}-[0-9]{4}$/', $telefone, $encontrados); // preg_match é uma função de 3 parms: padrão, onde será feita a busca, e a referência onde serão guardados os resultados.
        // var_dump(($resultado)); // preg_match retorna 3 valores: 1 se encontrar o padrão, 0 se não encontrar, ou false, se der erro.
        return $resultado;
    }

    private function setTelefone(string $telefone) : void
    {
        $this->telefone = $telefone;
    }

    private function setEmail($email) 
    {
        $this->email = $email;
    }

    public function getUsuario() : string
    {
        $posicaoArroba = strpos($this->email, "@");
        if ($posicaoArroba === false) 
        {
            return "Usuário inválido.";
        }
        return substr($this->email, 0, $posicaoArroba);
    }

    private function validaEmail(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getEnderecoCep()
    {
        $enderecoCep = [$this->endereco, $this->cep];
        return implode(" - ", $enderecoCep); // implode é o oposto de explode: ele junta os elementos de um array em uma única string, usando uma string de cola.
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }
}