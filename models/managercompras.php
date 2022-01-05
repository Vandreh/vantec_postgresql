<meta charset="utf-8">

<?php
	class Manager extends Connect{
		# Metódo de INSERÇÃO normal, apenas uma tabela...
		public function insert_common($table, $data, $query_extra){
			$data1 = $data;
			$id_compra;
			//criando o objeto pdo...
			$pdo = parent::get_instance();
			//pegando apenas os nomes dos campos, apartir das chaves dos arrays...
			$fields = implode(", ", array_keys($data));
			//pegando os nomes dos campos para usar pra substituição de valores
			$values = ":".implode(", :", array_keys($data));
			//preparando query apartir dos campos($fields) e os parametros de valores nomeados($values)
			$query = "INSERT INTO $table (fecha_compra, fecha_recepcion, descuento_compra, precio_compra, flete, impuesto, id_producto, product_name, product_price, tipo_producto, codigo, lote, puntos, cantidad, user_cpf)";

			for($i = 0; $i < count($data[1]); $i++){
				if($data[1][$i]['cantidad'] == null || $data[1][$i]['cantidad'] == 0){}else{
					
					$id_producto_array[] = $data[1][$i]['id_producto'];
					$id_producto_implode = implode(', ', $id_producto_array);
					
					$product_name_array[] = $data[1][$i]['product_name'];
					$product_name_implode = implode(', ', $product_name_array);
					
					$product_price_array[] = $data[1][$i]['product_price'] * $data[1][$i]['cantidad'];
					$product_price_implode = implode(', ', $product_price_array);
					
					$tipo_producto_array[] = $data[1][$i]['tipo_producto'];
					$tipo_producto_implode = implode(', ', $tipo_producto_array);
					
					$codigo_array[] = $data[1][$i]['codigo'];
					$codigo_implode = implode(', ', $codigo_array);
					
					$lote_array[] = $data[1][$i]['lote'];
					$lote_implode = implode(', ', $lote_array);
					
					$puntos_array[] = $data[1][$i]['puntos'] * $data[1][$i]['cantidad'];
					$puntos_implode = implode(', ', $puntos_array);
					
					$cantidad_array[] = $data[1][$i]['cantidad'];
					$cantidad_implode = implode(', ', $cantidad_array);
					
				}
			}	
			
			# 3º Parte da Query - VALORES
			$values = array($data[0]['fecha_compra'], 
			$data[0]['fecha_recepcion'],
			$data[0]['descuento_compra'],
			$data[0]['precio_compra'],
			$data[0]['flete'],
			$data[0]['impuesto'],
			$id_producto_implode,
			$product_name_implode,
			$product_price_implode,
			$tipo_producto_implode,
			$codigo_implode,
			$lote_implode,
			$puntos_implode,
			$cantidad_implode,
			$data[0]['user_cpf']);
			$values = implode("', '", $values);
			
			$query .= " VALUES ('$values')";
			//se a consulta precisar de algo mais..
			if($query_extra != ""){
				$query .= $query_extra;
			}
			# apenas para testar a query (descomente o echo) - PADRÃO- COMENTADO
			//echo $query;
			//continuação da preparação da query...
			$statement = $pdo->prepare($query);
			# Tratamento de Erros do PDO
			if (!$statement) {
			    echo "\PDO::errorInfo():\n";
			    print_r($dbh->errorInfo());
			}
			//filtrando valores para serem inseridos, tecnica segura para evitar SQL Injection..
			foreach ($data as $key => $value) {
				$data[$key] = filter_var($value);
			}
			//substituindo os parametros nomeados pelos verdadeiros valores, ex: ":name" por "Anthony"
			/*foreach ($data as $key => $value){
				//$parameters[":$key"] = $value;
				$statement->bindValue(":$key", $value, PDO::PARAM_STR);
			}*/
			//executando a query já com seus valores
			if($statement->execute()){
				//se der certo retorna o id do elemento inserido...
				$id_compra = $pdo->lastInsertId();

			}else{
				//se não der certo, retornará false...
				return false;
			}




			for($i = 0; $i < count($data1[1]); $i++){
				if($data1[1][$i]['cantidad'] == null || $data1[1][$i]['cantidad'] == 0){}else{
					$id_producto = $data1[1][$i]['id_producto'];
					$product_name = $data1[1][$i]['product_name'];
					$product_price = $data1[1][$i]['product_price'];
					$tipo_producto = $data1[1][$i]['tipo_producto'];
					$codigo = $data1[1][$i]['codigo'];
					$lote = $data1[1][$i]['lote'];
					$puntos = $data1[1][$i]['puntos'];
	
					for($i2 = 0; $i2 < $data1[1][$i]['cantidad']; $i2++){
						//criando o objeto pdo...
						$pdo = parent::get_instance();
						# 1° Parte da QUERY -  Inicio
						$query = "INSERT INTO estoque (id_compra, id_producto, producto, precio, fecha_compra, vencimiento, tipo_producto, codigo, lote, puntos, user_cpf)";
				
						# 3º Parte da Query - VALORES
						$values = array($id_compra,
						$id_producto, 
						$product_name,
						$product_price,
						$data1[0]['fecha_compra'],
						$data1[0]['vencimiento'],
						$data1[1][$i]['tipo_producto'],
						$data1[1][$i]['codigo'],
						$data1[1][$i]['lote'],
						$data1[1][$i]['puntos'],
						
						$data1[0]['user_cpf']);
						$values = implode("', '", $values);
						
						$query .= " VALUES ('$values')";
						
						# apenas para testar a query (descomente o echo) - PADRÃO- COMENTADO
						//echo $query;
						//continuação da preparação da query...
						$statement = $pdo->prepare($query);
						# Tratamento de Erros do PDO
						if (!$statement) {
							echo "\PDO::errorInfo():\n";
							print_r($dbh->errorInfo());
						}
						//filtrando valores para serem inseridos, tecnica segura para evitar SQL Injection..
						/*foreach ($data1 as $key => $value) {
							$data1[$key] = filter_var($value);
						}*/
						//substituindo os parametros nomeados pelos verdadeiros valores, ex: ":name" por "Anthony"
						/*foreach ($data as $key => $value){
							//$parameters[":$key"] = $value;
							$statement->bindValue(":$key", $value, PDO::PARAM_STR);
						}*/
						//executando a query já com seus valores
						if($statement->execute()){
							//se der certo retorna o id do elemento inserido...

						}else{
							//se não der certo, retornará false...
							return false;
						}
						
					}
				}
			}


			$user = $_SESSION[md5("user_data")];
			$cpf = $user['user_cpf'];

			# 1° Parte da QUERY -  Inicio
			$query = "INSERT INTO tb_compras1 (compra_json, user_cpf) VALUES ('".json_encode($data1)."', '".$cpf."')";

			//continuação da preparação da query...
			$statement = $pdo->prepare($query);
			# Tratamento de Erros do PDO
			if (!$statement) {
				echo "\PDO::errorInfo():\n";
				print_r($dbh->errorInfo());
			}
			//filtrando valores para serem inseridos, tecnica segura para evitar SQL Injection..
			foreach ($data as $key => $value) {
				$data[$key] = filter_var($value);
			}
			//substituindo os parametros nomeados pelos verdadeiros valores, ex: ":name" por "Anthony"
			/*foreach ($data as $key => $value){
				//$parameters[":$key"] = $value;
				$statement->bindValue(":$key", $value, PDO::PARAM_STR);
			}*/
			//executando a query já com seus valores
			if($statement->execute()){
				//se der certo retorna o id do elemento inserido...
				return $pdo->lastInsertId();
			}else{
				//se não der certo, retornará false...
				return false;
			}

		}//Fechando o método insert_common

		# Metódo de SELEÇÃO normal, apenas uma tabela...
		public function select_common($table, $fields, $filters, $query_extra){
			//criando o objeto pdo...
			$pdo = parent::get_instance();
			//Iniciando a query
			$query = "SELECT ";
			# Se os campos array forem diferentes de NULL, ele pegará os campos. Caso contrário, o select assumirá o '*' (todos os campos);
			if($fields != null){
				$query .= implode(", ", $fields);
			}else{
				$query .= "*";
			}
			//Continuando a query
			$query .= " FROM $table";
			# Para os filtros: Se existirem filtros, eles serão os valores do array. Caso eles forem diferentes de NULL, ele pegará esses valores. 
			if($filters != null){
				$query .= " WHERE ";
				foreach ($filters as $key => $value) {
					$query .= "$key=:$key AND ";
				}
				//Removendo o ultimo AND da query
				$query = substr($query, 0, -4);
			}
			//se a consulta precisar de algo mais..
			if($query_extra != ""){
				$query .= $query_extra;
			}
			# apenas para testar a query (descomente o echo) - PADRÃO- COMENTADO
			//echo $query;

			# preparando consulta
			$statement = $pdo->prepare($query);
			# Caso o pdo não prepare a query, ele mostrará os erros
			if(!$statement) {
			    echo "\PDO::errorInfo():\n";
			    print_r($dbh->errorInfo());
			}
			//substituindo os parametros pelos reais valores dos filtros, caso haja...
			if($filters != null){
				//filtrando valores para serem inseridos, tecnica segura para evitar SQL Injection...
				foreach ($filters as $key => $value) {
					$filters[$key] = filter_var($value);
				}
				//substituindo os parametros nomeados pelos verdadeiros valores, ex: ":name" por "Anthony"
				foreach ($filters as $key => $value) {
					$statement->bindValue(":$key", $value, PDO::PARAM_STR);
				}
			}//fechando o if (teste de filtros)

			# executando consulta
			$statement->execute();
			# preparando resultado
			$data;
			if($statement->rowCount()){
				while($result = $statement->fetch(PDO::FETCH_ASSOC)){
					$data[] = $result;
				}
			}else{
				return false;
			}

			# retornando resultado da busca
			return $data;

		}//Fechando o método select_common

		# Metódo de SELEÇÃO RELACIONADA, com relacionamentos e chaves estrangeiras...
		public function select_special($tables, $relationships, $filters, $query_extra){

			//criando o objeto pdo...
			$pdo = parent::get_instance();

			# Iniciando a Query
			$query = "SELECT ";

			//informando colunas a serem selecionadas
			foreach ($tables as $table=>$fields){
				if(!empty($fields)){
					foreach ($fields as $each_field){
						$query .= "$table.$each_field, ";
					}
				}else{
					$query .= "$table.*, "; //quando as colunas nao forem informadas
				}
			}
			
			//removendo ultima "," 
			$query = substr($query, 0, -2);
			
			//inner join's
			$tables_names = array_keys($tables);

			# Continuando a query, e informando com o INNER JOIN as tabelas a serem relacionadas
			$query .= " FROM ".implode(" INNER JOIN ", $tables_names);
			
			# Colocando os relacionamentos na query
			$query .= " ON ";
			foreach($relationships as $foreign=>$primary){
				$query .= "$foreign=$primary AND "; 
			}

			//removendo ultimo "AND" dos RELACIONAMENTOS
			$query = substr($query, 0, -4);

			# Setando os filtros na query
			if(isset($filters)){
				$query .= " WHERE ";
				foreach($filters as $field=>$value){
					$query .= "$field=? AND ";
				}
				//removendo ultimo "AND"...
				$query = substr($query, 0, -4);
			}

			//se a consulta precisar de algo mais..
			if($query_extra != ""){
				$query .= $query_extra;
			}

			# apenas para testar a query (descomente o echo) - PADRÃO - COMENTADO
			//echo $query;

			//preparando consulta
			$statement = $pdo->prepare($query);

			# Caso o pdo não prepare a query, ele mostrará os erros
			if(!$statement) {
			    echo "\PDO::errorInfo():\n";
			    print_r($dbh->errorInfo());
			}


			# Se os filtros estiverem setados
			if(isset($filters)){
				//filtrando valores para serem inseridos, tecnica segura para evitar SQL Injection...
				foreach ($filters as $key => $value) {
					$filters[$key] = filter_var($value);
				}

				//substituindo os parametros nomeados pelos verdadeiros valores, ex: "?" por "Anthony", com a ajuda da variável auxiliar
				$i = 1;
				foreach ($filters as $key => $value){
					//$parameters[":$key"] = $value;
					$statement->bindValue($i, $value, PDO::PARAM_STR);
					$i++;
				}
			}

			# executando consulta
			$statement->execute();

			# preparando o resultado
			$data;
			if($statement->rowCount()){
				while($result = $statement->fetch(PDO::FETCH_ASSOC)){
					$data[] = $result;
				}
			}else{
				return false;
			}

			# retornando resultado da busca
			return $data;


		}//fechar o método SELECT SPECIAL

		//Metódo de atualização modo normal, apenas uma tabela...
		public function update_common($table, $data, $filters, $query_extra){

			# criando o objeto pdo...
			$pdo = parent::get_instance();

			unset($data['id_compra']);

			# valores a serem atualizados
			/*$new_values = "";
			foreach ($data as $key => $value) {
				$new_values .= "$key=$value, ";
			}

			# removendo ultima "," da query
			$new_values = substr($new_values, 0, -2);

			# filtros
			$filters_up="";
			foreach ($filters as $key => $value) {
				$filters_up .= "$key=$value AND ";
			}

			# removendo ultimo "AND";
			$filters_up = substr($filters_up, 0, -4);

			# preparando query apartir dos campos($fields) e os parametros de valores nomeados($values)
			$query = "UPDATE $table SET $new_values WHERE $filters_up;";

			//se a consulta precisar de algo mais..
			if($query_extra != ""){
				$query .= $query_extra;
			}*/

			# apenas para testar a query (descomente o echo) - PADRÃO - COMENTADO
			#echo $query;
			#echo "<br>";
			#echo "<br>";
			
			$query = "UPDATE $table SET ";
		
			# 2° PARTE DA QUERY - CAMPOS E VALORES
			foreach ($data as $key => $value) {
				$query .= "$key = '$value', ";
			}
			$query = substr($query, 0, -2);

			# 3° PARTE DA QUERY - FILTROS
			$query .=" WHERE "; 
			foreach ($filters as $key => $value){
				$query .= "$key = '$value' AND";	
			}

			# Eliminando o espaço e o AND
			$query = substr($query, 0, -4);
			
			
			
			
			# continuação da preparação da query...
			$statement = $pdo->prepare($query);

			if (!$statement) {
				echo "\PDO::errorInfo():\n";
				print_r($dbh->errorInfo());
			}

			# filtrando valores para serem inseridos, tecnica segura para evitar SQL Injection...
			foreach ($data as $key => $value) {
				$data[$key] = filter_var($value);
			}

			/*# substituindo os parametros nomeados pelos verdadeiros valores, ex: ":name" por "Anthony"
			foreach ($data as $key => $value){
				//$parameters[":$key"] = $value;
				$statement->bindValue(":$key", $value, PDO::PARAM_STR);
			}

			//substituindo os parametros dos filtros nomeados pelos verdadeiros valores, ex: ":name" por "Anthony"
			foreach ($filters as $key => $value){
				//$parameters[":$key"] = $value;
				$statement->bindValue(":$key", $value, PDO::PARAM_STR);
			}*/

			//executando a query já com seus valores
			if($statement->execute()){
				//se der certo retorna true...
				return true;
			}else{
				//se não der certo, retornará false...
				return false;
			}

		}//Fechando o método UPDATE COMMON

		//Metódo de EXCLUSÃO modo normal, apenas uma tabela...
		public function delete_common($table, $filters, $query_extra){

			//criando o objeto pdo...
			$pdo = parent::get_instance();

						
			//filtros
			$filters_delete="";
			foreach ($filters as $key => $value) {
				$filters_delete .= "$key=:$key AND ";
			}

			//removendo ultimo "AND";
			$filters_delete = substr($filters_delete, 0, -4);

			# preparando query apartir dos campos($fields) e os parametros de valores nomeados($values)
			$query = "DELETE FROM $table WHERE $filters_delete;";

			# se a consulta precisar de algo mais..
			if($query_extra != ""){
				$query .= $query_extra;
			}

			# apenas para testar a query (descomente o echo) - PADRÃO - COMENTADO
			//echo $query;

			//continuação da preparação da query...
			$statement = $pdo->prepare($query);

			if (!$statement) {
			    echo "\PDO::errorInfo():\n";
			    print_r($dbh->errorInfo());
			}

			//substituindo os parametros dos filtros nomeados pelos verdadeiros valores, ex: ":name" por "Anthony"
			foreach ($filters as $key => $value){
				//$parameters[":$key"] = $value;
				$statement->bindValue(":$key", $value, PDO::PARAM_STR);
			}

			//executando a query já com seus valores
			if($statement->execute()){
				//se der certo retorna true...
				return true;
			}else{
				//se não der certo, retornará false...
				return false;
			}
		}//Fechando o método DELETE COMMOM
	}//Fechando a Class Manager
