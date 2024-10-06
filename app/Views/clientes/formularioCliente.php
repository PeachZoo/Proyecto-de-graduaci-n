<?php echo $this->extend('layout/layout.php'); ?>
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
                                    <li><a href="#">Agregar Cliente</a></li>
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
                                <form action="<?= base_url('/cargarCliente')?>" method="POST" class="" enctype="multipart/form-data">
                                
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="nombre" name="nombre" placeholder="Nombres" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="apellido" name="apellido" placeholder="Apellidos" class="form-control">
                                        </div>
                                    </div>    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="telefono" name="telefono" placeholder="Telefono" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="email" name="email" placeholder="Email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="usuario" name="usuario" value="<?php echo session('email');?>" readonly="true" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="texto" name="texto" placeholder="Texto" class="form-control">
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="numero" name="numero" placeholder="Número" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                            <select name="producto" id="producto" class="form-control">
                                                <option value="0" selected="" disabled="">Productos</option>
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
                                                   <option value="0" selected="" disabled="">Figura</option>
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
                                                <option value="0">Estatus</option>
                                                <option value="1">Solicitado</option>
                                                <option value="2">En Diseño</option>
                                                <option value="3">Finalizado</option>
                                            </select>
                                        
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="date" id="entrega" name="entrega" placeholder="Fecha de Entrega" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm">Guardar</button></div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
      
    <?php echo $this->endSection();?>