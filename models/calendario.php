<?php

// função que contém os feriados nacionais e regionais de Petrolina
// function getHolidays($ano = null) {
//   if(!$ano) $ano = date('Y');

//   $dia = 86400;
//   $datas = array();
//   $datas['pascoa'] = easter_date($ano);
//   $datas['sexta_santa'] = $datas['pascoa'] - (2 * $dia);
//   $datas['carnaval'] = $datas['pascoa'] - (47 * $dia);
//   $datas['corpus_cristi'] = $datas['pascoa'] + (60 * $dia);
//   $feriados = array(
//     '01/01/' . $ano, // Reveillon
//     '02/02/' . $ano, // Navegantes
//     date('d/m', $datas['carnaval']) . '/' . $ano,
//     date('d/m', $datas['sexta_santa']) . '/' . $ano,
//     date('d/m', $datas['pascoa']) . '/' . $ano,
//     '21/04/' . $ano,
//     '01/05/' . $ano,
//     date('d/m', $datas['corpus_cristi']) . '/' . $ano,
//     // '20/09/'.$ano, // Revolução Farroupilha
//     '12/10/' . $ano, // Nossa Senhora Aparecida
//     '02/11/' . $ano, // Finados
//     '15/11/' . $ano, // Proclamação da República
//     '25/12/' . $ano, // Natal
//     '28/10/' . $ano, // Servidor Público – Feriado apenas para o funcionalismo público do Município de Petrolina

//     // Adicionar feriados regionais
//     '06/03/' . $ano, // Data Magna do Estado de Pernambuco
//     '24/06/' . $ano, // Feriado Municipal São João
//     '15/08/' . $ano, // Nossa Senhora Rainha dos Anjos
//     '07/09/' . $ano, // Independência do Brasil
//     '21/09/' . $ano, // Emancipação Política do Município de Petrolina
//   );

//   return $feriados;
// }

// função que permite montar o calendário
function montar_calendario($mes, $ano)
{
  // um vetor para guardar os meses
  $meses = array(
    1 => 'Janeiro', 2 => 'Fevereiro',
    3 => 'Março', 4 => 'Abril', 5 => 'Maio',
    6 => 'Junho', 7 => 'Julho', 8 => 'Agosto',
    9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro',
    12 => 'Dezembro'
  );

  // um vetor com os dias da semana
  $dias_semana = array(
    'Seg', 'Ter', 'Qua',
    'Qui', 'Sex', 'Sáb', 'Dom'
  );

  // vamos obter o primeiro dia do calendário
  $primeiro_dia = mktime(0, 0, 0, $mes, 1, $ano);
  // obtém a quantidade de dias no mês  
  $dias_mes = date('t', $primeiro_dia);
  // dia da semana que o calendário inicia (começa em 0)
  $dia_inicio = date('N', $primeiro_dia);

  $class = 'border boreder-1';

  // cria a tabela HTML para o calendário
  echo '<table class="col-3 m-2 ' . $class . '">
    <tr><th colspan="7" class="text-center">' . $meses[$mes] . ' - ' .
    $ano . '</th>
    </tr>
    <tr><td class="' . $class . '" align="center">';
  echo implode('</td><td class="' . $class . '" align="center">', $dias_semana);
  echo '</td></tr>';

  // precisamos de células vazias até encontrarmos
  // o dia inicial da semana
  if ($dia_inicio > 1) {
    for ($i = 1; $i < $dia_inicio; $i++) {
      echo '<td class="' . $class . '">&nbsp;</td>';
    }
  }

  if (isset($_GET['date_start_stage'])) $date_start_stage = implode('-', array_reverse(explode('/', $_GET['date_start_stage']))); // Data do início do estágio em formato americano
  if (isset($_SESSION['date_end_stage'])) $date_end_stage = implode('-', array_reverse(explode('/', $_SESSION['date_end_stage']))); // Data do término do estágio em formato americano
  
  // agora já podemos começar a preencher o
  // calendário
  $getHolidays = getHolidays($ano);
  for ($dia = 1; $dia <= $dias_mes; $dia++) {
    if ($dia_inicio == 7) {
      // vamos colorir a fonte do domingo de vermelho
      $estilo = 'color: red; font-weight: bold;';
    } elseif ($dia_inicio == 6) {
      // vamos colorir o fundo do sábado de azul
      $estilo = 'color: blue; font-weight: bold;';
    } else {
      $estilo = '';
    }

    $date_foreach = implode('-', array_reverse(explode('/', $dia . '/' . $mes . '/' . $ano))); // Data do for em formato americano // Conserta o problema do ano 1970 

    // vamos colorir o fundo dos dias de estágio de laranja
    if (isset($_GET['date_start_stage']) && isset($_SESSION['date_end_stage']) && 
      strtotime($date_start_stage) <= strtotime($date_foreach) && strtotime($date_foreach) <= strtotime($date_end_stage)) {
      if (in_array($dia_inicio, $_SESSION['dias_estagio'])) {
        $estilo = 'background-color: orange;';
      }
    }

    $date_foreach = date("d/m/Y", strtotime($date_foreach)); // Data em formato brasileiro

    // vamos colorir o dia do término do semestre
    if (isset($_GET['date_end_semester']) && date('d/m/Y', strtotime($_GET['date_end_semester'])) == $date_foreach) {
      $estilo = 'background-color: yellow;';
    }

    // vamos colocar a data de hoje em negrito
    if (($dia == date("j")) && ($mes == date("n")) && ($ano == date("Y"))) {
      if (in_array($date_foreach, $getHolidays)) {
        echo '<td class="' . $class . ' bg-danger text-black fw-bold" style="' . $estilo . '" align="center"><b>' . $dia . '</b></td>'; // Dia atual e feriado
      } else {
        echo '<td class="' . $class . ' text-black fw-bold" style="' . $estilo . '" align="center"><b>' . $dia . '</b></td>'; // Dia atual
      }
    } else {
      if (in_array($date_foreach, $getHolidays)) {
        echo '<td class="' . $class . ' bg-danger text-white" style="' . $estilo . '" align="center">' . $dia . '</td>'; // Dia diferente de hoje e feriado
      } else {
        echo '<td class="' . $class . '" style="' . $estilo . '" align="center">' . $dia . '</td>'; // Dia diferente de hoje
      }
    }

    // vamos incrementar o dia de referência 
    $dia_inicio++;

    // já precisamos adicionar uma nova linha na tabela?
    if ($dia_inicio > 7) {
      $dia_inicio = 1;
      echo "</tr>";

      if ($dia <= $dias_mes) {
        echo '<tr>';
      }
    }
  } // fim do laço for

  // agora preenchemos as células restantes
  if ($dia_inicio > 1) {
    for ($i = $dia_inicio; $i < 7; $i++) {
      echo '<td class="border boreder-1">&nbsp;</td>';
    }

    echo '</tr>';
  }

  echo '</table>';
}
