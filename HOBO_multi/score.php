<?php
// Player's scores shown to friends. Content: best_score#@#best_won_score#@#
require __DIR__ . "/hobo_common.php";

$id = hobo_id("id");
$score1 = hobo_int("score1");
$score2 = hobo_int("score2");

file_put_contents(hobo_dir($id) . "/score.txt", $score1 . "#@#" . $score2 . "#@#", LOCK_EX);

echo "ok";
