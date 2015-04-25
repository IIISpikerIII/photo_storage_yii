<?php

class m150425_073801_create_tbl_user extends CDbMigration
{
	public function up()
	{
        $sql = <<<SQL
            CREATE TABLE `{{user}}` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `username` varchar(100) DEFAULT NULL,
              `password` varchar(60) DEFAULT NULL,
              `email` varchar(100) DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
SQL;
        $this->execute($sql);
	}

	public function down()
	{
		echo "m150425_073801_create_tbl_user does not support migration down.\n";
		return false;
	}
}