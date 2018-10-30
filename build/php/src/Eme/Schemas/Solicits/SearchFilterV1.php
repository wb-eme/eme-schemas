<?php
// @link http://schemas.wbeme.com/json-schema/eme/solicits/search-filter/1-0-0.json#
namespace Eme\Schemas\Solicits;

use Eme\Schemas\Solicits\Enum\SearchFilterOperator;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\MessageRef;
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
                Fb::create('bool_vals', T\BooleanType::create())
                    ->asAList()
                    ->build(),
                Fb::create('date_vals', T\DateType::create())
                    ->asAList()
                    ->build(),
                Fb::create('int_vals', T\IntType::create())
                    ->asAList()
                    ->build(),
                Fb::create('string_vals', T\StringType::create())
                    ->asAList()
                    ->build(),
            ]
        );
    }

    /**
     * @param string $tag
     * @return MessageRef
     */
    public function generateMessageRef($tag = null)
    {
        return new MessageRef(static::schema()->getCurie(), $this->get('name'), $tag);
    }
    
    /**
     * @return array
     */
    public function getUriTemplateVars()
    {
        return [
            'name' => $this->get('name'),
        ];
    }
}
