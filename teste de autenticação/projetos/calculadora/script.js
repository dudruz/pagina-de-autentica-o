function addToDisplay(value) {
  document.getElementById('display').value += value;
}

function limpar(){
  document.getElementById('display'). value = "";
}
function calcular(){
  var expressao = document.getElementById('display').value;
  var resultado = eval(expressao);
  document.getElementById('display'). value = resultado;
}