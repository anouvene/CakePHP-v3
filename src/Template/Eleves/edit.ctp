<!--HEADER-->
<div class="dashhead">
    <div class="dashhead-titles">
        <h2 class="dashhead-title">Modifier les infos d'un élève</h2>
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

    <?=$this->Form->create($eleve, ['class' => 'table-full"'])?>
    <?=$this->Form->control('id_eleve', ['type' => 'hidden'])?>

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
        <input type="text" name="date_naissance" value="<?=$eleve['date_naissance']?>" placeholder="<?=$eleve['date_naissance']?>" class="form-control" style="width: 200px;">
    </div>

    <!--MODIFIER-->
    <div class="btn-group">
        <?=$this->Form->button(__('Modifier'), ['class' => 'btn btn-primary-outline'])?>
    </div>
    <?=$this->Form->end()?>
