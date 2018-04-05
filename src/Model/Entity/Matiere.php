<?php
/**
 * User: antoinenouvene
 */

namespace App\Model\Entity;

/**
 * Class Matiere
 * @package App\Model\Entity
 */
class Matiere
{
    /**
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id_matiere' => false,
        'eleves' => true
    ];

}