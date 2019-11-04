<?php

session_start();
header('Content-Type: text/html; charset=UTF-8');

include_once('../../common/layout_html.php');
include_once('gera_form.php');
include "../../common/grafico.js";
require_once "../../common/conexao.php";   
require_once "../../common/crudDiag.class.php";

date_default_timezone_set('America/Sao_Paulo');

grava_dados();

$a_totais = array();

$a_ancoras = array();

$a_perguntas_ancoras = array();

$a_grafico = array();

$nome = extrai_nome();

alimenta_arrays_($a_ancoras,$a_perguntas_ancoras,$a_totais);

apura_resultado($a_totais,$a_perguntas_ancoras,$maior_ancora);

monta_grafico($a_grafico,$a_ancoras,$a_totais);

inclui_cabecalho_clean();

echo '<div style="margin: 0 auto;width:75%;line-height: 1.5rem;font-size: 16px;letter-spacing:1px;">';

inclui_titulo("Âncoras de Carreira","Resultado do teste feito por " . $nome ." em ". date('d/m/Y') . " as " . date('H:i:s') . ".");

exibe_grafico($a_grafico,$a_ancoras[$maior_ancora],$nome);

exibe_caracteristicas($maior_ancora,$a_ancoras[$maior_ancora]);

exibe_respostas();

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
	 VALUES ( '$nome','$email',2,date('Yma'))";

	$diag = crudDiag::getInstance(Conexao::getInstance());
	$diag->qry_insert($query);
	$diag = null; 

	$result=TRUE;

}


//----------------------------------------------
function exibe_grafico($a_grafico,$ancora,$nome)
{
	$_SESSION['grafico'] = $a_grafico; //gravo uma sessao com o nome de a_posts
    	
	echo '<h5><b>O resultado do seu teste</b></h5>';
	
	echo '<p><b>'.$nome . '</b>, a âncora de carreira mais valorizada por você é a <b>' . $ancora . '</b>.</p>';
	
	echo '<div id="area_grafico"></div>';
}

//------------------------------------------------------
function monta_grafico(&$a_grafico,$a_ancoras,$a_totais)
{
	// Estrutura basica do grafico
	$a_grafico = array(
				    	'dados' => array(),
				        'config' => array(
				        					'title' => 'Gráfico Âncoras de Carreira',
				       						'width' => 800,
									        'height' => 500,
									        'vAxis.gridlines.count' => 0 ,
									        'nome_area'=>'area_grafico'
				       						)
						);

	$a_grafico['dados'][] = array('Estilo', 'Estilo');
	
	foreach ($a_totais AS $indice => $post)
	{
   		$a_grafico['dados'][] = array($a_ancoras[$indice],$post[1]);

	}
}


//------------------------
function exibe_respostas()
{
	echo '<h5><b>Suas respostas</b></h5>';

	foreach ($_POST AS $indice => $post)
	{

	   if($indice != "relatorio" && $indice != "nome" && $indice != "email" && $indice != "questao1" && $indice != "questao2" && $indice != "questao3")
	 	{
			echo '<p><span style="font-weight:bold;">' . $indice . '</span> - ' . pega_elemento("perguntas",$indice) . '</p>';
			echo '<p><span style="font-weight:bold;">Resposta: </span>' . $post . ' - ' .pega_elemento("opcoes",$post). '</p>';
			echo "<br>";
		}
	}
}


//----------------------------------------------------------------------
function apura_resultado(&$a_totais,$a_perguntas_ancoras,&$maior_âncora)
{

$a_mais_relevantes = array($_POST["questao1"],$_POST["questao2"],$_POST["questao3"]);

foreach ($a_mais_relevantes AS $resposta)
{
	$a_totais[$a_perguntas_ancoras[$resposta]][0] = $a_totais[$a_perguntas_ancoras[$resposta]][0]+4;

}

foreach ($_POST AS $indice => $post)
	{
   	   if($indice != "relatorio" && $indice != "nome" && $indice != "email" && $indice != "questao1" && $indice != "questao2" && $indice != "questao3")

	 	{
			$a_totais[$a_perguntas_ancoras[$indice]][0] = $a_totais[$a_perguntas_ancoras[$indice]][0] + $post;
		}
	}

foreach ($a_totais AS $indice=>$item )
	{

		$a_totais[$indice][1] = $a_totais[$indice][0]/5;

	}

 arsort($a_totais);

 $a_teste =  array_keys($a_totais);

 $maior_âncora = $a_teste[0];

}


