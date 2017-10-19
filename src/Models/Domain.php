<?php

namespace Hyperized\Wefact\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    /**
     * @return string
     */
    public function getStatusText()
    {
        switch($this->Status){
            case -1:
            default:
                return 'In bestelling';
                break;
            case 1:
                return 'Wachten op actie';
                break;
            case 3:
                return 'Aanvragen';
                break;
            case 4:
                return 'Actief';
                break;
            case 5:
                return 'Verlopen';
                break;
            case 6:
                return 'In behandeling';
                break;
            case 7:
                return 'Fout opgetreden';
                break;
            case 8:
                return 'Geannuleerd';
                break;
            case 9:
                return 'Verwijderd';
                break;
        }
    }
}