<?php

include_once('../common/layout_html.php');

inclui_cabecalho_clean();

inclui_principal_ferramentas();

inclui_rodape_clean();



//----------------------------------------
function inclui_principal_ferramentas()
{


echo '<div style="margin: 0 auto;width:75%;line-height: 1.5rem;font-size: 0.90em;letter-spacing:1px;">';


 echo '<img src="http://www.sidneileitao.com.br/imagens/disco_aval.png" style="width:400px;height:400px; display: block;  margin-left: auto;  margin-right: auto">';

echo '<a class="waves-effect waves-light btn teal lighten-2 white-text" href="./disco_aval/avaliacao_estado.php"><i class="material-icons right">build</i>ir para a ferramenta</a>';

echo '<br><br>';

linha('Essa é uma ferramenta para gerar reflexões profundas, fornecendo o nivel de clareza que você precisa para tomar decisões e colocar-se em movimento na direção do que deseja.');

linha('Ela vai ajudá-lo a ter uma visão panorâmica sobre áreas da sua vida, sobre suas competências e habilidades, sobre departamentos/equipes da sua empresa, ou ainda sobre qualquer outro conjunto que você queira avaliar.');

linha('Você escolhe o que deseja avaliar(sua vida, seu perfil profissional, áreas da sua empresa, etc.), e em seguida define os elementos que irão compor a sua visão panorâmica.');


linha('Seu uso é muito simples.');

linha('Você informa os itens que irão compor a sua visão panorâmica.');

linha('Em seguida, você atribui uma nota que represente o seu nível atual de satisfação (ou outro critério que você escolher) para os itens.');

linha('Você também atribui uma nota que represente o nível que você deseja.');

linha('A ferramenta apresentará dois gráficos: um com a situação atual e outro com a situação desejada.');

linha('Para finalizar, você define o que fará em relação a cada item. Esse será o seu plano de ação.');

linha('E você pode montar a sua avaliação com qualquer conjunto que desejar.');

linha('Veja algumas das possibilidades.');

echo'<p style="font-size:21px;"><b>Áreas da Vida</b></p>';
linha('Tenha uma visão panorâmica das áreas da sua vida, e perceba quais precisam mais da sua atenção.');
linha('Uma avaliação das áreas da vida pode ser composta como no exemplo abaixo.');
echo '<img style="width:400px;height:400px;" src="http://www.sidneileitao.com.br/imagens/disco_aval.png" alt="" />';


echo'<p style="font-size:21px;"><b>Áreas ou Equipes de uma Empresa</b></p>';
linha('Permite que vocẽ tenha uma visão conjunta sobre áreas ou equipes.');
linha('Você pode eleger um critério de avaliação (por exemplo, entrega de resultados), e avaliar cada área ou equipe a partir desse critério.');
echo '<img style="width:400px;height:400px;"src="http://www.sidneileitao.com.br/imagens/disco_aval2.png" alt="" />';

echo'<p style="font-size:21px;"><b>Competências e Habilidades</b></p>';
linha('Avalie como está o conjunto de competências e habilidades que você possui, e trace um plano para equilibrá-las de acordo com os seus objetivos e desafios.');

echo '<img style="width:400px;height:400px;"src="http://www.sidneileitao.com.br/imagens/disco_aval3.png" alt="" />';


linha('Caso tenha alguma dúvida sobre a utilização ou sobre as possibilidades que a ferramenta oferece, envie um e-mail para <a style="color: blue;" href="mailto:contato@sidneileitao.com.br">contato@sidneileitao.com.br.</a>');

linha('<a class="waves-effect waves-light btn teal lighten-2 white-text" href="./disco_aval/avaliacao_estado.php"><i class="material-icons right">build</i>ir para a ferramenta</a>');

echo '</div>';

}

?>