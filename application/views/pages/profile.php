<div class="profile_container container bg-dark"><br>
    <?php if(isset($image_success)){?><span class="message_green"><?php echo $image_success;?></span><br><br><?php }?>
    <?php if(isset($info_success)){?><span class="message_green"><?php echo $info_success;?></span><br><br><?php }?>
    <?php if(isset($error)){?><span class="guess_message_red_error"><?php echo $error;?></span><br><br><?php }?>
    <button id="change_info" class="btn btn-danger">Change info</button>
    <div class="profile_picture_container d-flex justify-content-center">
        <?php if($this->session->userdata("image_name")){?>
            <div class="profile_image" style="background-image: url(<?php echo base_url();?>assets/images/<?php echo $this->session->userdata("image_name");?>)">
            </div>
        <?php }?>
        <?php if(!$this->session->userdata("image_name")){?>
        <div class="profile_image rounded-circle d-flex align-items-center justify-content-center">
            <span><?php echo strtoupper($this->session->userdata("username")[0]);?></span>
        </div>
        <?php }?>
    </div>
    <form class="" method="POST" enctype="multipart/form-data" action="<?php echo base_url()?>profile/upload_image">
        <div class="info_container">
            <p>Change profile picture</p>
            <input type="file" class="form-control w-25 upload" name="profile_picture" onchange='this.form.submit()'>
        </div>
    </form>
    <br>
    <form method="POST" action="<?php echo base_url()?>profile/profile_settings">
    <div class="info_container">
        <div class="d-flex info_item">
            <p class="d-flex flex-row">First name:&nbsp;<input name="first_name" readonly class="form-control" type="text" value="<?php echo $this->session->userdata("first_name")?>"></p>
        </div>
        <div class="d-flex info_item">
            <p class="d-flex flex-row">Last name:&nbsp;<input name="last_name" readonly class="form-control" type="text" value="<?php echo $this->session->userdata("last_name")?>"></p>
        </div>
    </div>
    <div class="w-100 d-flex justify-content-end">
        <input type="submit" class="btn btn-success" value="change">
    </div>
    </form>
    <br>
</div>