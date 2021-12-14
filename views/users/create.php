<?php
require ('../layout/header.php');
require ('menu.php');
require ($_SERVER['DOCUMENT_ROOT'].'/controllers/Role.php');
?>
<div class="container mt-5">
    <form action="../../middleware/createUser.php"
          method="post"
          class="d-flex flex-column justify-content-center align-items-center">
        <h3>Добавление</h3>
        <div class="col-5">
            <label for="name">Логин</label>
            <input id="name" name="name" type="text" class="form-control" required>
        </div>
        <div class="col-5">
            <label for="password">Пароль</label>
            <input id="password" name="password" type="password" class="form-control" required>
        </div>
        <div class="col-5">
            <label for="role">Роль</label>
            <select name="role_id" id="role" class="form-control">
                <?php
                $role = new Role();
                $data = $role->get();
                foreach ($data as $row){
                ?>
                <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                <?php }?>
            </select>
        </div>
        <div class="mt-3">
            <button class="btn btn-primary" type="submit">Отправить</button>
        </div>
    </form>
</div>
<?php
require ('../layout/footer.php');
?>
