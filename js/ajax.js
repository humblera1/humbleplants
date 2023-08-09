
async function ajax(requestedData){
    let data = requestedData;
    let response = await fetch('/catalog', {
        method: 'POST',
        headers: {
         'Content-Type': 'application/json;charset=utf-8'
         },
        body: JSON.stringify(data)
    });

    let result = await response.text();
    console.log(result);

    let catalogContainer = document.querySelector('.catalog-container');
    catalogContainer.innerHTML = '';
    fetchData(result);
}