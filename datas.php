<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SG-Estágio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <?php date_default_timezone_set('America/Sao_Paulo'); // Seta o fuso-horário de Brasília ?>
</head>

<body>
    <div class="container pb-3">
        <div class="col-12">
            <h3 class="title text-center my-2">CADASTRO DE FERIADOS / DATAS NÃO LETIVAS</h3>
        </div>

        <div class="d-flex justify-content-start p-0 my-3">
            <a class="btn btn-outline-secondary" href="index.php">Voltar</a>
        </div>

        <div class="my-2">
            <?php
            require('models/feriados.php');

            if (isset($_POST['cadastrar'])) {
                if (!empty($_POST['holidayDate'])) {
                    if (storeHoliday($_POST['description'], $_POST['holidayDate'])) {
                        $msg = 'Data cadastrada.';
                        include('components/msg_success.php');
                    } else {
                        $msg = 'A data já está cadastrada.';
                        include('components/msg_success.php');
                    }
                } else {
                    $msg = 'Selecione uma data a ser cadastrada.';
                    include('components/msg_success.php');
                }
            }

            if (isset($_POST['excluir'])) {
                if (!empty($_POST['id'])) {
                    destroyHoliday($_POST['id']);
                    $msg = 'Data excluída com sucesso.';
                    include('components/msg_success.php');
                } else {
                    $msg = 'Ocorreu um erro ao tentar excluir da data';
                    include('components/msg_success.php');
                }
            }
            ?>
        </div>

        <div class="d-flex flex-wrap justify-content-between mb-4">
            <!-- <div class="col-12 col-lg-6"> -->
                <form class="col-12 col-lg-6 d-flex flex-wrap gap-2 flex-column rounded border border-2 p-4 my-2" action="" method="post">
                    <div>
                        <label>Descrição:</label>
                        <textarea class="form-control" name="description" cols="10" rows="10" placeholder="Nome do feriado ou motivo para o dia não ser letivo."></textarea>
                    </div>
                    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-end">
                        <div>
                            <label>Data:</label>
                            <input class="form-control w-auto" type="date" name="holidayDate" required>
                        </div>
                        <button class="btn btn-outline-primary" type="submit" name="cadastrar">Cadastrar</button>
                    </div>
                </form>
            <!-- </div> -->

            <div class="col-12 col-lg-6 px-0 px-lg-4 my-2">
                <div class="overflow-auto" style="max-height: 400px;">
                    <table class="table table-light border border-2 shadow">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Descrição</th>
                                <th>Data</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach (allHolidays(isset($_GET['date']) ? $_GET['date'] : date('Y')) as $key => $holiday) {
                                ?>
                                <tr>
                                    <th><?= ($key + 1) ?></th>
                                    <td><?= !empty($holiday['description_date']) ? $holiday['description_date'] : '-' ?></td>
                                    <td><?= date('d/m/Y', strtotime($holiday['holidayDate'])) ?></td>
                                    <td>
                                        <form action='' method='post'>
                                            <input type='hidden' name='id' value='<?= $holiday["id"] ?>'>
                                            <button class='btn btn-outline-danger' type='submit' name="excluir">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <hr class="my-5">

        <div class="col-12">
            <form class="col-12 d-flex flex-wrap gap-2 justify-content-center align-items-end border border-2 rounded p-4 mb-4" action="" method="get">
                <div>
                    <label>Ano:</label>
                    <input class="form-control w-auto" type="number" name="date" value="<?= $_GET['date'] ?? date('Y') ?>">
                </div>
                <button class="btn btn-outline-info" type="submit">Selecionar</button>
            </form>

            <div class="col-12">
                <h3 class="title text-center my-2">LEGENDA DO CALENDÁRIO</h3>
            </div>

            <?php
            $legendaStagio = false;
            include('components/legenda.php');

            require('models/calendario.php');

            $ano = isset($_GET['date']) ? $_GET['date'] : date('Y');

            echo '<div class="d-flex flex-wrap justify-content-around bg-light border border-1 rounded my-4">';
            echo '<h3 class="col-12 text-center my-4">CALENDÁRIO DE ' . $ano . '</h3>';
            for ($mes = 1; $mes <= 12; $mes++) {
                montar_calendario($mes, $ano);
            }
            echo '</div>';
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
