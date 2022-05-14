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

            <script src="script.js"></script>

            <?php
            include('calendario.php');

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
                if ($hoursWeek != 0 || $minutesWeek != 0) {
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
            }
            ?>
            </div>
        </div>
    </div>

    <!-- <script src="script.js"></script> -->
</body>
</html>
