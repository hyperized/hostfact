<?php

namespace Hyperized\Wefact\Models;

use Jenssegers\Model\Model;

class Ssl extends Model
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
            case 'inrequest':
                return 'In aanvraag';
                break;
            case 'install':
                return 'Te installeren';
                break;
            case 'active':
                return 'Actief';
                break;
            case 'expired':
                return 'Verlopen';
                break;
            case 'uninstalled':
                return 'Gedeïnstalleerd';
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