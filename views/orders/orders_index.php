<a href="orders/create" name="new_order_btn"><?= __('Add new order') ?></a>
<table border="1">
    <tr>
        <th>#</th>
        <th>Created at</th>
        <th>User</th>
        <th>Sum</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($orders as $order):

        ?>
        <tr>
            <td><a href="orders/view" name="new_order_btn"><?= $order->id ?></td>
            <td><?= $order->createdAt ?></td>
            <td><?= $order->user->name ?></td>
            <td><?= $order->sum ?></td>
            <td><a id="<?= $order->id ?>" class="delete-order"><?='Delete'?></a></td>
        </tr>
    <?php endforeach ?>
</table>

<script>

    $('.delete-order').on('click', function () {

            $.post("orders/delete_order", {
                order_id: $(this).attr('id')
            }, function (res) {
                if (res === 'Ok') {
                    console.log('test');
                    window.location.href = "<?= BASE_URL ?>orders";
                }
                else {
                    alert(res);
                }
            });
        });


</script>