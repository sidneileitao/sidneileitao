<?php
session_start();

//-----------------------
function gera_perguntas()
{
$a_perguntas = array();
$a_opcoes = array();
$a_perguntas_respostas = array();

global $a_perguntas;
global $a_opcoes;
global $a_perguntas_respostas;

alimenta_arrays( $a_perguntas,$a_opcoes,$a_perguntas_respostas);

$_SESSION['opcoes'] = $a_opcoes; //gravo uma sessao com o nome de opcoes contendo a matriz, que será usada no gera_rel.php

echo '<form class="col s12" id="formulario" name="formulario" method="post" action="gera_rel.php" onsubmit="return validar_pontuacao()" >';

echo '<div class="row">';
echo '	<div class="input-field col s6">';
		$snome="'nome'";
echo '  	<input name="nome" id="nome" type="text" class="validate" required  >'; 
echo '      <label class="active" style="font-size:18px;" for="nome">Nome</label>';          
echo '  </div>';

echo '	<div class="input-field col s6">';
echo '  	<input name="email" id="email" type="email" class="validate" required>';
echo '      <label class="active" style="font-size:18px;" for="email" data-error="wrong" data-success="right">e-mail</label>';
echo '  </div>';
echo '</div>';

echo '<br>';

exibe_perguntas($a_perguntas,$a_opcoes,$a_perguntas_respostas);
echo '<button class="btn waves-effect waves-light" type="bt_relatorio" name="relatorio" id="bt_relatorio">gerar o relatório
    <i class="material-icons right">send</i>
  </button>';

echo '<br>';

echo '<br>';


echo '</form>';

echo '</div>';

}

//---------------------------------------------------------------------
function exibe_perguntas($a_perguntas,$a_opcoes,$a_perguntas_respostas)
{
	foreach ($a_perguntas AS $indice => $pergunta)
	{
		echo '<p style="font-size:18px;width:600px;" for="meses_busca" ><b>' . $indice . '</b> - ' . $pergunta .'</p>';
	

		foreach ($a_perguntas_respostas[$indice] AS $indice_op => $opcao)
		{
		
      		echo '<p><input pattern="[1346]" title="1, 3, 4 ou 6" type="text" style="width:22px;font-size: 13px;" maxlength="1" size="1" name="resp_' . $opcao. '" id="resp_"' . $opcao . '" required 
   		onBlur="check(this)"  >';
      		echo '<label class="active" style="font-size:18px;" for="resp_"' .$opcao. '">'.$a_opcoes[$opcao][2].'</label>';
      		
		}
		
	echo "<br>";
	
	}
}

