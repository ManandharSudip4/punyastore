<?php
	class incart extends database{
		function __construct(){
			$this->table = 'incarts';
			database::__construct();
		}
		public function addInCart($data,$is_die=false){
			return $this->addData($data,$is_die);
		}
		public function getInCartbyId($incart_id,$is_die=false){
			
			$args = array(
				'where'	=> array(
					'and' => array(
							'product_id' => $incart_id,
						)
					)
				);

			return $this->getData($args,$is_die);
		}
		public function getAllInCartById($incart_id ,$is_die = false){	
			$args = array(
				'where'	=> array(
					'and' => array(
							'status' => 'Active',
							'product_id' => $incart_id,
						)
					),
				'order' => 'ASC'
				);


			return $this->getData($args,$is_die);
		}
		public function getAllInCart($is_die = false){	
			$args = array(
				'where'	=> array(
					'and' => array(
							'status' => 'Active'
						)
					),
				'order' => 'DESC'
				);

			return $this->getData($args,$is_die);
		}

		public function getActiveInCartWithLimit($offset,$no_of_data,$is_die = false){	
			$args = array(
				'where'	=> array(
					'and' => array(
							'status' => 'Active',
						)
					),
				'order' => 'DESC',
				'limit' => array(
								'offset' => $offset,				//take data leaving some no.
								'no_of_data' => $no_of_data
								)
				);


			return $this->getData($args,$is_die);
		}
		public function getNumberInCartByProduct($product_id,$is_die=false){
			
			$args = array(
				'fields'=>	['COUNT(id) as total'],           
				'where'	=> array(
					'and' => array(
							'status' => 'Active',
							'product_id' => $product_id
						)
					)
				);

			return $this->getData($args,$is_die);
		}

		public function getNumberInCartByProducts($is_die=false){
			
			$args = array(
				'fields'=>	['COUNT(id) as total'],           
				'where'	=> array(
					'and' => array(
							'status' => 'Active',
						)
					)
				);

			return $this->getData($args,$is_die);
		}

		public function updateInCartbyId($data,$id,$is_die = false){
			$args = array(
				'where'	=> array(
					'and' => array(
							'product_id' => $id,
						)
					)
				);

			return $this->updateData($data,$args,$is_die);
		}

		public function deleteInCartbyId($id,$is_die=false){
			$args = array(
				'where'	=> array(
					'and' => array(
							'id' => $id,
						)
					)
				);

			return $this->deleteData($args,$is_die);
		}
	}

?>