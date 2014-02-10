<?php

class Controller_Sub_Categories extends Controller_Template {

    public function action_index() {
        $get = Input::get();

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

        $this->template->title = "Sub_categories";
        $this->template->content = View::forge('sub\categories/index', $data, false);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('sub/categories');

        if (!$data['sub_category'] = Model_Sub_Category::find($id)) {
            Session::set_flash('error', 'Could not find sub_category #' . $id);
            Response::redirect('sub/categories');
        }

        $this->template->title = "Sub_category";
        $this->template->content = View::forge('sub\categories/view', $data);
    }

    public function action_create() {
        $data['category'] = Model_Category::find('all');
        if (Input::method() == 'POST') {
            $val = Model_Sub_Category::validate('create');

            if ($val->run()) {
                $sub_category = Model_Sub_Category::forge(array(
                            'category_id' => Input::post('category_id'),
                            'name_th' => Input::post('name_th'),
                            'name_en' => Input::post('name_en'),
                ));

                if ($sub_category and $sub_category->save()) {
                    Session::set_flash('success', 'Added sub_category #' . $sub_category->id . '.');

                    Response::redirect('sub/categories');
                } else {
                    Session::set_flash('error', 'Could not save sub_category.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Sub_Categories";
        $this->template->content = View::forge('sub\categories/create', $data);
    }

    public function action_edit($id = null) {
        $data['category'] = Model_Category::find('all');
        is_null($id) and Response::redirect('sub/categories');

        if (!$sub_category = Model_Sub_Category::find($id)) {
            Session::set_flash('error', 'Could not find sub_category #' . $id);
            Response::redirect('sub/categories');
        }

        $val = Model_Sub_Category::validate('edit');

        if ($val->run()) {
            $sub_category->category_id = Input::post('category_id');
            $sub_category->name_th = Input::post('name_th');
            $sub_category->name_en = Input::post('name_en');

            if ($sub_category->save()) {
                Session::set_flash('success', 'Updated sub_category #' . $id);

                Response::redirect('sub/categories');
            } else {
                Session::set_flash('error', 'Could not update sub_category #' . $id);
            }
        } else {
            if (Input::method() == 'POST') {
                $sub_category->category_id = $val->validated('category_id');
                $sub_category->name_th = $val->validated('name_th');
                $sub_category->name_en = $val->validated('name_en');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('sub_category', $sub_category, false);
        }

        $this->template->title = "Sub_categories";
        $this->template->content = View::forge('sub\categories/edit', $data);
    }

    public function action_delete($id = null) {
        is_null($id) and Response::redirect('sub/categories');

        if ($sub_category = Model_Sub_Category::find($id)) {
            $sub_category->delete();

            Session::set_flash('success', 'Deleted sub_category #' . $id);
        } else {
            Session::set_flash('error', 'Could not delete sub_category #' . $id);
        }

        Response::redirect('sub/categories');
    }

}
