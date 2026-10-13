<?php
// id accepted the invite of trgid. Record: accepting_id#@#accepting_nick#@#
require __DIR__ . "/hobo_common.php";

$target_id = hobo_id("trgid");
$id = hobo_id("id");
$nick = hobo_text("nick", 64);

hobo_append(hobo_dir($target_id) . "/friends_accept.txt", $id . "#@#" . $nick . "#@#");

echo "ok";
