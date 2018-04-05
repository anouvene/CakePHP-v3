<?php
/**
 * User: antoinenouvene
 */

namespace App\Model\Entity;


use Cake\ORM\Entity;

/**
 * Class Eleve
 * @package App\Model\Entity
 */
class Eleve extends Entity
{
    /**
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id_eleve' => false,
        'matieres' => true
    ];

}