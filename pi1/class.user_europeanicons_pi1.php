<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Daniel Stange <stange@gei.de>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

require_once(PATH_tslib . 'class.tslib_pibase.php');


/**
 * Plugin 'Library Plugin' for the 'user_europeanicons' extension.
 *
 * @author        ich@gei.de <ich@gei.de>
 * @package        TYPO3
 * @subpackage        user_europeanicons
 */
class user_europeanicons_pi1 extends tslib_pibase
{
    var $prefixId = 'user_europeanicons_pi1'; // Same as class name
    var $scriptRelPath = 'pi1/class.user_europeanicons_pi1.php'; // Path to this script relative to the extension dir.
    var $extKey = 'user_europeanicons'; // The extension key.
    var $pi_checkCHash = true;

    /**
     * The main method of the PlugIn
     *
     * @param        string $content: The PlugIn content
     * @param        array $conf: The PlugIn configuration
     * @return        The content that is displayed on the website
     */
        function main($content, $conf)
    {
        $this->conf = $conf;
        $this->pi_setPiVarDefaults();
        $this->pi_loadLL();

        if ($this->piVars['iconID']) {
            $content = $this->singleView($this->piVars['iconID']);
        } else {
            $content = $this->iconsList();
        }

        return $this->pi_wrapInBaseClass($content);
    }

    /**
     * Creates a a view for a single source
     *
     * @param   int $singleID The UID of the source
     * @return  string The content that is displayed on the website
     */
    function singleView($singleID)
    {
        $param = $singleID;
        $templateOccurence = $this->cObj->fileResource('EXT:user_europeanicons/res/template_icon-occurences.html');

        $result = $GLOBALS['TYPO3_DB']->exec_SELECTquery('name,author,image,year,place,country,linktocommons,l18n_name,name_is_origname,technique,size,owner,owner_link,comment,literature', 'user_europeanicons_icon', 'deleted=0 AND hidden=0 AND uid=' . $param, '', 'uid');

        while ($dbObject = mysqli_fetch_object($result)) {
            if ($dbObject->name_is_origname == 'JA') {
                $markerArray['###ICONTITLE###'] = $dbObject->name;
                $markerArray['###ICONORIGTITLE###'] = '';
            } else {
                $markerArray['###ICONTITLE###'] = $dbObject->name;
                $markerArray['###ICONORIGTITLE###'] = $dbObject->l18n_name;
            }


            $pfad = 'uploads/user_europeanicons/' . $dbObject->image;
            $imgConfig = array();

            $imgConfig['file'] = $pfad;
            $imgConfig['file.']['maxW'] = ($this->conf['singleW'] != 0) ? $this->conf['singleW'] : 240;

            $bildadresse = $this->cObj->IMG_RESOURCE($imgConfig);
            //TODO lightbox für die Vergößerung / Integrate LightBox onClick

            $markerArray['###ICONIMAGE###'] = $this->cObj->cImage($bildadresse, array(
                'altText' => $dbObject->name
            ));
            $markerArray['###ICONAUTHOR###'] = $dbObject->author;
            $markerArray['###ICONYEAR###'] = $dbObject->year;
            $markerArray['###ICONPLACE###'] = $dbObject->place;
            $markerArray['###ICONCOUNTRY###'] = $dbObject->country;
            $markerArray['###ICONCOMMONS###'] = ($dbObject->linktocommons != '') ? '<a href="' . $dbObject->linktocommons . '" target="_blank" class="icons-external-link">Weitere Informationen zum Bild (externer Link)</a>' : '';
            $markerArray['###ICONTECHNIQUE###'] = $dbObject->technique;
            $markerArray['###ICONSIZE###'] = $dbObject->size;
            $markerArray['###ICONOWNER###'] = ($dbObject->owner_link != '') ? '<a href="' . $dbObject->owner_link . '" target="_blank" class="icons-external-link">' . $dbObject->owner . '</a>' : $dbObject->owner;
            $markerArray['###ICONCOMMENT###'] = $dbObject->comment;
            $markerArray['###ICONLITERATURE###'] = $dbObject->literature;
            //call function for list of occurences
            $markerArray['###OCCHEAD###'] = 'Nachweise für diese Abbildung:';
            $markerArray['###OCCURENCES###'] = $this->occurenceList($param);

            $markerArray['###BACKLINK###'] = $this->pi_linkTP('Zurück zur Übersicht');

            $content .= $this->cObj->substituteMarkerArrayCached($templateOccurence, $markerArray);
        }

        return $content;

    }

