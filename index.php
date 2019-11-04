<?php

include_once('./common/layout_html.php');

inclui_cabecalho_clean();

inclui_corpo_clean();

inclui_rodape_clean();

//---------------------------
function inclui_corpo_clean()
{

//echo '<div class="container" style="max-width:100%;font-size:14px;letter-spacing: 1px;word-spacing: 1px;line-height: 1.5em;margin:0;width:100%;font-family: "Raleway", sans-serif;">';
echo '<div class="container" style="font-size:1.4em;letter-spacing: 1px;word-spacing: 1px;line-height: 1.5em;margin-let:15%;font-family: "Raleway", sans-serif;">';


echo '<!--   Icon Section   -->';
echo '<div class="row">';
echo '   <div class="col s12 m4">';
echo '      <div class="icon-block">';
echo '          <h2 class="center light-blue-text"><a href="publicacoes.php"><img src="./imagens/Publicações.png" style="width:60%;height:60%px;"> </a></h2>';
echo '           <h5 class="center"><a style="color:teal;font-size:0.7em;" href="publicacoes.php">PUBLICAÇÕES</a></h5>';
echo '      </div>';
echo '   </div>';

echo '   <div class="col s12 m4">';
echo '      <div class="icon-block">';
echo '            <h2 class="center light-blue-text"><a  href="http://www.sidneileitao.com.br/jobs/"><img src="./imagens/Coaching.png" style="width:60%;height:60%;"></a></h2>';
echo '            <h5 class="center"><a style="color:teal;font-size:0.7em;" href="http://www.sidneileitao.com.br/jobs/">COACHING E CONSULTORIA<a></h5>';
        
echo '      </div>';
echo '   </div>';

echo '   <div class="col s12 m4">';
echo '      <div class="icon-block">';
echo '            <h2 class="center light-blue-text"><a  href="ferramentas.php"><img src="./imagens/Ferramentas.png" style="width:60%;height:60%;"></a></h2>';
echo '            <h5 class="center"><a style="color:teal;font-size:0.7em;" href="ferramentas.php">FERRAMENTAS</a></h5>';

            
echo '      </div>';
echo '   </div>';


echo '</div>';
  
}
?>