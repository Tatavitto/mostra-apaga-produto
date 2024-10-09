<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Mostrando dados</title>
</head>
<body>
    <?php
$servidor = 'localhost';
$banco = 'receitas';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    
$comandoSQL = 'SELECT `id`, `nome`, `url`, `descricao`, `preco` FROM `produto`';
    
$comando = $conexao->prepare($comandoSQL);
$resultado = $comando->execute();

if($resultado) {
    echo "Mostrando resultado:";
    echo "<br>";
    while($linha = $comando->fetch()) {
        echo $linha['nome'] . " " . $linha['url'] . " " . $linha['descricao'] . " " . $linha['preco'] . "<br>";
        $id = $linha['id'];
        echo "<a href='apaga_produto.php?id=$id'>Apagar</a><br>";
    }
} else {
    echo "Erro no comando SQL";
}

    ?>
</body>
</html>