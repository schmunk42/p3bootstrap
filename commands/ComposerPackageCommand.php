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
class ComposerPackageCommand extends CConsoleCommand {

    public function getHelp() {
        echo <<<EOS
n/a
EOS;
    }

    /**
     * Syncs from 'server1' to 'server2' the 'alias'
     * @param type $args
     */
    public function run($args) {

        $themePath = realpath(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'themes');
        echo "\nCopying p3bootstrap package to theme folder '{$themePath}'...\n";

        $fileListBackend = $this->buildFileList(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..', $themePath . DIRECTORY_SEPARATOR . 'backend');
        foreach ($fileListBackend AS $key => $entry) {
            // remove .git files and commands, as they're not longer needed
            if (substr($key, 0, 4) === ".git") {
                unset($fileListBackend[$key]);
            }
            if (substr($key, 0, 8) === "commands") {
                unset($fileListBackend[$key]);
            }
        }

        $fileListFrontend = $fileListBackend;
        foreach ($fileListFrontend AS $key => $entry) {
            $fileListFrontend[$key]['target'] = str_replace('/backend/', '/frontend/', $entry['target']);
        }

        echo "\nCopying theme files for 'frontend' theme...\n";
        $this->copyFiles($fileListFrontend);
        echo "\nCopying theme files for 'backend' theme...\n";
        $this->copyFiles($fileListBackend);
    }

}

?>