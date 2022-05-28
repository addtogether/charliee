<?php

    $pass = "1134567890";
    $password = password_hash($pass, PASSWORD_DEFAULT);

    echo $password;