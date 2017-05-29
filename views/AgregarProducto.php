<?php
	include_once("../controllers/ProductsController.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pizza</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- my css file -->
    <link rel="stylesheet" href="./../assets/css/style.css">
  </head>
  <body>
    <!-- header -->
    <header>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="../index.php">Inicio</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="AgregarProducto.php">Agregar Producto</a></li>
							<li><a href="AdministrarProductos.php">Administrar Productos</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>
    <div class="video-container">
      <video class="video" src="./../public/video.mp4" autoplay loop="">
      </video>
    </div>
    <!-- FORMULARIO PARA INGRESAR PRODUCTOS -->
    <div class="video-container vertical-center">
      <div class="front absolute card col-xs-12">
        <h2 class ="white-text">Registrar nuevo producto</h2>
        <input type="text" class="form-control" id="nombre" value="" placeholder="Escribe el nombre del producto "><br>
        <input type="number" class="form-control" id="precio" value="" placeholder="Escribe el precio del producto "><br>
        <select id="categoria" class="form-control" name="">
					<option value="1">Pizzas</option>
					<option value="2">Pastas</option>
					<option value="3">Ensaladas</option>
        	<option value="4">Bebidas</option>
        </select><br>
				<textarea class="form-control" id="descripcion"></textarea>
				<br>

        <button type="button" class="form-control" id="guardar">Guardar producto</button>
      </div>
    </div>

    <!-- container -->
    <script src="./../assets/js/script.js" charset="utf-8"></script>
    <script type="text/javascript">

    let guardar = document.querySelector("#guardar");
    guardar.addEventListener('click',function(){
        let nombre = document.querySelector("#nombre");
        let precio = document.querySelector("#precio");
				let categoria = document.querySelector("#categoria");
        let descripcion = document.querySelector("#descripcion");


        let producto = new Producto(0,nombre.value,precio.value,categoria.value,descripcion.value);
				let listaproductos = new Array();
				listaproductos.push(producto);
				let arregloJSON = JSON.stringify(listaproductos);
					$.ajax({
					  method: "POST",
					  url: "../controllers/ProductsController.php",
					  data: { productos: arregloJSON, funcion: "insertarProductos" }
					})
					.done(function() {
					   console.log( "Datos guardados ");
					 });
      });
    </script>
  </body>
</html>
