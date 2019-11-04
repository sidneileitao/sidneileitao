<?php
session_start();
$_SESSION['nome'] = $_POST["nome"];

require_once "../../common/conexao.php";   
require_once "../../common/crudDiag.class.php";
include_once('../../common/layout_html.php');

inclui_cabecalho_clean();

echo '<div style="margin: 0 auto;width:75%;line-height: 1.5rem;font-size: 16px;letter-spacing:1px;">';

inclui_titulo("Avaliação de Estado Atual","Uma reflexão sobre suas prioridades.");

echo '<form  id="frm_notas class="col s12" name="frm_notas" method="post" action="gera_disco.php" >';

echo '<p>Agora preencha as notas para cada um dos itens.</p>';
echo '<p>Na coluna "atual" preencha com a nota que represente o seu nível atual de satisfação em relação ao item.</p>';
echo '<p>Na coluna "desejado" preencha com a nota que represente o nível que você considera ideal de satisfação.</p>';

//echo '</div>';

echo '<br>';

grava_dados();
grava_conjunto($id_conjunto);
grava_itens($id_conjunto);
exibe_itens();
$_SESSION['id_conjunto']=$id_conjunto;

echo '<button class="btn waves-effect waves-light" type="bt_relatorio" name="relatorio" id="bt_relatorio">avançar
    	<i class="material-icons right">send</i>
  	</button>';


echo '</form>';
echo '</div>';

inclui_rodape_clean();

//--------------------
function exibe_itens()
{
	echo '<div class="row" style="text-align:center;">';
	echo '<div class="col s3" style="background: #103877;font-size: 21px;color:white;height: 50px;vertical-align:middle;line-height:50px;" >';
	echo '<p >Item</p>';
	echo '</div>';
	
	echo '<div class="col s3" style="background: #103877;font-size: 21px;color:white;height: 50px;vertical-align:middle;line-height:50px;">';
	echo '<p>atual</p>';
	echo '</div>';

	echo '<div class="col s3" style="background: #103877;font-size: 21px;color:white;height: 50px;vertical-align:middle;line-height:50px;">';
	echo '<p>desejado</p>';
	echo '</div>';
	
	echo '</div>';

	foreach ($_POST as $key => $value)
	{
		if($value!="" && $key != "nome" && $key != "email")
		{
			echo '<div class="row" >';
	        echo '<div class="col s3" >';
	        echo '<p>' . $value ;
	  	   	echo '</div>';

	        echo '<div class="col s3" >';
			echo '<input pattern="[1-9]|10" min="1" max="10" title="1 a 10" class="validate" required type="text" style="width:20px;font-size: 18px;" maxlength="2" size="2" name="ea_' . $value. '" id="ea_"' . $value . '"   >';
	   		echo '<label class="active" style="font-size:18px;" for="ea_"' .$value. '">'.'</label>';
		   	echo '</div>';

		   	echo '<div class="col s3" >';
			echo '<input pattern="[1-9]|10" min="1" max="10" title="1 a 10" class="validate" required  type="text" style="width:20px;font-size: 18px;" maxlength="2" size="2" name="ed_' . $value. '" id="ed_"' . $value . '"   >';
	   		echo '<label class="active" style="font-size:18px;" for="ed_"' .$value. '">'.'</label>';
		   	echo '</div>';
			
	      	echo '</div>';
	    }	
	}
}

//---------------------
function grava_dados()
{

	$nome = $_POST["nome"];
	$email = $_POST["email"];

	$query = "INSERT INTO ferramenta_utilizacao (nome,email,id_ferramenta,data_hora)
	 VALUES ( '$nome','$email',4,date('Yma'))";

	$diag = crudDiag::getInstance(Conexao::getInstance());
	$diag->qry_insert($query);
	$diag = null; 

	$result=TRUE;

}

//------------------------------------
function grava_conjunto(&$id_conjunto)
{


	$query = "INSERT INTO disco_aval_conjuntos (nm_conjunto)
	 VALUES ( 'Conjunto')";
    
	$diag = crudDiag::getInstance(Conexao::getInstance());
	$id_conjunto=$diag->qry_insert($query,0);
	$diag = null; 
	$result=TRUE;

}

//--------------------------------
function grava_itens($id_conjunto)
{

	$query = "INSERT INTO disco_aval_itens (id_conjunto,nm_item) VALUES ";

	foreach ($_POST as $key => $value)
	{
		if($value!="" && $key != "nome" && $key != "email")
		{
			$query .= " ( $id_conjunto,'$value'),";
		}
	}
	$query = substr($query, 0, -1);
	$diag = crudDiag::getInstance(Conexao::getInstance());
	$diag->qry_insert($query);
	$diag = null; 
	$result=TRUE;
}

?>