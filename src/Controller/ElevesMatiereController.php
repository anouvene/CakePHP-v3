<?php
/**
 * User: antoinenouvene
 */

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Class ElevesController
 * @package App\Controller
 */
class ElevesMatiereController extends AppController
{
    /**
     * Ajouter une note à un élève
     */
    public function addNote(){
        // Chargement de template personnalisé
        $this->viewBuilder()->setLayout('index');

        // Chargement des modeles
        $this->loadModel('Eleves');
        $this->loadModel('Matieres');
        $this->loadModel('ElevesMatieres');

        // Récupère l'identifiant dans l'url
        $id = $this->request->getParam('id');

        // Récupère un article unique
        // $eleve = $this->Eleves->get($id);
        $eleve = $this->Eleves->get($id, ['contain' => ['Matieres']]);

        // Lister toutes les notes - eleves - matieres
        $notesElevesMatieres = $this->ElevesMatieres->find();

        if($this->request->is(['patch', 'post', 'put'])) {
            // Mise en mémoire les données postées avec la méthode patchEntity()
            // qui validera les données avant qu’elles soient copiées dans l’entité
            $eleve = $this->Eleves->patchEntity($eleve, $this->request->getData(),['associated' => ['Matieres._joinData']]);

            // Save en base
            try {
                $this->Eleves->save($eleve, ['associated' => ['Matieres._joinData']]);
                $this->Flash->success(__('Une note a bien été enregistrée'));
                // Redirection vers le profile de l'élève pour voir sa nouvelle note
                return $this->redirect('/eleves/view/'. $id);
            } catch(\Exception $e) {
                $this->Flash->error(__('Erreur de formulaire. Veuiller recommencer' . $e->getMessage() ));
            }
        }

        // Récupérer la liste des matieres
        $elevesMatieresTable = TableRegistry::get('ElevesMatieres');

        $query = $elevesMatieresTable->find()
            ->select([
                'matieres.id_matiere',
                'matieres.nom_matiere'
            ])
            ->distinct()
            ->join(
                ['Matieres' => 'matieres'],
                ['Matieres.id_matiere = ElevesMatieres.id_matiere']
            );

        // Schmilblick concernant liste des matieres
        $matieres = [];
        foreach ($query as $matiere) {
            $matieres[] = $matiere['matieres'];
        }
        //pr(json_encode($query, JSON_PRETTY_PRINT));
        // pr(json_encode($matieres, JSON_PRETTY_PRINT));
        // die();

        // Vers la View
        $this->set(compact('eleve', 'matieres'));
        $this->set('_serialize', ['eleve']);

        return null;
    }
}