<div class="login_container">
    <div class="form-group row d-flex justify-content-center gap-5">
        <span class="text-success text-center"><?php echo $this->session->flashdata("register_success"); ?></span>
        <form action="<?php echo base_url()?>Login/login_user" method="POST" class="col-4">
            <label for="username" class="form-label mt-4">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter your username">
            <span class="text-danger"><?php echo form_error("username"); ?></span>

            <label for="password" class="form-label mt-4">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter your password">
            <span class="text-danger"><?php echo form_error("password"); ?></span><br>

            <input class="btn btn-primary" type="submit">
        </form>
        <p class="text-center">Don't have an account yet? <a href="<?php echo base_url()?>register">click here to register.</a></p>
    </div>
</div>