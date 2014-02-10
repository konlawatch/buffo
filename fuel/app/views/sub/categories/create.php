<h2>New <span class='muted'>Sub_category</span></h2>
<br>
<?php $data['data']=Utility::select($category, 'name_en');?>
<?php echo render('sub\categories/_form',$data); ?>