    /**
     * The method to list all occurences of a specified source
     *
     * @param   var $iconID Required UID of an image icon
     * @return string Content to be parsed into the single view
     */
    function occurenceList($iconID = 0)
    {
        $evenodd = 'odd';
        $template = $this->cObj->fileResource('EXT:user_europeanicons/res/template_icon-occurencelist.html');

        $result = $GLOBALS['TYPO3_DB']->exec_SELECT_mm_query(
            'user_europeanicons_occurences.uid AS occUID,user_europeanicons_occurences.title,user_europeanicons_occurences.publisher,user_europeanicons_occurences.publishing_place,user_europeanicons_occurences.year,user_europeanicons_occurences.reprint,user_europeanicons_occurences.first_published,user_europeanicons_occurences.country,user_europeanicons_occurences.authors,user_europeanicons_occurences.page,user_europeanicons_occurences.type_of_edit,user_europeanicons_occurences.type_of_repro,user_europeanicons_occurences.pos_in_book,user_europeanicons_occurences.additional,user_europeanicons_occurences.context,user_europeanicons_occurences.geisignatur,user_europeanicons_occurences.linktolibrary,user_europeanicons_occurences.linktomore,user_europeanicons_occurences.size_of_image,user_europeanicons_icon.uid',
            'user_europeanicons_occurences', 'user_europeanicons_icon_occurence_mm', 'user_europeanicons_icon',
            'AND user_europeanicons_icon.uid=' . $iconID);

        while ($dbObject = mysqli_fetch_object($result)) {

            $currentOcc = $dbObject->occUID;
            $occID = $this->piVars['occID'];
            $markerArray['###EVENODD###'] = $evenodd;
            $evenodd = ($evenodd == 'odd') ? 'even' : 'odd';

            $markerArray['###OCCTITLE###'] = $dbObject->title;
            $markerArray['###OCCPUBLYEAR###'] = $dbObject->year;
            $markerArray['###OCCCOUNTRY###'] = $dbObject->country;
            $markerArray['###OCCAUTHORS###'] = $dbObject->authors;

            if ($currentOcc == $occID) {

                $markerArray['###OCCDETAILS###'] = $this->occurenceDetails($currentOcc);
                $markerArray['###OCCDETAILSLINK###'] = '';
            }

            else {
                $markerArray['###OCCDETAILS###'] = '';

                $parameter = array(
                    $this->prefixId.'[iconID]' => $iconID,
                    $this->prefixId.'[occID]' => $currentOcc
                );
                $markerArray['###OCCDETAILSLINK###'] = $this->pi_linkTP('Details', $parameter);
            }

            $content .= $this->cObj->substituteMarkerArrayCached($template, $markerArray);

        }

        return $content;
    }

    /**
     * Method to enhance the occurence list by adding details for a specific occurence
     *
     * @param var $occurenceID required UID of a specific occurence of an image icon
     * @return string
     */
    function occurenceDetails($occurenceID = 0)
    {

        $template = $this->cObj->fileResource('EXT:user_europeanicons/res/template_icon-occdetails.html');

        $result = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
            'uid,title,publisher,publishing_place,year,reprint,first_published,country,authors,page,type_of_edit,type_of_repro,pos_in_book,additional,context,geisignatur,linktolibrary,linktomore,size_of_image',
            'user_europeanicons_occurences',
            'deleted=0 AND hidden=0 AND uid=' . $occurenceID, '', 'uid');

        while ($dbObject = mysqli_fetch_object($result)) {
            $markerArray['###OCCPUBLISHER###'] = $dbObject->publisher;
            $markerArray['###OCCPUBLPLACE###'] = $dbObject->publishing_place;
            $markerArray['###OCCREPR###'] = $dbObject->reprint;
            $markerArray['###OCCFIRSTPUBL###'] = $dbObject->first_published;
            $markerArray['###OCCPAGE###'] = ($dbObject->page > 0) ? 'auf S. ' . $dbObject->page : 'auf dem Cover';
            $markerArray['###OCCCROP###'] = $dbObject->type_of_edit;
            $markerArray['###OCCREPRO###'] = $dbObject->type_of_repro;
            $markerArray['###OCCPOSINBOOK###'] = $dbObject->pos_in_book;
            $markerArray['###OCCADDITIONAL###'] = $dbObject->additional;
            $markerArray['###OCCCONTEXT###'] = $dbObject->context;

            if ($dbObject->linktolibrary != '' || $dbObject->linktomore != '') {
                $markerArray['###OCCNACHWEIS###'] = '<span class="occmore">Nachweis:</span>';
                $markerArray['###OCCLIBLINK###'] = ($dbObject->linktolibrary != '') ? 'Signatur in der Bibliothek des GEI: <a href="' . $dbObject->linktolibrary . '" target="_blank" class="icons-external-link">' . $dbObject->geisignatur . '</a>' : $dbObject->geisignatur;
                $markerArray['###OCCMORELINK###'] = ($dbObject->linktomore != '') ? '<a href="' . $dbObject->linktomore . '" target="_blank" class="icons-external-link">Mehr über diese Abbildung in EurViews</a><br>' : '';
            } else {
                $markerArray['###OCCNACHWEIS###'] = $markerArray['###OCCLIBLINK###'] = $markerArray['###OCCMORELINK###'] = '';
            }

            $markerArray['###OCCSIZEOFIMG###'] = $dbObject->size_of_image;

            $content .= $this->cObj->substituteMarkerArrayCached($template, $markerArray);

        }

