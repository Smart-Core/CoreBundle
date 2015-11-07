<?php

namespace Smart\CoreBundle\Composer;

use Composer\Script\CommandEvent;
use Sensio\Bundle\DistributionBundle\Composer\ScriptHandler as SymfonyScriptHandler;

class ScriptHandler extends SymfonyScriptHandler
{
    /**
     * @param $event CommandEvent A instance
     */
    public static function doctrineSchemaCheck(CommandEvent $event)
    {
        $options = parent::getOptions($event);
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
