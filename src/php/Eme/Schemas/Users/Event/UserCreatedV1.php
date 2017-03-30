<?php

namespace Eme\Schemas\Users\Event;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1 as EmeAccountsAccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin as EmeAccountsAccountRefV1Mixin;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Analytics\Mixin\TrackedMessage\TrackedMessageV1 as GdbotsAnalyticsTrackedMessageV1;
use Gdbots\Schemas\Analytics\Mixin\TrackedMessage\TrackedMessageV1Mixin as GdbotsAnalyticsTrackedMessageV1Mixin;
use Gdbots\Schemas\Enrichments\Mixin\IpToGeo\IpToGeoV1 as GdbotsEnrichmentsIpToGeoV1;
use Gdbots\Schemas\Enrichments\Mixin\IpToGeo\IpToGeoV1Mixin as GdbotsEnrichmentsIpToGeoV1Mixin;
use Gdbots\Schemas\Enrichments\Mixin\TimeParting\TimePartingV1 as GdbotsEnrichmentsTimePartingV1;
use Gdbots\Schemas\Enrichments\Mixin\TimeParting\TimePartingV1Mixin as GdbotsEnrichmentsTimePartingV1Mixin;
use Gdbots\Schemas\Enrichments\Mixin\TimeSampling\TimeSamplingV1 as GdbotsEnrichmentsTimeSamplingV1;
use Gdbots\Schemas\Enrichments\Mixin\TimeSampling\TimeSamplingV1Mixin as GdbotsEnrichmentsTimeSamplingV1Mixin;
use Gdbots\Schemas\Enrichments\Mixin\UaParser\UaParserV1 as GdbotsEnrichmentsUaParserV1;
use Gdbots\Schemas\Enrichments\Mixin\UaParser\UaParserV1Mixin as GdbotsEnrichmentsUaParserV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\NodeCreated\NodeCreatedV1 as GdbotsNcrNodeCreatedV1;
use Gdbots\Schemas\Ncr\Mixin\NodeCreated\NodeCreatedV1Mixin as GdbotsNcrNodeCreatedV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1 as GdbotsPbjxEventV1;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Mixin as GdbotsPbjxEventV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Trait as GdbotsPbjxEventV1Trait;

final class UserCreatedV1 extends AbstractMessage implements
    UserCreated,
    EmeAccountsAccountRefV1,
    GdbotsPbjxEventV1,
    GdbotsNcrNodeCreatedV1,
    GdbotsAnalyticsTrackedMessageV1,
    GdbotsEnrichmentsIpToGeoV1,
    GdbotsEnrichmentsTimePartingV1,
    GdbotsEnrichmentsTimeSamplingV1,
    GdbotsEnrichmentsUaParserV1
  
{
    use GdbotsPbjxEventV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:users:event:user-created:1-0-0', __CLASS__,
            [],
            [
                EmeAccountsAccountRefV1Mixin::create(), 
                GdbotsPbjxEventV1Mixin::create(), 
                GdbotsNcrNodeCreatedV1Mixin::create(), 
                GdbotsAnalyticsTrackedMessageV1Mixin::create(), 
                GdbotsEnrichmentsIpToGeoV1Mixin::create(), 
                GdbotsEnrichmentsTimePartingV1Mixin::create(), 
                GdbotsEnrichmentsTimeSamplingV1Mixin::create(), 
                GdbotsEnrichmentsUaParserV1Mixin::create()
            ]
        );
    }
}
