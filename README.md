<b>Preparação do ambiente</b>

  - Instalar o Git;

  - Instalar o composer;

  - Instalar o npm (node);

  - Instalar o Gulp (npm install gulp -g, npm install gulp --save-dev) ( gulp <tarefa> );

  - Instalar o Stylus (npm install stylus -g, npm install stylus --save-dev) (stylus -w style.styl -o style.css);


<b>Configuração do projeto (DEV)</b>

  - 1º - Ajustar configuração do banco, copiar arquivo "mysql.ini.sample" para "mysql.ini" e inserir as informações do banco;

  - 2º - Rodar arquivo "gerar_banco.php" para criar o database correto ou caso ja exista o banco apenas executar o o passo 1;

  - 3º - Baixar dependencias composer (composer install);

  - 4º - Baixar dependencias NPM executar na Public (npm install);

  - 5º - Executar a tarefa "unificalibs" do gulp;

  - 6º - Iniciar MySql e servidor PHP na pasta Public (php -S 127.0.0.1:8001);
  

<b>Subir projeto para servidor (PRODUÇÃO)</b>

<i>Ignorar pastas/arquivos:</i>

  - Public/stylus

  - Public/gulpfile.js
