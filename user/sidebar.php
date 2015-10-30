<?php //session_start();?>
<nav  class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a > <p>Welcome </p><strong> <?php echo strtoupper( $_SESSION['name']);?> </strong></a>
                    </li>
                    <li>
                        <a  href="http://localhost/feedback/"> <strong> Visit Site </strong></a>
                    </li>
                      <li>
                        <a href="index.php"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="changepassword.php"><strong> Change Password </strong></a>
                    </li>
                    <li>
                        <a href="http://localhost/feedback/"><strong> LOGOUT </strong></a>
                    </li>
                </ul>
            </div>

        </nav>