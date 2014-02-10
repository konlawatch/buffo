<?php

class Controller_Categories extends Controller_Template {

    private $_lang_default = 'en';
    private $_lang;

    public function before() {
        parent::before();

        if (Session::get('lang') == '') {
            Session::set('lang', $this->_lang_default);
        }
    }
   
    public function action_tmp() {
//        echo View::forge('categories/tmp');

        $aa = Model_Category::find('all');

        foreach ($aa as $a) {
            echo $a->{'name_' . Session::get('lang')};
        }
        exit;
        if (Input::method() == 'POST') {
            var_dump(Input::post('file'));

            $aa = Model_Category::find('all');
            foreach ($aa as $a) {
                echo $a->name_{Session::get('lang')};
            }
        }

        exit;
        echo View::forge('categories/tmp');
        exit();
    }

    public function action_index() {
        Config::set('language', Session::get('lang'));
        
        $data['lang'] = Lang::load(Session::get('lang'));
//        var_dump($data);exit();
        $data['categories'] = Model_Category::find('all', array(
                    'order_by' => array(
                        'seq' => 'desc',
                    )
        ));
        $data['max'] = Model_Category::max('seq');
        $data['min'] = Model_Category::min('seq');

        $this->template->title = $data['lang']['categories'];
        $this->template->content = View::forge('categories/index', $data);
    }

    public function action_categories() {
        
    }

    public function action_lang($lang) {
        Session::set('lang', $lang);
        Response::redirect('categories');
    }

    public function action_view($id = null) {
        Config::set('language', Session::get('lang'));
        $data['lang'] = Lang::load(Session::get('lang'));
        is_null($id) and Response::redirect('categories');

        if (!$data['category'] = Model_Category::find($id, array('related' => array('category')))) {
            Session::set_flash('error', 'Could not find category #' . $id);
            Response::redirect('categories');
        }
//        var_dump($data['category']);exit();
        $this->template->title = $data['lang']['categories'];
        $this->template->content = View::forge('categories/view', $data);
    }

    public function action_create() {
        Config::set('language', Session::get('lang'));
        $data['lang'] = Lang::load(Session::get('lang'));
        if (Input::method() == 'POST') {
            $val = Model_Category::validate('create');
            if ($val->run()) {
                $seq = Model_Category::max('seq');
                $seq+=1;
                $category = Model_Category::forge(array(
                            'seq' => $seq,
                            'name_th' => Input::post('name_th'),
                            'name_en' => Input::post('name_en'),
                ));
                if ($category and $category->save()) {
                    Session::set_flash('success', 'Added category #' . $category->id . '.');

                    Response::redirect('categories');
                } else {
                    Session::set_flash('error', 'Could not save category.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = $data['lang']['categories'];
        $this->template->content = View::forge('categories/create', $data);
    }

    public function action_edit($id = null) {
        Config::set('language', Session::get('lang'));
        $data['lang'] = Lang::load(Session::get('lang'));
        is_null($id) and Response::redirect('categories');

        if (!$category = Model_Category::find($id)) {
            Session::set_flash('error', 'Could not find category #' . $id);
            Response::redirect('categories');
        }

        $val = Model_Category::validate('edit');

        if ($val->run()) {
            $category->name_th = Input::post('name_th');
            $category->name_en = Input::post('name_en');

            if ($category->save()) {
                Session::set_flash('success', 'Updated category #' . $id);

                Response::redirect('categories');
            } else {
                Session::set_flash('error', 'Could not update category #' . $id);
            }
        } else {
            if (Input::method() == 'POST') {
                $category->name_th = $val->validated('name_th');
                $category->name_en = $val->validated('name_en');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('category', $category, false);
        }

        $this->template->title = $data['lang']['categories'];
        $this->template->content = View::forge('categories/edit', $data);
    }

    public function action_delete($id = null) {
        is_null($id) and Response::redirect('categories');

        if ($category = Model_Category::find($id, array('related' => array('category')))) {
//            var_dump($category->category);exit();
            if (empty($category->category)) {
                $category->delete();

                Session::set_flash('success', 'Deleted category #' . $id);
            } else {
                Session::set_flash('error', 'Could not delete category #' . $id);
            }
        } else {
            Session::set_flash('error', 'Could not delete category #' . $id);
        }

        Response::redirect('categories');
    }

    public function action_seq($id, $sorting) {
        $get = Input::get();
        $type = $get['seq'];
        /* all data in van_id = $type */
        $model = Model_Category::find('all', array(
                    'select' => array('id', 'seq'),
        ));
        // count all data
        $total = count($model);
        // get data that you want to change seq
        $seq = Model_Category::find($id);
        $temp = $seq->seq;
        if ($sorting == 'down') {
            if ($temp > 1) {
                $temp-=1;
            } else {
                $temp = 1;
            }
        } else {
            if ($temp < $total) {
                $temp+=1;
            } else {
                $temp = $total;
            }
        }
        if ($seq->save()) {
            foreach ($model as $m) {
                if ($sorting == 'up') {
                    if ($m->seq == ($temp)) { // ex. $temp = 5, $m->seq = 5
                        $m->seq -= 1; // $m->seq = 4
                        $m->save();
                        $seq->seq = $temp;
                        $seq->save();
                        break;
                    }
                }
                if ($sorting == 'down') {
                    if ($m->seq == ($temp)) {
                        $m->seq += 1;
                        $m->save();
                        $seq->seq = $temp;
                        $seq->save();
                        break;
                    }
                }
            }
        }
        Response::redirect('categories');
    }

}
