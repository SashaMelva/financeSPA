document.addEventListener("DOMContentLoaded", loadAuthorization);


function insertIntoHtml(json) {
    let main = document.querySelector('main');
    let data = json.data;
    main.innerHTML = json.html;
    if (data !== null) {
        contentListOperate(data);
    }
}

function contentListOperate(data) {
    let table = document.querySelector('tbody.table-operation');

    let countOperation = Object.keys(data).length;
    if (countOperation > 0) {
        for (let i = 1; i <= countOperation; i++) {
            let row = document.createElement('tr');

            let countCell = 5;
            //Object.values(data)
            //console.log(countCell);
            table.appendChild(row);

            let cell = document.createElement('td');
            cell.innerHTML = '' + i;
            row.appendChild(cell);

            let cell1 = document.createElement('td');
            cell1.innerHTML = data[i]['sum'];
            row.appendChild(cell1);

            let cell2 = document.createElement('td');
            cell2.innerHTML = data[i]['name'];
            row.appendChild(cell2);

            let cell3 = document.createElement('td');
            cell3.innerHTML = data[i]['login'];
            row.appendChild(cell3);

            let cell4 = document.createElement('td');
            cell4.innerHTML = data[i]['comment'];
            row.appendChild(cell4);

            let cell5 = document.createElement('td');
            let btnEdit = document.createElement('button');
            btnEdit.className = "btn-img " + i + "-cell";
            btnEdit.setAttribute('onclick', 'edit(this)');
            cell5.appendChild(btnEdit);
            let btnEditImg = document.createElement('img');
            btnEditImg.src = "/resources/img/edit.png";
            btnEdit.appendChild(btnEditImg);

            row.appendChild(cell5);

            let cell6 = document.createElement('td');
            let btnDelete = document.createElement('button');
            btnDelete.className = "btn-img " + i + "-cell";
            btnDelete.setAttribute('onclick', 'deleteRow(this)');
            cell6.appendChild(btnDelete);
            let btnDeleteImg = document.createElement('img');
            btnDeleteImg.src = "/resources/img/delete.png";
            btnDelete.appendChild(btnDeleteImg);

            row.appendChild(cell6);

            let cell7 = document.createElement('td');
            let idOperations = data[i]['operations_id'];
            cell7.innerHTML = idOperations;
            cell7.id = "idOp-" + idOperations;
            cell7.className = "id-option " + i + "-cell";
            cell7.hidden = true;
            row.appendChild(cell7);
        }
    } else {
        console.log("NotFound")
    }
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


function deleteRow(btn) {
    let btnSelectClassName = btn.className.slice(8)
    let td = document.querySelectorAll('td.id-option');
    
    for (let i = 0; i < td.length; i++) {
        let cellSelectClassName = td[i].className.slice(10);
        let cellidOption = td[i].id.slice(5);
        
        if (cellSelectClassName == btnSelectClassName) {
            deleteOperation(cellidOption);
        }
        
    }
}

async function deleteOperation(idOption) {
    let response = await fetch('/api.php?page=add_operation&action=delete&id=' + idOption);
    let json = await response.json();
    insertIntoHtml(json);
}


function edit(btn) {
    let btnSelectClassName = btn.className.slice(8)
    let td = document.querySelectorAll('td.id-option');
    
    for (let i = 0; i < td.length; i++) {
        let cellSelectClassName = td[i].className.slice(10);
        let cellidOption = td[i].id.slice(5);
        
        if (cellSelectClassName == btnSelectClassName) {
            editOperation(cellidOption);
        }
        
    }
}


async function editOperation(idOption) {
    let response = await fetch('/api.php?page=add_operation&action=edit&id=' + idOption);
    let json = await response.json();
    insertIntoHtml(json);
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
