<?php

include_once('./common/layout_html.php');

inclui_cabecalho_clean();

inclui_principal_publicacoes();

inclui_rodape_clean();



//----------------------------------------
function inclui_principal_publicacoes()
{

echo '<div class="container" style="margin: 0 auto;line-height: 1.5em;letter-spacing:1px;font-size: 0.90em">';

inclui_titulo("Publicações","");

linha('<a style="color: blue;" href="http://www.sidneileitao.com.br/como-equilibrar-nossas-escolhas/"><h5><b>Como Equilibrar Nossas Escolhas</b></h5></a>');
linha('Na correria em que a vida às vezes se torna, corremos o risco de perder o equilíbrio entre nossas escolhas.');
linha('Clique <a style="color: blue;" href="http://www.sidneileitao.com.br/como-equilibrar-nossas-escolhas/">aqui</a> para ler o artigo.');

linha('<a style="color: blue;" href="http://www.sidneileitao.com.br/ebook/"><h5><b>5 Dicas Para a Sua Busca de Emprego</b></h5></a>');
linha('Eu selecionei 5 dicas poderosas que vão causar um grande impacto na sua busca por emprego.');
linha('São dicas sobre currículos, entrevistas, vagas, network e autoconhecimento.');
linha('Baixe o eBook gratuitamente <a style="color: blue;" href="http://www.sidneileitao.com.br/ebook/">aqui.</a>');

linha('<a style="color: blue;" href="http://www.sidneileitao.com.br/como-desenvolver-a-autoconfianca/"><h5><b>Como desenvolver a autoconfiança</b></h5></a>');
linha('Quer ser mais autoconfiante? Então trabalhe no seu autoconhecimento.');
linha('Clique <a style="color: blue;" href="http://www.sidneileitao.com.br/como-desenvolver-a-autoconfianca/">aqui</a> para saber mais.');

linha('<a style="color: blue;" href="http://www.sidneileitao.com.br/solucao-ou-problema/"><h5><b>Você é a solução ou o problema?</b></h5></a>');
linha('E se você, ao invés de pedir um emprego, começar a oferecer os seus serviços para ajudar as empresas?');
linha('Neste artigo eu proponho uma breve reflexão e uma mudança na maneira como você se apresenta.');
linha('Clique <a style="color: blue;" href="http://www.sidneileitao.com.br/solucao-ou-problema/">aqui</a> para ler.');

linha('<a style="color: blue;" href="http://www.sidneileitao.com.br/busca-de-um-novo-emprego-a-abordagem-que-funciona/"><h5><b>Busca de um novo emprego. A abordagem que funciona.</b></h5></a> ');
linha('Para aumentar as suas chances na busca por oportunidades, você precisa adotar uma postura ativa, de protagonista e autor da própria história.');
linha('Clique <a style="color: blue;" href="http://www.sidneileitao.com.br/busca-de-um-novo-emprego-a-abordagem-que-funciona/">aqui</a> para entender como mudar.');


echo '</div>';



}

?>