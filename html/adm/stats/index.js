//GET VALUE OF X AXIS
function drawsignupX() {
  let responseTxtX = [];
  const request = new XMLHttpRequest();
  request.open("GET", "statx.php");

  request.onreadystatechange = function() {
    if (request.readyState==4 && request.status==200) {
      responseTxtX = request.responseText;
      responseTxtX = responseTxtX.split('|');
      drawsignupY(responseTxtX);
    }
  }
  request.send();
}

//GET VALUE OF Y AXIS
function drawsignupY(x) {
  var responseTxtY;
  const request = new XMLHttpRequest();
  request.open("GET", "staty.php");

  request.onreadystatechange = function() {
    if (request.readyState==4 && request.status==200) {
      responseTxtY = request.responseText;
      responseTxtY = responseTxtY.split('|');
      init(x, responseTxtY);
    }
  }
  request.send();
}

//DRAWING OF COURB OF SIGNUP
function init(xobject, yobject) {

  var canvas = document.getElementById("canvas");
  var ctx = canvas.getContext("2d");

  let xAxe = canvas.width;
  let yAxe = canvas.height;

  for (let i = xobject.length - 1; i >= 0; i--) {
    ctx.fillText(`${xobject[i]}`, i * 100 + 10, yAxe);
  }
  for (let j = yAxe; j > 0; j -= 50) {
    ctx.fillText(j / 5, 0, yAxe - j);
  }

// for (let k = 0; k < yobject.length; k) {
//     ctx.moveTo(k * k, yAxe - `${yobject[k]}`);
//     ctx.lineTo(k * 100 , yAxe - `${yobject[k]}`);
//     ctx.stroke();
// }
}

// for (const property in xobject) {
//   console.log(`${xobject[property]}`);
//   x.push(`${xobject[property]}`);
// }
// for (const property in yobject) {
//   console.log(`${yobject[property]}`);
//   y.push(`${yobject[property]}`);
// }
