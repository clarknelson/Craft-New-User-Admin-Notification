<?php

namespace clarknelson\craftnewuseradminnotification\fields;

use Craft;
use craft\base\ElementInterface;
use craft\base\Field;
use craft\base\PreviewableFieldInterface;
use craft\base\SortableFieldInterface;
use craft\elements\db\ElementQueryInterface;
use craft\fields\conditions\DateFieldConditionRule;
use craft\helpers\Html;
use craft\helpers\StringHelper;
use yii\db\Schema;

/**
 * Test Field Type Two field type
 */
class TestFieldTypeTwo extends Field implements PreviewableFieldInterface, SortableFieldInterface
{
    public static function displayName(): string
    {
        return Craft::t('new-user-admin-notification', 'Test Field Type Two');
    }

    public static function valueType(): string
    {
        return 'mixed';
    }

    public function attributeLabels(): array
    {
        return array_merge(parent::attributeLabels(), [
            // ...
            "hello world"
        ]);
    }

    protected function defineRules(): array
    {
        return array_merge(parent::defineRules(), [
            // ...
        ]);
    }

    public function getSettingsHtml(): ?string
    {
        return null;
    }

    public function getContentColumnType(): array|string
    {
        return Schema::TYPE_STRING;
    }

    public function normalizeValue(mixed $value, ElementInterface $element = null): mixed
    {
        return $value;
    }

    protected function inputHtml(mixed $value, ElementInterface $element = null): string
    {
        return Html::textarea($this->handle, $value);
    }

    public function getElementValidationRules(): array
    {
        return [];
    }

    protected function searchKeywords(mixed $value, ElementInterface $element): string
    {
        return StringHelper::toString($value, ' ');
    }

    public function getElementConditionRuleType(): array|string|null
    {
        return DateFieldConditionRule::class;
    }

    public function modifyElementsQuery(ElementQueryInterface $query, mixed $value): void
    {
        parent::modifyElementsQuery($query, $value);
    }
}
