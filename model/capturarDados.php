<?php
namespace model;
class CapturarDados
{
    public function capturarDados(): array
    {
        echo "Digite seu CPF: \n";
        $cpf = readline();
        echo "Digite seu nome: \n";
        $nome = readline();
        echo "Digite seu email: \n";
        $email = readline();
        echo "Digite seu telefone: \n";
        $tel = readline();
        echo "Digite seu logradouro (Rua, Avenida, etc): \n";
        $logradouro = readline();
        echo "Digite o número: \n";
        $numero = readline();
        echo "Digite bairro: \n";
        $bairro = readline();
        echo "Digite CEP: \n";
        $cep = readline();
        echo "Digite a cidade: \n";
        $cidade = readline();
        echo "Digite o estado: \n";
        $estado = readline();
        echo "Digite o país: \n";
        $país = readline();
        echo "Digite a senha: \n";
        $senha = readline();
        return [
            'cpf' => $cpf,
            'nome' => $nome,
            'email' => $email,
            'tel' => $tel,
            'logradouro' => $logradouro,
            'numero' => $numero,
            'bairro' => $bairro,
            'cep' => $cep,
            'cidade' => $cidade,
            'estado' => $estado,
            'país' => $país,
            'senha' => $senha
        ];
    }
}