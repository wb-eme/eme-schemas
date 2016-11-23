<?php

namespace Eme\Schemas\Users\Command;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Trait;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Mixin\IndexNodeBatch\IndexNodeBatchV1;
use Gdbots\Schemas\Ncr\Mixin\IndexNodeBatch\IndexNodeBatchV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\IndexNodeBatch\IndexNodeBatchV1Trait;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Trait;

final class IndexUserBatchV1 extends AbstractMessage implements
    IndexUserBatch,
    AccountRefV1,
    CommandV1,
    IndexNodeBatchV1
  
{
    use AccountRefV1Trait;
    use CommandV1Trait;
    use IndexNodeBatchV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:users:command:index-user-batch:1-0-0', __CLASS__,
            [],
            [
                AccountRefV1Mixin::create(), 
                CommandV1Mixin::create(), 
                IndexNodeBatchV1Mixin::create()
            ]
        );
    }
}
