<?php
// Shared input checks for the HOBO_multi scripts. Must be uploaded next to them.

// Player IDs are used as directory names: only plain IDs, never paths like "../"
function hobo_id($name) {
    $id = isset($_GET[$name]) ? $_GET[$name] : "";
    if (!preg_match('/^[A-Za-z0-9_-]{1,64}$/', $id)) {
        http_response_code(400);
        exit("bad " . $name);
    }
    return $id;
}

// Free text kept as-is (the game shows it raw), minus what would break the .txt format:
// "#@#" separates fields and the game reads only the first line
function hobo_text($name, $maxLength) {
    $text = isset($_GET[$name]) ? $_GET[$name] : "";
    $text = str_replace(array("#@#", "\r", "\n"), "", $text);
    if (function_exists('mb_substr')) return mb_substr($text, 0, $maxLength, "UTF-8");
    return substr($text, 0, $maxLength);
}

function hobo_int($name) {
    return isset($_GET[$name]) ? (int)$_GET[$name] : 0;
}

// Directory of a player, created on first use
function hobo_dir($id) {
    if (!is_dir($id)) mkdir($id, 0755, true);
    return $id;
}

// Adds a record to a player's file; the lock keeps two requests at the same time from losing one
function hobo_append($file, $record) {
    file_put_contents($file, $record, FILE_APPEND | LOCK_EX);
}
