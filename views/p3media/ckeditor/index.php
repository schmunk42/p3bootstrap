<?php
// Phundament 3 - Theme-in-theme view file

// always use the backend theme for this view
Yii::app()->theme = (Yii::app()->params['p3.backendTheme'])?Yii::app()->params['p3.backendTheme']:"backend";

// find original view and include it
$dirname = dirname(__FILE__);
preg_match("|.*\\".DIRECTORY_SEPARATOR."(.*)\\".DIRECTORY_SEPARATOR."(.*)\\".DIRECTORY_SEPARATOR."(.*\.php)$|", __FILE__, $matches);
include(Yii::getPathOfAlias($matches[1].'.views.'.$matches[2]).DIRECTORY_SEPARATOR.$matches[3]);

?>