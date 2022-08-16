<?php
    include_once 'sesion_user.php';

    $userSession = new UserSession();
    $userSession->closeSession();
    echo '<script>
    window.location.replace("../index.php");
    </script>';
?>