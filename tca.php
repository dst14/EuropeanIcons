<?php
if (!defined('TYPO3_MODE')) die ('Access denied.');

//TODO Translate Select-Fields

$TCA["user_europeanicons_icon"] = array(
    "ctrl" => $TCA["user_europeanicons_icon"]["ctrl"],
    "interface" => array(
        "showRecordFieldList" => "hidden,name,image,author,year,place,country,linktocommons,l18n_name,name_is_origname,technique,size,owner,owner_link,comment,literature"
    ),
    "feInterface" => $TCA["user_europeanicons_icon"]["feInterface"],
    "columns" => array(
        'hidden' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
            'config' => array(
                'type' => 'check',
                'default' => '0'
            )
        ),
        "name" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_icon.name",
            "config" => Array(
                "type" => "input",
                "size" => "30"
            )
        ),
        "image" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_icon.image",
            "config" => Array(
                "type" => "group",
                "internal_type" => "file",
                "allowed" => $GLOBALS["TYPO3_CONF_VARS"]["GFX"]["imagefile_ext"],
                "max_size" => 2000,
                "uploadfolder" => "uploads/user_europeanicons",
                "show_thumbs" => 1,
                "size" => 1,
                "minitems" => 0,
                "maxitems" => 1
            )
        ),

        "author" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_icon.author",
            "config" => Array(
                "type" => "input",
                "size" => "30"
            )
        ),
        "year" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_icon.year",
            "config" => Array(
                "type" => "input",
                "size" => "30"
            )
        ),
        "place" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_icon.place",
            "config" => Array(
                "type" => "input",
                "size" => "30"
            )
        ),
        "country" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_icon.country",
            "config" => Array(
                "type" => "input",
                "size" => "30"
            )
        ),
        "linktocommons" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_icon.linktocommons",
            "config" => Array(
                "type" => "input",
                "size" => "30"
            )
        ),
        "l18n_name" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_icon.l18n_name",
            "config" => Array(
                "type" => "input",
                "size" => "30"
            )
        ),
        "name_is_origname" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_icon.name_is_origname",
            "config" => Array(
                "type" => "select",
                "items" => Array(
                    Array('ja', 'JA'),
                    Array('nein', 'NEIN')
                )
            )
        ),
        "technique" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_icon.technique",
            "config" => Array(
                "type" => "input",
                "size" => "30"
            )
        ),
        "size" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_icon.size",
            "config" => Array(
                "type" => "input",
                "size" => "30"

            )
        ),
        "owner" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_icon.owner",
            "config" => Array(
                "type" => "input",
                "size" => "30"
            )
        ),
        "owner_link" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_icon.owner_link",
            "config" => Array(
                "type" => "input",
                "size" => "30"
            )
        ),
        "comment" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_icon.comment",
            "config" => Array(
                "type" => "input",
                "size" => "30"
            )
        ),
        "literature" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_icon.literature",
            "config" => Array(
                "type" => "text",
                "rows" => "5",
                "cols" => "30"
            )
        )
    ),


    "types" => array(
        "0" => array("showitem" => "hidden;;1;;1-1-1, name,image,author,year,place,country,linktocommons,l18n_name,name_is_origname,technique,size,owner,owner_link,comment,literature")
    ),
    "palettes" => array(
        "1" => array("showitem" => "")
    )
);

