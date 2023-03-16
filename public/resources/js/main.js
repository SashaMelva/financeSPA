document.addEventListener("DOMContentLoaded", fetchAndViewAuthorizationForm);


function insertIntoHtml(json) {

    let main = document.querySelector('main');
    let operations = json.data;
    main.innerHTML = json.html;

    const table = document.querySelector('tbody.table-operation');

    if (operations !== null && table!==null) {
        insertOperationsIntoHtmlTable(operations, table);
    }else if (operations !== null) {
        insertLoginUserIntoHtml(operations)
    }
}

function insertLoginUserIntoHtml(operations) {
    console.log(operations[0]);
    let inputLogin = document.querySelector("input.input-login-user");
    inputLogin.value = operations[0];
    console.log(inputLogin);
}


function insertOperationsIntoHtmlTable(operations, table) {

    let operationCounter = Object.keys(operations).length;

    let AllIncoming = 0;
    let AllExpense = 0;

    if (operationCounter === 0) {
        console.log("NotFound") // #TODO
    }

    for (let i = 1; i <= operationCounter; i++) {

        let operationId = operations[i]['operations_id'];
        //console.log(operationId);

        const row = document.createElement('tr');

        table.appendChild(row);

        let cell = document.createElement('td');
        cell.innerHTML = i.toString();
        row.appendChild(cell);

        let columnSum = document.createElement('td');
        columnSum.innerHTML = operations[i]['sum'];
        row.appendChild(columnSum);

        let columnName = document.createElement('td');
        columnName.innerHTML = operations[i]['name'];
        row.appendChild(columnName);

        let columnLogin = document.createElement('td');
        columnLogin.className = "user-login";
        columnLogin.innerHTML = operations[i]['login'];
        row.appendChild(columnLogin);

        let columnComment = document.createElement('td');
        columnComment.innerHTML = operations[i]['comment'];
        row.appendChild(columnComment);

        let columnButtonEdit = document.createElement('td');

        let btnEdit = document.createElement('button');
        btnEdit.className = "btn-img " + i + "-cell";
        btnEdit.setAttribute('onclick', `fetchAndViewEditOperationForm(${operationId})`);

        columnButtonEdit.appendChild(btnEdit);
        let btnEditImg = document.createElement('img');
        btnEditImg.src = "/resources/img/edit.png";
        btnEdit.appendChild(btnEditImg);

        row.appendChild(columnButtonEdit);

        let columnButtonDelete = document.createElement('td');
        let btnDelete = document.createElement('button');
        btnDelete.className = "btn-img " + i + "-cell";
        btnDelete.setAttribute('onclick', `fetchAndViewDeleteOperation(${operationId})`);
        columnButtonDelete.appendChild(btnDelete);
        let btnDeleteImg = document.createElement('img');
        btnDeleteImg.src = "/resources/img/delete.png";
        btnDelete.appendChild(btnDeleteImg);

        row.appendChild(columnButtonDelete);

       
        
        if (operations[i]['name'] == 'expense') {
           AllExpense += Number(operations[i]['sum']);
        } else {
            AllIncoming += Number(operations[i]['sum']);
        }
    }

    const totalIncomingParagraph = document.querySelector("p.incoming-all");
    const totalExpenseParagraph = document.querySelector("p.expense-all");

    totalIncomingParagraph.innerHTML = AllIncoming.toString();
    totalExpenseParagraph.innerHTML = AllExpense.toString();

}

/*Отправка запросов на получение страницы*/

async function fetchAndViewAuthorizationForm() {

    let response = await fetch('/api.php?page=authorization');

    let json = await response.json();
    insertIntoHtml(json);
}

async function fetchAndViewRegistrationForm() {
    let response = await fetch('/api.php?page=registration');

    let json = await response.json();
    insertIntoHtml(json);
}

async function fetchAndViewOperationListForm() {
    let response = await fetch('/api.php?page=operation_list');

    let json = await response.json();
    insertIntoHtml(json);
}

async function fetchAndViewAddOperationForm() {
    let userLogin = document.querySelector("td.user-login").innerHTML;
    let response = await fetch('/api.php?page=add_operation&userLogin=' + userLogin);

    let json = await response.json();
    insertIntoHtml(json);
}

/*Отпрвавка запросов авторизауии и регистрации*/

async function fetchAndViewAuthorization() {
    const form = new FormData(document.querySelector("form.form-authorization"));

    let response = await fetch('/api.php', {
        method: 'POST',
        body: form
    });

    let json = await response.json();
    insertIntoHtml(json);
}

async function fetchAndViewRegistration() {
    const form = new FormData(document.querySelector("form.form-registration"));

    let response = await fetch('/api.php', {
        method: 'POST',
        body: form
    });

    let json = await response.json();
    insertIntoHtml(json);
}

/* Yдаление и изменение товара*/

async function fetchAndViewDeleteOperation(idOperation) {
    let response = await fetch('/api.php?action=delete&idOperation=' + idOperation);

    let json = await response.json();
    insertIntoHtml(json);
}

async function fetchAndViewEditOperationForm(idOperation) {
    let response = await fetch('/api.php?action=edit&idOperation=' + idOperation);

    let json = await response.json();
    insertIntoHtml(json);
}

async function fetchAndViewAddOperation() {
    const form = new FormData(document.querySelector("form.form-add"));

    let response = await fetch('/api.php', {
        method: 'POST',
        body: form
    });

    let json = await response.json();
    insertIntoHtml(json);
}
