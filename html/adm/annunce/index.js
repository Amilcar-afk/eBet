function displayMatch() {
  const response = document.getElementById('response');
  if (window.XMLHttpRequest) {
    const request = new XMLHttpRequest();
    request.open("GET", "display.php");

    request.onreadystatechange = function() {
      if (request.readyState == 4 && request.status == 200) {
        response.innerHTML = request.responseText;
      }
    }
    request.send();
  }
}


function validWinner(id) {
  const response = document.getElementById("responseU");
  const select = document.getElementById(id);
  let sct = select.value;
  let mtc = id;

  if (window.XMLHttpRequest) {
    const request = new XMLHttpRequest();
    request.open("POST", "win.php");

    request.onreadystatechange = function() {
      if (request.readyState == 4 && request.status == 200) {
        response.innerHTML = request.responseText;
        displayMatch();
      }
    }
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`id=${mtc}&sec=${sct}`);
  }
}
