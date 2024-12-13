
<?php
// Inicia a sessão
session_start();

// Destrói a sessão e redireciona para a página de login
session_destroy();
header('Location: index.html');
exit();
?>
