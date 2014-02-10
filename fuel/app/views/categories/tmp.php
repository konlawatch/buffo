<!--<p><strong><a href="javascript:void(0);" data-toggle="collapse" data-target="#jobCat12" onclick="showhideJobCat('jobCat12');" title="Other - Expand / Contract" id="jobCat12_heading" class="jobCatTitle_open">Other</a></strong></p>

<ul id="jobCat12" class="collapse in" style="margin-t0">
              
                   <li>
               
                       <a title="Anything Goes Jobs" href="../jobs/Anything-Goes/" class="job">Anything Goes &nbsp;(150) </a>&nbsp;<a title="Anything Goes Contests" href="../contest/Anything-Goes/browse/"><span style="color: #98c0d6; position:relative; top:2px;" class="fl-icon-trophy" aria-hidden="true"></span> (9)</a><br>
               
                     
               
                       <a title="Automotive Jobs" href="../jobs/Automotive/" class="job">Automotive &nbsp;(0) </a><br>
               
                     
               
                       <a title="Brain Storming Jobs" href="../jobs/brain-storming/" class="job">Brain Storming &nbsp;(0) </a><br>
               
                     
               
                       <a title="Business Coaching Jobs" href="../jobs/business-coaching/" class="job">Business Coaching &nbsp;(1) </a><br>
               
                     
               
                       <a title="Christmas Jobs" href="../jobs/christmas/" class="job">Christmas &nbsp;(0) </a><br>
               
                     
               
                       <a title="Cooking &amp; Recipes Jobs" href="../jobs/cooking-recipes/" class="job">Cooking &amp; Recipes &nbsp;(2) </a><br>
               
                     
               
                       <a title="Dating Jobs" href="../jobs/Dating/" class="job">Dating &nbsp;(26) </a><br>
               
                     
               
                       <a title="Education &amp; Tutoring Jobs" href="../jobs/Education-Tutoring/" class="job">Education &amp; Tutoring &nbsp;(15) </a>&nbsp;<a title="Education &amp; Tutoring Contests" href="../contest/Education-Tutoring/browse/"><span style="color: #98c0d6; position:relative; top:2px;" class="fl-icon-trophy" aria-hidden="true"></span> (1)</a><br>
               
                     </li>
                     
                   <li>
               
                       <a title="Energy Jobs" href="../jobs/energy/" class="job">Energy &nbsp;(0) </a><br>
               
                     
               
                       <a title="Financial Markets Jobs" href="../jobs/Financial-Markets/" class="job">Financial Markets &nbsp;(14) </a><br>
               
                     
               
                       <a title="Flashmob Jobs" href="../jobs/Flashmob/" class="job">Flashmob &nbsp;(1) </a><br>
               
                     
               
                       <a title="Freelance Jobs" href="../jobs/Project/" class="job">Freelance &nbsp;(16) </a><br>
               
                     
               
                       <a title="Genealogy Jobs" href="../jobs/Genealogy/" class="job">Genealogy &nbsp;(0) </a><br>
               
                     
               
                       <a title="Health Jobs" href="../jobs/Health/" class="job">Health &nbsp;(8) </a><br>
               
                     
               
                       <a title="History Jobs" href="../jobs/history/" class="job">History &nbsp;(2) </a><br>
               
                     
               
                       <a title="Insurance Jobs" href="../jobs/Insurance/" class="job">Insurance &nbsp;(1) </a><br>
               
                     </li>
                     
                   <li>
               
                       <a title="Jewellery Jobs" href="../jobs/jewellery/" class="job">Jewellery &nbsp;(2) </a><br>
               
                     
               
                       <a title="Life Coaching Jobs" href="../jobs/life-coaching/" class="job">Life Coaching &nbsp;(2) </a><br>
               
                     
               
                       <a title="Nutrition Jobs" href="../jobs/Nutrition/" class="job">Nutrition &nbsp;(3) </a><br>
               
                     
               
                       <a title="Pattern Making Jobs" href="../jobs/Pattern-Making/" class="job">Pattern Making &nbsp;(0) </a><br>
               
                     
               
                       <a title="Psychology Jobs" href="../jobs/Psychology/" class="job">Psychology &nbsp;(1) </a><br>
               
                     
               
                       <a title="Real Estate Jobs" href="../jobs/real-estate/" class="job">Real Estate &nbsp;(2) </a><br>
               
                     
               
                       <a title="Sports Jobs" href="../jobs/Sports/" class="job">Sports &nbsp;(2) </a><br>
               
                     
               
                       <a title="Test Automation Jobs" href="../jobs/Test-Automation/" class="job">Test Automation &nbsp;(2) </a><br>
               
                     </li>
                     
                   <li>
               
                       <a title="Testing / QA Jobs" href="../jobs/Testing-QA/" class="job">Testing / QA &nbsp;(14) </a><br>
               
                     
               
                       <a title="Training Jobs" href="../jobs/Training/" class="job">Training &nbsp;(8) </a>&nbsp;<a title="Training Contests" href="../contest/Training/browse/"><span style="color: #98c0d6; position:relative; top:2px;" class="fl-icon-trophy" aria-hidden="true"></span> (1)</a><br>
               
                     
               
                       <a title="Troubleshooting Jobs" href="../jobs/Troubleshooting/" class="job">Troubleshooting &nbsp;(1) </a><br>
               
                     
               
                       <a title="Valuation &amp; Appraisal Jobs" href="../jobs/Valuation-amp-Appraisal/" class="job">Valuation &amp; Appraisal &nbsp;(2) </a><br>
               
                     
               
                       <a title="Weddings Jobs" href="../jobs/Weddings/" class="job">Weddings &nbsp;(2) </a>&nbsp;<a title="Weddings Contests" href="../contest/Weddings/browse/"><span style="color: #98c0d6; position:relative; top:2px;" class="fl-icon-trophy" aria-hidden="true"></span> (1)</a><br>
               
                     
               
                       <a title="XXX Jobs" href="../jobs/XXX/" class="job">XXX &nbsp;(41) </a><br>
               
                     </li>
                     
             </ul>-->

