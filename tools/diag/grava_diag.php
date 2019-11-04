<?php 

include_once('gera_diag2.php');
include_once('../../common/layout_html.php');
require_once "../../common/conexao.php";   
require_once "../../common/crudDiag.class.php";

// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÃRIO !
$nome	= $_POST ["nome"];
$email	= $_POST ["email"];
$qt_meses_busca	= $_POST ["meses_busca"];
$qt_cvs_enviados	= $_POST ["qtde_curriculos"];
$qt_entrevistas	= $_POST ["qtde_entrevistas"];
$id_nivel_cargo	= $_POST ["cargo"];
$qt_anos_experiencia	= $_POST ["anos_experiencia"];
$id_perguntas_entrevistas = $_POST ["perguntas_entrevista"];
$id_respostas_entrevistas	= $_POST ["respostas_entrevistas"];
$id_canal_pesquisa	= $_POST ["canais_vagas"];
$pc_vagas_mercado	= $_POST ["perc_mesmo_empregador"];
$pc_vagas_area	= $_POST ["perc_mesma_area"];
$pc_vagas_cargo	= $_POST ["perc_mesmo_cargo"];
$pc_qualificacoes	= $_POST ["perc_qualificacoes"];
$pc_vagas_contato	= $_POST ["perc_vagas_contatos"];
$pc_vagas_indicadas	= $_POST ["perc_vagas_indicadas"];

//Gravando no banco de dados !


	
$query = "INSERT INTO diag_busca 
(nome,email,qt_meses_busca,qt_cvs_enviados,qt_entrevistas,id_nivel_cargo,qt_anos_experiencia,id_perguntas_entrevistas,
id_respostas_entrevistas,id_canal_pesquisa,pc_vagas_mercado,pc_vagas_area,pc_vagas_cargo,pc_qualificacoes,pc_vagas_contato,pc_vagas_indicadas	
) 
VALUES ('$nome',
'$email',
'$qt_meses_busca',
'$qt_cvs_enviados',
'$qt_entrevistas',
'$id_nivel_cargo',
'$qt_anos_experiencia',
'$id_perguntas_entrevistas',
'$id_respostas_entrevistas',
'$id_canal_pesquisa',
'$pc_vagas_mercado',
'$pc_vagas_area',
'$pc_vagas_cargo',
'$pc_qualificacoes',
'$pc_vagas_contato',
'$pc_vagas_indicadas')";

$diag = crudDiag::getInstance(Conexao::getInstance());
$diag->qry_insert($query);
$diag = null; 

$result=TRUE;

$dados_candidato = array(
"nome" => $nome,
"email" => $email,
"qt_meses_busca" => $qt_meses_busca,
"qt_cvs_enviados" => $qt_cvs_enviados,
"qt_entrevistas" => $qt_entrevistas,
"id_nivel_cargo" => $id_nivel_cargo,
"qt_anos_experiencia" => $qt_anos_experiencia,
"id_perguntas_entrevistas" => $id_perguntas_entrevistas,
"id_respostas_entrevistas" => $id_respostas_entrevistas,
"id_canal_pesquisa" => $id_canal_pesquisa,
"pc_vagas_mercado" => $pc_vagas_mercado,
"pc_vagas_area" => $pc_vagas_area,
"pc_vagas_cargo" => $pc_vagas_cargo,
"pc_qualificacoes" => $pc_qualificacoes,
"pc_vagas_contato" => $pc_vagas_contato,
"pc_vagas_indicadas" => $pc_vagas_indicadas);

if($result===TRUE)
  gera_diag($dados_candidato);

else
  echo "Não foi possível gravar os dados.";


?> 
