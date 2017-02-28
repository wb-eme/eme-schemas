<?php

namespace Eme\Schemas\Solicits\Event;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Trait;
use Eme\Schemas\Collector\Mixin\Collectable\CollectableV1;
use Eme\Schemas\Collector\Mixin\Collectable\CollectableV1Mixin;
use Eme\Schemas\Collector\Mixin\Collectable\CollectableV1Trait;
use Eme\Schemas\Solicits\SolicitId;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Analytics\Mixin\TrackedMessage\TrackedMessageV1;
use Gdbots\Schemas\Analytics\Mixin\TrackedMessage\TrackedMessageV1Mixin;
use Gdbots\Schemas\Analytics\Mixin\TrackedMessage\TrackedMessageV1Trait;
use Gdbots\Schemas\Common\Enum\Gender;
use Gdbots\Schemas\Common\Mixin\Taggable\TaggableV1;
use Gdbots\Schemas\Common\Mixin\Taggable\TaggableV1Mixin;
use Gdbots\Schemas\Common\Mixin\Taggable\TaggableV1Trait;
use Gdbots\Schemas\Enrichments\Mixin\IpToGeo\IpToGeoV1;
use Gdbots\Schemas\Enrichments\Mixin\IpToGeo\IpToGeoV1Mixin;
use Gdbots\Schemas\Enrichments\Mixin\IpToGeo\IpToGeoV1Trait;
use Gdbots\Schemas\Enrichments\Mixin\TimeParting\TimePartingV1;
use Gdbots\Schemas\Enrichments\Mixin\TimeParting\TimePartingV1Mixin;
use Gdbots\Schemas\Enrichments\Mixin\TimeParting\TimePartingV1Trait;
use Gdbots\Schemas\Enrichments\Mixin\TimeSampling\TimeSamplingV1;
use Gdbots\Schemas\Enrichments\Mixin\TimeSampling\TimeSamplingV1Mixin;
use Gdbots\Schemas\Enrichments\Mixin\TimeSampling\TimeSamplingV1Trait;
use Gdbots\Schemas\Enrichments\Mixin\UaParser\UaParserV1;
use Gdbots\Schemas\Enrichments\Mixin\UaParser\UaParserV1Mixin;
use Gdbots\Schemas\Enrichments\Mixin\UaParser\UaParserV1Trait;
use Gdbots\Schemas\Enrichments\Mixin\Utm\UtmV1;
use Gdbots\Schemas\Enrichments\Mixin\Utm\UtmV1Mixin;
use Gdbots\Schemas\Enrichments\Mixin\Utm\UtmV1Trait;
use Gdbots\Schemas\Files\FileId;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Trait;
use Gdbots\Schemas\Pbjx\Mixin\Indexed\IndexedV1;
use Gdbots\Schemas\Pbjx\Mixin\Indexed\IndexedV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Indexed\IndexedV1Trait;

final class SubmissionReceivedV1 extends AbstractMessage implements
    SubmissionReceived,
    AccountRefV1,
    EventV1,
    IndexedV1,
    TrackedMessageV1,
    CollectableV1,
    IpToGeoV1,
    TimePartingV1,
    TimeSamplingV1,
    UaParserV1,
    UtmV1,
    TaggableV1
  