//---------------------------------------------------------------------
function alimenta_arrays_(&$a_ancoras,&$a_perguntas_ancoras,&$a_totais)
{
	$a_ancoras = array (	"TF"=>"Competência Técnica/ funcional",
							"GG"=>"Competência para Gerência geral",
							"AI"=>"Autonomia e Independência",
							"SE"=>"Segurança e Estabilidade",
							"CE"=>"Criatividade Empreendedora",
							"SD"=>"Senso de dever, Dedicação a uma causa",
							"DP"=>"Puro Desafio",
							"EV"=>"Estilo De vida",
						);

	$a_perguntas_ancoras = array(
								"1" => "TF" ,
								"2" => "GG" ,
								"3" => "AI" ,
								"4" => "SE" ,
								"5" => "CE" ,
								"6" => "SD" ,
								"7" => "DP" ,
								"8" => "EV" ,
								"9" => "TF" ,
								"10" => "GG" ,
								"11" => "AI" ,
								"12" => "SE" ,
								"13" => "CE" ,
								"14" => "SD" ,
								"15" => "DP" ,
								"16" => "EV" ,
								"17" => "TF" ,
								"18" => "GG" ,
								"19" => "AI" ,
								"20" => "SE" ,
								"21" => "CE" ,
								"22" => "SD" ,
								"23" => "DP" ,
								"24" => "EV" ,
								"25" => "TF" ,
								"26" => "GG" ,
								"27" => "AI" ,
								"28" => "SE" ,
								"29" => "CE" ,
								"30" => "SD" ,
								"31" => "DP" ,
								"32" => "EV" ,
								"33" => "TF" ,
								"34" => "GG" ,
								"35" => "AI" ,
								"36" => "SE" ,
								"37" => "CE" ,
								"38" => "SD" ,
								"39" => "DP" ,
								"40" => "EV" ,
								);

	$a_totais = array (	"TF"=>array(0,0),
						"GG"=>array(0,0),
						"AI"=>array(0,0),
						"SE"=>array(0,0),
						"CE"=>array(0,0),
						"SD"=>array(0,0),
						"DP"=>array(0,0),
						"EV"=>array(0,0)
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

//---------------------------------------------------
function exibe_caracteristicas($sigla_ancora,$ancora)
{

	$a_definicoes = array( 
		"EV"=>array('As pessoas que valorizam essa âncora vivem um estilo de vida que integra todas as áreas da sua vida.'),
		"SE"=>array('As pessoas que valorizam essa âncora buscam estabilidade no emprego e segurança financeira, sendo a sua maior preocupação alcançar a sensação de ser bem sucedido para ficar tranquilo.'),
		"SD"=>array('As pessoas que valorizam essa âncora querem contribuir para causas alinhadas com seus valores.'),
		"TF"=>array('As pessoas que valorizam essa âncora constroem suas carreiras para tornarem-se especialistas.'),
		"GG"=>array('As pessoas que valorizam essa âncora ambicionam chegar ao topo da hierarquia.'),
		"AI"=>array('As pessoas que valorizam essa âncora desejam trabalhar com independência e autonomia.'),
		"CE"=>array('As pessoas que valorizam essa âncora possuem o ímpeto para criar de novos empreendimentos.'),
		"DP"=>array('As pessoas que valorizam essa âncora buscam superar desafios cada vez maiores.')
		);

	$a_buscas = array(
		"EV"=>array('trabalhar com flexibilidade de horário, local, benefícios, etc.',
					'integrar seu trabalho e carreira ao seu estilo de vida (necessidades pessoais e familiares)',
					'integrar todos os segmentos da sua vida num todo harmonioso.'),
		"SE"=>array('trabalhar com segurança e tranquilidade em relação ao seu emprego.',
					'atuar em ambientes previsíveis e estáveis.',
					'ter segurança financeira.'),
		"SD"=>array('realizar algum trabalho que considerem útil para as pessoas e para o mundo.',
					'contribuir para um mundo melhor por meio de seu trabalho.',
					'sentir que faz parte de uma causa alinhada com seus valores.'),
		"TF"=>array('desenvolver suas habilidades.',
    				'aplicar suas habilidades.',
    				'atuar em trabalhos desafiadores para testar suas habilidades e conhecimentos.'),
		"GG"=>array('coordenar e integrar recursos e os esforços de outras pessoas.',
					'responder pelo resultado de determinada área da organização. ',
					'desenvolver e exercer liderança.'),
		"AI"=>array('definir seu próprio trabalho em termos de quando e como fazer as atividades.',
					'atuar com independência .',
					'trabalhar com mais escolhas e poder de decisão.'),
		"CE"=>array('criar seu próprio negócio ou empreendimento.',
					'assumir riscos e superar obstáculos.',
					'provar sua capacidade em criar um empreendimento com seu próprio esforço.'),
		"DP"=>array('trabalhar na solução de problemas aparentemente insolúveis.',
					'vencer oponentes duros ou superar obstáculos difíceis.',
					'superar obstáculos considerados impossíveis.')
		);

	$a_geralmente = array(
		"EV"=>array('contemplam todas as áreas da sua vida na definição de sucesso.',
					'definem sua identidade pelo seu modo de vida como um todo, e não ao seu trabalho ou organização.',
					'abrem mão de promoções caso envolva alguma desestruturação da situação de vida (uma mudança geográfica, por exemplo).' ,
					'valorizam a carreira, mas não como uma prioridade máxima na sua vida, e sim, como parte de um todo integrado.'),
		"SE"=>array('valorizam mais a estabilidade no emprego do que o tipo do trabalho e promoções.',
					'preferem empresas que evitam dispensas em massa e que tenham bons planos de aposentadoria e uma boa reputação.',
					'empenham-se para sentir-se bem sucedidas no seu trabalho.'),
		"SD"=>array('recusam promoções ou mudanças caso isso implique em desviar-se de um trabalho que a preencha.'),
		"TF"=>array('empenham-se para tornar-se um “expert” (numa área, assunto, técnica).',
					'aceitam cargos de gestão/gerência apenas dentro da sua área de especialização.'),
		"GG"=>array('constroem uma trajetória rumo ao topo da hierarquia.',
					'associam o sucesso do próprio trabalho com o sucesso organização. ',
					'aceitam atuar em áreas técnicas/funcionais como experiência e aprendizado.',
					'consideram a especialização uma armadilha, mas reconhecem sua importância.'),
		"AI"=>array('possuem baixa tolerância à regras e restrições organizacionais.',
					'recusam promoções caso isso implique em perda de autonomia e flexibilidade. ',
					'abrem seu próprio negócio ou trabalham como autônomo.'),
		"CE"=>array('podem trabalhar para outros, enquanto aprendem e avaliam oportunidades futuras.',
					'a motivação é para à criar novos negócios, e não está necessariamente relacionada à criatividade artística nem a busca por autonomia.'),
		"DP"=>array('necessitam sentir que podem conquistar qualquer coisa (principalmente as consideradas difíceis, impossíveis e insolúveis).',
					'buscam constantemente pela novidade, variedade e dificuldade.')
		);

	$a_areas = array(
		"EV"=>array('As áreas ideais são aquelas que oferecem flexibilidade de horários, local de trabalho e benefícios.'),
		"SE"=>array('As áreas ideais são aquelas menos sujeitas a comoditização e automação.'),
		"SD"=>array('As áreas ideais são instituições do 3o setor, áreas corporativas voltadas para o
voluntariado / social.'),
		"TF"=>array('As áreas ideais são as técnicas ou funcionais.'),
		"GG"=>array('As áreas ideais são as consideradas estratégicas dentro da empresa, e isso varia de organização para organização.'),
		"AI"=>array('As áreas ideais são aquelas cujo estilo de liderança seja mais liberal.',
					'Outras opções são trabalhar como consultor ou autônomo, ou ter se próprio negócio.'),
		"CE"=>array('As áreas ideais são desenvolvimento de produtos, novos negócios.'),
		"DP"=>array('As áreas ideais são aquelas que oferecem um ambiente favorável à busca por soluções.')
		);


	echo '<h5><b>Características da âncora ' . $ancora . '</b></h5>';
	
	foreach($a_definicoes[$sigla_ancora] as $linha)
	{
		echo '<p>' . $linha . '</p>';
	}
	echo '<br>';

	echo '<ul>';
	echo '<p>Elas buscam oportunidades onde possam:</p>';
	
	foreach($a_buscas[$sigla_ancora] as $linha)
	{
		echo '<li style="list-style-type: disc;list-style-position: inside;">' . $linha . '</li>';
	}
	echo '</ul>';
    echo '<br>';

	echo '<p>Pessoas com essa âncora geralmente:<p>';
	echo '<ul>';
	foreach($a_geralmente[$sigla_ancora] as $linha)
	{
		echo '<li style="list-style-type: disc;list-style-position: inside;">' . $linha . '</li>';
	}
	echo '</ul>';
    echo '<br>';

    foreach($a_areas[$sigla_ancora] as $linha)
    {
    	echo '<p>' . $linha . '</p>';
    }
    echo '<br>';

}
?>
