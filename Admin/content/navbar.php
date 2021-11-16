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


      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="padding-top:1%">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" style="color:black" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                  <a href="../Home/index.php" class="nav-link" style="color:black">Home Page</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                      <i class="fas fa-expand-arrows-alt"></i>
                  </a>
              </li>

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
                            $count = 0;
                            foreach (fetchAll($query) as $i) {
                                if ($count == 9)
                                    break;
                        ?>
                              <a style="
                         <?php
                                if ($i['status'] == 'unread') {
                                    echo "font-weight:bold;";
                                }
                            ?>
                         " class="dropdown-item" href="#" onclick=my();>
                                  <small><i><?php echo date('F j, Y, g:i a', strtotime($i['date'])) ?></i></small><br />
                                  <?php
                                    if ($i['type1'] == 'account') {
                                        echo ucfirst($i['name']) . " made changed to account setting";
                                    } else if ($i['type1'] == 'resign') {
                                        echo ucfirst($i['name']) . " resigned from the post";
                                    } else if ($i['type1'] == 'donation') {
                                        echo ucfirst($i['name']) . " donated to our platform";
                                    } else if ($i['type1'] == 'accepted') {
                                        echo ucfirst($i['name']) . " is accepted for financial help";
                                    } else if ($i['type1'] == 'newacc') {
                                        echo "Someone made a new account on the platform.";
                                    } else if ($i['type1'] == 'forgot') {
                                        echo ucfirst($i['name']) . " forgot password of account";
                                    }

                                    ?>
                              </a>
                              <div class="dropdown-divider"></div>
                      <?php
                                $count = $count + 1;
                            }
                        } else {
                            echo "Notification is empty";
                        }
                        ?>
                      <script>
                          function my() {
                              location.href = "notification.php?id=1";
                          }
                      </script>
                  </div>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                  <a href="#" style="color:black" class="nav-link"><i class="fa fa-calendar"></i> <?php
                                                                                                    $Today = date('y:m:d');
                                                                                                    $new = date('l, F d, Y', strtotime($Today));
                                                                                                    echo $new; ?></a>

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