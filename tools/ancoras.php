<?php

include_once('../common/layout_html.php');

inclui_cabecalho_clean();

inclui_principal_ancoras();

inclui_rodape_clean();



//----------------------------------------
function inclui_principal_ancoras()
{


echo '<div class="container" style="margin: 0 auto;line-height: 1.5rem;font-size: 0.90em;letter-spacing:1px;">';

inclui_titulo("Âncoras de Carreira","Uma ferramenta para ajudá-lo a entender melhor as suas escolhas de carreira.");

echo '<a class="waves-effect waves-light btn teal lighten-2 white-text" href="./ancoras/teste_ancora.php"><i class="material-icons right">mode_edit</i>fazer o teste</a>';

echo '<br><br>';

linha('Âncoras de Carreira é o conjunto de habilidades, valores e necessidades que mais valorizamos quando fazemos escolhas para a nossa carreira.');

linha('Podemos considerá-las como pilares que sustentam nossas decisões sobre nossa carreira.');

linha('A teoria foi criada na década de 70 por Edgar Schein, Ph. D. em Psicologia Social na Harvard e ex-professor na escola de negócios do MIT (Sloan School Of Management).');


linha('Ele identificou 8 categorias de âncoras de carreira:');

echo '<ul class="collapsible popout" data-collapsible="accordion">';


// início Competência Técnica ou Funcional
echo '<li>';
echo '<div class="collapsible-header"><i class="material-icons">expand_more</i>Competência Técnica ou Funcional</div><div class="collapsible-body">';

linha('As pessoas que valorizam essa âncora constroem suas carreiras para tornarem-se especialistas.');

linha('Elas buscam oportunidades onde possam:');
linha('- desenvolver suas habilidades.');
linha('- aplicar suas habilidades.');
linha('- atuar em trabalhos desafiadores para testar suas habilidades e conhecimentos.');

linha('Pessoas com essa âncora geralmente:');
linha('- empenham-se para tornar-se um "expert" (numa área, assunto, técnica).');
linha('- aceitam cargos de gestão/gerência apenas dentro da sua área de especialização.');

linha('As áreas ideais são as técnicas ou funcionais.');
echo '</div>';
echo '</li>';

// final Competência Técnica ou Funcional

// início Competência para Gerência Geral

echo '<li>';
echo '<div class="collapsible-header"><i class="material-icons">expand_more</i>Competência para Gerência Geral</div><div class="collapsible-body">';

linha('As pessoas que valorizam essa âncora ambicionam chegar ao topo da hierarquia.');

linha('Elas buscam oportunidades onde possam:');
linha('- coordenar e integrar recursos e os esforços de outras pessoas.');
linha('- responder pelo resultado de determinada área da organização.');
linha('- desenvolver e exercer liderança.');

linha('Pessoas com essa âncora geralmente:');
linha('- constroem uma trajetória rumo ao topo da hierarquia.');
linha('- associam o sucesso do próprio trabalho com o sucesso organização.');
linha('- aceitam atuar em áreas técnicas/funcionais como experiência e aprendizado.');
linha('- consideram a especialização uma armadilha, mas reconhecem sua importância.');

linha('As áreas ideais são as consideradas estratégicas dentro da empresa, e isso varia de organização para organização.');

echo '</div>';
echo '</li>';

// final Competência para Gerência Geral

// início Autonomia/Independência
echo '<li>';
echo '<div class="collapsible-header"><i class="material-icons">expand_more</i>Autonomia/Independência</div><div class="collapsible-body">';

linha('As pessoas que valorizam essa âncora desejam trabalhar com independência e autonomia.');

linha('Elas buscam oportunidades onde possam:');
linha('- definir seu próprio trabalho em termos de quando e como fazer as atividades.');
linha('- atuar com independência.');
linha('- trabalhar com mais escolhas e poder de decisão.');

linha('Pessoas com essa âncora geralmente:');
linha('- possuem baixa tolerância à regras e restrições organizacionais.');
linha('- recusam promoções caso isso implique em perda de autonomia e flexibilidade.');
linha('- abrem seu próprio negócio ou trabalham como autônomo.');

linha('As áreas ideais são aquelas cujo estilo de liderança seja mais liberal. Outras opções são trabalhar como consultor ou<i> </i>autônomo, ou ter se próprio negócio.');

echo '</div>';
echo '</li>';

// final Autonomia/Independência

// início Segurança e Estabilidade
echo '<li>';
echo '<div class="collapsible-header"><i class="material-icons">expand_more</i>Segurança e Estabilidade</div><div class="collapsible-body">';
linha('As pessoas que valorizam essa âncora buscam estabilidade no emprego e segurança financeira.');

linha('Elas buscam oportunidades onde possam:');
linha('- trabalhar com segurança e tranquilidade em relação ao seu emprego.');
linha('- atuar em ambientes previsíveis e estáveis.');
linha('- ter segurança financeira.');

linha('Pessoas com essa âncora geralmente:');
linha('- valorizam mais a estabilidade no emprego do que o tipo do trabalho e promoções.');
linha('- preferem empresas que evitam dispensas em massa e que tenham bons planos de aposentadoria e uma boa reputação.');
linha('- empenham-se para sentir-se bem sucedidas no seu trabalho.');

linha('As áreas ideais são aquelas menos sujeitas a comoditização e automação.');
echo '</div>';
echo '</li>';

// final Segurança e Estabilidade

// início Criatividade Empreendedora

echo '<li>';
echo '<div class="collapsible-header"><i class="material-icons">expand_more</i>Criatividade Empreendedora</div><div class="collapsible-body">';

linha('As pessoas que valorizam essa âncora possuem o ímpeto para criar de novos empreendimentos.');

linha('Elas buscam oportunidades onde possam:');
linha('- criar seu próprio negócio ou empreendimento.');
linha('- assumir riscos e superar obstáculos.');
linha('- provar sua capacidade em criar um empreendimento com seu próprio esforço.');

linha('Pessoas com essa âncora geralmente:');
linha('- podem trabalhar para outros, enquanto aprendem e avaliam oportunidades futuras.');
linha('- a motivação é para à criar novos negócios, e não está necessariamente relacionada à criatividade ');

linha('As áreas ideais são desenvolvimento de produtos, novos negócios.');

echo '</div>';
echo '</li>';

// final Criatividade Empreendedora

// início Serviço / Dedicação a uma causa
echo '<li>';
echo '<div class="collapsible-header"><i class="material-icons">expand_more</i>Serviço / Dedicação a uma causa</div><div class="collapsible-body">';

linha('As pessoas que valorizam essa âncora querem contribuir para causas alinhadas com seus valores.');

linha('Elas buscam oportunidades onde possam:');
linha('- realizar algum trabalho que considerem útil para as pessoas e para o mundo.');
linha('- contribuir para um mundo melhor por meio de seu trabalho.');
linha('- sentir que faz parte de uma causa alinhada com seus valores.');

linha('Pessoas com essa âncora geralmente:');
linha('- recusam promoções ou mudanças caso isso implique em desviar-se de um trabalho que a preencha.');

linha('As áreas ideais são instituições do 3o setor, áreas corporativas voltadas para o voluntariado / social.');

echo '</div>';
echo '</li>';

// final Serviço / Dedicação a uma causa


// início Puro desafio
echo '<li>';
echo '<div class="collapsible-header"><i class="material-icons">expand_more</i>Puro desafio</div><div class="collapsible-body">';

linha('As pessoas que valorizam essa âncora buscam superar desafios cada vez maiores.');

linha('Elas buscam oportunidades onde possam:');
linha('- trabalhar na solução de problemas aparentemente insolúveis.');
linha('- vencer oponentes duros ou superar obstáculos difíceis.');
linha('- superar obstáculos considerados impossíveis.');

linha('Pessoas com essa âncora geralmente:');
linha('- necessitam sentir que podem conquistar qualquer coisa (principalmente as consideradas difíceis, impossíveis e insolúveis).');
linha('- buscam constantemente pela novidade, variedade e dificuldade.');

linha('As áreas ideais são aquelas que oferecem um ambiente favorável à busca por soluções.');

echo '</div>';
echo '</li>';
// final Puro desafio


// início Estilo de vida
echo '<li>';
echo '<div class="collapsible-header"><i class="material-icons">expand_more</i>Estilo de vida</div><div class="collapsible-body">';

linha('As pessoas que valorizam essa âncora vivem um estilo de vida que integra todas as áreas da sua vida.');

linha('Elas buscam oportunidades onde possam:');
linha('- trabalhar com flexibilidade de horário, local, benefícios, etc.');
linha('- integrar seu trabalho e carreira ao seu estilo de vida (necessidades pessoais e familiares).');
linha('- integrar todos os segmentos da sua vida num todo harmonioso.');

linha('Pessoas com essa âncora geralmente:');
linha('- contemplam todas as áreas da sua vida na definição de sucesso.');
linha('- definem sua identidade pelo seu modo de vida como um todo, e não ao seu trabalho ou organização. ');
linha('- abrem mão de promoções caso envolva alguma desestruturação da situação de vida (uma mudança geográfica, por exemplo).');
linha('- valorizam a carreira, mas não como uma prioridade máxima na sua vida, e sim, como parte de um todo integrado.');

linha('As áreas ideais são aquelas que oferecem flexibilidade quanto à horários, local de trabalho e benefícios.');

echo '</div>';
echo '</li>';
// final Estilo de vida


echo '</ul>';

linha('Até certo ponto, todas as pessoas valorizam cada uma dessas questões, mas não com o mesma importância.');
linha('A âncora de carreira de uma pessoa indica uma área da qual ela não abriria mão, a não ser que condições externas e fora do seu controle a impeçam de escolher.');


echo '<br>';
echo '<p class="western"><span style="font-family: Arial,sans-serif;"><em>Fonte: SCHEIN, Edgar. Identidade profissional. São Paulo: Nobel, 1996 e KPGM</em></span></p>';


linha('Caso tenha alguma dúvida sobre a utilização ou sobre as possibilidades que a ferramenta oferece, envie um e-mail para <a style="color: blue;" href="mailto:contato@sidneileitao.com.br">contato@sidneileitao.com.br.</a>');

linha('<a class="waves-effect waves-light btn teal lighten-2 white-text" href="./ancoras/teste_ancora.php"><i class="material-icons right">mode_edit</i>fazer o teste</a>');

echo '</div>';

}

?>