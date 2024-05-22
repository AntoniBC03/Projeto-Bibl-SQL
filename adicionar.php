<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados (substitua as informações pelo seu próprio)
    $servername = "localhost";
    $username = "host";
    $password = "1234";
    $dbname = "Projeto Catalogo";

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Preparar e executar a consulta para adicionar um novo filme
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $sql = "INSERT INTO filmes (titulo, descricao) VALUES ('$titulo', '$descricao')";

    if ($conn->query($sql) === TRUE) {
        echo "<li><strong>$titulo</strong>: $descricao <button onclick=\"window.location.href='excluir.php?id=$conn->insert_id'\">Excluir</button></li>";
    } else {
        echo "Erro ao adicionar filme: " . $conn->error;
    }

    // Fechar conexão com o banco de dados
    $conn->close();
}
?>
