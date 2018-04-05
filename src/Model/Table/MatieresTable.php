<?php
/**
 * User: antoinenouvene
 */

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Modèle Matiere
 * Class MatieresTable
 * @package App\Model\Table
 */
class MatieresTable extends  Table
{
    /**
     * Chargement des données de configuration
     * @param array $config
     */
    public function initialize(array $config)
    {
        // parent::initialize($config);
        // $this->getPrimaryKey();
        // $this->getTable();
        // $this->getDisplayField();

        // Une "Matiere" peut être suivie par plusieurs "Eleves"
        // Jointure "hasMany through" via le modèle "ElevesMatieres"
        // $this->belongsToMany('Eleves',
        //     [
        //         'joinTable' => 'eleves_matieres',
        //         'dependent' => true,
        //         'cascadeCallbacks' => true,
        //
        //         // 'foreignKey' => 'id_eleve',
        //         // 'targetForeignKey' => 'id_matiere',
        //     ]);


        $this->table('Matieres');
        $this->displayField('id_matiere');
        $this->primaryKey('id_matiere');
        $this->belongsToMany('Eleves', [
            'foreignKey' => 'id_matiere',
            'targetForeignKey' => 'id_eleve',
            'joinTable' => 'id_eleve',
            'through' => 'ElevesMatieres',
        ]);
    }

    /**
     * Validation des données
     * @param Validator $validator
     * @return Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id_matiere')
            ->allowEmpty('id_matiere', 'create');

        $validator
            ->requirePresence('nom_matiere', 'create')
            ->notEmpty('nom_matiere');

        return $validator;
    }
}