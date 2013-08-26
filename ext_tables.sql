#'
#
# Table structure for table 'user_europeanicons_icon_occurence_mm
#
CREATE TABLE user_europeanicons_icon_occurence_mm (
  uid_local int(11) DEFAULT '0' NOT NULL,
  uid_foreign int(11) DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting int(11) DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'user_europeanicons_occurences'
#
CREATE TABLE user_europeanicons_occurences (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,
    tstamp int(11) DEFAULT '0' NOT NULL,
    crdate int(11) DEFAULT '0' NOT NULL,
    cruser_id int(11) DEFAULT '0' NOT NULL,
    deleted tinyint(4) DEFAULT '0' NOT NULL,
    hidden tinyint(4) DEFAULT '0' NOT NULL,

    title tinytext NOT NULL,
    authors tinytext NOT NULL,
    publisher tinytext NOT NULL,
    publishing_place tinytext NOT NULL,
    reprint tinytext NOT NULL,
    year double(4,0) NOT NULL,
    country varchar(30) NOT NULL,
    first_published double(4,0) NOT NULL,
    page double(4,0) NOT NULL,
    pos_in_book VARCHAR (30) NOT NULL,
    context tinytext NOT NULL,
    type_of_edit varchar(25) NOT NULL,
    size_of_image varchar (35) NOT NULL,
    type_of_repro varchar(25) NOT NULL,
    additional tinytext NOT NULL,
    geisignatur varchar(20) NOT NULL,
    linktolibrary tinytext not null,
    linktomore tinytext not null,

    iconmm int(11) DEFAULT '0' NOT NULL,
    PRIMARY KEY (uid),
    KEY parent (pid)
);


#
# Table structure for table 'user_europeanicons_icon'
#
CREATE TABLE user_europeanicons_icon (
        uid int(11) NOT NULL auto_increment,
        pid int(11) DEFAULT '0' NOT NULL,
        tstamp int(11) DEFAULT '0' NOT NULL,
        crdate int(11) DEFAULT '0' NOT NULL,
        cruser_id int(11) DEFAULT '0' NOT NULL,
        deleted tinyint(4) DEFAULT '0' NOT NULL,
        hidden tinyint(4) DEFAULT '0' NOT NULL,

        name tinytext NOT NULL,
        l18n_name tinytext NOT NULL,
        name_is_origname VARCHAR (4) NOT NULL,
        image blob NOT NULL,
        author TINYTEXT NOT NULL,
        year DOUBLE(4,0) NOT NULL,
        place varchar(30) NOT NULL,
        country varchar(30) NOT NULL,
        linktocommons TINYTEXT NOT NULL,
        technique TINYTEXT NOT NULL,
        size TINYTEXT NOT NULL,
        owner VARCHAR (45),
        owner_link TINYTEXT NOT NULL,
        comment TINYTEXT NOT NULL,

        PRIMARY KEY (uid),
        KEY parent (pid)
);