<?php  

	# Incluindo os arquivos necessários
	include_once dirname(__DIR__)."/models/config.php";
	include_once $project_path."/models/connect.php";
	include_once $project_path."/models/manager.php";

	# Validando a sessão
	session_start();

	if(!isset($_SESSION[md5("user_data")])){
		header("location: $project_index?error=access_denied");
	}

	# Recuperando os dados da sessão
	$user = $_SESSION[md5("user_data")];
	
	# Testando se é realmente um ADMIN 
	if($user['profile_page'] != "admin.php" || $user['profile_page'] != "cliente.php"){
		header("location: $project_index?error=access_denied");
	}


	if(isset($_GET['action']) && $_GET['action'] == "delete"){
		$_POST['action'] = "delete";
	}

	switch($_POST['action']){

		case 'add':
			$manager = new Manager;
			unset($_POST['action']);
			$manager->insert_common("tb_compras", $_POST, null);
		break;

		case 'edit':
			$manager = new Manager;
			unset($_POST['action']);
			$manager->update_common("tb_compras", $_POST, ['id_compra'=>$_POST['id_compra']],null);
		break;

		case 'delete':
			$manager = new Manager;
			unset($_POST['action']);
			$manager->delete_common("tb_compras",['id_compra'=>$_GET['id']],null);
		break;
	}

		# Redirecionamento
		header("location: $project_index/".$user['profile_page']."?option=manager_clients&success=insert_ok");
?>





<?php
	# Incluindo os arquivos necessários
	include_once dirname(__DIR__)."/models/config.php";
	include_once $project_path."/models/connect.php";
	include_once $project_path."/models/managercompras.php";
	# Validando a sessão
	
			$manager = new Manager;
			unset($_POST['action']);
			$manager->update_common("tb_compras", $_POST, ['id_compra'=>$_POST['id_compra']],null);
			# Redirecionamento
			

	
?>