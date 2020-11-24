<?php
declare(strict_types=1);

// @link http://schemas.wbeme.com/json-schema/eme/collector/command/process-irr/1-0-0.json#
namespace Eme\Schemas\Collector\Command;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Forms\Enum\IrrType;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Mixin as GdbotsPbjxCommandV1Mixin;

final class ProcessIrrV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:eme:collector:command:process-irr:1-0-0';
    const SCHEMA_CURIE = 'eme:collector:command:process-irr';
    const SCHEMA_CURIE_MAJOR = 'eme:collector:command:process-irr:v1';
    const MIXINS = [
      'gdbots:pbjx:mixin:command:v1',
      'gdbots:pbjx:mixin:command',
      'gdbots:forms:mixin:process-irr:v1',
      'gdbots:forms:mixin:process-irr',
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
                Fb::create('type', T\StringEnumType::create())
                    ->required()
                    ->className(IrrType::class)
                    ->build(),
                Fb::create('email', T\StringType::create())
                    ->format(Format::EMAIL())
                    ->build(),
                Fb::create('wb_subject_request_id', T\UuidType::create())
                    ->build(),
                Fb::create('wb_subject_request_received_timestamp', T\TimestampType::create())
                    ->build(),
                Fb::create('wb_status_callback_uri', T\TextType::create())
                    ->format(Format::URL())
                    ->build(),
                Fb::create('wb_fulfillment_callback_uri', T\TextType::create())
                    ->format(Format::URL())
                    ->build(),
                /*
                 * A cursor is a string (normally base64 encoded) which marks a specific item in a list of data.
                 * When cursor is present it should be used instead of "page".
                 */
                Fb::create('cursor', T\StringType::create())
                    ->build(),
            ],
            self::MIXINS
        );
    }
}
