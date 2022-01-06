<?php  
	
	# Incluindo os arquivos necessários
	include_once "../models/connect.php";
	include_once "../models/manager.php";

	function validate_options(){
	    
	    //add_compras 
	    if(isset($_GET['descuento'])){
            include_once $GLOBALS['project_path']."/views/carrito/carrito.php";
        }
	    
	    //registro_financiero.php
	    if(isset($_GET['ano'])){
            include_once $GLOBALS['project_path']."/views/forms/registro_financiero.php";
        }
        if(isset($_GET['venta_ano'])){
            include_once $GLOBALS['project_path']."/views/forms/venta_financiero.php";
        }
        if(isset($_GET['evaluacion_ano'])){
            include_once $GLOBALS['project_path']."/views/forms/evaluacion_financiero.php";
        }
        
        #carrito
        if(isset($_GET['lista-productos'])){
            include_once $GLOBALS['project_path']."/views/carrito/lista-productos.php";
        }
        if(isset($_GET['producto'])){
            include_once $GLOBALS['project_path']."/views/carrito/carrito.php";
        }
        if(isset($_GET['productoVenta'])){
            include_once $GLOBALS['project_path']."/views/carritoVentas/carrito.php";
        }
        
        
	    
		if(!isset($_GET['option'])){
			return false;
		}
		
		//session_start();
    	$user = $_SESSION[md5("user_data")];
    	$cpf = $user['user_cpf'];
    	$cpf1 = array("user_cpf"  => $cpf);
    	//echo $cpf;

		switch($_GET['option']){
		    
		    case "productos-carrito":
				include_once $GLOBALS['project_path']."/views/carrito/carrito/cart.php";
			break;
			
			case "productos-venta":
				include_once $GLOBALS['project_path']."/views/carritoVentas/carrito/cart.php";
			break;
			
			case "checkout":
				include_once $GLOBALS['project_path']."/views/carrito/carrito/checkout.php";
			break;
			
			case "checkoutVenta":
				include_once $GLOBALS['project_path']."/views/carritoVentas/carrito/checkout.php";
			break;
			
			case "thankyou":
				include_once $GLOBALS['project_path']."/views/carrito/carrito/thankyou.php";
			break;
			
			case "thankyouVenta":
				include_once $GLOBALS['project_path']."/views/carritoVentas/carrito/thankyou.php";
			break;
			
		    
		    case "cumpleaños":
		        # Liberação das Ações
				$delete = false;
				$update = true;
				$print  = false;

				# Caminho das Ações
				$delete_destiny = "controllers/delete_profile.php";
				$update_destiny = "?option=#";
		        
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/forms/cumpleanos.php";
			break;
			
			case "cliente2":
			    # Liberação das Ações
				$delete = false;
				$update = true;
				$print  = false;

				# Caminho das Ações
				$delete_destiny = "controllers/delete_profile.php";
				$update_destiny = "?option=update_venta";
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/forms/cliente2.php";
			break;
			
			case "cliente14":
			    # Liberação das Ações
				$delete = false;
				$update = true;
				$print  = false;

				# Caminho das Ações
				$delete_destiny = "controllers/delete_profile.php";
				$update_destiny = "?option=#";
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/forms/cliente14.php";
			break;
			
			case "cliente60":
			    # Liberação das Ações
				$delete = false;
				$update = true;
				$print  = false;

				# Caminho das Ações
				$delete_destiny = "controllers/delete_profile.php";
				$update_destiny = "?option=#";
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/forms/cliente60.php";
			break;
			
			case "producto6":
			    
			    # Liberação das Ações
				$delete = false;
				$update = true;
				$print  = false;

				# Caminho das Ações
				$delete_destiny = "controllers/delete_estoque.php";
				$update_destiny = "?option=update_stock";
				
				# Filtro
				$filter = "id_estoque";
				$table_color = "#FF69B4";
				$table_icon = "plus";
				$table_header = " Lista de Stock <hr>";
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/forms/producto6.php";
			break;
			
			case "producto5":
			    
			    # Liberação das Ações
				$delete = false;
				$update = true;
				$print  = false;

				# Caminho das Ações
				$delete_destiny = "controllers/delete_estoque.php";
				$update_destiny = "?option=update_stock";
				
				# Filtro
				$filter = "id_estoque";
				$table_color = "#FF69B4";
				$table_icon = "plus";
				$table_header = " Lista de Stock <hr>";
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/forms/producto5.php";
			break;
			
			case "producto4":
			    
			    # Liberação das Ações
				$delete = false;
				$update = true;
				$print  = false;

				# Caminho das Ações
				$delete_destiny = "controllers/delete_estoque.php";
				$update_destiny = "?option=update_stock";
				
				# Filtro
				$filter = "id_estoque";
				$table_color = "#FF69B4";
				$table_icon = "plus";
				$table_header = " Lista de Stock <hr>";
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/forms/producto4.php";
			break;
			
			case "producto3":
				
				# Liberação das Ações
				$delete = false;
				$update = true;
				$print  = false;

				# Caminho das Ações
				$delete_destiny = "controllers/delete_estoque.php";
				$update_destiny = "?option=update_stock";
				
				# Filtro
				$filter = "id_estoque";
				$table_color = "#FF69B4";
				$table_icon = "plus";
				$table_header = " Lista de Stock <hr>";
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/forms/producto3.php";
			break;
			
			case "producto2":
				
				# Liberação das Ações
				$delete = false;
				$update = true;
				$print  = false;

				# Caminho das Ações
				$delete_destiny = "controllers/delete_estoque.php";
				$update_destiny = "?option=update_stock";
				
				# Filtro
				$filter = "id_estoque";
				$table_color = "#FF69B4";
				$table_icon = "plus";
				$table_header = " Lista de Stock <hr>";
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/forms/producto2.php";
			break;
			
			case "producto1":
				
				# Liberação das Ações
				$delete = false;
				$update = true;
				$print  = false;

				# Caminho das Ações
				$delete_destiny = "controllers/delete_estoque.php";
				$update_destiny = "?option=update_stock";
				
				# Filtro
				$filter = "id_estoque";
				$table_color = "#FF69B4";
				$table_icon = "plus";
				$table_header = " Lista de Stock <hr>";
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/forms/producto1.php";
			break;
			
			case "producto0":
				
				# Liberação das Ações
				$delete = false;
				$update = true;
				$print  = false;

				# Caminho das Ações
				$delete_destiny = "controllers/delete_estoque.php";
				$update_destiny = "?option=update_stock";
				
				# Filtro
				$filter = "id_estoque";
				$table_color = "#FF69B4";
				$table_icon = "plus";
				$table_header = " Lista de Stock <hr>";
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/forms/producto0.php";
			break;
		    
		    case "mensajes":
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/forms/mensajes.php";
			break;

            case "financiero":
				if(isset($_GET['ano']) == null){$ano = date("Y");}else{$ano = $_GET['ano'];}

				$Total_Venta = 0; $Total_Compra = 0;

				$Ano_Venta = 0; $Ano_Compra = 0;
			
				$Enero_Venta = 0; $Enero_Compra = 0;
			
				$Febrero_Venta = 0; $Febrero_Compra = 0;
			
				$Marzo_Venta = 0; $Marzo_Compra = 0;
			
				$Abril_Venta = 0; $Abril_Compra = 0;
			
				$Mayo_Venta = 0; $Mayo_Compra = 0;
			
				$Junio_Venta = 0; $Junio_Compra = 0;
			
				$Julio_Venta = 0; $Julio_Compra = 0;
			
				$Agosto_Venta = 0; $Agosto_Compra = 0;
			
				$Septiembre_Venta = 0; $Septiembre_Compra = 0;
			
				$Octubre_Venta = 0; $Octubre_Compra = 0;
			
				$Noviembre_Venta = 0; $Noviembre_Compra = 0;
			
				$Diciembre_Venta = 0; $Diciembre_Compra = 0;

				# Incluindo a 'THE FUCKING TABLE'
				$manager = new Manager;
				$ventas = $manager->select_common("tb_ventas", null, $cpf1, null);
				$manager = new Manager;
				$compras = $manager->select_common("tb_compras", null, $cpf1, null);
				$manager = new Manager;
				$ventasAno = $manager->select_common("tb_ventas", null, null, " WHERE user_cpf = $cpf AND YEAR(fecha_venta) = $ano");
				$manager = new Manager;
				$comprasAno = $manager->select_common("tb_compras", null, null, " WHERE user_cpf = $cpf AND YEAR(fecha_compra) = $ano");
				$manager = new Manager;
				$ventas1 = $manager->select_common("tb_ventas", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_venta) = 01 AND YEAR(fecha_venta) = $ano");
				$manager = new Manager;
				$compras1 = $manager->select_common("tb_compras", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_compra) = 01 AND YEAR(fecha_compra) = $ano");
				$manager = new Manager;
				$ventas2 = $manager->select_common("tb_ventas", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_venta) = 02 AND YEAR(fecha_venta) = $ano");
				$manager = new Manager;
				$compras2 = $manager->select_common("tb_compras", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_compra) = 02 AND YEAR(fecha_compra) = $ano");
				$manager = new Manager;
				$ventas3 = $manager->select_common("tb_ventas", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_venta) = 03 AND YEAR(fecha_venta) = $ano");
				$manager = new Manager;
				$compras3 = $manager->select_common("tb_compras", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_compra) = 03 AND YEAR(fecha_compra) = $ano");
				$manager = new Manager;
				$ventas4 = $manager->select_common("tb_ventas", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_venta) = 04 AND YEAR(fecha_venta) = $ano");
				$manager = new Manager;
				$compras4 = $manager->select_common("tb_compras", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_compra) = 04 AND YEAR(fecha_compra) = $ano");
				$manager = new Manager;
				$ventas5 = $manager->select_common("tb_ventas", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_venta) = 05 AND YEAR(fecha_venta) = $ano");
				$manager = new Manager;
				$compras5 = $manager->select_common("tb_compras", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_compra) = 05 AND YEAR(fecha_compra) = $ano");
				$manager = new Manager;
				$ventas6 = $manager->select_common("tb_ventas", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_venta) = 06 AND YEAR(fecha_venta) = $ano");
				$manager = new Manager;
				$compras6 = $manager->select_common("tb_compras", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_compra) = 06 AND YEAR(fecha_compra) = $ano");
				$manager = new Manager;
				$ventas7 = $manager->select_common("tb_ventas", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_venta) = 07 AND YEAR(fecha_venta) = $ano");
				$manager = new Manager;
				$compras7 = $manager->select_common("tb_compras", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_compra) = 07 AND YEAR(fecha_compra) = $ano");
				$manager = new Manager;
				$ventas8 = $manager->select_common("tb_ventas", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_venta) = 08 AND YEAR(fecha_venta) = $ano");
				$manager = new Manager;
				$compras8 = $manager->select_common("tb_compras", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_compra) = 08 AND YEAR(fecha_compra) = $ano");
				$manager = new Manager;
				$ventas9 = $manager->select_common("tb_ventas", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_venta) = 09 AND YEAR(fecha_venta) = $ano");
				$manager = new Manager;
				$compras9 = $manager->select_common("tb_compras", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_compra) = 09 AND YEAR(fecha_compra) = $ano");
				$manager = new Manager;
				$ventas10 = $manager->select_common("tb_ventas", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_venta) = 10 AND YEAR(fecha_venta) = $ano");
				$manager = new Manager;
				$compras10 = $manager->select_common("tb_compras", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_compra) = 10 AND YEAR(fecha_compra) = $ano");
				$manager = new Manager;
				$ventas11 = $manager->select_common("tb_ventas", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_venta) = 11 AND YEAR(fecha_venta) = $ano");
				$manager = new Manager;
				$compras11 = $manager->select_common("tb_compras", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_compra) = 11 AND YEAR(fecha_compra) = $ano");
				$manager = new Manager;
				$ventas12 = $manager->select_common("tb_ventas", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_venta) = 12 AND YEAR(fecha_venta) = $ano");
				$manager = new Manager;
				$compras12 = $manager->select_common("tb_compras", null, null, " WHERE user_cpf = $cpf AND MONTH(fecha_compra) = 12 AND YEAR(fecha_compra) = $ano");

				
				
				
				
				
				
				include_once $GLOBALS['project_path']."/views/forms/registro_financiero.php";
			break;
			
			case "venta_financiero":
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/forms/venta_financiero.php";
			break;
			case "evaluacion_financiero":
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/forms/evaluacion_financiero.php";
			break;

			case "base":
				# Busca	
				$manager = new Manager;
				$table_content = $manager->select_common("tb_profiles",null,null,null);
				
				# Titulos
				$table_titles['id_profile'] = "ID";	
				$table_titles['profile_name'] = "NOME DO PERFIL";	
				$table_titles['profile_page'] = "PÁGINA";	
				$table_titles['profile_desc'] = "DESCRIÇÃO";
				

				# Liberação das Ações
				$delete = false;
				$update = true;
				$print  = false;

				# Caminho das Ações
				$delete_destiny = "controllers/delete_profile.php";
				$update_destiny = "?option=#";

				# Filtro
				$filter = "id_profile";
				$table_color = "#FF69B4";
				$table_icon = "plus";
				$table_header = " Lista de Usuários <hr>";
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/list_common.php";
			break;
			
			case "add_client":
				include_once $GLOBALS['project_path']."/views/forms/add_cliente.php";
				
				# Busca	
				$manager = new Manager;
				$table_content = $manager->select_common("tb_clientes",null,$cpf1,null);
				
				# Titulos
				#$table_titles['id_cliente'] = "ID";
				$table_titles['cliente_name'] = "NOMBRE CLIENTE";
				$table_titles['dni'] = "DNI";
				$table_titles['cliente_phone'] = "TELEFONO";	
				$table_titles['cliente_cellphone'] = "SEGUNDO TELEFONO";
				$table_titles['cliente_address'] = "DIRECCIÓN";
				$table_titles['cliente_birth'] = "CUMPLEAÑOS";
				$table_titles['tipo_piel'] = "TIPO DE PIEL";
				$table_titles['cliente_created_in'] = "FECHA DE REGISTRO";

				# Liberação das Ações
				$delete = false;
				$update = true;
				$print  = false;

				# Caminho das Ações
				$delete_destiny = "controllers/delete_user.php";
				$update_destiny = "?option=update_client";

				# Filtro
				$filter = "id_cliente";
				$table_color = "#FF69B4";
				$table_icon = "plus";
				$table_header = " Lista de Clientes <hr>";
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/list_commonclient.php";
			break;

			case "manager_clients":
				# Busca	
				$manager = new Manager;
				$table_content = $manager->select_common("tb_clientes",null,$cpf1,null);
				
				# Titulos
				#$table_titles['id_cliente'] = "ID";
				$table_titles['cliente_name'] = "NOMBRE CLIENTE";
				$table_titles['dni'] = "DNI";
				$table_titles['cliente_phone'] = "TELEFONO";	
				$table_titles['cliente_cellphone'] = "SEGUNDO TELEFONO";
				$table_titles['cliente_address'] = "DIRECCIÓN";
				$table_titles['cliente_birth'] = "CUMPLEAÑOS";
				$table_titles['tipo_piel'] = "TIPO DE PIEL";
				$table_titles['cliente_created_in'] = "FECHA DE REGISTRO";

				# Liberação das Ações
				$delete = false;
				$update = true;
				$print  = false;

				# Caminho das Ações
				$delete_destiny = "controllers/delete_user.php";
				$update_destiny = "?option=update_client";

				# Filtro
				$filter = "id_cliente";
				$table_color = "#FF69B4";
				$table_icon = "plus";
				$table_header = " Lista de Clientes <hr>";
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/list_commonclient.php";
			break;

			case "add_user":
				include_once $GLOBALS['project_path']."/views/forms/add_user.php";
			break;
			case "manager_users":
				# Busca	
				$manager = new Manager;
				$table_content = $manager->select_common("tb_users",null,$cpf1,null);
				
				# Titulos
				$table_titles['id_user'] = "ID";	
				$table_titles['user_name'] = "NOME";	
				$table_titles['user_phone'] = "TELEFONE";	
				$table_titles['user_email'] = "EMAIL";	

				# Liberação das Ações
				$delete = false;
				$update = true;
				$print  = false;

				# Caminho das Ações
				$delete_destiny = "controllers/delete_user.php";
				$update_destiny = "?option=update_user";

				# Filtro
				$filter = "id_user";
				$table_color = "#FF69B4";
				$table_icon = "plus";
				$table_header = " Lista de Usuários <hr>";
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/list_common.php";
			break;
			
			case "add_productos":
				include_once $GLOBALS['project_path']."/views/forms/add_productos.php";
				
				# Busca	
				$manager = new Manager;
				$table_content = $manager->select_common("tb_productos",null,$cpf1,null);
				
				# Titulos
				#$table_titles['id_producto'] = "ID";
				$table_titles['codigo'] = "CODIGO";	
				$table_titles['product_name'] = "PRODUCTO";	
				$table_titles['tipo_producto'] = "TIPO DE PRODUCTO";	
				$table_titles['product_price'] = "PRECIO DE CATALOGO";
				$table_titles['puntos'] = "PUNTOS";	

				# Liberação das Ações
				$delete = false;
				$update = true;
				$print  = false;

				# Caminho das Ações
				$delete_destiny = "controllers/delete_producto.php";
				$update_destiny = "?option=update_producto";

				# Filtro
				$filter = "id_producto";
				$table_color = "#FF69B4";
				$table_icon = "plus";
				$table_header = " Lista de Productos <hr>";
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/list_common.php";
				
			break;
			case "manager_productos":
				# Busca	
				$manager = new Manager;
				$table_content = $manager->select_common("tb_productos",null,$cpf1,null);
				
				# Titulos
				#$table_titles['id_producto'] = "ID";
				$table_titles['codigo'] = "CODIGO";	
				$table_titles['product_name'] = "PRODUCTO";	
				$table_titles['tipo_producto'] = "TIPO DE PRODUCTO";	
				$table_titles['product_price'] = "PRECIO DE CATALOGO";

				# Liberação das Ações
				$delete = false;
				$update = true;
				$print  = false;

				# Caminho das Ações
				$delete_destiny = "controllers/delete_producto.php";
				$update_destiny = "?option=update_producto";

				# Filtro
				$filter = "id_producto";
				$table_color = "#FF69B4";
				$table_icon = "plus";
				$table_header = " Lista de Productos <hr>";
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/list_common.php";
			break;
			
			case "update_producto":

				$filter['id_producto'] = base64_decode($_GET['filter']);
				$manager = new Manager;
				$producto_r = $manager->select_common("tb_productos",null,$filter, null);

				$producto_r = $producto_r[0];

				

				include_once $GLOBALS['project_path']."/views/forms/update_producto.php";

			break;
			
			case "add_compras":
			    include_once $GLOBALS['project_path']."/views/carrito/carrito.php";
			break;
			case "manager_compras":
				# Busca	
				$manager = new Manager;
				$table_content = $manager->select_common("tb_compras",null,$cpf1,null);
				
				# Titulos
				#$table_titles['id_compra'] = "ID COMPRA";	
				$table_titles['fecha_compra'] = "FECHA COMPRA";	
				$table_titles['fecha_recepcion'] = "FECHA RECEPCION";	
				$table_titles['descuento_compra'] = "DESCUENTO";
				$table_titles['precio_compra'] = "PRECIO COMPRA";
				$table_titles['flete'] = "FLETE";

				# Liberação das Ações
				$delete = false;
				$update = true;
				$print  = false;

				# Caminho das Ações
				$delete_destiny = "controllers/delete_compra.php";
				$update_destiny = "?option=update_compra";

				# Filtro
				$filter = "id_compra";
				$table_color = "#FF69B4";
				$table_icon = "plus";
				$table_header = " Lista de Compras <hr>";
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/list_common.php";
			break;
			
			case "add_ventas":
				include_once $GLOBALS['project_path']."/views/carritoVentas/carrito.php";
			break;
			case "manager_ventas":
				# Busca	
				$manager = new Manager;
				$table_content = $manager->select_common("tb_ventas",null,$cpf1,null);
				
				# Titulos
				$table_titles['cliente_name'] = "NOMBRE CLIENTE";	
				$table_titles['producto_venta'] = "PRODUCTO VENDIDO";
				$table_titles['fecha_venta'] = "FECHA VENTA";
				$table_titles['fecha_entrega'] = "FECHA ENTREGA";
				$table_titles['precio_compra'] = "PRECIO COMPRA";
				$table_titles['precio_venta'] = "PRECIO VENTA";
				# Liberação das Ações
				$delete = false;
				$update = true;
				$print  = false;

				# Caminho das Ações
				$delete_destiny = "controllers/delete_venta.php";
				$update_destiny = "?option=update_venta";

				# Filtro
				$filter = "id_venta";
				$table_color = "#FF69B4";
				$table_icon = "plus";
				$table_header = " Lista de Ventas <hr>";
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/list_common.php";
			break;

			case "update_user":

				$filter['id_user'] = base64_decode($_GET['filter']);
				$user_r = select("tb_users",null,$filter, null);

				$user_r = $user_r[0];

				$profile_u = select("tb_profiles",array("profile_name"), array("id_profile"=>$user_r['profile_id']),null);

				include_once $GLOBALS['project_path']."/views/forms/update_user.php";

			break;
			
			case "update_client":

				$filter['id_cliente'] = base64_decode($_GET['filter']);
				$manager = new Manager;
				$cliente_r = $manager->select_common("tb_clientes",null,$filter, null);

				$cliente_r = $cliente_r[0];

				//$profile_u = select("tb_profiles",array("profile_name"), array("id_profile"=>$user_r['profile_id']),null);

				include_once $GLOBALS['project_path']."/views/forms/update_client.php";
				
            	# Incluindo os arquivos necessarios
            	$user = $_SESSION[md5("user_data")];
            	$cpf = $user['user_cpf'];
                $cpf1 = array("id_cliente"=>$cliente_r['id_cliente']);
            
                # Busca	
            	$manager = new Manager;
				$table_content = $manager->select_common("tb_ventas",null,$cpf1,null);
            	if($table_content){
					foreach ($table_content as $key => $value) {
						$precio_compra[] = $value['precio_compra'];
						$precio_venta[] = $value['precio_venta'];
					}
					$compra = array_sum($precio_compra);
					$venta = array_sum($precio_venta);
					$lucro = $venta - $compra;
					
					echo '<div class="row">';
					echo '<div class="col-md-3 form-control">';
					echo '<h5>Total de las Ventas: $'.$venta.'</h5>';
					echo '</div>';
					echo '<div class="col-md-3 form-control">';
					echo '<h5>Lucro Total: $'.$lucro.'</h5>';
					echo '</div>';
					echo '</div>';
					
					
					# Titulos
					#$table_titles['id_venta'] = "ID VENTA";
					$table_titles['cliente_name'] = "CLIENTE";
					$table_titles['producto_venta'] = "PRODUCTO";
					$table_titles['fecha_venta'] = "FECHA VENTA";
					$table_titles['precio_compra'] = "PRECIO COMPRA";
					$table_titles['precio_venta'] = "PRECIO VENTA";
					
					# Liberação das Ações
					$delete = false;
					$update = true;
					$print  = false;
				}
            	# Caminho das Ações
            	$delete_destiny = "controllers/delete_user.php";
            	$update_destiny = "?option=update_venta";
            
            	# Filtro
            	$filter = "id_venta";
            	$table_color = "#FF69B4";
            	$table_icon = "plus";
            	$table_header = " PRODUCTOS VENDIDOS: <hr>";
            	# Incluindo a 'THE FUCKING TABLE'
            	include_once $GLOBALS['project_path']."/views/list_common1.php";


			break;
			
			case "update_venta":

				$filter['id_venta'] = base64_decode($_GET['filter']);
				$venta_r = select("tb_ventas",null,$filter, null);

				$venta_r = $venta_r[0];

				

				include_once $GLOBALS['project_path']."/views/forms/update_venta.php";

			break;
			
			case "update_compra":

				$filter['id_compra'] = base64_decode($_GET['filter']);
				$manager = new Manager;
				$compra_r = $manager->select_common("tb_compras",null,$filter, null);

				$compra_r = $compra_r[0];

				

				include_once $GLOBALS['project_path']."/views/forms/update_compra.php";

			break;
			
			case "stock":
				# Busca	
				$manager = new Manager;
				$table_content = $manager->select_common("estoque",null,null," WHERE user_cpf = $cpf AND NOT tipo_producto = 'Muestra'");
				
				# Titulos
				#$table_titles['id_estoque'] = "ID STOCK";
				$table_titles['producto'] = "PRODUCTO";	
				$table_titles['precio'] = "PRECIO";	
				$table_titles['fecha_compra'] = "FECHA COMPRA";
				$table_titles['tipo_producto'] = "TIPO DE PRODUCTO";

				# Liberação das Ações
				$delete = false;
				$update = true;
				$print  = false;

				# Caminho das Ações
				$delete_destiny = "controllers/delete_compra.php";
				$update_destiny = "?option=update_stock";

				# Filtro
				$filter = "id_estoque";
				$table_color = "#FF69B4";
				$table_icon = "plus";
				$table_header = " Lista de Stock <hr>";
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/list_common_stock.php";
			break;
			
			case "update_stock":

				$filter['id_estoque'] = base64_decode($_GET['filter']);
				$stock_r = select("estoque",null,$filter, null);

				$stock_r = $stock_r[0];

				

				include_once $GLOBALS['project_path']."/views/forms/update_stock.php";

			break;
			
			case "muestras":
				# Busca	
				$manager = new Manager;
				$table_content = $manager->select_common("estoque",null,null," WHERE user_cpf = $cpf AND tipo_producto = 'Muestra'");
				
				# Titulos
				#$table_titles['id_estoque'] = "ID STOCK";	
				$table_titles['producto'] = "PRODUCTO";	
				$table_titles['precio'] = "PRECIO";	
				$table_titles['fecha_compra'] = "FECHA COMPRA";
				$table_titles['tipo_producto'] = "TIPO DE PRODUCTO";

				# Liberação das Ações
				$delete = false;
				$update = true;
				$print  = false;

				# Caminho das Ações
				$delete_destiny = "controllers/delete_compra.php";
				$update_destiny = "?option=update_stock";

				# Filtro
				$filter = "id_estoque";
				$table_color = "#FF69B4";
				$table_icon = "plus";
				$table_header = " Lista de Muestras <hr>";
				# Incluindo a 'THE FUCKING TABLE'
				include_once $GLOBALS['project_path']."/views/list_common_stock.php";
			break;

			default:
				echo "<h2> ERRO 404: NOT FOUND !</h2>";
			break;

		}

	}
?>
