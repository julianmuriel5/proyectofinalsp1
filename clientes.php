<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    
    <!--bootstrap CDN-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <title>Clientes</title>
       <?php
        //conexion a base de datos
        require_once("../conexion.php");
        

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
      
    </div>
  </div>
</nav>
    </header>
    <!--fin menu-->
    <!--comienza agregar clientes-->
    <div class="container">
            <div class="columns">
                <div class="column is-12 has-text-centered is-centered mt-3">
                    <a href="altaClientes.php" class="btn btn-dark btn-lg btn-info">Añadir Nuevo Cliente</a>
                </div>
            </div>
        </div>

         <!-- Comienza el Contenedor Principal -->
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-12">
                    <h1 class="text-center"><ins>Clientes</ins></h1>
                    <br>

                    <?php
                    // Solicitamos al gestor de MySQL que entregue aquellos datos que queremos mostrar en nuestras páginas. (SQL)
                        $consulta = "SELECT C.cuit, C.nombre, C.razonsocial, C.email, C.telefono, C.direccion, C.observaciones,c.provincia, L.cp, L.localidades 
                                     FROM clientes C INNER JOIN localidades L WHERE C.cp = L.cp ORDER BY C.nombre";
                        $result = $conn->query($consulta);  // Acá realmente se hace la consulta, result es un conjunto de filas
                        // Si la cantidad de filas es mayor que 0 muestra
                        if ($result->num_rows > 0) {
                    ?>
                    
                    <table class="table table-secondary">
                        <thead class="table-success table-dark">
                            <tr>
                            <th>CUIT</th>
                            <th>Nombre</th>
                            <th>Razon Social</th>
                            <th>Emal</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th>Observaciones</th>
                            <th>Provincia</th>
                            <th>Cod postal</th>
                            <th>Acciones</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Datos de salida de cada fila
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                        echo "<td>" . $row["cuit"] . "</td>"; 
                                        echo "<td>" . $row["nombre"] . "</td>";  
                                        echo "<td>" . $row["razonsocial"] . "</td>";
                                        echo "<td>" . $row["email"] . "</td>";
                                        echo "<td>" . $row["telefono"] . "</td>";
                                        echo "<td>" . $row["direccion"] . "</td>";
                                        echo "<td>" . $row["observaciones"] . "</td>";
                                        echo "<td>" . $row["provincia"] . "</td>";
                                        echo "<td>" . $row["cp"] . "</td>";
                                        

                                        echo "<td><a class='btn btn-primary' href='../pedidos/pedidosdelcliente.php?cuit=". $row["cuit"]."'>Pedidos</a>";
                                        echo "&nbsp;";
                                        echo "&nbsp;";
                                        echo "&nbsp;";
                                        echo "<a class='btn btn-info' href='editarclientes.php?cuit=". $row["cuit"]."'>Editar</a>";
                                        echo "&nbsp;";
                                        echo "&nbsp;";
                                        echo "&nbsp;";
                                        echo "<a class='btn btn-danger mt-3' href='bajaclientes.php?cui=". $row["cuit"]."'>Borrar</a></td>";
                                    echo "</tr>";
                                    }
                                }else {
                                        echo "La búsqueda no ha dado resultados o no hay clientes listados aun";
                                    }
                                mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
    
    <footer class="piedpag">
        <div class="container"></div>
    </footer>
</body>

</html>

</body>
</html>