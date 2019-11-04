<?php

include_once('../common/layout_html.php');

inclui_cabecalho_clean();

inclui_principal_estilo();

inclui_rodape_clean();



//----------------------------------------
function inclui_principal_estilo()
{

echo '<div class="container" style="margin: 0 auto;line-height: 1.5rem;font-size: 0.90em;letter-spacing:1px;">';

inclui_titulo("Estilos de Comunicação","Descubra o seu estilo de comunicação");

echo '<a class="waves-effect waves-light btn teal lighten-2 white-text" href="./estilo_comunicacao/index_estilo.php"><i class="material-icons right">mode_edit</i>fazer o teste</a>';

echo '<br><br>';

linha('Essa ferramenta descreve as forças que você utiliza ao relacionar-se com as pessoas, os fatos e circunstâncias da sua vida.');

linha('Criada por Paul Mok, ela baseia-se no trabalho de Carl C. Jung sobre Tipos Psicológicos, ela  identifica 4 estilos de comunicação: racional, reflexivo, afetivo e pragmático.');

linha('Sua validade e importância reside na possibilidade de nos tornar-mos mais conscientes da forma como nos comunicamos e agimos no mundo.');


linha('E tão importante quanto isso, é aprendermos a perceber como os outros se comunicam, e assim, trabalharmos na construção de comunicações mais produtivas e positivas.');

linha('Importante ressaltar que, como todo teste comportamental, ele é limitado à uma pequena e isolada fração de tudo o que forma um ser humano. Jamais sinta-se definido pelo resultado dele.');

linha('Ao fazer o teste tenha em mente que:');

linha('- não existem respostas certas ou erradas.');
linha('- nenhum estilo é melhor ou pior.');
linha('- jamais assuma o seu estilo como um rótulo.');
linha('- jamais use seu estilo como justificativa para seus atos.');


linha('O quadro abaixo apresenta um resumo das características de cada estilo.');

linha('<img style="width:100%;" src="../imagens/estilos_comunicacao_paul_mok.png" alt="" />');

echo '<p class="western"><span style="font-family: Arial,sans-serif;"><em>Fonte: “Comunicating Styles Technology - CST” – Paul Mok</em></span>';

linha('Caso tenha alguma dúvida sobre a utilização ou sobre as possibilidades que a ferramenta oferece, envie um e-mail para <a style="color: blue;" href="mailto:contato@sidneileitao.com.br">contato@sidneileitao.com.br.</a>');

linha('Lembrando que as sugestões/recomendações apresentadas são gerais, e foram geradas a partir das suas respostas.');

linha('Caso tenha interesse em fazer um trabalho mais particular e aprofundado , envie um e-mail para <a style="color: blue;" href="mailto:contato@sidneileitao.com.br">contato@sidneileitao.com.br.</a>.');


linha('<a class="waves-effect waves-light btn teal lighten-2 white-text" href="./estilo_comunicacao/index_estilo.php"><i class="material-icons right">mode_edit</i>fazer o teste</a>');

echo '</div>';

}

?>