
<div id="divContent">

    <br/>
    <h3><?= $textTranslate[$language]['enterTheTextToBeTranslatedIntoMorseCode'] ?></h3>

    <form action="#" method="POST">
        <input type="text" name="toMorse" size="100"
               pattern=".{1,<?= CHAR_LIMIT ?>}" required title="<?= $textTranslate[$language]['minimum'] ?> 1, <?= $textTranslate[$language]['maximum'] ?> <?= CHAR_LIMIT ?>"/> <br/>
        <input type="submit" value="<?= $textTranslate[$language]['translate'] ?>"/>
    </form>

    <br/>
    <h3><?= $textTranslate[$language]['orTranslateMorseCode'] ?></h3>

    <form action="#" method="POST">
        <input type="text" name="toText" size="100"
               pattern=".{1,<?= CHAR_LIMIT ?>}" required title="<?= $textTranslate[$language]['minimum'] ?> 1, <?= $textTranslate[$language]['maximum'] ?> <?= CHAR_LIMIT ?>"/> <br/>
        <input type="submit" value="<?= $textTranslate[$language]['translate'] ?>"/>
    </form>
    <br/>

    <?= $translatedText ?>

    <!-- br for expose a long translation -->
    <br/><br/><br/><br/><br/><br/><br/><br/>
</div>

