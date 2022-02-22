<div class="login_container">
    <div class="form-group row d-flex justify-content-center">
        <form action="<?php echo base_url()?>register/register_user" method="POST" class="col-4">
            <label for="username" class="form-label mt-4">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter your username">
            <span class="text-danger"><?php echo form_error("username"); ?></span>

            <label for="password" class="form-label mt-4">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter your password">
            <span class="text-danger"><?php echo form_error("password"); ?></span>

            <label for="password" class="form-label mt-4">Confirm Password</label>
            <input type="password" name="password" class="form-control" placeholder="Confirm your password"><br>
            <span class="text-danger"><?php echo form_error("password"); ?></span>
            
            <input class="btn btn-primary" type="submit">
        </form>
    </div>
</div>