<!--HEADER-->
<div class="dashhead">
    <div class="dashhead-titles">
        <h2 class="dashhead-title">Ajouter un élève dans votre liste</h2>
        <h6 class="dashhead-subtitle">Pas de champs vide et bien saisir le bon format de date. Merci</h6>
    </div>
</div>

<div class="content">
    <div class="hr-divider">
        <h3 class="hr-divider-content hr-divider-heading"><?= $this->Flash->render() ?></h3>
    </div>

    <!--DEBUT FORMULAIRE-->
    <?php $this->Form->templates([
    'inputContainer' => '{{content}}'
    ]);?>

    <?=$this->Form->create('Eleve', ['class' => 'table-full"'])?>

    <!--NOM-->
    <div class="input-group">
        <?=$this->Form->input(
                'nom',
                [
                    'label' => ['nom', 'class' => 'input-group-addon'],
                    'class' => 'form-control'
                ])?>
    </div>

    <!--PRENOM-->
    <div class="input-group">
        <?=$this->Form->input(
            'prenom',
            [
                'label' => ['prénom', 'class' => 'input-group-addon'],
                'class' => 'form-control'
            ])?>
    </div>

    <!--DATE DE NAISSANCE-->
    <div class="input-group">
        <span class="input-group-addon"><span class="icon icon-calendar"></span></span>
        <input type="text" name="date_naissance" placeholder="Ex.: 1990/01/01" class="form-control" style="width: 200px;">
    </div>

    <!--ENREGISTRER-->
    <div class="btn-group">
        <?=$this->Form->button(__('Ajouter'), ['class' => 'btn btn-primary-outline'])?>
    </div>
    <?=$this->Form->end()?>
