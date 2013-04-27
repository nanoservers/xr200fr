CREATE TABLE `cv_project` (
	`project_id` int(10) NOT NULL auto_increment,
	`project_title_fa` varchar(255) NOT NULL,
	`project_title_en` varchar(255) NOT NULL,
	`project_study_type` varchar(100) NOT NULL,
	`project_plan_type` varchar(100) NOT NULL,
	`project_environment` varchar(100) NOT NULL,
	`project_necessity` varchar(100) NOT NULL,
	`project_method` varchar(100) NOT NULL,
	`project_center` varchar(100) NOT NULL,
	`project_create` int(10) NOT NULL, 
	`project_status` tinyint(1) NOT NULL,
	`project_uid` int(10) NOT NULL, 
	`project_desc` text,
	PRIMARY KEY (`project_id`)
) ENGINE=MyISAM;

CREATE TABLE `cv_paper` (
	`paper_id` int(10) NOT NULL auto_increment,
	`paper_group` varchar(255) NOT NULL,
	`paper_title` varchar(255) NOT NULL,
	`paper_type` varchar(255) NOT NULL,
	`paper_project` int(10) NOT NULL,
	`paper_magazine_name` varchar(255) NOT NULL,
	`paper_magazine_year` int(4) NOT NULL,
	`paper_magazine_volume` varchar(255) NOT NULL,
	`paper_magazine_issue` varchar(255) NOT NULL,
	`paper_magazine_page_start` int(4) NOT NULL,
	`paper_magazine_page_end` int(4) NOT NULL,
	`paper_file` varchar(60) NOT NULL,
	`paper_create` int(10) NOT NULL,
	`paper_status` tinyint(1) NOT NULL,
	PRIMARY KEY (`paper_id`)
) ENGINE=MyISAM;

CREATE TABLE `cv_congress` (
	`congress_id` int(10) NOT NULL auto_increment,
	`congress_title` varchar(255) NOT NULL,
	`congress_date` varchar(100) NOT NULL,
	`congress_type` varchar(100) NOT NULL,
	`congress_country` varchar(100) NOT NULL,
	`congress_location` varchar(100) NOT NULL,
	`congress_create` int(10) NOT NULL,
	`congress_status` tinyint(1) NOT NULL,
	PRIMARY KEY (`congress_id`)
) ENGINE=MyISAM;

CREATE TABLE `cv_thesis` (
	`thesis_id` int(10) NOT NULL auto_increment,
	`thesis_student_firstname` varchar(255) NOT NULL,
	`thesis_student_lastname` varchar(255) NOT NULL,
	`thesis_degree` varchar(100) NOT NULL,
	`thesis_title` varchar(255) NOT NULL,
	`thesis_defense_date` varchar(100) NOT NULL,
	`thesis_create` int(10) NOT NULL,
	`thesis_status` tinyint(1) NOT NULL,
	PRIMARY KEY (`thesis_id`)
) ENGINE=MyISAM;

CREATE TABLE `cv_profile` (
	`profile_id` int(10) NOT NULL auto_increment,
	`profile_firstname` varchar(255) NOT NULL,
	`profile_lastname` varchar(255) NOT NULL,
	`profile_email` varchar(60) NOT NULL,
	`profile_image` varchar(60) NOT NULL,
	`profile_biography` text,
	`profile_create` int(10) NOT NULL,
	`profile_status` tinyint(1) NOT NULL,
	PRIMARY KEY (`profile_id`)
) ENGINE=MyISAM;

CREATE TABLE `cv_profile_thesis` (
	`profile_thesis_id` int(10) NOT NULL auto_increment,
	`profile_thesis_profile` int(10) NOT NULL,
	`profile_thesis_thesis` int(10) NOT NULL,
	`profile_thesis_post` varchar(100) NOT NULL,
	PRIMARY KEY (`profile_thesis_id`)
) ENGINE=MyISAM;

CREATE TABLE `cv_profile_congress` (
	`profile_congress_id` int(10) NOT NULL auto_increment,
	`profile_congress_profile` int(10) NOT NULL,
	`profile_congress_congress` int(10) NOT NULL,
	`profile_congress_type` varchar(100) NOT NULL,
	`profile_congress_title` varchar(255) NOT NULL,
	PRIMARY KEY (`profile_congress_id`)
) ENGINE=MyISAM;

CREATE TABLE `cv_profile_paper` (
	`profile_paper_id` int(10) NOT NULL auto_increment,
	`profile_paper_profile` int(10) NOT NULL,
	`profile_paper_paper` int(10) NOT NULL,
	`profile_paper_type` varchar(100) NOT NULL,
	PRIMARY KEY (`profile_paper_id`)
) ENGINE=MyISAM;

CREATE TABLE `cv_profile_project` (
	`profile_project_id` int(10) NOT NULL auto_increment,
	`profile_project_profile` int(10) NOT NULL,
	`profile_project_project` int(10) NOT NULL,
	`profile_project_type` varchar(255) NOT NULL,
	PRIMARY KEY (`profile_project_id`)
) ENGINE=MyISAM;

CREATE TABLE `cv_profile_arbitration` (
	`profile_arbitration_id` int(10) NOT NULL auto_increment,
	`profile_arbitration_profile` int(10) NOT NULL,
	`profile_arbitration_paper_title` varchar(255) NOT NULL,
	`profile_arbitration_paper_journal` varchar(255) NOT NULL,
	`profile_arbitration_type` varchar(20) NOT NULL,
	`profile_arbitration_lang` varchar(20) NOT NULL,
	PRIMARY KEY (`profile_arbitration_id`)
) ENGINE=MyISAM;

CREATE TABLE `cv_profile_journal` (
	`profile_journal_id` int(10) NOT NULL auto_increment,
	`profile_journal_profile` int(10) NOT NULL,
	`profile_journal_title` varchar(255) NOT NULL,
	PRIMARY KEY (`profile_journal_id`)
) ENGINE=MyISAM;