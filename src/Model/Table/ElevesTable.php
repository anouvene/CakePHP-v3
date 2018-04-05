<?php
/**
 * User: antoinenouvene
 * Date: 03/04/18
 */

namespace App\Model\Table;


use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Query;

/**
 * Modèle Eleves
 * Class ElevesTable
 * @package App\Model\Table
 */
class ElevesTable extends Table
{
    protected $idEleve;
    /**
     * Chargement des données de configuration
     * @param array $config
     */
    public function initialize(array $config)
    {
        // parent::initialize($config);
        // $this->idEleve = $this->getPrimaryKey();
        // $this->getTable();
        // $this->getDisplayField();

        // Un "Eleve" peut être prendre plusieurs "Matieres"
        // Jointure "hasMany through" via le modèle "ElevesMatieres"
        // $this->belongsToMany('Matieres',
        //     [
        //         'joinTable' => 'eleves_matieres',
        //         'dependent' => true,
        //         'cascadeCallbacks' => true,
        //
        //         // 'foreignKey' => 'id_matiere',
        //         // 'targetForeignKey' => 'id_matiere',
        //     ]);



        $this->table('Eleves');
        $this->displayField('id_eleve');
        $this->primaryKey('id_eleve');
        $this->belongsToMany('Matieres', [
            'foreignKey' => 'id_eleve',
            'targetForeignKey' => 'id_matiere',
            'joinTable' => 'eleves_matieres',
            'through' => 'ElevesMatieres',
        ]);
    }

    /**
     * @param Query $query
     * @param array $options
     * @return Query
     */
    public function findNotes(Query $query, Array $options)
    {
        dump($options['id']);
        $query
            ->where(['id_eleve' => $options['id']])
            ->contain(['Matieres']);
        return $query;
    }

    /**
     * Validation des données
     * @param Validator $validator
     * @return Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id_eleve')
            ->allowEmpty('id_eleve', 'create');

        $validator
            ->requirePresence('nom', 'create')
            ->notEmpty('nom');

        $validator
            ->requirePresence('prenom', 'create')
            ->notEmpty('prenom');

        $validator
            ->date('ymd')
            ->notEmpty('date_naissance');

        return $validator;
    }



}