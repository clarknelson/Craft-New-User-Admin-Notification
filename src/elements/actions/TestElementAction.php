<?php

namespace clarknelson\craftnewuseradminnotification\elements\actions;

use Craft;
use craft\base\ElementAction;

/**
 * Test Element Action element action
 */
class TestElementAction extends ElementAction
{
    public static function displayName(): string
    {
        return Craft::t('new-user-admin-notification', 'Test Element Action');
    }

    public function getTriggerHtml(): ?string
    {
        Craft::$app->getView()->registerJsWithVars(fn($type) => <<<JS
            (() => {
                new Craft.ElementActionTrigger({
                    type: $type,

                    // Whether this action should be available when multiple elements are selected
                    bulk: true,

                    // Return whether the action should be available depending on which elements are selected
                    validateSelection: (selectedItems) {
                      return true;
                    },

                    // Uncomment if the action should be handled by JavaScript:
                    // activate: () => {
                    //   Craft.elementIndex.setIndexBusy();
                    //   const ids = Craft.elementIndex.getSelectedElementIds();
                    //   // ...
                    //   Craft.elementIndex.setIndexAvailable();
                    // },
                });
            })();
        JS, [static::class]);
    }

    public function performAction(Craft\elements\db\ElementQueryInterface $query): bool
    {
        $elements = $query->all();
        // ...
    }
}
