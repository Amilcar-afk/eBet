function notif(){
  const section = document.getElementById('notif');
  let request = new XMLHttpRequest();

  request.open('GET', '../notif.php', true);

  request.onreadystatechange = function(){
    if(request.readyState === 4 && request.status === 200){
      section.style.backgroundColor = 'white';
      section.innerHTML = request.responseText;
    }
  };
  request.send();
}

function insert_notif(){
  const section = document.getElementById('section');
  let request = new XMLHttpRequest();

  request.open('GET', '../insert_notif.php', true);

  request.onreadystatechange = function(){
    if(request.readyState === 4 && request.status === 200){
      console.log(request.responseText);
    }
  };
  request.send();
}
