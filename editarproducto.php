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
    
    <title>Editar Productos</title>
</head>
<body>
    <?php
    
    //Conexión 
    require_once("../conexion.php");

    //Si se presiona en el boton enviar
    if(isset($_POST['enviar']))
    {
        //Asigna a variales los valores de los campos de formularios  
        $cod_producto=$_POST['cod_producto'];
        $descripcion=$_POST['descripcion'];   

        //(SQL) Instruccion SQL modificacion
        $consulta = "UPDATE productos SET descripcion='$descripcion' WHERE cod_producto = '$cod_producto'";

        //Para que PHP envíe una consulta SQL hacia el gestor de MySQL (PHP)
        $datos= mysqli_query ($conn, $consulta);
            
        //Vuelta al listado
        echo "<SCRIPT type='text/javascript' language='JavaScript'> window.location = 'productos.php'; </SCRIPT>";
           
    } else {
        
        $cod_producto=$_GET['cod_producto'];

        $consulta = "SELECT * FROM productos WHERE cod_producto = '$cod_producto' ";

        echo "<SCRIPT type='text/javascript' language='JavaScript'> alert('".$consulta."');</SCRIPT>"; 

        $datos = mysqli_query ($conn, $consulta);
        
        $valores = mysqli_fetch_array($datos);

        //Asigna a campos del formulario los valores del contacto seleccionado
        $cod_producto=$valores['cod_producto'];
        $descripcion=$valores['descripcion'];

    }
    mysqli_close($conn);
?>
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
        
        <li class="nav-item ">
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
          <a class="nav-link " aria-current="page" href="productos.php">
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
    <div class="container">
        <dov class="row">
            <div class="col">
                <h1>Editar producto</h1>
                 <form action="editarproducto.php" method="POST" name="agenda-alta" style="background-color: white" class="p-3">
                
                        <div class="form-group row">
            
                            <div class="col">
                                <label for="cod_producto">Codigo Producto</label>
                                <input value="<?php echo $cod_producto?>" type="text" class="form-control" id="cod_producto" name="cod_producto" placeholder="Codigo de Producto" maxlength="12" readonly>
                            </div>
                    
                            <div class="col">
                                <label for="descripcion">Producto</label>
                                <input value="<?php echo $descripcion?>" type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Producto" maxlength="30" required="true">
                            </div>
            
                        </div>
                        
                        <br><hr>
                    
                        <div class="form-group row">
                            <div class="col offset-5">
                                <input name="enviar" type="submit" id="enviar" value="Actualizar" class="btn btn-primary"> 
                                <a href="productos.php" class="btn btn-md btn-danger" role="button">Volver</a>
                            </div>
                        </div>
                    
                    </form>
            </div>
        </dov>
    </div>
    
</body>
</html>