<br><br>
<div class="container">
    <?php if(isset($win)){?><span class="message_green"><?php $win?></span><?php }?>
    <div class="row d-flex justify-content-center">
        <table class="col-8 leaderboard_table">
            <tr>
                <th>Image</th>
                <th>Username</th>
                <th>Score</th>
            </tr>
            <?php foreach($scores as $score){?>
            <tr>
                <td class="col-3"><div class="d-flex justify-content-center align-items-center"><div style="leaderboard_image" style="background-image:url(<?php echo base_url() . "assets/images/"; echo $score->image_name;?>)"></div></div></td>
                <td class="col-3 text-center"><?php echo $score->username;?></td>
                <td class="col-3 text-center"><?php echo $score->highest_score;?></td>
            </tr>
            <?php }?>
        </table>
    </div>
</div>
