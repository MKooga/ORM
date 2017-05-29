<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 5/28/2017
 * Time: 11:09
 */

?>


<html>
<body>

<form action="orders/create_order" method="post">
    Product:  <select name="product">

        <?php foreach ($products as $product):?>
            <option value="<?=$product->id ?>"><?=$product->id ?></option>
        <?php endforeach ?>

    </select>
    User:  <select name="user">

        <?php foreach ($users as $user):?>
            <option value="<?=$user->id ?>"><?=$user->name ?></option>
        <?php endforeach ?>

    </select>

    <input type="submit">
</form>

</body>
</html>
