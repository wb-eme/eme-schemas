<?php
// @link http://schemas.wbeme.com/json-schema/eme/collector/mixin/collectable/1-0-0.json#
namespace Eme\Schemas\Collector\Mixin\Collectable;

use Gdbots\Pbj\AbstractMixin;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Contexts\App as GdbotsContextsApp;

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
                ->anyOfClassNames([
                    GdbotsContextsApp::class,
                ])
                ->build(),
        ];
    }
}
