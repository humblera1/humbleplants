<h1>articles page!</h1>
<div class="page-container">
    <div class="articles-container">


        
    <?php foreach($params as $article): ?>
        <a href=<?= "/articles/{$article['id']}"; ?> class="article-grid">
            <div class="image-container">
                <img src=<?= "../images/articles/{$article['id']}.jpg"; ?> alt="">
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
        
        

        <!-- <div class="article-grid">
            <div class="image-container">
                <img src="../images/articles/2.jpg" alt="">
            </div>
            <div class="text-container">
                <div class="text-dash-container">
                    <hr>
                </div>
                <div class="text-title-container">
                    <p>Lorem ipsum dolor sit.</p>
                </div>
            </div>
        </div> 
        
        

        <div class="article-grid">
            <div class="image-container">
                <img src="" alt="">
            </div>
            <div class="text-container">
                <div class="text-title-container">
                    <p>Статья 1</p>
                </div>
                <div class="text-description-container">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, perspiciatis.</p>
                </div>
            </div>
        </div>   -->



    </div>
</div>

<link rel="stylesheet" href="../css/Articles.css">