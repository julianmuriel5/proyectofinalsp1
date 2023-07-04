<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!--bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <title>Agregar Detalles de Remito</title>
    <?php
    
    //Conexión a la BD
    require_once("../conexion.php");

    //Si se presiona en el boton enviar
    if(isset($_POST['enviar']))
    {
        //Asigna a variales los valores de los campos de formularios  
        $num_remito=$_POST['num_remito'];
        $cod_producto=$_POST['cod_producto'];
        $cantidad=$_POST['cantidad'];

        $consulta = "INSERT INTO detalles_remitos (num_remito, cod_producto, cantidad) VALUES ('$num_remito', '$cod_producto', '$cantidad')";

        $datos = mysqli_query ($conn, $consulta);
         
        //Vuelve al listado
        echo "<SCRIPT type='text/javascript' language='JavaScript'> window.location = 'detallesremitos.php?num_remito=". $num_remito ."'; </SCRIPT>";
           
    } else if(isset($_POST['volver'])) {

        $num_pedido=$_POST['num_pedido'];
        
        echo "<SCRIPT type='text/javascript' language='JavaScript'> window.location = 'detallespedidos.php?num_pedido=". $num_pedido ."'; </SCRIPT>";

    } else {

        $num_pedido=$_GET['num_pedido'];
        $cod_producto=$_GET['cod_producto'];
        $descripcion=$_GET['descripcion'];
        $cantidad=$_GET['cantidad'];

        $consulta = "SELECT * FROM remitos WHERE num_pedido = '$num_pedido'";

        $datos = mysqli_query ($conn, $consulta);
        
        $valores = mysqli_fetch_array($datos);

        //Asigna a campos del formulario los valores del contacto seleccionado
        $num_remito=$valores['num_remito'];
         $cuit=$valores['cuit'];

        $consulta1 = "SELECT * FROM productos";

    }

    ?>
</head>
<body>
     <!--menu-->
   <header>
      <nav class="navbar navbar-expand-lg bg-dark navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">SISTEMA TECNOCUT</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/../proyecto3/index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./clientes.php">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../localidades/localidades.php">Localidades</a>
        </li>
        
        <li class="nav-item ">
          <a class="nav-link " aria-current="page" href="../pedidos/pedidos.php">
            Pedidos
          </a>
         
        </li>
         <li class="nav-item ">
          <a class="nav-link " aria-current="page" href="../pedidos/Remitos.php">
            Remitos
          </a>
         
        </li>
        
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-primary me-2" type="submit">Buscar</button>
        <a href="../salir.php" class="btn btn-danger">Salir</a>
      </form>
    </div>
  </div>
</nav>
    </header>
    <!--fin menu-->

    <!--comienza contenido principal-->
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="altaprodremito.php" method="POST" name="agenda-alta" style="background-color: white" class="p-3">

            <input id="num_pedido" name="num_pedido" type="hidden" value="<?php echo $num_pedido?>">
    
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="num_remito">Nº Remito</label>
                        <input value="<?php echo $num_remito?>" type="text" class="form-control" id="num_remito" name="num_remito" placeholder="Numero de Remito" readonly>
                    </div>

                    <div class="col-sm-3">
                        <label for="cod_producto">Codigo de Producto</label>
                        <input value="<?php echo $cod_producto?>" type="text" class="form-control" id="cod_producto" name="cod_producto" placeholder="Codigo de Producto" readonly>
                    </div>

                    <div class="col-sm-3">
                        <label for="descripcion">Producto</label>
                        <input value="<?php echo $descripcion?>" type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Producto" readonly>
                    </div>

                    <div class="col-sm-2">
                        <label for="cantidad">Cantidad</label>
                        <input value="<?php echo $cantidad?>" type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad" >
                    </div>
                </div>
                
                <br><hr>
    
                <div class="col offset-5">
                    <input name="enviar" type="submit" id="enviar" value="Añadir Linea" class="btn btn-primary">
                    <input name="volver" type="submit" id="volver" value="Volver" class="btn btn-md btn-danger">
                </div>

    
            </form>
            </div>
        </div>
    </div>
    
</body>
</html>