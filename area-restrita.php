<?php
// Inicia a sessão
session_start();

// Verifica se o gerente está logado
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: index.html');
    exit();
}

// Carrega os dados dos usuários do arquivo JSON
$usuarios = json_decode(file_get_contents('usuarios.json'), true);

if ($usuarios === null) {
    echo "Erro ao carregar os dados dos usuários.";
    exit();
}

// Verifica se há mensagem na URL
$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Restrita - Gerente</title>
    <link rel="stylesheet" href="telalogada.css">
    <script>
        // Função para abrir o modal
        function openModal() {
            document.getElementById('modal').style.display = 'block';
        }

        // Função para fechar o modal
        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }
    </script>
</head>
<body>
    <main>
        <div class="conteudoLogin">
            <h2>Área Restrita - Gerente</h2>
            <p>Bem-vindo à área de controle de usuários.</p>

            <!-- Exibe a mensagem de sucesso ou erro -->
            <?php if ($msg): ?>
                <div class="msg-success">
                    <p><?php echo $msg; ?></p>
                </div>
            <?php endif; ?>

            <h3>Usuários Cadastrados</h3>
            <div class="usuarios-container">
                <?php
                // Exibe a lista de usuários como cartões
                foreach ($usuarios as $index => $usuario) {
                    echo "<div class='usuario-card'>
                            <h4>{$usuario['nome']}</h4>
                            <p><strong>Email:</strong> {$usuario['email']}</p>
                            <form action='remover-usuario.php' method='post'>
                                <input type='hidden' name='index' value='{$index}'>
                                <button type='submit' class='btn'>Remover</button>
                            </form>
                        </div>";
                }
                ?>
            </div>

            <!-- Botão para abrir o Modal -->
            <button class="btn" onclick="openModal()">Adicionar Usuário</button>

            <!-- Modal para adicionar o novo usuário -->
            <div id="modal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <form action="adicionar-usuario.php" method="post" class="formulario">
                        <label for="novoNome">Nome do Usuário:</label>
                        <input type="text" id="novoNome" name="novoNome" placeholder="Digite o nome" required>

                        <label for="novoEmail">E-mail do Usuário:</label>
                        <input type="email" id="novoEmail" name="novoEmail" placeholder="Digite o e-mail" required>

                        <button type="submit" class="btn">Adicionar Usuário</button>
                    </form>
                </div>
            </div>

            <h3>Alterar E-mail do Usuário</h3>
            <form action="atualizar-email.php" method="post" class="formulario">
                <label for="usuario">Nome do Usuário:</label>
                <select name="usuario" id="usuario" required>
                    <?php
                    // Exibe a lista de usuários em um dropdown
                    foreach ($usuarios as $usuario) {
                        echo "<option value='{$usuario['nome']}'>{$usuario['nome']}</option>";
                    }
                    ?>
                </select>

                <label for="novoEmail">Novo E-mail:</label>
                <input type="email" id="novoEmail" name="novoEmail" placeholder="Digite o novo e-mail" required>

                <button type="submit" class="btn">Alterar E-mail</button>
            </form>

            <form action="logout.php" method="post">
                <button type="submit" class="btn">Sair</button>
            </form>
        </div>
    </main>
</body>
</html>
