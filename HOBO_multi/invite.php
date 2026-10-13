<?php
// Friend invite from id to trgid. Record: sender_id#@#sender_nick#@#
require __DIR__ . "/hobo_common.php";

$target_id = hobo_id("trgid");
$id = hobo_id("id");
$nick = hobo_text("nick", 64);

$file = hobo_dir($target_id) . "/friends_invite.txt";
$current = file_exists($file) ? file_get_contents($file) : "";
// Don't list the same player twice when the invite is sent again
if (strpos("#@#" . $current, "#@#" . $id . "#@#") === false) {
    hobo_append($file, $id . "#@#" . $nick . "#@#");
}

echo "ok";
