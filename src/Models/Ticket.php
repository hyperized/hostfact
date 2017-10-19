<?php

namespace Hyperized\Wefact\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * @return string
     */
    public function getStatusText()
    {
        switch($this->Status){
            case 0:
            default:
                return 'Nieuw bericht';
                break;
            case 1:
                return 'Open';
                break;
            case 2:
                return 'In behandeling';
                break;
            case 3:
                return 'Gesloten';
                break;
        }
    }
}