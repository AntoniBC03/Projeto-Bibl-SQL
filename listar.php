<?php
try {
    // Conexão com o banco de dados usando PDO (substitua as informações pelo seu próprio)
    $dsn = "pgsql:host=localhost;dbname=Projeto Catalogo";
    $pdo = new PDO($dsn, 'host', '1234', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    // Consulta SQL para selecionar todos os filmes
    $stmt = $pdo->query("SELECT id, titulo, descricao FROM filmes");

    if ($stmt->rowCount() > 0) {
        // Loop através dos resultados do banco de dados
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='movie'>";
            echo "<img src='" . $row["imagem"] . "' alt='" . $row["titulo"] . "'>";
            echo "<h3>" . $row["titulo"] . "</h3>";
            echo "<p>" . $row["descricao"] . "</p>";
            echo "<button onclick=\"window.location.href='editar.php?id=" . $row["id"] . "'\">Editar</button>";
            echo "<button onclick=\"window.location.href='excluir.php?id=" . $row["id"] . "'\">Excluir</button>";
            echo "</div>";
        }
    } else {
        echo "Nenhum filme encontrado.";
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>
