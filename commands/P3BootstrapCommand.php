<?php

/**
 * Class file.
 *
 * @author Tobias Munk <schmunk@usrbin.de>
 * @link http://www.phundament.com/
 * @copyright Copyright &copy; 2005-2011 diemeisterei GmbH
 * @license http://www.phundament.com/license/
 */

/**
 * Composer package update and install command
 *
 *
 * @author Tobias Munk <schmunk@usrbin.de>
 * @package p3extensions.commands
 * @since 3.0.5
 */
class P3BootstrapCommand extends CConsoleCommand
{
    public $themePath = 'application.themes'; // view files

    public $themeName = 'frontend';

    public function getHelp()
    {
        echo <<<EOS
n/a
EOS;
    }

    /**
     * Syncs from 'server1' to 'server2' the 'alias'
     * @param type $args
     */
    public function run($args)
    {
        $srcPath = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;

        $themePath = realpath(Yii::getPathOfAlias($this->themePath));

        if (!is_dir($themePath)) {
            echo "\nInvalid 'themePath', aborting.";
            return;
        }

        echo "\nDeploying p3bootstrap package contents to theme folder as 'frontend' ...\n";

        $frontendViews = $this->buildFileList(
            $srcPath . 'views',
            $themePath . DIRECTORY_SEPARATOR . $this->themeName . '/views',
            '',
            array('skins'));
        $frontendLess = $this->buildFileList(
            $srcPath . 'less', $themePath . DIRECTORY_SEPARATOR . $this->themeName . '/less');

        $frontendAssets = $this->buildFileList(
            $srcPath . 'assets', $themePath . DIRECTORY_SEPARATOR . $this->themeName . '/assets');

        $frontendJs = $this->buildFileList(
            $srcPath . 'js', $themePath . DIRECTORY_SEPARATOR . $this->themeName . '/js');

        echo "\nCopying theme files for '{$this->themeName}' theme...\n";

        $this->copyFiles($frontendViews);
        $this->copyFiles($frontendAssets);
        $this->copyFiles($frontendLess);
        $this->copyFiles($frontendJs);
    }

}

?>