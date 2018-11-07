<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Collection\Collection;

class Invoice extends Entity {

    public $totalCCOSTOESPECIFICO;
    
    public $totalCNETO;
    
    protected $_accessible = [
        '*' => true,
        'CIDDOCUMENTO' => false
        
    ];
    
    public function __construct(array $properties = [], array $options = []) {
        
        $totalCCOSTOESPECIFICO = 0;
        $totalCNETO = 0;
        
        parent::__construct($properties, $options);
        
    }
    
}

?>