<div class="page-container">
    <div class="page-grid">
        <div class="sidebar-container">

            <?php $categories = array_unique(array_column($params, 'category')); ?>
            
            <form method="POST" class="filter-form">
            <?php foreach($categories as $category): ?>
            <div class="row">
                <input type="checkbox" value="<?= $category; ?>" class="category_filter" id="<?= $category; ?>">
                    <label for="<?= $category; ?>"><?= $category; ?></label>
            </div>
            <?php endforeach; ?>
            <input type="submit" value="Фильтровать">


            <fieldset class='light-radio'>
                <legend>Требования к освещению</legend>

                <div>
                    <input type="radio" id="light-three" name="light" value="3"/>
                    <label for="light-three">Светолюбивые</label>
                </div>

                <div>
                    <input type="radio" id="light-two" name="light" value="2"/>
                    <label for="light-two">Переносят полутень</label>
                </div>

                <div>
                    <input type="radio" id="light-one" name="light" value="1"/>
                    <label for="light-one">Не требовательны к освещению</label>
                </div>
            </fieldset>

            <fieldset class='watering-radio'>
                <legend>Полив:</legend>

                <div>
                    <input type="radio" id="watering-three" name="watering" value="3"/>
                    <label for="watering-three">Частый и обильный</label>
                </div>

                <div>
                    <input type="radio" id="watering-two" name="watering" value="2"/>
                    <label for="watering-two">Умеренный</label>
                </div>

                <div>
                    <input type="radio" id="watering-one" name="watering" value="1"/>
                    <label for="watering-one">Редкий</label>
                </div>
            </fieldset>

            <fieldset class='difficulty-radio'>
                <legend>Сложность ухода</legend>

                <div>
                    <input type="radio" id="difficulty-three" name="difficulty" value="3"/>
                    <label for="difficulty-three">Капризные</label>
                </div>

                <div>
                    <input type="radio" id="difficulty-two" name="difficulty" value="2"/>
                    <label for="difficulty-two">Не требуют много внимания</label>
                </div>

                <div>
                    <input type="radio" id="difficulty-one" name="difficulty" value="1"/>
                    <label for="difficulty-one">Неприхотливые</label>
                </div>
            </fieldset>
            </form>
        </div>
        <div class="catalog-grid">
            <div class="catalog-container">
            </div>
            <div class="pagination-container"></div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="../css/Catalog.css">
<script src="../js/pagination.js"></script>
<script src="../js/filters.js"></script>
<script src="../js/ajax.js"></script>



<?php $data = json_encode($params); ?>
<script> fetchData('<?= $data ?>') </script>

<script> 


 

let filterForm = document.querySelector('.filter-form');

let lightRadio = document.querySelectorAll('input[name="light"]');
let wateringRadio = document.querySelectorAll('input[name="watering"]');
let difficultyRadio = document.querySelectorAll('input[name="difficulty"]');
console.log(lightRadio);
let radioData = {'category': [], 'light': null, 'watering': null, 'difficulty' : null};

lightRadio.forEach((radio) => {
    radio.addEventListener('click', function(){
        if (this.checked) radioData.light = this.value;
        console.log(JSON.stringify(radioData, function(key, value) {
            return (value == null) ? undefined : value;
        } ));
    })
})

wateringRadio.forEach((radio) => {
    radio.addEventListener('click', function(){
        if (this.checked) radioData.watering = this.value;
        console.log(JSON.stringify(radioData, function(key, value) {
            return (value == null) ? undefined : value;
        } ));
    })
})

difficultyRadio.forEach((radio) => {
    radio.addEventListener('click', function(){
        if (this.checked) radioData.difficulty = this.value;
        console.log(JSON.stringify(radioData, function(key, value) {
            return (value == null) ? undefined : value;
        } ));
    })
})




let checkboxes = document.querySelectorAll('.category_filter');
let requestedData = []
    
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('click', function(){
            if (radioData.category.includes(this.value)){
                let key = radioData.category.indexOf(this.value);
                radioData.category.splice(key, 1);
                console.log(radioData);

                let submit = new Event('submit');
                filterForm.dispatchEvent(submit);

            }else{
                radioData.category.push(this.value);
                console.log(radioData);

                let submit = new Event('submit');
                filterForm.dispatchEvent(submit);
            }
        })
    })





filterForm.addEventListener('submit', (event) => { 
    
    event.preventDefault();
    
    console.log(radioData);
    
    ajax(radioData);
});


</script>

