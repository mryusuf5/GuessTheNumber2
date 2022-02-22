<div class="container">
    <div class="row d-flex justify-content-center">
        <form action="<?php echo base_url()?>Game/create_game" method="POST" class="form-group col-4">
            <label class="form-label" for="number1">Enter your first number</label>
            <input type="text" name="number1" class="form-control">
            <small class="text-muted">This number can't be lower then 0</small><br>
            <span class="text-danger"><?php echo form_error("number1"); ?></span>

            <label class="form-label" for="number1">Enter your second number</label>
            <input type="text" name="number2" class="form-control">
            <small class="text-muted">This number can't be lower then the first number</small>
            <span class="text-danger"><?php echo form_error("number2"); ?></span><br><br>
            
            <input type="submit" class="btn btn-primary">
        </form>
    </div>

</div>