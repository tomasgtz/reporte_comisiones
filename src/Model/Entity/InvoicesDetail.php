<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Collection\Collection;

class InvoicesDetail extends Entity {

    
    protected $_accessible = [
        '*' => true,
        'CIDMOVIMIENTO' => false
        
    ];
    

}

?>