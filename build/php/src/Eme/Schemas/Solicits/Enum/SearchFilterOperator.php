<?php

namespace Eme\Schemas\Solicits\Enum;

use Gdbots\Common\Enum;

/**
 * @method static SearchFilterOperator UNKNOWN()
 * @method static SearchFilterOperator EQUAL_TO()
 * @method static SearchFilterOperator NOT_EQUAL_TO()
 * @method static SearchFilterOperator GREATER_THAN()
 * @method static SearchFilterOperator GREATER_THAN_OR_EQUAL_TO()
 * @method static SearchFilterOperator LESS_THAN()
 * @method static SearchFilterOperator LESS_THAN_OR_EQUAL_TO()
 * @method static SearchFilterOperator EXISTS()
 * @method static SearchFilterOperator IN()
 * @method static SearchFilterOperator CONTAINS()
 * @method static SearchFilterOperator NOT_CONTAINS()
 */
final class SearchFilterOperator extends Enum
{
    const UNKNOWN = 'unknown';
    const EQUAL_TO = 'eq';
    const NOT_EQUAL_TO = 'ne';
    const GREATER_THAN = 'gt';
    const GREATER_THAN_OR_EQUAL_TO = 'gte';
    const LESS_THAN = 'lt';
    const LESS_THAN_OR_EQUAL_TO = 'lte';
    const EXISTS = 'exists';
    const IN = 'in';
    const CONTAINS = 'contains';
    const NOT_CONTAINS = 'not_contains';
}
