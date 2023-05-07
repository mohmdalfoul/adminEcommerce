<?php

class ItemDAL extends General {

    public function getMaxItemId(){
      $sql="SELECT MAX(items.id) as 'max_id' FROM items";
      $array=$this->getDataAssoc($sql);
      return $array["max_id"];
    }
    public function addItemImage($id,$image){
        $conn = $this->getConnection();
        $id = mysqli_real_escape_string( $conn, $id);
        $image = mysqli_real_escape_string( $conn, $image);
        $sql="INSERT
        INTO
            `items_images`(`item_id`, `image`)
        VALUES($id,'$image')";
        return $this->executeQuary( $sql );
    }
    public function addItem( $item ) {
        $conn = $this->getConnection();
        $name_english = mysqli_real_escape_string( $conn, $item->getEnglishName() );
        $name_arabic = mysqli_real_escape_string( $conn, $item->getArabicName() );
        $price = mysqli_real_escape_string( $conn, $item->getPrice() );
        $new_item=mysqli_real_escape_string( $conn,$item->getNewItem());
        $availability=mysqli_real_escape_string( $conn,$item->getAvailability());
        $description_english=mysqli_real_escape_string( $conn,$item->getDescriptionEnglish());
        $description_arabic=mysqli_real_escape_string( $conn,$item->getDescriptionArabic());
        $category=mysqli_real_escape_string( $conn,$item->getCategory());
        $sql="INSERT
        INTO
            `items`(
                `name_english`,
                `name_arabic`,
                `price`,
                `new_item`,
                `availability`,
                `description_english`,
                `description_arabic`,
                `category_id`
            )
        VALUES(
            '$name_english',
            '$name_arabic',
            $price,
            $new_item,
            $availability,
            '$description_english',
            '$description_arabic',
            $category
        )";
        return $this->executeQuary( $sql );
    }

    public function deleteItem( $id ) {
        $conn = $this->getConnection();
        $id = mysqli_real_escape_string( $conn, $id );
        $sql = "DELETE FROM products WHERE id=$id";
        return $this->executeQuary( $sql );
    }

    public function updateItem( $product, $id ) {
        $conn = $this->getConnection();
        $id = mysqli_real_escape_string( $conn, $id );
        $name = mysqli_real_escape_string( $conn, $product->getName() );
        $price = mysqli_real_escape_string( $conn, $product->getPrice() );
        $status = mysqli_real_escape_string( $conn, $product->getStatus() );
        $cat_id = 1;
        $sql = "UPDATE `products` SET `name`='$name',`price`=$price,`status`='$status',`discount`=0,`category_id`=$cat_id WHERE id=$id";
        return $this->executeQuary( $sql );
    }

    public function getItems() {
        $sql = "SELECT
        items.*,
        categories.name_english AS 'category_name_english',
        categories.name_arabic AS 'category_name_arabic',
        categories.image AS 'category_image'
    FROM
        items
    INNER JOIN categories ON items.category_id = categories.id";
        return $this->getData( $sql );
    }

    public function getLimitItems( $limit, $offset ) {
        $conn = $this->getConnection();
        $offset = mysqli_real_escape_string( $conn, $offset );
        $sql = "SELECT
        items.*,
        categories.name_english AS 'category_name_english',
        categories.name_arabic AS 'category_name_arabic',
        categories.image AS 'category_image'
    FROM
        items
    INNER JOIN categories ON items.category_id = categories.id
    LIMIT $limit OFFSET $offset
    ";
        return $this->getData( $sql );
    }

    public function getItem($id){
        $conn = $this->getConnection();
        $id = mysqli_real_escape_string( $conn, $id );
        $sql="SELECT
        items.id,
        items.name_english,
        items.name_arabic,
        items.price,
        items.new_item,
        items.availability,
        categories.name_english AS 'category_name_english',
        categories.name_arabic AS 'category_name_arabic',
        items.description_english,
        items.description_arabic
    FROM
        items
    INNER JOIN categories ON items.category_id = categories.id
    WHERE
        items.id = $id";
       return $this->getDataAssoc($sql);
    }
    public function getItemImages($id){
        $conn = $this->getConnection();
        $id = mysqli_real_escape_string( $conn, $id );
        $sql="SELECT items_images.image FROM items_images WHERE items_images.item_id=$id";
        return $this->getData($sql);
    }

    public function getMostSailedItems() {
        $sql = "SELECT
        items.id,
        items.name_english,
        items.price,
        SUM( order_items.quantity ) AS 'quantity'
        FROM
        items
        INNER JOIN order_items ON order_items.item_id = items.id
        GROUP BY
        items.id
        ORDER BY
        SUM( order_items.quantity )
        DESC
        LIMIT 5";
        return $this->getData( $sql );
    }

    public function getTotalItems() {
        $sql = "SELECT COUNT(items.id) AS 'items_count' FROM items";
        $count_array = $this->getDataAssoc( $sql );
        $count = $count_array[ 'items_count' ];
        return $count;
    }

    public function getNewArrival() {
        $sql = "SELECT
        items.id,
        items.name_english,
        items.name_arabic,
        items.price,
        items.description_english,
        items.description_arabic
    FROM
        items
    WHERE
        items.availability = 1 AND items.new_item = 1";
        return $this->getData($sql);
    }
    public function getNumberOfOrdersItem($id){
        $conn = $this->getConnection();
        $id = mysqli_real_escape_string( $conn, $id );
        $sql="SELECT
        COUNT(order_items.order_id) AS 'item_orders_number'
    FROM
        order_items
    WHERE
        order_items.item_id = $id";
    $count_array = $this->getDataAssoc( $sql );
    $count = $count_array['item_orders_number'];
    return $count;
    }

    public function getSoldQuantity($id){
        $conn = $this->getConnection();
        $id = mysqli_real_escape_string( $conn, $id );
        $sql="SELECT
        SUM(order_items.quantity) AS 'sold_quantity'
    FROM
        order_items
    WHERE
        order_items.item_id = $id";
     $count_array = $this->getDataAssoc( $sql );
     $count = $count_array['sold_quantity'];
     return $count;
    }

    public function getFullQuantity($id){
        $conn = $this->getConnection();
        $id = mysqli_real_escape_string( $conn, $id );
        $sql="SELECT
        SUM(items_transactions.quantity) AS 'full_item_quantity'
    FROM
        items_transactions
    WHERE
        items_transactions.item_id =$id";
    $count_array = $this->getDataAssoc( $sql );
    $count = $count_array['full_item_quantity'];
    return $count;
    }
}

/*
SELECT
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
LIMIT 5
*/

/*
SELECT
MONTHNAME( orders.date ) AS 'month_name',
SUM(
    order_items.quantity * order_items.price
) AS 'profit'
FROM
orders
INNER JOIN order_items ON order_items.order_id = orders.id
GROUP BY
MONTHNAME( orders.date )
*/

/*
SELECT
items.name_english,
SUM( order_items.quantity ) AS 'quantity'
FROM
items
INNER JOIN order_items ON order_items.item_id = items.id
GROUP BY
items.id
ORDER BY
SUM( order_items.quantity )
DESC
LIMIT 5
*/
?>