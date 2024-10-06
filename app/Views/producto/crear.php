<?php echo $this->extend('layout/layout.php'); ?>
    <?php echo $this->section('contenido'); ?>
        <!-- Breadcrumbs-->
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
                                    <li><a href="#">Agregar Producto</a></li>
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
                            <div class="card-header">Formulario Productos</div>
                            <div class="card-body card-block">
                                <form action="<?= base_url('/cargarProducto')?>" method="POST" class="" enctype="multipart/form-data">
                                    <div class="card">
                                        <img style="display: block; margin-left: auto; margin-right: auto; width:25%; heigth: 20%;" class="card-img-top" src="images/fodo.png" alt="Card image cap" id="imagen">
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label"></label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="img_producto" name="img_producto" class="form-control-file" accept="image/png">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="titulo_producto" name="titulo_producto" placeholder="Título" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                            <select name="tipo_producto" id="tipo_producto" class="form-control">
                                                <option value="0">Tipo de Producto</option>
                                                <option value="Tazas">Tazas</option>
                                                <option value="Pachones">Pachones</option>
                                                <option value="Paraguas">Paraguas</option>
                                                <option value="Playeras">Playeras</option>
                                                <option value="Gorras">Gorras</option>
                                            </select>
                                        
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                            <select name="ruta_producto" id="ruta_producto" class="form-control">
                                                <option value="0">Ruta de Producto</option>
                                                <option value="/tazas">/tazas</option>
                                                <option value="/pachones">/pachones</option>
                                                <option value="/paraguas">/paraguas</option>
                                                <option value="/playeras">/playeras</option>
                                                <option value="/gorras">/gorras</option>
                                            </select>
                                        
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                            <select name="estatus_producto" id="estatus_producto" class="form-control">
                                                <option value="0">Estatus</option>
                                                <option value="1">Activo</option>
                                                <option value="2">Inactivo</option>
                                            </select>
                                        
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
        <script>
        document.getElementById('img_producto').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagen').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    <?php echo $this->endSection();?>