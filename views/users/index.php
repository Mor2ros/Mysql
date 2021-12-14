<?php
require ('../layout/header.php');
require ('menu.php');
require ($_SERVER['DOCUMENT_ROOT'].'/controllers/User.php');
?>
<div class="container mx-auto">
    <div style="display: grid; grid-template-columns: repeat(3,1fr)">
        <?php
        $user = new User();
        $data = $user->get();
        foreach ($data as $key =>$row){
            ?>
            <div class="card m-2 shadow">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['user'];?></h5>
                    <div>
                        <span class="card-subtitle text-muted">Роль: </span>
                        <span class="card-text"><?php echo $row['role'];?></span>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
</div>
<?php
require ('../layout/footer.php');
?>
