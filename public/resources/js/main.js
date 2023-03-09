
document.addEventListener("DOMContentLoaded", loadFirstContent);


function insertIntoHtml(json) {
    let main = document.querySelector('main');
    //main.innerHTML = '';
    main.innerHTML = json.html;
}

async function loadFirstContent() {
    let response = await fetch('/api.php');
    json = await response.json();
    insertIntoHtml(json);
}

async function loadRegistration() {
    let response = await fetch('/?registration');
    json = await response.json();
    insertIntoHtml(json);
}


async function authorization() {
    //let container = document.querySelector('#app');
    let response = await fetch('/', {
        method: 'POST',
        headers: {"Content-Type": "application/json;charset=utf-8"},
        //body: JSON.stringify(inputData)
      });
  
    // fetch('/?registration');
    return await response.json();
    //container.innerHTML = result;
}


    // let response = fetch("/api.php")
    // if (response.ok) { // если HTTP-статус в диапазоне 200-299
    //     console.log('cool')
    //     // получаем тело ответа (см. про этот метод ниже)
    //     let json = await response.json();
    // } else {
    //     alert("Ошибка HTTP: " + response.status);
    // }

/*loadRegistration();

let htmlNew = loadRegistration()
*/







//async function loadAuthorizatioin(response) {
 /*   let response = await fetch('/api.php');
    if (response.ok) { // если HTTP-статус в диапазоне 200-299
        // получаем тело ответа (см. про этот метод ниже)
        let json = await response.json();
        let htmlNew = json;
      } else {
        console.log("Ошибка HTTP: " + response.status);
      }
*/
/*
async function loadAuthorizatioin() {
    let container = document.querySelector('#app');

    let response = await fetch('http://localhost:8080/api.php', {
        headers: {"Content-Type": "application/json;charset=utf-8"}
    });
    let result = await response.json();
    console.log(result);
    container.innerHTML = result;
}*/





//let response = await fetch('/?registration');

//fetch('http://localhost:8080/api.php').then(Response => Response.json()).then(result =>  JSON.stringify(result));
/*
fetch('https://google.com').then(Response => Response.json()).then(result => alert(JSON.stringify(result)));
*/