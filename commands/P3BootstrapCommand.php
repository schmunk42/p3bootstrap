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
    public $publicThemePath = 'application.www.themes'; // css, js, ...

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
        $publicThemePath = realpath(Yii::getPathOfAlias($this->publicThemePath));

        if (!is_dir($themePath)) {
            echo "\nInvalid 'themePath', aborting.";
            return;
        }
        if (!is_dir($publicThemePath)) {
            echo "\nInvalid 'publicThemePath', aborting.";
            return;
        }

        echo "\nDeploying p3bootstrap package contents to theme folder as 'frontend' ...\n";

        $frontendViews = $this->buildFileList(
            $srcPath . 'views',
            $themePath . DIRECTORY_SEPARATOR . 'frontend/views',
            '',
            array('skins'));
        $frontendLess = $this->buildFileList(
            $srcPath . 'less', $themePath . DIRECTORY_SEPARATOR . 'frontend/less');

        $frontendCss = $this->buildFileList(
            $srcPath . 'css', $publicThemePath . DIRECTORY_SEPARATOR . 'frontend/css');
        $frontendCkeditor = $this->buildFileList(
            $srcPath . 'ckeditor', $publicThemePath . DIRECTORY_SEPARATOR . 'frontend/ckeditor');

        echo "\nCopying theme files for 'frontend' theme...\n";
        $this->copyFiles($frontendViews);
        $this->copyFiles($frontendCss);
        $this->copyFiles($frontendLess);
        $this->copyFiles($frontendCkeditor);
    }

}

?>