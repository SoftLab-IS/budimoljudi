<?php

class m140523_142327_delete_last_name_from_table_user extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('user','last_name');
	}

	public function down()
	{
		$this->addColumn('user','last_name',"string");
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}