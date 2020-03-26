<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class Mobile {
	private $mobiles = array();
	public function test(){
		if(isset($_GET['name'])){
			$name = $_GET['name'];
			$query = 'SELECT `id`, `email`, `password` FROM `user` WHERE name LIKE "%' .$name. '%"';
		} else {
			$query = 'SELECT `id`, `name`, `password` FROM `user` WHERE 1';
		}
		$dbcontroller = new DBController();
		$this->mobiles = $dbcontroller->executeSelectQuery($query);
		return $this->mobiles;
		// return $this->getLastId("Aytidarp","ainunrahmi@gmail.com","081243681618","aytidarp");
	}

	public function authLogin(){
		if(isset($_GET['email'])){
			$email = $_GET['email'];
			$password = $_GET['password'];
			$query = 'SELECT `id`, `name`, `phone`, `email`, `password`, `type`, `photo`, `created` FROM `user` WHERE email="'.$email.'" AND password="'.$password.'"';
		} 
		$dbcontroller = new DBController();
		$this->mobiles = $dbcontroller->executeSelectQuery($query);
		return $this->mobiles;
	}

	public function createUser(){
		if(isset($_GET['email'])){
			$email = $_GET['email'];
			$password = $_GET['password'];
			$name = $_GET['name'];
			$hp = $_GET['phone'];
			$type = "Basic";
			$photo = "img/user3.png";
			$query = 'INSERT INTO `user`(`name`, `phone`, `email`, `password`, `type`, `photo`, `created`) VALUES ("'.$name.'","'.$hp.'","'.$email.'","'.$password.'","'.$type.'","'.$photo.'",now())';
		}
		$dbcontroller = new DBController();
		$result= $dbcontroller->executeQuery($query);
		if($result != 0){
			$result = array('success'=>1);
			return $result;
		}
	}

	public function readUser(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query = 'SELECT `id`, `name`, `phone`, `email`, `password`, `type`, `photo`, `created` FROM `user` WHERE id="'.$id.'"';
		}
		$dbcontroller = new DBController();
		$this->mobiles = $dbcontroller->executeSelectQuery($query);
		return $this->mobiles;
	}

	public function updateUser(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$email = $_GET['email'];
			$password = $_GET['password'];
			$name = $_GET['name'];
			$phone = $_GET['phone'];
			$type = $_GET['type'];
			$photo = $_GET['photo'];

			// $query = 'UPDATE `user` SET `email`="'.$email.'",`password`="'.$password.'",`name`="'.$name.'",`hp`="'.$hp.'" WHERE id="'.$id.'"';
			$query = 'UPDATE `user` SET `email`="'.$email.'",`name`="'.$name.'",`phone`="'.$phone.'",`photo`="'.$photo.'",`type`="'.$type.'" WHERE id="'.$id.'"';
		}
		$dbcontroller = new DBController();
		$result= $dbcontroller->executeQuery($query);
		if($result != 0){
			$result = array('success'=>1);
			return $result;
		}
	}

	public function deleteUser(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query = 'DELETE FROM `user` WHERE id = "'.$id.'"';
		}
		$dbcontroller = new DBController();
		$result= $dbcontroller->executeQuery($query);
		if($result != 0){
			$result = array('success'=>1);
			return $result;
		}
	}


	public function merchantRead(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query = 'SELECT `name`, `description`, `photo`, `type`, `created` FROM `merchant` WHERE id="'.$id.'"';
		}
		$dbcontroller = new DBController();
		$this->mobiles = $dbcontroller->executeSelectQuery($query);
		return $this->mobiles;
	}


	public function pointList(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query = 'SELECT linkage.id_merchant, name,photo, username, phone, email, state, point FROM `linkage` JOIN merchant ON linkage.id_merchant = merchant.id JOIN point ON linkage.id_merchant = point.id_merchant AND linkage.id_user = point.id_user WHERE linkage.id_user="'.$id.'" ORDER BY linkage.id_merchant ASC';
		}
		$dbcontroller = new DBController();
		$this->mobiles = $dbcontroller->executeSelectQuery($query);
		return $this->mobiles;
	}

	public function pointRead(){
		if(isset($_GET['userid'])){
			$userid = $_GET['userid'];
			$merchantid = $_GET['merchantid'];
			$query = 'SELECT linkage.id_merchant, name,photo, username, phone, email, state, point FROM `linkage` JOIN merchant ON linkage.id_merchant = merchant.id JOIN point ON linkage.id_merchant = point.id_merchant AND linkage.id_user = point.id_user WHERE linkage.id_user="'.$userid.'" AND merchant.id="'.$merchantid.'" ORDER BY linkage.id_merchant ASC';
		}
		$dbcontroller = new DBController();
		$this->mobiles = $dbcontroller->executeSelectQuery($query);
		return $this->mobiles;
	}

	public function merchantList(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query = 'SELECT linkage.id_merchant, name, username, phone,photo, email, state FROM `linkage` JOIN merchant ON linkage.id_merchant = merchant.id WHERE linkage.id_user="'.$id.'"';
		}
		$dbcontroller = new DBController();
		$this->mobiles = $dbcontroller->executeSelectQuery($query);
		return $this->mobiles;
	}

	public function merchantListNot(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$merchant = $_GET['merchant'];
			$query = 'SELECT linkage.id_merchant, name, username, phone,photo, email, state FROM `linkage` JOIN merchant ON linkage.id_merchant = merchant.id WHERE linkage.id_user="'.$id.'" AND linkage.id_merchant <> "'.$merchant.'"';
		}
		$dbcontroller = new DBController();
		$this->mobiles = $dbcontroller->executeSelectQuery($query);
		return $this->mobiles;
	}

	public function kursMerchant(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query = 'SELECT `id_merchant`, `nominal` FROM `kurs` WHERE id_merchant="'.$id.'"';
		}
		$dbcontroller = new DBController();
		$this->mobiles = $dbcontroller->executeSelectQuery($query);
		return $this->mobiles;
	}

	public function kursTrade(){
		if(isset($_GET['source'])){
			$source = $_GET['source'];
			$target = $_GET['target'];
			$query = 'SELECT (SELECT nominal FROM `kurs` WHERE id_merchant="'.$source.'")/(SELECT nominal FROM `kurs` WHERE id_merchant="'.$target.'") AS Kurs';
		}
		$dbcontroller = new DBController();
		$this->mobiles = $dbcontroller->executeSelectQuery($query);
		return $this->mobiles;
	}


	public function tradeMerchant(){
		if(isset($_GET['id_user'])){
			$id_user = $_GET['id_user'];
			$id_source = $_GET['id_source'];
			$id_target = $_GET['id_target'];
			$point_source = $_GET['point_source'];
			$point_target = $_GET['point_target'];

			// $query = 'UPDATE `point` SET `point`= `point`-'.$point_source.' WHERE id_user = '.$id_user.' AND id_merchant = '.$id_source;
			// $query = 'UPDATE `point` SET `point`= `point`+'.$point_target.' WHERE id_user = '.$id_user.' AND id_merchant = '.$id_target;

			$query = 'INSERT INTO `trade`(`id_user`, `id_source`, `id_target`, `point_source`, `point_target`, `created`) VALUES ("'.$id_user.'","'.$id_source.'","'.$id_target.'","'.$point_source.'","'.$point_target.'",now())';

			// $query = 'INSERT INTO `notification`(`id_user`, `subject`, `description`, `icon`, `state`, `created`) VALUES ("'.$id_user.'","Trade Berhasil","Anda berhasil melakukan trade '.$point_source.' point '.$merchant_source.' ke '.$point_source.' point '.$merchant_target.'","account_balance_wallet","0",now())';
		}
		$dbcontroller = new DBController();
		$result= $dbcontroller->executeQuery($query);
		if($result != 0){
			$result = array('success'=>1);
			return $result;
		}
	}

	public function productList(){
		if(isset($_GET['id_merchant'])){
			$id_merchant = $_GET['id_merchant'];
			$query = 'SELECT `id`, `name`, `description`, `price`, `max_limit`, `photo`, `available_from`, `available_until`, `created` FROM `product` WHERE id_merchant = "'.$id_merchant.'"';
		}
		$dbcontroller = new DBController();
		$this->mobiles = $dbcontroller->executeSelectQuery($query);
		return $this->mobiles;
	}

	public function redeemProduct(){
		if(isset($_GET['id_user'])){
			$id_user = $_GET['id_user'];
			$id_merchant = $_GET['id_merchant'];
			$merchant = $_GET['merchant'];
			$id_product = $_GET['id_product'];
			$product = $_GET['product'];
			$quantity = $_GET['quantity'];
			$point = $_GET['point'];

			$query = 'UPDATE `point` SET `point`= `point`-'.$point.' WHERE id_user = '.$id_user.' AND id_merchant = '.$id_merchant;

			$query = 'INSERT INTO `redeem`(`id_user`, `id_merchant`, `id_product`, `quantity`, `point`, `created`) VALUES ("'.$id_user.'","'.$id_merchant.'","'.$id_product.'","'.$quantity.'","'.$point.'",now())';

			$query = 'INSERT INTO `notification`(`id_user`, `subject`, `description`, `icon`, `state`, `created`) VALUES ("'.$id_user.'","Trade Berhasil","Anda berhasil melakukan redeem '.$point.' point '.$merchant.' untuk produk '.$product.'","local_mall","0",now())';
		}
		$dbcontroller = new DBController();
		$result= $dbcontroller->executeQuery($query);
		if($result != 0){
			$result = array('success'=>1);
			return $result;
		}
	}


}
?>