?>	

<?php
    
	function insert($table, $data){
	    
	    # 1° Parte da QUERY -  Inicio
		$query = "INSERT INTO tb_compras (fecha_compra, fecha_recepcion, descuento_compra, precio_compra, flete, impuesto, id_producto, product_name, product_price, tipo_producto, codigo, lote, puntos, cantidad, user_cpf)";

        for($i = 0; $i < count($data[1]); $i++){
    	    if($data[1][$i]['cantidad'] == null || $data[1][$i]['cantidad'] == 0){}else{
                
                $id_producto_array[] = $data[1][$i]['id_producto'];
                $id_producto_implode = implode(', ', $id_producto_array);
                
                $product_name_array[] = $data[1][$i]['product_name'];
                $product_name_implode = implode(', ', $product_name_array);
                
                $product_price_array[] = $data[1][$i]['product_price'] * $data[1][$i]['cantidad'];
                $product_price_implode = implode(', ', $product_price_array);
                
                $tipo_producto_array[] = $data[1][$i]['tipo_producto'];
                $tipo_producto_implode = implode(', ', $tipo_producto_array);
                
                $codigo_array[] = $data[1][$i]['codigo'];
                $codigo_implode = implode(', ', $codigo_array);
                
                $lote_array[] = $data[1][$i]['lote'];
                $lote_implode = implode(', ', $lote_array);
                
                $puntos_array[] = $data[1][$i]['puntos'] * $data[1][$i]['cantidad'];
                $puntos_implode = implode(', ', $puntos_array);
                
                $cantidad_array[] = $data[1][$i]['cantidad'];
                $cantidad_implode = implode(', ', $cantidad_array);
                
    	    }}
    	    
        
		# 3º Parte da Query - VALORES
		$values = array($data[0]['fecha_compra'], 
		$data[0]['fecha_recepcion'],
		$data[0]['descuento_compra'],
		$data[0]['precio_compra'],
		$data[0]['flete'],
		$data[0]['impuesto'],
		$id_producto_implode,
		$product_name_implode,
		$product_price_implode,
		$tipo_producto_implode,
		$codigo_implode,
		$lote_implode,
		$puntos_implode,
		$cantidad_implode,
		$data[0]['user_cpf']);
		$values = implode("', '", $values);
		
		$query .= " VALUES ('$values')";

		//echo $query;
		# Enviando a query para o banco
		global $conn;
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	    
	    
	    $id_compra = $conn->insert_id;
	    

    	for($i = 0; $i < count($data[1]); $i++){
    	    if($data[1][$i]['cantidad'] == null || $data[1][$i]['cantidad'] == 0){}else{
    	        $id_producto = $data[1][$i]['id_producto'];
    	        $product_name = $data[1][$i]['product_name'];
    	        $product_price = $data[1][$i]['product_price'];
    	        $tipo_producto = $data[1][$i]['tipo_producto'];
    	        $codigo = $data[1][$i]['codigo'];
    	        $lote = $data[1][$i]['lote'];
    	        $puntos = $data[1][$i]['puntos'];

    	        for($i2 = 0; $i2 < $data[1][$i]['cantidad']; $i2++){
        		# 1° Parte da QUERY -  Inicio
        		$query = "INSERT INTO $table (id_compra, id_producto, producto, precio, fecha_compra, vencimiento, tipo_producto, codigo, lote, puntos, user_cpf)";
        
        		# 3º Parte da Query - VALORES
        		$values = array($id_compra,
        		$id_producto, 
        		$product_name,
        		$product_price,
        		$data[0]['fecha_compra'],
        		$data[0]['vencimiento'],
        		$data[1][$i]['tipo_producto'],
        		$data[1][$i]['codigo'],
        		$data[1][$i]['lote'],
        		$data[1][$i]['puntos'],
        		
        		$data[0]['user_cpf']);
        		$values = implode("', '", $values);
        		
        		$query .= " VALUES ('$values')";
        
        		//echo $query;
        		# Enviando a query para o banco
        		global $conn;
        		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    	        }
    	    }
    	}
    	
    	$user = $_SESSION[md5("user_data")];
	    $cpf = $user['user_cpf'];
		
		# 1° Parte da QUERY -  Inicio
		$query = "INSERT INTO tb_compras1 (compra_json, user_cpf) VALUES ('".json_encode($data)."', '".$cpf."')";

		//echo $query;
		# Enviando a query para o banco
		global $conn;
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	
		return $result;
    }

	
?>