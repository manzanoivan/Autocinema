<?php

    function getHeader($sub){
        $carpeta = "";
        $header = "";
        for( $i = 0; $i < $sub; $i++ ){
            $carpeta .= "../";
        }
        $header .="<head>"; 
        $header .="    <meta charset='utf-8'>"; 
        $header .="    <meta name='viewport' content='width=device-width, initial-scale=1.0'>"; 
        $header .="    <title>Autocinema Coyote</title>"; 
        $header .="    <!-- Bootstrap Core CSS -->"; 
        $header .="    <link href='".$carpeta."css/bootstrap.min.css' rel='stylesheet' type='text/css'>"; 
        $header .=""; 
        $header .="    <!-- Fonts -->"; 
        $header .="    <link href='".$carpeta."font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>"; 
        $header .="    <link href='".$carpeta."css/animate.css' rel='stylesheet' />"; 
        $header .="    <!-- Squad theme CSS -->"; 
        $header .="    <link href='".$carpeta."css/style.css' rel='stylesheet'>"; 
        $header .="    <link href='".$carpeta."color/default.css' rel='stylesheet'>"; 
        $header .="    <!-- Backstretch CSS -->"; 
        $header .="    <link href='".$carpeta."css/backstretch.css' rel='stylesheet'>"; 
        $header .="    <!-- login CSS -->"; 
        $header .="  <link rel='stylesheet' href='".$carpeta."css/login.css' rel='stylesheet'>"; 
        $header .=""; 
        $header .="</head>"; 
        return $header;
    }
?>
