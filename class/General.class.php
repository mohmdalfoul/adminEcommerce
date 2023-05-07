<?php

class General extends DAL {
    public function getCategory( $id ) {
        $conn = $this->getConnection();
        $id = mysqli_real_escape_string( $conn, $id );
        $sql = "SELECT categories.name_english,categories.name_arabic,categories.image FROM categories WHERE categories.id='$id'";
        return $this->getDataAssoc( $sql );
    }
    public function getTopBanner(){
        $sql="SELECT baner.id,baner.image,baner.item_id
        FROM baner";
        return $this->getData($sql);
    }

    public function getCategories() {
        $sql = "SELECT
      categories.id,
      categories.name_english,
      categories.name_arabic,
      categories.image
  FROM
      categories";
        return $this->getData( $sql );
    }
    public function deleteCategory($id){
        $conn = $this->getConnection();
        $id = mysqli_real_escape_string( $conn, $id );
        $sql="DELETE FROM categories WHERE categories.id='$id'";
        return $this->executeQuary($sql);
    }
    public function editCategory(){
       /* $conn = $this->getConnection();
        $id = mysqli_real_escape_string( $conn, $id );
        $sql="DELETE FROM categories WHERE categories.id='$id'";
        return $this->executeQuary($sql);*/
    }
    public function getPermissionArray($id){
        $conn = $this->getConnection();
        $id = mysqli_real_escape_string( $conn, $id );
        $sql="SELECT
        permissions.page_name
    FROM
        permissions
    WHERE
        permissions.user_id = $id";
    return $this->getDataAssoc( $sql );
    }
}
//$id = real_escape_string( $id )

?>