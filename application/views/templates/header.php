<!doctype html>
<html lang="en">
  <head>
    <title>visionfm.ng</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?= base_url() ?>favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/sb-admin-2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>assets/wload/css/wload.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
  </head>
  <body style="max-height: 90vh;" class="bg-white">
    <div class="container p-0 shadow-lg mt-2 bg-white py-0" style="max-width: 1000px;">
    <header>
        <nav class="shadow-lg py-0 bg-dark" style="max-height: 30px;">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-4 p-2 text-white">
                        <h6><b><?php date_default_timezone_set('Africa/Lagos'); echo date('l jS \of F Y');?></b></h6>
                    </div>
                    <div class="col-md-6 text-right">
                            <a href="#" class="p-1 text-right shadow-lg">
                                <span class="fa-stack fa-lg social-link">
                                    <i class="fas fa-circle fa-stack-2x text-dark"></i>
                                    <i class="fab fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                            <a href="#" class="p-1 text-right shadow-lg">
                                <span class="fa-stack fa-lg social-link">
                                    <i class="fas fa-circle fa-stack-2x text-dark"></i>
                                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                            <a href="#" class="p-1 text-right shadow-lg">
                                <span class="fa-stack fa-lg social-link">
                                    <i class="fas fa-circle fa-stack-2x text-dark"></i>
                                    <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                            <a href="#" class="p-1 text-right shadow-lg">
                                <span class="fa-stack fa-lg social-link">
                                    <i class="fas fa-circle fa-stack-2x text-dark"></i>
                                    <i class="fab fa-youtube fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <header>
        <nav class="d-flex justify-content-center">
        <a class="navbar-brand" href="<?php echo base_url();?>">
            <img src="<?php echo base_url();?>assets/img/Vlogo.png" alt="Vision FM" style="max-width: 290px;">
        </a>
        </nav>
    </header>
    <header>
        <nav class="navbar navbar-expand-sm bg-gradient-danger py-0 shadow-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#frwnavbarcontent" aria-controls="frwnavbarcontent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="frwnavbarcontent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url()?>home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url()?>programs">Programs</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    News
                    </a>

                    <ul class="dropdown-menu bg-gradient-danger" aria-labelledby="navbarDropdownMenuLink">
                        <li class="dropdown-submenu">
                        <a class="dropdown-item text-white dropdown-toggle" href="#">Local</a>
                            <ul class="dropdown-menu bg-gradient-danger">
                                <li><a class="dropdown-item text-white" href="<?php echo base_url()?>pages/local/news">News</a></li>
                                <li><a class="dropdown-item text-white" href="<?php echo base_url()?>pages/local/politics">Politics</a></li>
                                <li><a class="dropdown-item text-white" href="<?php echo base_url()?>pages/local/business">Business</a></li>
                                <li><a class="dropdown-item text-white" href="<?php echo base_url()?>pages/local/health">Health</a></li>
                                <li><a class="dropdown-item text-white" href="<?php echo base_url()?>pages/local/sport">Sport</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu ">
                        <a class="dropdown-item text-white dropdown-toggle" href="#">Foreign</a>
                            <ul class="dropdown-menu bg-gradient-danger">
                            <li><a class="dropdown-item text-white" href="<?php echo base_url()?>pages/foreign/news">News</a></li>
                            <li><a class="dropdown-item text-white" href="<?php echo base_url()?>pages/foreign/sport">Sport</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Stations
                    </a>

                    <ul class="dropdown-menu bg-gradient-danger" aria-labelledby="navbarDropdownMenuLink">
                        <?php foreach($stations as $station): ?>
                        <li><a class="dropdown-item text-white" href="<?php echo base_url()?>stations/<?= $station['Station_Name'] ?>">
                        <?= $station['Station_Name'] .' ' .$station['Frequency']?>
                        </a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url()?>about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url()?>contact">Contact</a>
                </li>
                <li class="nav-item ml-5">
                    <a class="nav-link" href="#"><span class="fas fa-search"></span></a>
                </li>
                
                </ul>
            
            </div>
        </nav>
    </header>
    </div>
    <main class="pb-5">
    <div class="container px-4 shadow-lg pt-2 bg-white" style="max-width: 1000px;">
        