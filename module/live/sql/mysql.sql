CREATE TABLE `live_channel` (
	`channel_id` int(10) NOT NULL auto_increment,
	`channel_hits` int(11) NOT NULL,
PRIMARY KEY  (`channel_id`,`channel_hits`),
UNIQUE KEY `channel_id` (`channel_id`,`channel_hits`)
) ENGINE=MyISAM;

INSERT INTO `live_channel` (`channel_id` ,`channel_hits`) VALUES ('1', '0');