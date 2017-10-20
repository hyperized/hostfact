<?php

namespace Hyperized\Wefact\Models;

use Jenssegers\Model\Model;

class Ticket extends Model
{
    /**
     * @return mixed|string
     */
    public function getName()
    {
        return (! empty($this->CompanyName)) ? $this->CompanyName : $this->Initials.' '.$this->SurName;
    }

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