
document.addEventListener("DOMContentLoaded", loadAuthorization);


function insertIntoHtml(json) {
    let main = document.querySelector('main');
    let args = json.args;
    main.innerHTML = json.html;
    if (args !== null) {
        contentListOperate(args);
    }
}

function contentListOperate(args) {
    let table = document.querySelector('tbody.table-operation');

    let countOperation = Object.keys(args).length;
    if (countOperation > 0) {
        for (let i = 1; i <= countOperation; i++) {
            let row = document.createElement('tr');

            let countCell = 5;
            //Object.values(args)
           //console.log(countCell);
            table.appendChild(row);

            let cell = document.createElement('td');
            cell.innerHTML = '' + i;
            row.appendChild(cell);

            let cell1 = document.createElement('td');
            cell1.innerHTML = args[i]['sum'];
            row.appendChild(cell1);

            let cell2 = document.createElement('td');
            cell2.innerHTML = args[i]['name'];
            row.appendChild(cell2);

            let cell3 = document.createElement('td');
            cell3.innerHTML = args[i]['login'];
            row.appendChild(cell3);

            let cell4 = document.createElement('td');
            cell4.innerHTML = args[i]['comment'];
            row.appendChild(cell4);

            let cell5 = document.createElement('td');
            let btnEdit = document.createElement('button');
            btnEdit.className = "btn-img " + i + "-cell";
            btnEdit.setAttribute('onclick', 'console.log("sdfsf")');
            cell5.appendChild(btnEdit);
            let btnEditImg = document.createElement('img');
            btnEditImg.src = "/resources/img/edit.png";
            btnEdit.appendChild(btnEditImg);

            row.appendChild(cell5);

            let cell6 = document.createElement('td');
            let btnDelete = document.createElement('button');
            btnDelete.className = "btn-img " + i + "-cell";
            cell6.appendChild(btnDelete);
            let btnDeleteImg = document.createElement('img');
            btnDeleteImg.src = "/resources/img/delete.png";
            btnDelete.appendChild(btnDeleteImg);

            row.appendChild(cell6);
        }
    } else {console.log("NotFound")}
    console.log(args);
}


/*Отправка запросов на получение страницы*/

async function loadAuthorization() {
    let response = await fetch('/api.php?page=authorization');
    let json = await response.json();
    insertIntoHtml(json);
}
async function loadRegistration() {
    let response = await fetch('/api.php?page=registration');
    let json = await response.json();
    insertIntoHtml(json);
}
async function loadMainOperation() {
    let response = await fetch('/api.php?page=operation_list');
    let json = await response.json();
    insertIntoHtml(json);
}
async function loadAddOperation() {
    let response = await fetch('/api.php?page=add_operation');
    let json = await response.json();
    insertIntoHtml(json);
}

/*Отпрвавка запросов авторизауии и регистрации*/

async function authorization() { 
    const form = new FormData(document.querySelector("form.form-authorization"));

    let response = await fetch('/api.php', {
      method: 'POST',
      body: form
    });

    let json = await response.json();
    insertIntoHtml(json);
}

async function registration() {
    const form = new FormData(document.querySelector("form.form-registration"));

    let response = await fetch('/api.php', {
      method: 'POST',
      body: form
    });

    let json = await response.json();
    insertIntoHtml(json);
}

/* Yдаление и изменение товара*/

async function deleteOperation() {
    let response = await fetch('/api.php?page=add_operation&action=delete');
}

async function editOperation() {
    let idOption = 1;
    let response = await fetch('/api.php?page=add_operation&action=edit&id=' + idOption);
}

async function addOperation() {
    const form = new FormData(document.querySelector("form.form-add"));

    let response = await fetch('/api.php?page=add_operation', {
        method: 'POST',
        body: form
    });
    let json = await response.json();
    insertIntoHtml(json);
}

    // //let container = document.querySelector('#app');
    // let response = await fetch('/', {
    //     method: 'POST',
    //     headers: {"Content-Type": "application/json;charset=utf-8"},
    //     //body: JSON.stringify(inputData)
    // });


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