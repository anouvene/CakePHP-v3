<?php
/**
 * User: antoinenouvene
 */

namespace App\Model\Table;


use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

/**
 * Modèle ElevesMatieres
 * Class ElevesMatieresTable
 * @package App\Model\Table
 */
class ElevesMatieresTable extends Table
{

    public function initialize(array $config)
    {
        $this->table('eleves_matieres');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Eleves', [
            'foreignKey' => 'id_eleve',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Matieres', [
            'foreignKey' => 'id_matiere',
            'joinType' => 'INNER'
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
            ->integer('note')
            ->allowEmpty('note', 'create');

        $validator
            ->date('ymd')
            ->allowEmpty('date_note');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['id_eleve'], 'Eleves'));
        $rules->add($rules->existsIn(['id_matiere'], 'Matieres'));

        return $rules;
    }
}