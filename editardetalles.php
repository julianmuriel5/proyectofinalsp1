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
    <title>Editar Detalles</title>
    
    <?php
    
    //Conexión a la BD
    require_once("../conexion.php");

    //Si se presiona en el boton enviar
    if(isset($_POST['enviar']))
    {
        //Asigna a variales los valores de los campos de formularios  
        $num_pedido=$_POST['num_pedido'];
        $cod_producto=$_POST['cod_producto'];
        $cantidad=$_POST['cantidad'];
        $estado_prod=$_POST['estado_prod']; 
        $observacion=$_POST['observacion'];       

        //(SQL) Instruccion SQL modificacion
        $consulta = "UPDATE detalles_pedidos SET cantidad='$cantidad',estado_prod='$estado_prod', observacion='$observacion' WHERE num_pedido = '$num_pedido' AND cod_producto = '$cod_producto'";

        //Para que PHP envíe una consulta SQL hacia el gestor de MySQL (PHP)
        $datos= mysqli_query ($conn, $consulta);
            
        //Vuelta al listado
        echo "<SCRIPT type='text/javascript' language='JavaScript'> window.location = 'detallespedidos.php?num_pedido=". $num_pedido ."'; </SCRIPT>";	
           
    } else if(isset($_POST['volver'])) {

        $num_pedido=$_POST['num_pedido'];
        
        echo "<SCRIPT type='text/javascript' language='JavaScript'> window.location = 'detallespedidos.php?num_pedido=". $num_pedido ."'; </SCRIPT>";

    } else {

        $num_pedido=$_GET['num_pedido'];
        $cod_producto=$_GET['cod_producto'];

        $consulta = "SELECT * FROM detalles_pedidos WHERE num_pedido = '$num_pedido' AND cod_producto = '$cod_producto'";

        $datos = mysqli_query ($conn, $consulta);
        
        $valores = mysqli_fetch_array($datos);

        //Asigna a campos del formulario los valores del contacto seleccionado
        $num_pedido=$valores['num_pedido'];
        $cod_producto=$valores['cod_producto'];
        $cantidad=$valores['cantidad'];
        $estado_prod=$valores['estado_prod'];
        $observacion=$valores['observacion']; 

    }

    mysqli_close($conn);

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
        <li class="nav-item ">
          <a class="nav-link " aria-current="page" href="../productos/productos.php">
            Productos
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
    <di class="container">
        <div class="row">
            <div class="col">
             <form action="editardetalles.php" method="POST" name="pedido-modificacion" style="background-color: white" class="p-3">

            <div class="form-group row">
                <div class="col">
                    <label for="num_pedido">Nº Pedido</label>
                    <input value="<?php echo $num_pedido?>" type="text" class="form-control" id="num_pedido" name="num_pedido" placeholder="Numero de Pedido" required="true" readOnly>
                </div>

                <div class="col">
                    <label for="cod_producto">Codigo Producto</label>
                    <input value="<?php echo $cod_producto?>" type="text" class="form-control" id="cod_producto" name="cod_producto" placeholder="Codigo de Producto" required="true" readOnly>
                </div>
                  
                <div class="col">
                    <label for="cantidad">Cantidad</label>
                    <input value="<?php echo $cantidad?>" type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad" required="true">
                </div>

                <div class="col">
                    <label for="estado_prod">Estado de Productos</label>
                    <input value="<?php echo $estado_prod?>" type="text" class="form-control" id="estado_prod" name="estado_prod" placeholder="Estado de Productos">
                </div>

                <div class="col">
                    <label for="observacion">Observacion</label>
                    <input value="<?php echo $observacion?>" type="text" class="form-control" id="observacion" name="observacion" placeholder="Observacion">
                </div>
            </div>

            <hr>
                <div class="col offset-5">
                    <input name="enviar" type="submit" id="enviar" value="Actualizar" class="btn btn-primary"> 
                    <input name="volver" type="submit" id="volver" value="Volver" class="btn btn-md btn-danger">
                </div>
            </div>

        </form>
            </div>
        </div>
    </di>
</body>
</html>