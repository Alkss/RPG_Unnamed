<?php

require('../../../config.php');
include('../../../header.php');


if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
    header('location:' . URL . '/view/index.php');
} else {
    
    if (isset($_POST['equipmentName']) && isset($_POST['equipmentDesc']) && isset($_POST['equipmentType'])&& isset($_POST['equipmentModBase'])) {
        $equipment = new Equipment();
        if ($equipment->checkIfExistsByName($_POST['equipmentName'])) {
        header('Location: addEquipment.php?error=1');
        } else if ($equipment->createEquipment($_POST['equipmentName'], $_POST['equipmentDesc'], $_POST['equipmentType'], $_POST['equipmentModBase'])) {
            header('Location: addEquipment.php?success=1');
        }
    }
    
    
    ?>
    <head>
        <title>RPG_Unnamed - Novo Equipamento</title>
    </head>
    <body id="new-equipment">

<h1><?= RPG_NAME ?></h1>
<h2>Novo Equipamento</h2>

<?php
if (isset($_GET['success'])) {
    if ($_GET['success'] == 1) {
        ?>
        <div class="alert alert-success"><p>Equipamento criado com sucesso!</p></div>
        <?php
    }
}if (isset($_GET['error'])){
        if ($_GET['error'] == 1)  {
        ?>
        <div class="alert alert-danger"><p>Nome do equipamento já existe!</p></div>
        <?php
        }
}
include '../menuADM.php';
?>
<div class="col-xs-5">
    <form method="post" id="create-new-equipment">
        <p>
            <label for="equipmentName">Equipamento</label>
            <input class="form-control" type="text" id="equipmentName" name="equipmentName" required="true">
        </p>
        <p>
            <label for="equipmentDesc">Descrição do equipamento</label>
        </p>
        <textarea class="form-control" form="create-new-equipment" id="equipmentDesc" name="equipmentDesc"
                  style="height: 180px" required="true"></textarea>
        <p>
        <label for="equipmentType">Tipo de equipamento</label>
            <select class="form-control" id="equipmentType" name="equipmentType" required="true">
                <option selected disabled="disabled" hidden>Escolha um tipo</option>
                <option value="A">Ataque</option>
                <option value="D">Defesa</option>
            </select>
        </p>
        <p>
            <label for="equipmentModBase">Modificador base do equipamento</label>
            <input class="form-control" type="text" id="equipmentModBase" name="equipmentModBase" required="true">
        </p>
        <button class="btn btn-primary" id="createEquipment" name="createEquipment">Adicionar equipamento</button>
    </form>
</div>
    <?php
}
