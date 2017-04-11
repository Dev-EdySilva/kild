<?php 
	/**
	* Contém métodos que facilitam muito a escrita de sintaxes SQL
	* @version 0.1
	* @author Edigleysson Silva <edigleyssonsilva@gmail.com>
	* @license GPL
	*
	* Adicionada função groupBy para executar a cláusula SQL GROUP BY - 08/02/2017
	* version 0.2 - Edigleysson Silva <edigleyssonsilva@gmail.com>
	*
	* Existe método NOW() porém não funciona com o insert
	*/

	class DAO
	{
		
			
		public $table;// tabela em que serão realizadas as operações

		public $query;
		public $runningQUERY=false;
		public $runningWHERE=false;
		public $runningLIMIT=false;
		public $conditions=array();
		public $limit=array();

		public $isUpdate=false;
		public $isInsert=false;
		private $isSelect=false;
		public $intoExecute=false;

		public $queryOK=false;

		private $_insert = array();// clausula INSERT
		private $_select = array();

		private $orderBy = array();
		private $groupBy;
		private $between = array();// CLÁUSULA BETWEEN

		public static $conn; //conexão com banco de dados (PDO)

		private $last_id;

		private $runningINNER_JOIN=false;






		/**
		* executa a instrução SELECT
		* @param string $table = nome da tabela
		*/
		public function select($table, array $fields=array()){

			if( is_object($table) ){

				$this->table = $table->name.' AS '.$table->aliase;
				
			}else{
				$this->table = $table;
			}

			$_fields = [];
				foreach($fields as $key => $field){

					if(is_string($key)){
						$fields[$key] = $key.' AS '.$field;
					}else{
						if(is_object($field) && $field->type == 'QUERY'){
							$fields[$key] = $field->query;
						}
					}

				}

			$campos = (count($fields) > 0) ? implode(', ', $fields) : "*";

		
			$this->query = "SELECT $campos FROM ".$this->table;
			$this->isSelect=true;
			$this->runningQUERY=true;

			return $this;

		}


		/**
		* Cláusula INNER JOIN
		*/
		public function innerJoin($table){
			if($this->isSelect && $this->runningQUERY){
					if(is_array($table)){

						if(count($table) < 2){
							throw new Exception("Erro de passagem de parâmetro");
						}

						$this->query .= ' INNER JOIN '.$table[0].' AS '.$table[1];
						$this->runningINNER_JOIN = true;
						return $this;

					}else if(is_string($table)){
						$this->query .= " INNER JOIN $table";
						$this->runningINNER_JOIN = true;
						return $this;
					}


				
			}
		}


		static function query($query){
			$object = new stdClass;
			$object->type = 'QUERY';
			$object->query = $query;
			return $object;
		}


		public function using($field){
			if($this->runningINNER_JOIN){
				$this->query .= ' USING('.$field.') ';
				return $this;
			}
		}



		public function on($field1, $field2){
			if($this->runningINNER_JOIN){
				$this->query .= ' ON('.$field1.' = '.$field2.') ';
				return $this;
			}
		}

		/**
		* Define o aliase de uma tabela durante a consulta
		*/
		static function aliaseTable($name, $aliase){
			$table = new stdClass;
			$table->name = $name;
			$table->aliase = $aliase;

			return $table;
		}

		/**
		* executa a instrução UPDATE
		* @param string $table = nome da tabela
		*/
		public function update($table){
			$this->table = $table;
			$this->isUpdate=true;
			$this->query = "UPDATE $table SET {fields}";
			$this->runningQUERY=true;

			return $this;

		}


		/**
		* executa a instrução DELETE
		* @param string $table = nome da tabela
		*/
		public function delete($table){
			$this->table = $table;
			$this->query="DELETE FROM $table";
			$this->runningQUERY=true;

			return $this;
		}


		/**
		* executa a instrução INSERT
		* @param string $table = nome da tabela
		*/
		public function insert($table){
			$this->_insert['running']=true;
			$this->_insert['fields']=array();
			$this->_insert['values']=array();

			$this->query = "INSERT INTO $table ({fields}) VALUES ({values})";

			return $this;
		}

		/**
		* Cláusula ORDER que é complemento da cláusula SELECT 
		* @param string $field = nome do campo que será ordenado
		* @param string $typeOrder = tipo de ordenação que será aplicado no campo
		*/
		public function orderBy( $field, $typeOrder ){
			if( $this->runningQUERY ){
				$this->orderBy['field']=$field;
				$this->orderBy['type']=$typeOrder;

				return $this;
			}
		}


		/**
		* Cláusula GROUP BY usada em consjunto com a cláusula SELECT
		*/
		public function groupBy( $field ){
			if( $this->runningQUERY ){
				$this->groupBy = $field;

				return $this;
			}
		}





		/**
		* Complemento do método insert() - completa a cláusula SQL INSERT
		* @param array $fields = define os campos em que as informações serão inseridas na tabela
		*/
		public function into( array $fields ){

			if( $this->_insert['running'] ){

				$this->_insert['fields']=$fields;
				$this->_insert['intorunning']=true;

				return $this;
			}

		}// fim do método into



		/**
		* Método complemento de into() - que define a completa a cĺáusula INSERT
		* @param array $values = array com lista de valores a serem inseridos
		*/
		public function values( array $values ){

			if( $this->_insert['running'] ){

				if( !isset($this->_insert['intorunning']) ){
					//caso não seja chamado o metodo into()
					$this->query = str_replace('({fields})', '', $this->query);
				}else{

					//verificando numero de campos valores
					if( count($this->_insert['fields']) == count($values) ){

						for($i=0; $i<count($values); $i++){
							$v=$values[$i];
							if(is_null($v)){
								unset($values[$i]);
								unset($this->_insert['fields'][$i]);
							}
						}// fim do loop for


						$this->query = str_replace('{fields}', implode(',', $this->_insert['fields']), $this->query);

					}else{

						throw new Exception("Número de campos diferente do numero de valores", 1);
						

					}


				}

				$this->_insert['values'] = $values;

				$values = array_map(function($v){
					return "'$v'";
				}, $values);

				$this->query = str_replace('{values}', implode(',', $values), $this->query);

			}

		}// fim do método values


		
		/**
		* Método usado em conjunto com o método update() e representa o complemento da clausula UPDATE
		* @param array $lista = array no formato chave=>valor que representa o campo e seu respectivo valor
		*/
		public function set($lista){
			if( $this->runningQUERY && $this->isUpdate ){

				$fields = array();

				foreach ($lista as $key => $value) {
					if(!is_object($value)){
						$fields[] = $key."='".$value."'";
					}else{
						$fields[] = $key."=$value->content";
					}
				}

				$this->query = str_replace('{fields}', implode(',', $fields), $this->query);

				return $this;

			}
		}


		public function where($field, $val){
			if( !$this->runningWHERE ){
				$this->conditions[] = $field.$val;			
				$this->runningWHERE=true;

				return $this;
			}
		}


		/**
		* Cláusula BETWEEN que atua junto com SELECT, DELETE, UPDATE
		*/
		public static function between($val1, $val2){
			return " BETWEEN '$val1' AND '$val2'";
		}


		public function limit( $index, $offset ){
			if(!$this->runningLIMIT){
				$index = (!$index) ? 0 : $index;
				$this->limit = array($index, $offset);
				$this->runningLIMIT=true;

				return $this;
			}
		}

		public function _and($field, $val){
			if( $this->runningWHERE ){
				$this->conditions[] = " AND ".$field.$val;
				return $this;
			}
		}

		public function _or($field, $val){
			if( $this->runningWHERE ){
				$this->conditions[] = " OR ".$field.$val;
				return $this;
			}
		}

		/**
		* comparação de valores por ( = ) igual
		*/
		static function equal( $value, $field = false ){
			if(!$field){
				return " = '$value'";
			}else{
				return " = $value";
			}
		}

		static function operand( $op, $value ){

			if(is_object($value)){
				return "$op $value->content";
			}else{
				return "$op '$value'";	
			}

			
		}

		/**
		* comparação de valores por ( < ) menor que
		*/
		static function smaller( $value ){
			return " < '$value'";
		}

		/**
		* comparação de valores por ( != ) diferente
		*/
		static function unlike( $value ){
			return " <> '$value'";
		}	

		/**
		* comparação de valores por ( > ) maior que
		*/
		static function larger( $value ){
			 return " > '$value'";
		}


		static function like( $value ){
			return " LIKE '$value'";
		}


		static function DISTINCT($field){
			return "DISTINCT($field)";
		}

		


		// funções de manipulação de data e hora em SQL

		static function YEAR($field){
			return "YEAR($field)";
		}

		static function MONTH($field){
			return "MONTH($field)";
		}

		static function DAY($field){
			return "DAY($field)";
		}

		static function WEEKDAY($field){
			return "WEEKDAY($field)";
		}

		static function DATE_FORMAT($field, $format){
			return "DATE_FORMAT($field, '$format')";
		}

		static function DATE_ADD($val1, $val2){
			$o = new stdClass;
			$o->content="DATE_ADD($val1, $val2)";
			return $o;
		}

		static function DATE($value){
			return "DATE($value)";
		}

		static function DATEDIFF($val1, $val2){
			return "DATEDIFF('$val1', '$val2')";
		}

		static function HOUR($field){
			return "HOUR($field)";
		}

		static function COUNT($field){
			return "COUNT($field)";
		}


		static function NOW(){
			$n = new stdClass;
			$n->content = 'NOW()';
			return $n;
		}

		static function SUM( $field ){
			return "SUM($field)";
		}
                
                
                static function MD5($field){
                    return "MD5($field)";
                }


		// funções de manipulação de data e hora em SQL


		public function dump(){
				
			
		}

		public function run(){
			$order = "";
			$where = "";
			$group_by = "";

			//se estiver sendo executada a instrução SELECT
			if( $this->isSelect ){
                                // adicionando cláusula ORDER BY
				$order = (count($this->orderBy) > 0) ? " ORDER BY ".$this->orderBy['field']." ".$this->orderBy['type'] : "";

				$group_by = ($this->groupBy) ? " GROUP BY ".$this->groupBy : "";
			}
                        
                        // adicionando cláusula WHERE
			$where = (count($this->conditions)>0) ? " WHERE ".implode(' ', $this->conditions) : "";
			// adicionando LIMIT 
			$limit = ($this->runningLIMIT) ? " LIMIT ".implode(',', $this->limit) : "";
                        
                        // monstando query
			$this->query = $this->query.$where.$order.$group_by.$limit;
                        
                        // recuperando conexão
			$conn = self::$conn;
                        
			$exec = $conn->prepare($this->query);
                        
			$this->queryOK = $exec->execute();

			if($this->queryOK){
				$this->last_id = $conn->lastInsertId();
			}

			return $exec;
		}

                /**
                 * Método que retorna o últiom ID inserido na tabela
                 * @return type INT
                 */
		public function getLastId(){
			return $this->last_id;
		}


                
                /**
                 * Função que retorna o status da execução de uma query
                 * @return type TRUE
                 */
		public function querySuccess(){
			return $this->queryOK;
		}



		//metodos de interface

		/*
		* Método que retorna array com registros de uma determinada tabela
		* @param string $table = tabela a ser manipulada
		* @param array $condition = array com parametros de filtro
		*/
		public function listar($table, $condition=null){

			$list =array();

			$this->select( $table );
			$c=0;

			if($condition){
				if( is_array($condition) && count($condition) > 0 ){

					foreach ($condition as $key => $value) {
						if($c==0){
							$this->where( $key, self::equal( $value ) );
						}else{
							$this->and( $key, self::equal( $value ) );
						}

						$c++;
					}// fim do loop foreach

					
				}
			}

			$run = $this->run();

			while ($row = $run->fetchObject()) {
				$list[]=$row;
			}


			return $list;
			// return $this->query;

		}


		public function _delete($table, $id){

			$this->update($table)->set(array(
				'flg_ativo'=>0
			))->where('id_artigo', self::equal($id));

			$this->run();

			return $this->queryOK;

		}



		public function getQuery(){
			return $this->query;
		}

		public function clean(){
			$this->query=null;
			$this->runningQUERY=false;
			$this->runningWHERE=false;
			$this->runningLIMIT=false;
			$this->conditions=array();
			$this->limit=array();

			$this->isUpdate=false;
			$this->isInsert=false;
			$this->isSelect=false;
			$this->intoExecute=false;

			$this->queryOK=false;

			$this->_insert = array();// clausula INSERT
			$this->_select = array();

			$this->orderBy = array();
			$this->between = array();// CLÁUSULA BETWEEN

			$this->last_id = null;
			$this->conditions=[];
		}
                
   

		
	}// fim da interface DAO


