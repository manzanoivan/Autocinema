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
        $header .=""; 
        $header .="<!-- login CSS -->";
        $header .="<link rel='stylesheet' href='css/login.css' rel='stylesheet'>";
        $header .="<link href='css/ct/nav-tabs.css' rel='stylesheet'/>";
        $header .="<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>";
	$header .= "<link rel='stylesheet' href='css/filter-style.css'> <!-- Resource style -->";
	$header .= "<script src='js/modernizr.js'></script>";
        $header .="</head>"; 
        return $header;
        
        
    }
    
    function getScripts($sub){
        $carpeta = "";
        $footer = "";
        for( $i = 0; $i < $sub; $i++ ){
            $carpeta .= "../";
        }
        
        $footer .="    <!-- Core JavaScript Files -->"; 
        $footer .="    <script src='".$carpeta."js/jquery.min.js'></script>"; 
        $footer .="    <script src='".$carpeta."js/bootstrap.min.js'></script>"; 
        $footer .="    <script src='".$carpeta."js/jquery.easing.min.js'></script> "; 
        $footer .="    <script src='".$carpeta."js/jquery.scrollTo.js'></script>"; 
        $footer .="    <script src='".$carpeta."js/wow.min.js'></script>"; 
        $footer .="    <!-- Custom Theme JavaScript -->"; 
        $footer .="    <script src='".$carpeta."js/custom.js'></script>"; 
        $footer .="    <script src='".$carpeta."js/backstretch/jquery.backstretch.js'></script>"; 
        $footer .="    <script>"; 
        $footer .="        $.backstretch(["; 
        $footer .="          '".$carpeta."img/intro/1.jpg',"; 
        $footer .="          '".$carpeta."img/intro/2.jpg',"; 
        $footer .="          '".$carpeta."img/intro/3.jpg'"; 
        $footer .="        ], {"; 
        $footer .="            fade: 750,"; 
        $footer .="            duration: 4000"; 
        $footer .="        });"; 
        $footer .="    </script>"; 
        return $footer;
    }
?>
