<?php

session_destroy();

sleep(5);

header("Location: signin");

exit;

?>