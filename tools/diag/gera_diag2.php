<?php 

function gera_diag($dados)
{

global $a_dados;
global $a_pontos_avaliados;
global $a_cargos;
global $a_tipos_entrevistas;
global $a_nivel_respostas;
global $a_itens;
global $a_controle_recomendacoes;

$a_controle_recomendacoes = array();
$a_mensagens = array();
$a_dados = $dados;

alimenta_arrays($a_pontos_avaliados,$a_cargos,$a_tipos_entrevistas,$a_nivel_respostas,$a_itens); // carrega as arrays

complementa_dados($a_dados); // adiciona informações à array $a_dados

analisa_dados($a_pontos_avaliados , $a_mensagens);

inclui_cabecalho_clean();
echo '<div style="margin: 0 auto;width:80%;line-height: 1.5rem;font-size: 16px;letter-spacing:1px;">';
inclui_titulo("Diagnóstico da Busca","Uma ferramenta para identificar oportunidades");

imprime_dados($a_dados);

imprime_diag($a_pontos_avaliados);

gera_botao_call();

echo '</div>';

inclui_rodape_clean();

}

function complementa_dados(&$a_dados)
{
	global $a_cargos;	
	
	$a_dados["media_mes_curriculo"] = round($a_dados["qt_cvs_enviados"] / $a_dados["qt_meses_busca"]);
	$a_dados["media_entrevistas_curriculos"] = round($a_dados["qt_cvs_enviados"] / $a_dados["qt_entrevistas"]);
	$a_dados["media_mes_entrevistas"] = round($a_dados["qt_meses_busca"] / $a_dados["qt_entrevistas"]);
	$a_dados["media_entrevistas_mes"] = round($a_dados["qt_entrevistas"] / $a_dados["qt_meses_busca"]);
	$a_dados["cargo"] = $a_cargos[$a_dados["id_nivel_cargo"]][0];
   $a_dados["anos_minimo"] = $a_cargos[$a_dados["id_nivel_cargo"]][1];
   $a_dados["anos_maximo"] = $a_cargos[$a_dados["id_nivel_cargo"]][2];	
	
}