<!-- filter data


 if (isset($get['cate_id'])) {
            $config = array(
                'pagination_url' => Uri::base() . 'sub/categories?cate_id=' . $get['cate_id'],
                'total_items' => Model_Sub_Category::count(array(
                    'where' => array(
                        'category_id' => $get['cate_id']
                    ),
                )),
                'per_page' => 10,
                'uri_segment' => 'page',
                'wrapper' => '<center><ul class="pagination">{pagination}</ul></center>',
                'active' => '<li class="active">{link}</li>',
                'previous' => '<li class="previous">{link}</li>',
                'previous-inactive' => '<li class="previous">{link}</li>',
                'next' => '<li class="next">{link}</li>',
                'next-inactive' => '<li class="next">{link}</li>',
                'regular' => '<li>{link}</li>',
            );
            \Pagination::set_config($config);
            
            $data['sub_categories'] = Model_Sub_Category::find('all', array(
                        'related' => array('category'),
                        'where' => array(
                            'category_id' => $get['cate_id']
                        ),
                        'rows_offset' => \Pagination::get('offset'),
                        'rows_limit' => \Pagination::get('per_page'),
            ));
        } else {
            $config = array(
                'pagination_url' => Uri::base() . 'sub/categories',
                'total_items' => Model_Sub_Category::count(),
                'per_page' => 10,
                'uri_segment' => 'page',
                'wrapper' => '<center><ul class="pagination">{pagination}</ul></center>',
                'active' => '<li class="active">{link}</li>',
                'previous' => '<li class="previous">{link}</li>',
                'previous-inactive' => '<li class="previous">{link}</li>',
                'next' => '<li class="next">{link}</li>',
                'next-inactive' => '<li class="next">{link}</li>',
                'regular' => '<li>{link}</li>',
            );
            \Pagination::set_config($config);
            $data['sub_categories'] = Model_Sub_Category::find('all', array(
                        'related' => array('category'),
                        'rows_offset' => \Pagination::get('offset'),
                        'rows_limit' => \Pagination::get('per_page'),
            ));
        }
        $data['pagination'] = \Pagination::create_links();

-->


<!-- filter 2
if (isset($get['cate_id'])) {

            $url = Uri::base() . 'sub/categories?cate_id=' . $get['cate_id'];
            $item = Model_Sub_Category::count(array(
                        'where' => array(
                            'category_id' => $get['cate_id']
                        ),
            ));
            $data['sub_categories'] = Model_Sub_Category::find('all', array(
                        'related' => array('category'),
                        'where' => array(
                            'category_id' => $get['cate_id']
                        ),
                        'rows_limit' => 10,
            ));
        } else {
            $url = Uri::base() . 'sub/categories';
            $item = Model_Sub_Category::count();
            $data['sub_categories'] = Model_Sub_Category::find('all', array(
                        'related' => array('category'),
                        'rows_limit' => 10,
            ));
        }

        $config = array(
            'pagination_url' => $url,
            'total_items' => $item,
            'per_page' => 10,
            'uri_segment' => 'page',
            'wrapper' => '<center><ul class="pagination">{pagination}</ul></center>',
            'active' => '<li class="active">{link}</li>',
            'previous' => '<li class="previous">{link}</li>',
            'previous-inactive' => '<li class="previous">{link}</li>',
            'next' => '<li class="next">{link}</li>',
            'next-inactive' => '<li class="next">{link}</li>',
            'regular' => '<li>{link}</li>',
        );
        \Pagination::set_config($config);

        $data['pagination'] = \Pagination::create_links();-->

<!--<script src="http://code.jquery.com/jquery-2.0.3.min.js" ></script>
<link href="file:///C:/wamp/www/buffo/public/assets/js/jquery-2.0.3.min.js">
    <script>
       $(document).ready(function(){
           var cate = $('.jobCatTitle_open').text()
           
           if(cate!='')
           {
               $.post('/buffo/services/categories/category.json',{data:cate},function(callback){
                   if(callback.result==true)
                   {
                       var result = false;
                        $('.job').each(function(){
                            var data = $(this).text().split('(');
                            
                            $.post('/buffo/services/categories/sub_category.json?id='+callback.data.id,{data:data},function(callback2){
                                if(callback2.result==true)
                                {
                                     result = true;
                                }else{
                                    result = false;
                                }
                            })
                         })
                         
                         if(result==true)
                         {
                             alert('Success')
                         }
                   }
               })
           }
           /*
           
           */
       })
    </script>-->
<?php echo Form::open(array("class" => "form-horizontal", 'enctype' => 'multiple/form-data')); ?>

<fieldset>

    <div class="form-group">
        <?php echo Form::label('File', 'file', array('class' => 'control-label')); ?>
        <?php echo Form::file('file'); ?>
    </div>
    <div class="form-group">
        <label class='control-label'>&nbsp;</label>
        <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-success')); ?>
    </div>
</fieldset>
<?php echo Form::close(); ?>
