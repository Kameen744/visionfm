<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Vision FM</h1>
                  </div>
                 
                  <h3><?php echo $title;?></h3>
                  <?php echo form_open('admin/login', 'class="user"'); ?>
                
                    <div class="form-group">
                        <input class="form-control form-control-user" placeholder="User Name" name="UserName" type="text" autofocus>
                        <b class="text-danger"><?php echo form_error('UserName') ?></b>
                    </div>

                    <div class="form-group">
                         <input class="form-control form-control-user" placeholder="Password" name="UserPassword" type="password">
                        <b class="text-danger"><?php echo form_error('UserPassword') ?></b>
                    </div>
                    
                    <button class="btn btn-danger btn-user btn-block" type="submit">Login</button>
                    <hr>
                    <?php echo form_close();?>
                 
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

   