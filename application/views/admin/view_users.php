<div class="row">
    <h2>All registered users</h2>
    <h3 class="text-center" id="deleteUserMsg"></h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>id</th>
                <th>User Name</th>
                <th>Password</th>
                <th>Station</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($users as $val): ?>
        <tr>
            <th><?= $val['id'] ?></th>
            <th><?= $val['User_Name'] ?></th>
            <th><?= $val['User_Password'] ?></th>
            <th><?= $val['Station_Name'] ?></th>
            <th>
                <button class="btn btn-xs btn-info"  value="<?= $val['id']?>" id="editUser">Edit</button>
                <button class="btn btn-xs btn-danger"  value="<?= $val['id']?>" id="delUser">Delete</button>
            </th>
        </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
