<?php

class SubCategories {
	public $tried = array();
	public $array = array();
	public $length;
	
	public function __construct($categories) {
		for($i = 0; $i < 1000; $i++) {
			$this->tried[$i] = 0;
		}
        foreach($categories as $category) {
            array_push($this->array,$category);
        }
        $this->length = count($this->array);
	}

	public function try($x, $level) {
		for($i = 1; $i < $this->length; $i++) {
			if($this->tried[$i] == 1) continue;
			else {
                $show = '';
				if($this->array[$i]['category_parent'] == (string)$x) {
					for($j = 0; $j <= $level; $j++) {
						$show .= '--|';
                    }
                    $show .= $this->array[$i]['category_name'];
					echo '<div class="item-menu"><span>'.$show.'</span>
                            <div class="category-fix">
								<a class="btn-category btn-primary" href="'.$_SESSION['mainUrl'].'/admin/categories/edit/' . $this->array[$i]['category_id'] . '"><i
										class="fa fa-edit"></i></a>
								<a id="test" class="delete-category btn-category btn-danger"
								href="'.$_SESSION['mainUrl'].'/admin/categories/delete/'.$this->array[$i]['category_id'].'/'.$this->array[$i]['reg_date'].'">
									<i class="fas fa-times"></i></i>
								</a>
                            </div>
                        </div>';
					$this->tried[$i] = 1;
					$this->try($this->array[$i]['category_id'],$level+1);
				}
			}
		}
	}

	public function main() {
		echo '<div class="item-menu"><span>'.$this->array[0]['category_name'].'</span>
            </div>';
		for($i = 1; $i < $this->length; $i++) {
			$this->tried[$i] = 1;
			if($this->array[$i]['category_parent'] == (string)1) {
                echo '<div class="item-menu"><span>'.$this->array[$i]['category_name'].'</span>
                    <div class="category-fix">
						<a class="btn-category btn-primary" href="'.$_SESSION['mainUrl'].'/admin/categories/edit/' . $this->array[$i]['category_id'] . '">
							<i class="fa fa-edit"></i>
						</a>
						<a id="test" class="delete-category btn-category btn-danger"
							href="'.$_SESSION['mainUrl'].'/admin/categories/delete/'.$this->array[$i]['category_id'].'/'.$this->array[$i]['reg_date'].'">
							<i class="fas fa-times"></i></i>
							</a>
                        </div>
                    </div>';
			}
			$this->try($this->array[$i]['category_id'],0);
		}
	}
}