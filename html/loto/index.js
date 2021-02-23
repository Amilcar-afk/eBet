function play() {
  const img = ['img/bet.png', 'img/coins.png', 'img/croix-rouge.png'];

  const case1 = document.getElementById('case1');
  const case2 = document.getElementById('case2');
  const case3 = document.getElementById('case3');

  let r1 = parseInt(Math.random() * 3);
  let r2 = parseInt(Math.random() * 3);
  let r3 = parseInt(Math.random() * 3);

  case1.src = img[r1];
  case2.src = img[r2];
  case3.src = img[r3];

  playing();

  if (r1 == 0 && r2 == 0 && r3 == 0) {
    giveCredit();
  } else if (r1 == 1 && r2 == 1 && r3 == 1) {
    giveCoins();
  } else {
    console.log('Sorry');
  }
}

function playing() {
  const request = document.getElementById('request');
  if (window.XMLHttpRequest) {
    const request = new XMLHttpRequest();
    request.open("POST","play.php");

    request.onreadystatechange = function() {
      if (request.readyState==4 && request.status==200) {
        response.innerHTML = request.responseText;
      }
    }
      request.send();
  }
}


function giveCoins() {
  const request = document.getElementById('request');
  if (window.XMLHttpRequest) {
    const request = new XMLHttpRequest();
    request.open("POST","addCoins.php");

    request.onreadystatechange = function() {
      if (request.readyState==4 && request.status==200) {
        response.innerHTML = request.responseText;
      }
    }
      request.send();
  }
}


function giveCredit() {
  const request = document.getElementById('request');
  if (window.XMLHttpRequest) {
    const request = new XMLHttpRequest();
    request.open("POST","addCredit.php");

    request.onreadystatechange = function() {
      if (request.readyState==4 && request.status==200) {
        response.innerHTML = request.responseText;
      }
    }
      request.send();
  }
}
