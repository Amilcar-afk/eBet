let onclickstate = 0;
function addmoney(){
    if(onclickstate == 1){
        return;
    }
    onclickstate = 1;
    const parent = document.getElementById('buymoney');
    const input = document.createElement('input');
    input.class = "form-control";
    input.type = "text";
    input.id = "name";
    input.placeholder = "name";
    parent.appendChild(input);
    //////////////////////////////////////////////
    const input1 = document.createElement('input');
    input1.class = "form-control";
    input1.type = "text";
    input1.id = "number";
    input1.placeholder = "card number";
    parent.appendChild(input1);
    //////////////////////////////////////////////
    const input2 = document.createElement('input');
    input2.class = "form-control";
    input2.type = "text";
    input2.id = "expiration";
    input2.placeholder = "expiration";
    parent.appendChild(input2);
    //////////////////////////////////////////////
    const input3 = document.createElement('input');
    input3.class = "form-control";
    input3.type = "text";
    input3.id = "cvc";
    input3.placeholder = "cvc";
    parent.appendChild(input3);
    //////////////////////////////////////////////
    const buttonclick = document.createElement("button");
    buttonclick.innerHTML = "Validate"
    buttonclick.class = "btn btn-success";
    buttonclick.onclick = function(){check(10)};
    parent.appendChild(buttonclick);
    //////////////////////////////////////////////
    const removethis = document.createElement("button");
    removethis.class = "btn btn-danger";
    removethis.onclick = cancelbuy;
    removethis.innerHTML = "Cancel";
    parent.appendChild(removethis);
}

function addmoney1(){
    if(onclickstate == 1){
        return;
    }
    onclickstate = 1;
    const parent = document.getElementById('buymoney1');
    const input = document.createElement('input');
    input.class = "form-control";
    input.type = "text";
    input.id = "name";
    input.placeholder = "name";
    parent.appendChild(input);
    //////////////////////////////////////////////
    const input1 = document.createElement('input');
    input1.class = "form-control";
    input1.type = "text";
    input1.id = "number";
    input1.placeholder = "card number";
    parent.appendChild(input1);
    //////////////////////////////////////////////
    const input2 = document.createElement('input');
    input2.class = "form-control";
    input2.type = "text";
    input2.id = "expiration";
    input2.placeholder = "expiration";
    parent.appendChild(input2);
    //////////////////////////////////////////////
    const input3 = document.createElement('input');
    input3.class = "form-control";
    input3.type = "text";
    input3.id = "cvc";
    input3.placeholder = "cvc";
    parent.appendChild(input3);
    //////////////////////////////////////////////
    const buttonclick = document.createElement("button");
    buttonclick.innerHTML = "Validate"
    buttonclick.class = "btn btn-success";
    buttonclick.onclick = function(){check(20)};
    parent.appendChild(buttonclick);
    //////////////////////////////////////////////
    const removethis = document.createElement("button");
    removethis.class = "btn btn-danger";
    removethis.onclick = cancelbuy1;
    removethis.innerHTML = "Cancel";
    parent.appendChild(removethis);
}

function addmoney2(){
    if(onclickstate == 1){
        return;
    }
    onclickstate = 1;
    const parent = document.getElementById('buymoney2');
    const input = document.createElement('input');
    input.class = "form-control";
    input.type = "text";
    input.id = "name";
    input.placeholder = "name";
    parent.appendChild(input);
    //////////////////////////////////////////////
    const input1 = document.createElement('input');
    input1.class = "form-control";
    input1.type = "text";
    input1.id = "number";
    input1.placeholder = "card number";
    parent.appendChild(input1);
    //////////////////////////////////////////////
    const input2 = document.createElement('input');
    input2.class = "form-control";
    input2.type = "text";
    input2.id = "expiration";
    input2.placeholder = "expiration";
    parent.appendChild(input2);
    //////////////////////////////////////////////
    const input3 = document.createElement('input');
    input3.class = "form-control";
    input3.type = "text";
    input3.id = "cvc";
    input3.placeholder = "cvc";
    parent.appendChild(input3);
    //////////////////////////////////////////////
    const buttonclick = document.createElement("button");
    buttonclick.innerHTML = "Validate"
    buttonclick.class = "btn btn-success";
    buttonclick.onclick = function(){check(50)};
    parent.appendChild(buttonclick);
    //////////////////////////////////////////////
    const removethis = document.createElement("button");
    removethis.class = "btn btn-danger";
    removethis.onclick = cancelbuy2;
    removethis.innerHTML = "Cancel";
    parent.appendChild(removethis);
}

function cancelbuy(){
    const elementmoney = document.getElementById('buymoney');
    const children = elementmoney.childNodes; //tableau qui contient tout les enfants directs du div.
    while(children.length > 0){
        children[0].remove();
    }
    onclickstate = 0;
}

function cancelbuy1(){
    const elementmoney = document.getElementById('buymoney1');
    const children = elementmoney.childNodes; //tableau qui contient tout les enfants directs du div.
    while(children.length > 0){
        children[0].remove();
    }
    onclickstate = 0;
}

function cancelbuy2(){
    const elementmoney = document.getElementById('buymoney2');
    const children = elementmoney.childNodes; //tableau qui contient tout les enfants directs du div.
    while(children.length > 0){
        children[0].remove();
    }
    onclickstate = 0;
}

function check(value){
    const lastnameInput = document.getElementById('name');
    const numbercard = document.getElementById('number');
    const expiration = document.getElementById('expiration');
    const cvc = document.getElementById('cvc');
    const ln = lastnameInput.value;
    const nc = numbercard.value;
    const exp = expiration.value;
    const cvcvalue = cvc.value;
    if(ln.length === 0 || nc.length === 0 || exp.length === 0 || cvcvalue.length === 0){
        alert("Veuillez remplir tout les champs !");
        return;
    }
    if(nc.length != 19 || exp.length != 5 || cvcvalue.length != 3){
        alert("Veuillez vérifier la validité de vos coordonnées bancaires");
        return;
    }
    const request = new XMLHttpRequest();
    request.open('POST', 'create.php');
    request.onreadystatechange = function(){
        if(request.readyState === 4){//event de fin de requete http
            const success = parseInt(request.responseText);
            console.log(success);
            if(success === 1){
                alert("Paiement réaliser avec succes");
            }else {
                alert("Erreur lors du paiement");
            }
        }
    };
    request.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //obliger pour du POST
    request.send(`valuebuy=${value}`);
}