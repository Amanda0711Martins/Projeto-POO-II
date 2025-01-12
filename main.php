<?
$dirCadastrar = __DIR__ . '/../model/capturarDados.php';
$dirCadastrar = __DIR__ . '/../model/cadastroUsuario.php';
include $dirCadastrar;
include $dirCadastrar;

echo "Olá, seja bem vindo ao VendiTudo\n\n";

echo "=============Menu=============\n";
echo "1 - Cadastrar novo Usuário\n";
echo "2 - Realizar Login\n";
echo "3 - Sair";

$opcao = fgets(STDIN);

switch($opcao){
    case "1":
        $capturar->capturarDados();
        $cadastrar->cadastrarUsuario();
        break;

    case "2":
        $login->realizarLogin();
        break;
}