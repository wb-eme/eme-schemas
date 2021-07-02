<?php
declare(strict_types=1);

namespace Eme\Schemas\Marketing\Enum;

use Gdbots\Pbj\Enum;

/**
 * @method static SearchProfilesSort UNKNOWN()
 * @method static SearchProfilesSort RELEVANCE()
 * @method static SearchProfilesSort CREATED_AT_DESC()
 * @method static SearchProfilesSort CREATED_AT_ASC()
 * @method static SearchProfilesSort UPDATED_AT_DESC()
 * @method static SearchProfilesSort UPDATED_AT_ASC()
 * @method static SearchProfilesSort FIRST_NAME_DESC()
 * @method static SearchProfilesSort FIRST_NAME_ASC()
 * @method static SearchProfilesSort LAST_NAME_DESC()
 * @method static SearchProfilesSort LAST_NAME_ASC()
 */
final class SearchProfilesSort extends Enum
{
    const UNKNOWN = 'unknown';
    const RELEVANCE = 'relevance';
    const CREATED_AT_DESC = 'created-at-desc';
    const CREATED_AT_ASC = 'created-at-asc';
    const UPDATED_AT_DESC = 'updated-at-desc';
    const UPDATED_AT_ASC = 'updated-at-asc';
    const FIRST_NAME_DESC = 'first-name-desc';
    const FIRST_NAME_ASC = 'first-name-asc';
    const LAST_NAME_DESC = 'last-name-desc';
    const LAST_NAME_ASC = 'last-name-asc';
}
