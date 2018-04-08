<?php
/**
 * T100 game.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Start game when going to site via GET
 */
$app->router->get("t100", function () use ($app) {
    $data = [
        "title" => "Tärning 100"
    ];

    $app->view->add("t100/start", $data);
    $app->page->render($data);
});

/**
 * Play game using POST and SESSION
 */
$app->router->post("t100", function () use ($app) {
    session_name("rasb14_t100");
    session_start();
    
    $game;
    if (isset($_POST["player"])) {
        $game = new \Rasb14\T100\Game(5, $_POST["player"]);
    } elseif (isset($_SESSION["game"])) {
        $game = $_SESSION["game"];
    } else {
        $app->view->add("t100/error", [
            "title" => "Tärning 100",
            "message" => "No name entered."
        ]);
        $app->page->render([
            "title" => "Tärning 100",
            "message" => "No name entered."
        ]);
    }

    if (isset($_POST["save"])) {
        $game->doRoll(true);
    } else {
        $game->doRoll(false);
    }
    
    if (!is_null($game->winner())) {
        session_destroy();

        $data = [
            "title" => "Tärning 100",
            "winner" => $game->winner()
        ];

        $app->view->add("t100/win", $data);
        $app->page->render($data);
    } else {
        $_SESSION["game"] = $game;
        
        $data = [
            "title" => "Tärning 100",
            "graphic" => $game->graphic(),
            "unsaved" => $game->currentUnsaved(),
            "standings" => $game->generateStandingsTable()
        ];
    
        $app->view->add("t100/game", $data);
        $app->page->render($data);
    }
});