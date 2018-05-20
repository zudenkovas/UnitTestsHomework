<?php
/**
 * Created by PhpStorm.
 * User: vitalijus
 * Date: 18.5.20
 * Time: 15.11
 */

namespace App\Services;


class MoneyFormatter
{

    public function __construct(NumberFormatter $numberFormatter)
    {
        $this->numberFormatter = $numberFormatter;

    }
    
    public function formatEur($amount)
    {
      $formatedNumber = $this->numberFormatter->format($amount);

        return $formatedNumber." €";

    }
    

    public function formatUsd($amount)
    {
        $formatedNumber = $this->numberFormatter->format($amount);

        return "$ ".$formatedNumber;

    }
    
    
}