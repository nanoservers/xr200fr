CREATE TABLE `tv_item` (
	`item_id` int(10) NOT NULL auto_increment,
	`item_title` varchar(255) NOT NULL,
	`item_text` text NOT NULL,
	`item_status` tinyint(1) NOT NULL,
	`item_img` varchar(255) NOT NULL,
	`item_created` int(11) NOT NULL,
	`item_select` tinyint(1) NOT NULL,
PRIMARY KEY  (`item_id`),
KEY `item_title` (`item_title`),
KEY `item_select` (`item_select`),
KEY `item_status` (`item_status`),
KEY `item_created` (`item_created`)
) ENGINE=MyISAM;

CREATE TABLE `tv_list` (
	`list_id` int (11) unsigned NOT NULL  auto_increment,
	`list_day` int(11) NOT NULL,
	`list_title` varchar(255) NOT NULL,
	`list_item` int(11) NOT NULL,
	`list_minute` tinyint(3) NOT NULL,
   `list_hour` tinyint(3) NOT NULL,
   `list_minute2` tinyint(3) NOT NULL,
   `list_hour2` tinyint(3) NOT NULL,
   `list_minute3` tinyint(3) NOT NULL,
   `list_hour3` tinyint(3) NOT NULL,
	`list_situation` varchar(255) NOT NULL,
	`list_status` tinyint(1) NOT NULL,
	`list_order` int(11) NOT NULL,
   `list_created` int(11) NOT NULL,
PRIMARY KEY (`list_id`),
KEY `list_day` (`list_day`),
KEY `list_status` (`list_status`),
KEY `list_order` (`list_order`)
) ENGINE=MyISAM;