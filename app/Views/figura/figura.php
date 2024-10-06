<?php echo $this->extend('layout/layout.php'); ?>
<?php echo $this->section('contenido'); ?>
    <style>
        .card-img-top {
            width: 330px;
            height: 346px;
            object-fit: cover; /* Ajusta la imagen para que cubra el área sin distorsionarse */
            display: block;
            margin-left: auto;
            margin-right: auto;

        }
    </style>
    <!-- Content -->
          <!-- Breadcrumbs-->
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Figura</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Figura</a></li>
                                    <li class="active"><a href="<?= base_url('formFigura')?>" class="btn btn-success btn-sm">Crear</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.breadcrumbs-->
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <?php foreach ($figura as $i) : ?>
                        <div class="col-md-4">
                            <div class="card">
                                <img style="width:230px; heigth: 346px;" class="card-img-top" src="<?= $i['img_figura']?>" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title mb-3"><?= $i['titulo_figura']?></h4>
                                    <a href="<?php echo base_url('/tazas'); ?>" class="btn btn-success btn-block">Personalizar</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div><!-- .row -->
            </div><!-- .animated -->
        </div><!-- .content -->
        
<?php echo $this->endSection();?>