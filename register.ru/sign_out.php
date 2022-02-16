<?php
    setcookie("user", $name, time() - 300, "/");
    header("Location: /")
?>