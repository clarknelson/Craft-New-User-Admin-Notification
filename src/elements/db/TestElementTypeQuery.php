<?php

namespace clarknelson\craftnewuseradminnotification\elements\db;

use Craft;
use craft\elements\db\ElementQuery;

/**
 * Test Element Type query
 */
class TestElementTypeQuery extends ElementQuery
{
    protected function beforePrepare(): bool
    {
        // todo: join the `testelementtypes` table
        // $this->joinElementTable('testelementtypes');

        // todo: apply any custom query params
        // ...

        return parent::beforePrepare();
    }
}
