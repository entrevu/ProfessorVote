<div class="container" >
	<?php
	echo form_open('course/add');
	?>
	<form class="form-horizontal">
		<fieldset>
			<div class="control-group">
				<div class="page-header">
					<h1>Create a Course</h1>
				</div>
				
				<?php    if (isset($error_msg)) {  ?>
					<div class="alert alert-error"><?php  echo $error_msg ?> </div>
					
					<?php } ?>
				
				
				<legend>
					Course Information
				</legend>
				<div class="controls" style="margin-bottom: 1em">
					<?php
					echo form_error('course_name');
					$courseNameAttributes = array('id' => 'course_name', 'class' => 'input-xlarge', 'placeholder' => 'Course Name', 'type' => 'text', 'name' => 'course_name');
					if (isset($course_name)) {
						$courseNameAttributes = array('id' => 'course_name', 'value' => $course_name, 'class' => 'input-xlarge', 'placeholder' => 'Course Name', 'type' => 'text', 'name' => 'course_name');
					}

					echo form_input($courseNameAttributes);
					?>
				</div>
				<div class="controls" style="margin-bottom: 1em">
					<?php
					echo form_error('college_name');
					$collegeAttributes = array('id' => 'college_name', 'class' => 'input-xlarge', 'placeholder' => 'College Name', 'type' => 'text', 'name' => 'college_name');

					if (isset($college_name)) {
						$collegeAttributes = array('id' => 'college_name', 'value' => $college_name, 'class' => 'input-xlarge', 'placeholder' => 'College Name', 'type' => 'text', 'name' => 'college_name');

					}
					echo form_input($collegeAttributes);
					?>
				</div>
			</div>
			<div class="form-actions">
				<div>
					<?php
					$submitAttributes = array('id' => 'submit', 'class' => 'btn btn-large btn-primary', 'value' => 'Add Course', 'type' => 'submit');
					echo form_submit($submitAttributes);
					?>
				</div>
			</div>
		</fieldset>
		<?php if ( defined('course_name' )):
		?>
		<?php echo $this -> set_value('course_name', $course_name);?>
		<?php endif;?>
		<?php if ( defined('college_name') ):
		?>
		<?php echo $this -> set_value('college_name', $college_name);?>
		<?php endif;?>
		<?php
		echo form_close();
		?>
</div>