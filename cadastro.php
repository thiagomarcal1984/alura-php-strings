<?php

require_once 'autoload.php';

$usuario = new App\Alura\Usuario($_POST['nome'], $_POST['senha'], $_POST['genero']);
$contato = new App\Alura\Contato($_POST['email'], $_POST['endereco'], $_POST['cep'], $_POST['telefone']);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Curso Strings</title>
</head>
<body>


<div class="mx-5 my-5">
<h1>Cadastro feito com sucesso.</h1>
<?php 
    // O comando htmlspecialchars converte caracteres de HTML em entidades HTML.
    // Por exemplo: ó => &oacute;      & => &amp;
    // Isso é uma medida de segurança para evitar execução de código malicioso na sua página: 
    // <script>alert("Código executado.");</script> // Insira isso em um dos campos sem htmlspecialchars, e o código será executado.
?>
<p><?php echo htmlspecialchars($usuario->getTratamento()); ?>, seguem os dados de sua conta:</p>
<ul class="list-group">
    <li class="list-group-item">Primeiro nome: <?php echo htmlspecialchars($usuario->getNome()); ?></li>
    <li class="list-group-item">Sobrenome: <?= htmlspecialchars($usuario->getSobrenome()); ?></li>
    <li class="list-group-item">Usuário: <?= htmlspecialchars($contato->getUsuario()); ?></li>
    <li class="list-group-item">Senha: <?= htmlspecialchars($usuario->getSenha()); ?></li>
    <li class="list-group-item">Telefone: <?= htmlspecialchars($contato->getTelefone()); ?></li>
    <li class="list-group-item">Email: <?= htmlspecialchars($contato->getEmail()); ?></li>
    <li class="list-group-item">Endereço: <?= htmlspecialchars($contato->getEnderecoCep()); ?></li>
</ul>
</div>
</body>
</html>
