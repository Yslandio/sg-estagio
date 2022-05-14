<?php

// função que contém os feriados nacionais e regionais de Petrolina
function feriados($ano) {
  $dia = 86400;
  $datas = array();
  $datas['pascoa'] = easter_date($ano);
  $datas['sexta_santa'] = $datas['pascoa'] - (2 * $dia);
  $datas['carnaval'] = $datas['pascoa'] - (47 * $dia);
  $datas['corpus_cristi'] = $datas['pascoa'] + (60 * $dia);
  $feriados = array (
      '01/01/'.$ano,
      '02/02/'.$ano, // Navegantes
      date('d/m',$datas['carnaval']).'/'.$ano,
      date('d/m',$datas['sexta_santa']).'/'.$ano,
      date('d/m',$datas['pascoa']).'/'.$ano,
      '21/04/'.$ano,
      '01/05/'.$ano,
      date('d/m',$datas['corpus_cristi']).'/'.$ano,
      '20/09/'.$ano, // Revolução Farroupilha \m/
      '12/10/'.$ano,
      '02/11/'.$ano,
      '15/11/'.$ano,
      '25/12/'.$ano,

      // Adicionar feriados regionais
      '06/03/'.$ano, // Data Magna do Estado de Pernambuco
      '24/06/'.$ano, // Feriado Municipal São João
      '15/08/'.$ano, // Nossa Senhora Rainha dos Anjos
      '07/09/'.$ano, // Independência do Brasil
      '21/09/'.$ano, // Emancipação Política do Município de Petrolina
      '28/10/'.$ano, // Servidor Público – Feriado apenas para o funcionalismo público do Município de Petrolina
  );
  
  return $feriados;
}

