<?php
function G_img($img, $size) {
    return  base_url() .'assets/img/uploads/'.$img .$size.'.jpg';
}?>
<div class="row">
    <div class="col-md-8 pl-0 pr-1">
        <div class="card">
            <img class="card-img-top" src="<?= G_img($readPost['Img_Url'], 'lg') ?>" alt="">
            <div class="card-body p-2">
                <h2 class="text-center"><?= $readPost['News_Title'] ?></h2>
                <div class="row d-block justify-content-center">
                    
                    <div class="col-12">
                        <?php if($readPost['reportlink']):?>
                            <audio controls class="bg-danger" style="border-radius: 10px; width: 100%">
                                <source src="<?= $readPost['reportlink'] ?>">
                            </audio>
                        <?php endif;?>
                    </div>
                  
                    <div class="col-12">
                        <a href="#comments" class="btn btn-danger btn-sm">
                        <i class="fas fa-comment"></i> Comments: <?= sizeof($commentsData)?></a> |
                        <?php if(isset($views)): ?>
                        <b class="">Views: <?= $views ?></b> |
                        <?php endif; ?>
                        <b class="">Shares: 1</b> |

                        <a href="#" class="btn btn-facebook btn-sm">
                            <i class="fab fa-facebook"> Share</i>
                        </a> 
                        <a href="$" class="btn btn-success btn-sm">
                            <i class="fab fa-whatsapp"> Share</i>
                        </a>
                    </div>

                </div>
                <h5 style="color:black;" class="text-justify">
                <?= $this->typography->auto_typography($readPost['Description'], TRUE) ?>
                </h5>
                <div class="row">
                    <div class="col-12">
                    <hr class="bg-danger">
                        <div class="row" id="comments">
                            <?php if(isset($commentsData)): ?>
                            <div class="col-12" >
                                <h4 class="text-center">Comments</h4>
                                <?php foreach($commentsData as $comment): ?>
                                <div class="card card-inner">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src="<?= base_url() ?>assets/img/face.jpg" class="img img-rounded img-fluid"/>
                                                <p class="text-secondary text-center">
                                                <?= date("d-m-y, g:i a", strtotime($comment['created_At'])) ?>
                                                </p>
                                                
                                            </div>
                                            <div class="col-md-10">
                                                <p><a><strong><?= $comment['comment_name'] ?></strong></a></p>
                                                <p><?= $comment['comment_comment'] ?></p>
                                                <p>
                                                    <a class="float-right btn btn-outline-primary ml-2">  <i class="fas fa-reply"></i> Reply</a>
                                                    <a class="float-right btn text-white btn-danger"> <i class="fas fa-heart"></i> Like</a>
                                                </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <hr class="bg-danger">
                            </div>
                            <?php endif; ?>
                            <div class="col-12">
                                <h4 class="text-center">Post Your Comment</h4>
                                <form action="<?= base_url() ?>posts/comment" method="post" id="commentsForm">
                                    <input type="hidden" name="news_id" value="<?= $this->uri->segments[3] ?>">
                                    <div class="form-group">
                                    <label for="comment_name">Name</label>
                                    <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Your Name">
                                    </div>
                                    <div class="form-group">
                                    <label for="comment_email">E-Mail</label>
                                    <input type="text" name="comment_email" id="comment_email" class="form-control" placeholder="Your Email Address">
                                    </div>
                                    <div class="form-group">
                                    <label for="comment_comment">Comment</label>
                                    <textarea class="form-control" name="comment_comment" id="comment_comment" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm" id="postComment">Post Comment</button>
                                </form>
                                <hr class="bg-danger">
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 pl-4" id="stickytop">
        <div class="row">
            <div class="col-12 p-0" style="border-bottom: 2px solid #dc3545;">
                <div class="row pl-3 d-flex justify-content-between">
                    <div class="w-auto pr-2 pl-2 bg-danger text-white w-25">
                         <?= strtoupper($relatedNws[0]['Categories']);?>
                    </div>
                    <div class="w-auto pr-4">
                        <a href="" class="text-danger"><span class="fas fa-chevron-left">&nbsp;&nbsp;</span></a>
                        <a href="" class="text-danger">&nbsp;&nbsp;<span class="fas fa-chevron-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <?php foreach($relatedNws as $nws):?>
            <div class="row d-flex justify-content-between pt-2">
                <div class="col-3 p-0 m-0">
                    <img class="card-img-top" src="<?= G_img($nws['Img_Url'], 'sm') ?>" alt="Vision Image">
                </div>
                <div class="col-9 pl-2">
                    <h6 class="card-title">
                        <a href="<?= site_url('/posts/read/' .$nws['id']) ?>" class="text-black">
                            <?= word_limiter($nws['News_Title'], 9) ?>
                        </a>
                    </h6>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
    </div>
  
</div>