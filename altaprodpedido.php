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
    
    <title>Agregar Productos al Pedido</title>
    <?php
    
    //Conexión al servidor y la BD mediante un archivo externo que proporciona la cadena de conexión
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

        $consulta = "INSERT INTO detalles_pedidos (num_pedido, cod_producto, cantidad, estado_prod, observacion) VALUES ('$num_pedido', '$cod_producto', '$cantidad', '$estado_prod', '$observacion')";

        $datos = mysqli_query ($conn, $consulta);
         
        //Vuelta al listado
        echo "<SCRIPT type='text/javascript' language='JavaScript'> window.location = 'detallespedidos.php?num_pedido=". $num_pedido ."'; </SCRIPT>";
        
        mysqli_close($conn);
           
    } else if(isset($_POST['volver'])) {

        $num_pedido=$_POST['num_pedido'];
        
        echo "<SCRIPT type='text/javascript' language='JavaScript'> window.location = 'detallespedidos.php?num_pedido=". $num_pedido ."'; </SCRIPT>";

    } else {

        $num_pedido=$_GET['num_pedido'];

        $consulta1 = "SELECT * FROM productos";

        $result = $conn->query($consulta1);

        if ($result->num_rows > 0) {

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
        
        <li class="nav-item dropdown">
          <a class="nav-link " aria-current="page" href="../pedidos/pedidos.php">
            Pedidos
          </a>
         
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
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
    <h1>Alta producto pedidos</h1>
     <div class="container">
            
            <div class="row justify-content-md-center">
                <div class="col-12">
    
            <form action="altaprodpedido.php" method="POST" name="agenda-alta" style="background-color: white" class="p-3">
    
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="num_pedido">Nº Pedido</label>
                        <input value="<?php echo $num_pedido?>" type="text" class="form-control" id="num_pedido" name="num_pedido" placeholder="Numero de Pedido" readonly>
                    </div>

                    <div class="col-sm-3">
                    <label>Producto</label>
                        <select class='form-control input-sm' id="cod_producto" name="cod_producto">
                            <?php 
                                while ($row = $result->fetch_assoc()){
                                    $output = "<option value='".$row['cod_producto']."'";
                                    if($_POST['cod_producto'] == $row['cod_producto']){
                                        $output .= " selected='selected'";
                                    }
                                    $output .= ">".$row["descripcion"]."</option>";
                                    echo $output;
                                }
                            }
                            mysqli_close($conn);
                            ?>    
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <label for="cantidad">Cantidad </label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad" maxlength="2">
                    </div>

                    <div class="col-sm-2">
                        <label for="estado_prod">Estado de Producto</label>
                        <input type="text" class="form-control" id="estado_prod" name="txtEstado_Prod" placeholder="Estado" maxlength="30">
                    </div>

                    <div class="col-sm-2">
                        <label for="observacion">Observacion</label>
                        <input type="text" class="form-control" id="observacion" name="observacion" placeholder="Observacion" maxlength="30">
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
    </div>
</div>
    
</body>
</html>