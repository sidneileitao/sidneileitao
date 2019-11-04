<?php
//session_start();
header('Content-Type: text/html; charset=UTF-8');

include_once('../../common/layout_html.php');
include_once('gera_form.php');
include "../../common/grafico.js";
require_once "../../common/conexao.php";   
require_once "../../common/crudDiag.class.php";

date_default_timezone_set('America/Sao_Paulo');

grava_dados();

$a_totais = array();

$a_dimensoes = array();

$a_percentuais = array();

$a_itens_características = array();

$a_características = array();

$a_opcoes = $_SESSION['opcoes']; 

$a_grafico = array();

$nome = extrai_nome();

alimenta_arrays_($a_totais,$a_dimensoes,$a_percentuais,$a_itens_características,$a_características);

apura_resultado($a_totais,$a_opcoes,$a_percentuais);

monta_grafico($a_grafico,$a_percentuais,$maior_estilo,$a_dimensoes,$maior_estilo_pressao);

inclui_cabecalho_clean();

echo '<div style="margin: 0 auto;width:75%;line-height: 1.5rem;font-size: 16px;letter-spacing:1px;">';

inclui_titulo("Estilos de Comunicação","Resultado do teste feito por " . $nome ." em ". date('d/m/Y') . " as " . date('H:i:s') . ".");

exibe_grafico($a_grafico,$a_dimensoes[$maior_estilo],$nome,$a_dimensoes[$maior_estilo_pressao]);

exibe_caracteristicas($maior_estilo,$maior_estilo_pressao,$a_itens_características,$a_características,$a_dimensoes);

exibe_consideracoes($nome);

echo '</div>';
inclui_rodape_clean();


//--------------------
function extrai_nome()
{

    $n_posicao_espaco =  strpos(ltrim($_POST["nome"]), " ");
    
    if($n_posicao_espaco == FALSE)
    {
    	$primeiro_nome = $_POST["nome"];
    }else
    {
    	$primeiro_nome = substr( ltrim($_POST["nome"]), 0, $n_posicao_espaco);
    }
	
	return $primeiro_nome ;
    
}

//---------------------
function grava_dados()
{

	$nome = $_POST["nome"];
	$email = $_POST["email"];

	$query = "INSERT INTO ferramenta_utilizacao (nome,email,id_ferramenta,data_hora)
	 VALUES ( '$nome','$email',3,date('Yma'))";

	$diag = crudDiag::getInstance(Conexao::getInstance());
	$diag->qry_insert($query);
	$diag = null; 

	$result=TRUE;

}


//--------------------------------------------------------------
function exibe_grafico($a_grafico,$estilo,$nome,$estilo_pressao)
{
    $_SESSION['grafico'] = $a_grafico; //essa essão será usada no getDadosGrafico.php	
	
	echo '<h5><b>O resultado do seu teste</b></h5>';
	
	echo '<p><b>'.$nome . '</b>, o seu estilo de comunicação (em situações sem pressão/stress) é o <b>' . $estilo . '</b>.</p>';
	
	if($estilo!=$estilo_pressao)
	{
		echo '<p>Quando sob pressão/stress, a tendência é que você adote o estilo <b>' . $estilo_pressao . '</b>.</p>';
	}else
	{
		echo '<p>Mesmo quando sob pressão/stress, a tendência é que você mantenha o estilo <b>' . $estilo_pressao . '</b>.</p>';


	}	
	//$_SESSION['grafico'] = $a_grafico; //essa essão será usada no getDadosGrafico.php

	echo '<div id="area_grafico"></div>';

}

//---------------------------------------------------------------------------------------------------
function monta_grafico(&$a_grafico,$a_percentuais,&$maior_estilo,$a_dimensoes,&$maior_estilo_pressao)

{
	$a_grafico = array(
    'dados' => array(),
    'config' => array(
        'title' => 'Gráfico Estilos de Comunicação ',
        'width' => 800,
        'height' => 500,
        'vAxis.gridlines.count' => 0 ,
        'nome_area'=>'area_grafico')
	);

    // monta array da dimensão normal, que será ordenada e servirá de guia para o gráfico
	$a_valores = $a_percentuais["CF"];

	arsort($a_valores);

	$a_teste =  array_keys($a_valores);

 	$maior_estilo = $a_teste[0];

	//foreach ($a_totais AS $indice => $post)
	$a_grafico['dados'][] = array('Dimensão', 'Normal', 'Sob-Pressão');
	
	foreach ($a_valores as $chave => $value) 
   	{
		$a_grafico['dados'][] = array($a_dimensoes[$chave],$a_percentuais["CF"][$chave], $a_percentuais["CS"][$chave]);
		
     }


    // para obter o maior estilo sob pressao
    $a_valores = $a_percentuais["CS"];

	arsort($a_valores);

	$a_teste =  array_keys($a_valores);

 	$maior_estilo_pressao = $a_teste[0];

}



