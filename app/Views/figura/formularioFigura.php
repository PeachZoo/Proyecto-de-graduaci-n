<?php echo $this->extend('layout/layout.php'); ?>
    <?php echo $this->section('contenido'); ?>
        <!-- Breadcrumbs-->
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Figuras</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Agregar Figura</a></li>
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
                            <div class="card-header">Formulario Figura</div>
                            <div class="card-body card-block">
                                <form action="<?= base_url('/cargarFigura')?>" method="POST" class="" enctype="multipart/form-data">
                                    <div class="card">
                                        <img style="display: block; margin-left: auto; margin-right: auto; width:25%; heigth: 20%;" class="card-img-top" src="images/fodo.png" alt="Card image cap" id="imagen">
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label"></label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="figura_img" name="figura_img" class="form-control-file" accept="image/png">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="titulo_fig" name="titulo_fig" placeholder="Título" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                            <select name="estatus_fig" id="estatus_fig" class="form-control">
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
        document.getElementById('figura_img').addEventListener('change', function(event) {
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