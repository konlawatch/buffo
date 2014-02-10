<?php // var_dump($lang);exit();     ?>
<h2><span class='muted'><?php echo $lang['categories']; ?></span></h2>
<br>
<?php if ($categories): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <!--<th>ID</th>-->
                <th><?php echo $lang['seq']; ?></th>
                <th><?php echo $lang['name_th']; ?></th>
                <th><?php echo $lang['name_en']; ?></th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($categories as $item): ?>	

                <tr>
                    <!--<td><center><?php // echo $item->id;                        ?></center></td>-->
                    <td><center><?php echo $item->seq; ?></center></td>
        <td><?php echo $item->name_th; ?></td>
        <td><?php echo $item->name_en; ?></td>
        <td>
            <?php if ($item->seq == $max): ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo Html::anchor('/categories/seq/' . $item->id . '/down?seq=' . $item->seq, '', array('class' => 'glyphicon glyphicon-chevron-down')); ?>
            <?php elseif ($item->seq == $min): ?>

                <?php echo Html::anchor('/categories/seq/' . $item->id . '/up?seq=' . $item->seq, '', array('class' => 'glyphicon glyphicon-chevron-up')); ?> 
            <?php else: ?>
                <?php echo Html::anchor('/categories/seq/' . $item->id . '/up?seq=' . $item->seq, '', array('class' => 'glyphicon glyphicon-chevron-up')); ?> &nbsp;|
                <?php echo Html::anchor('/categories/seq/' . $item->id . '/down?seq=' . $item->seq, '', array('class' => 'glyphicon glyphicon-chevron-down')); ?>
            <?php endif; ?>

        </td>
        <td>
            <div class="btn-toolbar">
                <div class="btn-group">
                    <?php echo Html::anchor('categories/view/' . $item->id, '<i class="icon-eye-open"></i>', array('class' => 'glyphicon glyphicon-eye-open', 'data-view' => "ABCD")); ?>&nbsp;						
                    <?php echo Html::anchor('categories/edit/' . $item->id, '<i class="icon-wrench"></i>', array('class' => 'glyphicon glyphicon-pencil')); ?>		&nbsp;			
                    <?php echo Html::anchor('categories/delete/' . $item->id, '<i class="icon-trash icon-white"></i>', array('class' => 'glyphicon glyphicon-trash', 'data-confirm' => "Are you sure you want to delete?")); ?>					</div>
            </div>
        </td>
        </tr>
    <?php endforeach; ?>	
    </tbody>
    </table>

<?php else: ?>
    <p>No Categories.</p>

<?php endif; ?><p>
    <?php echo Html::anchor('categories/create', $lang['add'], array('class' => 'btn btn-success')); ?>
</p>
<script>
    $(document).ready(function() {
        $('a[data-view]').click(function(ev) {
            var href = $(this).attr('href');
            if (!$('#dataViewModal').length) {
                $('body').append(
                        '<div class="modal fade" id="dataViewModal" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">\n\
                  <div class="modal-dialog">\n\
                    <div class="modal-content">\n\
                        <div class="modal-header">\n\
                            <button type="button" class="close" data-dismiss="modal" aria-hidden = "true">&times;</button>\n\
                            <h4 class="modal-title" id="myModalLabel">View</h4>\n\
                        </div>\n\
                    <div class="modal-body">\n\
                        ...\n\
                    </div>\n\
                    <div class="modal-footer">\n\
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>\n\
                        <a class="btn btn-primary" id="dataViewOK">OK</a>\n\
                    </div>\n\
                    </div>\n\
                </div>\n\
            </div>');
            }
            $('#dataViewModal').find('.modal-body').text($(this).attr('data-view'));
            $('#dataViewOK').attr('href', href);
            $('#dataViewModal').modal({show: true});
            return false;
        });
    });
</script>
