<?php namespace Halo;




class orders extends Controller
{
    public $requires_auth = false;

    function index()
    {
        $order = \R::findAll('order');
        $user = \R::findAll('user');
        $product = \R::findAll('product');
//        $order->user = $user;
//
//
//
//        \R::store($product);
//
//        $order->sharedProductList[] = $product;
//        $order->createdAt = '2017-05-28';
//        \R::store($order);
        $rows = \R::getAll('SELECT *, SUM(product.price * product.quantity) sum 
                                         FROM `order`
                                         JOIN order_product ON(order_product.order_id = `order`.id)
                                         JOIN product ON(order_product.product_id = `product`.id)
                                         GROUP BY order_id
                                          ');
        $this->orders = \R::convertToBeans('order',$rows);

    }
    function create(){

        $order = \R::findAll('order');
        $user = \R::findAll('user');
        $this->users = $user;
        $product = \R::findAll('product');
        $this->products = $product;
        $order->user = $user;

    }
    function view(){

        $rows = \R::getAll('SELECT *, SUM(product.price * product.quantity) sum 
                                         FROM `order`
                                         JOIN order_product ON(order_product.order_id = `order`.id)
                                         JOIN product ON(order_product.product_id = `product`.id)
                                         GROUP BY order_id
                                          ');
        $this->orders = \R::convertToBeans('order',$rows);

    }

    function delete_order(){

//        \R::trash( 'order', $_POST['order_id'] );

        \R::exec("DELETE FROM `order` WHERE id=?",[$_POST['order_id']]);

        exit("Ok");
    }

    function create_order(){

        $order = \R::dispense('order');

        $order->createdAt = '2017-05-28';
        $order->user_id = $_POST['user'];
        \R::store($order);

        header('Location: ' . BASE_URL . 'orders');
        exit();

    }


}