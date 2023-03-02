<?php
foreach ($arr as $rows) {
    ?>
    <div class="item">
        <div class="article"><a href="index.php?controller=news_detail&id=<?php echo $rows->pk_news_id?>" class="image"> <img
                        alt="<?php echo $rows->c_name?>"
                        class="img-responsive"
                        src="public/upload/news/<?php echo $rows->c_img;?>"
                        title="<?php echo $rows->c_name;?>"> </a>
            <div class="info">
                <h3><a href="index.php?controller=news_detail&id=<?php echo $rows->pk_news_id?>"><?php echo $rows->c_name?></a></h3>
                <p class="desc">
                <p><?php echo $rows->c_description?></p>
                </p>
            </div>
        </div>
    </div>

<?php } ?>


