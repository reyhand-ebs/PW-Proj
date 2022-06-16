<?php 
	class Category {
		private $id = 0;
		private $nama = '';

		public function __get($atribute) {
			if (property_exists($this, $atribute)) {
				return $this->$atribute;
				}
		}
	
		public function __set($atribut, $value){
			if (property_exists($this, $atribut)) {
					$this->$atribut = $value;
			}
		}
				
		public function AddCategory() {
			
		}
		
		public function UpdateCategory() {
			
		}
		
		public function DeleteCategory() {
			
		}
		
		public function SelectAllCategory() {
				
		}
		
		public function SelectOneCategory() {
            
		}
 	}	 
?>
