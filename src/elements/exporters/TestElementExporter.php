<?php

namespace clarknelson\craftnewuseradminnotification\elements\exporters;

use Craft;
use craft\base\ElementExporter;
use craft\elements\db\ElementQueryInterface;

/**
 * Test Element Exporter element exporter
 */
class TestElementExporter extends ElementExporter
{
    public static function displayName(): string
    {
        return Craft::t('new-user-admin-notification', 'Test Element Exporter');
    }

    function export(ElementQueryInterface $query): mixed
    {
        $data = [];

        foreaech ($query->all() as $element) {
            // ...
        }

        return $data;
    }
}
