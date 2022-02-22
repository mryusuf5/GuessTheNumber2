<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">
    <link rel="icon" href="<?php echo base_url()?>assets/images/favicon/favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/5010d60ea4.js" crossorigin="anonymous"></script>
    <title>Guessing Game</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid d-flex just-content-between">
            <a href="<?php echo base_url()?>home" class="navbar-brand">Guessing Game</a>
            <div class="">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="<?php echo base_url()?>game" class="nav-link">Game</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url()?>leaderboard" class="nav-link">Leaderboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" id="dropdown_button">
                            <?php if($this->session->userdata("image_name")){?>
                            <div class="header_profile_image" style="background-image: url(<?php echo base_url();?>assets/images/<?php  echo $this->session->userdata("image_name");?>)">
                            </div>
                            <?php }?>
                            <?php if(!$this->session->userdata("image_name")){?>
                            <div class="header_profile_image">
                                <span><?php echo $this->session->userdata("username")[0];?></span>
                            </div>
                            <?php }?>
                            <ul class="dropdown-menu dropdown-menu-end dropdown_menu">
                                <li><a href="<?php echo base_url()?>game" class="dropdown-item">Game</a></li>
                                <li><a href="<?php echo base_url()?>profile" class="dropdown-item">Profile settings</a></li>
                                <li><a href="<?php echo base_url()?>Login/Logout" class="dropdown-item">Logout</a></li>
                            </ul>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>