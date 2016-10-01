<?php

namespace Eme\Schemas\Accounts\Mixin\AccountRef;

use Eme\Schemas\Accounts\AccountId;
use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class AccountRefV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:eme:accounts:mixin:account-ref:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            /*
             * The EME account that this message is associated with.
             */
            Fb::create('account_id', T\IdentifierType::create())
                ->className('Eme\Schemas\Accounts\AccountId')
                ->build()
        ];
    }
}
