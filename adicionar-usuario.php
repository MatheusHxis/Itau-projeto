<?php
// Inicia a sessão
session_start();

// Verifica se o gerente está logado
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: index.html');
    exit();
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupera os dados do novo usuário
    $novoNome = $_POST['novoNome'];
    $novoEmail = $_POST['novoEmail'];

    // Carrega os dados dos usuários do arquivo JSON
    $usuarios = json_decode(file_get_contents('usuarios.json'), true);

    if ($usuarios === null) {
        echo "Erro ao carregar os dados dos usuários.";
        exit();
    }

    // Cria um novo usuário
    $novoUsuario = [
        'nome' => $novoNome,
        'email' => $novoEmail
    ];

    // Adiciona o novo usuário ao array de usuários
    $usuarios[] = $novoUsuario;

    // Salva os dados atualizados de volta no arquivo JSON
    $result = file_put_contents('usuarios.json', json_encode($usuarios, JSON_PRETTY_PRINT));

    if ($result === false) {
        echo "Erro ao salvar os dados no arquivo JSON. Verifique as permissões do arquivo.";
        exit();
    }

    // Redireciona para a página de administração com uma mensagem de sucesso
    header('Location: area-restrita.php?msg=Usuário adicionado com sucesso!');
    exit();
}
?>
