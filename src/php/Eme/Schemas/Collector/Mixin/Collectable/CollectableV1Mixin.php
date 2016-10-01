<?php

namespace Eme\Schemas\Collector\Mixin\Collectable;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class CollectableV1Mixin extends AbstractMixin
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return SchemaId::fromString('pbj:eme:collector:mixin:collectable:1-0-0');
    }

    /**
     * {@inheritdoc}
     */
    public function getFields()
    {
        return [
            /*
             * The application collecting the message. This is set on the
             * server by the collector app itself.
             */
            Fb::create('collector', T\MessageType::create())
                ->className('Gdbots\Schemas\Contexts\App')
                ->build()
        ];
    }
}
