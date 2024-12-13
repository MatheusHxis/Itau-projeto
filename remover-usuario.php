<?php
// Inicia a sessão
session_start();

// Verifica se o gerente está logado
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: index.html');
    exit();
}

// Verifica se o índice do usuário foi enviado
if (isset($_POST['index'])) {
    // Carrega os dados dos usuários do arquivo JSON
    $usuarios = json_decode(file_get_contents('usuarios.json'), true);

    if ($usuarios === null) {
        echo "Erro ao carregar os dados dos usuários.";
        exit();
    }

    // Remove o usuário do array
    $index = $_POST['index'];
    array_splice($usuarios, $index, 1);  // Remove o usuário pelo índice

    // Salva os dados atualizados de volta no arquivo JSON
    $result = file_put_contents('usuarios.json', json_encode($usuarios, JSON_PRETTY_PRINT));

    if ($result === false) {
        echo "Erro ao salvar os dados no arquivo JSON. Verifique as permissões do arquivo.";
        exit();
    }

    // Redireciona de volta para a página de administração com uma mensagem de sucesso
    header('Location: area-restrita.php?msg=Usuário removido com sucesso!');
    exit();
} else {
    // Se não houver índice, redireciona com erro
    header('Location: area-restrita.php?msg=Erro ao remover o usuário.');
    exit();
}
?>
