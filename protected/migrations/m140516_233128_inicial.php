<?php

class m140516_233128_inicial extends CDbMigration
{
	public function up()
	{
		$db = $this->getDbConnection();
		$query = file_get_contents(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'ljudi.sql');
		$transaction = $db->beginTransaction();
		$db->createCommand($query)->execute();
		$transaction->commit();
	}

	public function down()
	{
		echo "m140516_233128_inicial does not support migration down.\n";
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