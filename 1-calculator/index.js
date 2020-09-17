var numOne = document.getElementById('one');
var numTwo = document.getElementById('two');

var sum = document.getElementById('sum');
var sub = document.getElementById('sub');
var mul = document.getElementById('mul');
var division = document.getElementById('division');

numOne.addEventListener('input', cal);
numTwo.addEventListener('input', cal);

function cal() {
var one = parseFloat(numOne.value) || 0;
var two = parseFloat(numTwo.value) || 0;
sum.innerText = one+two;
sub.innerText = one-two;
mul.innerText = one*two;
division.innerText = one/two;
}