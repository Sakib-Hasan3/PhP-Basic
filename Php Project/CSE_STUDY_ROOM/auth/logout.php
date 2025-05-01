<?php
session_start();
session_unset();
session_destroy();
header("Location: login.php"); // No change if login.php is in the same 'auth/' folder
exit();
