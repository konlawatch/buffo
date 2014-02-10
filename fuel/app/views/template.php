
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <?php echo Asset::css('bootstrap.css'); ?>
        <?php echo Asset::js('jquery-2.0.3.min.js'); ?>
        <?php echo Asset::js('tab.js'); ?>
        <?php echo Asset::js('bootstrap.min.js'); ?>
        <style>
            body { margin: 40px; }
        </style>
        <script type="text/javascript">
            $(function() {
                var url = window.location.pathname;
                var activePage = url.substring(url.lastIndexOf('/') - 1);
                $('#myTab li a').each(function() {
                    var currentPage = this.href.substring(this.href.lastIndexOf('/') - 1);

                    if (activePage == currentPage) {
                        $(this).parent().addClass('active');
                    }
                });
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="col-md-12">
<!--			<h1><?php echo $title; ?></h1>
                    <hr>-->
                <ul class="nav nav-tabs" id="myTab">
                    <li><?php echo Html::anchor('categories', 'Categories') ?></li>
                    <li><?php echo Html::anchor('sub/categories', 'Sub Categories') ?></li> 
                    <li><?php echo Html::anchor('language/skill', 'Language Skills') ?></li> 
                    <li><?php echo Html::anchor('computer/skill', 'Computer Skills') ?></li> 
                </ul>
                <?php if (Session::get_flash('success')): ?>
                    <div class="alert alert-success">
                        <strong>Success</strong>
                        <p>
                            <?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
                        </p>
                    </div>
                <?php endif; ?>
                <?php if (Session::get_flash('error')): ?>
                    <div class="alert alert-error">
                        <strong>Error</strong>
                        <p>
                            <?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-12">
                <?php echo $content; ?>
            </div>
            <footer>
                <p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
                <p>
                    <a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
                    <small>Version: <?php echo e(Fuel::VERSION); ?></small>
                </p>
            </footer>
        </div>
    </body>

</html>
<script>
    $(document).ready(function() {
        $('a[data-confirm]').click(function(ev) {
            var href = $(this).attr('href');
            if (!$('#dataConfirmModal').length) {
                $('body').append(
                        '<div class="modal fade" id="dataConfirmModal" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">\n\
                  <div class="modal-dialog">\n\
                    <div class="modal-content">\n\
                        <div class="modal-header">\n\
                            <button type="button" class="close" data-dismiss="modal" aria-hidden = "true">&times;</button>\n\
                            <h4 class="modal-title" id="myModalLabel">Please Confirm...</h4>\n\
                        </div>\n\
                    <div class="modal-body">\n\
                        ...\n\
                    </div>\n\
                    <div class="modal-footer">\n\
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>\n\
                        <a class="btn btn-primary" id="dataConfirmOK">OK</a>\n\
                    </div>\n\
                    </div>\n\
                </div>\n\
            </div>');
            }
            $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
            $('#dataConfirmOK').attr('href', href);
            $('#dataConfirmModal').modal({show: true});
            return false;
        });
    });
</script>