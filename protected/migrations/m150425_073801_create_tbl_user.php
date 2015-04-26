<?php

class m150425_073801_create_tbl_user extends CDbMigration
{
	public function up()
	{
        $sql = <<<SQL
            CREATE TABLE IF NOT EXISTS `{{photo}}` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `title` varchar(100) NOT NULL,
              `path` varchar(100) NOT NULL,
              `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
              `id_user` int(11) NOT NULL,
              `rating` float NOT NULL DEFAULT '0',
              PRIMARY KEY (`id`)
            ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
SQL;
        $this->execute($sql);
	}

	public function down()
	{
		echo "m150425_073801_create_tbl_user does not support migration down.\n";
		return false;
	}
}