<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-12">
                <h2 class="py-0">Add New Station</h2>
                <?php echo form_open(base_url().'admin/addNewStation', ['class' => 'form', 'id' => 'addNewStationFrm']);?>
                    <div class="form-group">
                        <input type="text" class="form-control" name="StationName" placeholder="Station Name">
                        <b class="text-danger"><?php echo form_error('StationName') ?></b>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="StationFrequency" placeholder="Frequency">
                        <b class="text-danger"><?php echo form_error('StationFrequency') ?></b>
                    </div>
                    <hr>
                    <button class="btn btn-primary btn-block" id="AddStationsSubmit">Add New Station</button>
                <?php form_close(); ?>
            </div>
            <?php if(isset($stationsArr)): ?>
            <div class="col-12">
                <h3 class="text-center">Stations</h3>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Station</th>
                            <th>Frequency</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($stationsArr as $station): ?>
                        <tr>
                            <td scope="row"><?= $station['Station_Name'] ?></td>
                            <td><?= $station['Frequency']?></td>
                            <td><button type="button" id="delDeptCourseBtn" class="btn btn-sm btn-danger btn-circle" value="<?=$station['id']?>"><i class="fas fa-trash"></i></button></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-12">
                <h2 class="py-0">Add New User</h2>
                <?php echo form_open(base_url().'admin/addNewUser', ['class' => 'shadow-lg']);?>
                    <div class="form-group">
                    <select class="form-control" name="stationsName" id="stationsName">
                        <option value="">Select Station</option>
                        <?php foreach($stationsArr as $stn):?>
                            <option value="<?= $stn['id']?>"><?= $stn['Station_Name']?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="AddUserName" id="AddUserName" placeholder="User Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="AddUserPassword" id="AddUserPassword" placeholder="Password">
                    </div>
                    <button class="btn btn-primary btn-block" id="AddUserSubmit">Add New User</button>

                <?php echo form_close(); ?>
            </div>
            <?php if(isset($usersArr)): ?>
            <div class="col-12" id="reportersContainer">
                <h3 class="text-center">Reporters</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Station</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($usersArr as $user): ?>
                        <tr>
                            <td scope="row"><?= $user['User_Name'] ?></td>
                            <td><?= $user['Station_Name']?></td>
                            <td><button type="button" id="delUser" class="btn btn-sm btn-danger btn-circle" value="<?=$user['id']?>"><i class="fas fa-trash"></i></button></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
        </div>

    </div>
</div>
