<?php
session_start();
unset($_SESSION['MEMBER']);
//landing page
header('Location:http://localhost/uts/index.php?hal=home');