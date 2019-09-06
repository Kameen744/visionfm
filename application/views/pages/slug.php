<?php
function G_img($img, $size) {
    return  base_url() .'assets/img/uploads/'.$img .$size.'.jpg';
}?>

<div class="row">
    <div class="col-md-6 pl-0 pr-1">
        <div class="card">
            <?php
            echo'
            <img class="card-img-top" src="'.G_img($locNws[0]['Img_Url'], 'lg').'" alt="">
            <div class="imagenews p-2">
                <h4>
                    <a href="'.site_url('/posts/read/' .$locNws[0]['id']).'" class="text-white">
                    '.$locNws[0]['News_Title'].'
                    </a>
                </h4>
            </div>
            '
            ?>
        </div>
    </div>
    <div class="col-md-6 pr-1 pl-1 pt-0">
        <div class="row">
            <div class="col-md-6 pr-1">
                <div class="card">
                <?php
                    echo'
                    <img class="card-img-top" src="'.G_img($locNws[1]['Img_Url'], 'md').'" alt="">
                    <div class="imagenews p-2">
                        <h6>
                            <a href="'.site_url('/posts/read/' .$locNws[1]['id']).'" class="text-white">
                            '.$locNws[1]['News_Title'].'
                            </a>
                        </h6>
                    </div>
                    '
                ?>
                </div>
            </div>
            <div class="col-md-6 pl-1">
                <div class="card">
                <?php
                    echo'
                    <img class="card-img-top" src="'.G_img($locNws[2]['Img_Url'], 'md').'" alt="">
                    <div class="imagenews p-2">
                       <h6>
                            <a href="'.site_url('/posts/read/' .$locNws[2]['id']).'" class="text-white">
                            '.$locNws[2]['News_Title'].'
                            </a>
                        </h6>
                    </div>
                    '
                ?>
                </div>
            </div>
        </div>

        <div class="row pt-2">
            <div class="col-md-6 pr-1">
                <div class="card">
                <?php
                    echo'
                    <img class="card-img-top" src="'.G_img($locNws[3]['Img_Url'], 'md').'" alt="">
                    <div class="imagenews p-2">
                        <h6>
                            <a href="'.site_url('/posts/read/' .$locNws[3]['id']).'" class="text-white">
                            '.$locNws[3]['News_Title'].'
                            </a>
                        </h6>
                    </div>
                    '
                ?>
                </div>
            </div>
            <div class="col-md-6 pl-1">
                <div class="card">
                <div class="nws-tag">
                    <span class="notify-badge-in">News</span>
                </div>
                <?php
                    echo'
                    <img class="card-img-top" src="'.G_img($locNws[4]['Img_Url'], 'md').'" alt="">
                    <div class="imagenews p-2">
                        <h6>
                            <a href="'.site_url('/posts/read/' .$locNws[4]['id']).'" class="text-white">
                            '.$locNws[4]['News_Title'].'
                            </a>
                        </h6>
                    </div>
                    '
                ?>
                </div>
            </div>
        </div>
    </div>
</div>