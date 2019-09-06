<div class="row"></div>
    <div class="col-md-12">
    <?php echo validation_errors();?>
        <div class="row">
            <div class="col-md-4">
                <form action="<?php echo base_url() .'posts/upload_video_file';?>" method="POST" id="NewVideoForm" role="form">
                    <div class="form-group">
                        <label for="VideoTitle">Title</label>
                        <input type="text" class="form-control" name="VideoTitle" id="VideoTitle" placeholder="Post title">
                    </div>
                    <div class="form-group">
                        <label for="VideoPoster">Poster Image</label>
                        <input type="file" class="form-control" id="VideoPoster" name="VideoPoster">
                    </div>
                    <div class="form-group">
                        <label for="VideoFile">Video File</label>
                        <input type="file" class="form-control" id="VideoFile" name="VideoFile">
                    </div>
                    <button type="Post" name="SubmitVideo" id="SubmitVideo" class="btn btn-primary btn-block">Submit</button>
                </form>
            
                <div class="alert alert-success">
                    <strong id="AddPostSuccess"></strong>
                </div>
            </div>
            <div class="col-md-8" id="VideosTable">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Vid Title</th>
                            <!-- <th>File Name</th>
                            <th>Poster Name</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($VidTable as $val):?>
                        <tr>
                            <td><?= $val['Video_Title']?></td>
                          
                            <td>
                                <button class="btn btn-xs btn-info" value="<?= $val['id']?>" id="">Edit</button>
                                <button class="btn btn-xs btn-danger" value="<?= $val['id']?>" id="deleteVid">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>