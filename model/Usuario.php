<?
class Usuario
{
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
    private $país;
    private $senha;

    public function __construct($cpf, $nome, $email, $tel, $logradouro, $numero, $bairro, $cep, $cidade, $estado, $país, $senha)
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
        $this->país = $país;
        $this->senha = $senha;
    }

    public function getCpf(): mixed
    {
        return $this->cpf;
    }

    public function getNome(): mixed
    {
        return $this->nome;
    }

    public function getEmail(): mixed
    {
        return $this->email;
    }

    public function getTel(): mixed
    {
        return $this->tel;
    }

    public function getLogradouro(): mixed
    {
        return $this->logradouro;
    }

    public function getNumero(): mixed
    {
        return $this->numero;
    }

    public function getBairro(): mixed
    {
        return $this->bairro;
    }

    public function getCep(): mixed
    {
        return $this->cep;
    }

    public function getCidade(): mixed
    {
        return $this->cidade;
    }

    public function getEstado(): mixed
    {
        return $this->estado;
    }

    public function getPaís(): mixed
    {
        return $this->país;
    }
    public function getSenha(): mixed
    {
        return $this->senha;
    }
}