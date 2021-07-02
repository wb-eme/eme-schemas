<?php
declare(strict_types=1);

namespace Eme\Schemas\Collector\Enum;

use Gdbots\Pbj\Enum;

/**
 * @method static SearchSubmissionsSort UNKNOWN()
 * @method static SearchSubmissionsSort RELEVANCE()
 * @method static SearchSubmissionsSort CREATED_AT_DESC()
 * @method static SearchSubmissionsSort CREATED_AT_ASC()
 * @method static SearchSubmissionsSort UPDATED_AT_DESC()
 * @method static SearchSubmissionsSort UPDATED_AT_ASC()
 */
final class SearchSubmissionsSort extends Enum
{
    const UNKNOWN = 'unknown';
    const RELEVANCE = 'relevance';
    const CREATED_AT_DESC = 'created-at-desc';
    const CREATED_AT_ASC = 'created-at-asc';
    const UPDATED_AT_DESC = 'updated-at-desc';
    const UPDATED_AT_ASC = 'updated-at-asc';
}
