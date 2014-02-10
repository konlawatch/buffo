<h2>Listing <span class='muted'>Computer_skills</span></h2>
<br>
<?php if ($computer_skills): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name en</th>
                <th>Name th</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($computer_skills as $item): ?>		<tr>

                    <td><?php echo $item->name_en; ?></td>
                    <td><?php echo $item->name_th; ?></td>
                    <td>
                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <?php echo Html::anchor('computer/skill/view/' . $item->id, '<i class="icon-eye-open"></i>', array('class' => 'glyphicon glyphicon-eye-open')); ?>&nbsp;						
                                <?php echo Html::anchor('computer/skill/edit/' . $item->id, '<i class="icon-wrench"></i>', array('class' => 'glyphicon glyphicon-pencil')); ?>		&nbsp;				
                                <?php echo Html::anchor('computer/skill/delete/' . $item->id, '<i class="icon-trash icon-white"></i>', array('class' => 'glyphicon glyphicon-trash', 'data-confirm' => "Are you sure you want to delete?")); ?>					
                            </div>
                        </div>

                    </td>
                </tr>
            <?php endforeach; ?>	</tbody>
    </table>
    <?php echo $pagination; ?>
<?php else: ?>
    <p>No Computer_skills.</p>

<?php endif; ?><p>
    <?php echo Html::anchor('computer/skill/create', 'Add new Computer skill', array('class' => 'btn btn-success')); ?>

</p>
