<?php
    session_start();
    require_once ('..\..\..\..\estimator.php');
    
    displayXML($_SESSION['response'], $_SESSION['content-type']);

  
