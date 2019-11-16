<?php
// @link http://schemas.wbeme.com/json-schema/eme/solicits/request/get-upload-url-request/1-0-0.json#
namespace Eme\Schemas\Solicits\Request;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1 as EmeAccountsAccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin as EmeAccountsAccountRefV1Mixin;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Schema;
use Gdbots\Schemas\Forms\Mixin\GetUploadUrlRequest\GetUploadUrlRequestV1 as GdbotsFormsGetUploadUrlRequestV1;
use Gdbots\Schemas\Forms\Mixin\GetUploadUrlRequest\GetUploadUrlRequestV1Mixin as GdbotsFormsGetUploadUrlRequestV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1 as GdbotsPbjxRequestV1;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Mixin as GdbotsPbjxRequestV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Trait as GdbotsPbjxRequestV1Trait;

final class GetUploadUrlRequestV1 extends AbstractMessage implements
    GetUploadUrlRequest,
    EmeAccountsAccountRefV1,
    GdbotsPbjxRequestV1,
    GdbotsFormsGetUploadUrlRequestV1
{
    use GdbotsPbjxRequestV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:request:get-upload-url-request:1-0-0', __CLASS__,
            [],
            [
                EmeAccountsAccountRefV1Mixin::create(),
                GdbotsPbjxRequestV1Mixin::create(),
                GdbotsFormsGetUploadUrlRequestV1Mixin::create(),
            ]
        );
    }
}
