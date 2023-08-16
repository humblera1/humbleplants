<link rel="stylesheet" href="/css/Articles.css">
<div class="page-container">
<div class="page-title-container"><h1>Добро пожаловать на страницу статей</h1></div>    
    <div class="articles-container">   
        <?php foreach($params as $article): ?>
        <a href=<?="/articles/{$article['id']}"; ?> class="article-grid">
            <div class="image-container">
                <img src=<?= "/images/articles/{$article['id']}.jpg"; ?> alt="">
            </div>
            <div class="text-container">
                <div class="text-dash-container">
                    <hr>
                </div>
                <div class="text-title-container">
                    <p><?= $article['title']; ?></p>
                </div>
            </div>
        </a>
        <?php endforeach; ?>  
    </div>
</div>
