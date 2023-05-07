<?php

class OrderDAL extends General {
    public function getOrders() {
        $sql = "SELECT
        orders.id,
        orders.date,
        orders.status
    FROM
        orders";
        return $this->getData( $sql );
    }

    public function getOrderCustomer( $id ) {
        $conn = $this->getConnection();
        $id = mysqli_real_escape_string( $conn, $id );
        $sql = "SELECT
        orders.id,
        orders.date,
        orders.status,
        orders.address,
        customers.id AS 'customer_id',
        customers.firstname,
        customers.lastname,
        customers.username,
        customers.phone_number
    FROM
        orders
    INNER JOIN customers ON orders.customer_id = customers.id
    WHERE
        orders.id = $id";
        return $this->getDataAssoc( $sql );
    }

    public function getOrderItems( $id ) {
        $conn = $this->getConnection();
        $id = mysqli_real_escape_string( $conn, $id );
        $sql = "SELECT
        items.id,
        items.name_english,
        items.name_arabic,
        categories.name_english AS 'category_name_english',
        categories.name_arabic AS 'category_name_arabic',
        order_items.quantity,
        order_items.price
    FROM
        items
    INNER JOIN categories ON items.category_id = categories.id
    INNER JOIN order_items ON order_items.item_id = items.id
    WHERE
        order_items.order_id = $id";
        return $this->getData( $sql );
    }

    public function getMonthOrdersProfit() {
        $sql = "SELECT
        orders.id,
        MONTHNAME( orders.date ) AS 'month_name',
        SUM(
            order_items.quantity * order_items.price
        ) AS 'profit'
        FROM
        orders
        INNER JOIN order_items ON order_items.order_id = orders.id
        GROUP BY
        MONTHNAME( orders.date )";
        return $this->getData( $sql );
    }

    public function editOrderStatus( $id, $status ) {
        $conn = $this->getConnection();
        $id = mysqli_real_escape_string( $conn, $id );
        $status = mysqli_real_escape_string( $conn, $status );
        $sql = "UPDATE
        orders
    SET
        orders.status = '$status'
    WHERE
        orders.id = $id";
        return $this->executeQuary( $sql );
    }
    public function getTotalSales(){
        $sql="SELECT SUM(order_items.quantity*order_items.price) AS 'total_sales' FROM order_items";
        $array=$this->getDataAssoc($sql);
        return $array['total_sales'];
    }
    public function getTotalOrders(){
        $sql="SELECT COUNT(orders.id) AS 'total_orders' FROM orders";
        $array=$this->getDataAssoc($sql);
        return $array['total_orders'];
    }
}
?>