<?php
// @link http://schemas.wbeme.com/json-schema/eme/solicits/search-filter/1-0-0.json#
namespace Eme\Schemas\Solicits;

use Eme\Schemas\Solicits\Enum\SearchFilterOperator;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;

final class SearchFilterV1 extends AbstractMessage implements
    SearchFilter
{

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits::search-filter:1-0-0', __CLASS__,
            [
                Fb::create('name', T\StringType::create())
                    ->build(),
                Fb::create('operator', T\StringEnumType::create())
                    ->className(SearchFilterOperator::class)
                    ->build(),
                /*
                 * Contains a comma delimited list of values to filter by.
                 */
                Fb::create('values', T\DynamicFieldType::create())
                    ->build(),
            ]
        );
    }
}
