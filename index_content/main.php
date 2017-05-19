<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div id="divContent">

    <h3><?= $textTranslate[$language]['enterTheTextToBeTranslatedIntoMorseCode'] ?></h3>

    <form action="#" method="POST">
        <input type="text" name="toMorse" size="100"
               pattern=".{1,10000}" required title="min. 1, max. 10000"/> <br/>
        <input type="submit" value="<?= $textTranslate[$language]['translate'] ?>"/>
    </form>

    <h3><?= $textTranslate[$language]['orTranslateMorseCode'] ?></h3>

    <form action="#" method="POST">
        <input type="text" name="toText" size="100"/> <br/>
        <input type="submit" value="<?= $textTranslate[$language]['translate'] ?>"/>
    </form>
    <br/>
    
    <?= $translatedText ?>

</div>

