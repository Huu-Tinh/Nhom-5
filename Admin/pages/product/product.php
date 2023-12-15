<?php
class product
{
   var $name = null;
   var $price = null;
   var $img = null;
   var $img_1 = null;
   var $img_2 = null;
   var $img_3 = null;
   var $describe = null;
   var $quantity = null;
   var $id_product = null;
   var $categori_id = null;


   function getproduct_bestsell()
   {
      $db = new connect();
      $select = "SELECT od.product_id, p.*, c.name_ct, SUM(od.quantity_odt) AS total_quantity FROM orders_detail od JOIN products p ON od.product_id = p.id_product JOIN categories c ON p.categori_id = c.id_categori WHERE MONTH(od.created_at) = MONTH(NOW()) GROUP BY od.product_id, p.name_pr, p.id_product ORDER BY total_quantity DESC LIMIT 3;";
      return $db->pdo_query($select);
   }
   function getproduct()
   {
      $db = new connect();
      $select = "SELECT  products.*, categories.name_ct
      FROM products
      JOIN categories ON products.categori_id = categories.id_categori;";
      return $db->pdo_query($select);
   }
   function getpr_categori($id)
   {
      $db = new connect();
      $select = "SELECT * from products where categori_id = $id ";
      return $db->pdo_query($select);
   }
   function getpr_aToz()
   {
      $db = new connect();
      $select = "SELECT * from products ORDER BY name_pr ASC";
      return $db->pdo_query($select);
   }
   function getpr_priceAsc()
   {
      $db = new connect();
      $select = "SELECT * from products ORDER BY price ASC";
      return $db->pdo_query($select);
   }
   function getpr_priceDesc()
   {
      $db = new connect();
      $select = "SELECT * from products ORDER BY price DESC";
      return $db->pdo_query($select);
   }
   function getpr_dayAcs()
   {
      $db = new connect();
      $select = "SELECT * from products ORDER BY created_at ASC";
      return $db->pdo_query($select);
   }
   function getpr_dayDesc()
   {
      $db = new connect();
      $select = "SELECT * from products ORDER BY created_at DESC";
      return $db->pdo_query($select);
   }
   function getpr_featured()
   {
      $db = new connect();
      $select = "SELECT p.*, c.name_ct FROM products p JOIN categories c ON p.categori_id = c.id_categori ORDER BY p.created_at ASC LIMIT 3";
      return $db->pdo_query($select);
   }
   function listproduct()
   {
      $db = new connect();
      $select = "SELECT p.*,c.name_ct from products as p,categories as c where p.categori_id = c.id_categori";
      $result = $db->pdo_query($select);
      return $result;
   }

   public function checkId($id_product)
   {
      $db = new connect();
      $select = "SELECT * from products where id_product ='$id_product'";
      $result = $db->pdo_query_one($select);
      return $result;
   }
   function add($name, $price, $img, $img_1, $img_2, $img_3, $describe, $quantity, $categori_id)
   {
      $db = new connect();
      $query = "INSERT INTO products(`name_pr`,`price`,img,img_1,`img_2`,img_3, `describe`,`quantity`,`categori_id`) VALUES('$name','$price','$img','$img_1','$img_2','$img_3', '$describe','$quantity','$categori_id')";
      $result = $db->pdo_execute($query);
      return $result;
   }
   public function update($id_product, $name, $price, $img, $img_1, $img_2, $img_3, $describe, $quantity, $categori_id)
   {
      $db = new connect();
      $sql = "UPDATE products SET  name_pr = '$name', `price` = '$price', img = '$img', img_1 = '$img_1',img_2 = '$img_2', `img_3` ='$img_3',`describe` = '$describe', quantity ='$quantity',categori_id ='$categori_id'   WHERE id_product = " . $id_product;
      $result = $db->pdo_execute($sql);
      return $result;
   }

   public function delete($id_product)
   {
      $db = new connect();
      $sql = "DELETE FROM products WHERE id_product = " . $id_product;
      $result = $db->pdo_execute($sql);
      return $result;
   }
   function category($categori_id)
   {
      $db = new connect();
      $select = "SELECT * from products  where categori_id = " . $categori_id;
      $result = $db->pdo_query($select);
      return $result;
   }
   public function search($nameProduct)
   {
      $db = new connect();
      $sql = "SELECT * FROM products WHERE `name_pr` LIKE '%$nameProduct%' ";
      $result = $db->pdo_query($sql);
      return $result;
   }
}
