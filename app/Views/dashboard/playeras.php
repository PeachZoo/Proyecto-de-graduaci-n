<?php echo $this->extend('layout/layout.php'); ?>
<?php echo $this->section('contenido'); ?>
    <style>
        .camiseta{
            cursor:pointer;
            position:relative;	
            display:inline-block;
        }
        .contenido{
            position:absolute;
            margin:auto;
            top:150px;
            left:0px;
            right:0;
            width:44%;
        }
        .texto{	 
            text-align:center;
            font-size:2em;
            color:white;
            margin-bottom:15px;
            outline:none;
        }
    </style>
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Personalizar Playera </h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-8" id="htmlToImage">
                                    <div class="camiseta" id="todo">
                                        <div class="contenido">				
                                            <div class="texto" id="texto" contenteditable="true" spellcheck="false" maxlength="30"></div>
                                            <div class="rey"></div>
                                            <img  src="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card-body">
                                        <div class="progress-box progress-1">
                                            <h4 class="por-title">Textos</h4>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                <input type="text" id="ingtexto" name="ingtexto" placeholder="Ingresar Texto..." class="form-control">
                                            </div>
                                            <div class="por-txt">
                                                <button class="btn btn-primary btn-block" id="addTextBtn">Agregar Textos</button>
                                            </div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-1" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title">Imagenes</h4>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                                <select name="ingimagen" id="ingimagen" class="form-control">
                                                    <option value="0">Seleccionar Imagen</option>
                                                    <?php foreach ($figuras as $i) : ?>
                                                    <option value="<?= $i['titulo_figura']?>" ><?= $i['titulo_figura']?></option>
                                                    <?php endforeach?>
                                                    
                                                </select>
                                            </div>
                                            <div class="por-txt"><button class="btn btn-primary btn-block" id="addImagenBtn">Agregar Imagen</button></div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-2" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title">Acciones</h4>
                                            <div class="por-txt"><button class="btn btn-primary btn-block" id="btnImprimir">Imprimir</button></div>
                                            <div class="por-txt"><button class="btn btn-primary btn-block" id="btnGuardar">Guardar</button></div>
                                           <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-4" role="progressbar" style="width: 100%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div> <!-- /.card-body -->
                                </div>
                            </div> <!-- /.row -->
                            <div class="card-body"></div>
                        </div>
                    </div><!-- /# column -->
                </div>
        </div>
    </div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
   <script>
         document.getElementById('addTextBtn').addEventListener('click', function() {
            // Obtener el texto ingresado
            var texto = document.getElementById('ingtexto').value;
            // Mostrar el texto en el div con la clase 'texto'
            var textoDiv = document.querySelector('.texto');
            textoDiv.textContent = texto;
        });

        document.getElementById('addImagenBtn').addEventListener('click', function() {
            // Obtener la imagen seleccionada
            var figura = document.getElementById('ingimagen').value;
            var imagen= 'images/' + figura + '.png';
            // Crear un nuevo elemento de imagen
            var imgElement = document.createElement('img');
            // Establecer el atributo src del elemento de imagen
            imgElement.src = imagen;
            // Limpiar el contenido previo del div y agregar la nueva imagen
            var imagenDiv = document.querySelector('.rey');
            imagenDiv.innerHTML = ''; // Limpiar contenido previo
            imagenDiv.appendChild(imgElement); // Agregar la nueva imagen
        });

       

           
            var camisetas = <?php echo json_encode($camisetas); ?>;
            var reyes = <?php echo json_encode($figuras); ?>;
            console.log(camisetas);
            console.log(reyes);

            // Llenar un array con los valores de img_producto
            var imgCamisetas = camisetas.map(camiseta => camiseta.img_producto);
            var imgReyes = reyes.map(rey => rey.img_producto);

            console.log(imgCamisetas);
            console.log(imgReyes);

            window.onload = inicio;
            var camisetaActual = 0;
            var reyActual = Math.floor(Math.random() * reyes.length);
            var size = 2;

            function inicio() {
                // Eventos y acciones iniciales
                window.onkeydown = teclado;
                document.querySelector(".camiseta").insertAdjacentHTML("beforeend", `<img id="dibujo" src="${imgCamisetas[camisetaActual]}">`);
                document.querySelector("#dibujo").onclick = cambiarCamiseta;
                document.querySelector("#btnImprimir").onclick= imprimir;
                document.querySelector("#btnGuardar").onclick= guardar;
            }

           function teclado(e) 
           {
                let longitud = document.querySelector(".texto").innerHTML.length;
                if (longitud > 15) {
                    e.preventDefault();
                } else {
                    let codigo = e.key;
                    if (codigo == "+") {
                        if (size < 3) {
                            size += .1;
                        }
                        e.preventDefault();
                    }

                    if (codigo == "-") {
                        if (size > 1) {
                            size -= .1;
                        }
                        e.preventDefault();
                    }
                    document.querySelector(".texto").style.fontSize = size + "em";
                }
            }
            function cambiarCamiseta() {
                camisetaActual = (camisetaActual + 1) % imgCamisetas.length;
                document.querySelector("#dibujo").src = `${imgCamisetas[camisetaActual]}`;
            }

            function cambiarRey() {
                reyActual = (reyActual + 1) % imgReyes.length;
                document.querySelector("#rey").src = `${imgReyes[reyActual]}`;
            }

           function guardar(){
                var container = document.getElementById("htmlToImage");
                html2canvas(container, { allowTaint: true }).then(function(canvas) {
                    var link = document.createElement("a");
                    document.body.appendChild(link);
                    link.download = "html_image.png";
                    link.href = canvas.toDataURL();
                    link.target = "_blank";
                    link.click();
                });
            }
            function imprimir() {
                var container = document.getElementById("htmlToImage");
                html2canvas(container, { allowTaint: true }).then(function(canvas) {
                    var imgData = canvas.toDataURL("image/png"); // Convertir canvas a base64
                    var pdf = new jsPDF('p', 'mm', 'a4'); // Crear un nuevo documento PDF
                    var imgWidth = 210; // Ancho de la imagen en el PDF (A4 width in mm)
                    var pageHeight = 295; // Altura de la página en el PDF (A4 height in mm)
                    var imgHeight = canvas.height * imgWidth / canvas.width;
                    var heightLeft = imgHeight;
                    var position = 0;

                    if (heightLeft <= pageHeight) {
                        pdf.addImage(imgData, 'PNG', 0, 0, imgWidth, imgHeight);
                    } else {
                        while (heightLeft > 0) {
                            pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                            heightLeft -= pageHeight;
                            if (heightLeft > 0) {
                                pdf.addPage();
                                position = heightLeft - imgHeight;
                            }
                        }
                    }

                    var pdfOutput = pdf.output('blob');
                    var url = URL.createObjectURL(pdfOutput);
                    var printWindow = window.open(url);
                    printWindow.onload = function() {
                        printWindow.print();
                    };
                });
            }


        



           

    </script>

    <?php echo $this->endSection();?>