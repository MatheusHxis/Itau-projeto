<?php
// Verifica se os dados do formulário foram enviados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Defina as credenciais do gerente
    $gerente_email = 'gerente@itau.com';
    $gerente_password = '123';

    // Verifica se o e-mail e a senha estão corretos
    if ($email === $gerente_email && $password === $gerente_password) {
        // Se o login for bem-sucedido, cria uma sessão e redireciona para a página de área restrita
        session_start();
        $_SESSION['logged_in'] = true;
        header('Location: area-restrita.php');
        exit();
    } else {
        // Se as credenciais estiverem erradas, redireciona para a página de login com uma mensagem de erro
        header('Location: index.html?erro=1');
        exit();
    }
}
?>
