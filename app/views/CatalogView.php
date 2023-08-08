


<div class="page-container">
    <div class="page-grid">
        <div class="sidebar-container">

        </div>
        <div class="catalog-grid">
            <div class="catalog-container">
<!-- ddddddddd -->


                
            </div>
            <div class="pagination-container"></div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="../css/Catalog.css">
<script src="../js/pagination.js"></script>

<?php 
                // $array = [];
                // for ($i=1; $i< 10; $i++){
                //     $array[] = ['id'=>$i, 'name'=>'aloeae', 'short_description'=>'some kind of really short descriprion'];
                // }

                
                // echo "<pre>";
                // print_r($params);
                // echo "</pre>";

                $data = json_encode($params);
                ?>
                <script>fetchData('<?= $data ?>')</script>