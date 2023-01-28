<?php

namespace clarknelson\craftnewuseradminnotification\controllers;

use Craft;
use craft\web\Controller;
use yii\web\Response;

/**
 * Test Controller controller
 */
class TestControllerController extends Controller
{
    public $defaultAction = 'index';
    protected array|int|bool $allowAnonymous = self::ALLOW_ANONYMOUS_NEVER;

    /**
     * new-user-admin-notification/test-controller action
     */
    public function actionIndex(): Response
    {
        // ...
    }
}
