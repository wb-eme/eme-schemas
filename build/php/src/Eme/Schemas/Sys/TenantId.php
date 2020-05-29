<?php
declare(strict_types=1);

namespace Eme\Schemas\Sys;

use Gdbots\Pbj\Assertion;
use Gdbots\Pbj\WellKnown\StringIdentifier;

final class TenantId extends StringIdentifier
{
    protected function __construct(string $tenantId)
    {
        Assertion::regex($tenantId, '/^[A-Za-z0-9]+$/');
        parent::__construct($tenantId);
    }
}
