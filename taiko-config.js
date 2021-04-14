var canvas = document.querySelector('canvas');

canvas.width = window.innerWidth -50;
canvas.height = window.innerHeight -50;

var c = canvas.getContext('2d');


c.fillRect(100,100,200,100);

console.log(canvas);
