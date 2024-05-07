<?php
function flash_message(string $key, string $variant) {
    $message = $_SESSION[$key];
    echo "
        <div role='alert' class='alert $variant'> <span>$message</span></div>
    ";
}