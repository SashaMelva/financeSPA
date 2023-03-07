async function loadRegistration() {

    // let inputData = {[DELETE_OPERATION_ID]: document.getElementById(OPERATION_ID_ID).innerText.toString()};

    let response = await fetch('/api.php', {
        // method: 'POST',
        headers: {'Content-Type': 'application/json;charset=utf-8'}
        // body: JSON.stringify(inputData)
    });

    return await response.json();

    // let response = fetch("/api.php")
    // if (response.ok) { // если HTTP-статус в диапазоне 200-299
    //     console.log('cool')
    //     // получаем тело ответа (см. про этот метод ниже)
    //     let json = await response.json();
    // } else {
    //     alert("Ошибка HTTP: " + response.status);
    // }
}
let content = document.querySelector('#app');
let htmlNew = loadRegistration()

console.log(htmlNew);

// content.innerHTML = htmlNew

/*
fetch('https://google.com').then(Response => Response.json()).then(result => alert(JSON.stringify(result)));
*/