//------------------------------------------------------------------------
function alimenta_arrays(&$a_perguntas,&$a_opcoes,&$a_perguntas_respostas)
{
	global $a_perguntas;
	global $a_opcoes;
	
	$a_perguntas = array(
						"1" => "É provável que as pessoas me achem:",
						"2" => "Quando trabalho em equipe, quero:",	
						"3" => "Ao comunicar-me com outros, é provável que eu:",	
						"4" => "Quando as circunstâncias me impedem de fazer o que quero, é hora de:",	
						"5" => "As vezes penso que os outros me vêem como:",
						"6" => "Quando preciso escrever uma carta desagradável, eu tento:",
						"7" => "Ao ser confrontado por outros com diferenças de opinião, geralmente me saio bem, quando:",
						"8" => "Em termos de dimensão de tempo, é provável que eu me concentre mais:",
						"9" => "Ao interagir com pessoas a quem fui apresentado socialmente, é provável que eu considere os seguintes aspectos:",
						"10" => "Ao encontrar grupos com quem tenho pouco contato regularmente, gosto de deixar a impressão de que sou:",
						"11" => "Em situações tensas com outros, posso ocasionalmente:",
						"12" => "Se não tomar os cuidados necessários, as pessoas podem me achar:",
						"13" => "Sinto-me satisfeito quando:",
						"14" => "É fácil ser convincente quando:",
						"15" => "Sinto-me satisfeito quando os outros me vêem como:",
						"16" => "Ao conhecer uma pessoa pela primeira vez, acho preferível:",
						"17" => "Quando sou pressionado por alguém:",
						"18" => "Na minha forma de abordar situações de trabalho, é possível que eu me envolva demasiadamente:"
						);

	$a_opcoes = array(
						"1"=>array("CF","PR","Prático e objetivo."),
						"2"=>array("CF","S","Emotivo e até certo ponto incentivador."),
						"3"=>array("CF","PN","Astuto e lógico."),
						"4"=>array("CF","I","Intelectual e um tanto quanto complexo."),
						"5"=>array("CF","S","Incentivar os colegas e interagir intensamente."),
						"6"=>array("CF","PN","Ter certeza de que o trabalho está sendo desenvolvido de forma sistemática e lógica."),
						"7"=>array("CF","PR","Ter certeza que a atividade terá retorno o suficiente para justificar o tempo e energia dispendidos."),
						"8"=>array("CF","I","Ser respeitado pelos conceitos e idéias apresentados."),
						"9"=>array("CF","I","Demonstre desinteresse com pessoas excessivamente preocupadas com detalhes."),
						"10"=>array("CF","PN","Mostre impaciência com as pessoas que apresentam idéias sem lógica."),
						"11"=>array("CF","S","Demonstre pouco interesse com idéias sem conteúdo ou originalidade."),
						"12"=>array("CF","PR","Ignore aquelas pessoas preocupadas com implicações  'a longo prazo' e me concentre no aqui e agora."),
						"13"=>array("CS","PN","Revisar os  'Pontos Fortes' de minha abordagem, fazendo modificações de acordo."),
						"14"=>array("CS","I","Repensar tudo que aconteceu e desenvolver uma nova idéia ou abordagem."),
						"15"=>array("CS","PR","Ter em mente as metas, identificar os obstáculos, modificando o plano de acordo."),
						"16"=>array("CS","S","Analisar as motivações dos outros e desenvolver uma nova 'Percepção' da situação."),
						"17"=>array("CS","S","Excessivamente emotivo."),
						"18"=>array("CS","PN","Controlado demais e excessivamente lógico."),
						"19"=>array("CS","PR","Preocupado demais com a execução e o  'como fazer'."),
						"20"=>array("CS","I","Excessivamente amarrado com idéias e difícil de ser entendido."),
						"21"=>array("CS","PN","Esclarecer as razões fundamentais e associá-las a finalidade da comunicação."),
						"22"=>array("CS","PR","Resumir claramente o que quero, preciso ou espero do receptor."),
						"23"=>array("CS","I","Mostrar como meus pontos principais se encaixam numa perspectiva mais ampla."),
						"24"=>array("CS","S","Comunicar algo sobre a minha maneira de ser e meu estilo pessoal."),
						"25"=>array("CF","PR","Consigo o comprometimento em um ou dois tópicos, para discussão posterior."),
						"26"=>array("CF","S","Tento me colocar no lugar do outro."),
						"27"=>array("CF","PN","Mantenho a posição ajudando o outro a ver as coisas de maneira simples e lógica."),
						"28"=>array("CF","I","Confio na minha habilidade de conceituar e concatenar as idéias."),
						"29"=>array("CF","S","Na certeza de ser bem lembrado."),
						"30"=>array("CF","PN","Em certificar-me de que quaisquer ações são consistentes e partem de um progresso sistemático."),
						"31"=>array("CF","PR","Nas minhas ações a curto prazo e seu impacto no aqui e agora."),
						"32"=>array("CF","I","Em ações de impacto a longo prazo e como estas ações estão relacionadas com rumos da minha vida."),
						"33"=>array("CF","I","Se poderão estas pessoas contribuir com idéias boas e de desafio."),
						"34"=>array("CF","PN","Se elas tem cabeça boa e se são reflexivas."),
						"35"=>array("CF","S","Se são interessantes e divertidas."),
						"36"=>array("CF","PR","Se sabem o que fazem e são realizadoras."),
						"37"=>array("CS","PN","Um pensador sistemático que consegue analisar o tipo de problema com o qual o grupo está envolvido."),
						"38"=>array("CS","I","Uma pessoa de visão, capaz de contribuir de forma criativa."),
						"39"=>array("CS","PR","Pragmático, com vastos conhecimentos, em condições de ajudar o grupo a definir seus problemas e encontrar soluções."),
						"40"=>array("CS","S","Alegre e sintonizado com o estado de espírito e necessidades do grupo."),
						"41"=>array("CS","S","Me expressar com excesso de liberdade, dizendo coisas que seria melhor não dizer."),
						"42"=>array("CS","PN","Ser cuidadoso demais, evitando um envolvimento que poderia ser gratificante."),
						"43"=>array("CS","PR","Ser precipitado e me envolver com aspectos superficiais."),
						"44"=>array("CS","I","Me desinteressar por pessoas com virtudes, mas que não souberam mostrar."),
						"45"=>array("CS","PN","Frio e totalmente impessoal."),
						"46"=>array("CS","PR","Vazio, superficial ou egocêntrico."),
						"47"=>array("CS","I","Antipático, com ar de superioridade ou condescendente."),
						"48"=>array("CS","S","Temperamental, exaltado e imprevisível."),
						"49"=>array("CF","PR","Realizo mais do que o planejado."),
						"50"=>array("CF","S","Tenho empatia pelos sentimentos dos outros e reajo de maneira construtiva."),
						"51"=>array("CF","PN","Soluciono um problema de forma lógica e sistemática."),
						"52"=>array("CF","I","Desenvolvo novas idéias que possam ser aplicadas."),
						"53"=>array("CF","S","Sintonizado com meu próprio estado de espírito e os sentimentos dos outros."),
						"54"=>array("CF","PN","Sou paciente, cuidadoso e uso raciocínio lógico."),
						"55"=>array("CF","PR","Sou objetivo e vou direto ao assunto."),
						"56"=>array("CF","I","Prevejo todos os fatos relevantes, levando-os em consideração."),
						"57"=>array("CF","I","Tendo um dom intelectual e com visão."),
						"58"=>array("CF","PN","Alguém que sabe o que quer e como chegar lá."),
						"59"=>array("CF","S","Criativo e incentivador."),
						"60"=>array("CF","PR","Confiável e realizador."),
						"61"=>array("CS","PN","Ser cauteloso, mesmo que eu não pareça ser uma pessoa interessante."),
						"62"=>array("CS","I","Ser considerado como uma pessoa original (diferente), mesmo que isto signifique parecer mais inteligente que ela."),
						"63"=>array("CS","PR","Deixá-la me agradar mesmo que eu possa parecer introvertido."),
						"64"=>array("CS","S","Ser espontâneo, dizendo o que eu penso, mesmo que isto a iniba."),
						"65"=>array("CS","S","Sou extremamente emotivo e impulsivo."),
						"66"=>array("CS","PN","Sou inclinado a ser analítico e crítico."),
						"67"=>array("CS","PR","Me preocupo em fazer prevalecer os meus argumentos."),
						"68"=>array("CS","I","Sou inclinado a me isolar em meditação."),
						"69"=>array("CS","PN","Em conflitos de sabedoria e processos formais para solução de problemas."),
						"70"=>array("CS","PR","Nas soluções do aqui e agora."),
						"71"=>array("CS","I","Num mundo de conceitos, valores e idéias."),
						"72"=>array("CS","S","Nos sentimentos dos outros."),
							);

	$a_perguntas_respostas = array(
									"1"=>array(1,2,3,4),
									"2"=>array(5,6,7,8),
									"3"=>array(9,10,11,12),
									"4"=>array(13,14,15,16),
									"5"=>array(17,18,19,20),
									"6"=>array(21,22,23,24),
									"7"=>array(25,26,27,28),
									"8"=>array(29,30,31,32),
									"9"=>array(33,34,35,36),
									"10"=>array(37,38,39,40),
									"11"=>array(41,42,43,44),
									"12"=>array(45,46,47,48),
									"13"=>array(49,50,51,52),
									"14"=>array(53,54,55,56),
									"15"=>array(57,58,59,60),
									"16"=>array(61,62,63,64),
									"17"=>array(65,66,67,68),
									"18"=>array(69,70,71,72)
									);

}

