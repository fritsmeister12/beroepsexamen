<?php

// Een sessie starten als hij nog niet gestart is
session_start();

// Sessie kapot maken
session_destroy();

// Terug sturen naar de login pagina:
header('Location: ../view/login.php');