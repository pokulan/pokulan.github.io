<?php
// Empties one of the player's inbox files after the game has read it
require __DIR__ . "/hobo_common.php";

$id = hobo_id("id");
$filez = isset($_GET["file"]) ? $_GET["file"] : "";

// Only the inbox files, never any other file on the server
$allowed = array("package", "friends_accept", "friends_invite");
if (!in_array($filez, $allowed, true)) {
    http_response_code(400);
    exit("bad file");
}

file_put_contents(hobo_dir($id) . "/" . $filez . ".txt", "", LOCK_EX);

echo "ok";
