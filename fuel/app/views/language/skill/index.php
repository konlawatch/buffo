<h2>Listing <span class='muted'>Language_skills</span></h2>
<br>
<?php if ($language_skills): ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name en</th>
                <th>Name th</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($language_skills as $item): ?>
            <form action="#" method="post" enctype="multipart/form-data" id="edit_language"> 
                <tr> 
                    <td class="form-group"><?php echo Form::input('name_en', Input::post('name_en', isset($item) ? $item->name_en : ''), array('class' => 'col-md-1 form-control')); ?></td>
                    <td class="form-group"><?php echo Form::input('name_th', Input::post('name_th', isset($item) ? $item->name_th : ''), array('class' => 'col-md-1 form-control')); ?></td>
                    <td class="form-group">
                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <?php echo Html::anchor('language/skill/view/' . $item->id, '<i class="icon-eye-open"></i>', array('class' => 'glyphicon glyphicon-eye-open')); ?>&nbsp;						
                                <?php echo Html::anchor('language/skill/edit/' . $item->id, '<i class="icon-wrench"></i>', array('class' => 'glyphicon glyphicon-pencil')); ?>		&nbsp;				
                                <?php echo Html::anchor('language/skill/delete/' . $item->id, '<i class="icon-trash icon-white"></i>', array('class' => 'glyphicon glyphicon-trash', 'data-confirm' => "Are you sure you want to delete?")); ?>	&nbsp;	
                            </div>  
                            <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-success', 'onclick' => 'edit_language')); ?>

                        </div>
                    </td>
                </tr>
            </form>
        <?php endforeach; ?>	
    </tbody>
    </table>
    <?php echo $pagination; ?>
<?php else: ?>
    <p>No Language_skills.</p>

<?php endif; ?><p>
    <?php echo Html::anchor('language/skill/create', 'Add new Language skill', array('class' => 'btn btn-success')); ?>

</p>
<script>
//    $(".edit_language").submit(function() {
    function edit_language() {
        var $name_th = $form.find("input[name=name_th]"), $name_en = $form.find("input[name=name_en]");

        if ($name_th != '')
        {
            alert($name_th);
           // $.post('/buffo/language/skill/edit/language.json', {name_th: $name_th, name_en: $name_en}, function(callback) {

            });
        }
    }
    );
</script>