function analisa_dados(&$a_pontos_avaliados , &$a_mensagens)
{

	global $a_dados;
	global $a_cargos;
	
	// avalia o ritmo do envio dos currículos
	if($a_dados["media_mes_curriculo"] < 22) 
   {
		grava_mensagem_recomendacao("1" , $a_pontos_avaliados, "vagas");
	}	
	
	
	// avalia assertividade do envio dos currículos
	if($a_dados["media_entrevistas_curriculos"] >10 ) 
	{
		grava_mensagem_recomendacao("3" , $a_pontos_avaliados, "publico");
		if($a_dados["id_nivel_cargo"] !="2" AND $a_dados["id_nivel_cargo"] !="1")
		{
			grava_mensagem_recomendacao("4" , $a_pontos_avaliados, "perfil");
		}
		grava_mensagem_recomendacao("5" , $a_pontos_avaliados, "objetivo");		
	}	
	
	
	// avalia otimização dos canais de vagas	
	if($a_dados["id_canal_pesquisa"] == 1)
	{	grava_mensagem_recomendacao("28" , $a_pontos_avaliados, "vagas");}
	
	if($a_dados["id_canal_pesquisa"] == 2)
	{	grava_mensagem_recomendacao("29" , $a_pontos_avaliados, "vagas");}

	if($a_dados["id_canal_pesquisa"] == 3)
	{	grava_mensagem_recomendacao("30" , $a_pontos_avaliados, "vagas");}	
			
	if($a_dados["id_canal_pesquisa"] == 4)
	{	grava_mensagem_recomendacao("31" , $a_pontos_avaliados, "vagas");}	
	
	
	// avalia o grau de abertura em relação à cargo e área.
	
	if($a_dados["pc_vagas_mercado"] != 3)
	{	grava_mensagem_recomendacao("23" , $a_pontos_avaliados, "publico");}
		
	if($a_dados["pc_vagas_area"] != 3)
	{	grava_mensagem_recomendacao("24" , $a_pontos_avaliados, "objetivo");}
		
	if($a_dados["pc_vagas_cargo"] != 3)
	{	grava_mensagem_recomendacao("25" , $a_pontos_avaliados, "objetivo");}	
		
	
	// avalia o tempo de experiência
	if($a_dados["qt_anos_experiencia"] >= $a_dados["anos_minimo"] and $a_dados["qt_anos_experiencia"] <= $a_dados["anos_maximo"])
   {
   	//$msg = "experiência está dentro do esperado (".$anos_minimo." a " . $anos_maximo . " anos)." ;
		if($a_dados["id_nivel_cargo"] !="2" AND $a_dados["id_nivel_cargo"] !="1")
		{
   		grava_mensagem_recomendacao("4" , $a_pontos_avaliados, "perfil");
   	}
   	
   }elseif($a_dados["qt_anos_experiencia"] < $a_dados["anos_minimo"])
   	{ //$msg = "experiência menor do que a esperada (".$anos_minimo." a " . $anos_maximo . " anos)." ;
   		grava_mensagem_recomendacao("6" , $a_pontos_avaliados, "perfil");
   		grava_mensagem_recomendacao("4" , $a_pontos_avaliados, "perfil");
			grava_mensagem_recomendacao("3" , $a_pontos_avaliados, "publico");
	  		grava_mensagem_recomendacao("5" , $a_pontos_avaliados, "objetivo");   
					
   }elseif($a_dados["qt_anos_experiencia"] > $a_dados["anos_maximo"]) 
   	{
   		//$msg = "experiência maior do que a esperada (".$anos_minimo." a " . $anos_maximo . " anos)." ;
			grava_mensagem_recomendacao("3" , $a_pontos_avaliados, "publico");   		
   		grava_mensagem_recomendacao("8" , $a_pontos_avaliados, "perfil");
   		grava_mensagem_recomendacao("9" , $a_pontos_avaliados, "curriculo");
         grava_mensagem_recomendacao("25" , $a_pontos_avaliados, "objetivo");
         grava_mensagem_recomendacao("26" , $a_pontos_avaliados, "network");

			if($a_dados["pc_vagas_indicadas"] != 1 )
			{
				grava_mensagem_recomendacao("43" , $a_pontos_avaliados, "network");
				grava_mensagem_recomendacao("45" , $a_pontos_avaliados, "exposicao");				
			}
         
   }
  
  	if($a_dados["id_nivel_cargo"]=="2") //somente para estagiários
    {
		grava_mensagem_recomendacao("46" , $a_pontos_avaliados, "curriculo");
		grava_mensagem_recomendacao("47" , $a_pontos_avaliados, "publico");
		grava_mensagem_recomendacao("48" , $a_pontos_avaliados, "objetivo");
		grava_mensagem_recomendacao("49" , $a_pontos_avaliados, "network");
   }
   
   // avalia entrevistas
  	if($a_dados["id_perguntas_entrevistas"] == "1" )
	{
		if( $a_dados["id_respostas_entrevistas"] == "1" )
		{	   	
   		grava_mensagem_recomendacao("10" , $a_pontos_avaliados, "entrevistas");   		
   		grava_mensagem_recomendacao("11" , $a_pontos_avaliados, "entrevistas");
    		grava_mensagem_recomendacao("12" , $a_pontos_avaliados, "entrevistas");
    		grava_mensagem_recomendacao("13" , $a_pontos_avaliados, "entrevistas");   			   
   	}
   	elseif($a_dados["id_respostas_entrevistas"] == "2" )
		{
			if ($a_dados["qt_anos_experiencia"] >=5) 
			{
				$n_msg = "14";
			}
			elseif( $a_dados["qt_anos_experiencia"] < $a_cargos[$a_dados["id_nivel_cargo"]][2] ) 
			{
				$n_msg = "15";   		
			}
			else 
			{ 
				$n_msg = "18";   		
			}		
   	
  			grava_mensagem_recomendacao($n_msg , $a_pontos_avaliados, "entrevistas");
  			grava_mensagem_recomendacao("16" , $a_pontos_avaliados, "perfil");
  			grava_mensagem_recomendacao("17" , $a_pontos_avaliados, "entrevistas");
  			grava_mensagem_recomendacao("19" , $a_pontos_avaliados, "entrevistas");
  			grava_mensagem_recomendacao("3" , $a_pontos_avaliados, "perfil"); 			   
   
   	}
   	elseif( $a_dados["id_respostas_entrevistas"] == "3" )  
		{
	  		grava_mensagem_recomendacao("3" , $a_pontos_avaliados, "vagas");
	  	   grava_mensagem_recomendacao("4" , $a_pontos_avaliados, "perfil");
	  	   grava_mensagem_recomendacao("20" , $a_pontos_avaliados, "entrevistas");
	  	   grava_mensagem_recomendacao("22" , $a_pontos_avaliados, "publico");
		   		   
	   }		
	}
	elseif($a_dados["id_perguntas_entrevistas"] == "2")
	{
		if($a_dados["id_respostas_entrevistas"] == "1")
		{
			grava_mensagem_recomendacao("32" , $a_pontos_avaliados, "publico");
			grava_mensagem_recomendacao("11" , $a_pontos_avaliados, "entrevistas");
    		grava_mensagem_recomendacao("12" , $a_pontos_avaliados, "entrevistas");
    		grava_mensagem_recomendacao("13" , $a_pontos_avaliados, "entrevistas"); 
     		grava_mensagem_recomendacao("34" , $a_pontos_avaliados, "entrevistas");		
		}
	  	elseif($a_dados["id_respostas_entrevistas"] == "2" )
		{
			grava_mensagem_recomendacao("32" , $a_pontos_avaliados, "publico");			
			grava_mensagem_recomendacao("11" , $a_pontos_avaliados, "entrevistas");
    		grava_mensagem_recomendacao("12" , $a_pontos_avaliados, "entrevistas");
    		grava_mensagem_recomendacao("13" , $a_pontos_avaliados, "entrevistas");	
    		grava_mensagem_recomendacao("33" , $a_pontos_avaliados, "entrevistas");	
    		grava_mensagem_recomendacao("34" , $a_pontos_avaliados, "entrevistas");	
		} 
		elseif( $a_dados["id_respostas_entrevistas"] == "3") 
		{
			grava_mensagem_recomendacao("32" , $a_pontos_avaliados, "publico");	
			grava_mensagem_recomendacao("33" , $a_pontos_avaliados, "entrevistas");	
    		grava_mensagem_recomendacao("34" , $a_pontos_avaliados, "entrevistas");	
     		grava_mensagem_recomendacao("35" , $a_pontos_avaliados, "entrevistas");				
     		grava_mensagem_recomendacao("36" , $a_pontos_avaliados, "entrevistas");							
		}  	
	  	
	}
	elseif($a_dados["id_perguntas_entrevistas"] == "3")
	{
		if($a_dados["id_respostas_entrevistas"] == "1")
		{
			grava_mensagem_recomendacao("11" , $a_pontos_avaliados, "entrevistas");
    		grava_mensagem_recomendacao("12" , $a_pontos_avaliados, "entrevistas");
    		grava_mensagem_recomendacao("13" , $a_pontos_avaliados, "entrevistas");		
		}

		if($a_dados["id_respostas_entrevistas"] == "2")	
		{
			grava_mensagem_recomendacao("11" , $a_pontos_avaliados, "entrevistas");
    		grava_mensagem_recomendacao("12" , $a_pontos_avaliados, "entrevistas");
    		grava_mensagem_recomendacao("13" , $a_pontos_avaliados, "entrevistas");
     		grava_mensagem_recomendacao("37" , $a_pontos_avaliados, "entrevistas");					
		}
	
		if($a_dados["id_respostas_entrevistas"] == "3")	
		{
			grava_mensagem_recomendacao("11" , $a_pontos_avaliados, "entrevistas");
			grava_mensagem_recomendacao("4" , $a_pontos_avaliados, "perfil");
			grava_mensagem_recomendacao("5" , $a_pontos_avaliados, "objetivo");
			grava_mensagem_recomendacao("38" , $a_pontos_avaliados, "curriculo");
			grava_mensagem_recomendacao("39", $a_pontos_avaliados, "curriculo");	
	  		grava_mensagem_recomendacao("37" , $a_pontos_avaliados, "entrevistas");										
		}
	}
	
	// Avalia qualificações
	if($a_dados["pc_qualificacoes"] == "1")
	{
		grava_mensagem_recomendacao("38" , $a_pontos_avaliados, "curriculo");
		grava_mensagem_recomendacao("39" , $a_pontos_avaliados, "curriculo");
	}

	if($a_dados["pc_qualificacoes"] == "2")
	{
		grava_mensagem_recomendacao("38" , $a_pontos_avaliados, "curriculo");
		grava_mensagem_recomendacao("39" , $a_pontos_avaliados, "perfil");
		grava_mensagem_recomendacao("40" , $a_pontos_avaliados, "perfil");
		grava_mensagem_recomendacao("41" , $a_pontos_avaliados, "perfil");		
		
	}
		
 	grava_mensagem_recomendacao("42" , $a_pontos_avaliados, "exposicao");
 	
 	
 	// avalia network
 	if($a_dados["pc_vagas_contato"] == "3")
 	{
 	 	grava_mensagem_recomendacao("44" , $a_pontos_avaliados, "exposicao");
 	}
 		
  	if($a_dados["pc_vagas_indicadas"] == "3")
  	{
  	 	grava_mensagem_recomendacao("43" , $a_pontos_avaliados, "network");
  	 	grava_mensagem_recomendacao("42" , $a_pontos_avaliados, "exposicao");
  	 	grava_mensagem_recomendacao("44" , $a_pontos_avaliados, "exposicao");
  	 	grava_mensagem_recomendacao("45" , $a_pontos_avaliados, "exposicao");
  	}
  	
}


