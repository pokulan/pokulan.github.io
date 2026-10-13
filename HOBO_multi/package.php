<?php
// Sends a package to trgid. Record: sender_id#@#message#@#amount#@#item#@#
require __DIR__ . "/hobo_common.php";

$id = hobo_id("id");
$trgid = hobo_id("trgid");
$message = hobo_text("message", 60);
$ile = hobo_int("ile");
$what = hobo_int("what");

// Appended, not overwritten: packages wait until the receiver opens the post office
hobo_append(hobo_dir($trgid) . "/package.txt", $id . "#@#" . $message . "#@#" . $ile . "#@#" . $what . "#@#");

echo "ok";
