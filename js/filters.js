
function returnFilters(){
    let checkboxes = document.querySelectorAll('.category_filter');
    let requestedData = []
    
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('click', function(){
            if (requestedData.includes(this.value)){
                let key = requestedData.indexOf(this.value);
                requestedData.splice(key, 1);
                console.log(requestedData);
            }else{
                requestedData.push(this.value);
                console.log(requestedData);
            }
        })
    })

    return requestedData;
}
