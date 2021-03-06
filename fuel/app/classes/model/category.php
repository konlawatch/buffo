<?php

use Orm\Model;

class Model_Category extends Model {

    protected static $_properties = array(
        'id',
        'seq',
        'name_th',
        'name_en',
        'created_at',
        'updated_at',
    );
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_save'),
            'mysql_timestamp' => false,
        ),
    );
    protected static $_has_many = array(
        'category' => array(
            'key_from' => 'seq',
            'model_to' => 'Model_sub_category',
            'key_to' => 'category_id',
        )
    );

    public static function validate($factory) {
        $val = Validation::forge($factory);
        $val->add_field('name_th', 'Name Th', 'required|max_length[255]');
        $val->add_field('name_en', 'Name En', 'required|max_length[255]');

        return $val;
    }

}
