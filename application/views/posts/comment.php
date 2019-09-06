<?php if(isset($postComment)): ?>
    <?php if(isset($commentsData)): ?>
        <div class="col-12" >
            <h4 class="text-center">Comments</h4>
            <?php foreach($commentsData as $comment): ?>
                <div class="card card-inner">
            	    <div class="card-body">
            	        <div class="row">
                
                    	    <div class="col-md-2">
                    	        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                    	        <p class="text-secondary text-center">
                                <?= date("d-m-y, g:i a", strtotime($comment['created_At'])) ?>
                                </p>
                    	    </div>
                    	    <div class="col-md-10">
                    	        <p><a><strong><?= $comment['comment_name'] ?></strong></a></p>
                    	        <p><?= $comment['comment_comment'] ?></p>
                    	        <p>
                    	            <a class="float-right btn btn-outline-primary ml-2"><i class="fas fa-reply"></i> Reply</a>
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
            <input type="hidden" name="news_id" value="<?= $postComment ?>">
            <div class="form-group">
            <label for="comment_name">Name</label>
            <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Your Name">
                <b class="text-danger"><?= form_error('comment_name')?></b>
            </div>
            <div class="form-group">
            <label for="comment_email">E-Mail</label>
            <input type="text" name="comment_email" id="comment_email" class="form-control" placeholder="Your Email Address">
                <b class="text-danger"><?= form_error('comment_email')?></b>
            </div>
            <div class="form-group">
            <label for="comment_comment">Comment</label>
            <textarea class="form-control" name="comment_comment" id="comment_comment" rows="3"></textarea>
                <b class="text-danger"><?= form_error('comment_comment')?></b>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" id="postComment">Post Comment</button>
        </form>
        <hr class="bg-danger">
    </div>
    
<?php endif; ?>