{
    use AccountRefV1Trait;
    use EventV1Trait;
    use IndexedV1Trait;
    use TrackedMessageV1Trait;
    use CollectableV1Trait;
    use IpToGeoV1Trait;
    use TimePartingV1Trait;
    use TimeSamplingV1Trait;
    use UaParserV1Trait;
    use UtmV1Trait;
    use TaggableV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:event:submission-received:1-0-0', __CLASS__,
            [
                Fb::create('solicit_id', T\IdentifierType::create())
                    ->required()
                    ->className('Eme\Schemas\Solicits\SolicitId')
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
                    ->className('Gdbots\Schemas\Geo\Address')
                    ->build(),
                /*
                 * A general format for international telephone numbers.
                 * @link https://en.wikipedia.org/wiki/E.164
                 */
                Fb::create('phone', T\StringType::create())
                    ->asAMap()
                    ->maxLength(20)
                    ->pattern('^\+?[1-9]\d{1,14}$')
                    ->build(),
                Fb::create('dob', T\DateType::create())
                    ->build(),
                /*
                 * The "age" is generally populated if "dob" is present by using the difference of
                 * "dob" and "occurred_at" to determine the age at the time of the submission.
                 */
                Fb::create('age', T\TinyIntType::create())
                    ->max(120)
                    ->build(),
                Fb::create('gender', T\IntEnumType::create())
                    ->withDefault(Gender::UNKNOWN())
                    ->className('Gdbots\Schemas\Common\Enum\Gender')
                    ->build(),
                Fb::create('story', T\TextType::create())
                    ->build(),
                Fb::create('file_ids', T\IdentifierType::create())
                    ->asASet()
                    ->className('Gdbots\Schemas\Files\FileId')
                    ->build(),
                /*
                 * Networks is a map that contains handles/usernames on a social network.
                 * E.g. facebook:homer, twitter:stackoverflow, youtube:coltrane78.
                 */
                Fb::create('networks', T\StringType::create())
                    ->asAMap()
                    ->maxLength(50)
                    ->pattern('^[\w\.-]+$')
                    ->build(),
                /*
                 * Mentions contains the usernames extracted from the "networks" map and possibly
                 * parsed from other text fields. Makes it possible to search @mentions.
                 */
                Fb::create('mentions', T\StringType::create())
                    ->asASet()
                    ->maxLength(50)
                    ->pattern('^[\w\.-]+$')
                    ->build(),
                /*
                 * Publisher provided identifier (PPID)
                 */
                Fb::create('ppid', T\StringType::create())
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                Fb::create('hashtags', T\StringType::create())
                    ->asASet()
                    ->format(Format::HASHTAG())
                    ->build(),
                Fb::create('has_notes', T\BooleanType::create())
                    ->build(),
                Fb::create('is_blocked', T\BooleanType::create())
                    ->build(),
                Fb::create('is_read', T\BooleanType::create())
                    ->build(),
                Fb::create('last_read_at', T\MicrotimeType::create())
                    ->useTypeDefault(false)
                    ->build(),
                /*
                 * A fully qualified reference to the user who last read this submission.
                 */
                Fb::create('last_read_by_ref', T\MessageRefType::create())
                    ->build(),
                /*
                 * If true this submission was verified to be from the associated ctx_user_ref or email.
                 * Verification can be secure cookie, email confirmation, phone verification, login, etc.
                 * If the submission was accepted without any kind of verification this should be false.
                 */
                Fb::create('is_verified', T\BooleanType::create())
                    ->build(),
                Fb::create('verified_at', T\MicrotimeType::create())
                    ->useTypeDefault(false)
                    ->build(),
                /*
                 * The percentage (whole number) of text in the "story" that is ALL CAPS.
                 */
                Fb::create('allcaps', T\TinyIntType::create())
                    ->max(100)
                    ->build(),
                /*
                 * The maximum number of contiguous exclamation points in the "story" text.
                 */
                Fb::create('exclaims', T\TinyIntType::create())
                    ->build(),
                /*
                 * Contains all of the answers submitted from the custom fields on the solicit.
                 */
                Fb::create('cf', T\DynamicFieldType::create())
                    ->asAList()
                    ->build(),
                /*
                 * "s256" means shard 256. Used to distribute read/write from storage and speed up
                 * replay/reindex processes. It can also be used to distribute workload in front end
                 * user interfaces or notifications (like isles in a grocery store).
                 * This value should NOT change once set.
                 */
                Fb::create('s256', T\TinyIntType::create())
                    ->build(),
                /*
                 * "s32" means shard 32. See field "s256" for explanation.
                 */
                Fb::create('s32', T\TinyIntType::create())
                    ->build(),
                /*
                 * "s16" means shard 16. See field "s256" for explanation.
                 */
                Fb::create('s16', T\TinyIntType::create())
                    ->build()
            ],
            [
                AccountRefV1Mixin::create(), 
                EventV1Mixin::create(), 
                IndexedV1Mixin::create(), 
                TrackedMessageV1Mixin::create(), 
                CollectableV1Mixin::create(), 
                IpToGeoV1Mixin::create(), 
                TimePartingV1Mixin::create(), 
                TimeSamplingV1Mixin::create(), 
                UaParserV1Mixin::create(), 
                UtmV1Mixin::create(), 
                TaggableV1Mixin::create()
            ]
        );
    }
}
