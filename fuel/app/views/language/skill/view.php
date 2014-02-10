<h2>Viewing <span class='muted'>#<?php echo $language_skill->id; ?></span></h2>

<p>
	<strong>Name en:</strong>
	<?php echo $language_skill->name_en; ?></p>
<p>
	<strong>Name th:</strong>
	<?php echo $language_skill->name_th; ?></p>

        <?php echo Html::anchor('language/skill/edit/'.$language_skill->id, 'Edit',array('class'=>'btn btn-warning')); ?> &nbsp;
<?php echo Html::anchor('language/skill', 'Back',array('class'=>'btn btn-primary')); ?>