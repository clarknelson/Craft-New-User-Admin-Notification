<?php

namespace clarknelson\craftnewuseradminnotification\console\controllers;

use Craft;
use craft\console\Controller;
use yii\console\ExitCode;

/**
 * Test Command controller
 */
class TestCommandController extends Controller
{
    public $defaultAction = 'index';

    public function options($actionID): array
    {
        $options = parent::options($actionID);
        switch ($actionID) {
            case 'index':
                // $options[] = '...';
                break;
        }
        return $options;
    }

    /**
     * new-user-admin-notification/test-command command
     */
    public function actionIndex(): int
    {
        // ...
        return ExitCode::OK;
    }
}
