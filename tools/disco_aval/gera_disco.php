<?php
session_start();

$nome = $_SESSION['nome']; 
$id_conjunto = $_SESSION['id_conjunto'];
include_once('../../common/layout_html.php');

inclui_cabecalho_clean();

$a_notas=array();
$n_largura_imagem = 500;
$n_altura_imagem = 500;
$a_itens_avaliados_ea = array();
$a_itens_avaliados_ed = array();
$arquivo_imagem_ea="ea_".str_replace(" ","",$nome);
$arquivo_imagem_ed="ed_".str_replace(" ","",$nome);

// preenche os dois vetores: o do estado atual e o do estado desejado
$i_ea = 1;
$i_ed = 1;

foreach ($_POST as $key => $value) {
	if($key!="relatorio")
	{
		if( substr($key,0,2)=="ea")
		{
			$a_itens_avaliados_ea[$i_ea]=array( substr($key,3,strlen($key)-3), $value);
			$i_ea++;
		}
		if( substr($key,0,2)=="ed")
		{
			$a_itens_avaliados_ed[$i_ed]=array( substr($key,3,strlen($key)-3), $value);
			$i_ed++;
		}
	}
}

monta_disco_avaliacao($a_itens_avaliados_ea,$n_largura_imagem,$n_altura_imagem,$arquivo_imagem_ea,"Estado Atual");

monta_disco_avaliacao($a_itens_avaliados_ed,$n_largura_imagem,$n_altura_imagem,$arquivo_imagem_ed,"Estado Desejado");

$_SESSION['arq_ea'] = $arquivo_imagem_ea;
$_SESSION['arq_ed'] = $arquivo_imagem_ed;

echo '<div style="margin: 0 auto;width:80%;line-height: 1.5rem;font-size: 16px;letter-spacing:1px;">';
inclui_titulo("Avaliação de Estado Atual","Uma reflexão sobre suas prioridades.");

echo '<div style="margin: 0 0 0 0;"class="row">';

echo '<div class="col s6">';
echo '<img style="width:400px;height:400px;" src='.$arquivo_imagem_ea.' alt="disco" />';
echo '</div>';
echo '<div class="col s6">';

echo '<img style="width:400px;height:400px;" src='.$arquivo_imagem_ed.' alt="disco" />';
echo '</div>';
echo '</div>';

echo '<div>';
echo '<p style="margin:10px 0 10px 0;">Reflita por alguns momentos sobre os dois gráficos.';
echo '<p style="margin:10px 0 10px 0;">Para cada item, descreva os fatores que o levaram a atribuir determinada nota para o nível atual de satisfação.';
echo '<p style="margin:10px 0 10px 0;">Em seguida, defina que ações você tomará na próxima semana para caminhar em direção ao estado desejado.'; 
echo '<p style="margin:10px 0 10px 0;">Elenque no mínimo uma ação para cada item.</p>';
echo '<p style="margin:10px 0 10px 0;">Escolha ações que sejam específicas e simples, mas que causem impacto no item avaliado.';
echo '<p style="margin:10px 0 10px 0;">Caso queira se inspirar em avaliações que outras pessoas já fizeram, clique <a style="color: blue;" href="exibe_acoes.php" target="_blank">aqui</a>.</p>';

echo '<link rel="import" href="http://example.com/elements.html">';

echo '</div>';
echo '<br><br>';

// monta o form para inclusão das ações
echo '<form  id="frm_notas id="frm_acoes" name="frm_acoes" method="post" action="gera_pdf.php" target="blank">';
exibe_acoes($a_notas);
echo '<div>';
echo '<p>Podemos gravar as ações que você descreveu, para que outros pessoas possam se inspirar nelas?';
echo '<p>Em nenhum momento elas serão associadas à você (através do seu nome ou e-mail).';
echo '	<p>';
echo '      <input name="gravar" type="radio" id="gravar_sim" value="sim" checked/>';
echo '     <label for="gravar_sim">Sim</label>';
echo '    </p>';
echo '    <p>';
echo '      <input name="gravar" type="radio" id="gravar_nao" value="nao"  />';
echo '      <label for="gravar_nao">Não</label>';
echo '   </p>';    
echo '</div>';
echo '</div>';

echo '</br>';

$_SESSION['a_notas']=$a_notas; 

echo '<div style="margin: 0 auto;width:80%;line-height: 1.5rem;font-size: 16px;letter-spacing:1px;">';
echo '<button class="btn waves-effect waves-light" type="bt_relatorio" name="relatorio" id="bt_relatorio" >gerar PDF
    	<i class="material-icons right">send</i>
  	</button>';
echo '</div>';

