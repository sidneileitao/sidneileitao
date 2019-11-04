<?php
include_once('layout_html.php');
require_once "../common/conexao.php";   
require_once "../common/crudDiag.class.php";

inclui_cabecalho("Avaliação de Estado Atual","Uma reflexão sobre suas prioridades.");

echo '<p style="font-size: 24px;"">Aqui estão alguns exemplos de conjuntos avaliados por outras pessoas.</p>';
echo '<br>';
echo '<div>';
echo '<button class="btn waves-effect waves-light" type="bt_fechar" name="relatorio" id="bt_fechar" onClick="javascript:history.back()">voltar
    	<i class="material-icons left">arrow_back</i>
  	</button>';
echo '</div>';
echo '<br>';

echo '<div class="row" >';

echo '<div class="col s12 m4 l2" style="background: #103877;font-size: 21px;color:white;height: 50px;vertical-align:middle;line-height:50px;" >';
echo '<p >Conjunto</p>';
echo '</div>';
	
echo '<div class="col s12 m4 l8" style="background: #103877;font-size: 21px;color:white;height: 50px;vertical-align:middle;line-height:50px;">';
echo '<p>Itens</p>';
echo '</div>';

echo '</div>';

$a_dados = array();

lista_conjuntos($a_dados);
$itens=" ";
$conjunto = "x";

foreach ($a_dados as $key => $value)
{
	
	if( ($conjunto != $a_dados[$key]->id_conjunto) && ($conjunto != "x") )
	{
		
		echo '<div class="row" >';
		echo '<div class="col s12 m4 l2" style="font-size: 16px;" >';
		echo '<p >'.$conjunto.'</p>';
		echo '</div>';

		echo '<div class="col s12 m4 l8" style="font-size: 16px;">';
		echo '<p>'.substr($itens, 0, -2).'</p>';
		echo '</div>';
		echo '</div>';
				
		$itens=" ";
	}
	$conjunto = $a_dados[$key]->id_conjunto;
	$itens = $itens.$a_dados[$key]->nm_item.', ';
	
}

echo '<div class="row" >';
echo '<div class="col s12 m4 l2" style="font-size: 16px;" >';
echo '<p >'.$conjunto.'</p>';
echo '</div>';

echo '<div class="col s12 m4 l8" style="font-size: 16px;">';
echo '<p>'.substr($itens, 0, -2).'</p>';
echo '</div>';
echo '</div>';

echo '<div>';
echo '<button class="btn waves-effect waves-light" type="bt_fechar" name="relatorio" id="bt_fechar" onClick="javascript:history.back()">voltar
    	<i class="material-icons left">arrow_back</i>
  	</button>';
echo '</div>';
	

//---------------------------------
function lista_conjuntos(&$a_dados)
{

	$query = "select cj.id_conjunto,it.nm_item from disco_aval_conjuntos cj, disco_aval_itens it where cj.id_conjunto=it.id_conjunto";

	$diag = crudDiag::getInstance(Conexao::getInstance());
	$a_dados = $diag->qry_select($query);
	$diag = null; 

	$result=TRUE;

	//print_r($a_dados);

}

?>