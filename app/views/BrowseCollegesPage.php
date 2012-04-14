<div class="container">
	<?php 
	$params = array('table_name'=>'college', 'column_name'=>'Name');
	$this->load->library('AbcBar', $params);
	$this->load->database();
	echo $abcBar;
	
	echo $list;
	
	
	
	
	?>
</div>
