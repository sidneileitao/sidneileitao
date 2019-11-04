<?php
include_once('layout_html.php');
require_once "../common/conexao.php";   
require_once "../common/crudDiag.class.php";

inclui_cabecalho("Avaliação de Estado Atual","Uma reflexão sobre suas prioridades.");

echo '<p style="font-size: 24px;"">Aqui estão alguns exemplos de ações adotadas por outras pessoas.</p>';
echo '<br>';

echo '<div>';
echo '<button class="btn waves-effect waves-light" type="bt_fechar" name="relatorio" id="bt_fechar" onClick="window.close();">fechar esta janela
    	<i class="material-icons right">close</i>
  	</button>';
echo '</div>';
echo '<br>';

echo '<div class="row" >';

echo '<div class="col s12 m4 l2" style="background: #103877;font-size: 21px;color:white;height: 50px;vertical-align:middle;line-height:50px;" >';
echo '<p >Item</p>';
echo '</div>';
	
echo '<div class="col s12 m4 l8" style="background: #103877;font-size: 21px;color:white;height: 50px;vertical-align:middle;line-height:50px;">';
echo '<p>Ação</p>';
echo '</div>';

echo '</div>';



$a_dados = array();

lista_acoes($a_dados);
$itens=" ";
$conjunto = "x";

foreach ($a_dados as $key => $value)
{
	
	
		echo '<div class="row" >';
		echo '<div class="col s12 m4 l2" style="font-size: 16px;" >';
		echo '<p >'.$a_dados[$key]->nm_item.'</p>';
		echo '</div>';

		echo '<div class="col s12 m4 l8" style="font-size: 16px;">';
		echo '<p>'.$a_dados[$key]->dsc_acao.'</p>';
		echo '</div>';
		echo '</div>';
				
		
	
}
	
echo '<div>';
echo '<button class="btn waves-effect waves-light" type="bt_fechar" name="relatorio" id="bt_fechar" onClick="window.close();">fechar esta janela
    	<i class="material-icons right">close</i>
  	</button>';
echo '</div>';
echo '<br>';


//---------------------------------
function lista_acoes(&$a_dados)
{
	$query = "select nm_item,dsc_acao from disco_aval_acoes";

	$diag = crudDiag::getInstance(Conexao::getInstance());
	$a_dados = $diag->qry_select($query);
	$diag = null; 

	$result=TRUE;

	//print_r($a_dados);

}

?>