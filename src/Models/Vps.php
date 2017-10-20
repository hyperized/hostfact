<?php

namespace Hyperized\Wefact\Models;

use Jenssegers\Model\Model;

class Vps extends Model
{
    /**
     * @return string
     */
    public function getStatusText()
    {
        switch($this->Status){
            case 'inorder':
            default:
                return 'In bestelling';
                break;
            case 'waiting':
                return 'Wachten op actie';
                break;
            case 'create':
                return 'Aanmaken';
                break;
            case 'building':
                return 'In behandeling';
                break;
            case 'active':
                return 'Actief';
                break;
            case 'suspended':
                return 'Geblokkeerd';
                break;
            case 'error':
                return 'Fout opgetreden';
                break;
            case 'removed':
                return 'Verwijderd';
                break;
        }
    }
}