<?php

include_once 'registro_login.php';

    $mail = $user->getCorreo();
    $user->deleteHistory($user->getUserId());
    $user->deleteFoodUser($user->getUserId());
    $user->deleteuser($mail);
    $userSession->closeSession();
    echo '<script>
    window.location.replace("../index.php");
    </script>';
?>