function fetchData(data){
    const plants = JSON.parse(data);

    let catalogContainer = document.querySelector('.catalog-container');
    

    let content = document.querySelector('.pagination-container');
    content.innerHTML ='';

    

    let charCount = 50;
    if (window.innerWidth < 1200) charCount = 40;

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

    const currentPage = 1;
    const amountPerPage = 9;

    // let catalogContainer = document.querySelector('.catalog-container');
    
    displayCards(plants, 0, amountPerPage);
    makePagination(plants, amountPerPage);

    

    function makePagination(plants, amountPerPage){
        const pages = Math.ceil(plants.length / amountPerPage);
        

        const ul = document.createElement('ul');
        ul.classList.add('page-numbers');
        
        for(let i=0; i<pages; i++){
            const li = document.createElement('li');
            li.classList.add('page-number');
            li.innerText = i+1;

                if (currentPage == i+1) li.classList.add('page-number-active');

                li.addEventListener('click', () => {
                const currentPage = i;

                let anotherNumber = document.querySelector('li.page-number-active');
                anotherNumber.classList.remove('page-number-active');
                li.classList.add('page-number-active');

                displayCards(plants, currentPage, amountPerPage);
            });

            ul.appendChild(li);
        }

        
        const paginationContainer = document.querySelector('.pagination-container');
        
        paginationContainer.appendChild(ul);
    }

    function displayCards(plants, currentPage, amountPerPage){
        
        const start = currentPage*amountPerPage;
        const end = start + amountPerPage;
        catalogContainer.innerHTML='';
        
        const plantsForDisplay = plants.slice(start, end);
        for (let plant of plantsForDisplay){
            
            const card = makeSingleCard(plant);
            catalogContainer.appendChild(card);
        }
    }
}