function imprime_diag($a_pontos_avaliados)
{
	
	
	foreach ($a_pontos_avaliados AS $indice=>$valuex)
	   
	{
		echo "<br>";
		
		if( $indice == "perfil")
		{		
			$icone = "assignment_ind";		
		}
		
		if( $indice == "entrevistas")
		{		
			$icone = "mic";		
		}	
			
		if( $indice == "network")
		{		
			$icone = "group";		
		}	
		
		if( $indice == "vagas")
		{		
			$icone = "search";		
		}	
		
		if( $indice == "curriculo")
		{		
			$icone = "description";		
		}	
			
		if( $indice == "objetivo")
		{		
			$icone = "touch_app";		
		}
		
		if( $indice == "publico")
		{		
			$icone = "my_location";		
		}
		
		if( $indice == "exposicao")
		{		
			$icone = "face";		
		}
		
		echo '<i class="medium material-icons" style="font-size:60px;color:#00bfa5">'.$icone.'</i>';
		echo "<p style='font-weight:bold;font-size:18px;'>";
		echo $valuex[0];
		echo "</p>";
				
		if(count($valuex)>1);
		{	
			$n_contador=0;
			
			foreach($valuex as $value)
   		{
   	   			 	
   			if($n_contador>0) 
   			{
					echo "<p style='margin: 10px 0 10px 0'>";   				
   				echo $value;
   				echo "</p>";
	  			}
	  		
	  			$n_contador+=1;
			}		  	
		}
	}
	  				echo "<br>";
}

