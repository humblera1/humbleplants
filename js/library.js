

function makePagination(data, amountPerPage = 9){
    const plants = JSON.parse(data);
    let catalogContainer = document.querySelector('.catalog-container');
    let paginationContainer = document.querySelector('.pagination-container');
    
    let charCount = (window.innerWidth < 1200) ? 40 : 50;
    
    let currentPage = 1;
    console.log(currentPage);
    makeSinglePage(plants, currentPage-1, amountPerPage);
    makePages(plants, amountPerPage);
    
    function makePages(plants, amountPerPage){
        const pages = Math.ceil(plants.length / amountPerPage);     

        const ul = document.createElement('ul');
        ul.classList.add('page-numbers');
        
        for(let i=0; i<pages; i++){
            const li = document.createElement('li');
            li.classList.add('page-number');
            li.innerText = i+1;

                if (currentPage == i+1) li.classList.add('page-number-active');

                li.addEventListener('click', () => {
                currentPage = i;
                

                let anotherNumber = document.querySelector('li.page-number-active');
                anotherNumber.classList.remove('page-number-active');
                li.classList.add('page-number-active');

                makeSinglePage(plants, currentPage, amountPerPage);
            });
            ul.appendChild(li);
        }
        paginationContainer.appendChild(ul);
    }
    
    function makeSinglePage(plants, currentPage, amountPerPage){
        
        const start = currentPage*amountPerPage;
        const end = start + amountPerPage;
        catalogContainer.innerHTML='';
        
        const plantsForDisplay = plants.slice(start, end);
        for (let plant of plantsForDisplay){
            
            const card = makeSingleCard(plant);
            catalogContainer.appendChild(card);
        }
    }
    function makeSingleCard(plantData){
        const card = document.createElement('a');
        card.href = "/catalog/" + plantData.latin_name;
        card.classList.add('card-grid');
        
        const img = document.createElement('img');
        img.src = '../images/catalog/' + plantData.id + '.png';
        img.alt = plantData.latin_name + ' ' + 'pic';
        const image = document.createElement('div');
        image.classList.add('image-container');
        image.appendChild(img);
        card.appendChild(image);
    
        const name = document.createElement('div');
        name.classList.add('name-container');
        name.innerText = plantData.name;
        card.appendChild(name);
    
        const description = document.createElement('div');
        description.classList.add('description-container');
        description.innerText = plantData.short_description.substring(0, charCount) + '...';
        card.appendChild(description);
    
        return card;
    }
}

function makeFiltration(){
    let requestedFilters = {category : [], light : null, watering : null, difficulty : null};
    let submit = new Event('submit');

    addRadioListeners();

    function addRadioListeners(){
        let lightRadios = document.querySelectorAll('input[name="light"]');
        let wateringRadios = document.querySelectorAll('input[name="watering"]');
        let difficultyRadios = document.querySelectorAll('input[name="difficulty"]');
        let checkboxes = document.querySelectorAll('.category-filter');
        let filterForm = document.querySelector('.filter-form');        
        
        console.log(JSON.stringify(requestedFilters, function(key, value) {
            return (value == null) ? undefined : value;
        } ));
        
    
        [lightRadios, wateringRadios, difficultyRadios]. forEach((radios) => {
            radios.forEach((radio) => {
                radio.addEventListener('click', function(){
                    if (this.checked = true){
                        
                        let name = radio.name;
                        requestedFilters[name] = this.value;
                        filterForm.dispatchEvent(submit);
                    }                           
                })
            })
        })
        
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('click', function(){
                if (requestedFilters.category.includes(this.value)){
                    let key = requestedFilters.category.indexOf(this.value);
                    requestedFilters.category.splice(key, 1);
                    

                    filterForm.dispatchEvent(submit);

                }else{
                    requestedFilters.category.push(this.value);
                    

                    filterForm.dispatchEvent(submit);
                }
            })
        })

        
        filterForm.addEventListener('submit', (event) => {
            event.preventDefault();
            
            console.log(requestedFilters);            
            ajax(requestedFilters);
        });

    }

    async function ajax(requestedFilters){
        let data = requestedFilters;
        let paginationContainer = document.querySelector('.pagination-container');
        paginationContainer.innerHTML ='';
        let response = await fetch('/catalog', {
            method: 'POST',
            headers: {
             'Content-Type': 'application/json;charset=utf-8'
             },
            body: JSON.stringify(data)
        });
    
        let result = await response.text();
            
        makePagination(result);
    }
}

function addListeners(){
    let lightLabels = document.querySelectorAll('.light-radio-label');
    let wateringLabels = document.querySelectorAll('.watering-radio-label');
    let difficultyLabels = document.querySelectorAll('.difficulty-radio-label');
    let categoryLabels = document.querySelectorAll('.category-label');

    let dropdownButton = document.querySelector('.dropdown-btn');
    let sidebar = document.querySelector('.sidebar-container');

    dropdownButton.addEventListener('click', () => {
        console.log('на меня нажали!');
        sidebar.classList.toggle('show');
    })

    let prevLight = null;
    lightLabels.forEach((label) => {
        label.addEventListener('click', () => {
            if (prevLight) prevLight.classList.remove('bold-label');
            label.classList.add('bold-label');
            prevLight = label;
        })
    })

    let prevWatering = null;
    wateringLabels.forEach((label) => {
        label.addEventListener('click', () => {
            if (prevWatering) prevWatering.classList.remove('bold-label');
            label.classList.add('bold-label');
            prevWatering = label;
        })
    })

    let prevDifficulty = null;
    difficultyLabels.forEach((label) => {
        label.addEventListener('click', () => {
            if (prevDifficulty) prevDifficulty.classList.remove('bold-label');
            label.classList.add('bold-label');
            prevDifficulty = label;
        })
    })

    
    categoryLabels.forEach((label) => {
        label.addEventListener('click', () => {

            if (label.classList.contains('bold-label')){
                label.classList.remove('bold-label');
            
            }else{
                label.classList.add('bold-label');
            }
            
        })
    })
}

