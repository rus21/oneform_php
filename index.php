<?php

  $btnSave = (isset($_POST['btnSave']) && $_POST['btnSave']=="Save");
  $btnAnlage1 = (isset($_POST['btnAnlage1']) && $_POST['btnAnlage1']=="Anlage1");
  $btnAnlage2 = (isset($_POST['btnAnlage2']) && $_POST['btnAnlage2']=="Anlage2");
  if (isset($_GET['id']))
  {
    $id = $_GET['id'];
    $db = new SQLite3("clients.db");
    $sql = "select cli_emp, cli_emp_addr_street, cli_emp_addr_house, cli_emp_addr_building, cli_emp_addr_room, cli_emp_addr_zip, cli_emp_addr_place, cli_emp_name_first, cli_emp_name, cli_emp_email, cli_emp_phone, cli_emp_mob, cli_emp_sign_place, cli_emp_sign_land, cli_emp_sign_date, cli_name_first, cli_name, cli_pass_number, cli_addr_native_street, cli_addr_native_house, cli_addr_native_building, cli_addr_native_flat, cli_addr_native_zip, cli_addr_native_place, cli_addr_native_land, cli_birth_date, cli_birth_place, cli_birth_land, cli_email, cli_phone_native, cli_mob_native, cli_sign_place, cli_sign_land, cli_sign_date
      from clients where id=:id";
    if ($stmt = $db->prepare($sql))
    {
      $stmt->bindParam(':id', $id);
      $result = $stmt->execute();
      if ($result->numColumns()>1)
      {
        $row = $result->fetchArray();
          if (!isset($row['id']))
          {
            $cli_emp = $row['cli_emp'];
            $cli_emp_addr_street = $row['cli_emp_addr_street'];
            $cli_emp_addr_house = $row['cli_emp_addr_house'];
            $cli_emp_addr_building = $row['cli_emp_addr_building'];
            $cli_emp_addr_room = $row['cli_emp_addr_room'];
            $cli_emp_addr_zip = $row['cli_emp_addr_zip'];
            $cli_emp_addr_place = $row['cli_emp_addr_place'];
            $cli_emp_name_first = $row['cli_emp_name_first'];
            $cli_emp_name = $row['cli_emp_name'];
            $cli_emp_email = $row['cli_emp_email'];
            $cli_emp_phone = $row['cli_emp_phone'];
            $cli_emp_mob = $row['cli_emp_mob'];
            $cli_emp_sign_place = $row['cli_emp_sign_place'];
            $cli_emp_sign_land = $row['cli_emp_sign_land'];
            $cli_emp_sign_date = $row['cli_emp_sign_date'];

            $cli_name_first = $row['cli_name_first'];
            $cli_name = $row['cli_name'];
            $cli_pass_number = $row['cli_pass_number'];
            $cli_addr_native_street = $row['cli_addr_native_street'];
            $cli_addr_native_house = $row['cli_addr_native_house'];
            $cli_addr_native_building = $row['cli_addr_native_building'];
            $cli_addr_native_flat = $row['cli_addr_native_flat'];
            $cli_addr_native_zip = $row['cli_addr_native_zip'];
            $cli_addr_native_place = $row['cli_addr_native_place'];
            $cli_addr_native_land = $row['cli_addr_native_land'];
            $cli_birth_date = $row['cli_birth_date'];
            $cli_birth_place = $row['cli_birth_place'];
            $cli_birth_land = $row['cli_birth_land'];
            $cli_email = $row['cli_email'];
            $cli_phone_native = $row['cli_phone_native'];
            $cli_mob_native = $row['cli_mob_native'];
            $cli_sign_place = $row['cli_sign_place'];
            $cli_sign_land = $row['cli_sign_land'];
            $cli_sign_date = $row['cli_sign_date'];
          }
      }
    }
  }
  
  if ( $btnSave || $btnAnlage1 || $btnAnlage2 )
  {
    //POST data
    $cli_emp = $_POST['cli_emp'];
    $cli_emp_addr_street = $_POST['cli_emp_addr_street'];
    $cli_emp_addr_house = $_POST['cli_emp_addr_house'];
    $cli_emp_addr_building = $_POST['cli_emp_addr_building'];
    $cli_emp_addr_room = $_POST['cli_emp_addr_room'];
    $cli_emp_addr_zip = $_POST['cli_emp_addr_zip'];
    $cli_emp_addr_place = $_POST['cli_emp_addr_place'];
    $cli_emp_name_first = $_POST['cli_emp_name_first'];
    $cli_emp_name = $_POST['cli_emp_name'];
    $cli_emp_email = $_POST['cli_emp_email'];
    $cli_emp_phone = $_POST['cli_emp_phone'];
    $cli_emp_mob = $_POST['cli_emp_mob'];
    $cli_emp_sign_place = $_POST['cli_emp_sign_place'];
    $cli_emp_sign_land = $_POST['cli_emp_sign_land'];
    $cli_emp_sign_date = $_POST['cli_emp_sign_date'];

    $cli_name_first = $_POST['cli_name_first'];
    $cli_name = $_POST['cli_name'];
    $cli_pass_number = $_POST['cli_pass_number'];
    $cli_addr_native_street = $_POST['cli_addr_native_street'];
    $cli_addr_native_house = $_POST['cli_addr_native_house'];
    $cli_addr_native_building = $_POST['cli_addr_native_building'];
    $cli_addr_native_flat = $_POST['cli_addr_native_flat'];
    $cli_addr_native_zip = $_POST['cli_addr_native_zip'];
    $cli_addr_native_place = $_POST['cli_addr_native_place'];
    $cli_addr_native_land = $_POST['cli_addr_native_land'];
    $cli_birth_date = $_POST['cli_birth_date'];
    $cli_birth_place = $_POST['cli_birth_place'];
    $cli_birth_land = $_POST['cli_birth_land'];
    $cli_email = $_POST['cli_email'];
    $cli_phone_native = $_POST['cli_phone_native'];
    $cli_mob_native = $_POST['cli_mob_native'];
    $cli_sign_place = $_POST['cli_sign_place'];
    $cli_sign_land = $_POST['cli_sign_land'];
    $cli_sign_date = $_POST['cli_sign_date'];
  }
  
  //SAVE button processing
  if ($btnSave)
  {
    $db = new SQLite3("clients.db");
    
    $sql = "create table if not exists 
              clients
                (
                  id integer primary key autoincrement, 
                  cli_emp text NOT NULL,
                  cli_emp_addr_street text NOT NULL,
                  cli_emp_addr_house text NOT NULL,
                  cli_emp_addr_building text,
                  cli_emp_addr_room text,
                  cli_emp_addr_zip text NOT NULL,
                  cli_emp_addr_place text NOT NULL,
                  cli_emp_name_first text NOT NULL,
                  cli_emp_name text NOT NULL,
                  cli_emp_email text NOT NULL,
                  cli_emp_phone text NOT NULL,
                  cli_emp_mob text NOT NULL,
                  cli_emp_sign_place text NOT NULL,
                  cli_emp_sign_land text NOT NULL,
                  cli_emp_sign_date text NOT NULL,
                  cli_name_first text NOT NULL,
                  cli_name text NOT NULL,
                  cli_pass_number text NOT NULL,
                  cli_addr_native_street text NOT NULL,
                  cli_addr_native_house text NOT NULL,
                  cli_addr_native_building text,
                  cli_addr_native_flat text NOT NULL,
                  cli_addr_native_zip text NOT NULL,
                  cli_addr_native_place text NOT NULL,
                  cli_addr_native_land text NOT NULL,
                  cli_birth_date text NOT NULL,
                  cli_birth_place text NOT NULL,
                  cli_birth_land text NOT NULL,
                  cli_email text NOT NULL,
                  cli_phone_native text,
                  cli_mob_native text NOT NULL,
                  cli_sign_place text NOT NULL,
                  cli_sign_land text NOT NULL,
                  cli_sign_date text NOT NULL                  
                )";
    
    $result = $db->exec($sql);
    
    $sql = "insert into clients(cli_emp, cli_emp_addr_street, cli_emp_addr_house, cli_emp_addr_building, cli_emp_addr_room, cli_emp_addr_zip, cli_emp_addr_place, cli_emp_name_first, cli_emp_name, cli_emp_email, cli_emp_phone, cli_emp_mob, cli_emp_sign_place, cli_emp_sign_land, cli_emp_sign_date, cli_name_first, cli_name, cli_pass_number, cli_addr_native_street, cli_addr_native_house, cli_addr_native_building, cli_addr_native_flat, cli_addr_native_zip, cli_addr_native_place, cli_addr_native_land, cli_birth_date, cli_birth_place, cli_birth_land, cli_email, cli_phone_native, cli_mob_native, cli_sign_place, cli_sign_land, cli_sign_date)
            values (:cli_emp, :cli_emp_addr_street, :cli_emp_addr_house, :cli_emp_addr_building, :cli_emp_addr_room, :cli_emp_addr_zip, :cli_emp_addr_place, :cli_emp_name_first, :cli_emp_name, :cli_emp_email, :cli_emp_phone, :cli_emp_mob, :cli_emp_sign_place, :cli_emp_sign_land, :cli_emp_sign_date, :cli_name_first, :cli_name, :cli_pass_number, :cli_addr_native_street, :cli_addr_native_house, :cli_addr_native_building, :cli_addr_native_flat, :cli_addr_native_zip, :cli_addr_native_place, :cli_addr_native_land, :cli_birth_date, :cli_birth_place, :cli_birth_land, :cli_email, :cli_phone_native, :cli_mob_native, :cli_sign_place, :cli_sign_land, :cli_sign_date)";
    
    if ($stmt = $db->prepare($sql))
    {
      $stmt->bindParam(':cli_emp', $cli_emp);
      $stmt->bindParam(':cli_emp_addr_street', $cli_emp_addr_street);
      $stmt->bindParam(':cli_emp_addr_house', $cli_emp_addr_house);
      $stmt->bindParam(':cli_emp_addr_building', $cli_emp_addr_building);
      $stmt->bindParam(':cli_emp_addr_room', $cli_emp_addr_room);
      $stmt->bindParam(':cli_emp_addr_zip', $cli_emp_addr_zip);
      $stmt->bindParam(':cli_emp_addr_place', $cli_emp_addr_place);
      $stmt->bindParam(':cli_emp_name_first', $cli_emp_name_first);
      $stmt->bindParam(':cli_emp_name', $cli_emp_name);
      $stmt->bindParam(':cli_emp_email', $cli_emp_email);
      $stmt->bindParam(':cli_emp_phone', $cli_emp_phone);
      $stmt->bindParam(':cli_emp_mob', $cli_emp_mob);
      $stmt->bindParam(':cli_emp_sign_place', $cli_emp_sign_place);
      $stmt->bindParam(':cli_emp_sign_land', $cli_emp_sign_land);
      $stmt->bindParam(':cli_emp_sign_date', $cli_emp_sign_date);

      $stmt->bindParam(':cli_name_first', $cli_name_first);
      $stmt->bindParam(':cli_name', $cli_name);
      $stmt->bindParam(':cli_pass_number', $cli_pass_number);
      $stmt->bindParam(':cli_addr_native_street', $cli_addr_native_street);
      $stmt->bindParam(':cli_addr_native_house', $cli_addr_native_house);
      $stmt->bindParam(':cli_addr_native_building', $cli_addr_native_building);
      $stmt->bindParam(':cli_addr_native_flat', $cli_addr_native_flat);
      $stmt->bindParam(':cli_addr_native_zip', $cli_addr_native_zip);
      $stmt->bindParam(':cli_addr_native_place', $cli_addr_native_place);
      $stmt->bindParam(':cli_addr_native_land', $cli_addr_native_land);
      $stmt->bindParam(':cli_birth_date', $cli_birth_date);
      $stmt->bindParam(':cli_birth_place', $cli_birth_place);
      $stmt->bindParam(':cli_birth_land', $cli_birth_land);
      $stmt->bindParam(':cli_email', $cli_email);
      $stmt->bindParam(':cli_phone_native', $cli_phone_native);
      $stmt->bindParam(':cli_mob_native', $cli_mob_native);
      $stmt->bindParam(':cli_sign_place', $cli_sign_place);
      $stmt->bindParam(':cli_sign_land', $cli_sign_land);
      $stmt->bindParam(':cli_sign_date', $cli_sign_date);

      $result = $stmt->execute();
      echo '<h2>Data is saved</h2>';
    }
    else
    {
      echo '<h2>Failure</h2>';
    }
    
    $stmt->close();

    $db->close();
  }