//----------------------------------
function inclui_texto_apresentacao()
// Exibe o texto contendo as instruções logo após o título e subtítulo
{
	echo '<div style="margin: 0 auto;width:75%;line-height: 1.5rem;font-size: 16px;letter-spacing:1px;">';

    inclui_titulo("Estilos de Comunicação","Descubra qual estilo de comunicação você adota no seu dia a dia.");

	echo '<h5>Instruções</h5>';

	linha('<b>1)</b> &nbsp;Informe seu nome e seu e-mail.');

	linha('<b>2)</b> &nbsp;Responda as perguntas usando a seguinte escala:');

	linha('Selecione os números (6, 4, 3 ou 1) de acordo com as alternativas que mais se aproximem de você.');

	linha('&emsp;&emsp;<b>6</b> &nbsp;para aquela alternativa que mais, dentre as quatro, se aplique a você.');

	linha('&emsp;&emsp;<b>4</b> &nbsp;para a seguinte mais próxima.');

	linha('&emsp;&emsp;<b>3</b> &nbsp;para a seguinte.');

	linha('&emsp;&emsp;<b>1</b> &nbsp;para a alternativa que menos se aplique a você.');

	linha('<b>3)</b> &nbsp; Clique no botão "Gerar Relatório". O resultado será exibido na tela.');
	
	linha('<b>Observações</b>');
	linha('Todas as questões devem ser respondidas, e todos as respostas devem ser pontuadas.');
	linha('Para cada questão você deverá usar apenas um nº 6, um 4, um 3 e um único 1 para pontuar as respostas.');
	linha('Não pode haver duas ou mais respostas com o mesmo número.');
	linha('Mesmo que duas respostas sejam muito próximas, diferencie-as pontuando-as diferentemente.');

	linha('Lembrando que as sugestões/recomendações apresentadas são gerais, e foram geradas a partir das suas respostas.');

	linha('Caso tenha interesse em fazer um trabalho mais particular e aprofundado , envie um e-mail para <a style="color: blue;" href="mailto:contato@sidneileitao.com.br">contato@sidneileitao.com.br.</a>');

	echo '<br><br>';

	

}


?>