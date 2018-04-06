<?php
/**
 * Custom Template Layout
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset('utf-8') ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            <?= $cakeDescription ?>:
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>

        <?= $this->Html->css('bs-inverse.min.css') ?>
        <?= $this->Html->css('bs-select.min.css') ?>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300" rel="stylesheet">
        <?= $this->Html->css('style.css') ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <!--NAVBAR-->
                <div class="col-md-3 sidebar">
                    <nav class="sidebar-nav">
                        <div class="sidebar-header">
                            <a class="sidebar-brand img-responsive" href="#">
                                <span class="icon iconav-brand-icon"><?= $this->Html->image("cake.logo.svg", ["alt" => "Initiation à cake PHP"]) ?></span>
                                <button id="toggler" class="nav-toggler nav-toggler-md sidebar-toggler" type="button">
                                    <span class="sr-only">Toggle nav</span>
                                </button>
                            </a>
                        </div>
                        <!--MENU LATERAL-->
                        <div class="collapse nav-toggleable-md" id="nav-toggleable-md">
                            <?= $this->element('menu') ?>
                        </div>
                    </nav>
                </div>

                <div class="col-md-9 content">
                    <div class="flextable margin-top-20 from_to">

                        <!--MENU CENTRAL-->
                        <ul class="nav nav-pills margin-bottom-20">
                            <!--Requests-->
                            <li class="active">
                                <a href="<?=$this->Url->build(['controller'=>'Pages','action'=>'display'])?>" title="Requests" data-toggle="tooltip" data-placement="right">
                                    <span class="icon icon-text-document"></span>
                                </a>
                            </li>
                            <!--Proposals-->
                            <li>
                                <a href="<?=$this->Url->build(['controller'=>'Pages','action'=>'display'])?>" title="Proposals" data-toggle="tooltip" data-placement="right">
                                    <span class="icon icon icon-folder-images"></span>
                                </a>
                            </li>
                            <!--Settings-->
                            <li>
                                <a href="<?=$this->Url->build(['controller'=>'Pages','action'=>'display'])?>" title="Settings" data-toggle="tooltip" data-placement="right">
                                    <span class="icon icon-tools"></span>

                                </a>
                            </li>
                        </ul>

                        <!--SEARCH BAR-->
                        <div class="row">
                            <!--Search Request-->
                            <div class="col-xs-12 col-md-4">
                                <form class="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Filter">
                                        <span class="input-group-addon"><span class="icon icon-magnifying-glass"></span></span>
                                    </div>
                                    <span class="warning">1 request found out of 4</span>
                                </form>
                            </div>
                        </div>

                    </div>

                    <!--CONTENT-->
                    <?= $this->fetch('content') ?>
                    </div>
                    <!--End content-->

                    <!--FOOTER-->
                    <footer>
                        <div class="hr-divider">
                            <h3 class="hr-divider-content hr-divider-heading">mentions légales</h3>
                        </div>
                        <ul class="nav nav-bordered">
                            <li>
                                <a href="#">@Copyright 2017</a>
                            </li>
                            <li>
                                <a href="#">Qui sommes nous ?</a>
                            </li>
                            <li>
                                <a href="#">Sitemap</a>
                            </li>
                            <li>
                                <a href="#">Politique de confidentialité</a>
                            </li>
                            <li>
                                <a href="#">Conditions d'utilisation</a>
                            </li>
                            <li>
                                <a href="#">Contact</a>
                            </li>
                        </ul>
                    </footer>

                </div>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <?= $this->Html->script('jquery.min.js') ?>
        <?= $this->Html->script('bs.min.js') ?>
        <?= $this->Html->script('tablesorter.min.js') ?>
        <?= $this->Html->script('bs-select.min.js') ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
        <?= $this->Html->script('home.js') ?>
    </body>
</html>
