<h2><span class='muted'>Sub_categories</span></h2>

<?php
$cate = Model_Category::find('all');
$data = Utility::select($cate, 'name_en');
?>
<?php echo Form::select('category_id', '', $data, array('class' => 'form-control')); ?>
<br>

<table class="table table-striped">
    <?php if ($sub_categories): ?>
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Name th</th>
                <th>Name en</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sub_categories as $item): ?>
                <tr>
                    <td><?php echo $item->category->name_en; ?></td>
                    <td><?php echo $item->name_th; ?></td>
                    <td><?php echo $item->name_en; ?></td>
                    <td>
                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <?php echo Html::anchor('sub/categories/view/' . $item->id, '<i class="icon-eye-open"></i>', array('class' => 'glyphicon glyphicon-eye-open')); ?>&nbsp;						
                                <?php echo Html::anchor('sub/categories/edit/' . $item->id, '<i class="icon-wrench"></i>', array('class' => 'glyphicon glyphicon-pencil')); ?>		&nbsp;				
                                <?php echo Html::anchor('sub/categories/delete/' . $item->id, '<i class="icon-trash icon-white"></i>', array('class' => 'glyphicon glyphicon-trash', 'data-confirm' => "Are you sure you want to delete?")); ?>									</div>
                        </div>
                    </td> 

                </tr>
            <?php endforeach; ?> 
        </tbody>
    </table>
    <?php  echo $pagination; ?>

<?php else: ?>
    <p>No Sub_categories.</p>

<?php endif; ?><p>

    <?php echo Html::anchor('sub/categories/create', 'Add new Sub category', array('class' => 'btn btn-success')); ?>

</p>
<script>
    $("select").change(function() {
        if ($(this).val() > 0)
        {
            window.location.href = '<?php echo Uri::base() ?>sub/categories?cate_id=' + $(this).val();
        }
    });
</script>