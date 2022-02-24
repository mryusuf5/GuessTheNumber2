<br><br>

<div class="container">
    <div class="row d-flex justify-content-center">
        <form class="form-group col-6" action="<?php echo base_url()?>Game/check_number" method="POST">
            <?php if(isset($warmer)){?><span class="guess_message_red"><?php echo $warmer; ?></span><br><br><?php }?>
            <?php if(isset($colder)){?><span class="guess_message_blue"><?php echo $colder; ?></span><br><br><?php }?>
            <?php if(isset($freezing)){?><span class="guess_message_blue2"><?php echo $freezing; ?></span><br><br><?php }?>
            <?php if(isset($burning)){?><span class="guess_message_red2"><?php echo $burning; ?></span><br><br><?php }?>
            <?php if(isset($message)){?><span class="message_green"><?php echo $message; ?></span><br><br><?php }?>
            <?php if(isset($close)){?><span class="guess_message_red2"><?php echo $close; ?></span><br><br><?php }?>
            <label class="form-label" for="number">Guess the number</label>
            <input type="number" class="form-control" placeholder="Fill out your guess here!" name="guessed_number"><br><br>
            <input type="submit" value="Guess" class="btn btn-primary">
            <br><br>
            <?php if($this->session->userdata("tries") > 3){?><span class="message_green">you have <?php echo $this->session->userdata("tries")?> tries left.</span><?php }?>
            <?php if($this->session->userdata("tries") <= 3){?><span class="guess_message_red2">you have <?php echo $this->session->userdata("tries")?> tries left.</span><?php }?>

        </form>
    </div>
</div>