<?php
require ('controllers/Product.php');
$db= new Product();
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_GET['message'])){
    echo $_GET['message'];
}
?>
<div class="container d-flex justify-content-between align-items-center p-2 mb-2">
    <div>Начальная страница</div>
    <div>
        <a class="btn btn-outline-info" href="/views/users/index.php">Пользователи</a>
    </div>
</div>
<table class="table table-hover table-dark">
    <thead>
    <tr>
        <th>#</th>
        <th>Название</th>
        <th>ISBN</th>
        <th>Стоимость</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $data = $db->getData();
    foreach ($data as $key=>$row){
    ?>
    <tr>
        <td><?php echo ++$key;?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['ISBN'];?></td>
        <td><?php echo $row['price'];?></td>
    </tr>
    <?php }?>
    </tbody>
</table>
<div class="container mx-auto">
    <div style="display: grid; grid-template-columns: repeat(3,1fr)">
        <?php
        foreach ($data as $key =>$row){
        ?>
        <div class="card m-2">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['ISBN'];?></h5>
                <div>
                    <span class="card-subtitle text-muted">Название: </span>
                    <span class="card-text"><?php echo $row['name'];?></span>
                </div>
                <div>
                    <span class="card-subtitle text-muted">Стоимость:</span>
                    <span class="card-text"><?php echo $row['price'];?></span>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<script src="/public/js/bootstrap.bundle.min.js"></script>
</body>
</html>