//------------------------------------------------------------
function apura_resultado(&$a_totais,$a_opcoes,&$a_percentuais)
{

	$total_CF = 0;
	$total_CS = 0;

	foreach ($_POST AS $indice => $post)
	{
   	   if($indice != "relatorio" && $indice != "nome" && $indice != "email")

	 	{
	 		$questao = substr($indice,5,2);
	 		$cs_cf = $a_opcoes[$questao][0];
	 		$estilo = $a_opcoes[$questao][1];
	 		
	 		$a_totais[$cs_cf][$estilo]  = $a_totais[$cs_cf][$estilo] + $post;

			if($cs_cf=='CF')
			{
				$total_CF = $total_CF + $post;
				$a_percentuais[$cs_cf][$estilo]  = $a_totais[$cs_cf][$estilo];

			}else{
				$total_CS = $total_CS + $post;
				$a_percentuais[$cs_cf][$estilo]  = $a_totais[$cs_cf][$estilo] ;
			}

		}
	}

	// calcula o quanto cada total corresponde (em %) do total da dimensão
    foreach ($a_percentuais as $key => $a_valores) 
    {
   		foreach ($a_percentuais[$key] as $chave => $value) 
   		{
   			if($key=="CF")
   			{
   				$total = $total_CF;
   			}else{
   				$total = $total_CS;	
   			}

   			$a_percentuais[$key][$chave] = round(($a_percentuais[$key][$chave] / $total*100));	
   		}
   	}

 	arsort($a_percentuais);

 	

}


//---------------------------------------------------------------------------------------------------------------
function alimenta_arrays_(&$a_totais,&$a_dimensoes,&$a_percentuais,&$a_itens_características,&$a_características)
{
	$a_dimensoes = array (	"I"=>"Reflexivo",
							"PN"=>"Racional",
							"PR"=>"Pragmático",
							"S"=>"Afetivo",
							"CF"=>"Normal",
							"CS"=>"Sob Pressão"
						);

	$a_totais = array (	"CF"=>array("I"=>0,"PN"=>0,"PR"=>0,"S"=>0),
						"CS"=>array("I"=>0,"PN"=>0,"PR"=>0,"S"=>0),
					);

	$a_percentuais = array (	"CF"=>array("I"=>0,"PN"=>0,"PR"=>0,"S"=>0),
						"CS"=>array("I"=>0,"PN"=>0,"PR"=>0,"S"=>0),
					);

	$a_itens_características = array(	"valoriza"=>"O que mais valoriza",
										"tempo"=>"Orientação no tempo",
										"principais"=>"Principais características",
										"percebido"=>"Tende a ser percebido como");

	$a_características = array(
								"I"=>array(
											"valoriza"=>"As ideias, a originalidade, a criatividade e os conceitos.",
											"tempo"=>"passado e futuro",
											"principais"=>"Criativo, Original, Imaginativo, Planejamento longo prazo,Idealista, Conceitual",
											"percebido"=>"Distante, pouco prático"),
								"PN"=>array(
											"valoriza"=>"A lógica, os dados,  a organização os fatos e a ordem.",
											"tempo"=>"passado, presente e futuro",
											"principais"=>"Lógico, Planejador, Racional, Organizado, Detalhista, Preciso",
											"percebido"=>"Rígido, Indeciso"),
								
								"S"=>array(
											"valoriza"=>"As pessoas, os relacionamentos e os sentimentos",
											"tempo"=>"passado",
											"principais"=>"Empático, Informal, Atencioso, Prestativo, Cordial, Gregário",
											"percebido"=>"Informal, Subjetivo"),
								
								"PR"=>array(
											"valoriza"=>"A ação, a prática, a solução e a decisão rápida",
											"tempo"=>"presente",
											"principais"=>"Prático, Funcional, Decidido, Dinâmico, Executor, Diretivo",
											"percebido"=>"Impaciente, Impulsivo")
								);

}