echo '</form>';
echo '<div style="margin: 0 auto;width:80%;line-height: 1.5rem;font-size: 16px;letter-spacing:1px;">';

echo '<br>';
echo '<button class="btn waves-effect waves-light" type="bt_fechar" name="bt_fechar" id="bt_fechar" onClick="history.go(-2)">voltar
    	<i class="material-icons left">arrow_back</i>
  	</button>';
inclui_rodape_clean();

//----------------------------
function exibe_acoes(&$a_notas)
{
	foreach ($_POST as $key => $value)
	{
		if( substr($key,0,2)=="ea")
		{
			$nome_item = substr($key,3,strlen($key)-3);

			echo '<div>';
			
			echo '<div class="row" >';
			echo '<div class="col s12" style="background: #103877;font-size: 21px;color:white;height: 50px;vertical-align:middle;line-height:50px;text-align:center">'. $nome_item.'</div>' ;

			echo '<div class="col s6" style="border-style: solid;border-width:thin;background: #1e88e5;font-size: 18px;color:white;">Fatores que me levaram a dar nota '.$value.'</div>';

			echo '<div class="col s6" style="border-style: solid;border-width:thin;background: #1e88e5;font-size: 18px;color:white;">Ações para ir em direção à nota '.$_POST['ed_'.$nome_item].'</div>';
			echo '</div>';


			echo '<div class="row">';
			echo '<div class="input-field col s6">';
			echo '<input style="margin:0 0 0 0;font-size: 14px;" type="text" maxlength="60" size="60" name="fato' . $nome_item. '_1" id="' . $nome_item . '_1"   >'; 
			echo '</div>';

			echo '<div class="input-field col s6">';
			echo '<input style="margin:0 0 0 0;font-size: 14px;" type="text" maxlength="60" size="60" name="acao' . $nome_item. '_1" id="' . $nome_item . '_1"   >'; 
			echo '</div>';

			echo '</div>';



			echo '<div class="row">';
			echo '<div class="input-field col s6">';
	        echo '<p><input style="margin:0 0 0 0;font-size: 14px;" type="text" maxlength="60" size="60" name="fato' . $nome_item. '_2" id="' . $nome_item. '_2"   ></p>';
	        echo '</div>';
			
	        echo '<div class="input-field col s6">';
	        echo '<p><input style="margin:0 0 0 0;font-size: 14px;" type="text" maxlength="60" size="60" name="acao' . $nome_item. '_2" id="' . $nome_item. '_2"   ></p>';
	        echo '</div>';

			echo '</div>';


	   		echo '<div class="row">';
			echo '<div class="input-field col s6">';
			echo '<p><input style="margin:0 0 0 0;font-size: 14px;" type="text" maxlength="60" size="60" name="fato' . $nome_item. '_3" id="' . $nome_item . '_3"   ></p>';
			echo '</div>';
			
			echo '<div class="input-field col s6">';
			echo '<p><input style="margin:0 0 0 0;font-size: 14px;" type="text" maxlength="60" size="60" name="acao' . $nome_item. '_3" id="' . $nome_item . '_3"   ></p>';
			echo '</div>';

			echo '</div>';

			echo '</div>';
	   		echo '<br><br>';

	   		$a_notas[$nome_item] = array($value,$_POST['ed_'.$nome_item]);
	   		
	    }	
	}
}




