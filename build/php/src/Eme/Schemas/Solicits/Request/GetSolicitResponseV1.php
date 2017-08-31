<?php
// @link http://schemas.wbeme.com/json-schema/eme/solicits/request/get-solicit-response/1-0-0.json#
namespace Eme\Schemas\Solicits\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Schema;
use Gdbots\Schemas\Forms\Mixin\GetFormResponse\GetFormResponseV1 as GdbotsFormsGetFormResponseV1;
use Gdbots\Schemas\Forms\Mixin\GetFormResponse\GetFormResponseV1Mixin as GdbotsFormsGetFormResponseV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\GetNodeResponse\GetNodeResponseV1 as GdbotsNcrGetNodeResponseV1;
use Gdbots\Schemas\Ncr\Mixin\GetNodeResponse\GetNodeResponseV1Mixin as GdbotsNcrGetNodeResponseV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1 as GdbotsPbjxResponseV1;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Mixin as GdbotsPbjxResponseV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Trait as GdbotsPbjxResponseV1Trait;

final class GetSolicitResponseV1 extends AbstractMessage implements
    GetSolicitResponse,
    GdbotsPbjxResponseV1,
    GdbotsNcrGetNodeResponseV1,
    GdbotsFormsGetFormResponseV1
{
    use GdbotsPbjxResponseV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:request:get-solicit-response:1-0-0', __CLASS__,
            [],
            [
                GdbotsPbjxResponseV1Mixin::create(),
                GdbotsNcrGetNodeResponseV1Mixin::create(),
                GdbotsFormsGetFormResponseV1Mixin::create(),
            ]
        );
    }
}
