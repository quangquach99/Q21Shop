<?php

class SubCategories {
	private $tried = array();
	private $array = array();
	private $length;
	
	public function __construct($categories) {
		for($i = 0; $i < 1000; $i++) {
			$this->tried[$i] = 0;
		}
        foreach($categories as $category) {
            array_push($this->array,$category);
        }
        $this->length = count($this->array);
	}

	public function try($x, $level,$selected) {
		for($i = 1; $i < $this->length; $i++) {
			if($this->tried[$i] == 1) continue;
			else {
                $show = '';
				if($this->array[$i]['category_parent'] == (string)$x) {
					$ok = '';
					if($selected == $this->array[$i]['category_id']) $ok = 'selected';
					for($j = 0; $j <= $level; $j++) {
						$show .= '--|';
                    }
                    $show .= $this->array[$i]['category_name'];
					echo '<option value="' . $this->array[$i]['category_id'] . '" '.$ok.'>' . $show . '</option>';
					$this->tried[$i] = 1;
					$this->try($this->array[$i]['category_id'],$level+1,$selected);
				}
			}
		}
	}

	public function main($selected = 0) {
		if($selected == 0) {
			echo '<option value="' . $this->array[0]['category_id'] . '" selected>' . $this->array[0]['category_name'] . '</option>';
		} else {
			echo '<option value="' . $this->array[0]['category_id'] . '">' . $this->array[0]['category_name'] . '</option>';
		}
		for($i = 1; $i < $this->length; $i++) {
			$this->tried[$i] = 1;
			if($this->array[$i]['category_parent'] == (string)1) {
				$ok = '';
				if($selected == $this->array[$i]['category_id']) $ok = 'selected';
                echo '<option value="' . $this->array[$i]['category_id'] . '" '.$ok.'>' . $this->array[$i]['category_name'] . '</option>';
			}
			$this->try($this->array[$i]['category_id'],0,$selected);
		}
	}
}