<?php
declare(strict_types=1);

namespace Eme\Schemas\Marketing\Enum;

use Gdbots\Pbj\Enum;

/**
 * @method static SearchCampaignsSort UNKNOWN()
 * @method static SearchCampaignsSort RELEVANCE()
 * @method static SearchCampaignsSort CREATED_AT_ASC()
 * @method static SearchCampaignsSort CREATED_AT_DESC()
 * @method static SearchCampaignsSort UPDATED_AT_ASC()
 * @method static SearchCampaignsSort UPDATED_AT_DESC()
 * @method static SearchCampaignsSort SEND_AT_ASC()
 * @method static SearchCampaignsSort SEND_AT_DESC()
 * @method static SearchCampaignsSort SENT_AT_ASC()
 * @method static SearchCampaignsSort SENT_AT_DESC()
 * @method static SearchCampaignsSort TITLE_ASC()
 * @method static SearchCampaignsSort TITLE_DESC()
 */
final class SearchCampaignsSort extends Enum
{
    const UNKNOWN = 'unknown';
    const RELEVANCE = 'relevance';
    const CREATED_AT_ASC = 'created-at-asc';
    const CREATED_AT_DESC = 'created-at-desc';
    const UPDATED_AT_ASC = 'updated-at-asc';
    const UPDATED_AT_DESC = 'updated-at-desc';
    const SEND_AT_ASC = 'send-at-asc';
    const SEND_AT_DESC = 'send-at-desc';
    const SENT_AT_ASC = 'sent-at-asc';
    const SENT_AT_DESC = 'sent-at-desc';
    const TITLE_ASC = 'title-asc';
    const TITLE_DESC = 'title-desc';
}
