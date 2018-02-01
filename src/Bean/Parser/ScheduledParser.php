<?php

namespace Swoft\Task\Bean\Parser;

use Swoft\Bean\Parser\AbstractParserInterface;
use Swoft\Task\Bean\Annotation\Scheduled;
use Swoft\Task\Bean\Collector\TaskCollector;

/**
 * Scheduled annotation parser
 */
class ScheduledParser extends AbstractParserInterface
{
    /**
     * @param string    $className
     * @param Scheduled $objectAnnotation
     * @param string    $propertyName
     * @param string    $methodName
     * @param null      $propertyValue
     * @return mixed
     */
    public function parser(
        string $className,
        $objectAnnotation = null,
        string $propertyName = '',
        string $methodName = '',
        $propertyValue = null
    ) {
        $collector = TaskCollector::getCollector();
        if (! isset($collector[$className])) {
            return;
        }

        TaskCollector::collect($className, $objectAnnotation, $propertyName, $methodName, $propertyValue);
    }
}
