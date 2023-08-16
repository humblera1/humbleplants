<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="максим кошкин"/>
    <meta name="description" content="Наш каталог комнатных растений для начинающих и опытных цветоводов"/>
    <title><?= $pageName ?></title>
    <link rel="icon" href="images/icons/favicon.ico" type="image/x-icon">                          
    <link rel="shortcut icon" href="images/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/css/BasicTemplate.css">
</head>
<body>    
    <div class="super-grid">        
            <div class="header-container">
                <a onclick="javascript:history.back(); return false;" class="arrow-link-container"><img src="/images/icons/arrow-icon.png" alt="arrow-pic" class="arrow-link"></a>
                <a href="/" class="home-link-container"><img src="/images/icons/home-icon.png" alt="house-pic" class="home-link"></a>
            </div>
            <?php include "app/views/".$viewName."View.php" ?>                    
        <footer>
            <div class="footer-container">
                <p>humblerat</p>
                <p><time><?= date("Y"); ?></time></p>
            </div>
        </footer>
    </div>
</body>
</html>