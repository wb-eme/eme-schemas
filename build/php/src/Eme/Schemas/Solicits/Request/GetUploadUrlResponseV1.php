<?php
// @link http://schemas.wbeme.com/json-schema/eme/solicits/request/get-upload-url-response/1-0-0.json#
namespace Eme\Schemas\Solicits\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Schema;
use Gdbots\Schemas\Forms\Mixin\GetUploadUrlResponse\GetUploadUrlResponseV1 as GdbotsFormsGetUploadUrlResponseV1;
use Gdbots\Schemas\Forms\Mixin\GetUploadUrlResponse\GetUploadUrlResponseV1Mixin as GdbotsFormsGetUploadUrlResponseV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1 as GdbotsPbjxResponseV1;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Mixin as GdbotsPbjxResponseV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Trait as GdbotsPbjxResponseV1Trait;

final class GetUploadUrlResponseV1 extends AbstractMessage implements
    GetUploadUrlResponse,
    GdbotsPbjxResponseV1,
    GdbotsFormsGetUploadUrlResponseV1
{
    use GdbotsPbjxResponseV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:request:get-upload-url-response:1-0-0', __CLASS__,
            [],
            [
                GdbotsPbjxResponseV1Mixin::create(),
                GdbotsFormsGetUploadUrlResponseV1Mixin::create(),
            ]
        );
    }
}