//---------------------------------
function exibe_consideracoes($nome)
{
	echo '<div style="line-height: 1.5em;">';
	echo '<h5><b>E para concluir</b></h5>';


	echo '<p><b>'. $nome . '</b>.</p>';

	echo '<p style="margin:10px 0 10px 0;">Todo teste comportamental é limitado à uma pequena e isolada fração de tudo o que forma um ser
humano.</p>';
	echo '<p style="margin:10px 0 10px 0;">Jamais sinta-se definido(a) ou limitado(a) pelo resultado dele.</p>';

	echo '<p style="margin:10px 0 10px 0;">Sua utilidade está em fornecer algumas informações para ajudá-lo(a) a se conhecer mais. ';

	echo '<p style="margin:10px 0 10px 0;">Quanto mais autoconhecimento desenvolvemos, mais habilmente acessamos nossos recursos internos para lidar com as circunstâncias da vida.';

	echo '<p style="margin:10px 0 10px 0;">Caso tenha alguma dúvida sobre o preenchimento ou sobre o resultado, envie uma mensagem para '.'<a style="color: blue;" href="mailto:contato@sidneileitao.com.br">contato@sidneileitao.com.br</a>' .'. Eu ficarei muito feliz em responder.</p>';
	
	echo '<p style="margin:10px 0 10px 0;">Lembrando que as sugestões/recomendações apresentadas são gerais, e foram geradas a partir das suas respostas.</p>';

	echo '<p style="margin:10px 0 10px 0;">Caso tenha interesse em fazer um trabalho mais particular e aprofundado , envie um e-mail para <a style="color: blue;" href="mailto:contato@sidneileitao.com.br">contato@sidneileitao.com.br.</a></p>';

	echo '<br><br>';
	echo '<p>Obrigado, e um grande abraço.</p>';
	echo '<br>';
	echo '<p>Sidnei Leitão</p>';
	echo '<p>Coach e Consultor de Carreira</p>';
	echo '<br><br>';

	echo '</div>';

}

//-------------------------------------------------------------------------------------------------------------
function exibe_caracteristicas($maior_estilo,$maior_estilo_pressao,$a_itens_características,$a_características,$a_dimensoes)
{

    echo '<br>';

    if($maior_estilo != $maior_estilo_pressao)
    {

	    echo '<h5><b>Características dos estilos ' . $a_dimensoes[$maior_estilo] . ' e ' . $a_dimensoes[$maior_estilo_pressao] . '</b></h5>';
		
		echo '<p>Veja no quadro abaixo as principais características dos dois estilos.</p>';
	   
	   	echo '</br>';

	    echo '<div class="row teal lighten-2 white-text">';
	    echo '  <div class="col s4"><b>' . "item" . '</b></div>';
	    echo '  <div class="col s4"><b>' . $a_dimensoes[$maior_estilo] . '</b></div>';
	    echo '  <div style="border-width: medium solid black;" class="col s4"><b>' . $a_dimensoes[$maior_estilo_pressao] . '</b></div>';
	    echo '</div>';

	    foreach ($a_itens_características as $key => $value)
	    {
	    	echo '<div class="row">';
	    	echo '  <div class="col s4">' . $value . '</div>';
	    	echo '  <div class="col s4">' . $a_características[$maior_estilo][$key] . '</div>';
	    	echo '  <div class="col s4">' . $a_características[$maior_estilo_pressao][$key] . '</div>';
	    	echo '</div>';
	    }

	}else
	{
	    echo '<h5><b>Características do estilo ' . $a_dimensoes[$maior_estilo] . '</b></h5>';
		
		echo '<p>Veja no quadro abaixo as principais características.</p>';
	   
	   	echo '</br>';

	    echo '<div class="row teal lighten-2 white-text">';
	    echo '  <div class="col s4"><b>' . "item" . '</b></div>';
	    echo '  <div class="col s4"><b>' . $a_dimensoes[$maior_estilo] . '</b></div>';
	    echo '</div>';

	    foreach ($a_itens_características as $key => $value)
	    {
	    	echo '<div class="row">';
	    	echo '  <div class="col s4">' . $value . '</div>';
	    	echo '  <div class="col s4">' . $a_características[$maior_estilo][$key] . '</div>';
	    	echo '</div>';
	    }

	}
    echo '<br>';

}



?>