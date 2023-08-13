<?php

if($params['light'] === 1){
    $light = 'Растение <strong>не требовательно к освещению</strong> и переносит полутень';
}elseif($params['light'] === 2){
    $light = 'Растение любит свет, но может перенести и <strong>полутень</strong>';
}elseif($params['light'] === 3){
    $light = 'Растение нуждается в <strong>ярком освещении</strong>';
}

if($params['watering'] === 1){
    $watering = 'Способно долгое время <strong>обходиться без влаги</strong>';
}elseif($params['watering'] === 2){
    $watering = 'Ему необходим регулярный <strong>умеренный полив</strong>';
}elseif($params['watering'] === 3){
    $watering = 'Ему необходим систематический и <strong>обильный полив</strong>';
}

if($params['difficulty'] === 1){
    $difficulty = 'Неприхотливо и отлично подходит <strong>начинающим цветоводам</strong>';
}elseif($params['difficulty'] === 2){
    $difficulty = 'Неприхотливо, но имеет свои <strong>особенности</strong> ухода';
}elseif($params['difficulty'] === 3){
    $difficulty = 'Капризно и требует внимания и <strong>особого ухода</strong>';
}

?>
<div class="content-grid">
        <div class="left-grid">
            <div class="title-container"><h1><?php echo htmlspecialchars($params['name']); ?></h1></div>
            <div class="description-container"><p><?= htmlspecialchars($params['short_description']); ?></p></div>
        </div>

        <div class="center-container">
            <div class="image-container">
                <img src=<?= "../images/plants/".$params['id'].".png"; ?>  alt="" class="plant-img">
            </div>
        </div>

        <div class="right-grid">
            <div class="care-container">
                <p class="care">Особенности ухода</p>
            </div>

            <div class="sun-container"><img src="../images/icons/sun-icon.svg" alt="" class="sun-img"></div>
            <div class="sun-text-container"><p><?= $light; ?></p></div>

            <div class="water-container"><img src="../images/icons/water-icon.svg" alt="" class="water-img"></div>
            <div class="water-text-container"><p><?= $watering; ?></p></div>

            <div class="puzzle-container"><img src="../images/icons/puzzle-icon.svg" alt="" class="puzzle-img"></div>
            <div class="puzzle-text-container"><p><?= $difficulty; ?></p></div>

        </div>
    </div>

    <div class="main-text-container">
        <?php echo strip_tags($params['full_description'], '<hr><p>'); ?>
    </div>

<link rel="stylesheet" href="../css/Plant.css">






<?php


// echo "<pre>";
// print_r($params);
// echo "</pre>";


// echo strip_tags($params['full_description'], '<hr><p>');
?>