<?php
function G_img($img, $size) {
    return  base_url() .'assets/img/uploads/'.$img .$size.'.jpg';
}?>

<?php if(isset($newsNext)): ?>
<div class="row">
    <div class="col-12 p-0" style="border-bottom: 2px solid #dc3545;">
        <div class="row pl-3 d-flex justify-content-between">
            <div class="w-auto p-0 pr-2 pl-2 bg-danger text-white">NEWS</div>
            <div class="pr-3 d-inline-flex">
                <li class="li bg-danger hnd pr-2 pl-2 mr-1" id="newsPrev" value="<?= $curPrev?>">
                    <i class="text-white fas fa-chevron-left"></i>
                </li>
                <li class="li bg-danger hnd pl-2 pr-2" id="newsNext" value="<?= $curNext?>">
                    <i class="text-white fas fa-chevron-right"></i>
                </li>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 p-0 pr-3">          
        <div class="card">
        <img class="card-img-top" src="<?= G_img($newsNext[2]['Img_Url'], 'md') ?>" alt="<?= $newsNext[2]['News_Title'] ?>">
        <div class="card-body">
            <h4 class="card-title">
                <a href="<?= site_url('/posts/read/' .$newsNext[2]['id']) ?>" class="text-dark">
                <?= word_limiter($newsNext[2]['News_Title'], 10) ?>
                </a>
            </h4>
        </div>
        </div>

        <div class="card">
            <img class="card-img-top" src="<?= G_img($newsNext[3]['Img_Url'], 'md')?>" alt="<?= $newsNext[3]['News_Title'] ?>">
            <div class="card-body">
                <h4 class="card-title">
                    <a href="<?= site_url('/posts/read/' .$newsNext[3]['id'])?>" class="text-dark">
                    <?= word_limiter($newsNext[3]['News_Title'], 10) ?>
                    </a>
                </h4>
            </div>
        </div>
    </div>
    <div class="col-md-6 p-0 pl-2">
        <div class="row d-flex justify-content-between">  
            <div class="col-4 p-0 m-0">
                <img class="card-img-top" src="<?= G_img($newsNext[3]['Img_Url'], 'sm')?>" alt="<?= $newsNext[3]['News_Title'] ?>">
            </div>
            <div class="col-8 p-0 pl-2">
                <h6 class="card-title pr-3">
                    <a href="<?= site_url('/posts/read/' .$newsNext[3]['id'])?>" class="text-dark">
                    <?= word_limiter($newsNext[3]['News_Title'], 10) ?>
                    </a>
                </h6>
            </div>
        </div>
        <div class="row d-flex justify-content-between pt-2">
            <div class="col-4 p-0 m-0">
                <img class="card-img-top" src="<?= G_img($newsNext[3]['Img_Url'], 'sm')?>">
            </div>
            <div class="col-8 p-0 pl-2">
                <h6 class="card-title pr-3">
                    <a href="<?= site_url('/posts/read/' .$newsNext[3]['id'])?>" class="text-dark">
                    <?= word_limiter($newsNext[3]['News_Title'], 10) ?>
                    </a>
                </h6>
            </div>
        </div>
        <div class="row d-flex justify-content-between pt-2">
            <div class="col-4 p-0 m-0">
                <img class="card-img-top" src="<?= G_img($newsNext[3]['Img_Url'], 'sm')?>">
            </div>
            <div class="col-8 p-0 pl-2">
                <h6 class="card-title pr-3">
                    <a href="<?= site_url('/posts/read/' .$newsNext[3]['id'])?>" class="text-dark">
                    <?= word_limiter($newsNext[3]['News_Title'], 10) ?>
                    </a>
                </h6>
            </div>
        </div>
        <div class="row d-flex justify-content-between pt-2">
            <div class="col-4 p-0 m-0">
                <img class="card-img-top" src="<?= G_img($newsNext[3]['Img_Url'], 'sm')?>">
            </div>
            <div class="col-8 p-0 pl-2">
                <h6 class="card-title pr-3">
                    <a href="<?= site_url('/posts/read/' .$newsNext[3]['id'])?>" class="text-dark">
                    <?= word_limiter($newsNext[3]['News_Title'], 10) ?>
                    </a>
                </h6>
            </div>
        </div>
        <div class="row d-flex justify-content-between pt-2">
            <div class="col-4 p-0 m-0">
                <img class="card-img-top" src="<?= G_img($newsNext[3]['Img_Url'], 'sm')?>">
            </div>
            <div class="col-8 p-0 pl-2">
                <h6 class="card-title pr-3">
                    <a href="<?= site_url('/posts/read/' .$newsNext[3]['id'])?>" class="text-dark">
                    <?= word_limiter($newsNext[3]['News_Title'], 10) ?>
                    </a>
                </h6>
            </div>
        </div>
        <div class="row d-flex justify-content-between pt-2">
            <div class="col-4 p-0 m-0">
                <img class="card-img-top" src="<?= G_img($newsNext[3]['Img_Url'], 'sm')?>">
            </div>
            <div class="col-8 p-0 pl-2">
                <h6 class="card-title pr-3">
                    <a href="<?= site_url('/posts/read/' .$newsNext[3]['id'])?>" class="text-dark">
                    <?= word_limiter($newsNext[3]['News_Title'], 10) ?>
                    </a>
                </h6>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if(isset($intNext)): ?>
    <div class="row">
        <div class="col-12 p-0" style="border-bottom: 2px solid #dc3545;">
            <div class="row pl-3 d-flex justify-content-between">
                <div class="w-auto pr-2 pl-2 bg-danger text-white w-25">
                    FOREIGN NEWS
                </div>
                <div class="pr-3 d-inline-flex">
                    <li class="li bg-danger hnd pr-2 pl-2 mr-1" id="intPrev" value="<?= $curPrev?>">
                        <i class="text-white fas fa-chevron-left"></i>
                    </li>
                    <li class="li bg-danger hnd pl-2 pr-2" id="intNext" value="<?= $curNext?>">
                        <i class="text-white fas fa-chevron-right"></i>
                    </li>
                </div>
            </div>
        </div>
    </div>
    <?php foreach($intNext as $int): ?>
        <div class="row d-flex justify-content-between pt-1">
            <div class="col-3 p-0 m-0">
                <img class="card-img-top" src="<?= G_img($int['Img_Url'], 'sm') ?>" alt="">
            </div>
            <div class="col-9 pl-2">
                <h6 class="card-title pr-3">
                    <a href="<?= site_url('/posts/read/' .$int['id'])?>" class="text-dark">
                    <?= word_limiter($int['News_Title'], 8) ?>
                    </a>
                </h6>
            </div>
        </div> 
    <?php endforeach; ?>
