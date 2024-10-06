<?php echo $this->extend('layout/layout.php'); ?>
<?php echo $this->section('contenido'); ?>
    <!-- Content -->
          <!-- Breadcrumbs-->
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
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Productos</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Productos</a></li>
                                    <li class="active"><a href="<?= base_url('formProducto')?>" class="btn btn-success btn-sm">Crear</a></li>
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
                    <?php foreach ($figura as $i) :?>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                <strong class="card-title"><?=$i['tipo_producto']?></strong>
                                </div>
                                <img class="card-img-top" src="<?= $i['img_producto']?>" alt="Card image cap">
                                <div class="card-body">
                                <h4 class="card-title mb-3"><?= $i['titulo_producto']?></h4>
                                <a href="<?php echo base_url($i['ruta_producto']); ?>" class="btn btn-success btn-block">Personalizar</a>
                                </div>
                            </div>
                         </div>

                    <?php endforeach; ?>
                </div><!-- .row -->
            </div><!-- .animated -->
        </div><!-- .content -->
<?php echo $this->endSection();?>