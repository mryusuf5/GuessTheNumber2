<br><br>
<div class="container">
    <?php if(isset($win)){?><p class="message_green text-center"><?php echo $win?></p><?php }?>
    <div class="row d-flex justify-content-center">
        <table class="col-8 leaderboard_table">
            <tr>
                <th class="text-center">Image</th>
                <th class="text-center">Username</th>
                <th class="text-center">Score</th>
            </tr>
            <?php foreach($scores as $score){?>
            <tr>
                <td class="col-3"><div class="d-flex justify-content-center align-items-center"><div class="leaderboard_image" style="background-image:url(<?php echo base_url() . "assets/images/"; echo $score->image_name;?>)"></div></div></td>
                <td class="col-3 text-center"><?php echo $score->username;?></td>
                <td class="col-3 text-center"><?php echo $score->highest_score;?></td>
            </tr>
            <?php }?>
        </table>
    </div>
</div>
