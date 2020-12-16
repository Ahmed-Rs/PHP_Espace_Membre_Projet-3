<?php

session_start(); /* INITIALISE LA SESSION */
session_unset(); /* DESACTIVE LA SESSION */
session_destroy(); /* DETRUIT LA SESSION */
setcookie('log', '', time()-7452, '/', null, false, true); // DESTRUCTION DU COOKIE

header('location: ../'); // ACCUEIL NON CONNECTE

?>