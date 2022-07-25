
//Guardar inputs en variables
let inputTipo = document.getElementById('inputTipo');
let inputsLanzadora = document.querySelector('.form-lanzadora');
let inputsTripuladas = document.querySelector('.form-tripuladas');
let inputsNoTripuladas = document.querySelector('.form-no-tripuladas');
//Esconder Inputs
inputsLanzadora.style.display = 'none';
inputsTripuladas.style.display = 'none';
inputsNoTripuladas.style.display = 'none';

//Seleccionar tipo de nave
function seleccionarTipoNave() {
  let tipo = inputTipo.value;

  //Validando el tipo y escondiendo los otros inputs
  if (tipo == 'lanzadoras') {
    inputsLanzadora.style.display = 'block';
    inputsTripuladas.style.display = 'none';
    inputsNoTripuladas.style.display = 'none';
  }
  else if(tipo == 'tripuladas'){
    inputsLanzadora.style.display = 'none';
    inputsTripuladas.style.display = 'block';
    inputsNoTripuladas.style.display = 'none';
  }
  else if(tipo == 'no-tripuladas'){
    inputsLanzadora.style.display = 'none';
    inputsTripuladas.style.display = 'none';
    inputsNoTripuladas.style.display = 'block';
  }
  else{
    inputsLanzadora.style.display = 'none';
    inputsTripuladas.style.display = 'none';
    inputsNoTripuladas.style.display = 'none';
  }
}


