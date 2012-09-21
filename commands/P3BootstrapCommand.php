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
            echo "\nInvalid 'theemPath', aborting.";
            return;
        }
        if (!is_dir($publicThemePath)) {
            echo "\nInvalid 'publicTheemPath', aborting.";
            return;
        }

        echo "\nCopying p3bootstrap package to theme folders ...\n";

        $backendViews = $this->buildFileList(
            $srcPath . 'views', $themePath . DIRECTORY_SEPARATOR . 'backend/views');
        $backendCss = $this->buildFileList(
            $srcPath . 'css', $publicThemePath . DIRECTORY_SEPARATOR . 'backend/css');
        $backendLess = $this->buildFileList(
            $srcPath . 'less', $publicThemePath . DIRECTORY_SEPARATOR . 'backend/less');

        $frontendViews = $this->buildFileList(
            $srcPath . 'views', $themePath . DIRECTORY_SEPARATOR . 'frontend/views');
        $frontendCss = $this->buildFileList(
            $srcPath . 'css', $publicThemePath . DIRECTORY_SEPARATOR . 'frontend/css');
        $frontendLess = $this->buildFileList(
            $srcPath . 'less', $publicThemePath . DIRECTORY_SEPARATOR . 'frontend/less');
        $frontendCkeditor = $this->buildFileList(
            $srcPath . 'ckeditor', $publicThemePath . DIRECTORY_SEPARATOR . 'frontend/ckeditor');

        echo "\nCopying theme files for 'backend' theme...\n";
        $this->copyFiles($backendViews);
        $this->copyFiles($backendCss);
        $this->copyFiles($backendLess);

        echo "\nCopying theme files for 'frontend' theme...\n";
        $this->copyFiles($frontendViews);
        $this->copyFiles($frontendCss);
        $this->copyFiles($frontendLess);
        $this->copyFiles($frontendCkeditor);
    }

}

?>