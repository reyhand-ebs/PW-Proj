<?php
    ini_set( 'display_errors', 1 );   
    error_reporting( E_ALL );    
    $from = "khairaisyara25@gmail.com";    
    $to = "khaira.isyara@students.esqbs.ac.id";    
    $subject = "Contact Us Mail";    
    $message = "Tubirit keren banget sih!";   
    $headers = "From : " . $from;    
    mail($from, $to, $subject, $message, $headers);    
    echo "Pesan email sudah terkirim.";
?>