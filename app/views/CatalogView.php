<div class="welcome-container">Добро пожаловать в наш каталог!</div>
<div class="page-container">

    <div class="page-grid">
        <div class="button-container">
            
            <button class="dropdown-btn">
            <div class="drop-image"><img src="../images/catalog/drop.png" alt=""></div>
            <p>Показать фильтры</p>
            <!-- <div class="drop-image"><img src="../images/catalog/drop.png" alt=""></div> -->
            </button>

        </div>
        <div class="sidebar-container">

            <?php $categories = array_unique(array_column($params, 'category')); ?>
            
            <form method="POST" class="filter-form">
                <fieldset class='categories-fieldset'>
                <legend>Категории</legend>
                    <?php foreach($categories as $category): ?>
                        <div class="row">
                            <input type="checkbox" value="<?= $category; ?>" class="category-filter" id="<?= $category; ?>">
                            <label for="<?= $category; ?>" class="category-label"><?= $category; ?></label>
                        </div>
                    <?php endforeach; ?>              
                </fieldset>

            
                <div class="radios-container">
                    <fieldset class='light-radios'>
                    <legend>Требования к освещению</legend>
                    <div class="radio">
                        <input type="radio" id="light-three" name="light" value="3"/>
                        <label for="light-three" class="light-radio-label">Светолюбивые</label>
                    </div>

                    <div class="radio">
                        <input type="radio" id="light-two" name="light" value="2"/>
                        <label for="light-two" class="light-radio-label">Переносят полутень</label>
                    </div>

                    <div class="radio">
                        <input type="radio" id="light-one" name="light" value="1"/>
                        <label for="light-one" class="light-radio-label">Не требовательны к освещению</label>
                    </div>
                    </fieldset>

                    <fieldset class='watering-radios'>
                    <legend>Полив</legend>
                    <div class="radio">
                        <input type="radio" id="watering-three" name="watering" value="3"/>
                        <label for="watering-three" class="watering-radio-label">Частый и обильный</label>
                    </div>

                    <div class="radio">
                        <input type="radio" id="watering-two" name="watering" value="2"/>
                        <label for="watering-two" class="watering-radio-label">Умеренный</label>
                    </div>

                    <div class="radio">
                        <input type="radio" id="watering-one" name="watering" value="1"/>
                        <label for="watering-one" class="watering-radio-label">Редкий</label>
                    </div>
                    </fieldset>

                    <fieldset class='difficulty-radios'>
                    <legend>Сложность ухода</legend>
                    <div class="radio">
                        <input type="radio" id="difficulty-three" name="difficulty" value="3"/>
                        <label for="difficulty-three" class="difficulty-radio-label">Капризные</label>
                    </div>

                    <div class="radio">
                        <input type="radio" id="difficulty-two" name="difficulty" value="2"/>
                        <label for="difficulty-two" class="difficulty-radio-label">Не требуют много внимания</label>
                    </div>

                    <div class="radio">
                        <input type="radio" id="difficulty-one" name="difficulty" value="1"/>
                        <label for="difficulty-one" class="difficulty-radio-label">Неприхотливые</label>
                    </div>
                    </fieldset>
                </div>
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
<script src="../js/library.js"></script>

<?php $data = json_encode($params); ?>
<script> 



makePagination('<?= $data ?>');
makeFiltration(); 
addListeners();
</script>
