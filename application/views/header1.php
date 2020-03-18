<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Chalidanna</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('dist/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css"href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css">
  <link rel="stylesheet" type="text/css"href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
  <script src="<?=base_url('dist/vendor/jquery/jquery.min.js');?>"></script>

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('dist/css/sb-admin-2.min.css');?>" rel="stylesheet">

  <style>
  td{ word-break: break-all;}
  
  th{white-space: nowrap;}
  </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/Main/dashboard');?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Blok</span></a>
      </li>
         
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
 
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

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">         

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Staff</span>
                <img class="img-profile rounded-circle" src="https://videoin.id/vendor/avkit/uikit/img/avatar.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url() ?>index.php/main/profileadmin">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="<?php echo base_url() ?>index.php/main/changepassword">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
              
  <style>
  @media (max-width:768px) {
    .accordion {
      z-index: 99;
      position: fixed;
    }
    .sidebar .nav-item .nav-link span{
      font-size: .75rem;
    }
  }
  </style>
  <script>
    sidebarOverlay()
    $( window ).resize(function() {
      sidebarOverlay()
    });
    function sidebarOverlay(){
      var sidebarbrand = document.getElementsByClassName("sidebar-brand")
      sidebarbrand[0].innerHTML = '<div class="sidebar-brand-text mx-3">Staff</div>'+
        '<button class="sidebar-brand-text btn rounded-circle mx-3" style="color:white"><i class="fa fa-bars"></i></button>'

      var accordion = document.querySelector(".accordion")
      var style = getComputedStyle(accordion)
      if(style.position == "fixed"){
        document.getElementsByTagName("body")[0].classList.add("sidebar-toggled")
        accordion.classList.add("toggled")

        document.getElementsByClassName("sidebar-brand")[0].onclick = function(event){
          document.getElementById("sidebarToggleTop").click();
        }
        var element = document.getElementsByClassName("sidebar-brand-text");
        element[1].style.display = "inline-block"
        element[0].remove();
      } else{
        var element = document.getElementsByClassName("sidebar-brand-text");
        document.getElementsByTagName("body")[0].classList.remove("sidebar-toggled")
        accordion.classList.remove("toggled")

        sidebarbrand[0].onclick = function(event){
          event.preventDefault()
        }
        element[1].remove();
      }
    }
  </script>