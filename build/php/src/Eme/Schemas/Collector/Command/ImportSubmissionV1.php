<?php
declare(strict_types=1);

// @link http://schemas.wbeme.com/json-schema/eme/collector/command/import-submission/1-0-0.json#
namespace Eme\Schemas\Collector\Command;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Common\Enum\Gender;
use Gdbots\Schemas\Common\Enum\SexualOrientation;
use Gdbots\Schemas\Common\FileId;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Mixin as GdbotsPbjxCommandV1Mixin;

final class ImportSubmissionV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:eme:collector:command:import-submission:1-0-0';
    const SCHEMA_CURIE = 'eme:collector:command:import-submission';
    const SCHEMA_CURIE_MAJOR = 'eme:collector:command:import-submission:v1';
    const MIXINS = [
      'gdbots:pbjx:mixin:command:v1',
      'gdbots:pbjx:mixin:command',
    ];

    use GdbotsPbjxCommandV1Mixin;

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                Fb::create('command_id', T\TimeUuidType::create())
                    ->required()
                    ->build(),
                Fb::create('occurred_at', T\MicrotimeType::create())
                    ->build(),
                /*
                 * Used to perform optimistic concurrency control.
                 * @link https://en.wikipedia.org/wiki/HTTP_ETag
                 */
                Fb::create('expected_etag', T\StringType::create())
                    ->maxLength(100)
                    ->pattern('^[\w\.:-]+$')
                    ->build(),
                /*
                 * Multi-tenant apps can use this field to track the tenant id.
                 */
                Fb::create('ctx_tenant_id', T\StringType::create())
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                /*
                 * The "ctx_retries" field is used to keep track of how many attempts were
                 * made to process this command. In some cases, the service or transport
                 * that handles the command may be down or an optimistic check has failed
                 * and is being retried.
                 */
                Fb::create('ctx_retries', T\TinyIntType::create())
                    ->build(),
                /*
                 * The "ctx_causator" is the actual causator object that "ctx_causator_ref"
                 * refers to. In some cases it's useful for command handlers to copy the
                 * causator into the command. For example, when a node is being updated we
                 * may want to know what the node will be after the update. We can derive
                 * this via the causator instead of requesting the node and engaging a race
                 * condition.
                 */
                Fb::create('ctx_causator', T\MessageType::create())
                    ->build(),
                Fb::create('ctx_causator_ref', T\MessageRefType::create())
                    ->build(),
                Fb::create('ctx_correlator_ref', T\MessageRefType::create())
                    ->build(),
                Fb::create('ctx_user_ref', T\MessageRefType::create())
                    ->build(),
                /*
                 * The "ctx_app" refers to the application used to send the command. This is
                 * different from ctx_ua (user_agent) because the agent used (Safari, Firefox)
                 * is not necessarily the app used (cms, iOS app, website)
                 */
                Fb::create('ctx_app', T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:contexts::app',
                    ])
                    ->build(),
                /*
                 * The "ctx_cloud" is set by the server receiving the command and is generally
                 * only used internally for tracking and performance monitoring.
                 */
                Fb::create('ctx_cloud', T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:contexts::cloud',
                    ])
                    ->build(),
                Fb::create('ctx_ip', T\StringType::create())
                    ->format(Format::IPV4())
                    ->overridable(true)
                    ->build(),
                Fb::create('ctx_ipv6', T\StringType::create())
                    ->format(Format::IPV6())
                    ->overridable(true)
                    ->build(),
                Fb::create('ctx_ua', T\TextType::create())
                    ->overridable(true)
                    ->build(),
                /*
                 * An optional message/reason for the command being sent.
                 * Consider this like a git commit message.
                 */
                Fb::create('ctx_msg', T\TextType::create())
                    ->build(),
                Fb::create('form_ref', T\NodeRefType::create())
                    ->required()
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
                    ->anyOfCuries([
                        'gdbots:geo::address',
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
                /*
                 * The person's physical height recorded in inches.
                 */
                Fb::create('height', T\TinyIntType::create())
                    ->max(120)
                    ->build(),
                Fb::create('gender', T\IntEnumType::create())
                    ->className(Gender::class)
                    ->build(),
                Fb::create('sexual_orientation', T\StringEnumType::create())
                    ->className(SexualOrientation::class)
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
                 * Contains all of the answers submitted from the custom fields on the form.
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
                Fb::create('is_rejected', T\BooleanType::create())
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
            self::MIXINS
        );
    }
}
