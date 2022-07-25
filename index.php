<?php

require 'Naves.php';
require 'Lanzadoras.php';
require 'Tripuladas.php';
require 'NoTripuladas.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
   <div class="w-100 bg-dark text-white p-3 mb-4">
   <h1 class="titulo">Estacion Espacial Sofka</h1>
   </div>
    

    <div class="container">
        <!-- Formulario para crear naves  -->
        <form name="formNave" method="POST" action="principal.php">
            <div class="form-nave">
                <div class="form-row">
                    <div class="form-group col-lg-4 col-12">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" value="" class="form-control">
                    </div>
                    <div class="form-group col-lg-4 col-12">
                        <label for="combustible">Combustible:</label>
                        <input type="text" name="combustible" value="" class="form-control">
                    </div>
                    <div class="form-group col-lg-4 col-12">
                        <label for="funcion">Funcion:</label>
                        <input type="textarea" name="funcion" value="" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-lg-4 col-12">
                        <label for="primer_lanzamiento">Primer Lanzamiento:</label>
                        <input type="date" name="primer_lanzamiento" value="" class="form-control">
                    </div>
                    <div class="form-group col-lg-4 col-12">
                        <label for="ultimo_lanzamiento">Primer Lanzamiento:</label>
                        <input type="date" name="ultimo_lanzamiento" value="" class="form-control">

                    </div>
                    <div class="form-group col-lg-4 col-12">
                        <label for="estado">Estado actual:</label>
                        <input type="text" name="estado" value="" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-lg-4 col-12">
                        <label for="pais">Pais:</label>
                        <input type="text" name="pais" value="" class="form-control">

                    </div>
                </div>
            </div>
            <div class="form-row pl-1">
                <label>Selecciona el tipo de nave:
                    <select name="tipo" id="inputTipo" class="form-control" onchange="seleccionarTipoNave()" required>
                        <option value="" selected></option>
                        <option value="lanzadoras">Lanzadoras</option>
                        <option value="tripuladas">Tripuladas</option>
                        <option value="no-tripuladas">No tripuladas</option>
                    </select>
            </div>
            <div class="form-row form-lanzadora">
                <div class="form-group col-lg-3 col-12">
                    <label for="empuje">Empuje:</label>
                    <input type="number" name="empuje" value="" class="form-control">
                </div>
                <div class="form-group col-lg-3 col-12">
                    <label for="potencia">Potencia:</label>
                    <input type="number" name="potencia" value="" class="form-control">

                </div>
                <div class="form-group col-lg-3 col-12">
                    <label for="capacidad_transporte">Capacidad transporte(kg):</label>
                    <input type="number" name="capacidad_transporte" value="" class="form-control">
                </div>
                <div class="form-group col-lg-3 col-12">
                    <label for="altura">Altura(m):</label>
                    <input type="number" name="altura" value="" class="form-control">
                </div>
            </div>
            <div class="form-row form-tripuladas">
                <div class="form-group col-lg-3 col-12">
                    <label for="capacidad_tripulantes">Numero Tripulantes:</label>
                    <input type="number" name="tripulantes" class="form-control">

                </div>
                <div class="form-group col-lg-3 col-12">
                    <label for="peso">Peso(kg):</label>
                    <input type="number" name="peso" value="" class="form-control">

                </div>
                <div class="form-group col-lg-3 col-12">
                    <label for="km_orbita">km orbita(km):</label>
                    <input type="number" name="km_orbita" value="" class="form-control">

                </div>

            </div>
            <div class="form-row form-no-tripuladas">
                <div class="form-group col-lg-3 col-12">
                    <label for="velocidad">Velocidad(km/h):</label>
                    <input type="number" name="capacidad_tripulantes" value="" class="form-control">
                </div>
                <div class="form-group col-lg-3 col-12">
                    <label for="empuje2">Empuje:</label>
                    <input type="number" name="empuje2" value="" class="form-control">

                </div>
            </div>
            <input type="submit" class="btn-primary p-2 rounded">
        </form>

        <!-- Tablas de las diferentes naves -->
        <h2>Tabla Naves Lanzadoras</h2>
        <div class="tabla-lanzadoras">
            <div class="row">
                <div class="col overflow-auto">
                    <table class="table table-striped table-bordered table-hover table-dark ">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Combustible</th>
                                <th>Funcion</th>
                                <th>Primer Lanzamiento</th>
                                <th>Ultimo Lanzamiento</th>
                                <th>Estado Actual</th>
                                <th>Pais</th>
                                <th>Empuje</th>
                                <th>Potencia</th>
                                <th>Capacidad de transporte (kg)</th>
                                <th>Altura(m)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo Lanzadoras::listarNaves() ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <h2>Tabla Naves Tripuladas</h2>
        <div class="tabla-tripuladas">
            <div class="row">
                <div class="col overflow-auto">
                    <table class="table table-striped table-bordered table-hover table-dark">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Combustible</th>
                                <th>Funcion</th>
                                <th>Primer Lanzamiento</th>
                                <th>Ultimo Lanzamiento</th>
                                <th>Estado Actual</th>
                                <th>Pais</th>
                                <th>Capacidad de Tripulantes</th>
                                <th>peso</th>
                                <th>km de orbita (km)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo Tripuladas::listarNaves() ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <h2>Tabla Naves no Tripuladas</h2>
        <div class="tabla-no-tripuladas">
            <div class="row">
                <div class="col overflow-auto">
                    <table class="table table-striped table-bordered table-hover table-dark">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Combustible</th>
                                <th>Funcion</th>
                                <th>Primer Lanzamiento</th>
                                <th>Ultimo Lanzamiento</th>
                                <th>Estado Actual</th>
                                <th>Pais</th>
                                <th>velocidad (km/h)</th>
                                <th>Empuje</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo NoTripuladas::listarNaves() ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>