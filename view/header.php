<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quote Database</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/userstyle.css">

 
</head>


<body>
<?php 
session_start()

?>
    <!-- nav -->
    <nav class="nav affix">
      <div class="container">
        <div class="logo">
          <a href="index.php"><img src="images/logo.png" id="logo" alt=" Logo" height="200"
              width="200"></a>
          <h1>Quotes! the database</h1>
        </div>

        <div id="mainListDiv" class="main_list">
          <ul class="navlinks">
            <li><a class="nav-link" href="index.php?action=show_add_form">Submit Quote</a></li>
            <li id="invisible"> <?php 
                    if(!isset($_SESSION['firstName'])) {?>
                <a class="nav-link" href="register.php">Register</a> 
            </li>
          </ul>
        </div>
      </div>
    </nav>
     <?php 
                    } else { ?><a class="nav-link" href="logout.php"> Sign Out</a><?php }?>
                </li>
                </ul>
              </div>
            </div>
          </nav>

      <div id="wrapper">

<br><br><br>
