<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://png.pngtree.com/thumb_back/fh260/background/20230720/pngtree-empty-screen-in-a-3d-rendered-cinema-hall-image_3715653.jpg'); /* Ruta de la imagen de fondo */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(4px);
            z-index: -1;
        }

        .content {
            position: relative;
            z-index: 1;
            padding: 50px;
            text-align: center;
            color: white;
        }

        .table-container {
            background-color: #FFF5;
            backdrop-filter: blur(20px);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra para un efecto de profundidad */
        }

        /* Opcional: para la tabla directamente */
        .table {
            background-color: white; /* Fondo blanco */
        }
        
    </style>

</head>
<body>
    <div class="background"></div>
    <div class="container mt-5">
        <div class="table-container">
            <h1 class="mb-4 text-primary font-weight-bold text-center">Lista de Películas</h1>
            <div class="row d-flex justify-content-between align-items-center">
                <p class="ml-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarPelicula"><i class="fas fa-tasks"></i> Agregar Película</button>
                </p>    
                <p class="mr-3"><input class="form-control" id="myInput" type="text" placeholder="Buscar películas..."></p>
            </div>
        </div>
    <br>
    <br>
        <div class="table-container">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Director</th>
                        <th>Año de estreno</th>
                        <th>Genero</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="obtenerPeliculaPorId">
                    <?php foreach ($products as $productos): ?>
                    <tr>
                        <td><?php echo $productos['id']; ?></td>
                        <td><?php echo $productos['titulo']; ?></td>
                        <td><?php echo $productos['director']; ?></td>
                        <td><?php echo $productos['anio_estreno']; ?></td>
                        <td><?php echo $productos['genero']; ?></td>
                        <td>

                        <button type="button" class="btn btn-warning" 
                        data-toggle="modal"
                        data-target="#editarPelicula"
                        data-id="<?php echo $productos['id']; ?>"
                        data-titulo="<?php echo $productos['titulo']; ?>"
                        data-director="<?php echo $productos['director']; ?>"
                        data-anio="<?php echo $productos['anio_estreno']; ?>"
                        data-genero="<?php echo $productos['genero']; ?>">                 
                        <i class="fas fa-edit"></i> 
                            Editar
                        </button>

                        <button type="button" class="btn btn-danger" 
                        data-toggle="modal"
                        data-target="#borrarPelicula"
                        data-id="<?php echo $productos['id']; ?>">                 
                        <i class="fas fa-trash"></i> 
                            Eliminar
                        </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- AGREGAR PELICULA -->
  <div class="modal fade" id="agregarPelicula" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Agregar una Pelicula</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form id="agregarPeliculaForm">
            <div class="form-group">
                <label for="txt_titulo">Nombre de la pelicula</label>
                <input type="text" class="form-control" placeholder="Nombre de la película" id="txt_titulo" name="txt_titulo" required>
            </div>
            <div class="form-group">
                <label for="txt_director">Director:</label>
                <input type="text" class="form-control" placeholder="Director de la película" id="txt_director" name="txt_director" required>
            </div>
            <div class="form-group">
                <label for="txt_anio">Año de Estreno:</label>
                <input type="date" class="form-control" placeholder="Año de estreno de la película" id="txt_anio" name="txt_anio" required>
            </div>
            <div class="form-group">
                <label for="txt_genero">Genero:</label>
                <input type="text" class="form-control" placeholder="Genero de la película" id="txt_genero" name="txt_genero" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>

   <!-- EDITAR PELICULA -->
   <div class="modal fade" id="editarPelicula" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Actualizar datos de la Película</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form id="editarPeliculaForm">
            <div class="form-group">
                <input type="hidden" id="editTituloId" name="id">
                <label for="txt_edittitulo">Nombre de la película</label>
                <input type="text" class="form-control" placeholder="Nombre de la película" id="edittitulo" name="txt_edittitulo" required>
            </div>
            
            <div class="form-group">
                <label for="txt_editdirector">Director:</label>
                <input type="text" class="form-control" placeholder="Director de la película" id="editdirector" name="txt_editdirector" required>
            </div>

            <div class="form-group">
                <label for="txt_editanio">Año de Estreno:</label>
                <input type="date" class="form-control" placeholder="Año de estreno de la película" id="editanio" name="txt_editanio" required>
            </div>

            <div class="form-group">
                <label for="txt_editgenero">Genero:</label>
                <input type="text" class="form-control" placeholder="Genero de la película" id="editgenero" name="txt_editgenero" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
   
    <!-- ELIMINAR PELICULA -->
    <div class="modal fade" id="borrarPelicula" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Producto</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                    
                <!-- Modal body -->
                <form id="borrarPeliculaForm">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="borrarPeliculaId">
                        <p>¿Estas seguro que deseas eliminar el producto?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded',function(){
                $(document).on('show.bs.modal','#editarPelicula',function (event){
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');
                const titulo = button.getAttribute('data-titulo');
                const director = button.getAttribute('data-director');
                const anio_estreno = button.getAttribute('data-anio');
                const genero = button.getAttribute('data-genero');
                document.getElementById('editTituloId').value = id;
                document.getElementById('edittitulo').value = titulo;
                document.getElementById('editdirector').value = director;
                document.getElementById('editanio').value = anio_estreno;
                document.getElementById('editgenero').value = genero;
                });


            //ELIMINAR
            $(document).on('show.bs.modal','#borrarPelicula',function (event){
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            document.getElementById('borrarPeliculaId').value = id;
            });
            
            

            //EDITAR
            document.getElementById('editarPeliculaForm').addEventListener('submit',function(e){
                e.preventDefault();
                const formData = new FormData(this);

                fetch('index.php?action=editar',{
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success){
                        $('#editarPelicula').modal('hide');
                        location.reload();
                    }else{
                        alert("Error al Editar el Producto");
                    }
                });

            });

            //ELIMINAR
            document.getElementById('borrarPeliculaForm').addEventListener('submit',function(e){
                e.preventDefault();
                const formData = new FormData(this);

                fetch('index.php?action=eliminar',{
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success){
                        $('#borrarPelicula').modal('hide');
                        location.reload();
                    }else{
                        alert("Error al Eliminar el Producto");
                    }
                });
            });

            //CREAR
            document.getElementById('agregarPeliculaForm').addEventListener('submit',function(e){
                e.preventDefault();
                const formData = new FormData(this);

                fetch('index.php?action=crear',{
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success){
                        location.reload();
                    }else{
                        alert("Error al agregar la película");
                    }
                });

            });
        });

        //Barra de Busqueda
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#obtenerPeliculaPorId tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>
</html>
