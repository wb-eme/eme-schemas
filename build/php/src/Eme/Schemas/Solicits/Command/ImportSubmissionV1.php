<?php
// @link http://schemas.wbeme.com/json-schema/eme/solicits/command/import-submission/1-0-0.json#
namespace Eme\Schemas\Solicits\Command;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1 as EmeAccountsAccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin as EmeAccountsAccountRefV1Mixin;
use Eme\Schemas\Collector\Mixin\Collectable\CollectableV1 as EmeCollectorCollectableV1;
use Eme\Schemas\Collector\Mixin\Collectable\CollectableV1Mixin as EmeCollectorCollectableV1Mixin;
use Eme\Schemas\Solicits\SolicitId;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Common\Enum\Gender;
use Gdbots\Schemas\Common\Mixin\Taggable\TaggableV1 as GdbotsCommonTaggableV1;
use Gdbots\Schemas\Common\Mixin\Taggable\TaggableV1Mixin as GdbotsCommonTaggableV1Mixin;
use Gdbots\Schemas\Enrichments\Mixin\TimeParting\TimePartingV1 as GdbotsEnrichmentsTimePartingV1;
use Gdbots\Schemas\Enrichments\Mixin\TimeParting\TimePartingV1Mixin as GdbotsEnrichmentsTimePartingV1Mixin;
use Gdbots\Schemas\Enrichments\Mixin\TimeSampling\TimeSamplingV1 as GdbotsEnrichmentsTimeSamplingV1;
use Gdbots\Schemas\Enrichments\Mixin\TimeSampling\TimeSamplingV1Mixin as GdbotsEnrichmentsTimeSamplingV1Mixin;
use Gdbots\Schemas\Enrichments\Mixin\Utm\UtmV1 as GdbotsEnrichmentsUtmV1;
use Gdbots\Schemas\Enrichments\Mixin\Utm\UtmV1Mixin as GdbotsEnrichmentsUtmV1Mixin;
use Gdbots\Schemas\Files\FileId;
use Gdbots\Schemas\Geo\Address as GdbotsGeoAddress;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1 as GdbotsPbjxCommandV1;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Mixin as GdbotsPbjxCommandV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Trait as GdbotsPbjxCommandV1Trait;

final class ImportSubmissionV1 extends AbstractMessage implements
    ImportSubmission,
    EmeAccountsAccountRefV1,
    GdbotsPbjxCommandV1,
    EmeCollectorCollectableV1,
    GdbotsEnrichmentsTimePartingV1,
    GdbotsEnrichmentsTimeSamplingV1,
    GdbotsEnrichmentsUtmV1,
    GdbotsCommonTaggableV1
{
    use GdbotsPbjxCommandV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:command:import-submission:1-0-0', __CLASS__,
            [
                Fb::create('solicit_id', T\IdentifierType::create())
                    ->required()
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
                Fb::create('age', T\TinyIntType::create())
                    ->max(120)
                    ->build(),
                Fb::create('gender', T\IntEnumType::create())
                    ->className(Gender::class)
                    ->build(),
                Fb::create('story', T\TextType::create())
                    ->build(),
                Fb::create('file_ids', T\IdentifierType::create())
                    ->asASet()
                    ->className(FileId::class)
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
                 * Publisher provided identifier (PPID)
                 */
                Fb::create('ppid', T\StringType::create())
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                /*
                 * Contains all of the answers submitted from the custom fields on the solicit.
                 */
                Fb::create('cf', T\DynamicFieldType::create())
                    ->asAList()
                    ->build(),
                Fb::create('hashtags', T\StringType::create())
                    ->asASet()
                    ->format(Format::HASHTAG())
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
            ],
            [
                EmeAccountsAccountRefV1Mixin::create(),
                GdbotsPbjxCommandV1Mixin::create(),
                EmeCollectorCollectableV1Mixin::create(),
                GdbotsEnrichmentsTimePartingV1Mixin::create(),
                GdbotsEnrichmentsTimeSamplingV1Mixin::create(),
                GdbotsEnrichmentsUtmV1Mixin::create(),
                GdbotsCommonTaggableV1Mixin::create(),
            ]
        );
    }
}
