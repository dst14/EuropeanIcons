#'
#
# Table structure for table 'user_europeanicons_icon_occurence_mm
#
CREATE TABLE user_europeanicons_icon_occurence_mm (
  uid_local INT(11) DEFAULT '0' NOT NULL,
  uid_foreign INT(11) DEFAULT '0' NOT NULL,
  tablenames VARCHAR(30) DEFAULT '' NOT NULL,
  sorting INT(11) DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'user_europeanicons_occurences'
#
CREATE TABLE user_europeanicons_occurences (
  uid INT(11) AUTO_INCREMENT NOT NULL,
  pid INT(11) NOT NULL DEFAULT '0',
  tstamp INT(11) NOT NULL DEFAULT '0',
  crdate INT(11) NOT NULL DEFAULT '0',
  cruser_id INT(11) NOT NULL DEFAULT '0',
  deleted TINYINT(4) NOT NULL DEFAULT '0',
  hidden TINYINT(4) NOT NULL DEFAULT '0',
  title TINYTEXT NOT NULL,
  authors TINYTEXT NOT NULL,
  publisher TINYTEXT NOT NULL,
  publishing_place TINYTEXT NOT NULL,
  reprint TINYTEXT NOT NULL,
  year DOUBLE(4, 0) DEFAULT NULL,
  country VARCHAR(30) DEFAULT NULL,
  first_published DOUBLE(4, 0) DEFAULT NULL,
  page DOUBLE(4, 0) DEFAULT NULL,
  type_of_edit VARCHAR(25) DEFAULT NULL,
  type_of_repro VARCHAR(25) DEFAULT NULL,
  additional TEXT,
  geisignatur VARCHAR(20) DEFAULT NULL,
  linktolibrary TINYTEXT,
  linktomore TINYTEXT,
  iconmm INT(11) NOT NULL DEFAULT '0',
  pos_in_book VARCHAR(30) DEFAULT NULL,
  context TEXT,
  size_of_image VARCHAR(35) DEFAULT NULL,
  PRIMARY KEY (uid),
  KEY parent (pid)
);


#
# Table structure for table 'user_europeanicons_icon'
#
CREATE TABLE user_europeanicons_icon (
  uid              INT(11) AUTO_INCREMENT NOT NULL,
  pid              INT(11) DEFAULT '0'    NOT NULL,
  tstamp           INT(11) DEFAULT '0'    NOT NULL,
  crdate           INT(11) DEFAULT '0'    NOT NULL,
  cruser_id        INT(11) DEFAULT '0'    NOT NULL,
  deleted          TINYINT(4) DEFAULT '0' NOT NULL,
  hidden           TINYINT(4) DEFAULT '0' NOT NULL,
  name             TINYTEXT               NOT NULL,
  l18n_name        TINYTEXT,
  name_is_origname VARCHAR(4) DEFAULT NULL,
  image            BLOB                   NOT NULL,
  author           TINYTEXT,
  year             DOUBLE(4, 0) DEFAULT NULL,
  place            VARCHAR(30) DEFAULT NULL,
  country          VARCHAR(30) DEFAULT NULL,
  linktocommons    TINYTEXT,
  technique        TINYTEXT,
  size             TINYTEXT,
  owner            VARCHAR(45) DEFAULT NULL,
  owner_link       TINYTEXT,
  comment          TEXT,
  literature       TEXT,
  is_child BOOLEAN DEFAULT FALSE,
  parent_uid int(11) DEFAULT '0' NOT NULL

  PRIMARY KEY (uid),
  KEY parent (pid)
);