// função que permite montar o calendário
function montar_calendario($mes, $ano) {
  // um vetor para guardar os meses
  $meses = array(1 => 'Janeiro', 2 => 'Fevereiro', 
    3 => 'Março', 4 => 'Abril', 5 => 'Maio', 
    6 => 'Junho', 7 => 'Julho', 8 => 'Agosto', 
    9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro',
    12 => 'Dezembro');
  
  // um vetor com os dias da semana
  $dias_semana = array('Dom', 'Seg', 'Ter', 'Qua',
    'Qui', 'Sex', 'Sáb');
  
  // vamos obter o primeiro dia do calendário
  $primeiro_dia = mktime(0, 0, 0, $mes, 1, $ano);
  // obtém a quantidade de dias no mês  
  $dias_mes = date('t', $primeiro_dia);  
  // dia da semana que o calendário inicia (começa em 0)
  $dia_inicio = date('w', $primeiro_dia);
  
  $class = 'border boreder-1';

  // cria a tabela HTML para o calendário
  echo '<table class="col-3 m-2 '.$class.'">
    <tr><th colspan="7" class="text-center">'. $meses[$mes] . ' - ' . 
      $ano . '</th>
    </tr>
    <tr><td class="'.$class.'" align="center">';
      echo implode('</td><td class="'.$class.'" align="center">', $dias_semana);
  echo '</td></tr>';
  
  // precisamos de células vazias até encontrarmos
  // o dia inicial da semana
  if($dia_inicio > 0){ 
    for($i = 0; $i < $dia_inicio; $i++){ 
      echo '<td class="'.$class.'">&nbsp;</td>';
    }
  }
  
  $date_start_stage = implode('-', array_reverse(explode('/', $_GET['date_start_stage']))); // Data do início do estágio em formato americano
  $date_end_stage = implode('-', array_reverse(explode('/', $_SESSION['date_end_stage']))); // Data do término do estágio em formato americano

  // agora já podemos começar a preencher o
  // calendário
  for($dia = 1; $dia <= $dias_mes; $dia++ ){
    if($dia_inicio == 0){
      // vamos colorir a fonte do domingo de vermelho
      $estilo = 'color: red; font-weight: bold;';
    } elseif($dia_inicio == 6) {
      // vamos colorir o fundo do sábado de azul
      $estilo = 'color: blue;';
    } else {
      $estilo = '';
    }

    $date_foreach = implode('-', array_reverse(explode('/', $dia.'/'.$mes.'/'.$ano))); // Data do for em formato americano // Conserta o problema do ano 1970 

    // vamos colorir o fundo dos dias de estágio de laranja
    if(strtotime($date_start_stage) <= strtotime($date_foreach) && strtotime($date_foreach) <= strtotime($date_end_stage)){
      if($dia_inicio != 0 && $dia_inicio != 6 && in_array($dia_inicio, $_SESSION['dias_estagio'])){
        $estilo = 'background-color: orange;';
      }
    }

    $date_foreach = date("d/m/Y", strtotime($date_foreach)); // Data em formato brasileiro

    // vamos colorir o dia do término do semestre
    if(date('d/m/Y', strtotime($_GET['date_end_semester'])) == $date_foreach){
      $estilo = 'background-color: yellow;';
    }

    // vamos colocar a data de hoje em negrito
    if(($dia == date("j")) && ($mes == date("n")) && ($ano == date("Y"))){
      if(in_array($date_foreach, feriados($ano))){
        echo '<td class="'.$class.' bg-danger text-black fw-bold" style="'.$estilo.'" align="center"><b>'.$dia.'</b></td>'; // Dia atual e feriado
      }else{
        echo '<td class="'.$class.' text-black fw-bold" style="'.$estilo.'" align="center"><b>'.$dia.'</b></td>'; // Dia atual
      }
    }else{
      if(in_array($date_foreach, feriados($ano))){
        echo '<td class="'.$class.' bg-danger text-white" style="'.$estilo.'" align="center">'.$dia.'</td>'; // Dia diferente de hoje e feriado
      }else{
        echo '<td class="'.$class.'" style="'.$estilo.'" align="center">'.$dia.'</td>'; // Dia diferente de hoje
      }
    }
    
    // vamos incrementar o dia de referência 
    $dia_inicio++;
    
    // já precisamos adicionar uma nova linha na tabela?
    if($dia_inicio == 7){
      $dia_inicio = 0;
      echo "</tr>";

      if($dia < $dias_mes){
        echo '<tr>';
      }
    }
  } // fim do laço for
  
  // agora preenchemos as células restantes
  if($dia_inicio > 0){
    for($i = $dia_inicio; $i < 7; $i++){
      echo '<td class="border boreder-1">&nbsp;</td>';
    }
  
    echo '</tr>';
  }

  echo '</table>';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row pb-3">
            <div class="col-12">
                <h3 class="title text-center my-2">CÁLCULO DE HORAS DE ESTÁGIO</h3>
            </div>
            <form class="col-12 d-flex justify-content-center align-items-end flex-wrap" action="#" method="get">
                <div class="col-12 m-2">
                    <div class="d-flex flex-wrap justify-content-around">
                        <div class="box-day d-flex flex-column border border-2 p-2 m-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="monday" name="monday" value="1" <?= isset($_GET['monday']) ? 'checked' : '' ?> onClick="mondayCheckBox();">
                                <label class="form-check-label" for="monday">Segunda</label>
                            </div>
                            <div>
                                <label class="form-label">Horas:</label>
                                <input class="form-control" id="hoursMonday" type="number" name="hoursMonday" min="0" value="<?= $_GET['hoursMonday'] ?? '' ?>" disabled required>
                            </div>
                            <div>
                                <label class="form-label">Minutos:</label>
                                <input class="form-control" id="minutesMonday" type="number" name="minutesMonday" min="0" max="59" value="<?= $_GET['minutesMonday'] ?? '' ?>" disabled required>
                            </div>
                        </div>
                        <div class="box-day d-flex flex-column border border-2 p-2 m-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="tuesday" name="tuesday" value="2" <?= isset($_GET['tuesday']) ? 'checked' : '' ?> onClick="tuesdayCheckBox();">
                                <label class="form-check-label" for="tuesday">Terça</label>
                            </div>
                            <div>
                                <label class="form-label">Horas:</label>
                                <input class="form-control" id="hoursTuesday" type="number" name="hoursTuesday" min="0" value="<?= $_GET['hoursTuesday'] ?? '' ?>" disabled required>
                            </div>
                            <div>
                                <label class="form-label">Minutos:</label>
                                <input class="form-control" id="minutesTuesday" type="number" name="minutesTuesday" min="0" max="59" value="<?= $_GET['minutesTuesday'] ?? '' ?>" disabled required>
                            </div>
                        </div>
                        <div class="box-day d-flex flex-column border border-2 p-2 m-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wednesday" name="wednesday" value="3" <?= isset($_GET['wednesday']) ? 'checked' : '' ?> onClick="wednesdayCheckBox();">
                                <label class="form-check-label" for="wednesday">Quarta</label>
                            </div>
                            <div>
                                <label class="form-label">Horas:</label>
                                <input class="form-control" id="hoursWednesday" type="number" name="hoursWednesday" min="0" value="<?= $_GET['hoursWednesday'] ?? '' ?>" disabled required>
                            </div>
                            <div>
                                <label class="form-label">Minutos:</label>
                                <input class="form-control" id="minutesWednesday" type="number" name="minutesWednesday" min="0" max="59" value="<?= $_GET['minutesWednesday'] ?? '' ?>" disabled required>
                            </div>
                        </div>
                        <div class="box-day d-flex flex-column border border-2 p-2 m-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="thursday" name="thursday" value="4" <?= isset($_GET['thursday']) ? 'checked' : '' ?> onClick="thursdayCheckBox();">
                                <label class="form-check-label" for="thursday">Quinta</label>
                            </div>
                            <div>
                                <label class="form-label">Horas:</label>
                                <input class="form-control" id="hoursThursday" type="number" name="hoursThursday" min="0" value="<?= $_GET['hoursThursday'] ?? '' ?>" disabled required>
                            </div>
                            <div>
                                <label class="form-label">Minutos:</label>
                                <input class="form-control" id="minutesThursday" type="number" name="minutesThursday" min="0" max="59" value="<?= $_GET['minutesThursday'] ?? '' ?>" disabled required>
                            </div>
                        </div>
                        <div class="box-day d-flex flex-column border border-2 p-2 m-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="friday" name="friday" value="5" <?= isset($_GET['friday']) ? 'checked' : '' ?> onClick="fridayCheckBox();">
                                <label class="form-check-label" for="friday">Sexta</label>
                            </div>
                            <div>
                                <label class="form-label">Horas:</label>
                                <input class="form-control" id="hoursFriday" type="number" name="hoursFriday" min="0" value="<?= $_GET['hoursFriday'] ?? '' ?>" disabled required>
                            </div>
                            <div>
                                <label class="form-label">Minutos:</label>
                                <input class="form-control" id="minutesFriday" type="number" name="minutesFriday" min="0" max="59" value="<?= $_GET['minutesFriday'] ?? '' ?>" disabled required>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="col-12 d-flex flex-wrap justify-content-center align-items-end">
                    <div class="m-2">
                        <label class="form-label">Início do estágio:</label>
                        <input class="form-control w-auto" type="date" name="date_start_stage" value="<?= $_GET['date_start_stage'] ?? '' ?>">
                    </div>
                    <div class="m-2">
                        <label class="form-label">Fim do semestre:</label>
                        <input class="form-control w-auto" type="date" name="date_end_semester" value="<?= $_GET['date_end_semester'] ?? '' ?>">
                    </div>
                    <div class="m-2">
                        <label class="form-label">Horas de estágio do curso:</label>
                        <input class="form-control w-auto" type="number" name="hours_stage_course" min="0" value="<?= $_GET['hours_stage_course'] ?? '' ?>">
                    </div>
                    <div class="my-2">
                        <button class="btn btn-success" type="submit" name="submit">Calcular</button>
                    </div>
                </div>
            </form>

            <?php
            // include('calendario.php');

            if (isset($_GET['submit']) && !empty($_GET['hours_stage_course']) && !empty($_GET['date_start_stage']) && !empty($_GET['date_end_semester'])) {
                if (strtotime($_GET['date_start_stage']) < strtotime($_GET['date_end_semester'])) {
                    if (!empty($_GET['monday']) || !empty($_GET['tuesday']) || !empty($_GET['wednesday']) || !empty($_GET['thursday']) || !empty($_GET['friday'])) {
                        $hoursStageCourse = $_GET['hours_stage_course'];

                        $monday = $_GET['monday'] ?? false;
                        $hoursMonday = $_GET['hoursMonday'] ?? false;
                        $minutesMonday = $_GET['minutesMonday'] ?? false;
                        
                        $tuesday = $_GET['tuesday'] ?? false;
                        $hoursTuesday = $_GET['hoursTuesday'] ?? false;
                        $minutesTuesday = $_GET['minutesTuesday'] ?? false;

                        $wednesday = $_GET['wednesday'] ?? false;
                        $hoursWednesday = $_GET['hoursWednesday'] ?? false;
                        $minutesWednesday = $_GET['minutesWednesday'] ?? false;

                        $thursday = $_GET['thursday'] ?? false;
                        $hoursThursday = $_GET['hoursThursday'] ?? false;
                        $minutesThursday = $_GET['minutesThursday'] ?? false;

                        $friday = $_GET['friday'] ?? false;
                        $hoursFriday = $_GET['hoursFriday'] ?? false;
                        $minutesFriday = $_GET['minutesFriday'] ?? false;

                        $days = array($monday, $tuesday, $wednesday, $thursday, $friday);

                        $hoursWeek = 0;
                        $minutesWeek = 0;

                        $hoursMonday ? $hoursWeek += $hoursMonday : $hoursMonday = 0;
                        $minutesMonday ? $minutesWeek += $minutesMonday : $minutesMonday = 0;

                        $hoursTuesday ? $hoursWeek += $hoursTuesday : $hoursTuesday = 0; 
                        $minutesTuesday ? $minutesWeek += $minutesTuesday : $minutesTuesday = 0; 

                        $hoursWednesday ? $hoursWeek += $hoursWednesday : $hoursWednesday = 0; 
                        $minutesWednesday ? $minutesWeek += $minutesWednesday : $minutesWednesday  = 0; 

                        $hoursThursday ? $hoursWeek += $hoursThursday : $hoursThursday = 0; 
                        $minutesThursday ? $minutesWeek += $minutesThursday : $minutesThursday = 0; 

                        $hoursFriday ? $hoursWeek += $hoursFriday : $hoursFriday = 0; 
                        $minutesFriday ? $minutesWeek += $minutesFriday : $minutesFriday  = 0; 
                        
                        while($minutesWeek >= 60) {
                            $minutesWeek -= 60;
                            $hoursWeek++;
                        }

                        $hoursWeek += $minutesWeek * 0.01;

                        $dateStartStage = date("d/m/Y", strtotime($_GET['date_start_stage']));
                        $dateEndSemester = date("d/m/Y", strtotime($_GET['date_end_semester']));

                        $hoursStage = 0;
                        $minutesStage = 0;

                        $dateEndStage = '';

                        if ($hoursWeek != 0 || $minutesWeek != 0) {
                            $start = new \DateTime($_GET['date_start_stage']);
                            $end = new \DateTime($_GET['date_end_semester']);
                            $end->modify('+1 day');

                            $total_days = $end->diff($start)->days;
                            $period = new \DatePeriod($start, new \DateInterval('P1D'), $end);

                            foreach($period as $dt) {
                                if (!in_array($dt->format('d/m/Y'), feriados($dt->format('Y'))) && in_array($dt->format('N'), $days)) {
                                    switch($dt->format('N')) {
                                        case 1:
                                            if ($monday) {
                                                $hoursStage += $hoursMonday;
                                                $minutesStage += $minutesMonday;
                                            }
                                            break;
                                        case 2:
                                            if ($tuesday) {
                                                $hoursStage += $hoursTuesday;
                                                $minutesStage += $minutesTuesday;
                                            }
                                            break;
                                        case 3:
                                            if ($wednesday) {
                                                $hoursStage += $hoursWednesday;
                                                $minutesStage += $minutesWednesday;
                                            }
                                            break;
                                        case 4:
                                            if ($thursday) {
                                                $hoursStage += $hoursThursday;
                                                $minutesStage += $minutesThursday;
                                            }
                                            break;
                                        case 5:
                                            if ($friday) {
                                                $hoursStage += $hoursFriday;
                                                $minutesStage += $minutesFriday;
                                            }
                                            break;
                                    }

                                    $dateEndStage = $dt->format('d/m/Y');
                                    if ($hoursStage >= $hoursStageCourse) break;
                                }
                            }
                        } else {
                            echo '<div class="alert alert-danger text-center mb-0 mt-3">Informe as hora(s)/minutos do(s) dia(s) de estágio!</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger text-center mb-0 mt-3">Selecione um dia da semana!</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger text-center mb-0 mt-3">A data de início de estágio não pode ser depois da data de término de semestre!</div>';
                }
            } elseif (isset($_GET['submit'])) {
                echo '<div class="alert alert-danger text-center mb-0 mt-3">Preencha os campos obrigatórios!</div>';
            }
            ?>

            <hr class="my-4">

            <div class="col-12 d-flex flex-wrap justify-content-center">
                <div class="mx-2">
                    <label class="form-label">Horas semanais de estágio:</label>
                    <input class="form-control w-auto" type="text" name="dias" value="<?= $hoursWeek ?? ''; ?>" disabled>
                </div>
                <div class="mx-2">
                    <label class="form-label">Horas do estágio (<?= $hoursStageCourse ?? '' ;?>):</label>
                    <input class="form-control w-auto" type="text" name="dias" value="<?= $hoursStage ?? ''; ?>" disabled>
                </div>
                <div class="mx-2">
                    <label class="form-label">Horas do estágio x 2 (<?= isset($hoursStageCourse) ? $hoursStageCourse * 2 : ''; ?>):</label>
                    <input class="form-control w-auto" type="text" name="dias" value="<?= isset($hoursStage) ? $hoursStage * 2 : ''; ?>" disabled>
                </div>
                <div class="mx-2">
                    <label class="form-label">Data final do estágio:</label>
                    <input class="form-control w-auto" type="text" name="dias" value="<?= $dateEndStage ?? ''; ?>" disabled>
                </div>
            </div>
        </div>

        <hr class="my-4">

        <div class="row">
            <?php
            // vamos montar o calendário
            if (isset($dateStartStage) && isset($dateEndSemester)) {
                $yearStartStage = date("Y", strtotime(implode('-', array_reverse(explode('/', $dateStartStage)))));
                $yearEndSemester = date("Y", strtotime(implode('-', array_reverse(explode('/', $dateEndSemester)))));

                if ($yearStartStage == $yearEndSemester) {
                    $anos = [$yearStartStage];
                }else {
                    for ($ano = $yearStartStage; $ano <= $yearEndSemester; $ano++) { 
                        $anos[] = $ano;
                    }
                }

                $_SESSION['dias_estagio'] = $days;
                $_SESSION['date_end_stage'] = $dateEndStage;

                foreach ($anos as $key => $ano) {
                    echo '<div class="d-flex flex-wrap justify-content-around bg-light border border-1 my-4">';
                    echo '<h3 class="col-12 text-center my-4">CALENDÁRIO DE '. $ano .'</h3>';
                    for ($mes = 1; $mes <= 12; $mes++) { 
                        montar_calendario($mes, $ano);
                    }
                    echo '</div>';
                }
            }
            ?>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