$TCA["user_europeanicons_occurences"] = array(
    "ctrl" => $TCA["user_europeanicons_occurences"]["ctrl"],
    "interface" => array(
        "showRecordFieldList" => "hidden,iconmm,title,authors,publisher,publishing_place,reprint,year,country,first_published,page,type_of_edit,type_of_repro,additional,geisignatur,linktolibrary,linktomore,pos_in_book,context,size_of_image"
    ),
    "feInterface" => $TCA["user_europeanicons_occurences"]["feInterface"],
    "columns" => array(
        'hidden' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
            'config' => array(
                'type' => 'check',
                'default' => '0'
            )
        ),

        "iconmm" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_occurences.iconmm",
            "config" => Array(
                "type" => "group",
                "internal_type" => "db",
                "allowed" => "user_europeanicons_icon",
                "size" => 1,
                "minitems" => 0,
                "maxitems" => 1,
                "MM" => "user_europeanicons_icon_occurence_mm",
            )
        ),

        "title" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_occurences.title",
            "config" => Array(
                "type" => "input",
                "size" => "30",
            )
        ),
        "authors" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_occurences.authors",
            "config" => Array(
                "type" => "input",
                "size" => "30",
            )
        ),
        "publisher" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_occurences.publisher",
            "config" => Array(
                "type" => "input",
                "size" => "30",
            )
        ),
        "publishing_place" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_occurences.publishing_place",
            "config" => Array(
                "type" => "input",
                "size" => "30",
            )
        ),
        "reprint" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_occurences.reprint",
            "config" => Array(
                "type" => "input",
                "size" => "30",
            )
        ),
        "year" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_occurences.year",
            "config" => Array(
                "type" => "input",
                "size" => "30",
            )
        ),
        "country" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_occurences.country",
            "config" => Array(
                "type" => "input",
                "size" => "30",
            )
        ),
        "first_published" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_occurences.first_published",
            "config" => Array(
                "type" => "input",
                "size" => "30",
            )
        ),
        "page" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_occurences.page",
            "config" => Array(
                "type" => "input",
                "size" => "30",
            )
        ),
        "type_of_edit" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_occurences.type_of_edit",
            "config" => Array(
                "type" => "select",
                "items" => Array(
                    Array('vollständig', 'vollständig'),
                    Array('beschnitten', 'beschnitten'),
                    Array('Detail', 'Detail'),
                    Array('Rahmen', 'gerahmt')
                )
            )
        ),
        "type_of_repro" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_occurences.type_of_repro",
            "config" => Array(
                "type" => "select",
                "items" => Array(
                    Array('farbig', 'farbig'),
                    Array('schwarz-weiß', 'schwarz-weiß')
                )
            )
        ),
        "additional" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_occurences.additional",
            "config" => Array(
                "type" => "input",
                "size" => "30",
            )
        ),
        "geisignatur" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_occurences.geisignatur",
            "config" => Array(
                "type" => "input",
                "size" => "30",
            )
        ),
        "linktolibrary" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_occurences.linktolibrary",
            "config" => Array(
                "type" => "input",
                "size" => "30",
            )
        ),
        "linktomore" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_occurences.linktomore",
            "config" => Array(
                "type" => "input",
                "size" => "30",
            )
        ),
        "pos_in_book" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_occurences.pos_in_book",
            "config" => Array(
                "type" => "select",
                "items" => Array(
                    Array('Cover', 'Cover'),
                    Array('Kapiteleinstieg', 'Kapiteleinstieg'),
                    Array('im Kapitel', 'im Kapitel'),
                    Array('auf Methodenseite', 'auf Methodenseite'),
                    Array('im Aufgabenteil', 'im Aufgabenteil')
                )
            )
        ),
        "context" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_occurences.context",
            "config" => Array(
                "type" => "select",
                "items" => Array(
                    Array('im Autorentext referenziert', 'im Autorentext referenziert'),
                    Array('in Aufgabe referenziert', 'im Aufgabenteil referenziert'),
                    Array('illustrativ', 'illustrativ')
                )
            )
        ),
        "size_of_image" => Array(
            "exclude" => 1,
            "label" => "LLL:EXT:user_europeanicons/locallang_db.xml:user_europeanicons_occurences.size_of_image",
            "config" => Array(
                "type" => "select",
                "items" => Array(
                    Array('ganzseitig', 'ganzseitig'),
                    Array('halbseitig', 'halbseitig'),
                    Array('viertelseitig und kleiner', 'viertelseitig und kleiner'),
                    Array('marginal', 'als Marginalie')
                )
            )
        ),
    ),
    "types" => array(
        "0" => array("showitem" => "hidden;;1;;1-1-1, iconmm,title,authors,publisher,publishing_place,reprint,year,country,first_published,page,type_of_edit,type_of_repro,additional,geisignatur,linktolibrary,linktomore,pos_in_book,context,size_of_image")
    ),
    "palettes" => array(
        "1" => array("showitem" => "")
    )
);


?>