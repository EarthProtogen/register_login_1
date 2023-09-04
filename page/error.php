<?php if (isset($_SESSION['success'])) { ?>
<div class='alert alert-success py-2'>
    <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
    ?>
</div>
<?php } ?>
<?php if(isset($_SESSION['alert'])){ ?>
<label>
    <div class="alert alert-danger">
        <?php 
        echo $_SESSION['alert']; 
        unset($_SESSION['alert']);
        ?>
    </div>
</label>
<?php } ?>