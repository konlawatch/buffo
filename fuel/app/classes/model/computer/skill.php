<?php
use Orm\Model;

class Model_Computer_Skill extends Model
{
    protected static $_table_name = 'skill_computers';
    protected static $_properties = array(
		'id',
		'name_en',
		'name_th',
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

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name_en', 'Name En', 'required|max_length[255]');
		$val->add_field('name_th', 'Name Th', 'required|max_length[255]');

		return $val;
	}

}
