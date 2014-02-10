<h2>Viewing <span class='muted'>#<?php echo $category->id; ?></span></h2>

<p>
    <strong>Name th:</strong>
    <?php echo $category->name_th; ?></p>
<p>
    <strong>Name en:</strong>
    <?php echo $category->name_en; ?></p>
<?php foreach ($category->category as $item): ?>
    <p>
        <?php echo $item->id; ?>
        <?php echo $item->name_th; ?>
        <?php echo $item->name_en; ?>
    </p>
<?php endforeach; ?>
<?php // echo var_dump($category->category);exit();?>

<?php echo Html::anchor('categories/edit/' . $category->id, 'Edit', array('class' => 'btn btn-warning')); ?> &nbsp;
<?php echo Html::anchor('categories', 'Back', array('class' => 'btn btn-primary')); ?>