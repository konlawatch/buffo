<h2>Viewing <span class='muted'>#<?php echo $sub_category->id; ?></span></h2>

<p>
    <strong>Category id:</strong>
    <?php echo $sub_category->category_id; ?></p>
<p>
    <strong>Name th:</strong>
    <?php echo $sub_category->name_th; ?></p>
<p>
    <strong>Name en:</strong>
    <?php echo $sub_category->name_en; ?></p>

<?php echo Html::anchor('sub/categories/edit/' . $sub_category->id, 'Edit', array('class' => 'btn btn-warning')); ?> &nbsp;
<?php echo Html::anchor('sub/categories', 'Back', array('class' => 'btn btn-primary')); ?>