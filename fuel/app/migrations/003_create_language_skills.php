<?php

namespace Fuel\Migrations;

class Create_language_skills
{
	public function up()
	{
		\DBUtil::create_table('language_skills', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name_en' => array('constraint' => 255, 'type' => 'varchar'),
			'name_th' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('language_skills');
	}
}