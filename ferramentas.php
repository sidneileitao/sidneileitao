<?php

include_once('./common/layout_html.php');

inclui_cabecalho_clean();
inclui_botao_FB();
inclui_principal_ferramentas();

inclui_rodape_clean();

function inclui_botao_FB()
{

echo '<div>';
echo '<fb:like href= http://localhost/v3/ferramentas.php " layout="standard" show-faces="true" width="450" action="like" colorscheme="light" />';
echo '</div>';

}

//----------------------------------------
function inclui_principal_ferramentas()
{

echo '<div class="container" style="margin: 0 auto;line-height: 1.5rem;font-size: 0.90em;letter-spacing:1px;">';

echo '<p>Esse trabalho tem como missão divulgar e disponibilizar conhecimentos e ferramentas para desenvolvimento pessoal e profissional.</p>';
echo '<br>';

echo '<p>As ferramentas abaixo vão ajudá-lo(a) na sua busca por oportunidades profissionais, no desenvolvimento da sua carreira e na sua vida pessoal.</p>';
echo '<br>';

echo '<p>Elas são on-line e o resultado é apresentado imediatamente após você responder às perguntas.<p>';
echo '<br>';

echo '<a style="font-weight: bold;color: blue;font-size: 21px;" href="./tools/disco_aval.php">Avaliação Estado Atual</a>';
echo '<p> Essa é uma ferramenta para gerar reflexões profundas, fornecendo o nivel de clareza que você precisa para tomar decisões e colocar-se em movimento na direção do que deseja.</p>';
echo '<br>';

echo '<a style="font-weight: bold;color: blue;font-size: 21px;" href="./tools/diagnostico_busca.php">Diagnóstico para Recolocação</a>';
echo '<p> Ferramenta on-line e gratuita que identifica como você pode encontrar mais vagas e aumentar o envio de currículos, mas com foco e objetividade, aumentando assim, as suas chances de ser recrutado para mais entrevistas.</p>';
echo '<br>';

echo '<a style="font-weight: bold;color: blue;font-size: 21px;" href="./tools/ancoras.php">Âncoras de Carreira</a>';
echo '<br>';

echo '<p>Teste que identifica quais as habilidades, valores e necessidades que você mais valoriza nas suas escolhas de carreira.</p>';
echo '<br>';

echo '<p><a style="font-weight: bold;color: blue;font-size: 21px;" href="./tools/estilo_comunicacao.php">Estilos de Comunicação</a></p>';

echo '<p>Este é um instrumento que descreve forças que você utiliza no relacionamento com outras pessoas e com os fatos.</p>';
echo '</div>';

}

?>