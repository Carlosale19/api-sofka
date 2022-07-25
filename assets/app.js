let inputTipo = document.getElementById('inputTipo');
let inputsLanzadora = document.querySelector('.form-lanzadora');
let inputsTripuladas = document.querySelector('.form-tripuladas');
let inputsNoTripuladas = document.querySelector('.form-no-tripuladas');
//Esconder Inputs
inputsLanzadora.style.display = 'none';
inputsTripuladas.style.display = 'none';
inputsNoTripuladas.style.display = 'none';
function seleccionarTipoNave() {
  let tipo = inputTipo.value;
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
