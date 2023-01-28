<?php

namespace clarknelson\craftnewuseradminnotification\elements\conditions;

use Craft;
use craft\base\ElementInterface;
use craft\base\conditions\BaseElementSelectConditionRule;
use craft\elements\conditions\ElementConditionRuleInterface;
use craft\elements\db\ElementQueryInterface;

/**
 * Test Element Condition Rule element condition rule
 */
class TestElementConditionRule extends BaseElementSelectConditionRule implements ElementConditionRuleInterface
{
    function getLabel(): string
    {
        return Craft::t('new-user-admin-notification', 'Test Element Condition Rule');
    }

    function modifyQuery(ElementQueryInterface $query): void
    {
        // Modify the element query based on $this->queryParamValue()
        // $query->myQueryParam($this->queryParamValue());
    }

    function matchElement(ElementInterface $element): bool
    {
        // Match the element based on one of its attributes
        // return $this->matchValue($element->myAttribute);
    }

    protected function elementType(): string
    {
        // Return the element type to select
        // ...
    }

    protected function sources(): ?array
    {
        return null;
    }

    protected function criteria(): ?array
    {
        return null;
    }
}
