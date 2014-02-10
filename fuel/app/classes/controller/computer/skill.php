<?php

class Controller_Computer_Skill extends Controller_Template {

    public function action_index() {
        $config = array(
            'pagination_url' => Uri::base() . 'computer/skill',
            'total_items' => Model_Computer_Skill::count(),
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
        $data['computer_skills'] = Model_Computer_Skill::find('all', array(
                    'rows_offset' => \Pagination::get('offset'),
                    'rows_limit' => \Pagination::get('per_page'),
        ));
        $data['pagination'] = \Pagination::create_links();
        $this->template->title = "Computer_skills";
        $this->template->content = View::forge('computer\skill/index', $data, false);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('computer/skill');

        if (!$data['computer_skill'] = Model_Computer_Skill::find($id)) {
            Session::set_flash('error', 'Could not find computer_skill #' . $id);
            Response::redirect('computer/skill');
        }

        $this->template->title = "Computer_skill";
        $this->template->content = View::forge('computer\skill/view', $data);
    }

    public function action_create() {
        if (Input::method() == 'POST') {
            $val = Model_Computer_Skill::validate('create');

            if ($val->run()) {
                $computer_skill = Model_Computer_Skill::forge(array(
                            'name_en' => Input::post('name_en'),
                            'name_th' => Input::post('name_th'),
                ));

                if ($computer_skill and $computer_skill->save()) {
                    Session::set_flash('success', 'Added computer_skill #' . $computer_skill->id . '.');

                    Response::redirect('computer/skill');
                } else {
                    Session::set_flash('error', 'Could not save computer_skill.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Computer_Skills";
        $this->template->content = View::forge('computer\skill/create');
    }

    public function action_edit($id = null) {
        is_null($id) and Response::redirect('computer/skill');

        if (!$computer_skill = Model_Computer_Skill::find($id)) {
            Session::set_flash('error', 'Could not find computer_skill #' . $id);
            Response::redirect('computer/skill');
        }

        $val = Model_Computer_Skill::validate('edit');

        if ($val->run()) {
            $computer_skill->name_en = Input::post('name_en');
            $computer_skill->name_th = Input::post('name_th');

            if ($computer_skill->save()) {
                Session::set_flash('success', 'Updated computer_skill #' . $id);

                Response::redirect('computer/skill');
            } else {
                Session::set_flash('error', 'Could not update computer_skill #' . $id);
            }
        } else {
            if (Input::method() == 'POST') {
                $computer_skill->name_en = $val->validated('name_en');
                $computer_skill->name_th = $val->validated('name_th');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('computer_skill', $computer_skill, false);
        }

        $this->template->title = "Computer_skills";
        $this->template->content = View::forge('computer\skill/edit');
    }

    public function action_delete($id = null) {
        is_null($id) and Response::redirect('computer/skill');

        if ($computer_skill = Model_Computer_Skill::find($id)) {
            $computer_skill->delete();

            Session::set_flash('success', 'Deleted computer_skill #' . $id);
        } else {
            Session::set_flash('error', 'Could not delete computer_skill #' . $id);
        }

        Response::redirect('computer/skill');
    }

}
