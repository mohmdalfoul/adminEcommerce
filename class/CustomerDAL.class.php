<?php

class CustomerDAL extends General {
    public function getCustomers() {
        $sql = "SELECT
        customers.id,
        customers.firstname,
        customers.lastname,
        customers.username,
        customers.email,
        customers.phone_number
    FROM
        customers";
        return $this->getData( $sql );
    }

    public function getFavoriteCustomers() {
        $sql = "SELECT
        customers.id,
        customers.firstname,
        customers.lastname,
        customers.phone_number,
        customers.email,
        customers.username,
        SUM(
            order_items.quantity * order_items.price
        ) AS 'balance'
    FROM
        customers
    INNER JOIN orders ON orders.customer_id = customers.id
    INNER JOIN order_items ON order_items.order_id = orders.id
    GROUP BY
        customers.id
    ORDER BY
        SUM(
            order_items.quantity * order_items.price
        )
    DESC
    LIMIT 5";
        return $this->getData( $sql );
    }

    public function getTotalCustomers() {
        $sql = "SELECT COUNT(customers.id) as 'total_customers' FROM customers";
        $array = $this->getDataAssoc( $sql );
        return $array[ 'total_customers' ];
    }
    public function getCustomer($id){
      $conn = $this->getConnection();
      $id = mysqli_real_escape_string( $conn, $id);
      $sql="SELECT
      customers.id,
      customers.firstname,
      customers.lastname,
      customers.username,
      customers.phone_number
  FROM
      customers
  WHERE
      customers.id = $id";
      return $this->getDataAssoc($sql);
    }
}

?>