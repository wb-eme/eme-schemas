<?php
declare(strict_types=1);

namespace Eme\Schemas\Marketing\Enum;

use Gdbots\Pbj\Enum;

/**
 * @method static CampaignSendStatus UNKNOWN()
 * @method static CampaignSendStatus DRAFT()
 * @method static CampaignSendStatus SCHEDULED()
 * @method static CampaignSendStatus SENDING()
 * @method static CampaignSendStatus SENT()
 * @method static CampaignSendStatus CANCELED()
 * @method static CampaignSendStatus PAUSED()
 * @method static CampaignSendStatus FAILED()
 */
final class CampaignSendStatus extends Enum
{
    const UNKNOWN = 'unknown';
    const DRAFT = 'draft';
    const SCHEDULED = 'scheduled';
    const SENDING = 'sending';
    const SENT = 'sent';
    const CANCELED = 'canceled';
    const PAUSED = 'paused';
    const FAILED = 'failed';
}
