<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 ich@gei.de <ich@gei.de>
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

require_once(PATH_tslib.'class.tslib_pibase.php');


/**
 * Plugin 'Library Plugin' for the 'user_europeanicons' extension.
 *
 * @author        ich@gei.de <ich@gei.de>
 * @package        TYPO3
 * @subpackage        user_europeanicons
 */
class user_europeanicons_pi1 extends tslib_pibase {
        var $prefixId      = 'user_europeanicons_pi1';                // Same as class name
        var $scriptRelPath = 'pi1/class.user_europeanicons_pi1.php';        // Path to this script relative to the extension dir.
        var $extKey        = 'user_europeanicons';        // The extension key.
        var $pi_checkCHash = true;

        /**
         * The main method of the PlugIn
         *
         * @param        string                $content: The PlugIn content
         * @param        array                $conf: The PlugIn configuration
         * @return        The content that is displayed on the website
         */
        function main($content,$conf)        {
                $this->conf=$conf;
                $this->pi_setPiVarDefaults();
                $this->pi_loadLL();


                $content='';



                $content.= $this->getIconsList(1);
                /*$content.= $this->getOccurencesByIcon(1);

                $content.= $this->showLibrary(1);
                $content.= $this->showLibraryByTemplate(1);
                */
                return $this->pi_wrapInBaseClass($content);
        }
 function getIconsList(){
     $content = '';

     $template=$this->cObj->fileResource('EXT:user_europeanicons/res/template_icons.html');
        $result = $GLOBALS['TYPO3_DB']->exec_SELECTquery('name,author,image,year', 'user_europeanicons_icon', 'deleted=0 AND hidden=0','','uid');
        while($dbObject = mysql_fetch_object($result)){
         $markerArray['###ICONTITLE###'] = $dbObject->name;

            $pfad = 'uploads/user_europeanicons/'.$dbObject->image;
            $imgConfig = array();
            $imgConfig['file'] = $pfad;
            $imgConfig['file.']['maxW'] = 120;
            $imgConfig['file.']['maxH'] = 80;
            $bildadresse = $this->cObj->IMG_RESOURCE($imgConfig);

                     $markerArray['###ICONIMAGE###'] = "<img src='".$bildadresse."'>";
         $markerArray['###ICONAUTHOR###'] = $dbObject->author;
         $markerArray['###ICONYEAR###'] = $dbObject->year;

         $content .= $this->cObj->substituteMarkerArrayCached($template,$markerArray);
        }
   return $content;
 }
/*
 function showLibrary($libraryID){
   $template=$this->cObj->fileResource('EXT:user_europeanicons/res/template_library.html');
   $result = $GLOBALS['TYPO3_DB']->exec_SELECTquery('name', 'user_europeanicons_icon', "uid=".$libraryID." AND deleted=0 AND hidden=0",'','','1');
   $dbObject = mysql_fetch_object($result);
   $libraryName = $dbObject->name;

   $markerArray['###LIBRARYNAME###'] = $libraryName;
   
   $content .= $this->cObj->substituteMarkerArrayCached($template,$markerArray);
   
   return $content;
 }

 function showLibraryByTemplate($libraryID){
   //flexform s
   $this->pi_initPIflexForm();
   $piFlexForm = $this->cObj->data['pi_flexform'];

   //init flexform config
   $templateFile = $this->pi_getFFvalue($piFlexForm,'template','sDEFAULT');
   $view = $this->pi_getFFvalue($piFlexForm,'view','sDEFAULT');

   // $template=$this->cObj->fileResource('EXT:user_europeanicons/res/template_library.html');
   $template=$this->cObj->fileResource($templateFile);
   $result = $GLOBALS['TYPO3_DB']->exec_SELECTquery('name', 'user_europeanicons_icon', "uid=".$libraryID." AND deleted=0 AND hidden=0",'','','1');
   $dbObject = mysql_fetch_object($result);
   $libraryName = $dbObject->name;

   $markerArray['###LIBRARYNAME###'] = $libraryName;
   
   $content .= $this->cObj->substituteMarkerArrayCached($template,$markerArray);
   
   return $content;
 
 }

 function getLibraryListMarker(){
     $template=$this->cObj->fileResource('EXT:user_europeanicons/res/template.html');
     $subpart = $this->cObj->getSubpart($template,'###LIBRARYLIST###');
     $result = $GLOBALS['TYPO3_DB']->exec_SELECTquery('name,image', 'user_europeanicons_icon', 'deleted=0 AND hidden=0','','name');
        while($dbObject = mysql_fetch_object($result)){
         $name = $dbObject->name;
         $image = $dbObject->image;
         $content .= $name."<br/>\n";
         $content .= "<img src='uploads/user_europeanicons/".$image."'><br/>\n";
         $libArray['###LIBRARYNAME###'] = $name;
         $libArray['###LIBRARYDESCRIPTION###'] = $description;
         $libArray['###LIBRARYIMAGE###'] = "<img src='uploads/user_europeanicons/".$image."'>";
         $libraryString .= $this->cObj->substituteMarkerArrayCached($subpart,$libArray);
         //  $this->cObj->substituteMarkerArrayCached($template,$markerArray,$subparts);
       }
    $content .= $libraryString;

    
  return $content;
 }

 function getCategories($libraryID){
      $categoryResult=$GLOBALS['TYPO3_DB']->exec_SELECT_mm_query('user_europeanicons_occurences.category, user_europeanicons_occurences.uid','user_europeanicons_icon','user_europeanicons_icon_occurence_mm','user_europeanicons_occurences',"AND user_europeanicons_icon.uid=".$libraryID);
      $content = "<ul>\n";
      while($dbObject = mysql_fetch_object($categoryResult))      {
       $category = $dbObject->category;
       $content .= "<li>".$category."</li>";
      }
     $content .= "</ul>\n";
  return $content;
 }

 function getOccurencesByIcon($iconID){
      $result = $GLOBALS['TYPO3_DB']->exec_SELECTquery('name,image,author,year,place,country,linktocommons', 'user_europeanicons_icon', "uid=".$iconID." AND deleted=0 AND hidden=0",'','','aben ');
      $dbObject = mysql_fetch_object($result);
      $categoryName = $dbObject->category;
      $content .= "<h2>".$categoryName."</h2>\n"; 
      
      $result=$GLOBALS['TYPO3_DB']->exec_SELECT_mm_query('user_europeanicons_occurences.category, user_europeanicons_icon.name','user_europeanicons_icon','user_europeanicons_icon_occurence_mm','user_europeanicons_occurences',"AND user_europeanicons_icon.uid=".$categoryID);
      $content .= "<ul>\n";
      while($dbObject = mysql_fetch_object($result))      {
       $name = $dbObject->name;
       $content .= "<li>".$name."</li>";
      }
     $content .= "</ul>\n";
  return $content;
 }
*/
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/user_europeanicons/pi1/class.user_europeanicons_pi1.php'])        {
        include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/user_europeanicons/pi1/class.user_europeanicons_pi1.php']);
}

?>