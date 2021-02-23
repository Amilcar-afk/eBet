function showResult() {
  const input = document.getElementById("search");
  const name = input.value;
  const response = document.getElementById("livesearch");
  response.innerHTML = '';
  console.log(name);
  if (response.length == 0) {
    response.innerHTML="";
    response.style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    const request = new XMLHttpRequest();
    request.open("GET","index.php?name=" + name);

    request.onreadystatechange = function() {
      if (request.readyState==4 && request.status==200) {
        response.innerHTML = request.responseText;
        response.style.border = "1px solid #A5ACB2";
      }
    }
      request.send();
  }
}

function starthegame() {
    console.log('.------------------------.');
    console.log('|\\\\\\\\\/                   |');
    console.log('| \/  __  ______  __      |');
    console.log('|    {  }|\.....|{  }     |');
    console.log('|    {__}|/_____|{__}    |');
    console.log('|                        |');
    console.log('|    ________________    |');
    console.log('|___/_._o________o_._|___|');
    console.log('14/1/10/26/1/22/-/18/11/17/15/ /23/17/ /8/11/16/11/ /26/23/10/15/ /8/23/ /24/23/14/14/1/ /26/1/ /14/1/25/4/1/14/25/4/1');
}
