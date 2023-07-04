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
    
    <title>Pedidos del cliente</title>
    <?php
    
    //Conexión al servidor y la BD mediante un archivo externo que proporciona la cadena de conexión
    require_once("../conexion.php");

    //Si se presiona en el boton enviar
    if(isset($_GET['cuit']))
    {
        
        $cuit=$_GET['cuit'];

        $consulta = "SELECT C.cuit, C.nombre, C.razonsocial, C.email, C.telefono, C.direccion, C.observaciones,C.provincia,C.cp, L.cp, L.localidades FROM clientes C INNER JOIN localidades L WHERE C.cuit = '$cuit' AND C.cp = L.cp";

        echo "<SCRIPT type='text/javascript' language='JavaScript'> alert('".$consulta."');</SCRIPT>"; 

        $datos = mysqli_query ($conn, $consulta);
        
        $valores = mysqli_fetch_array($datos);

        //Asigna a campos del formulario los valores del contacto seleccionado
        $cuit=$valores['cuit'];
        $nombre=$valores['nombre'];
        $razonsocial=$valores['razonsocial'];
        $email=$valores['email'];
        $telefono=$valores['telefono'];
        $direccion=$valores['direccion'];
        $observaciones=$valores['observaciones']; 
        $provincia=$valores['provincia']; 
        $cp=$valores['cp'];
        $localidades=$valores['localidades'];    

    }

?>
</head>
<body>
    <header>
      <nav class="navbar navbar-expand-lg bg-dark navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">SISTEMA TECNOCUT</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
      
            </div>
        </nav>
    </header>
    <!--contenido pricipal-->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Pedidos del cliente</h1>
        <form action="pedidosdelcliente.php" method="POST" name="pedido-modificacion" style="background-color: white" class="p-3">

            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="cuit">Nº CUIT</label>
                    <input value="<?php echo $cuit?>" type="text" class="form-control" id="cuit" name="cuit" placeholder="Numero de CUIT" required="true" readOnly>
                </div>
                  
                <div class="col-sm-3">
                    <label for="nombre">Nombre</label>
                    <input value="<?php echo $nombre?>" type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required="true" readOnly>
                </div>

                <div class="col-sm-3">
                    <label for="razonsocial">Razon Social</label>
                    <input value="<?php echo $razonsocial?>" type="text" class="form-control" id="razonsocial" name="razonsocial" placeholder="Apellido" required="true" readOnly>
                </div>

                <div class="col-sm-3">
                    <label for="email">Email</label>
                    <input value="<?php echo $email?>" type="email" class="form-control" id="email" name="email" placeholder="Email" required="true" readOnly>
                </div>
            </div>

            <div class="form-group row">
                <div class="col">
                    <label for="telefono">Telefono</label>
                    <input value="<?php echo $telefono?>" type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required="true" readOnly>
                </div>

                <div class="col">
                    <label for="direccion">Direccion</label>
                    <input value="<?php echo $direccion?>" type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" required="true" readOnly>
                </div>
                <div class="col">
                    <label for="observaciones">Observaciones</label>
                    <input value="<?php echo $observaciones?>" type="text" class="form-control" id="observaciones" name="observaciones" placeholder="Observaciones" required="true" readOnly>
                </div>
                <div class="col">
                    <label for="provincia">Provincia</label>
                    <input value="<?php echo $provincia?>" type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" required="true" readOnly>
                </div>

                <div class="col">
                    <label for="cp">Localidad</label>
                    <input value="<?php echo $cp," - ",$localidades?>" type="text" class="form-control" id="txtCod_Postal" name="txtCod_Postal" placeholder="Codigo Postal" required="true" readOnly>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col offset-5">
                    <a href="../clientes/clientes.php" class="btn btn-md btn-danger" role="button">Volver</a>
                </div>
            </div>

        </form>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="background-color: white">

                    <?php
                        // Solicitamos al gestor de MySQL que entregue aquellos datos que queremos mostrar en nuestras páginas. (SQL)
                        $consulta1 = "SELECT P.num_pedido, P.cuit, P.fecha_pedido, P.estado FROM pedidos P WHERE P.cuit = '$cuit' ";
                        $result = $conn->query($consulta1);  // Acá realmente se hace la consulta, result es un conjunto de filas
                        // Si la cantidad de filas es mayor que 0 muestra
                        if ($result->num_rows > 0) {
                    ?>
                    
                    <table class="table">
                        <thead>
                            <tr>
                            <th>Nº Pedido</th>
                            <th>Fecha de Emision</th>
                            <th>Estado del Pedido</th>
                            <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Datos de salida de cada fila
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                        echo "<td>" . $row["num_pedido"] . "</td>";
                                        echo "<td>" . $row["fecha_pedido"] . "</td>";
                                        echo "<td>" . $row["estado"] . "</td>";
                                        echo "<td><a class='btn btn-primary' href='detallesremitos.php?num_pedido=". $row["num_pedido"]."'>Remito</a>";
                                        echo "&nbsp;";
                                        echo "&nbsp;";
                                        echo "&nbsp;";
                                        echo "<a class='btn btn-secondary' href='detallespedidos.php?num_pedido=". $row["num_pedido"]."'>Detalle</a></td>";
                                    echo "</tr>";
                                    }
                                }else {
                                        echo "No se encontro ningun detalle";
                                    }
                                mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
                    <hr>
                </div>
            </div>
        </div>
    </div>
                                </div>
            </div>
        </div>
    </div>
</body>
</html>