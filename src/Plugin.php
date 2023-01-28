<?php

namespace clarknelson\craftnewuseradminnotification;

use Craft;
use clarknelson\craftnewuseradminnotification\elements\TestElementType;
use clarknelson\craftnewuseradminnotification\fields\TestFieldType;
use clarknelson\craftnewuseradminnotification\fields\TestFieldTypeTwo;
use clarknelson\craftnewuseradminnotification\models\Settings;
use craft\base\Model;
use craft\base\Plugin as BasePlugin;
use craft\elements\User;
use craft\events\ModelEvent;
use craft\events\RegisterComponentTypesEvent;
use craft\events\RegisterUrlRulesEvent;
use craft\services\Elements;
use craft\services\Fields;
use craft\web\UrlManager;
use yii\base\Event;

/**
 * New User Admin Notification plugin
 *
 * @method static Plugin getInstance()
 * @method Settings getSettings()
 * @author Clark Nelson <email@clarknelson.com>
 * @copyright Clark Nelson
 * @license https://craftcms.github.io/license/ Craft License
 */
class Plugin extends BasePlugin
{
    public string $schemaVersion = '1.0.0';
    public bool $hasCpSettings = true;

    public static function config(): array
    {
        return [
            'components' => [
                // Define component configs here...
            ],
        ];
    }

    public function init()
    {
        parent::init();

        // Defer most setup tasks until Craft is fully initialized
        Craft::$app->onInit(function() {
            $this->attachEventHandlers();
            // ...
        });
    }

    protected function createSettingsModel(): ?Model
    {
        return Craft::createObject(Settings::class);
    }

    protected function settingsHtml(): ?string
    {
        return Craft::$app->view->renderTemplate('new-user-admin-notification/_settings.twig', [
            'plugin' => $this,
            'settings' => $this->getSettings(),
        ]);
    }

    private function attachEventHandlers(): void
    {
        // Register event handlers here ...
        // (see https://craftcms.com/docs/4.x/extend/events.html to get started)

        Event::on(
            User::class,
            User::EVENT_AFTER_SAVE,
            function (ModelEvent $event) {
                if ($event->sender->firstSave) {

                    Craft::info('New user has been saved!', 'new-user-admin-notification');
                    Craft::debug($event->sender, 'new-user-admin-notification');
                }
            }
        );
        Event::on(Elements::class, Elements::EVENT_REGISTER_ELEMENT_TYPES, function (RegisterComponentTypesEvent $event) {
            $event->types[] = TestElementType::class;
        });
        Event::on(UrlManager::class, UrlManager::EVENT_REGISTER_CP_URL_RULES, function (RegisterUrlRulesEvent $event) {
            $event->rules['test-element-types'] = ['template' => 'new-user-admin-notification/test-element-types/_index.twig'];
            $event->rules['test-element-types/<elementId:\\d+>'] = 'elements/edit';
        });
        Event::on(Fields::class, Fields::EVENT_REGISTER_FIELD_TYPES, function (RegisterComponentTypesEvent $event) {
            $event->types[] = TestFieldType::class;
        });
        Event::on(Fields::class, Fields::EVENT_REGISTER_FIELD_TYPES, function (RegisterComponentTypesEvent $event) {
            $event->types[] = TestFieldTypeTwo::class;
        });
    }
}
