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
    
    <title>Remitos</title>
     <?php
        // Conexión a la BD 
        require_once("../conexion.php");
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
      
    </div>
  </div>
</nav>
    </header>
    <!--fin menu-->

    <!--comienza contenido principal-->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Remitos</h1>
                      <?php
                    // Solicitamos al gestor de MySQL que entregue aquellos datos que queremos mostrar en nuestras páginas. (SQL)
                        $consulta = "SELECT R.num_remito, R.cuit, R.num_pedido, R.fecha_remito, C.cuit, C.razonsocial FROM remitos R INNER JOIN clientes C WHERE R.cuit = C.cuit ORDER BY fecha_remito";
                        $result = $conn->query($consulta);  // Acá realmente se hace la consulta, result es un conjunto de filas
                        // Si la cantidad de filas es mayor que 0 muestra
                        if ($result->num_rows > 0) {
                    ?>
                    
                    <table class="table table-secondary">
                        <thead class="table-success table-dark">
                            <tr>
                            <th>Numero de Remito</th>
                            <th>Numero de Pedido</th>
                            <th>CUIT</th>
                            <th>Razon Social</th>
                            <th>Fecha del Remito</th>
                            <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Datos de salida de cada fila
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                        echo "<td>" . $row["num_remito"] . "</td>"; 
                                        echo "<td>" . $row["num_pedido"] . "</td>";
                                        echo "<td>" . $row["cuit"] . "</td>";
                                        echo "<td>" . $row["razonsocial"] . "</td>";
                                        echo "<td>" . $row["fecha_remito"] . "</td>";
                                        echo "<td><a class='btn btn-success' href='detallesremitos.php?num_remito=". $row["num_remito"]."'>Detalle</a>";
                                        echo "&nbsp;";
                                        echo "&nbsp;";
                                        echo "&nbsp;";
                                        echo "<a class='btn btn-danger' href='bajaremitos.php?Nro_Remito=". $row["num_remito"]."&cuit=". $row["cuit"]."'>Borrar</a></td>";
                                    echo "</tr>";
                                    }
                                }else {
                                        echo "La búsqueda no ha dado resultados";
                                    }
                                mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</body>
</html>