        return $content;
    }

    /**
     * Default method, displays a list of all image icons
     *
     * @return string
     *
     */
    function IconsList()
    {
        $content = '';
        $evenodd = 'even';
        $template = $this->cObj->fileResource('EXT:user_europeanicons/res/template_icons.html');

        $result = $GLOBALS['TYPO3_DB']->exec_SELECTquery('uid,name,l18n_name,author,image,year', 'user_europeanicons_icon', 'deleted=0 AND hidden=0', '', 'uid');
        while ($dbObject = mysqli_fetch_object($result)) {
            $markerArray['###EVENODD###'] = $evenodd;
            $evenodd = ($evenodd == 'odd') ? 'even' : 'odd';

            if ($dbObject->name_is_origname == 'JA') {
                $markerArray['###ICONTITLE###'] = $dbObject->name;
                $markerArray['###ICONORIGTITLE###'] = '';
            } else {
                $markerArray['###ICONTITLE###'] = $dbObject->name;
                $markerArray['###ICONORIGTITLE###'] = $dbObject->l18n_name;
            }
            $pfad = 'uploads/user_europeanicons/' . $dbObject->image;
            $imgConfig = array();
            $imgConfig['file'] = $pfad;
            $imgConfig['file.']['maxW'] = ($this->conf['maxW'] != 0) ? $this->conf['maxW'] : 120;

            $bildadresse = $this->cObj->IMG_RESOURCE($imgConfig);

            $markerArray['###ICONLINK###'] = $this->pi_linkTP('Fundstellen für diese Abbildung', array($this->prefixId .
            '[iconID]' => $dbObject->uid));
            $markerArray['###ICONIMAGE###'] = $this->cObj->cImage($bildadresse, array(
                'altText' => $dbObject->name
            ));

            $markerArray['###ICONAUTHOR###'] = $dbObject->author;
            $markerArray['###ICONYEAR###'] = $dbObject->year;
            $content .= $this->cObj->substituteMarkerArrayCached($template, $markerArray);
        }
        return $content;
    }

    /**
     * buildInheritanceTree parst die bildgeschichtliche Vererbung des Motivs
     *
     * @param int $sourceID
     * @return string
     */
    function buildInheritanceTree($sourceID = 0) {
        $param = (int) $sourceID;

        if ($sourceID = 0) {$tree = '';}

        else {
            // hier müssen nun die Iterationen der Vererbung durchgeführt werden
            $tree = 'level';
        }

        return $tree;
    }

    /**
 * IconHasChildren checks if a certain item is parent to at least one child element
 *
 * @param int $iconID
 * @return bool
 */
    function IconHasChildren($iconID = 0) {
        $param = (int) $iconID;
        $hasChildren = false;
        $result = $GLOBALS['TYPO3_DB']->exec_SELECTquery('parent_uid', 'user_europeanicons_icon', 'deleted=0 AND hidden=0 AND parent_uid=' . $param, '', 'parent_uid');

        if (mysqli_num_rows($result) != 0) {
            $hasChildren = true;
        }
        return $hasChildren;
    }

    /**
     * getChildrenFromRoot fetches all child elements from a specified root
     * @param int $iconID
     * @return array
     */
    function getChildrenFromRoot($iconID = 0) {
        $param = (int) $iconID;
        $return = array();
        if ($param != 0) {

        }

        return $return;
    }


}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/user_europeanicons/pi1/class.user_europeanicons_pi1.php']) {
    include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/user_europeanicons/pi1/class.user_europeanicons_pi1.php']);
}

?>