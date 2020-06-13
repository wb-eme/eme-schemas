<?php
declare(strict_types=1);

// @link http://schemas.wbeme.com/json-schema/eme/common/search-filter/1-0-0.json#
namespace Eme\Schemas\Common;

use Eme\Schemas\Common\Enum\SearchFilterOperator;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Pbj\WellKnown\MessageRef;

final class SearchFilterV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:eme:common::search-filter:1-0-0';
    const SCHEMA_CURIE = 'eme:common::search-filter';
    const SCHEMA_CURIE_MAJOR = 'eme:common::search-filter:v1';

    const MIXINS = [];

    const NAME_FIELD = 'name';
    const OPERATOR_FIELD = 'operator';
    const BOOL_VALS_FIELD = 'bool_vals';
    const DATE_VALS_FIELD = 'date_vals';
    const INT_VALS_FIELD = 'int_vals';
    const STRING_VALS_FIELD = 'string_vals';

    const FIELDS = [
      self::NAME_FIELD,
      self::OPERATOR_FIELD,
      self::BOOL_VALS_FIELD,
      self::DATE_VALS_FIELD,
      self::INT_VALS_FIELD,
      self::STRING_VALS_FIELD,
    ];

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                Fb::create(self::NAME_FIELD, T\StringType::create())
                    ->required()
                    ->maxLength(127)
                    ->pattern('^[a-zA-Z_]{1}[\w-]*$')
                    ->build(),
                Fb::create(self::OPERATOR_FIELD, T\StringEnumType::create())
                    ->withDefault(SearchFilterOperator::EQUAL_TO())
                    ->className(SearchFilterOperator::class)
                    ->build(),
                Fb::create(self::BOOL_VALS_FIELD, T\BooleanType::create())
                    ->asAList()
                    ->build(),
                Fb::create(self::DATE_VALS_FIELD, T\DateType::create())
                    ->asAList()
                    ->build(),
                Fb::create(self::INT_VALS_FIELD, T\IntType::create())
                    ->asAList()
                    ->build(),
                Fb::create(self::STRING_VALS_FIELD, T\StringType::create())
                    ->asAList()
                    ->build(),
            ],
            self::MIXINS
        );
    }

    public function generateMessageRef(?string $tag = null): MessageRef
    {
        return new MessageRef(static::schema()->getCurie(), $this->fget(self::NAME_FIELD), $tag);
    }
    
    public function getUriTemplateVars(): array
    {
        return [
            'name' => $this->fget(self::NAME_FIELD),
        ];
    }
}
