<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
Yii::app()->theme = (Yii::app()->params['backendTheme'])?Yii::app()->params['backendTheme']:"backend";

$dirname = dirname(__FILE__);
preg_match("|.*/(.*)/(.*)/(.*\.php)$|", __FILE__, $matches);
include(Yii::getPathOfAlias($matches[1].'.views.'.$matches[2]).DIRECTORY_SEPARATOR.$matches[3]);

?>
