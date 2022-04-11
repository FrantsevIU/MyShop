<?php

declare(strict_types=1);

namespace App\Service;

use App\Service\Impl\CartServiceInterface;

class CartActionService
{
    /**
     * @var CartServiceInterface[]
     */
    private array $scoringFactors;

    public function __construct(array $scoringFactors)
    {
        $this->scoringFactors = $scoringFactors;
    }
    public function action(int $id, string $nameAction, ?string $changeCount = null): void
    {
        foreach ($this->scoringFactors as $scoringFactor){
            if ($scoringFactor->isAction($nameAction)){
                $scoringFactor->execute($id,$changeCount);
                break;
            }
        }

    }
}
