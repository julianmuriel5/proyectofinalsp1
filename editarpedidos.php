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
    
    <title>Editar Pedidos</title>
    <?php
        // Conexión a base de datos
        require_once("../conexion.php");
         if(isset($_POST['enviar']))
         {
        //Asigna a variables los valores de los campos de formularios  
        $num_pedido=$_POST['num_pedido'];
        $cuit=$_POST['cuit'];
        $fecha_pedido=$_POST['fecha_pedido'];
        $estado=$_POST['estado'];   

        //(SQL) Instruccion SQL modificacion
        $consulta = "UPDATE pedidos SET num_pedido='$num_pedido', cuit='$cuit', fecha_pedido='$fecha_pedido', estado='$estado' WHERE num_pedido = '$num_pedido'";

        //Para que PHP envíe una consulta SQL hacia el gestor de MySQL (PHP)
        $datos= mysqli_query ($conn, $consulta);
            
        //Vuelta al listado
        echo "<SCRIPT type='text/javascript' language='JavaScript'> window.location = 'pedidos.php'; </SCRIPT>";
           
    } else {

        $num_pedido=$_GET['num_pedido'];

        $consulta = "SELECT P.num_pedido, P.cuit, P.fecha_pedido, P.estado, C.cuit, C.razonsocial FROM pedidos P INNER JOIN clientes C WHERE P.num_pedido = '$num_pedido' AND P.cuit = C.cuit";

        $datos = mysqli_query ($conn, $consulta);
        
        $valores = mysqli_fetch_array($datos);

        //Asigna a campos del formulario los valores del contacto seleccionado
        $cuit=$valores['cuit'];
        $razonsocial=$valores['razonsocial'];
        $fecha_pedido=$valores['fecha_pedido'];
        $estado=$valores['estado'];

        $consulta1 = "SELECT * FROM clientes";

        $result = $conn->query($consulta1);

        if ($result->num_rows > 0) {

    }

?>
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
        
        <li class="nav-item dropdown">
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
      
    </div>
  </div>
</nav>
    </header>
    <!--fin menu-->
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="text-center">Editar Pedidos</h1>
            <form action="editarPedidos.php" method="POST" name="agenda-edicion" style="background-color: white" class="p-3">
    
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="num_pedido">Nº Pedido</label>
                    <input value="<?php echo $num_pedido?>" type="text" class="form-control" id="num_pedido" name="num_pedido" placeholder="Numero de Pedido" required="true" readonly>
                </div>
                <div class="col-sm-4">
                <label>Nº CUIT</label>
                    <select class='form-control input-sm' id="cuit" name="cuit" required="true">
                        <option value=""><?php echo $cuit,' - ', $razonsocial ?></option>
                        <?php 
                            while ($row = $result->fetch_assoc()){
                                $output = "<option value='".$row['cuit']."'";
                                if($_POST['cuit'] == $row['cuit']){
                                    $output .= " selected='selected'";
                                }
                                $output .= ">".$row['cuit']." - ".$row["razonsocial"]."</option>";
                                echo $output;
                            }
                        }
                        mysqli_close($conn);
                        ?>    
                    </select>
                </div>
                <div class="col-sm-2">
                    <label for="fecha_pedido">Fecha de Emision</label>
                    <input value="<?php echo $fecha_pedido?>" type="text" class="form-control" id="fecha_pedido" name="fecha_pedido" placeholder="Fecha" maxlength="10" required="true">
                </div>
                <div class="col-sm-2">
                    <label for="txtEstado_Pedido">Estado</label>
                    <input value="<?php echo $estado?>" type="text" class="form-control" id="estado" name="estado" placeholder="Estado Actual" maxlength="30" required="true">
                </div>
            </div>
            
            <br><hr>
        
            <div class="form-group row">
                <div class="col offset-5">
                    <input name="enviar" type="submit" id="enviar" value="Actualizar" class="btn btn-primary"> 
                    <a href="pedidos.php" class="btn btn-md btn-danger" role="button">Volver</a>
                </div>
            </div>
        
        
        </form>

        </div>
    </div>
</div>
    
</body>
</html>