?>  
<?php
//ANLAGE1 button processing
if ($btnAnlage1) : ?>
      <table style="width: 15.8678%; border-collapse: collapse; float: right; height: 23px;" border="0">
      <tbody>
      <tr>
      <td style="width: 100%;"><strong>Anlage 1</strong></td>
      </tr>
      </tbody>
      </table>
      <p>&nbsp;</p>
      <p style="text-align: center;"><u>Beauftragung eines beschleunigten Fachkr&auml;fteverfahrens nach &sect; 81a AufenthG</u></p>
      <div>
      <table style="width: 96.6942%; border-collapse: collapse; float: right; height: 312px;">
      <tbody>
      <tr style="height: 312px;">
      <td style="width: 33.3333%; vertical-align: top; height: 312px;">
      <p><u>Von:</u></p>
      <p>Firmenname <strong><?php echo $cli_emp;?></strong></p>
      <p>Kundennummer des BIS: 1583</p>
      <p>Stra&szlig;e, Hausnummer <strong><?php echo $cli_emp_addr_street.',',$cli_emp_addr_house;?></strong></p>
      <p><strong><?php echo $cli_emp_addr_zip;?></strong> Berlin</p>
      <p>&nbsp;</p>
      <p><strong>(Arbeitgeber)</strong></p>
      </td>
      <td style="width: 33.3333%; height: 312px;">&nbsp;</td>
      <td style="width: 30.0275%; vertical-align: top; height: 312px;">
      <p><u>An:</u></p>
      <p>Landesamt f&uuml;r Einwanderung</p>
      <p>Friedrich-Krause-Ufer 24</p>
      <p>13353 Berlin</p>
      <br />
      <p><strong>(LEA)</strong></p>
      </td>
      </tr>
      </tbody>
      </table>
      </div>
      <h6>Unter Bezugnahme auf die am _______________ ((leave blank)) geschlossene Vereinbarung nach &sect; 81 a Abs. 2 AufenthG zwischen dem Arbeitgeber und dem LEA beauftragt <br />der Arbeitgeber das LEA zur Durchf&uuml;hrung eines beschleunigten Fachkr&auml;fteverfahrens nach &sect; 81 a AufenthG. Das Verfahren wird durchgef&uuml;hrt zugunsten von:</h6>
      <table style="border-collapse: collapse; width: 100%;" border="1">
      <tbody>
      <tr>
      <th style="width: 5.45455%; text-align: center;"><strong>Nr.</strong></th>
      <th style="width: 34.2054%; text-align: center;"><strong>Name, Vorname</strong></th>
      <th style="width: 20.3401%; text-align: center;"><strong>Passnummer</strong></th>
      <th style="width: 25.9524%; text-align: center;"><strong>Aktuelle Adresse</strong></th>
      <th style="width: 14.0476%; text-align: center;"><strong>Verfahren</strong></th>
      </tr>
      <tr>
      <td style="width: 5.45455%;">&nbsp;</td>
      <td style="width: 34.2054%;"><?php echo $cli_name.', '.$cli_name_first;?></td>
      <td style="width: 20.3401%;"><?php echo $cli_pass_number;?></td>
      <td style="width: 25.9524%;"><?php echo $cli_addr_native_street.', '.$cli_addr_native_house.', bld. '.$cli_addr_native_building.', flt. '.$cli_addr_native_flat.', '.$cli_addr_native_zip.', '.$cli_addr_native_place.', '.$cli_addr_native_land;?></td>
      <td style="width: 14.0476%;">&nbsp;</td>
      </tr>
      <tr>
      <td style="width: 5.45455%;">&nbsp;</td>
      <td style="width: 34.2054%;">&nbsp;</td>
      <td style="width: 20.3401%;">&nbsp;</td>
      <td style="width: 25.9524%;">&nbsp;</td>
      <td style="width: 14.0476%;">&nbsp;</td>
      </tr>
      <tr>
      <td style="width: 5.45455%;">&nbsp;</td>
      <td style="width: 34.2054%;">&nbsp;</td>
      <td style="width: 20.3401%;">&nbsp;</td>
      <td style="width: 25.9524%;">&nbsp;</td>
      <td style="width: 14.0476%;">&nbsp;</td>
      </tr>
      <tr>
      <td style="width: 5.45455%;">&nbsp;</td>
      <td style="width: 34.2054%;">&nbsp;</td>
      <td style="width: 20.3401%;">&nbsp;</td>
      <td style="width: 25.9524%;">&nbsp;</td>
      <td style="width: 14.0476%;">&nbsp;</td>
      </tr>
      <tr>
      <td style="width: 5.45455%;">&nbsp;</td>
      <td style="width: 34.2054%;">&nbsp;</td>
      <td style="width: 20.3401%;">&nbsp;</td>
      <td style="width: 25.9524%;">&nbsp;</td>
      <td style="width: 14.0476%;">&nbsp;</td>
      </tr>
      </tbody>
      </table>
      <h6>(Je genannter Person fallen Geb&uuml;hren in H&ouml;he von 411&euro; an (&sect; 47 Abs.1 Nr.15 AufenthV. Bei Minderj&auml;hrigen verringert sich die Geb&uuml;hr um die H&auml;lfte (&sect; 50 Abs. 1 AufenthV).</h6>
      <table style="border-collapse: collapse; width: 100%;">
      <tbody>
      <tr>
      <td style="width: 33.3333%;">
      <p>Berlin <strong><?php echo $cli_emp_sign_place;?></strong>, den</p>
      <p><strong><?php echo $cli_emp_sign_date;?></strong></p>
      <p>_______________</p>
      <p><small>[Unterschrift Arbeitgeber]</small></p>
      <p><small>[Firmenstempel]</small></p>
      </td>
      <td style="width: 33.3333%;">&nbsp;</td>
      <td style="width: 33.3333%;">
      <p>Berlin, den</p>
      <p>_______________</p>
      <p><small>[Unterschrift LEA]</small></p>
      </td>
      </tr>
      </tbody>
      </table>
<?php endif; ?>

<?php
//ANLAGE2 button processing
if ($btnAnlage2):  ?>

<?php endif; ?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if  (!$btnAnlage1 || $btnAnlage2): ?>
    <title>ONEFORM</title>
    <?php endif; ?>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./glider.css">
    <script src="./glider.js"></script>
    <script src="./script.js" defer></script>    
  </head>
  <body>
    <div <?php echo ($btnAnlage1 || $btnAnlage2)  ? 'hidden' : '' ?>>
      <h1>ONEFORM</h1>
      <p> 
        <small>ONEFORM is a intelligent, universal questionnaire. Once you enter your information, Onepage will fill out all the necessary forms. All you have to do is print it out and sign it.
        </small>
      </p>
      <p>
        <small>ONEFORM  is designed for people who are going to or who are already in Germany for work, study, au-pairs, internships and family reunification.
        </small>
      </p>
    
      <h2>Data for Accelerated Processing §81a (BFV)</h2>

      <p>This form is for employer in Berlin only</p>
      
      <h3>ANLAGE 1 & ANLAGE 2</h3>
      <h3>Employer's Data</h3>
      <p><small>NOTE! <a href="http://yarve.com/code.html">Code Terms and Abbreviations are here</a></small></p>
    </div>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" <?php echo ($btnAnlage1 || $btnAnlage2)  ? 'hidden' : '' ?>>
      
      <div>
          <input type="hidden" id="id" name="id" value="<?php echo isset($id) ? $id : '' ?>" />
      </div>
      <div>
          <label for="cli_emp">Firmenname (wie im Arbeitsvertrag)</label><br>
          <input type="text" id="cli_emp" name="cli_emp" value="<?php echo isset($cli_emp) ? $cli_emp : '' ?>" />
      </div>
      <br>
      <div>
          <h5>Geschäftssitz / Sitz der maßgeblichen Betriebsstätte:</h5>
          <label for="cli_emp_addr_street">Stra&szlig;e - Street - Улица</label><br>
          <input type="text" id="cli_emp_addr_street" name="cli_emp_addr_street" value="<?php echo isset($cli_emp_addr_street) ? $cli_emp_addr_street : '' ?>" />
      </div>
      <br>
        
      <div>  
      <label for="cli_emp_addr_house">Hausnummer - House Nr. -  номер дома (digits, letters, special characters like - / etc.)</label>
      <br>
      <input type="text" id="cli_emp_addr_house" name="cli_emp_addr_house" value="<?php echo isset($cli_emp_addr_house) ? $cli_emp_addr_house : '' ?>" />
      </div>
      <br>
      
      <div>  
        <label for="cli_emp_addr_building">Building name or number (digits/letters) - Номер здания/корпуса (optional)</label>
        <br>
        <input type="text" id="cli_emp_addr_building" name="cli_emp_addr_building" value="<?php echo isset($cli_emp_addr_building) ? $cli_emp_addr_building : '' ?>" />
      </div>
      <br>
      
    
      <div>  
        <label for="cli_emp_addr_room">Room number - Номер квартиры/комнаты (optional)</label>
        <br>
        <input type="text" id="cli_emp_addr_room" name="cli_emp_addr_room" value="<?php echo isset($cli_emp_addr_room) ? $cli_emp_addr_room : '' ?>" />
      </div>
      <br>

      <div>
        <label for="cli_emp_addr_zip">Postcode - Почтовый Индекс</label>
        <br>
        <input type="text" id="cli_emp_addr_zip" name="cli_emp_addr_zip" value="<?php echo isset($cli_emp_addr_zip) ? $cli_emp_addr_zip : '' ?>" />
      </div>
      <br>

      <div>
        <label for="cli_emp_addr_place">Place - Населенный пункт</label>
        <br>
        <input type="text" id="cli_emp_addr_place" name="cli_emp_addr_place" value="<?php echo isset($cli_emp_addr_place) ? $cli_emp_addr_place : '' ?>" />
      </div>
      <br>
    
      <br>
      <h5>Vertreter - Company representative</h5>

      <div>
        <label for="cli_emp_name_first">Vorname - First name</label>
        <br>
        <input type="text" id="cli_emp_name_first" name="cli_emp_name_first" value="<?php echo isset($cli_emp_name_first) ? $cli_emp_name_first : '' ?>" />
      </div>
      <br>
      
      <div>
        <label for="cli_emp_name">Name - Last name</label>
        <br>
        <input type="text" id="cli_emp_name" name="cli_emp_name" value="<?php echo isset($cli_emp_name) ? $cli_emp_name : '' ?>" />
      </div>
      <br>

      <div>
        <label for="cli_emp_email">Email address - Адрес электронной почты</label>
        <br>
        <input type="email" id="cli_emp_email" name="cli_emp_email" value="<?php echo isset($cli_emp_email) ? $cli_emp_email : '' ?>" />
      </div>
      <br>

      <div>
        <label for="cli_emp_phone">Phone number - Телефонный номер</label>
        <br>
        <input type="text" id="cli_emp_phone" name="cli_emp_phone" value="<?php echo isset($cli_emp_phone) ? $cli_emp_phone : '' ?>" />
        <br>
        OR - ИЛИ
        <br>
        <label for="cli_emp_mob">Mobile number - Телефонный номер</label>
        <br>
        <input type="text" id="cli_emp_mob" name="cli_emp_mob" value="<?php echo isset($cli_emp_mob) ? $cli_emp_mob : '' ?>" />
      </div>
      <br>
      <div>
        Place of signature: <b>Berlin by default</b>
        <br>
        If not Berlin, please enter the place and country:
      </div>

      <div>
        <label for="cli_emp_sign_place">Place - Населенный пункт</label>
        <br>
        <input type="text" id="cli_emp_sign_place" name="cli_emp_sign_place" value="<?php echo isset($cli_emp_sign_place) ? $cli_emp_sign_place : '' ?>" />
      </div>
      <br>

      <div>
        <label for="cli_emp_sign_land">Country - Страна</label>
        <br>
        <input type="text" id="cli_emp_sign_land" name="cli_emp_sign_land" value="<?php echo isset($cli_emp_sign_land) ? $cli_emp_sign_land : '' ?>" />
      </div>
      <br>

      <div>
        Date of signature - Дата подписи - <b>TODAY by default</b>
      </div>

      <div>
        <label for="cli_emp_sign_date">If other date, please specfy: </label>
        <br>
        <input type="date" id="cli_emp_sign_date" name="cli_emp_sign_date" value="<?php echo isset($cli_emp_sign_date) ? $cli_emp_sign_date : date('Y-m-d') ?>" />
        <br>
        <small hidden>(Format: YYYY-MM-DD)</small>
      </div>
      <br>
      
  
      <h3>Worker's Data</h3>

      <div>
        <label for="cli_name_first">Vorname - First name - Имя</label>
        <br>
        <input type="text" id="cli_name_first" name="cli_name_first" value="<?php echo isset($cli_name_first) ? $cli_name_first : '' ?>" />
      </div>
      <br>

      <div>
        <label for="cli_name">Familienname - Surname - Фамилия</label>
        <br>
        <input type="text" id="cli_name" name="cli_name" value="<?php echo isset($cli_name) ? $cli_name : '' ?>" />
      </div>
      <br>

      <div>
        <label for="cli_pass_number">Number of passport</label>
        <br>
        <input type="text" id="cli_pass_number" name="cli_pass_number" value="<?php echo isset($cli_pass_number) ? $cli_pass_number : '' ?>" />
      </div>
      <br>
      
      <h4>Aktuelle Adresse - Current address</h4>

      <div>
        <label for="cli_addr_native_street">Street - Улица</label>
        <br>
        <input type="text" id="cli_addr_native_street" name="cli_addr_native_street" value="<?php echo isset($cli_addr_native_street) ? $cli_addr_native_street : '' ?>" />
        <br>
        <label for="cli_addr_native_house">Номер дома</label>
        <br>
        <input type="text" id="cli_addr_native_house" name="cli_addr_native_house" value="<?php echo isset($cli_addr_native_house) ? $cli_addr_native_house : '' ?>" />
      </div>
      <br>

      <div>
        <label for="cli_addr_native_building">Номер здания/корпуса (optional)</label>
        <br>
        <input type="text" id="cli_addr_native_building" name="cli_addr_native_building" value="<?php echo isset($cli_addr_native_building) ? $cli_addr_native_building : '' ?>" />
        <br>
        <label for="cli_addr_native_flat">Номер квартиры</label>
        <br>
        <input type="text" id="cli_addr_native_flat" name="cli_addr_native_flat" value="<?php echo isset($cli_addr_native_flat) ? $cli_addr_native_flat : '' ?>" />
        <br>
        <small>(Если вы прописаны в частном доме, это поле необязательно к заполнению)</small>
      </div>
      <br>

      <div>
        <label for="cli_addr_native_zip">Postcode - Почтовый Индекс</label>
        <br>
        <input type="text" id="cli_addr_native_zip" name="cli_addr_native_zip" value="<?php echo isset($cli_addr_native_zip) ? $cli_addr_native_zip : '' ?>" />
        <br>
        <small>(Hint: если индекс неизвестен, введите ваш адрес в гугл и сразу его узнаете)</small>
      </div>
      <br>

      <div>
        <label for="cli_addr_native_place">Place - Населенный пункт</label>
        <br>
        <input type="text" id="cli_addr_native_place" name="cli_addr_native_place" value="<?php echo isset($cli_addr_native_place) ? $cli_addr_native_place : '' ?>" />
      </div>
      <br>

      <div>
        <label for="cli_addr_native_land">Country</label>
        <br>
        <input type="text" id="cli_addr_native_land" name="cli_addr_native_land" value="<?php echo isset($cli_addr_native_land) ? $cli_addr_native_land : '' ?>" />
      </div>
      <br>

      <div>
        <label for="cli_birth_date">Geburtsdatum - Date of birth (YYYY-MM-DD) - Дата рождения</label>
        <br>
        <input type="date" id="cli_birth_date" name="cli_birth_date" value="<?php echo isset($cli_birth_date) ? $cli_birth_date : '' ?>" />
      </div>
      <br>

      <div>
        <label for="cli_birth_place">Geburtsort - Place of birth - Город рождения</label>
        <br>
        <input type="text" id="cli_birth_place" name="cli_birth_place" value="<?php echo isset($cli_birth_place) ? $cli_birth_place : '' ?>" />
        <br>
        <small>(Если поселок, укажите район и/или область и/или край)</small>
      </div>
      <br>

      <div>
        <label for="cli_birth_land">Geburtland - Country of birth - Страна рождения</label>
        <br>
        <input type="text" id="cli_birth_land" name="cli_birth_land" value="<?php echo isset($cli_birth_land) ? $cli_birth_land : '' ?>" />
      </div>
      <br>

      <div>
        <label for="cli_email">Email address - Адрес электронной почты</label>
        <br>
        <input type="email" id="cli_email" name="cli_email" value="<?php echo isset($cli_email) ? $cli_email : '' ?>" />
      </div>
      <br>

      <div>
        <label for="cli_phone_native">Phone number - Телефонный номер (optional)</label>
        <br>
        <input type="text" id="cli_phone_native" name="cli_phone_native" value="<?php echo isset($cli_phone_native) ? $cli_phone_native : '' ?>" /><br>
      </div>
      <br>

      <div>
        <label for="cli_mob_native">Mobile phone number - Номер мобильного телефона</label>
        <br>
        <input type="text" id="cli_mob_native" name="cli_mob_native" value="<?php echo isset($cli_mob_native) ? $cli_mob_native : '' ?>" />
        <br>
        <small>(Entry format: + country code - mob. number. Ex.: Ukraine +380.... India +91...)</small>
      </div>
      <br>

      <div>Place and country of signature:</div>

      <div>
        <label for="cli_sign_place">Place - Населенный пункт</label>
        <br>
        <input type="text" id="cli_sign_place" name="cli_sign_place" value="<?php echo isset($cli_sign_place) ? $cli_sign_place : '' ?>" />
      </div>
      <br>

      <div>
        <label for="cli_sign_land">Country - Страна</label>
        <br>
        <input type="text" id="cli_sign_land" name="cli_sign_land" value="<?php echo isset($cli_sign_land) ? $cli_sign_land : '' ?>" />
      </div>
      <br>

      <div>
        Date of signature - Дата подписи - <b>TODAY by default</b>
      </div>
      <br>

      <div>
        <label for="cli_sign_date">If other date, please specfy:</label>
        <br>
        <input type="date" id="cli_sign_date" name="cli_sign_date" value="<?php echo isset($cli_sign_date) ? $cli_sign_date : date('Y-m-d') ?>" />
        <br>
        <small>(Format: YYYY-MM-DD)</small>
      </div>
      <br>
     
      <div>
        <input type="submit" name="btnSave" value="Save" />
        <br>
        Your entries will be saved. You can delete them anytime
      </div>      
      
      <div>
        <input type="submit" name="btnAnlage1" value="Anlage1" />
      </div>      
      
      <div>
        <input type="submit" name="btnAnlage2" value="Anlage2" />
      </div>      
      
      <!--<button type="submit" class="form-button">SAVE entered data</button> -->
    </form>
  </body>
</html>
    