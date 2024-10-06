<?php echo $this->extend('layout/layoutwo.php'); ?>
    <?php echo $this->section('contenido'); ?>
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
                                    <li><a href="#">Editar Cliente</a></li>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">Formulario Clientes</div>

                            <div class="card-body card-block">
                                <form action="<?= base_url('/guardarCliente')?>" method="POST" class="" enctype="multipart/form-data">
                                <?php foreach($cliente as $item) {?> 
                                    <input type="hidden" name="id" id="id" value="<?= $item['id_cliente']?>" >
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="nombre" name="nombre" value="<?= $item['nombre_cliente']?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="apellido" name="apellido"  value="<?= $item['apellido_cliente']?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="telefono" name="telefono" value="<?= $item['telefono']?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="email" name="email" value="<?= $item['email']?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="usuario" name="usuario" value="<?= $item['usuario']?>" readonly="true" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="texto" name="texto" value="<?= $item['texto']?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="numero" name="numero" value="<?= $item['numero']?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                            <select name="producto" id="producto" class="form-control">
                                                <option value="<?= $item['id_producto']?>"><?= $item['titulo_producto']?></option>    
                                                <?php foreach ($producto as $i) : ?>
                                                    <option value="<?php echo $i['id_producto']?>"><?php echo $i['titulo_producto']?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                            <select name="figura" id="figura" class="form-control">
                                                <option value="<?= $item['id_figura']?>"><?= $item['titulo_figura']?></option>    
                                                <?php foreach ($figura as $i) : ?>
                                                    <option value="<?php echo $i['id_figura']?>"><?php echo $i['titulo_figura']?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                            <select name="estatus" id="estatus" class="form-control">
                                                <?php if($item['status']==1){?>
                                                    <option value="1" selected="" disabled="">Solicitado</option>
                                                <?php }?>
                                                <?php if($item['status']==2){?>
                                                    <option value="2" selected="" disabled="">En Diseño</option>
                                                <?php }?>
                                                <?php if($item['status']==3){?>
                                                    <option value="3" selected="" disabled="">Finalizadoado</option>
                                                <?php }?>
                                                <option value="1">Solicitado</option>
                                                <option value="2">En Diseño</option>
                                                <option value="3">Finalizado</option>
                                               
                                            </select>
                                        
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="date" id="entrega" name="entrega" value="<?php echo $item['entrega']?>" class="form-control">
                                        </div>
                                    </div>
                                <?php }?>
                                    <div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm">Guardar</button></div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
      
    <?php echo $this->endSection();?>