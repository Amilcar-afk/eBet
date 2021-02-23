function chat(){
  const msg = document.getElementById('input_chat').value;
  const div = document.getElementById('chat');
  let request = new XMLHttpRequest();

  request.open('POST', 'chat.php?id' , true);

  request.onreadystatechange = function(){
    if(request.readyState === 4){
      div.innerHTML += request.responseText;
    }
  };
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  request.send(`msg=${msg}`);
}

setTimeout(chat, 2000);
