<table border="1">
    <tr>
        <th>#</th>
        <th>Created at</th>
        <th>User</th>
        <th>Sum</th>
    </tr>
    <?php foreach ($orders as $order):

    ?>
    <tr>
        <td><a href="orders/view" name="new_order_btn"><?= $order->id ?></td>
        <td><?= $order->createdAt ?></td>
        <td><?= $order->user->name ?></td>
        <td><?= $order->sum ?></td>
    </tr>
<?php endforeach ?>
</table>