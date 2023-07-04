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
    
    <title>Document</title>
    <?php
    
    //Conexión a  la BD 
    require_once("../conexion.php");
    
    // Desactiva los informes de Errores
    error_reporting(0);

    //Si se presiona en el boton enviar
    if(isset($_GET['num_remito'])) {

        $num_remito=$_GET['num_remito'];

        $consulta = "SELECT R.num_remito, R.cuit, R.num_pedido, R.fecha_remito, C.cuit, C.nombre, C.razonsocial FROM remitos R INNER JOIN clientes C WHERE R.num_remito = '$num_remito' AND R.cuit = C.cuit ";

        $datos = mysqli_query ($conn, $consulta);
        
        $valores = mysqli_fetch_array($datos);

        //Asigna a campos del formulario los valores del contacto seleccionado
        $num_remito=$valores['num_remito'];
        $cuit=$valores['cuit'];
        $num_pedido=$valores['num_pedido'];
        $razonsocial=$valores['razonsocial'];
        $fecha_remito=$valores['fecha_remito'];

    } else if(isset($_GET['num_pedido'])) {

        $num_pedido=$_GET['num_pedido'];

        $consulta = "SELECT R.num_remito, R.cuit, R.num_pedido, R.fecha_remito, C.cuit, C.nombre, C.razonsocial FROM remitos R INNER JOIN clientes C WHERE R.num_pedido = '$num_pedido' AND R.cuit = C.cuit ";

        $datos = mysqli_query ($conn, $consulta);
        
        $valores = mysqli_fetch_array($datos);

        //Asigna a campos del formulario los valores del contacto seleccionado
        $num_remito=$valores['num_remito'];
        $cuit=$valores['cuit'];
        $Nro_Pedido=$valores['num_pedido'];
        $razonsocial=$valores['razonsocial'];
        $fecha_remito=$valores['fecha_remito'];

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
                <h1>Detalle de Remito</h1>
            <form action="detallesremitos.php" method="POST" name="pedido-modificacion" style="background-color: white" class="p-3">

                <div class="form-group row">
                    <div class="col">
                        <label for="num_remito">Nº Remito</label>
                        <input value="<?php echo $num_remito?>" type="text" class="form-control" id="num_remito" name="num_remito" placeholder="Numero de Pedido" required="true" readOnly>
                    </div>

                    <div class="col">
                        <label for="num_pedido">Nº Pedido</label>
                        <input value="<?php echo $num_pedido?>" type="text" class="form-control" id="num_pedido" name="num_pedido" placeholder="Numero de Pedido" required="true" readOnly>
                    </div>

                    <div class="col">
                        <label for="cuit">Nº CUIT - Cliente</label>
                        <input value="<?php echo $cuit?> - <?php echo $razonsocial?>" type="text" class="form-control" id="cuit" name="cuit" placeholder="CUIT" required="true" readOnly>
                    </div>
                  
                    <div class="col">
                        <label for="fecha_remito">Fecha de Remito</label>
                        <input value="<?php echo $fecha_remito?>" type="text" class="form-control" id="fecha_remito" name="fecha_remito" placeholder="Fecha de Pedido" required="true" readOnly>
                    </div>
                

                    <hr>
                    <div class="col-12 offset-5">
                        <a href="detallespedidos.php?num_pedido=<?php echo $num_pedido?>" class="btn btn-primary" role="button">Ver Pedido</a> 
                        <a href="remitos.php" class="btn btn-md btn-dark" role="button">Volver</a>
                    </div>
              
</div>
                </form>
                <div class="row">
                <div class="col-md-12">

                    <?php
                        // Solicitamos  que entregue aquellos datos que queremos mostrar en nuestras páginas. (SQL)
                        $consulta1 = "SELECT D.num_remito, D.cod_producto, D.cantidad, P.cod_producto, P.descripcion FROM detalles_remitos D INNER JOIN productos P WHERE D.num_remito = '$num_remito' AND D.cod_producto = P.cod_producto ";
                        $result = $conn->query($consulta1);  // Acá realmente se hace la consulta, result es un conjunto de filas
                        // Si la cantidad de filas es mayor que 0 muestra
                        if ($result->num_rows > 0) {
                    ?>
                    
                    <table class="table">
                        <thead>
                            <tr>
                            <th>Codigo de Producto</th>
                            <th>Descripcion</th>
                            <th>Cantidad Entregada</th>
                            <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Datos de salida de cada fila
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                        echo "<td>" . $row["cod_producto"] . "</td>";
                                        echo "<td>" . $row["descripcion"] . "</td>";
                                        echo "<td>" . $row["cantidad"] . "</td>";
                                        echo "<td><a class='btn btn-danger' href='detallesremitosbajaprod.php?num_remito=". $row["num_remito"]."&cod_producto=". $row["cod_producto"]."&descripcion=". $row["descripcion"]."'>Borrar</a></td>";
                                    echo "</tr>";
                                    }
                                } else {
                                        echo "<br>";
                                        echo "<h3>No se encontro ningun detalle o Remito, Porfavor Genere uno desde el pedido.</h3>";
                                    }
                                mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>