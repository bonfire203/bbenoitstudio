<?php
    session_destroy();
    $_SESSION["userid"] = null;
    Header('Location: index.php');
    exit;