<?php
$nom = $_GET['nom'];
$adr = $_GET['adr'];
$mail = $_GET['mail'];
$age = $_GET['age'];
$num = $_GET['num'];
$ed = $_GET['ed'];
$exp = $_GET['exp'];
$skills = $_GET['skills'];
$lang = $_GET['lang'];
$target_file = $_GET['image'];
$color = $_GET['color'];
?>
<!DOCTYPE html>
        <html lang='en'>
        <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Professional CV</title>
        <style>
          body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 50px;
          }
        
          .container {
            width: 210mm; /* A4 width */
            height: 297mm; /* A4 height */
            margin: 0 auto;
            padding-right: 100px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box; /* Ensure padding and border are included in total width/height */
            position: relative; /* Add position relative for absolutely positioned elements */
            display: flex; /* Use flexbox layout */
          }
        
          .left-column {
            flex: 0 0 30%; /* Set left column to 30% width */
            background-color: <?php echo htmlspecialchars($color);?> ; /* Blue background */
            padding: 20px;
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
            color: #fff;
          }
        
          .right-column {
            flex: 0 0 70%; /* Set right column to 70% width */
            padding: 20px;
          }
        
          .header {
            text-align: center;
            margin-bottom: 30px;
          }
        
          .header img {
            width: 150px;
            margin-top: 30px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
          }
        
          .name {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 10px;
          }
        
          .job-title {
            font-size: 18px;
            margin-bottom: 20px;
          }
        
          .section {
            margin-top: 35px;
            margin-bottom: 35px;
          }
        
          .section h2 {
            border-bottom: 2px solid #f4f4f4;
            padding-bottom: 5px;
            margin-bottom: 10px;
          }
        
          .section ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
          }
        
          .section li {
            margin-bottom: 10px;
          }
        
          .section li strong {
            font-weight: bold;
          }
        </style>
        </head>
        <body>
        <div class='container'>
          <div class='left-column'>
            <div class='header'>
            <img src='data:image/jpeg;base64,<?php echo htmlspecialchars(base64_encode($target_file)); ?>' alt='Image'>
              <div class='name'><?php echo htmlspecialchars($nom);?></div>
            </div>
        
            <div class='section'>
              <h2>Personal Information</h2>
              <ul>
                <li><strong>Age :</strong><?php echo htmlspecialchars($age);?></li>
                <li><strong>Address:</strong><?php echo htmlspecialchars($adr);?></li>
                <li><strong>Email:</strong><?php echo htmlspecialchars($mail);?></li>
                <li><strong>Phone:</strong><?php echo htmlspecialchars($num);?></li>
              </ul>
            </div>
          </div>
        
          <div class='right-column'>
            <div class='section'>
              <h2>Education</h2>
              <ul>
                <li>
                <?php 
                  $ch='';
                  for ($i=0; $i <strlen($ed) ; $i++) { 
                    $ch=$ch.$ed[$i];
                    if ($ed[$i]=="\n"|| $i==strlen($ed)-1) {
                      echo htmlspecialchars($ch);
                      echo '<br>';
                      $ch='';
                    }
                  }
                ?>
                </li>
              </ul>
            </div>
        
            <div class='section'>
              <h2>Experience</h2>
              <ul>
                <li>
                  <?php 
                  $ch='';
                  for ($i=0; $i <strlen($exp) ; $i++) { 
                    $ch=$ch.$exp[$i];
                    if ($exp[$i]=="\n"|| $i==strlen($exp)-1) {
                      echo htmlspecialchars($ch);
                      echo '<br>';
                      $ch='';
                    }
                  }
                ?></li>
              </ul>
            </div>
        
            <div class='section'>
              <h2>Skills</h2>
              <ul>
                <li>
                  <?php 
                  $ch='';
                  for ($i=0; $i <strlen($skills) ; $i++) { 
                    $ch=$ch.$skills[$i];
                    if ($skills[$i]=="\n"|| $i==strlen($skills)-1) {
                      echo htmlspecialchars($ch);
                      echo '<br>';
                      $ch='';
                    }
                  }
                ?></li>
              </ul>
            </div>
            <div class='section'>
              <h2>Languages</h2>
              <ul>
                <li>
                  <?php 
                  $ch='';
                  for ($i=0; $i <strlen($lang) ; $i++) { 
                    $ch=$ch.$lang[$i];
                    if ($lang[$i]=="\n"|| $i==strlen($lang)-1) {
                      echo htmlspecialchars($ch);
                      echo '<br>';
                      $ch='';
                    }
                  }
                ?></li>
              </ul>
            </div>
          </div>
        </div>
        
        </body>
        </html>