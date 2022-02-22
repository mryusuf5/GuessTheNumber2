<br>
<div class="main_container container p-5">
    <?php if($this->session->userdata("username") && !$this->session->userdata("first_name")){?>
    <h1 class="text-center">Welcome <?php echo $this->session->userdata("username") . "!";}?></h1>

    <?php if($this->session->userdata("first_name")){?>
    <h1 class="text-center">Welcome <?php echo $this->session->userdata("first_name") . " " . $this->session->userdata("last_name") . "!";}?></h1>

    <?php if(!$this->session->userdata("username")){?>
        <h1 class="text-center">Welcome! </h1><br>
        <h2 class="text-center">click <a href="login">here</a> to login or register to play the game!</h2>
    <?php }?>
    <br>
    <?php if($this->session->userdata("username")){?>
    <div class="row d-flex justify-content-center game_button_container">
        <button class="btn btn-primary col-8 game_button">
            <a href="<?php echo base_url()?>game" class="text-light fs-2">Click here to go to the game!</a>
        </button>
    </div>
    <?php }?>
</div>