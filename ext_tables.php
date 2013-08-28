<?php
if (!defined('TYPO3_MODE')) die ('Access denied.');
$TCA["user_europeanicons_icon"] = array(
    "ctrl" => array(
        'title' => 'LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_icon',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => "ORDER BY crdate",
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden',
        ),
        'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
        'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'icon_user_europeanicons_icon.gif',
    ),
    "feInterface" => array(
        "fe_admin_fieldList" => "hidden, name",
    )
);


$TCA["user_europeanicons_occurences"] = array(
    "ctrl" => array(
        'title' => 'LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_occurences',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => "ORDER BY crdate",
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden',
        ),
        'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
        'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'icon_user_europeanicons_occurence.gif',
    ),
    "feInterface" => array(
        "fe_admin_fieldList" => "hidden, title",
    )
);


t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY . '_pi1'] = 'layout,select_key';

#flexforms
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_pi1'] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($_EXTKEY . '_pi1', 'FILE:EXT:' . $_EXTKEY . '/flexforms/pi1_flexforms.xml');


t3lib_extMgm::addPlugin(array('LLL:EXT:user_europeanicons/locallang_db.xml:tt_content.list_type_pi1', $_EXTKEY . '_pi1'), 'list_type');


t3lib_extMgm::addStaticFile($_EXTKEY, "pi1/static/", "Library Plugin");
?>