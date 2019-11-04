<?php


//-----------------------
function gera_perguntas()
{

$a_perguntas = array();
$a_opcoes = array();

global $a_perguntas;
global $a_opcoes;

alimenta_arrays( $a_perguntas,$a_opcoes);


echo '<form class="col s12" id="cadastro" name="cadastro" method="post" action="gera_rel.php" >';

echo '<div class="row">';
echo '	<div class="input-field col s6">';
echo '  	<input name="nome" id="nome" type="text" class="validate" required>'; 
echo '      <label class="active" style="font-size:18px;" for="nome">Nome</label>';          
echo '  </div>';

echo '	<div class="input-field col s6">';
echo '  	<input name="email" id="email" type="email" class="validate" required>';
echo '      <label class="active" style="font-size:18px;" for="email" data-error="wrong" data-success="right">e-mail</label>';
echo '  </div>';
echo '</div>';

echo '<br>';

exibe_perguntas($a_perguntas,$a_opcoes);

echo '<div class="row">';
echo '<p> Agora selecione, dentre as 40 questões, as três que sejam as mais verdadeiras para você.</p>';
echo '	<div class="input-field col s1">';
echo '  	<input name="questao1" id="questao1" type="text" class="validate" maxlength="2" size="2">'; 
echo '  </div>';

echo '	<div class="input-field col s1">';
echo '  	<input name="questao2" id="questao2" type="text" class="validate" maxlength="2" size="2">'; 
echo '  </div>';

echo '	<div class="input-field col s1">';
echo '  	<input name="questao3" id="questao3" type="text" class="validate" maxlength="2" size="2">'; 
echo '  </div>';

echo '</div>';

echo '<button class="btn waves-effect waves-light" type="submit" name="relatorio" id="bt_relatorio">gerar o relatório
    <i class="material-icons right">send</i>
  </button>';

echo '<br>';

echo '<br>';


echo '</form>';

echo '</div>';
}

//-----------------------------------------------
function exibe_perguntas($a_perguntas,$a_opcoes)
{
	foreach ($a_perguntas AS $indice => $pergunta)
	{
		echo '<p style="font-size:18px;width:600px;" for="meses_busca" >' . $indice . ' - ' . $pergunta .'</p>';
				
		foreach ($a_opcoes AS $indice_op => $opcao)
		{
			echo '<p><input name="'.$indice.'" type="radio" id="q'.$indice . '_' . $indice_op .'" value="'.$indice_op . '" >';
      	echo '<label id="label2" for="q'.$indice . '_' . $indice_op .'">' . $indice_op . ' - ' . $opcao . '</label></p>';	
		}
	
	echo "<br>";
	
	}
}

