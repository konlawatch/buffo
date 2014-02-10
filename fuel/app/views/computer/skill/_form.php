<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Name en', 'name_en', array('class'=>'control-label')); ?>

				<?php echo Form::input('name_en', Input::post('name_en', isset($computer_skill) ? $computer_skill->name_en : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name en')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Name th', 'name_th', array('class'=>'control-label')); ?>

				<?php echo Form::input('name_th', Input::post('name_th', isset($computer_skill) ? $computer_skill->name_th : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name th')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
            <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-success')); ?>	
        <?php echo Html::anchor('computer/skill', 'Back', array('class' => 'btn btn-primary')); ?>
        </div>
	</fieldset>
<?php echo Form::close(); ?>