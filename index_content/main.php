
<div id="divContent">

    <br/>
    <h3><?= $textTranslate[$language]['enterTheTextToBeTranslatedIntoMorseCode'] ?></h3>

    <form action="#" method="POST">
        <input class="dispalyToBlockAndCenter" type="text" name="toMorse" size="100" data-max_char_input="<?= CHAR_LIMIT ?>" id="inputToMorse"
               pattern=".{1,<?= CHAR_LIMIT ?>}" required title="<?= $textTranslate[$language]['minimum'] ?> 1, <?= $textTranslate[$language]['maximum'] ?> <?= CHAR_LIMIT ?>"/> <br/>
        <input type="submit" value="<?= $textTranslate[$language]['translate'] ?>"/>
    </form>

    <br/>
    <h3><?= $textTranslate[$language]['orTranslateMorseCode'] ?></h3>

    <form action="#" method="POST">
        <input class="dispalyToBlockAndCenter" type="text" name="toText" size="100" data-max_char_input="<?= CHAR_LIMIT ?>" id="inputToText"
               pattern=".{1,<?= CHAR_LIMIT ?>}" required title="<?= $textTranslate[$language]['minimum'] ?> 1, <?= $textTranslate[$language]['maximum'] ?> <?= CHAR_LIMIT ?>"/> <br/>
        <input type="submit" value="<?= $textTranslate[$language]['translate'] ?>"/>
    </form>
    <br/>

    <?= $translatedText ?>
    <p><?= $textTranslate[$language]['shortManual'] ?></p>
    <p><?= $textTranslate[$language]['charactersThatAreNotAllowedWillBeReplacedWithAspace'] ?>
       <?= $textTranslate[$language]['separateTheCharactersInTheMorseCodeForExample'] ?></p>

    <!-- br for expose a long translation -->
    <br/><br/><br/><br/><br/><br/><br/><br/>
</div>

