<?php
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuarioSelecionado = $_POST['usuario'];
    $novoEmail = $_POST['novoEmail'];

    // Carrega os dados dos usuários do arquivo JSON
    $usuarios = json_decode(file_get_contents('usuarios.json'), true);

    if ($usuarios === null) {
        echo "Erro ao carregar os dados dos usuários.";
        exit();
    }

    // Encontra o usuário selecionado e atualiza o e-mail
    $usuarioEncontrado = false;
    foreach ($usuarios as &$usuario) {
        if ($usuario['nome'] === $usuarioSelecionado) {
            $usuario['email'] = $novoEmail;
            $usuarioEncontrado = true;
            break;
        }
    }

    if (!$usuarioEncontrado) {
        echo "Usuário não encontrado.";
        exit();
    }

    // Salva as alterações de volta no arquivo JSON
    if (file_put_contents('usuarios.json', json_encode($usuarios, JSON_PRETTY_PRINT)) === false) {
        echo "Erro ao salvar as alterações no arquivo JSON.";
        exit();
    }

    // Redireciona para a área restrita
    header('Location: area-restrita.php');
    exit();
}
?>
