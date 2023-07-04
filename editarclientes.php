<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
    <!--bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <scrip src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <title>Editar Clientes</title>
    <?php
        // Conexión al servidor y la BD mediante un archivo externo que proporciona la cadena de conexión
        require_once("../conexion.php");
        //$clientes = "SELECT * FROM clientes";

        //accion cd hago click en enviar
        if(isset($_POST['enviar']))
        {
            //asigno a las variables los valores de cada campo del formulario
            $cuit=$_POST['cuit'];
            $nombre=$_POST['nombre'];
            $razonsocial=$_POST['razonsocial'];
            $email=$_POST['email'];
            $telefono=$_POST['telefono'];
            $direccion=$_POST['direccion'];
            $observaciones=$_POST['observaciones'];
            $provincia=$_POST['provincia'];
            $cp=$_POST['cp'];
            //consulta para la modificacion de los datos del cliente
                 $consulta = "UPDATE clientes SET nombre='$nombre', razonsocial='$razonsocial', email='$email', telefono='$telefono', direccion='$direccion', observaciones='$observaciones', provincia='$provincia', cp='$cp' WHERE cuit='$cuit'";                       
             
                //vuelvo al listado
            $datos = mysqli_query ($conn, $consulta);
                    echo "<SCRIPT type='text/javascript' language='JavaScript'> window.location = 'clientes.php'; </SCRIPT>";
        
        } else {
            $cuit=$_GET['cuit'];

            $consulta = "SELECT C.cuit, C.nombre, C.razonsocial, C.email, C.telefono, C.direccion, C.observaciones, C.provincia, C.cp, L.cp, L.localidades FROM clientes C INNER JOIN localidades L WHERE cuit = '$cuit' AND C.cp = L.cp";
            
            echo "<SCRIPT type='text/javascript' language='Javascript'>alert('".$consulta."');</SCRIPT>";

            $datos = mysqli_query ($conn, $consulta);

            $valores = mysqli_fetch_array($datos);

            //delcaro variables a los campos del formulario
            
            
        
            $nombre=$valores['nombre'];
            $razonsocial=$valores['razonsocial'];
            $email=$valores['email'];
            $telefono=$valores['telefono'];
            $direccion=$valores['direccion'];
            $observaciones=$valores['observaciones'];
            $provincia=$valores['provincia'];
            $cp=$valores['cp'];

            $consulta1 = "SELECT cp, localidades FROM localidades";
            $result = $conn->query($consulta1);
            if($result->num_rows > 0){

        }   }
           
    

    ?>
</head>
    <header>
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SISTEMA TECNOCUT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
          
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary me-2" type="submit">Buscar</button>
                    <a href="../salir.php" class="btn btn-danger">Salir</a>
                </form>
            </div>
            </div>
        </nav>
    </header>
    <main>

        <div class="row">
            <div class="col">
                <h1 class="text-center pt-3">Alta clientes</h1>
            </div>
        </div>
        <div class="container">
            
            <div class="row justify-content-md-center">
                <div class="col-10">
    
            <form action="editarclientes.php" method="POST" name="agenda-alta"  class="">
    
                <div class="form-group row ">
                    <div class="col-6">
                        <label for="cuit">Nº CUIT</label>
                        <input value="<?php echo $cuit?>" type="text" class="form-control" id="cuit" name="cuit" placeholder="Numero de CUIT" title="Ingresa 11 digitos del Numero de CUIT" maxlength="11" required="true">
                    </div>

                    <div class="col-6">
                        <label for="nombre">Nombre</label>
                        <input value="<?php echo $nombre?>" type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" maxlength="30" required="true">
                        
                    </div>

                    <div class="col-6">
                        <label for="razonsocial">Razon Social</label>
                        <input value="<?php echo $razonsocial?>" type="text" class="form-control" id="razonsocial" name="razonsocial" placeholder="Apellido" maxlength="30" required="true">
                    </div>

                    <div class="col-6">
                        <label for="email">Email</label>
                        <input value="<?php echo $email?>" type="email" class="form-control" id="email" name="email" placeholder="Email" maxlength="30" required="true">
                    </div>
                </div>

                

                <div class="form-group row">
                    <div class="col-6">
                        <label for="telefono">Telefono</label>
                        <input value="<?php echo $telefono?>" type="text" class="form-control" id="txtTelefono" name="telefono" placeholder="Telefono" maxlength="15" required="true">
                    </div>

                    <div class="col-6">
                        <label for="direccion">Direccion</label>
                        <input value="<?php echo $direccion?>" type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" maxlength="50" required="true">
                    </div>

                    <div class="col-6">
                        <label for="observaciones">Observaciones</label>
                        <input value="<?php echo $observaciones?>" type="text" class="form-control" id="direccion" name="observaciones" placeholder="Observaciones" maxlength="50" required="true">
                    </div>

                    <div class="col-6">
                        <label for="provincia">Provincia</label>
                        <input value="<?php echo $provincia?>" type="text" class="form-control" id="direccion" name="provincia" placeholder="Provincia" maxlength="50" required="true">
                    </div>
                    

                    <div class="col-6">
                        <label>Cod Postal</label>
                        <select class='form-control input-sm' id="cp" name="cp">
                        <option value="<?php echo $cp,' - ',$localidades?>">Seleccione</option>
                        <!--intruduzco la consulta de la tabla localidades-->
                          <?php 
                                while ($row = $result->fetch_assoc()){
                                    $output = "<option value='".$row['cp']."'";
                                    if($_POST['cp'] == $row['cp']){
                                        $output .= " selected='selected'";
                                    }
                                    $output .= ">".$row['cp']." - ".$row["localidades"]."</option>";
                                    echo $output;
                                }
                            
                            mysqli_close($conn);
                            ?>    
                        </select>
                    </div>

                </div>

                    <div class="form-group row">
                    <div class="col-6">
                        <input name="enviar" type="submit" id="enviar" value="Guardar" class="btn btn-primary mt-3"> 
                        <a href="clientes.php" class="btn btn-md btn-danger mt-3" role="button">Volver</a>
                    </div>
                </div>
    </main>
    
</body>
</html>