//------------------------------------------------------------------------------------------------------------
function monta_disco_avaliacao($a_itens_avaliados,$n_largura_imagem,$n_altura_imagem,&$arquivo_imagem,$titulo)
{

	$imagem = imagecreatetruecolor( $n_largura_imagem , $n_altura_imagem);
	
	$n_raio = $n_altura_imagem * 0.80 ;
	$n_posicao_x = $n_largura_imagem / 2;
	$n_posicao_y = $n_altura_imagem / 2;
	$n_elementos = count($a_itens_avaliados);
	$n_graus = 360/$n_elementos;

    // define a paleta de cores
	$vermelho 	= imagecolorallocate( $imagem, 255, 0, 0 );
    $verde    	= imagecolorallocate( $imagem, 0, 255, 0 );
    $azul     	= imagecolorallocate( $imagem, 0, 0, 255 );
    $preto    	= imagecolorallocate( $imagem, 0, 0, 0 );
    $branco   	= imagecolorallocate( $imagem, 255, 255, 255 );
    $amarelo  	= imagecolorallocate( $imagem, 255, 255, 0);
    $vermelho2  = imagecolorallocate( $imagem, 255, 77, 77);
    $azul2  	= imagecolorallocate( $imagem, 148, 77, 255);
    $amarelo2  	= imagecolorallocate( $imagem, 255, 255, 77);
    $verde2		= imagecolorallocate( $imagem, 7, 255, 77);
    $laranja	= imagecolorallocate( $imagem, 255, 194, 102);
    $laranja2	= imagecolorallocate( $imagem, 204, 102, 0);
    $rosa		= imagecolorallocate( $imagem, 255, 153, 255);
    $verde3		= imagecolorallocate( $imagem, 0, 51, 0);
    $azul3		= imagecolorallocate( $imagem, 0, 0, 102);	
    $a_cores = array($vermelho ,$verde,$laranja,$azul,$amarelo,$vermelho2,$verde2,$laranja2,$azul2,$amarelo2,$rosa,$verde3,$azul3,$preto,$branco);

    $n_posicao_linha = $n_posicao_y;
    
    $n_tamanho_arcos=$n_raio/10;

	//desenha o quadrado branco   
    imagefill( $imagem, 0, 0, $branco );
	
   
    // escreve os itens
	for($i=1;$i<=$n_elementos;$i++)
	{
	
		if(strlen($a_itens_avaliados[$i][0])>16)
		{
			$txt_item = substr($a_itens_avaliados[$i][0],0,16);
		}else
		{
			$txt_item = $a_itens_avaliados[$i][0];
		}

		Vector($imagem,$n_posicao_x, $n_posicao_y,($n_graus*$i)-($n_graus/2)+strlen($txt_item),$n_raio/2,$preto,$endx,$endy,"N",$n_tamanho_arcos);
		//$angulo_txt = ($n_graus*$i)-($n_graus*2);
		$angulo_txt = ($n_graus*$i)-(180-(180-$n_graus)/2);
		
		imagettftext( $imagem, 10 , $angulo_txt, $endx,$endy , $preto , "Raleway-Regular.ttf" , $txt_item );
	}


	// pinta as fatias. a quantidade de anéis corresponde à nota dada
    $n_grau_inicio = $n_graus*-1;
    $n_grau_final = 0; 
	for($i=1;$i<=$n_elementos;$i++)
	{
		pinta_fatia($imagem,$n_posicao_x,$n_posicao_y,($n_tamanho_arcos*$a_itens_avaliados[$i][1]),$a_cores[$i],$n_grau_inicio,$n_grau_final);
		$n_grau_inicio = $n_grau_inicio -$n_graus;
    	$n_grau_final = $n_grau_final - $n_graus; 
	}


 	// desenha os anéis do disco
    $n_raio_tmp = $n_raio;
	for($i=1;$i<=10;$i++)
	{
		imageellipse( $imagem, $n_posicao_x, $n_posicao_y, $n_raio_tmp, $n_raio_tmp, $preto );
		$n_raio_tmp= ($n_tamanho_arcos*$i);
	}

	// desenha os vetores / linhas
	for($i=1;$i<=$n_elementos;$i++)
	{
		Vector($imagem,$n_posicao_x, $n_posicao_y,$n_graus*$i,$n_raio/2,$preto,$endx,$endy,"S",$n_tamanho_arcos);
	}

	// imprime o título do disco
	imagettftext( $imagem, 18 , 0, 180,20, $preto , "Raleway-Regular.ttf" , $titulo );

	// testa se o arquivo já existe. Se sim, altera o nome até gerar um nome que não exista.
	$arquivo = "./temp/".$arquivo_imagem.".png";
	$i=1;
	while (file_exists($arquivo)):
		$arquivo = "./temp/".$arquivo_imagem."_".$i.".png";
		$i++;
    endwhile;
	
	$arquivo_imagem=$arquivo;
	
	imagepng($imagem,$arquivo_imagem);
	
}

//------------------------------------------------------------------------------------------------------
function Vector($palette,$startx,$starty,$angle,$length,$colour,&$endx,&$endy,$imprime,$n_tamanho_arcos)
{
   if($imprime=="S")
   {
    $angle = deg2rad($angle);
    $endx = $startx+cos($angle)*$length;
    $endy = $starty-sin($angle)*$length;
     
    return(imageline($palette,$startx,$starty,$endx,$endy,$colour));
   }else
   {
   	$length=$length+($n_tamanho_arcos/4);
    $angle = deg2rad($angle);
    $endx = $startx+cos($angle)*$length;
    $endy = $starty-sin($angle)*$length;
    }
}


//---------------------------------------------------------------------
function pinta_fatia($imagem,$startx,$starty,$length,$cor,$inicio,$fim)
{
	imagefilledarc($imagem, $startx, $starty, $length, $length, $inicio, $fim , $cor, IMG_ARC_PIE);
}



?> 
