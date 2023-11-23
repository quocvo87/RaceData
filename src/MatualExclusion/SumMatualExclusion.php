<?php
namespace TrueMe\MatualExclusion;

class SumMatualExclusion extends MatualExclusion
{
    public function sum($criticalRegion=null, $value=null)
    {
        if (!$value || !$criticalRegion) return $this->criticalRegion;

        $this->newCriticalRegion = $this->setCriticalRegion($criticalRegion) + $value;

        return $this->lastest();
    }
}