function grava_mensagem_recomendacao($id_msg , &$a_pontos_avaliados, $item)
{
	global $a_controle_recomendacoes;
	
	$a_mensagens = array(
		"1" => "Revise sua estratégia de prospecção de vagas, e tenha como meta dobrar essa média. ",
		"2" => "Procure ampliar o seu público alvo (de empresas)", 
		"3" => "Busque empresas e vagas mais alinhadas com o seu perfil e conjunto de qualificações.",
		"4" => "Revise o seu mapeamento profissional para ter clareza sobre suas qualificações.",
		"5" => "Revise o seu objetivo para que ele esteja alinhado com qualificações exigidas.",
		"6" => "Tempo de experiência abaixo do esperado pelo mercado.",
		"7" => "Você possui muitos anos de experiência no cargo/função.",
		"8" => "Em alguns contextos, muitos anos no mesmo cargo pode ser interpretado como uma carreira estacionada.",
		"9" => "Avalie adotar o modelo funcional, pois ele possui uma estrutura que destacará suas qualificações e experiências.",
		"10" => "Nas entrevistas você apresenta domínio sobre o exercício do cargo/função (nos aspectos técnicos)",
		"11" => "Reflita sobre a forma como você se comunica (nas entrevistas, principalmente).",
		"12" => "A forma como você se comunica é tão importante quanto saber as respostas.",
		"13" => "Postura corporal, tom de voz, uma fala bem estruturada, concisão, tudo isso reflete o seu perfil.",
		"14" => "Avalie se você não está defasado/desatualizado em relação ao mercado (o que é comum em profissionais experientes).",
		"15" => "Avalie se você não está defasado/desatualizado em relação ao mercado (o que é comum em profissionais com pouca experiência).",
		"16" => "Identifique quais são os seus gaps e busque eliminá-los ou mitigá-los.",
		"17" => "Em alguns contextos, a forma como você reage e lida com o não saber, é mais importante do que o não saber.",
		"18" => "Avalie se você não está defasado/desatualizado em relação ao mercado.",
		"19" => "Prepare-se para as entrevistas, para que você demonstre um repertório, domínio e atitudes adequadas.",
		"20" => "O fato de você não responder a maioria das perguntas (nas entrevistas) sugere que você não possui as qualificações para o cargo/função.",
		"21" => "Caso possua as qualificações necessárias, considere a possibilidade de candidatar-se à outros cargos/funções.",
		"22" => "Considere recolocar-se em empresas de outros segmentos e/ou portes.",
		"23" => "Ampliar buscas para empresas de outros mercados que também precisam das suas qualificações.",
		"24" => "Considere atuar em outras áreas além da sua atual. A maioria das habilidades e competências são transferíveis.",
		"25" => "Avalie se suas qualificações não o capacitam para outros cargos/funções nos quais suas qualificações também são valorizadas."	,
		"26" => "Quanto mais anos de experiência, maior e mais ativo deve ser o seu network (em teoria).",
		"27" => "Procure desenvolver e ativar mais o seu network.",
		"28" => "Aumente suas ações em outros canais de vagas (LinkedIn e sites/colunas especializados em carreira, por exemplo.)",
		"29" => "Aumente suas ações em outros canais de vagas (Sites de recrutamento  e sites/colunas especializados em carreira, por exemplo.)",
		"30" => "Aumente suas ações em outros canais de vagas (Sites de recrutamento  e LinkedIn, por exemplo.)",	
		"31" => "Aumente suas ações em outros canais de vagas (LinkedIn, Sites de recrutamento  e sites/colunas especializados em carreira, por exemplo.)",
		"32" => "Procure candidatar-se para vagas em empresas onde o seu perfil seja valorizado e se encaixe naturalmente.",
		"33" => "Procure aumentar o seu autoconhecimento. Esse é um fator chave nas entrevistas." ,
		"34" => "Avalie se você não fica tenso devido ao receio de não saber responder algo, o que o impede de agir com naturalidade.",
		"35" => "Falar de si mesmo pode ser difícil, principalmente quando se está sendo avaliado.",
		"36" => "Se for esse o seu caso, procure lembrar-se de que não existem respostas certas ou erradas para perguntas pessoais/comportamentais.",
		"37" => "Avalie se você não precisa desenvolver mais o seu repertório (sobre as empresas e sobre os mercados onde elas atuam).",
		"38" => "Avalie se o seu currículo está comunicando de forma clara e objetiva as suas qualificações (principalmente sem inflar suas qualificações)",
		"39" => "Pesquise sobre quais são as qualificações comumente exigidas pelo mercado, e avalie se você realmente as possui.",
		"40" => "Avalie se as qualificações que você ainda não possui não são determinantes para as vagas.",
		"41" => "Busque desenvolver as qualificações que faltam.",
		"42" => "Procure aumentar positivamente sua exposição (através do LinkedIn, por exemplo)." ,
		"43" => "Procure ser mais ativo no seu network, através de contribuições e colaborações (principalmente em redes profissionais. Isso aumenta as suas chances de ser lembrado positivamente." ,
		"44" => "Aprenda a comunicar de forma clara e profissional, para os seus contatos, que está buscando uma recolocação.",		
		"45" => "Construa e reforce a sua imagem profissional perante o mercado, principalmente mantendo a coerência e consistência entre o que você diz e o que faz.",
		"46" => "Como você possui pouca ou nenhuma experiência profissional, suas qualificações serão compostas basicamente por: habilidades comportamentais, habilidades técnicas,
formação educacional, cursos complementares ou extra-curriculares, voluntariados,trabalhos eventuais.",
		"47" => "Considere também empresas de setores distintos da sua área de formação, mas que costumam ter em seus quadros profissionais da sua área. Exemplos: Bancos contratam engenheiros, empresas de Design contratam antropólogos.",
		"48" => "Pesquise sobre outras áreas além da sua, dentro das empresas, que também costumam oferecer oportunidades para profissionais da sua área.",
		"49" => "Participe de eventos ligados à sua área de atuação (feiras, congressos, lançamentos de produtos, etc.). Além de você familiarizar-se com o mercado, você pode criar boas conexões com profissionais que já atuam nela."
	);
	
	$key = array_search($a_mensagens[$id_msg], $a_pontos_avaliados[$item]); 
	
	if($key == NULL)
	{	
		array_push($a_pontos_avaliados[$item],$a_mensagens[$id_msg]);
	}
	
}

