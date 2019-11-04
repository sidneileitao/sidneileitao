<?php
session_start();
$nome = $_SESSION['nome'];
$imagem_ea = $_SESSION['arq_ea'] ;
$imagem_ed = $_SESSION['arq_ed'] ;
$a_notas = $_SESSION['a_notas'] ;
$id_conjunto = $_SESSION['id_conjunto'] ;
require_once "../../common/conexao.php";   
require_once "../../common/crudDiag.class.php";
require_once("./dompdf/dompdf_config.inc.php");
date_default_timezone_set('America/Sao_Paulo');

$a_acoes = array();
$a_fatores = array();
$a_itens = array();

foreach ($_POST as $key => $value)
{
    if($key!="relatorio" && $key!="gravar")
    {

        $a_itens[substr($key,4,strpos($key,"_")-4)] = substr($key,4,strpos($key,"_")-4);

        if(substr($key,0,4) == "acao")
        {
            if(!empty($value))
            {
                $a_acoes[substr($key,4,strpos($key,"_")-4)][] = $value;
            }
        }

        if(substr($key,0,4) == "fato")
        {
           if(!empty($value))
           {
             $a_fatores[substr($key,4,strpos($key,"_")-4)][] = $value;
            }
        }
    }
    
}

//print_r($a_itens);

if($_POST["gravar"] == "sim")
{
    grava_acoes($id_conjunto,$a_acoes);
}

$style='<html>
		<head>
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,700,800,900" rel="stylesheet">
		<link href="../../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <style type="text/css">
        
        @page {
            margin: 120px 50px 80px 50px;
        }
        #head{
            background-repeat: no-repeat;
            background-color: #82b1ff;
            font-family: "Helvetica";
            font-size: 24px;
            text-align: center;
            color: black;
            height: 130px;
            width: 105%;
            position: fixed;
            top: -120px;
            left: -40;
            right: 0;
            margin: 0 0 0 0;
        }
        #footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: right;
            border-top: 1px solid gray;
            font-family: Helvetica;
            font-size:12px;
        }
        
        </style>
        </head>
        <body>';

$head='<div id="head">'.
'<p style="color:white;margin:10px 0 10px 0;font-family: Helvetica;font-size:32px;text-align:center; font-weight:bold">Avaliação Estado Atual e Estado Desejado</p>

<p style="color:white;margin:10px 0 10px 0;font-family: Helvetica;font-size:24px;text-align:center">Feito por '.$nome.' em '. date('d/m/Y').'</p>
</div>';
$footer='<div id="footer">
		<p style="margin:10px 0 10px 0;color:#82b1ff;letter-spacing:0.30;"> Gerado no site www.sidneileitao.com.br. </p>
		<p style="margin:10px 0 10px 0;color:#82b1ff;"> Copyright © 2017 Sidnei Leitão. All rights reserved. </p>
        </div>
        </body></html>  ';

$acoes="";

foreach ($a_itens as $key => $value)
{
  
    $acoes=$acoes.'<p style="color:#82b1ff;margin:10px 0 10px 0;font-family: Helvetica;font-size:18px;font-weight:bold">' . $value.'</p>';
    $acoes=$acoes.'<div style="border-top: 1px solid gray;border-width:thin">';
    $acoes=$acoes.'</div>';

  

    $acoes=$acoes.'<p style="color:black; margin:10px 0 10px 0;font-family: Raleway;font-size:14px;">Fatores que me levaram a dar a nota ' . $a_notas[$value][0].'</p>';  

   if(!empty($a_fatores[$value]))
   { 
         

        foreach ($a_fatores[$value] as $key_fator => $value_fator)
        {
            if(!empty($value_fator))
            {
                $acoes=$acoes.'<p style="color:black; margin:10px 0 10px 0;font-family: Raleway;font-size:14px;">-&nbsp;&nbsp;' . $value_fator.'</p>';    
            }
  
        }
    }

      $acoes=$acoes.'<p style="color:black; margin:10px 0 10px 0;font-family: Raleway;font-size:14px;">O que farei para caminhar em direção a nota ' . $a_notas[$value][1].'</p>'; 

   if(!empty($a_acoes[$value])) 
   {
      
   
        foreach ($a_acoes[$value] as $key2 => $value2)
        {
        
            if(!empty($value2))
            {
                $acoes=$acoes.'<p style="color:black; margin:10px 0 10px 0;font-family: Raleway;font-size:14px;">-&nbsp;&nbsp;' . $value2.'</p>';    
            }
        }
   }


}



$corpo_html ='
<br>
<table>
 <tr>
  <td><IMG src='.$imagem_ea.' WIDTH=300>
  <td><IMG src='.$imagem_ed.' WIDTH=300>
 </tr>
</table>'.
'<p style="margin:10px 0 10px 0;color:#82b1ff;font-family: Helvetica;font-size:24px;font-weight:bold;text-align:center;">Plano de Ação</p>'.

$acoes;

$arq_html = $style.$head.$corpo_html.$footer;

 /* Cria a instância */
$dompdf = new DOMPDF();

// carrega o HTML
$dompdf->load_html($arq_html);

//define o formato para A4 - Portrail
$dompdf->set_paper("A4", "portrail");
 
/* Renderiza */
$dompdf->render();
 
/* Exibe */

$dompdf->stream( "avaliacao_".$nome.".pdf", array("Attachment" => false  ));


//-----------------------------------------
function grava_acoes($id_conjunto,$a_acoes)
{

    $query = "INSERT INTO disco_aval_acoes (id_conjunto,nm_item,dsc_acao) VALUES ";

    foreach ($a_acoes as $key => $value)
    {
              
        foreach ($a_acoes[$key] as $key2 => $value2)
        {
            if(!empty($value2))
            {
                $nome_campo = $key;

                $query .= " ( $id_conjunto,'$nome_campo','$value2'),";
            }
        }
        
    }
    $query = substr($query, 0, -1);
    $diag = crudDiag::getInstance(Conexao::getInstance());
    $diag->qry_insert($query);
    $diag = null; 
    //$result=TRUE;
}
?>