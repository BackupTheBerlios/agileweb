# MySQL-Front Dump 2.4
#
# Host: localhost   Database: diggmore
#--------------------------------------------------------
# Server version 4.0.22-nt


#
# Table structure for table 'comments'
#

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `postid` int(11) unsigned NOT NULL default '0',
  `userid` int(11) unsigned NOT NULL default '0',
  `title` varchar(200) default NULL,
  `content` text NOT NULL,
  `addtime` int(11) NOT NULL default '0',
  `ip` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `postid` (`postid`),
  KEY `userid` (`userid`)
) TYPE=MyISAM;



#
# Dumping data for table 'comments'
#


#
# Table structure for table 'member'
#

CREATE TABLE `member` (
  `userid` int(11) unsigned NOT NULL auto_increment,
  `username` varchar(50) NOT NULL default '',
  `password` varchar(100) NOT NULL default '',
  `email` varchar(200) NOT NULL default '',
  `regdate` int(11) unsigned NOT NULL default '0',
  `regip` varchar(100) NOT NULL default '',
  `avatar` varchar(255) NOT NULL default '',
  `homepage` varchar(255) default NULL,
  `showname` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`userid`),
  KEY `username` (`username`)
) TYPE=MyISAM;



#
# Dumping data for table 'member'
#


#
# Table structure for table 'posts'
#

CREATE TABLE `posts` (
  `postid` int(11) unsigned NOT NULL auto_increment,
  `sectionid` int(11) unsigned NOT NULL default '0',
  `userid` int(11) unsigned NOT NULL default '0',
  `title` varchar(200) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `content` text NOT NULL,
  `addtime` int(11) unsigned NOT NULL default '0',
  `addip` varchar(100) NOT NULL default '',
  `tags` varchar(255) default NULL,
  `votes` int(11) NOT NULL default '0',
  `hits` int(11) NOT NULL default '0',
  `comments` int(11) NOT NULL default '0',
  PRIMARY KEY  (`postid`),
  KEY `userid` (`userid`),
  KEY `sectionid` (`sectionid`)
) TYPE=MyISAM;



#
# Dumping data for table 'posts'
#


#
# Table structure for table 'sections'
#

CREATE TABLE `sections` (
  `sectionid` int(11) unsigned NOT NULL auto_increment,
  `sectionname` varchar(100) NOT NULL default '',
  `sectiondesc` text,
  PRIMARY KEY  (`sectionid`)
) TYPE=MyISAM;



#
# Dumping data for table 'sections'
#


#
# Table structure for table 'tag'
#

CREATE TABLE `tag` (
  `tagid` int(11) unsigned NOT NULL auto_increment,
  `tagname` varchar(50) NOT NULL default '',
  `taghits` int(11) NOT NULL default '0',
  `addtime` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`tagid`)
) TYPE=MyISAM;



#
# Dumping data for table 'tag'
#


#
# Table structure for table 'tag_content'
#

CREATE TABLE `tag_content` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `tagid` int(11) NOT NULL default '0',
  `postid` int(11) NOT NULL default '0',
  `addtime` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `tagid` (`tagid`),
  KEY `postid` (`postid`)
) TYPE=MyISAM;



#
# Dumping data for table 'tag_content'
#


#
# Table structure for table 'votes'
#

CREATE TABLE `votes` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `postid` int(11) unsigned NOT NULL default '0',
  `userid` int(11) unsigned NOT NULL default '0',
  `votetime` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `postid` (`postid`),
  KEY `userid` (`userid`)
) TYPE=MyISAM;



#
# Dumping data for table 'votes'
#
