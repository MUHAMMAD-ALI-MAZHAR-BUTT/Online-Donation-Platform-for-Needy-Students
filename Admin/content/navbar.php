  <?php
    include('functions.php');
    ?>
  <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>




  <div class="wrapper">

      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
          <div class="spinner-border" role="status" style="color: purple; width: 6rem; height: 6rem;">
              <span class=" visually-hidden"></span>
          </div>
      </div>


      < <!-- Navbar -->
          <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="padding-top:0%">
              <!-- Left navbar links -->
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link" style="color:black" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                  </li>
                  <!-- <li class="nav-item d-none d-sm-inline-block">
                      <a href="../index.html" class="nav-link" style="color:black">Home</a>
                  </li> -->

              </ul>

              <!-- Right navbar links -->
              <ul class="navbar-nav ml-auto">

                  <li class="nav-item dropdown">
                      <a class="nav-link" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="far fa-bell warning"></i>
                          <span class="badge badge-warning navbar-badge"></span><b>Notifications</b>

                          <?php
                            $query = "SELECT * from `notifications` where `status` = 'unread' order by `date` DESC";
                            if (count(fetchAll($query)) > 0) {
                            ?>
                              <span class="badge badge-warning"><?php echo count(fetchAll($query)); ?></span>
                          <?php
                            }
                            ?>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdown01">
                          <?php
                            $query = "SELECT * from `notifications` order by `date` DESC";
                            if (count(fetchAll($query)) > 0) {
                                foreach (fetchAll($query) as $i) {
                            ?>
                                  <a style="
                         <?php
                                    if ($i['status'] == 'unread') {
                                        echo "font-weight:bold;";
                                    }
                            ?>
                         " class="dropdown-item" href="view.php?id=<?php echo $i['id'] ?>">
                                      <small><i><?php echo date('F j, Y, g:i a', strtotime($i['date'])) ?></i></small><br />
                                      <?php

                                        if ($i['type'] == 'comment') {
                                            echo "Someone commented on your post.";
                                        } else if ($i['type'] == 'like') {
                                            echo ucfirst($i['name']) . " liked your post.";
                                        }

                                        ?>
                                  </a>
                                  <div class="dropdown-divider"></div>
                          <?php
                                }
                            } else {
                                echo "No Records yet.";
                            }
                            ?>
                      </div>
                  </li>



                  <li class="nav-item">

                      <!-- Brand Logo -->
                      <a href="logout.php" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to logout?');">Logout
                      </a>

                  </li>
              </ul>
          </nav>
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

          <!-- /.navbar -->