<?php endif; ?>

<?php if(isset($polNext)): ?>
    <div class="row">
        <div class="col-12 p-0" style="border-bottom: 2px solid #dc3545;">
            <div class="row pl-3 d-flex justify-content-between">
                <div class="w-auto pr-2 pl-2 bg-danger text-white">POLITICS</div>
                <div class="pr-3 d-inline-flex">
                    <li class="li bg-danger hnd pr-2 pl-2 mr-1" id="polPrev" value="<?= $curPrev?>">
                        <i class="text-white fas fa-chevron-left"></i>
                    </li>
                    <li class="li bg-danger hnd pl-2 pr-2" id="polNext" value="<?= $curNext?>">
                        <i class="text-white fas fa-chevron-right"></i>
                    </li>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-md-12">
            <div class="row pt-0">
                <div class="col-md-4 pl-1 pr-1">
                    <div class="card">
                        <img class="card-img-top" src="<?= G_img($polNext[0]['Img_Url'], 'md') ?>" alt="">
                        <div class="imagenews text-center">
                            <h6><a href="<?= site_url('/posts/read/' .$polNext[0]['id']) ?>" class="text-white">
                                <?= word_limiter($polNext[0]['News_Title'], 15) ?>
                            </a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pl-1 pr-1">
                    <div class="card">
                        <img class="card-img-top" src="<?= G_img($polNext[1]['Img_Url'], 'md') ?>" alt="">
                        <div class="imagenews text-center">
                            <h6><a href="<?= site_url('/posts/read/' .$polNext[1]['id']) ?>" class="text-white">
                                <?= word_limiter($polNext[1]['News_Title'], 15) ?>
                            </a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pl-1 pr-1">
                    <div class="card">
                        <img class="card-img-top" src="<?= G_img($polNext[2]['Img_Url'], 'md') ?>" alt="">
                        <div class="imagenews text-center">
                            <h6><a href="<?= site_url('/posts/read/' .$polNext[2]['id']) ?>" class="text-white">
                                <?= word_limiter($polNext[2]['News_Title'], 15) ?>
                            </a></h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pt-1">
                <div class="col-md-4 pl-1 pr-1">
                    <div class="card">
                        <img class="card-img-top" src="<?= G_img($polNext[3]['Img_Url'], 'md') ?>" alt="">
                        <div class="imagenews text-center">
                            <h6><a href="<?= site_url('/posts/read/' .$polNext[3]['id']) ?>" class="text-white">
                                <?= word_limiter($polNext[3]['News_Title'], 15) ?>
                            </a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pl-1 pr-1">
                    <div class="card">
                        <img class="card-img-top" src="<?= G_img($polNext[4]['Img_Url'], 'md') ?>" alt="">
                        <div class="imagenews text-center">
                            <h6><a href="<?= site_url('/posts/read/' .$polNext[4]['id']) ?>" class="text-white">
                                <?= word_limiter($polNext[4]['News_Title'], 15) ?>
                            </a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pl-1 pr-1">
                    <div class="card">
                        <img class="card-img-top" src="<?= G_img($polNext[5]['Img_Url'], 'md') ?>" alt="">
                        <div class="imagenews text-center">
                            <h6><a href="<?= site_url('/posts/read/' .$polNext[5]['id']) ?>" class="text-white">
                                <?= word_limiter($polNext[5]['News_Title'], 15) ?>
                            </a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if(isset($busNext)): ?>
    <div class="row pr-1">
        <div class="col-12 p-0" style="border-bottom: 2px solid #dc3545;">
            <div class="row pl-3 d-flex justify-content-between">
                <div class="w-auto pr-2 pl-2 bg-danger text-white w-25">
                    BUSINESS
                </div>
                <div class="pr-3 d-inline-flex">
                    <li class="li bg-danger hnd pr-2 pl-2 mr-1" id="busPrev" value="<?= $curPrev?>">
                        <i class="text-white fas fa-chevron-left"></i>
                    </li>
                    <li class="li bg-danger hnd pl-2 pr-2" id="busNext" value="<?= $curNext?>">
                        <i class="text-white fas fa-chevron-right"></i>
                    </li>
                </div>
            </div>
        </div>
    </div>
    <div class="row pr-1">
        <div class="col-md-12 p-0">
            <div class="card">
            <img class="card-img-top" src="<?= G_img($busNext[0]['Img_Url'], 'lg') ?>" alt="">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="<?= site_url('/posts/read/' .$busNext[0]['id'])?>" class="text-dark">
                        <?= word_limiter($busNext[0]['News_Title'], 10) ?>
                        </a>
                    </h4>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>