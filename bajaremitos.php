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
    
    <title>Baja de Remitos</title>
    <?php
    
    //Conexión a BD
    require_once("../conexion.php");

    //Si se presiona en el boton enviar
    if(isset($_POST['enviar']))
    {
        //Asigna a variales los valores de los campos de formularios  
        $num_remito=$_POST['num_remito'];
        
        $consulta = "DELETE FROM detalles_remitos WHERE num_remito = '$num_remito' ";
            
            if (mysqli_query($conn, $consulta ) === TRUE) {
                
                $consulta1 = "DELETE FROM remitos WHERE num_remito = '$num_remito' ";
                
                mysqli_query($conn, $consulta1 );
            }
            
        //Vuelta al listado
        echo "<SCRIPT type='text/javascript' language='JavaScript'> window.location = 'remitos.php'; </SCRIPT>";
           
    } else {
        
        $num_remito=$_GET['num_remito'];
        $cuit=$_GET['cuit'];

        $consulta = "SELECT R.num_remito, R.cuit, R.num_pedido, R.fecha_remito, C.cuit, C.nombre, C.razonsocial FROM remitos R INNER JOIN clientes C WHERE R.num_remito = '$num_remito' AND R.cuit = C.cuit ";

        echo "<SCRIPT type='text/javascript' language='JavaScript'> alert('".$consulta."');</SCRIPT>"; 

        $datos = mysqli_query ($conn, $consulta);
        
        $valores = mysqli_fetch_array($datos);

        //Asigna a campos del formulario los valores del contacto seleccionado
         $cuit=$valores['cuit'];
        $num_remito=$valores['num_remito'];
        $num_pedido=$valores['num_pedido'];
        $fecha_remito=$valores['fecha_remito'];
        $nombre=$valores['nombre'];
        $razonsocial=$valores['razonsocial'];
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
          <a class="nav-link" aria-current="page" href="../clientes/clientes.php">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../localidades/localidades.php">Localidades</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="../pedidos/pedidos.php">
            Pedidos
          </a>
         
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="../pedidos/remitos.php">
            Remitos
          </a>
         
        </li>
        <li class="nav-item">
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
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Baja de Remitos</h1>
                <form action="bajaremitos.php" method="POST" name="agenda-alta" style="background-color: white" class="p-3">
    
                <div class="form-group row">
                    <div class="col">
                        <label for="num_remito">Nº Remito</label>
                        <input value="<?php echo $num_remito?>" type="text" class="form-control" id="num_remito" name="num_remito" placeholder="Numero de Remito" readonly>
                    </div>

                    <div class="col">
                        <label for="num_pedido">Nº Pedido</label>
                        <input value="<?php echo $num_pedido?>" type="text" class="form-control" id="num_pedido" name="num_pedido" placeholder="Numero de Pedido" readonly>
                    </div>

                    <div class="col">
                        <label for="cuit">Nº CUIT</label>
                        <input value="<?php echo $cuit?>" type="text" class="form-control" id="cuit" name="cuit" placeholder="Numero de CUIT" readonly>
                    </div>

                    <div class="col">
                        <label for="nombre">Cliente</label>
                        <input value="<?php echo $nombre?> - <?php echo $razonsocial?>" type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" readonly>
                    </div>

                    <div class="col">
                        <label for="fecha_remito">Fecha de Remito</label>
                        <input value="<?php echo $fecha_remito?>" type="text" class="form-control" id="fecha_remito" name="fecha_remito" placeholder="Fecha de Remito" readonly>
                    </div>
                </div>
                
                <br><hr>
    
                <div class="form-group row">
                    <div class="col offset-5">
                        <input name="enviar" type="submit" id="enviar" value="Borrar Remito" class="btn btn-primary"> 
                        <a href="remitos.php" class="btn btn-md btn-danger" role="button">Volver</a>
                    </div>
                </div>

    
            </form>
            </div>
        </div>
    </div>
    
</body>
</html>