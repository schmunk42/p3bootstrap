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
class ComposerPackageCommand extends CConsoleCommand
{
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
        echo "Copying p3bootstrap package to theme folder ... tbd";
    }

}

?>