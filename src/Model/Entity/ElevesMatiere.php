<?php
/**
 * User: antoinenouvene
 */

namespace App\Model\Entity;


use Cake\ORM\Entity;

/**
 * Class ElevesMatiere
 * @package App\Model\Entity
 */
class ElevesMatiere extends Entity
{
    /**
     * @var array
     */
    protected $_accessible = [
        'id_eleve' => true,
        'id_matiere' => true,
        '*' => true,
        'eleve' => true,
        'matiere' => true,
    ];

}