function imprime_dados($a_dados)
{
	echo "<span style='font-weight:bold;'>Nome : </span>" . $a_dados["nome"] . "</br>";
	echo "<span style='font-weight:bold;'>Cargo : </span>" . $a_dados["cargo"] . "</br>";	
	echo "<span style='font-weight:bold;'>Experiência : </span>" . $a_dados["qt_anos_experiencia"] . " anos</br>";			
	echo "<span style='font-weight:bold;'>Tempo de procura : </span>" . $a_dados["qt_meses_busca"] . " meses</br>";					
	echo "<span style='font-weight:bold;'>Currículos enviados : </span>" . $a_dados["qt_cvs_enviados"] . "</br>";					
	echo "<span style='font-weight:bold;'>Quantidade de entrevistas : </span>" . $a_dados["qt_entrevistas"] . "</br>";						
		
  }

function alimenta_arrays(&$a_pontos_avaliados,&$a_cargos,&$a_tipos_entrevistas,&$a_nivel_respostas,&$a_itens)
{
	$a_pontos_avaliados = array(
											"perfil" => array("Mapeamento do Perfil Profissional"),
											"objetivo" => array("Definição do Objetivo"),
											"publico" => array("Definição do Público-alvo"),
											"curriculo" => array("Elaboração do Currículo"),
											"vagas" => array("Prospecção de Vagas"),
											"network" => array("Desenvolvimento do Network"),
											"exposicao" => array("Exposição e Marca Pessoal"),
											"entrevistas" => array("Entrevistas"));
	
	$a_cargos = array(
							"1" => array("auxiliar,ajudante ou estagiário",0,0),
							"2" => array("estagiário",0,0),
							"3" => array("técnico",2,3),
							"4" => array("assistente",1,2),
							"5" => array("analista júnior",1,2),
							"6" => array("analista pleno",2,3),
							"7" => array("analista sênior, consultor ou especialista",3,4),
							"8" => array("líder",1,2),
							"9" => array("encarregado",2,3),
							"10" => array("supervisor ou coordenador",3,4),
							"11" => array("gerente",4,5));


	$a_tipos_entrevistas = array(
											"1" => "técnicas, ligadas ao cargo e suas respectivas funções",
      									"2" => "pessoais (hábitos, preferências) e/ou sobre sua forma de lidar com as situações",
      									"3" => "sobre o mercado, a empresa e a área da vaga");
      					
	$a_nivel_respostas = array(
										"1" => "soube responder todas as perguntas",
      								"2" => "respondeu a maioria das perguntas",
      								"3" => "não soube responder a maioria das perguntas",
      								"4" => "não soube responder nenhuma pergunta");

	$a_itens = array(
							"ritmo_envio" => array("Ritmo de envio dos currículos"),
							"assertividade_cv" => array("Assertividade dos Currículos"),
							"publico" => array("definição do público-alvo"),
							"curriculo" => array("elaboração do currículo"),
							"vagas" => array("prospecção de vagas"),
							"network" => array("desenvolvimento e ativação do network"),
							"exposicao" => array("exposição e marca pessoal"),
							"recrutamento" => array("recrutamento"),
							"entrevistas" => array("entrevistas"));
}

