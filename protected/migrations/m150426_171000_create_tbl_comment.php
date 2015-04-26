<?php

class m150426_171000_create_tbl_comment extends CDbMigration
{
	public function up()
	{
        $sql = <<<SQL
            CREATE TABLE IF NOT EXISTS `{{comment}}` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `id_photo` int(11) NOT NULL,
              `author` varchar(100) NOT NULL,
              `email` varchar(100) DEFAULT NULL,
              `rating` int(11) NOT NULL,
              `comment` varchar(100) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `email_photo` (`email`,`id_photo`)
            ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
SQL;
        $this->execute($sql);
	}

	public function down()
	{
		echo "m150426_171000_create_tbl_comment does not support migration down.\n";
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