<?php

include_once('../../common/layout_html.php');

inclui_cabecalho_clean();

gera_form();

inclui_rodape_clean();

//------------------
function gera_form()
{

  echo '<div style="margin: 0 auto;width:80%;line-height: 1.5rem;font-size: 16px;letter-spacing:1px;">';

  inclui_titulo("Diagnóstico da Busca","Uma ferramenta para identificar oportunidades");


    echo '<form class="col s12" id="cadastro" name="cadastro" method="post" action="grava_diag.php" >';
     
   
    echo '  <div class="row">';
    echo '    <div class="input-field col s6">';
    echo '    	    <input name="nome" id="nome" type="text" class="validate" required> ';
    echo '    	    <label class="active" style="font-size:18px;" for="nome">Nome</label>   ';       
    echo '    </div>';
    echo '  </div>';
  
    echo '  <div class="row">';
    echo '    <div class="input-field col s6">';
    echo '      <input name="email" id="email" type="email" class="validate" required >';
    echo '      <label class="active" style="font-size:18px;" for="email" data-error="wrong" data-success="right">e-mail</label>';
    echo '    </div>';
    echo '  </div>';

    echo '  <div class="row">';
    echo '    <div class="input-field col s6">';
 
    echo '      	<input pattern="[0-9]+$" type="text" title="1 a 99" maxlength="2" name="meses_busca" id="meses_busca"  class="validate" required size="2" style="width:50px;">';
    echo '      	<label style="font-size:18px;" for="meses_busca">Está buscando há quantos meses?</label>';
    echo '      </div>';
    echo '  </div> ';


     echo '  <div class="row">  '; 
     echo '   <div class="input-field col s6">';
     echo '     	<input pattern="[0-9]+$"  title="1 a 9999" name="qtde_curriculos" id="qtde_curriculos" type="text" class="validate" required maxlength="4" size="4" style="width:50px;">';
     echo '     	<label class="active" style="font-size:18px;" for="qtde_curriculos">Quantos currículos enviou?</label>';
     echo '   </div>';
     echo ' </div>';
 
 		 echo '<div class="row">   ';
     echo '   <div class="input-field col s6">';
     echo '      	<input pattern="[0-9]+$" title="1 a 999" name="qtde_entrevistas" id="qtde_entrevistas" type="text" class="validate" required maxlength="3" size="3" style="width:50px;">';
     echo '      	<label class="active" style="font-size:18px;" for="qtde_curriculos">De quantas entrevistas participou?</label>';
     echo '   </div>';
     echo ' </div>';     

   	 echo '<div class="row">';
     echo ' 	<div class="input-field col s6">';
     echo '    <label class="active" style="font-size:16px;" >Para qual nível você está buscando vagas?</label>';
     echo '     <select class="browser-default" name="cargo" id="cargo">';
     echo ' 		<option value="" disabled selected>Selecione uma opção</option>';
     echo '	 		<option value="1">auxiliar ou ajudante</option>';
     echo '	 		<option value="2">estagiário</option>';      	
     echo ' 		<option value="3">técnico</option>';
     echo ' 		<option value="4">assistente</option>';
     echo ' 		<option value="5">analista júnior</option>';
     echo ' 		<option value="6">analista pleno</option>';
     echo ' 		<option value="7">analista sênior, consultor ou especialista</option>';
     echo ' 		<option value="8">líder</option>';
     echo ' 		<option value="9">encarregado</option>';
     echo ' 		<option value="10">supervisor ou coordenador</option>';
     echo ' 		<option value="11">gerente</option>';
     echo '			</select>';
  	 echo '		</div>';
  	 echo '</div>';
  	
    
		echo '<div class="row">';      
		echo '	<div class="input-field col s12">';
    echo '			<input pattern="[0-9]+$" name="anos_experiencia" id="anos_experiencia" type="text" class="validate" required maxlength="2" size="2" style="width:50px;" >';
    echo '      	<label class="active" style="font-size:16px;" for="anos_experiencia">Quantos anos de experiência possui nesse cargo/função?</label>';
  	echo '		</div> ';
  	echo '	</div> ';    
  
		echo '<div class="row" >';  

		echo '	<div class="input-field col s12" >';
    echo '			<select  class="browser-default" name="perguntas_entrevista" id="perguntas_entrevista" style="width:365px;">';
    echo '  		<option value="" disabled selected>Selecione uma opção</option>';
    echo '	 		<option value="1">técnicas, ligadas ao cargo e suas respectivas funções</option>';
    echo '  		<option value="2">pessoais (hábitos, preferências) e/ou sobre sua forma de lidar com as situações</option>';
    echo ' 		<option value="3">sobre o mercado, a empresa e a área da vaga</option>';
    echo '  		</select>';
    echo '			<label class="active" style="font-size:16px;">Nas entrevistas, as perguntas eram de que tipo?</label>';
  	echo '		</div> ';
  	echo '	</div>';

 		echo '<div class="row">';      
  	echo '		<div class="input-field col s12">';
    echo '			<select class="browser-default" name="respostas_entrevistas" id="respostas_entrevistas" style="width:365px;">';
    echo '  		<option value="" disabled selected>Selecione uma opção</option>';
    echo '	 		<option value="1">Todas as perguntas</option>';
    echo '  		<option value="2">A maioria das perguntas</option>';
    echo '  		<option value="3">Algumas perguntas (metade ou menos)</option>';
    echo '  		</select>';
    echo '			<label class="active" style="font-size:16px;">Nas entrevistas você respondeu:</label>';
  	echo '		</div> ';
    echo '  </div>';
    
    
 		echo '<div class="row">';  
		echo '	<div class="input-field col s12">';
    echo '			<select class="browser-default" name="canais_vagas" id="canais_vagas" style="width:365px;">';
    echo '  		<option value="" disabled selected>Selecione uma opção</option>';
    echo ' 	 		<option value="1">Sites de recrutamento (vagas.com, catho, outros)</option>';
    echo '  		<option value="2">LinkedIn</option>';
    echo '  		<option value="3">Colunas especializadas sobre carreira e emprego</option>';
    echo '  		<option value="4">Contatos pessoais e profissionais</option>';
    echo '  		</select>';
    echo '			<label class="active" style="font-size:16px;">Em qual canal você encontrou mais vagas?</label>';
  	echo '		</div>';
  	echo '	</div>';
  		      
    echo '  <p style="font-size:16px;color:#9e9e9e;">Das vagas que você encontrou até o momento, informe quantas delas eram:</p>';
     
    echo '  <div class="row">';
		echo '	<div class="input-field col s4">';
		echo '	No mesmo mercado do seu último empregador.';
    echo '			<select class="browser-default" name="perc_mesmo_empregador" id="perc_mesmo_empregador">';
    echo '  		<option value="" disabled selected>Selecione uma opção</option>';
    echo ' 	 		<option value="1">Todas</option>';
    echo '  		<option value="2">A maioria</option>';
    echo '  		<option value="3">Algumas (metade ou menos)</option>';
    echo '  		</select>';
    echo '			<label class="active" style="font-size:14px;"></label>';
  	echo '		</div> ';
  			
  	echo '		<div class="input-field col s4">';
  	echo '			Na mesma área em que você atuava.';
    echo '			<select class="browser-default" name="perc_mesma_area" id="perc_mesma_area">';
    echo '			<option value="" disabled selected>Selecione uma opção</option>';
    echo ' 		<option value="1">Todas</option>';
    echo '  		<option value="2">A maioria</option>';
    echo '  		<option value="3">Algumas (metade ou menos)</option>';
    echo '  		</select>';
    echo '			<label class="active" style="font-size:14px;"></label>';
  	echo '		</div> ';
  			
  	echo '		<div class="input-field col s4">';
  	echo '			No mesmo cargo/função em que você atuava.';
    echo '			<select class="browser-default" name="perc_mesmo_cargo" id="perc_mesmo_cargo">';
    echo '        <option value="" disabled selected>Selecione uma opção</option>';
    echo '  		<option value="1">Todas</option>';
    echo '  		<option value="2">A maioria</option>';
    echo '  		<option value="3">Algumas (metade ou menos)</option>';
    echo '  		</select>';
    echo '			<label class="active" style="font-size:14px;"></label>';
  	echo '		</div> ';
    echo '  </div>';
		
	  echo '  <div class="row">';
    echo ' 	<div class="input-field col s12">';
    echo '			<select class="browser-default" name="perc_qualificacoes" id="perc_qualificacoes" style="color:black;width:365px;">';
    echo '			<option value="" disabled selected>Selecione uma opção</option>';
    echo '  		<option value="1">Todas</option>';
    echo '  		<option value="2">A maioria</option>';
    echo '  		<option value="3">Algumas (metade ou menos)</option>';
    echo '  		</select>';
    echo '			<label class="active" style="font-size:16px;">Das qualificações mais comumente exigidas para as vagas, você possui:</label>';
  	echo '		</div> ';
		echo '</div>   ';
	
		echo '<p style="font-size:16px;color:#9e9e9e;">Do total de currículos enviados, quantos foram para vagas informadas por alguém da sua rede de contatos (pessoal ou profissional)? </p>';
    echo '  <div class="row">';
    echo '  	<div class="input-field col s6">';

  	echo '		<select class="browser-default" name="perc_vagas_contatos" id="perc_vagas_contatos" style="color:black;width:365px;" >';
  	echo '			<option value="" disabled selected>Selecione uma opção</option>';
    echo ' 		<option value="1">Todos</option>';
    echo '  		<option value="2">A maioria</option>';
    echo '  		<option value="3">Alguns (metade ou menos)</option>';
    echo '  		</select>';
    echo '			<label class="active" style="font-size:16px;"></label>';
  	echo '		</div>';
		echo '</div>';
 
    echo '  <p style="font-size:16px;color:#9e9e9e;">Do total de vagas para as quais você se candidatou, em quantas você foi recomendado/indicado por alguém da sua rede de contatos (pessoal ou profissional)?.</p>';

    echo '   <div class="row">';
    echo '  	<div class="input-field col s6">';

    echo '			<select class="browser-default" name="perc_vagas_indicadas" id="perc_vagas_indicadas" style="color:black;width:365px;">';
    echo '		 	<option value="" disabled selected>Selecione uma opção</option>';
    echo '  		<option value="1">Todas</option>';
    echo '  		<option value="2">A maioria</option>';
    echo '  		<option value="3">Algumas (metade ou menos)</option>';
    echo '  		</select>';
    echo '			<label class="active" style="font-size:14px;"></label>';
  	echo '		</div> ';
		echo '</div> ';    


	 //echo ' <input name="cadastrar" id="bigbutton" type="bigbutton" value="Gerar Diagnóstico" /> ';
    
    echo '<button class="btn waves-effect waves-light" type="bt_relatorio" name="relatorio" id="bt_relatorio">Gerar Diagnóstico"
      <i class="material-icons right">send</i>
    </button>';

   echo '</form>';
   
   
   echo '</div>';
    
     
   echo '<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>';
   echo '<script src="http://'.'localhost'.'/v3/js/materialize.js"></script>';
   echo '<script src="http://'.'localhost'.'/v3/js/init.js"></script>';


}
?>