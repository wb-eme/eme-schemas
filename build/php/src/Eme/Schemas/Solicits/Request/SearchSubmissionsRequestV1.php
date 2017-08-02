<?php
// @link http://schemas.wbeme.com/json-schema/eme/solicits/request/search-submissions-request/1-0-0.json#
namespace Eme\Schemas\Solicits\Request;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1 as EmeAccountsAccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin as EmeAccountsAccountRefV1Mixin;
use Eme\Schemas\Solicits\SolicitId;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Analytics\Mixin\TrackedMessage\TrackedMessageV1 as GdbotsAnalyticsTrackedMessageV1;
use Gdbots\Schemas\Analytics\Mixin\TrackedMessage\TrackedMessageV1Mixin as GdbotsAnalyticsTrackedMessageV1Mixin;
use Gdbots\Schemas\Geo\Address as GdbotsGeoAddress;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1 as GdbotsPbjxRequestV1;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Mixin as GdbotsPbjxRequestV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Trait as GdbotsPbjxRequestV1Trait;
use Gdbots\Schemas\Pbjx\Mixin\SearchEventsRequest\SearchEventsRequestV1 as GdbotsPbjxSearchEventsRequestV1;
use Gdbots\Schemas\Pbjx\Mixin\SearchEventsRequest\SearchEventsRequestV1Mixin as GdbotsPbjxSearchEventsRequestV1Mixin;

final class SearchSubmissionsRequestV1 extends AbstractMessage implements
    SearchSubmissionsRequest,
    EmeAccountsAccountRefV1,
    GdbotsPbjxRequestV1,
    GdbotsPbjxSearchEventsRequestV1,
    GdbotsAnalyticsTrackedMessageV1
{
    use GdbotsPbjxRequestV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:request:search-submissions-request:1-0-0', __CLASS__,
            [
                Fb::create('solicit_id', T\IdentifierType::create())
                    ->className(SolicitId::class)
                    ->build(),
                Fb::create('first_name', T\StringType::create())
                    ->build(),
                Fb::create('last_name', T\StringType::create())
                    ->build(),
                Fb::create('email', T\StringType::create())
                    ->format(Format::EMAIL())
                    ->build(),
                Fb::create('email_domain', T\StringType::create())
                    ->format(Format::HOSTNAME())
                    ->build(),
                Fb::create('address', T\MessageType::create())
                    ->anyOfClassNames([
                        GdbotsGeoAddress::class,
                    ])
                    ->build(),
                Fb::create('age_min', T\TinyIntType::create())
                    ->max(120)
                    ->build(),
                Fb::create('age_max', T\TinyIntType::create())
                    ->max(120)
                    ->build(),
                Fb::create('height_min', T\TinyIntType::create())
                    ->max(120)
                    ->build(),
                Fb::create('height_max', T\TinyIntType::create())
                    ->max(120)
                    ->build(),
                Fb::create('has_notes', T\TrinaryType::create())
                    ->build(),
                Fb::create('is_blocked', T\TrinaryType::create())
                    ->build(),
                Fb::create('is_read', T\TrinaryType::create())
                    ->build(),
                Fb::create('last_read_after', T\DateTimeType::create())
                    ->build(),
                Fb::create('last_read_before', T\DateTimeType::create())
                    ->build(),
                Fb::create('last_read_by_ref', T\MessageRefType::create())
                    ->build(),
                Fb::create('is_verified', T\TrinaryType::create())
                    ->build(),
                Fb::create('is_rejected', T\TrinaryType::create())
                    ->build(),
            ],
            [
                EmeAccountsAccountRefV1Mixin::create(),
                GdbotsPbjxRequestV1Mixin::create(),
                GdbotsPbjxSearchEventsRequestV1Mixin::create(),
                GdbotsAnalyticsTrackedMessageV1Mixin::create(),
            ]
        );
    }
}
