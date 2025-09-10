<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dropdown com PHP e MySQL</title>
</head>
<body>

<?php
require_once('config.php');

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Prepara a consulta SQL
$sql = "SELECT id, nome FROM produtos ORDER BY nome ASC";
$result = $conn->query($sql);
?>

    <h2>Lista de Produtos</h2>

    <label for="produto-select">Escolha um produto:</label>
    <select name="produtos" id="produto-select">
        <option value="">--Selecione uma opção--</option>
        
        <?php
        if ($result->num_rows > 0) {
            // Itera sobre cada linha de resultado e cria as opções
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["id"] . "'>" . $row["nome"] . "</option>";
            }
        } else {
            echo "<option value=''>Nenhum produto encontrado</option>";
        }
        ?>

    </select>

<?php
// Fecha a conexão
$conn->close();
?>

</body>
</html>