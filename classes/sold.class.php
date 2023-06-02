<?php
include_once(__DIR__ ."../../classes/model.class.php");
class Sold_Controller extends Model{
public function __construct()
{
parent::__construct();
}
public function add_to_sold($user_id,$product_id,$status,$date,$q,$u_id){

$stmt = $this->get_db()->prepare("insert into sold_product(user_id,product_id,sold_status,date_sold,quantity,user_info_id)
values (:user_id,:product_id,:sold_status,:date_sold,:quantity,:user_info_id)");
$stmt->bindValue(":user_id",$user_id);
$stmt->bindValue(":product_id",$product_id);
$stmt->bindValue(":sold_status",$status);
$stmt->bindValue(":date_sold",$date);
$stmt->bindValue(":quantity",$q);
$stmt->bindValue(":user_info_id",$u_id);
return $stmt->execute();
}
public function get_all_sold_product(){
$stmt = $this->get_db()->prepare("select
sold_product.sold_id,sold_product.quantity,sold_product.date_sold,sold_product.sold_status,
product.product_price,product.product_name,product.product_img,product.product_id,
user_info.user_info_id,user_info.state,user_info.city,user_info.streat,user_info.p_code,
user_info.phone,user_info.add_text,
users.user_id,users.user_name,users.user_email,users.user_img,users.user_info
from sold_product
inner join users on sold_product.user_id = users.user_id
inner join product on sold_product.product_id = product.product_id
inner join user_info on sold_product.user_info_id = user_info.user_info_id");
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_OBJ);
}


public function get_sold_detail_user($id){
$stmt = $this->get_db()->prepare("select
sold_product.sold_id,sold_product.quantity,sold_product.date_sold,sold_product.sold_status,
product.product_price,product.product_name,product.product_img,product.product_id,
user_info.user_info_id,user_info.state,user_info.city,user_info.streat,user_info.p_code,
user_info.phone,user_info.add_text,
users.user_id,users.user_name,users.user_email,users.user_img,users.user_info
from sold_product
inner join users on sold_product.user_id = users.user_id
inner join product on sold_product.product_id = product.product_id
inner join user_info on sold_product.user_info_id = user_info.user_info_id
where  users.user_id=:user_id");
$stmt->bindValue(":user_id",$id);
//$stmt->bindValue(":date_sold",$date);
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_OBJ);
}
public function get_sold_product(){
$stmt = $this->get_db()->prepare("select * from sold_product");
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_OBJ);
}
public function delete_sold_id($s_id){
$stmt = $this->get_db()->prepare("delete  from sold_product where sold_id = :sold_id");
$stmt->bindValue(":sold_id",$s_id);
return $stmt->execute();
}
public function countSold()
{
$stmt = $this->get_db()->prepare("select * from sold_product");
$stmt->execute();
return $stmt->rowCount();
}
public function get_sold_product_price(){
$stmt = $this->get_db()->prepare("select
sold_product.quantity,
product.product_price
from sold_product
inner join product on sold_product.product_id =
product.product_id");
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_OBJ);
}
public function editStatus($status, $id)
{
$stmt = $this->get_db()->prepare("update sold_product set sold_status=:sold_status where sold_id=:sold_id");
$stmt->bindValue(":sold_status", $status);
$stmt->bindValue(":sold_id", $id);
return $stmt->execute();
}

}