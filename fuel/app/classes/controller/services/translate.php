<?php

/*
 * @author by konlawatch
 * 
 */

class Controller_services_translate extends Controller_Rest {

    private $_Model;

    public function action_model($model = null) {
//        var_dump($model);exit();
        if ($model) {
            $_Model = 'Model_' . $model;
            $config = array(
                'pagination_url' => $model,
                'total_items' => $_Model::count(),
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
            $data['translate'] = $_Model::find('all', array(
                        'rows_offset' => \Pagination::get('offset'),
                        'rows_limit' => \Pagination::get('per_page'),
            ));
            $data['pagination'] = \Pagination::create_links();
            echo View::forge('translate', $data, false);
        }
    }

    public function post_row() {
        $response = array(
            'result' => false,
            'data' => ''
        );
        if (Input::is_ajax()) {
            $post = Input::post();
            $get = Input::get();
            $_Model = 'Model_' . $get['model'];

            $model = $_Model::find($get['id']);
            if ($model) {
                $model->name_en = $post['name_en'];
                $model->name_th = $post['name_th'];
                if ($model->save()) {
                    $response['result'] = true;
                }
            }
        }
        return $this->response($response);
    }

}
