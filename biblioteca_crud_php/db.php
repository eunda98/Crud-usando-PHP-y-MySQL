<?php

session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'biblioteca'

) or die(mysqli_erro($mysqli));

?>