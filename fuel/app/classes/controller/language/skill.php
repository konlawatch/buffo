<?php

class Controller_Language_Skill extends Controller_Template {

    public function action_index() {
        $config = array(
            'pagination_url' => Uri::base() . 'language/skill',
            'total_items' => Model_Language_Skill::count(),
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
        $data['language_skills'] = Model_Language_Skill::find('all', array(
                    'rows_offset' => \Pagination::get('offset'),
                    'rows_limit' => \Pagination::get('per_page'),
        ));
        $data['pagination'] = \Pagination::create_links();
        $this->template->title = "Language_skills";
        $this->template->content = View::forge('language\skill/index', $data, false);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('language/skill');

        if (!$data['language_skill'] = Model_Language_Skill::find($id)) {
            Session::set_flash('error', 'Could not find language_skill #' . $id);
            Response::redirect('language/skill');
        }

        $this->template->title = "Language_skill";
        $this->template->content = View::forge('language\skill/view', $data);
    }

    public function action_create() {
        if (Input::method() == 'POST') {
            $val = Model_Language_Skill::validate('create');

            if ($val->run()) {
                $language_skill = Model_Language_Skill::forge(array(
                            'name_en' => Input::post('name_en'),
                            'name_th' => Input::post('name_th'),
                ));

                if ($language_skill and $language_skill->save()) {
                    Session::set_flash('success', 'Added language_skill #' . $language_skill->id . '.');

                    Response::redirect('language/skill');
                } else {
                    Session::set_flash('error', 'Could not save language_skill.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Language_Skills";
        $this->template->content = View::forge('language\skill/create');
    }

    public function action_edit($id = null) {
        is_null($id) and Response::redirect('language/skill');

        if (!$language_skill = Model_Language_Skill::find($id)) {
            Session::set_flash('error', 'Could not find language_skill #' . $id);
            Response::redirect('language/skill');
        }

        $val = Model_Language_Skill::validate('edit');

        if ($val->run()) {
            $language_skill->name_en = Input::post('name_en');
            $language_skill->name_th = Input::post('name_th');

            if ($language_skill->save()) {
                Session::set_flash('success', 'Updated language_skill #' . $id);

                Response::redirect('language/skill');
            } else {
                Session::set_flash('error', 'Could not update language_skill #' . $id);
            }
        } else {
            if (Input::method() == 'POST') {
                $language_skill->name_en = $val->validated('name_en');
                $language_skill->name_th = $val->validated('name_th');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('language_skill', $language_skill, false);
        }

        $this->template->title = "Language_skills";
        $this->template->content = View::forge('language\skill/edit');
    }

    public function action_delete($id = null) {
        is_null($id) and Response::redirect('language/skill');

        if ($language_skill = Model_Language_Skill::find($id)) {
            $language_skill->delete();

            Session::set_flash('success', 'Deleted language_skill #' . $id);
        } else {
            Session::set_flash('error', 'Could not delete language_skill #' . $id);
        }

        Response::redirect('language/skill');
    }

}
