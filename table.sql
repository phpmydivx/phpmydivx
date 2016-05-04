CREATE TABLE liste (
  id int(11) NOT NULL auto_increment,
  nom varchar(255) NOT NULL default '',
  support varchar(255) NOT NULL default '',
  langue varchar(255) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  qualite varchar(255) NOT NULL default '',
  PRIMARY KEY  (id),
  UNIQUE KEY id_2 (id),
  KEY id (id)
) TYPE=MyISAM;

CREATE TABLE nbconnecte (
  id int(10) unsigned NOT NULL auto_increment,
  ip varchar(15) NOT NULL default '',
  date int(14) NOT NULL default '0',
  PRIMARY KEY  (id),
  UNIQUE KEY id (id),
  KEY id_2 (id)
) TYPE=MyISAM;

