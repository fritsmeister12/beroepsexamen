<?php
session_start();
session_destroy();
// Terug sturen naar de login pagina:
header('Location: ../view/login.php');