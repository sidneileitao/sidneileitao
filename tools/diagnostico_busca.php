<?php

include_once('../common/layout_html.php');

inclui_cabecalho_clean();

inclui_principal_dignostico();

inclui_rodape_clean();



//----------------------------------------
function inclui_principal_dignostico()
{


echo '<div class="container" style="margin: 0 auto;line-height: 1.5rem;font-size: 0.90em;letter-spacing:1px;">';

inclui_titulo("Diagnóstico da Busca","Uma ferramenta para identificar oportunidades");

echo '<a class="waves-effect waves-light btn teal lighten-2 white-text" href="./diag/diag.php"><i class="material-icons right">build</i>ir para a ferramenta</a>';

echo '<br><br>';

linha('Eu desenvolvi essa ferramenta para ajudá-lo com a sua recolocação profissional.');

linha('Ela identifica como você pode encontrar mais vagas e aumentar o envio de currículos, mas com foco e objetividade, aumentando assim, as suas chances de ser recrutado para mais entrevistas.');

linha('Caso tenha alguma dúvida sobre o preenchimento ou sobre o resultado, envie uma mensagem para contato@sidneileitao.com.br. Eu ficarei muito feliz em responder.');

linha('Assim que você clicar no botão "Gerar Diagnóstico", o relatório será gerado e exibido na tela.');

linha('Lembrando que as sugestões/recomendações apresentadas são gerais, e foram geradas a partir das suas respostas.');

linha('Caso tenha interesse em fazer um trabalho mais particular e aprofundado , envie um e-mail para <a style="color: blue;" href="mailto:contato@sidneileitao.com.br">contato@sidneileitao.com.br.</a>.');


linha('<a class="waves-effect waves-light btn teal lighten-2 white-text" href="./diag/diag.php"><i class="material-icons right">build</i>ir para a ferramenta</a>');

echo '</div>';

}

?>