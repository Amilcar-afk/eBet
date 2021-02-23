function search(){
  const search_bar = document.getElementById('search');
  const section = document.getElementById('result_search');
  let input = search_bar.value;
  let request = new XMLHttpRequest();

  request.open('POST', 'search_bar.php', true);

  request.onreadystatechange = function(){
    if(request.readyState === 4 && request.status === 200){
      if(input.length > 0){
        section.innerHTML = request.responseText;
        section.style.backgroundColor = '#FFFFFF';
        /*section.style.border = 'solid 1px';*/
      }else{
        section.innerHTML = "";
      }
    }
  };
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  request.send(`input=${input}`);
}
