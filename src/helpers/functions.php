<?php
function sanitize($input) {
    return htmlspecialchars(trim($input));
}
// Sanitize all the incoming data
//$sanitized = array_map('sanitize', $_POST);