<?php
	class fav extends database{
		function __construct(){
			$this->table = 'favs';
			database::__construct();
		}
		public function addFav($data,$is_die=false){
			return $this->addData($data,$is_die);
		}
		public function getFavbyId($fav_id,$is_die=false){
			
			$args = array(
				'where'	=> array(
					'and' => array(
							'product_id' => $fav_id,
						)
					)
				);

			return $this->getData($args,$is_die);
		}
		public function getAllFavById($fav_id ,$is_die = false){	
			$args = array(
				'where'	=> array(
					'and' => array(
							'status' => 'Active',
							'product_id' => $fav_id,
						)
					),
				'order' => 'ASC'
				);


			return $this->getData($args,$is_die);
		}
		public function getAllFavWithoutLimit($is_die = false){	
			$args = array(
				'where'	=> array(
					'and' => array(
							'status' => 'Active',
						)
					),
				'order' => 'DESC'
				);


			return $this->getData($args,$is_die);
		}

		public function getAllFav($offset,$no_of_data,$is_die = false){	
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
		public function getNumberFavByProduct($product_id,$is_die=false){
			
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

		public function getNumberFavByProducts($is_die=false){
			
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

		public function updateFavbyId($data,$id,$is_die = false){
			$args = array(
				'where'	=> array(
					'and' => array(
							'id' => $id,
						)
					)
				);

			return $this->updateData($data,$args,$is_die);
		}

		public function deleteFavbyId($id,$is_die=false){
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