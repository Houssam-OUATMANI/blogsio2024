<?php

require_once "../models/user-model.php";

echo "profile";

$user = get_user_info();

var_dump($user);