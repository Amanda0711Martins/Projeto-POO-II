<?php
namespace model;
class Usuario
{
    public $capturarDados;
    private $cpf;
    private $nome;
    private $email;
    private $tel;
    private $logradouro;
    private $numero;
    private $bairro;
    private $cep;
    private $cidade;
    private $estado;
    private $pais;
    private $senha;

    public function __construct($cpf, $nome, $email, $tel, $logradouro, $numero, $bairro, $cep, $cidade, $estado, $pais, $senha)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->email = $email;
        $this->tel = $tel;
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->bairro = $bairro;
        $this->cep = $cep;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->pais = $pais;
        $this->senha = $senha;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function getLogradouro()
    {
        return $this->logradouro;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function getCep(){
        return $this->cep;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getPais()
    {
        return $this->pais;
    }

    public function getSenha()
    {
        return $this->senha;
    }
}