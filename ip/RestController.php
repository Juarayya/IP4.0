<?php
require_once("MobileRestHandler.php");
$method = $_SERVER['REQUEST_METHOD'];
$view = "";
if(isset($_GET["page_key"]))
	$page_key = $_GET["page_key"];
/*
controls the RESTful services
URL mapping
*/
	switch($page_key){

		case "test":
			// to handle REST Url /mobile/list/
			$mobileRestHandler = new MobileRestHandler();
			$result = $mobileRestHandler->test();
			break;

		case "authLogin":
			// to handle REST Url /mobile/list/
			$mobileRestHandler = new MobileRestHandler();
			$result = $mobileRestHandler->authLogin();
			break;
			
		case "createUser":
			// to handle REST Url /mobile/list/
			$mobileRestHandler = new MobileRestHandler();
			$result = $mobileRestHandler->createUser();
			break;

		case "readUser":
			// to handle REST Url /mobile/list/
			$mobileRestHandler = new MobileRestHandler();
			$result = $mobileRestHandler->readUser();
			break;

		case "updateUser":
			// to handle REST Url /mobile/update/<row_id>
			$mobileRestHandler = new MobileRestHandler();
			$mobileRestHandler->updateUser();
		break;

		case "deleteUser":
			// to handle REST Url /mobile/update/<row_id>
			$mobileRestHandler = new MobileRestHandler();
			$mobileRestHandler->deleteUser();
		break;

		case "merchantRead":
			// to handle REST Url /mobile/update/<row_id>
			$mobileRestHandler = new MobileRestHandler();
			$mobileRestHandler->merchantRead();
		break;

		case "pointList":
			// to handle REST Url /mobile/list/
			$mobileRestHandler = new MobileRestHandler();
			$result = $mobileRestHandler->pointList();
			break;

		case "merchantList":
			// to handle REST Url /mobile/list/
			$mobileRestHandler = new MobileRestHandler();
			$result = $mobileRestHandler->merchantList();
			break;

		case "merchantListNot":
			// to handle REST Url /mobile/update/<row_id>
			$mobileRestHandler = new MobileRestHandler();
			$mobileRestHandler->merchantListNot();
		break;

		case "kursMerchant":
			// to handle REST Url /mobile/update/<row_id>
			$mobileRestHandler = new MobileRestHandler();
			$mobileRestHandler->kursMerchant();
		break;

		case "kursTrade":
			// to handle REST Url /mobile/update/<row_id>
			$mobileRestHandler = new MobileRestHandler();
			$mobileRestHandler->kursTrade();
		break;

		case "tradeMerchant":
			// to handle REST Url /mobile/list/
			$mobileRestHandler = new MobileRestHandler();
			$result = $mobileRestHandler->tradeMerchant();
			break;
			
		case "productList":
			// to handle REST Url /mobile/list/
			$mobileRestHandler = new MobileRestHandler();
			$result = $mobileRestHandler->productList();
			break;

		case "redeemProduct":
			// to handle REST Url /mobile/list/
			$mobileRestHandler = new MobileRestHandler();
			$result = $mobileRestHandler->redeemProduct();
			break;
		
		case "adminLogin":
			// to handle REST Url /mobile/update/<row_id>
			$mobileRestHandler = new MobileRestHandler();
			$mobileRestHandler->adminLogin();
		break;
}
?>
