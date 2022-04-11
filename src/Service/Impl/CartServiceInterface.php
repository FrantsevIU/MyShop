<?php

declare(strict_types=1);

namespace App\Service\Impl;

interface CartServiceInterface
{

    public function isAction(string $nameAction): bool;

    public function execute(int $id,?string $changeCount = null);

}
