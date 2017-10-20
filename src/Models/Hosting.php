<?php

namespace Hyperized\Wefact\Models;

use Jenssegers\Model\Model;

class Hosting extends Model
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
                return 'Aanmaken';
                break;
            case 4:
                return 'Actief';
                break;
            case 5:
                return 'Geblokkeerd';
                break;
            case 7:
                return 'Fout opgetreden';
                break;
            case 9:
                return 'Verwijderd';
                break;
        }
    }
}