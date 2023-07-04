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
    
    <title>Alta Pedidos</title>
     <?php
        // Conexión a base de datos
        require_once("../conexion.php");

         if(isset($_POST['enviar']))
        {
        //Asigna a variales los valores de los campos de formularios  
        $num_pedido=$_POST['num_pedido'];
        $cuit=$_POST['cuit'];
        $fecha_pedido=$_POST['fecha_pedido'];
        $estado=$_POST['estado'];

        $consulta = "INSERT INTO pedidos (num_pedido, cuit, fecha_pedido, estado) VALUES ('$num_pedido', '$cuit', '$fecha_pedido', '$estado')";

        $datos = mysqli_query ($conn, $consulta);
         
        //Vuelta al listado
        echo "<SCRIPT type='text/javascript' language='JavaScript'> window.location = 'pedidos.php'; </SCRIPT>";
        
        mysqli_close($conn);
           
    } else {

        $consulta = "SELECT * FROM clientes";

        $result = $conn->query($consulta);

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
          
      
    </div>
  </div>
</nav>
    </header>
    <!--fin menu-->
    <!--contenido de pagina-->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Alta pedidos</h1>
                <form action="altapedidos.php" method="POST" name="agenda-alta" style="background-color: white" class="p-3">
    
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="num_pedido">Nº Pedido</label>
                        <input type="text" class="form-control" id="num_pedido" name="num_pedido" placeholder="Numero de Pedido" title="Ingresa 11 digitos del Numero de CUIT" maxlength="11" required="true">
                    </div>

                    <div class="col-sm-4">
                    <label>Nº CUIT</label>
                        <select class='form-control input-sm' id="cuit" name="cuit">
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
                        <input type="text" class="form-control" id="fecha_pedido" name="fecha_pedido" placeholder="Fecha" maxlength="10" required="true">
                    </div>

                    <div class="col-sm-2">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado " maxlength="30" required="true">
                    </div>
                </div>
                
                <br><hr>
    
                <div class="form-group row">
                    <div class="col offset-5">
                        <input name="enviar" type="submit" id="enviar" value="Añadir Pedido" class="btn btn-primary"> 
                        <a href="pedidos.php" class="btn btn-md btn-danger" role="button">Volver</a>
                    </div>
                </div>

    
            </form>
            </div>
        </div>
    </div>
</body>
</html>