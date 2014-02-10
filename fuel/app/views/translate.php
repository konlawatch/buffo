<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?php echo Asset::css('bootstrap.css'); ?>
        <?php echo Asset::js('jquery.js'); ?>
        <style>
            body { margin: 40px; }
        </style>
    </head>
    <body>

        <div class="col-md-12">
            <h2><span class='muted'>Translate Model <?php echo Uri::segment(4);?></span></h2>
            <br>
            <?php if ($translate): ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name en</th>
                            <th>Name th</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($translate as $item):
                            ?>

                            <tr>
                                <td class="en">
                                    <div class="form-group">
                                        <?php echo Form::input('name_en', Input::post('name_en', isset($item) ? $item->name_en : ''), array('class' => 'col-md-1 form-control ', 'id' => '')); ?>
                                    </div>
                                </td >
                                <td class="th">
                                    <div class="form-group">
                                        <?php echo Form::input('name_th', Input::post('name_th', isset($item) ? $item->name_th : ''), array('class' => 'col-md-1 form-control ', 'id' => '')); ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <?php echo Html::anchor('/services/translate/row.json?id=' . $item->id . '&model=' . Uri::segment(4), 'Save', array('class' => 'btn btn-success save')); ?>
                                    </div>
                                </td>
                            </tr>

                            <?php
                            $i++;
                        endforeach;
                        ?>	
                    </tbody>
                </table>
                <?php echo $pagination; ?>
            <?php endif; ?>
        </div>
    </body>
</html>
<script>

    $('.save').click(function() {
        var $this = $(this);
        var url = $(this).attr('href');

        var name_en = $(this).parent().parent().parent();
        name_en = name_en.find('td.en > div > input').val();
        var name_th = $(this).parent().parent().parent();
        name_th = name_th.find('td.th > div > input').val();
        var data = {name_en: name_en, name_th: name_th};

        // <form method='GET'>

        // url?id=1&a=2&b=3
        // Input::get();
        // array('id'=>1,'a'=>2,'b'=>3)

        $.post(url, data, function(response) {

            if (response.result == true) {
                
                $this.html('<i class="glyphicon glyphicon-ok"></i>');
               // console.log(response.result);
            }
            setTimeout(function() {
                $this.text('Save');
            }, 2000);
            
        })

        return false;
    })

//    $(".edit_language").submit(function() {
    /*
     function edit_language() {
     var $name_th = $form.find("input[name=name_th]"), $name_en = $form.find("input[name=name_en]");
     
     if ($name_th != '')
     {
     alert($name_th);
     // $.post('/buffo/language/skill/edit/language.json', {name_th: $name_th, name_en: $name_en}, function(callback) {
     
     }
     );
     }
     }
     );
     */
</script>