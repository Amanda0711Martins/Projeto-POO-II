<?php
class CadastroUsuario {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function cadastrarUsuario(Usuario $usuario) {
        $cpf = $usuario->getCpf();
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $tel = $usuario->getTel();
        $logradouro = $usuario->getLogradouro();
        $numero = $usuario->getNumero();
        $bairro = $usuario->getBairro();
        $cep = $usuario->getCep();
        $cidade = $usuario->getCidade();
        $estado = $usuario->getEstado();
        $país = $usuario->getPaís();
        $senha = $usuario->getSenha();

        $query = "INSERT INTO dadoscliente (cpf, nome, email, tel, 
        logradouro, numero, bairro, cep, cidade, estado, país, senha) 
        
        VALUES (:cpf, :nome, :email, :tel, :logradouro, :numero,
         :bairro, :cep, :cidade, :estado, :país, :senha)";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':tel', $tel);
        $stmt->bindParam(':logradouro', $logradouro);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':país', $país);
        $stmt->bindParam(':senha', $senha);

        try {
            $stmt->execute();
            echo "Usuário cadastrado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao cadastrar usuário: " . $e->getMessage();
        }
    }
}