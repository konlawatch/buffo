<?php

namespace Fuel\Migrations;

class Create_sub_categories
{
	public function up()
	{
		\DBUtil::create_table('sub_categories', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'category_id' => array('constraint' => 11, 'type' => 'int'),
			'name_th' => array('constraint' => 255, 'type' => 'varchar'),
			'name_en' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('sub_categories');
	}
}