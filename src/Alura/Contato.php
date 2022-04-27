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
        $this->telefone = $telefone;

        if ($this->validaEmail($email) !== false) 
        {
            $this->setEmail($email);
        } else {
            $this->setEmail("E-mail inválido.");
        }

        $this->endereco = $endereco;
        $this->cep = $cep;
    }

    public function setEmail($email) 
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