<?php
	class product extends database{
		function __construct(){
			$this->table = 'products';
			database::__construct();
		}
		public function addProduct($data,$is_die=false){
			return $this->addData($data,$is_die);
		}
		public function getProductbyId($product_id,$is_die=false){
			
			$args = array(
				'where'	=> array(
					'and' => array(
							'id' => $product_id,
						)
					)
				);

			return $this->getData($args,$is_die);
		}
		public function getAllProduct($is_die = false){	
			$args = array(
				'fields'=>	['id',
				            'productname',
				            'description',
				            'madeof',
				            'acprice',
				            'cprice',
				            'featured',
				            'size',
				            'weight',
				            'categoryid',
				            '(SELECT categoryname from categories where id = categoryid) as category',
				            'view',
				            'image'],
				'where'	=> array(
					'and' => array(
							'status' => 'Active',
						)
					),
				'order' => 'ASC'
				);

			return $this->getData($args,$is_die);
		}
		public function getAllProductWithLimit($offset, $no_of_data, $is_die = false){	
			$args = array(
				'fields'=>	['id',
				            'productname',
				            'description',
				            'madeof',
				            'acprice',
				            'cprice',
				            'featured',
				            'size',
				            'weight',
				            'categoryid',
				            '(SELECT categoryname from categories where id = categoryid) as category',
				            'view',
				            'image'],
				'where'	=> array(
					'and' => array(
							'status' => 'Active',
						)
					),
				'order' => 'ASC',
				'limit' => array(
								'offset' => $offset,				//take data leaving some no.
								'no_of_data' => $no_of_data
								)
				);

			return $this->getData($args,$is_die);
		}

		public function getAllProductByCategoryWithLimit($cat_id,$offset,$no_of_data,$is_die=false){
			
			$args = array(
				'fields'=>	['id',
				            'productname',
				            'description',
				            'madeof',
				            'acprice',
				            'cprice',
				            'featured',
				            'size',
				            'weight',
				            'categoryid',
				            '(SELECT categoryname from categories where id = categoryid) as category',
				            'view',
				            'image'],
			
				             
				'where'	=> array(
					'and' => array(
							'status' => 'Active',
							'categoryid' => $cat_id
						)
					),
				'limit' => array(
								'offset' => $offset,				//take data leaving some no.
								'no_of_data' => $no_of_data
								)
				);

			return $this->getData($args,$is_die);
		}


		public function updateProductbyId($data,$id,$is_die = false){
			$args = array(
				'where'	=> array(
					'and' => array(
							'id' => $id,
						)
					)
				);

			return $this->updateData($data,$args,$is_die);
		}

		public function deleteProductbyId($id,$is_die=false){
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