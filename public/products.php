<?php

require_once 'common.php';

if ($_SESSION['authenticated'] != 1) {

    echo "You need to be a god to enter this page";
    die();

} elseif($_SESSION['authenticated'] == 1){

    $sql = 'SELECT * FROM products';

    $stmt = $conn->prepare($sql);
    $res = $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll();

}

if(isset($_GET['logOut'])){

    $_SESSION['authenticated'] = 0;
    header("Location: index.php");

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= trans('Products'); ?></title>
    <link rel="stylesheet" href="main.css">
</head>
<body>

    <div>

        <table border="1" cellpadding="3">

                <tr>

                    <th align="middle"><?= trans('ID'); ?></th>
                    <th align="middle"><?= trans('Title'); ?></th>
                    <th align="middle"><?= trans('Description'); ?></th>
                    <th align="middle"><?= trans('Price'); ?></th>
                    <th align="middle"><?= trans('Edit'); ?></th>
                    <th align="middle"><?= trans('Delete'); ?></th>

                </tr>

            <?php foreach($rows as $row): ?>

                <tr>

                    <td align="middle"><img src="images/<?= $row['id'] ?>.jpg" width="70px" height="70px"></td>
                    <td align="middle"><?= $row['title'] ?></td>
                    <td align="middle"><?= $row['description'] ?></td>
                    <td align="middle"><?= $row['price'] ?></td>
                    <td align="middle"><a href="?edit=<?= $row['id']?>"><?= trans('Edit'); ?></a></td>
                    <td align="middle"><a href="?delete=<?= $row['id']?>"><?= trans('Delete'); ?></a></td>

                </tr>
                
            <?php endforeach; ?>  

        </table>

    </div>

    <div id="productsBtn">

        <span><a id="cartLink" href="?logOut" class="cartBtn"><?= trans('Log out') ?></a></span>
        <span><a id="cartLink" href="product.php" class="cartBtn"><?= trans('Add product') ?></a></span>

    </div>

</body>
</html>