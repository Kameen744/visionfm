<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="s">
    <meta name="author" content="Kamal Aminu">
    <title>visionfm.ng</title>
    <link rel="shortcut icon" href="<?= base_url() ?>favicon.ico" type="image/x-icon">
    <link href="<?php echo base_url();?>assets/css/sb-admin-2.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" 
    integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" 
    crossorigin="anonymous">

    <link rel="stylesheet" href="<?= base_url() ?>assets/wload/css/wload.css">
    
    <!-- [if lt IE 9]> -->
        <!-- <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> -->
        <!-- <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> -->
    <!-- <![endif] -->
</head>

<body>
<main id="adminMainPage">
<?php
    if($this->session->flashdata('login_message')) {
        echo '<p class="alert alert-info text-center">'.$this->session->flashdata('login_message').'</p>';
    }
?>
