Sistema de Gerenciamento de Usuários
Este é um sistema simples de gerenciamento de usuários implementado em PHP, que permite que um gerente visualize, adicione, altere e remova usuários através de uma interface web. Os dados dos usuários são armazenados em um arquivo JSON, garantindo simplicidade e fácil manutenção. O projeto foi desenvolvido com foco em controle de acesso e interação básica com um banco de dados em formato JSON.

Funcionalidades
Login de Gerente: Área restrita acessível apenas a gerentes logados.
Visualização de Usuários: O gerente pode visualizar a lista de usuários cadastrados, com informações como nome e e-mail.
Alteração de E-mail: O gerente pode alterar o e-mail de qualquer usuário através de um formulário.
Adição de Novo Usuário: O gerente pode adicionar novos usuários preenchendo um formulário com nome e e-mail.
Remoção de Usuário: O gerente pode remover um usuário da lista, o que atualiza o arquivo JSON automaticamente.
Interface Responsiva: A interface é responsiva, garantindo uma boa experiência em dispositivos móveis e desktops.
Tecnologias Utilizadas
PHP: Linguagem de programação para o backend e manipulação dos dados.
HTML/CSS: Para a construção da interface web e design responsivo.
JSON: Para armazenar os dados dos usuários de forma simples e eficiente.
JavaScript: Para interações simples na interface (como o modal de adição de usuários).
Estrutura de Arquivos
area-restrita.php: Página principal onde o gerente pode visualizar, adicionar, alterar e remover usuários.
adicionar-usuario.php: Processa a adição de novos usuários ao arquivo JSON.
remover-usuario.php: Processa a remoção de usuários a partir do arquivo JSON.
atualizar-email.php: Processa a alteração de e-mail dos usuários.
usuarios.json: Arquivo JSON que armazena os dados dos usuários.
index.html: Página de login para o gerente.
Como Rodar o Projeto
Clone o repositório para o seu ambiente local:

bash
Copiar código
git clone https://github.com/seu-usuario/nome-do-repositorio.git
Certifique-se de ter o PHP instalado em sua máquina.

Crie um servidor local com PHP (se estiver usando o PHP integrado):

bash
Copiar código
php -S localhost:8000
Acesse o sistema através do navegador no endereço:

arduino
Copiar código
http://localhost:8000
Observações
O sistema é simples e não utiliza banco de dados, armazenando dados diretamente em um arquivo JSON.
Para fins de segurança, a autenticação do gerente é feita por meio de uma variável de sessão.
Licença
Este projeto está licenciado sob a MIT License.

