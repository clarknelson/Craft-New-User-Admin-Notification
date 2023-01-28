<?php

namespace clarknelson\craftnewuseradminnotification\elements\conditions;

use Craft;
use craft\elements\conditions\ElementCondition;

/**
 * Test Element Type condition
 */
class TestElementTypeCondition extends ElementCondition
{
    protected function conditionRuleTypes(): array
    {
        return array_merge(parent::conditionRuleTypes(), [
            // ...
        ]);
    }
}
