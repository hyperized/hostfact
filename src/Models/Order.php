<?php

namespace Hyperized\Wefact\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * @return string
     */
    public function getStatusText()
    {
        switch($this->Status){
            case 0:
            default:
                return 'Ontvangen';
                break;
            case 1:
                return 'In behandeling';
                break;
            case 2:
                return 'Cronjob fout, handmatig doorzetten';
                break;
            case 8:
                return 'Behandeld';
                break;
            case 9:
                return 'Geannuleerd';
                break;
        }
    }
}