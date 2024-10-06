<?php echo $this->extend('layout/layout.php'); ?>
<?php echo $this->section('contenido'); ?>
    <!-- Content -->
          <!-- Breadcrumbs-->
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Clientes</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Clientes</a></li>
                                    <li class="active"><a href="<?= base_url('formCliente')?>" class="btn btn-success btn-sm">Crear</a></li>
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
            <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Listado de Clientes </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Cliente</th>
                                                    <th>Producto</th>
                                                    <th>Usuario</th>
                                                    <th>Entrega</th>
                                                    <th>Status</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($cliente as $i) :?>
                                                <tr>
                                                    <td class="serial"><?=$i['id_cliente']?></td>
                                                    <td><span class="name"><?=$i['nombre_cliente']." ".$i['apellido_cliente']?></span> </td>
                                                    <td><span class="product"><?=$i['titulo_producto']?></span> </td>
                                                    <td><span><?=$i['usuario']?></span></td>
                                                    <td><span><?= date('d-m-Y', strtotime($i['entrega'])) ?></span></td>
                                                    <td>
                                                        <?php if($i['status']== 1): ?>
                                                        <span class="badge badge-danger">Solicitado</span>
                                                        <?php endif?>
                                                        <?php if($i['status']== 2): ?>
                                                        <span class="badge badge-pending">Diseño</span>
                                                        <?php endif?>
                                                        <?php if($i['status']== 3): ?>
                                                        <span class="badge badge-complete">Finalizado</span>
                                                        <?php endif?>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-success mt-1">
                                                            <a style="color:white;" href="<?php echo base_url('/editarCliente')."/".$i['id_cliente']?>" title="Editar"><i class="fa fa-edit (alias)"></i></a>
                                                        </span>
                                                        <span class="badge badge-danger mt-1">
                                                            <a style="color:white;"href="<?php echo base_url('/eliminarCliente')."/".$i['id_cliente']?>" title="Eliminar"><i class="fa  fa-trash-o"></i></a>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php endforeach?>
                                                
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
<?php echo $this->endSection();?>