<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Controller_test extends Controller_Rest {

    public function get_list() {
        return $this->response(array(
                    'foo' => Input::get('foo'),
                    'baz' => array(
                        1, 50, 219
                    ),
                    'empty' => null
        ));
    }

}
