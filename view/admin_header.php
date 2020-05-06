<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quote Database</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../style/style.css">


</head>


<body>
<?php 

?>
    <!-- nav -->
    <nav class="nav affix">
      <div class="container">
        <div class="logo">
          <a href="../admin/admin.php"><img src="../images/logo.png" id="logo" alt=" Logo" height="130"
              width="130"></a>
          <h1>Quotes! the database</h1>
        </div>

        <div id="mainListDiv" class="main_list">
          <ul class="navlinks">
            <li><a class="nav-link-admin" href="admin.php?action=show_add_form">Submit Quote</a></li>
      <li> <?php 
                    if(!isset($_SESSION['is_valid_admin'])) {?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
     <?php 
                    } else { ?> 
      <a class="nav-link-admin" href="../admin/admin_register.php">Register Admin</a></li>

      <li><a class="nav-link-admin" href="admin.php?action=see_submitted">Approve Quotes</a></a>

      <li><a class="nav-link-admin" href="admin.php?action=manage">Manage</a></a>
      
      <li><a class="nav-link-admin" href="admin.php?action=logout">Logout</a></a><?php }?>
                </li>
          </ul>
        </div>
      </div>
    </nav>

      <div id="wrapper">

<br><br><br>
