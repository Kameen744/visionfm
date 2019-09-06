<div class="row"></div>
    <div class="col-md-12">
    <?php echo validation_errors();?>
        <form action="<?php echo base_url() .'posts/create_post';?>" method="POST" id="NewPostForm" role="form">
            <div class="form-group">
                <label for="VideoTitle">Title</label>
                <input type="text" class="form-control" name="VideoTitle" id="VideoTitle" placeholder="Post title">
            </div>
            <div class="form-group">
                <label for="VideoPoster">Poster Image</label>
                <input type="file" class="form-control" id="VideoPoster" name="VideoPoster">
            </div>
            <div class="form-group">
                <label for="VideoFile">Poster Image</label>
                <input type="file" class="form-control" id="VideoFile" name="VideoFile">
            </div>
            <button type="Post" name="SubmitVideo" id="SubmitVideo" class="btn btn-primary btn-block">Submit</button>
        </form>
    
        <div class="alert alert-success">
            <strong id="AddPostSuccess"></strong>
        </div>
    </div>
</div>