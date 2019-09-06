<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Vision FM</div>
    </a>

    <li class="nav-item active">
        <a class="nav-link" href="#">
            <i class="fas fa-user-alt"></i>
            <span><?php echo $this->session->userdata('reporter_name'); ?></span>
        </a>
    </li>
    
    <hr class="sidebar-divider">
   
    <div class="sidebar-heading">
        Interface
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
          <i class="fas fa-list-alt"></i>
          <span>Manage Posts</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionSidebar">
          <div class="bg-danger py-2 collapse-inner rounded">
            <h6 class="collapse-header">Posts:</h6>
            <button class="btn btn-sm btn-block btn-secondary userdashlink" value="new_post">New Post</button>
            <button class="btn btn-sm btn-block btn-secondary userdashlink" value="view_posts">View Posts</button>
          </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePosts" aria-expanded="true" aria-controls="collapsePosts">
          <i class="fas fa-list-alt"></i>
          <span>Programs/Reports</span>
        </a>
        <div id="collapsePosts" class="collapse" aria-labelledby="headingPosts" data-parent="#accordionSidebar">
          <div class="bg-danger py-2 collapse-inner rounded">
            <h6 class="collapse-header">Programs/Reports</h6>
            <button class="btn btn-sm btn-block btn-secondary userdashlink" value="program_schedule">Programs Schedule</button>
            <button class="btn btn-sm btn-block btn-secondary userdashlink" value="upload_video">Upload Video Clip</button>
            <button class="btn btn-sm btn-block btn-secondary userdashlink" value="upload_report">Upload Report</button>
          </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAbout" aria-expanded="true" aria-controls="collapseAbout">
          <i class="fas fa-list-alt"></i>
          <span>About/Contact</span>
        </a>
        <div id="collapseAbout" class="collapse" aria-labelledby="headingAbout" data-parent="#accordionSidebar">
          <div class="bg-danger py-2 collapse-inner rounded">
            <h6 class="collapse-header">About - Contact</h6>
            <button class="btn btn-sm btn-block btn-secondary userdashlink" value="add_about">Add-Edit About</button>
            <button class="btn btn-sm btn-block btn-secondary userdashlink" value="add_contact">Add-Edit Contacts</button>
          </div>
        </div>
    </li>

    </ul>
 
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                        <?php echo $this->session->userdata('reporter_name'); ?>
                        </span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" 
                        data-toggle="modal" data-target="#adminLogoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                        </a>
                    </div>
                </li>
                </ul>
            </nav>
            <!-- end of top navbar -->
            <div class="container-fluid" id="ReporterMainPage">
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Vision FM 2019</span>
                </div>
                </div>
            </footer>

        </div>
    </div>
</div>