<?php


//--------------------------------
function gera_form_definir_itens()
{
	echo '<div style="margin: 0 auto;width:75%;line-height: 1.5rem;font-size: 16px;letter-spacing:1px;">';

	echo '<form class="col s12" id="frm_definir" name="frm_definir" method="post" action="frm_notas.php" >';

	echo '	<div class="input-field col s6">';
	echo '  	<input name="email" id="email" type="email" class="validate" required style="width:300px;font-size: 18px;">';
	echo '      <label class="active" style="font-size:18px;" for="email" data-error="wrong" data-success="right">e-mail</label>';
	echo '  </div>';
	echo '</div>';
	for ($i=1;$i<=12;$i++) 
	{
		echo '<div class="row">';
        echo '<div class="col s12">';
		echo '<div class="input-field inline">';
		echo '<p><input type="text" style="width:300px;font-size: 18px;" maxlength="20" size="20" name="item_' . $i. '" id="item_"' . $i . '"   >';
   		echo '<label class="active" style="font-size:18px;" for="item_"' .$i. '">Item '.$i.'</label>';
      	echo '</div>';
	   	echo '</div>';
      	echo '</div>';
	}
	echo '<button class="btn waves-effect waves-light" type="bt_relatorio" name="relatorio" id="bt_relatorio">avançar
    	<i class="material-icons right">send</i>
  	</button>';

	echo '<br>';

	echo '<br>';

	echo '</form>';

	echo '</div>';

}


//----------------------------------
function inclui_texto_apresentacao()
// Exibe o texto contendo as instruções logo após o título e subtítulo
{

	echo '<div style="margin: 0 auto;width:75%;line-height: 1.5rem;font-size: 16px;letter-spacing:1px;">';

    inclui_titulo("Avaliação do Estado Atual","Uma reflexão sobre suas prioridades.");

	echo '<p><h5>Instruções</h5></p>';

	linha('<b>1)</b> &nbsp;Informe seu nome e seu e-mail.');

	linha('<b>2)</b> &nbsp;Informe os itens(1) que você deseja avaliar.');

	linha('<b>3)</b> &nbsp;Clique no botão "Avançar".');

	linha('<b>4)</b> &nbsp;Para cada item você deve atribuir duas notas: uma que represente o seu nível de satisfação atual em relação ao item, e uma que represente o nível que você deseja ou considere o ideal.');

	linha('<b>5)</b> &nbsp;Após preencher as notas, clique no botão "Avançar".');

	linha('<b>6)</b> &nbsp;Serão gerados e apresentados dois gráficos: um representando o Estado Atual e outro representando o Estado Desejado.".');

	linha('<b>7)</b> &nbsp;Reflita por alguns momentos sobre os dois gráficos. Em seguida, defina que ações você tomará na próxima semana para caminhar em direção ao estado desejado. Elenque de uma a três ações para cada item.');
	
	linha('<b>8)</b> &nbsp;Quando terminar de informar as ações, clique em "Gerar PDF".');

	echo '<p style="margin:10px 0 10px 0;font-size:18px;"><i class="small material-icons" style="color: blue;">lightbulb_outline</i><b>(1)</b> Caso queira se inspirar em avaliações que outras pessoas já fizeram, clique <a style="color: blue;" href="/disco_aval/exibe_exemplos.php">aqui</a>.</p>';

	echo '<br>';
	echo '<p><b>Observações</b></p>';
	
	echo '<p style="margin:10px 0 10px 0;">Lembrando que as sugestões/recomendações apresentadas são gerais, e foram geradas a partir das suas respostas.</p>';

	echo '<p style="margin:10px 0 10px 0;">Caso tenha interesse em fazer um trabalho mais particular e aprofundado , envie um e-mail para <a style="color: blue;" href="mailto:contato@sidneileitao.com.br">contato@sidneileitao.com.br.</a></p>';

	echo '<br><br>';

	echo '</div>';

}


?>