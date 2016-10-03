<?php

namespace Rocharor\Sistema;

use Rocharor\Sistema\Sessao;

abstract class Controller
{
	/**
	 * Método padrão para abrir as VIEWS
	 */
    public function view($arquivo, $variaveis = [], $modulo = false)
    {
    	global $smarty;

    	switch ($modulo) {
			case 'admin':
    			{
    				$view = VIEWS_ADMIN . $arquivo . '.html';
    				break;
				}
    		default:
    			{
    				$view = VIEWS . $arquivo . '.html';
    				break;
    			}
    	}

    	if (! file_exists($view)) {
    		$view = VIEWS . '404.html';
    	}

    	foreach ($variaveis as $nomeVar => $valorVar) {
    		$smarty->assign($nomeVar, $valorVar);
    	}

    	$smarty->assign('principal', $view);

			$main = 'main.html';
    	$smarty->display($main);
    }

    /**
     * Valida paginas que dependem de login
     */
    public function validaLogado()
    {
    	$logadoAdmin = Sessao::pegaSessao('logado');

    	if($logadoAdmin){
    		return true;
    	}else{
    		return false;
    	}
    }
}
