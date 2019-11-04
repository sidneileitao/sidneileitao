<?php

include_once('./common/layout_html.php');

inclui_cabecalho_clean();

inclui_principal_agora();

inclui_rodape_clean();



//-------------------------------
function inclui_principal_agora()
{

echo '<div class="container" style="margin: 0 auto;line-height: 1.5rem;font-size: 0.90em;letter-spacing:1px;">';

inclui_titulo("O que estou fazendo agora","");

linha('Eu estou em São Paulo/Brasil, com foco nisso:');

linha('<ul >');

linha('<li style="list-style-type: disc;list-style-position:inside;">Buscando ser um bom marido e um bom pai.</li>');

linha('<li style="list-style-type: disc;list-style-position:inside;">Desenvolvendo <a style="color:blue" href="ferramentas.php"> ferramentas on-line </a>para desenvolvimento pessoal e profissional.</li>');

linha('<li style="list-style-type: disc;list-style-position:inside;">Escrevendo <a style="color:blue" href="publicacoes.php">artigos</a> .</li> ');

linha('<li style="list-style-type: disc;list-style-position:inside;">Trabalhando como <a style="color:blue" href="http://www.sidneileitao.com.br/jobs/">Coach e Consultor de Carreira.</a></li> ');

linha('<li style="list-style-type: disc;list-style-position:inside;">Desenvolvendo site e Apps com php, javascript, React Native, css e html.</li>');

linha('<li style="list-style-type: disc;list-style-position:inside;">Meditando e orando. Assista <a style="color:blue" href="https://www.youtube.com/watch?v=FWWZ52a3grg">aqui</a> uma introdução com o <a style="color:blue" href="http://www.cebb.org.br/lamasamten/">Lama Padma Samten</a>.</li>');

linha('Última atualização: 29 de julho de 2017. (Página inspirada por <a style="color:blue" href="https://sivers.org/">Derek Sivers.</a>)');

linha('</ul>');

echo '</div>';

}

?>