
    <!-- Page Content Holder -->
    <div id="content">

        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                        <i class="glyphicon glyphicon-align-left"></i>
                        <span>Daily Plan</span>
                        
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="personal_information.php">Personal Information</a></li>
                        <li><a href="updates.php">Progress and Updates</a></li>
                        <li> <form class= "logout-form" action ="includes/logout.inc.php" method="POST">
                                <button type="submit" name="submit">Logout</button>
                            </form></li>
                    </ul>
                </div>
            </div>
        </nav>