<div class="row"></div>
    <div class="col-md-12">
    <?php echo validation_errors();?>
        <form action="<?php echo base_url() .'posts/create_post';?>" method="POST" id="NewPostForm" role="form">
        
            <div class="form-group">
                <label for="PostTitle">Title</label>
                <input type="text" class="form-control" name="PostTitle" id="PostTitle" placeholder="Post title">
            </div>
            <div class="form-group">
                <label for="PostContent">Body</label>
                <textarea name="PostContent" id="PostContent" class="form-control" rows="6" placeholder="Post content"></textarea>
            </div>
            <div class="form-group">
                <label for="PostType">Type</label>
                <select name="PostType" id="PostType" class="form-control">
                    <option value="">Type</option>
                    <option value="1">Local</option>
                    <option value="2">International</option>
                </select>
            </div>
            <div class="form-group">
                <label for="PostCategory">Category</label>
                <select name="PostCategory" id="PostCategory" class="form-control">
                    <option value="">Category</option>
                </select>
            </div>
            <div class="form-group">
                <label for="reportlink">Audio Report Link</label>
                <input type="text" class="form-control" name="reportlink" id="reportlink" placeholder="Audio Link">
            </div>
            <div class="form-group">
                <label for="PostFile">Image</label>
                <input type="file" class="form-control" id="PostFile" name="PostFile">
            </div>
            <button type="Post" name="SubmitPost" id="SubmitPost" class="btn btn-primary btn-block">Submit</button>
        </form>
    
        <div class="alert alert-success">
            <strong id="AddPostSuccess"></strong>
        </div>
    </div>
</div>