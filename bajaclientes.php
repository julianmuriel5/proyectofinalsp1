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
    <title>Baja clientes</title>
     <?php
    
    //Conexión al servidor y la BD mediante un archivo externo que proporciona la cadena de conexión
    require_once("../conexion.php");

    //Si se presiona en el boton enviar
    if(isset($_POST['enviar']))
    {
        //Asigna a variales los valores de los campos de formularios  
        $cuit=$_POST['cuit'];

        $consulta = "DELETE FROM clientes WHERE cuit = '$cuit' ";

        $datos = mysqli_query ($conn, $consulta);  
            
        //Vuelta al listado
        echo "<SCRIPT type='text/javascript' language='JavaScript'> window.location = 'clientes.php'; </SCRIPT>";
           
    } else {

        $cuit=$_GET['cuit'];

        $consulta = "SELECT * FROM clientes WHERE cuit = '$cuit' ";

        echo "<SCRIPT type='text/javascript' language='JavaScript'> alert('".$consulta."');</SCRIPT>"; 

        $datos = mysqli_query ($conn, $consulta);
        
        $valores = mysqli_fetch_array($datos);

        //Asigna a campos del formulario los valores del contacto seleccionado
        
        $nombre=$valores['nombre'];
        $razonsocial=$valores['razonsocial'];
        $email=$valores['email'];
        $telefono=$valores['telefono'];
        $direccion=$valores['direccion'];
        $observaciones=$valores['observaciones'];
        $provincia=$valores['provincia'];
        $cp=$valores['cp'];

        // $consulta = "INSERT INTO clientes (razonsocial,nombre, email, telefono, direccion, observaciones, provincia,cp) VALUES ('$razonsocial','$nombre', '$email', '$telefono', '$direccion', '$observaciones', '$provincia','$cp')";

    }

    mysqli_close($conn);

    ?>
</head>
<body>
      <header>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SISTEMA TECNOCUT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class=navbar-toggler-icon"></span>
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
                <h1>Baja Clientes</h1>
        <form action="bajaclientes.php" method="POST" name="agenda-alta" style="background-color: white" class="p-3">
    
                <div class="form-group row">
                    <div class="col">
                        <label for="cuit">Nº CUIT</label>
                        <input value="<?php echo $cuit?>" type="text" class="form-control" id="cuit" name="cuit" placeholder="Numero de CUIT" title="Ingresa 11 digitos del Numero de CUIT" maxlength="11" readonly>
                    </div>

                  

                    <div class="col">
                        <label for="nombre">Nombre</label>
                        <input value="<?php echo $nombre?>" type="text" class="form-control" id="nombre" name="nombre" placeholder="Apellido" maxlength="30" readonly>
                    </div>

                      <div class="col">
                        <label for="razonsocial">Razon Social</label>
                        <input value="<?php echo $razonsocial?>" type="text" class="form-control" id="razonsocial" name="razonsocial" placeholder="Nombre" maxlength="30" readonly>
                    </div>

                    <div class="col-sm-4">
                        <label for="email">Email</label>
                        <input value="<?php echo $email?>" type="email" class="form-control" id="email" name="email" placeholder="Email" maxlength="30" readonly>
                    </div>
                </div>

                <br>

                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="telefono">Telefono</label>
                        <input value="<?php echo $telefono?>" type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" maxlength="15" readonly>
                    </div>

                    <div class="col">
                        <label for="direccion">Direccion</label>
                        <input value="<?php echo $direccion?>" type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" maxlength="50" readonly>
                    </div>

                      <div class="col-sm-2">
                        <label for="observaciones">Observaciones</label>
                        <input value="<?php echo $observaciones?>" type="text" class="form-control" id="observaciones" name="observaciones" placeholder="Codigo Postal" maxlength="4" readonly>
                    </div>

                    <div class="col-sm-2">
                        <label for="provincia">Provincia</label>
                        <input value="<?php echo $provincia?>" type="text" class="form-control" id="provincia" name="provincia" placeholder="Codigo Postal" maxlength="4" readonly>
                    </div>

                    <div class="col-sm-2">
                        <label for="cp">Codigo Postal</label>
                        <input value="<?php echo $cp?>" type="text" class="form-control" id="cp" name="cp" placeholder="Codigo Postal" maxlength="4" readonly>
                    </div>

                </div>
                
                <br><hr>
    
                <div class="form-group row">
                    <div class="col offset-5">
                        <input name="enviar" type="submit" id="enviar" value="Borrar Cliente" class="btn btn-primary"> 
                        <a href="Clientes.php" class="btn btn-md btn-danger" role="button">Volver</a>
                    </div>
                </div>

    
            </form>
            </div>
        </div>
    </div>
    
</body>
</html>