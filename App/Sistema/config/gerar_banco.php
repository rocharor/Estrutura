<?php
    if(file_exists('mysql.ini')) {
        $dados = parse_ini_file('mysql.ini');
    }else{
        die('Dados do Banco não encontrados');
    }

    $host = $dados['host'];
    $user = $dados['user'];
    $pass = $dados['pass'];
    $db = $dados['db'];

    $con = mysqli_connect($host, $user, $pass) or
    die('Não foi possível conectar');

    mysqli_set_charset($con,"utf8");

    $query_database = "CREATE DATABASE " . $db . " DEFAULT CHARACTER SET utf8  DEFAULT COLLATE utf8_general_ci ";
    if(mysqli_query($con,$query_database)){
        echo "Banco de dados (" . $db . ") criado com sucesso\n\r";
    }
    else {
        die("Erro ao criar o banco de dados \n\r".mysqli_error($con));
    }

    $query_tabelas = [
      "Tabela modelo"=>
      "CREATE TABLE `tabela_modelo` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `nome` varchar(255) DEFAULT NULL,
        `email` varchar(100) DEFAULT NULL,
        `mensagem` text,
        `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `data_alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8"
    ];

    mysqli_select_db($con, $db);

    foreach($query_tabelas as $nm_tabela=>$query){
        if(mysqli_query($con,$query)){
            echo "Tabela (" . $nm_tabela . ") criada com sucesso. \n\r ";
        }
        else {
            die('Erro ao criar tabela'. $nm_tabela . mysqli_error($con));
        }
    }
    mysqli_close($con);


    /* $caminho = str_replace("App\Sistema", "Public\\node_modules", dirname(__DIR__));

    $libs = [
        "animate"=>"animate.css",
        "bootstrap"=>"bootstrap",
        "notify"=>"bootstrap-notify",
        "jquery"=>"jquery",
        "masked"=>"jquery.maskedinput"
    ];

    foreach($libs as $key=>$lib){
        $caminho_certo = $caminho . "\\$lib";
        $todosArquivos = scandir($caminho_certo);

        foreach($todosArquivos as $arquivos){

            if($arquivos == "." || $arquivos == ".."){
               continue;
            }
            $excluir = true;
            switch($key){
                case 'animate':
                    if($arquivos == "animate.css" || $arquivos == "animate.min.css"){
                        $excluir = false;
                    }
                break;
                case 'bootstrap':
                    if($arquivos == "dist"){
                        $excluir = false;;
                    }
                break;
                case 'notify':
                    if($arquivos == "bootstrap-notify.js" || $arquivos == "bootstrap-notify.min.js"){
                        $excluir = false;;
                    }
                break;
                case 'jquery':
                    if($arquivos == "dist"){
                        $excluir = false;;
                    }
                break;
                case 'masked':
                    if($arquivos == "src"){
                        $excluir = false;;
                    }
                break;
            }

            if($excluir){
                $deletar = $caminho_certo ."\\". $arquivos;
                $comando = "rm -rf " . $deletar;
                shell_exec($comando);
                echo "Arquivo apagados [" . $key . "] -> " . $arquivos . "\n";
            }
        }
    }

    die();
     */
