<?php

namespace Hyperized\Wefact\Models;

use Illuminate\Database\Eloquent\Model;

class CreditInvoice extends Model
{
    /**
     * @return string
     */
    public function getStatusText()
    {
        switch($this->Status){
            case 0:
            default:
                return 'Nog niet ontvangen';
                break;
            case 1:
                return 'Nog niet betaald';
                break;
            case 2:
                return 'Deels betaald';
                break;
            case 3:
                return 'Betaald';
                break;
            case 8:
                return 'Creditfactuur';
                break;
            case 9:
                return 'Vervallen';
                break;
        }
    }
}