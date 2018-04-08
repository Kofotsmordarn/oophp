<?php

namespace Anax\View;

?>
<style>
    .dice-sprite {
        display: inline-block;
        padding: 0;
        margin: 0 4px 0 0;
        width: 32px;
        height: 32px;
        background: url(img/dice-faces.jpg) no-repeat;
    }

    .dice-sprite.dice-1 { background-position: -160px 0; }
    .dice-sprite.dice-2 { background-position: -128px 0; }
    .dice-sprite.dice-3 { background-position: -96px 0; }
    .dice-sprite.dice-4 { background-position: -64px 0; }
    .dice-sprite.dice-5 { background-position: -32px 0; }
    .dice-sprite.dice-6 { background-position: 0 0; }
</style>
<h1><?= $title ?></h1>
<div style="float: left;">
    <p>Current unsaved points: <?= $unsaved ?></p>
    <p>
        <?php foreach ($graphic as $value) : ?>
            <i class="dice-sprite <?= $value ?>"></i>
        <?php endforeach; ?>
    </p>
    <form method="POST">
        <input type="submit" name="roll" value="Roll"/>
        <input type="submit" name="save" value="Save"/>
    </form>
</div>
<div style="float: right;">
    <?= $standings ?>
</div>