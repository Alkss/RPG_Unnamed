<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 26/04/18
 * Time: 13:47
 */
?>
<div class="col-xs-10">

    <div class="row">
        <div class="col-xs-3 col-xs-offset-1">
            <?php
            $imgURL = $selectedChar[0]['img_personagem'];
            echo '<img id="charImg" src="' . $imgURL . '">';
            ?>
        </div>

        <div class="col-xs-3">
            <label for="editName">Editar nome</label>
            <input type="text" value="<?= $selectedChar[0]['nme_personagem'] ?>" id="editName" name="editName"
                   class="form-control">

            <label for="editRace">Editar raça</label>
            <select class="form-control" id="editRace" name="editRace">
                <?php
                foreach ($selectedRace as $singleRace) {
                    if ($singleRace['idt_raca'] == $selectedChar[0]['cod_raca']) {
                        ?>
                        <option value="<?= $singleRace['idt_raca'] ?>"
                                selected="selected"><?= $singleRace['nme_raca'] ?></option>
                        <?php
                    } else {
                        ?>
                        <option value="<?= $singleRace['idt_raca'] ?>"><?= $singleRace['nme_raca'] ?></option>
                        <?php
                    }
                }
                ?>
            </select>
            
            <label for="editAlignment">Editar Alinhamento</label>
            <select class="form-control" id="editAlignment" name="editAlignment">
                <?php
                foreach ($selectedAlignment as $singleAlignment){
                    if ($singleAlignment['idt_alinhamento'] == $selectedChar[0]['cod_alinhamento']) {
                        ?>
                        <option value="<?= $singleAlignment['idt_alinhamento'] ?>"
                                selected="selected"><?= $singleAlignment['nme_alinhamento'] ?></option>
                        <?php
                    } else {
                        ?>
                        <option value="<?= $singleAlignment['idt_alinhamento'] ?>"><?= $singleAlignment['nme_alinhamento'] ?></option>
                        <?php
                    }
                }
                ?>
            </select>
        </div>
        <div class="col-xs-2">
            <label for="editClass">Editar classe</label>
            <select class="form-control" id="editClass" name="editClass">
                <?php
                foreach ($selectedClass as $singleClass) {
                    if ($singleClass['idt_classe'] == $selectedClass[0]['cod_classe']) {
                        ?>
                        <option value="<?= $singleClass['idt_classe'] ?>"
                                selected="selected"><?= $singleClass['nme_classe'] ?></option>
                        <?php
                    } else {
                        ?>
                        <option value="<?= $singleClass['idt_classe'] ?>"><?= $singleClass['nme_classe'] ?></option>
                        <?php
                    }
                }
                ?>
            </select>

            <label for="editGenre">Editar Genêro</label>
            <select id="editGenre" name="editGenre" class="form-control">
                <?php
                $genres = array('M' => 'Masculino', 'F' => 'Feminino');
                foreach ($genres as $key => $genre) {
                    if ($selectedChar[0]['gen_personagem'] == $key) {
                        ?>
                        <option selected="selected" value="<?= $key ?>"><?= $genre ?></option>
                        <?php
                    } else {
                        ?>
                        <option value="<?= $key ?>"><?= $genre ?></option>
                        <?php
                    }
                }
                ?>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-3 col-xs-offset-1">
            <label for="editImg">Editar imagem (URL)</label>
            <input type="text" name="editImg" value="<?= $imgURL ?>" id="editImg" class="form-control">
        </div>
    </div>
</div>