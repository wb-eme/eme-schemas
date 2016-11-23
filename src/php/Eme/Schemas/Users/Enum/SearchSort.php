<?php

namespace Eme\Schemas\Users\Enum;

use Gdbots\Common\Enum;

/**
 * @method static SearchSort UNKNOWN()
 * @method static SearchSort RELEVANCE()
 * @method static SearchSort CREATED_AT_DESC()
 * @method static SearchSort CREATED_AT_ASC()
 * @method static SearchSort UPDATED_AT_DESC()
 * @method static SearchSort UPDATED_AT_ASC()
 * @method static SearchSort TITLE_DESC()
 * @method static SearchSort TITLE_ASC()
 */
final class SearchSort extends Enum
{
    const UNKNOWN = 'unknown';
    const RELEVANCE = 'relevance';
    const CREATED_AT_DESC = 'created-at-desc';
    const CREATED_AT_ASC = 'created-at-asc';
    const UPDATED_AT_DESC = 'updated-at-desc';
    const UPDATED_AT_ASC = 'updated-at-asc';
    const TITLE_DESC = 'title-desc';
    const TITLE_ASC = 'title-asc';
}
