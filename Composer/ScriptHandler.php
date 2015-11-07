<?php

namespace Smart\CoreBundle\Composer;

use Composer\Script\CommandEvent;
use Sensio\Bundle\DistributionBundle\Composer\ScriptHandler as SymfonyScriptHandler;

class ScriptHandler extends SymfonyScriptHandler
{
    /**
     * Clears the APC/Wincache/Opcache cache.
     *
     * @param $event CommandEvent A instance
     */
    public static function doctrineSchemaCheck(CommandEvent $event)
    {
        $options = parent::getOptions($event);
        //$consoleDir = parent::getConsoleDir($event, 'clear the PHP Accelerator cache');
        $appDir = $options['symfony-app-dir'];

        if (null === $appDir) {
            return;
        }

        try {
            static::executeCommand($event, $appDir, 'doctrine:schema:update', $options['process-timeout']);
        } catch (\RuntimeException $e) {
            // do nothing
        }
    }
}
