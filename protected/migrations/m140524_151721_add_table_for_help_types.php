<?php

class m140524_151721_add_table_for_help_types extends CDbMigration
{
	public function up()
	{
		$db = $this->getDbConnection();
		$query = file_get_contents(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'types.sql');
		$transaction = $db->beginTransaction();
		$db->createCommand($query)->execute();
		$transaction->commit();
	}

	public function down()
	{
		echo "m140524_151721_add_table_for_help_types does not support migration down.\n";
		return false;
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