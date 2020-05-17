 <!-- Navigation-->
 <?php if ($this->session->userdata('logged_in') == FALSE) {
    redirect('login');
  } ?>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">

   <span class="navbar-brand">
     <?php echo anchor('home', "Apprenticeship Data"); ?>
   </span>
   <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarResponsive">
     <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
       <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
         <span class="nav-link">
           <i class="fa fa-fw fa-home"></i>
           <span class="nav-link-text"><?php echo anchor('home', "Home"); ?></span>
         </span>
       </li>
       <?php if (($this->session->userdata('access_level') == 1)) { ?>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Company">
           <span class="nav-link">
             <i class="fa fa-fw fa-file"></i>
             <span class="nav-link-text"><?php echo anchor('company', "Company Form"); ?></span>
           </span>
         </li>
         <?php if ($this->session->userdata('status') == "Boleh Magang") { ?>
           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Week">
             <span class="nav-link">
               <i class="fa fa-fw fa-file"></i>
               <span class="nav-link-text"><?php echo anchor('weekly', "Weekly Form"); ?></span>
             </span>
           </li>
       <?php }
        } ?>
       <?php if (($this->session->userdata('access_level') > 1)) { ?>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Company">
           <span class="nav-link">
             <i class="fa fa-fw fa-th-list"></i>
             <span class="nav-link-text"><?php echo anchor('list/internship', "Internship List"); ?></span>
           </span>
         </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Week">
           <span class="nav-link">
             <i class="fa fa-fw fa-th-list"></i>
             <span class="nav-link-text"><?php echo anchor('list/student', "Student List"); ?></span>
           </span>
         </li>
         <?php if ($this->session->userdata('access_level') == 4) { ?>
           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Employee">
             <span class="nav-link">
               <i class="fa fa-fw fa-th-list"></i>
               <span class="nav-link-text"><?php echo anchor('list/employee', "Employee List"); ?></span>
             </span>
           </li>
           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
             <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
               <i class="fa fa-fw fa-wrench"></i>
               <span style="color: white" class="nav-link-text">Create User</span>
             </a>
             <ul class="sidenav-second-level collapse" id="collapseComponents">
               <li>
                 <?php echo anchor('create/karyawan', "Karyawan"); ?>
               </li>
               <li>
                 <?php echo anchor('create/mahasiswa', "Mahasiswa"); ?>
               </li>
             </ul>
           </li>
       <?php }
        } ?>


     </ul>
     <ul class="navbar-nav sidenav-toggler">
       <li class="nav-item">
         <a class="nav-link text-center" id="sidenavToggler">
           <i class="fa fa-lg fa-angle-left"></i>
         </a>
       </li>
     </ul>
     <ul class="navbar-nav ml-auto">

       <li class="nav-item">
         <a disabled class="nav-link" data-toggle="modal" data-target="#profile">
           <i class="fa fa-fw fa-user-circle"></i><?php echo $this->session->userdata('nama') ?></a>
       </li>
       <li class="nav-item">
         <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
           <i class="fa fa-fw fa-sign-out"></i>Logout</a>
       </li>
     </ul>
   </div>
 </nav>
 <!-- Logout Modal-->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
       <div class="modal-footer">
         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
         <?php echo anchor('logout', "<span class='btn btn-primary'>Logout</span>"); ?>
         <!-- <a class="btn btn-primary" href="login.html">Logout</a> -->
       </div>
     </div>
   </div>
 </div>
 <!-- Profile-->
 <div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body" style="font-size: 35px;"> <i class="fa fa-fw fa-user-circle" style="font-size: 40px;"></i><?php echo $this->session->userdata('nama') ?></div>
       <div class="modal-body">
         <?php echo anchor('home', "<span class='btn btn-primary btn-block'>View Profile</span>"); ?>
       </div>
       <div class="modal-body">
         <?php echo anchor('profile/c/pass', "<span class='btn btn-primary btn-block'>Change Password</span>"); ?>
       </div>
       <div class="modal-footer">
         <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
         <?php echo anchor('logout', "<span class='btn btn-primary'>Logout</span>"); ?>
       </div>
     </div>
   </div>
 </div>