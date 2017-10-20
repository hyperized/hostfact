<?php

namespace Hyperized\Wefact\Models;

use Jenssegers\Model\Model;

class PriceQuote extends Model
{
    /**
     * @return string
     */
    public function getStatusText()
    {
        switch($this->Status){
            case 0:
            default:
                return 'Concept offerte';
                break;
            case 1:
                return 'Wachtrij';
                break;
            case 2:
                return 'Verzonden';
                break;
            case 3:
                return 'Geaccepteerd';
                break;
            case 4:
                return 'Factuur aangemaakt';
                break;
            case 8:
                return 'Niet geaccepteerd';
                break;
        }
    }
}