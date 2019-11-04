<?php

include_once('./common/layout_html.php');

inclui_cabecalho_clean();

inclui_principal_sobre();

inclui_rodape_clean();



//-------------------------------
function inclui_principal_sobre()
{

echo '<div class="container" style="margin: 0 auto;line-height: 1.5rem;font-size: 16px;letter-spacing:1px;">';

inclui_titulo("Eu em 10 segundos","");

linha('Eu trabalho como <span style="font-weight: bold; font-size: 20px;">coach </span>e <span style="font-weight: bold; font-size: 20px;">consultor de carreiras</span>.');

linha('Mas já trabalhei em outras coisas também.');

linha('Durante <span style="font-weight: bold;">35 anos</span> atuei em vários ramos da economia: comércio (padaria, loja de móveis), metalúrgica, construtora, editora, uma fundação do 3o setor, empresa de TV por assinatura e em três bancos.');

linha('Passei por vários departamentos: balcão de vendas, produção, RH, marketing, comercial, atendimento ao cliente, compras, financeiro e TI.');

linha('Fui balconista, aprendiz, office-boy, auxiliar, programador, analista, consultor e gestor.');

linha('Na área de TI atuei por 25 anos, sendo 13 como gestor. <a style="color: blue;" href="http://www.sidneileitao.com.br/perfil-de-ti/">Mais detalhes aqui.</a>');

linha('Formei-me em Administração de Empresas, Professional Coach e Scrum Master.');

linha('Sou grato por todas essas experiências. De um jeito ou de outro, elas me trouxeram até aqui.');

linha('Aqui eu conto <a style="color: blue;" href="agora.php">o que eu estou fazendo agora</a>.');

linha('E aqui eu explico <a style="color: blue;" href="http://www.sidneileitao.com.br/jobs/">quem e como eu posso ajudar</a>.');

echo '</div>';

}

?>