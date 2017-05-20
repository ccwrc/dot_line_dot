
<div id="divContent">

    <br/>
    <h3><?= $textTranslate[$language]['enterTheTextToBeTranslatedIntoMorseCode'] ?></h3>

    <form action="#" method="POST">
        <input type="text" name="toMorse" size="100"
               pattern=".{1,9500}" required title="min. 1, max. 9500"/> <br/>
        <input type="submit" value="<?= $textTranslate[$language]['translate'] ?>"/>
    </form>

    <br/>
    <h3><?= $textTranslate[$language]['orTranslateMorseCode'] ?></h3>

    <form action="#" method="POST">
        <input type="text" name="toText" size="100"/> <br/>
        <input type="submit" value="<?= $textTranslate[$language]['translate'] ?>"/>
    </form>
    <br/>

    <?= $translatedText ?>
    
    <br/><br/><br/><br/><br/><br/><br/><br/>
</div>

