<?php
/**
 * User: antoinenouvene
 */

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Class ElevesMatiereController
 * @package App\Controller
 */
class ElevesController extends AppController
{

    /**
     * Lister les éleves
     */
    public function home()
    {
        // Chargement de template personnalisé
        $this->viewBuilder()->setLayout('index');

        // Récupérer tous les élèves
        $query = $this->Eleves->find('all');
        $this->set('title', 'Liste des élèves');
        $eleves = $query;

        // Envoyer la liste des élèves vers la vue
        $this->set('eleves', $eleves);
    }

    /**
     * Voir un éleve
     */
    public function view()
    {
        // Chargement de template personnalisé
        $this->viewBuilder()->setLayout('index');

        // Récupère l'identifiant dans l'url
        // $id = $this->request->getParam('id');
        $id = $this->request->id;

        // Récupèrer les données liée à  eleve: civilité &  matieres étudiées & notes
        $elevesMatieresTable = TableRegistry::get('ElevesMatieres');

        // Jointure Eleves & Matieres
        $eleveMatiereNote = $elevesMatieresTable->find()
            ->select([
                'eleves.nom',
                'eleves.prenom',
                'eleves.date_naissance',
                'matieres.nom_matiere',
                'ElevesMatieres.note',
                'ElevesMatieres.date_note'
            ])
            ->leftJoin(
                ['Eleves' => 'eleves'],
                ['Eleves.id_eleve = ElevesMatieres.id_eleve']
            )
            ->leftJoin(
                ['Matieres' => 'matieres'],
                ['Matieres.id_matiere = ElevesMatieres.id_matiere']
            )
            ->where(['ElevesMatieres.id_eleve' => $id]);

        // dump($eleve->toArray());
        // pr(json_encode($eleve, JSON_PRETTY_PRINT));
        // die();

        // Envoyer vers la vue
        if(!empty($eleveMatiereNote->toArray())) {
            // Infos élève
            $eleve = $this->Eleves->get($id);

            $this->set(['eleve' => $eleve, 'eleveMatiereNote' => $eleveMatiereNote->toArray()]);
        } else {
            // Récupère infos élève uniquement
            $eleve = $this->Eleves->get($id);
            $this->set('eleve', $eleve);
        }

    }

    /**
     * Ajouter un élève
     */
    public function add(){
        // Chargement de template personnalisé
        $this->viewBuilder()->setLayout('index');

        // Instancier le modele Eleves
        $eleve = $this->Eleves->newEntity();

        if($this->request->is('post')) {
            // Sauvegarde en mémoire les données postées avec la méthode patchEntity()
            // qui validera les données avant qu’elles soient copiées dans l’entité
            $eleve = $this->Eleves->patchEntity($eleve, $this->request->getData());
            if($this->Eleves->save($eleve)){
                $this->Flash->success(__('Un éleve a bien été enregistré', '/eleves/'));


                return $this->redirect('/eleves/');
            }
            $this->Flash->error(__('Erreur de formulaire. Veuiller recommencer'));
        }

        $this->set('eleve', $eleve);

        return null;
    }

    /**
     * Editer un élève
     */
    public function edit() {
        // Chargement de template personnalisé
        $this->viewBuilder()->setLayout('index');

        // Récupère l'identifiant dans l'url
        $id = $this->request->getParam('id');

        // Récupère un article unique
        $eleve = $this->Eleves->get($id);

        // Vérifier si requête de type Get ou Post puis hydrater l'entité
        if ($this->request->is(['post', 'put'])) {
            $this->Eleves->patchEntity($eleve, $this->request->getData());
            if ($this->Eleves->save($eleve)) {
                $this->Flash->success(__('L\'éleve a bien été mis à jour.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible de mettre à jour l\'éleve.'));
        }

        $this->set('eleve', $eleve);

        return null;
    }

    /**
     * Supprimer un élève
     */
    public function del(){
        // Récupère l'identifiant dans l'url
        $id = $this->request->getParam('id');

        // Récupère un article unique
        $eleve = $this->Eleves->get($id);

        // Récupérer tous les élèves
        $query = $this->Eleves->find('all');
        $this->set('title', 'Liste des élèves');
        $eleves = $query;

        // Supression
        try {
            $this->Eleves->deleteAll(['id_eleve' => $id]);
            $this->Flash->success(__('L\'éleve a bien été supprimé.'));
        } catch (\Exception $e) {
            $error = 'The item you are trying to delete is associated with other records';
            $this->Flash->error(__('Erreur de suppression: ' . $error));
        }

        return $this->redirect('/eleves/');

    }

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