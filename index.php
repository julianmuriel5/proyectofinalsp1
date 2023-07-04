<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
     <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <!--bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    
    
    <title>Document</title>
</head>
<body>
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
          <a class="nav-link active" aria-current="page" href="../proyecto3/index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./clientes/clientes.php">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./localidades/localidades.php">Localidades</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link " aria-current="page" href="./pedidos/pedidos.php"> Pedidos </a>
          
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link " aria-current="page" href="./pedidos/remitos.php"> Remitos </a>
          
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link " aria-current="page" href="./productos/productos.php"> Productos </a>
          
        </li>
       
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-primary me-2" type="submit">Buscar</button>
        <a href="salir.php" class="btn btn-danger">Salir</a>
      </form>
    </div>
  </div>
</nav>
</header>
<main>
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="animate__backInDown text-center">Tecno-Cut</h1>
      <p>Somos una empresa joven dedicada al mecanizado con máquinas de alta tecnología CNC y convencionales con las cuales hacemos piezas bajo plano o según pedido del cliente. 
        Contamos con técnicos con más de 20 años de experiencia en el rubros</p>
      <button class="btn btn-primary center">Ingresar al sistema</button>
    </div>
  
    <div class="col-12">
      <h2>Contamos con conocimiento y máquinas que nos permiten realizar las siguientes actividades.</h2>
    </div>
      
      <div class="col-6 ">
        <h3>Torneado CNC</h3>
        <p>Realizamos el torneado de piezas según plano, muestra o indicación del cliente, asegurando los estándares de calidad, además contamos con equipamiento para realizar piezas en producción</p>
      </div>
       <div class="col-6">
        <h3>Fresado CNC - 4 EJES</h3>
        <p>Contamos con centros de mecanizado con 4to eje de alta tecnología y calidad. Las cuales nos permiten mecanizar desde piezas simples hasta más complejas como moldes para inyección plástica, forja y electrodos para electro-erosión.</p>
      </div>
      <div class="col-6">
        <h3>Soldadura</h3>
        <p>Brindamos un servicio de alta calidad en soldadura con nuestros equipos semiautomáticos MIG-MAG y TIG para producción o reconstrucción de partes y piezas dañada</p>
      </div>
      <div class="col-6">
        <h3>Ratificadoras</h3>
        <p>Contamos con maquinas rectificadora plana frontal dispone de un eje perpendicular a la superficie a rectificar,
          por lo que requiere un tipo de muletas especificas.
        </p>
      </div>
    </div>
</div>
  
<footer>
  <div class="row">
    <div class="col bg-secondary">
    <p class="text-center">contactos:</p>
    <p class="text-center">telefono: 3400 568777</p>
    <p class="text-center">tecnocut@gmail.com</p>
    </div>
  </div>
</footer>
</main>

          
     
        




    
</body>
</html>