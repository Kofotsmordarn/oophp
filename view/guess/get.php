<?php

namespace Anax\View;

?>
<h1><?= $title ?></h1>
<form method="GET">
    <input type="hidden" name="secret" value="<?= $guess->number() ?>"/>
    <input type="hidden" name="tries" value="<?= $guess->tries() ?>"/>
    <label for="guess">Guess</label>
    <input type="text" name="guess"/>
    <input type="submit" value="Make Guess"/>
    <input type="submit" name="cheat" value="Cheat"/>
    <input type="submit" name="reset" value="Reset"/>
</form>   
<?= $status ?>