function gera_botao_call()
{
echo '<br>';

echo '<a class="btn-floating btn-medium waves-effect waves-light #00bfa5" href="http://www.sidneileitao.com.br"><i class="material-icons">add</i></a>';
echo '<br><br>';
echo '<p style="font-weight:bold;font-size:18px;">Para mais informações'; 
echo '<p style="margin:10px 0 10px 0;">Uma boa estratégia para recolocar-se contempla outros fatores além dos abordados pela ferramenta (como por exemplo, seu perfil no LinkedIn, um currículo bem feito, entre outros).</p>';

echo '<p style="margin:10px 0 10px 0;">Lembrando que as sugestões/recomendações apresentadas são gerais, e foram geradas a partir das suas respostas.</p>';


echo '<p style="margin:10px 0 10px 0;">Caso tenha interesse em fazer um trabalho mais particular e aprofundado , envie um e-mail para <a style="color: blue;" href="mailto:contato@sidneileitao.com.br">contato@sidneileitao.com.br.</a></p>';
echo '<p style="margin:10px 0 10px 0;">Você também pode me enviar um e-mail para dar um feedback sobre a ferramenta, para tirar dúvidas sobre o seu preenchimento ou sobre as recomendações, e até mesmo só para dar um "olá".';
echo '<p>Visite <a style="color:blue;font-size:21px;"href="http://www.sidneileitao.com.br">sidneileitao.com.br</a> e conheça mais serviços e ferramentas de Coaching e Consultoria de Carreira.</p>';
echo '<br>';
echo '<br>';
}
?>