//------------------------------------------------
function alimenta_arrays(&$a_perguntas,&$a_opcoes)
{
	global $a_perguntas;
	global $a_opcoes;
	
	$a_perguntas = array(
								"1" => "Sonho em ser tão bom no que faço que meus conhecimentos especializados sejam constantemente procurados.",
								"2" => "Sinto-me mais realizado em meu trabalho quando sou capaz de integrar e gerenciar o esforço dos outros.",	
								"3" => "Sonho em ter uma carreira que me dê a liberdade de fazer o trabalho à minha maneira e no tempo por mim programado.",	
								"4" => "Considero segurança e estabilidade mais importantes do que liberdade e autonomia.",	
								"5" => "Estou sempre à procura de ideias que me permitam iniciar meu próprio negócio.",
								"6" => "Sinto-me bem em minha carreira apenas quando tenho a sensação de ter feito uma contribuição real para o bem da sociedade.",
								"7" => "Sonho com a carreira na qual eu possa solucionar problemas ou vencer em situações extremamente desafiadoras.",
								"8" => "Prefiro deixar meu emprego a ser colocado em um trabalho que comprometa minha capacidade de me dedicar aos assuntos pessoais e familiares.",
								"9" => "Sinto-me bem sucedido em minha carreira apenas quando posso desenvolver minhas habilidades técnicas ou funcionais a um nível de competência muito alto.",
								"10" => "Sonho em dirigir uma organização complexa e tomar decisões que afetem muitas pessoas.",
								"11" => "Sinto-me mais realizado em meu trabalho quando tenho total liberdade para definir minhas próprias tarefas, horários e procedimentos.",
								"12" => "Prefiro manter minha atividade atual a aceitar outra tarefa que possa colocar em risco minha segurança na organização.",
								"13" => "É mais importante ter meu próprio negócio do que ocupar uma alta posição gerencial como empregado.",
								"14" => "Sinto-me mais realizado em minha carreira quando posso utilizar meus talentos a serviço dos outros.",
								"15" => "Sinto-me realizado em minha carreira apenas quando enfrento e supero desafios extremamente difíceis.",
								"16" => "Sonho com uma carreira que me permita integrar minhas necessidades pessoais, familiares e de trabalho.",
								"17" => "Tornar-me um gerente técnico em minha área de especialização é mais atraente para mim do que tornar-me um gerente geral em alguma organização.",
								"18" => "Me sentirei bem sucedido em minha carreira apenas quando me tornar um gerente geral em alguma organização.",
								"19" => "Me sentirei bem sucedido em minha carreira apenas quando alcançar total autonomia e liberdade.",
								"20" => "Procuro trabalhos em organizações que me deem senso de segurança e estabilidade.",
								"21" => "Sinto-me realizado em minha carreira quando tenho a oportunidade de construir alguma coisa que seja resultado unicamente de minhas próprias ideias e esforços.",
								"22" => "Utilizar minhas habilidades para tornar o mundo um lugar melhor para se viver e trabalhar é mais importante para mim do que alcançar uma posição gerencial de alto nível.",
								"23" => "Sinto-me mais realizado em minha carreira quando soluciono problemas aparentemente insolúveis ou venço o que aparentemente era impossível de ser vencido.",
								"24" => "Sinto-me bem sucedido na vida apenas quando sou capaz de equilibrar minhas necessidades pessoais familiares e de carreira.",
								"25" => "Prefiro deixar meu emprego a aceitar uma tarefa de rodízio que me afaste da minha área de experiência.",
								"26" => "Tornar-me um gerente geral é mais atraente para mim do que tornar-se um gerente técnico em minha área de especialização.",
								"27" => "Para mim, poder fazer um trabalho a minha própria maneira, sem regras e restrições, é mais importante do que segurança.",
								"28" => "Sinto-me mais realizado em meu trabalho quando percebo que tenho total segurança financeira e estabilidade no trabalho.",
								"29" => "Sinto-me bem sucedido em meu trabalho apenas quando posso criar ou construir alguma coisa que seja inteiramente de minha autoria.",
								"30" => "Sonho em ter uma carreira que faça uma real contribuição à humanidade e à sociedade.",
								"31" => "Procuro oportunidades de trabalho que desafiem fortemente minhas habilidades para solucionar problemas.",
								"32" => "Equilibrar as exigências da minha vida pessoal e profissional é mais importante do que alcançar alta posição gerencial.",
								"33" => "Sinto-me plenamente realizado em meu trabalho quando sou capaz de empregar minhas habilidades e talentos especiais.",
								"34" => "Prefiro deixar minha organização a aceitar um emprego que me afastasse da trajetória de gerência geral.",
								"35" => "Preferiria deixar minha organização a aceitar um emprego que reduza minha autonomia e liberdade.",
								"36" => "Sonho em ter uma carreira que me dê senso de segurança e estabilidade.",
								"37" => "Sonho em iniciar e montar meu próprio negócio.",
								"38" => "Prefiro deixar a organização a aceitar uma tarefa que prejudique minha capacidade de servir aos outros.",
								"39" => "Trabalhar em problemas praticamente insolúveis para mim é mais importante do que alcançar uma posição gerencial de alto nível.",
								"40" => "Sempre procurei oportunidades de trabalho que minimizassem interferências com assuntos pessoais e familiares."
							);

	$a_opcoes = array(
							"1" => "Nunca é verdadeiro para mim",
							"2" => "Ocasionalmente é verdadeiro para mim",
							"3" => "Ocasionalmente é verdadeiro para mim",
							"4" => "Frequentemente é verdadeiro para mim",
							"5" => "Frequentemente é verdadeiro para mim",  
							"6" => "Sempre é verdadeiro para mim"
							);

}

function pega_elemento($lista,$elemento)
{
	   
   global $a_perguntas;
   global $a_opcoes;

   alimenta_arrays( $a_perguntas,$a_opcoes);

	if ($lista=="perguntas")
	{	

		$item = $a_perguntas[$elemento];
			}

	if ($lista=="opcoes")
	{	
		$item = $a_opcoes[$elemento];
	}

	return $item;
}


// Exibe o texto contendo as instruções logo após o título e subtítulo
function inclui_texto_apresentacao()
{

echo '<div style="margin: 0 auto;width:75%;line-height: 1.5rem;font-size: 16px;letter-spacing:1px;">';
inclui_titulo("Âncoras de Carreira","Uma ferramenta para ajudá-lo a entender melhor as suas escolhas de carreira.");

echo '<h5>Instruções</h5>';

linha('<b>1 )</b> Informe seu nome e seu e-mail.');

linha('<b>2 )</b> Responda as perguntas usando a seguinte escala:');

linha('&emsp;&nbsp;&nbsp;1 - Nunca é verdadeiro para mim.');

linha('&emsp;&nbsp;&nbsp;2 - Ocasionalmente é verdadeiro para mim.');

linha('&emsp;&nbsp;&nbsp;3 - Ocasionalmente é verdadeiro para mim.');

linha('&emsp;&nbsp;&nbsp;4 - Frequentemente é verdadeiro para mim.');

linha('&emsp;&nbsp;&nbsp;5 - Frequentemente é verdadeiro para mim.');

linha('&emsp;&nbsp;&nbsp;6 - Sempre é verdadeiro para mim.');

linha('<b>3 )</b> Informe quais as 3 que sejam as mais verdadeiras para você.');

linha('<b>4 )</b> Clique no botão "Gerar Relatório". O resultado será exibido na tela.');

linha('Lembrando que as sugestões/recomendações apresentadas são gerais, e foram geradas a partir das suas respostas.');


linha('Caso tenha interesse em fazer um trabalho mais particular e aprofundado , envie um e-mail para <a style="color: blue;" href="mailto:contato@sidneileitao.com.br">contato@sidneileitao.com.br.</a>');
echo '<br><br>';

	}


?>