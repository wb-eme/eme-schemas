<?php
declare(strict_types=1);

// @link http://schemas.wbeme.com/json-schema/eme/sys/mixin/tenant-id/1-0-0.json#
namespace Eme\Schemas\Sys\Mixin\TenantId;

use Eme\Schemas\Sys\TenantId;
use Gdbots\Pbj\Field;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\SchemaId;
use Gdbots\Pbj\Type as T;

final class TenantIdV1Mixin
{
    const SCHEMA_ID = 'pbj:eme:sys:mixin:tenant-id:1-0-0';
    const SCHEMA_CURIE = 'eme:sys:mixin:tenant-id';
    const SCHEMA_CURIE_MAJOR = 'eme:sys:mixin:tenant-id:v1';

    const TENANT_ID_FIELD = 'tenant_id';

    const FIELDS = [
      self::TENANT_ID_FIELD,
    ];

    final private function __construct() {}

    public static function getId(): SchemaId
    {
        return SchemaId::fromString(self::SCHEMA_ID);
    }

    public static function hasField(string $name): bool
    {
        return in_array($name, self::FIELDS, true);
    }

    /**
     * @return Field[]
     */
    public static function getFields(): array
    {
        return [
            /*
             * The EME tenant that this message is associated with.
             */
            Fb::create(self::TENANT_ID_FIELD, T\IdentifierType::create())
                ->required()
                ->className(TenantId::class)
                ->build(),
        ];
    }
}
