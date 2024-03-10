<?php
include 'connexion.php';
include 'form.php';
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $nom= $_POST['nom'];
    $mail= $_POST['mail'];
    $adr= $_POST['adr'];
    $num= $_POST['num'];
    $age= $_POST['age'];
    $ed= $_POST['ed'];
    $exp= $_POST['exp'];
    $skills= $_POST['skills'];
    $lang= $_POST['lang'];
    $template=$_POST['temp'];
    if ($template=='cv1') {
      $color='#104162';
    }elseif($template=='cv2'){
      $color='#1a1919';
    }else{$color='#482c2c';}
    $target_file = file_get_contents($_FILES["image"]["tmp_name"]);
    $form = new Form($nom,$mail,$adr,$num,$age,$ed,$exp,$skills,$lang,$target_file);
    $db = new Database();
    $stmt = $db->conn->prepare("INSERT INTO cv_generator (nom,mail,adr,num,age,ed,exp,skills,lang,target_file) VALUES (?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssiissssb", $form->nom, $form->mail, $form->adr, $form->num, $form->age, $form->ed, $form->exp, $form->skills, $form->lang, $form->target_file);
    if ($stmt->execute()) {
      echo""
        ;
    } else {
        echo "Erreur lors de l'insertion des données.";
    }
    $stmt->close();
    $db->closeConnection();
}
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
        <form id='myForm' action='generatepdf.php' method='get'>
        <input type="hidden" name="image" value="<?php echo htmlspecialchars($target_file); ?>">
        <input type='hidden' name='nom' value='<?php echo htmlspecialchars($nom); ?>'>
        <input type='hidden' name='adr' value='<?php echo htmlspecialchars($adr); ?>'>
        <input type='hidden' name='mail' value='<?php echo htmlspecialchars($mail); ?>'>
        <input type='hidden' name='age' value='<?php echo htmlspecialchars($age); ?>'>
        <input type='hidden' name='num' value='<?php echo htmlspecialchars($num); ?>'>
        <input type='hidden' name='ed' value='<?php echo htmlspecialchars($ed); ?>'>
        <input type='hidden' name='exp' value='<?php echo htmlspecialchars($exp); ?>'>
        <input type='hidden' name='skills' value='<?php echo htmlspecialchars($skills); ?>'>
        <input type='hidden' name='lang' value='<?php echo htmlspecialchars($lang); ?>'>
        <input type='hidden' name='color' value='<?php echo htmlspecialchars($color); ?>'>
        <input type='submit' value='Download PDF'></form>
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