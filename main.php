<?

echo "Olá, seja bem vindo ao VendiTudo\n\n";

echo "=============Menu=============\n";
echo "1 - Cadastrar novo Usuário\n";
echo "2 - Realizar Login\n";
echo "3 - Sair";

$opcao = fgets(STDIN);

switch($opcao){
    case "1":
        $capturarDados=new capturarDados($cpf, $nome, $email, $tel, $logradouro, $numero, $bairro, $cep, $cidade, $estado, $país, $senha);
        $cadastrarUsuario=new cadastrarUsuario($pdo);
        break;

    case "2":
        $login->realizarLogin();
        break;
}