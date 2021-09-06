
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
if ($btnAnlage1) : 

  if (strcmp(', bld. '.$cli_addr_native_building, ', bld. ') ==0)
  {
    $cli_addr_native_building = '';
  }
  else
  {
    $cli_addr_native_building = ', bld. '.$cli_addr_native_building;
  }

  if (strcmp(', apt. '.$cli_addr_native_flat, ', apt. ') ==0)
  {
    $cli_addr_native_flat = '';
  }
  else
  {
    $cli_addr_native_flat = ', apt. '.$cli_addr_native_flat;
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANLAGE 1</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="Fonts/ARIALN.TTF">
</head>
<body>
    <section class="anlage">
        <div class="container">
            <div class="anlage__right">
                <p class="anlage__right__descr">Anlage 1</p>
            </div>
            <p class="anlage__center">Beauftragung eines beschleunigten Fachkräfteverfahrens nach § 81a AufenthG</p>
            <div class="anlage__block">
                <div class="anlage__von">
                    <ul>
                        <li class="anlage__von__one">Von:</li>
                        <li class="anlage__von__two">Firmenname <?php echo $cli_emp;?></li>
                        <li class="anlage__von__three">Kundennummer des BIS</li>
                        <li class="anlage__von__four">Straße, Hausnummer <?php echo $cli_emp_addr_street.',',$cli_emp_addr_house;?><br><?php echo $cli_emp_addr_zip;?> Berlin</li>
                        <li class="anlage__von__five">(Arbeitgeber)</li>
                    </ul>
                </div>
                <div class="anlage__an">
                    <ul>
                        <li class="anlage__an__one">An:</li>
                        <li class="anlage__an__two">Landesamt für Einwanderung</li>
                        <li class="anlage__an__three">Friedrich-Krause-Ufer 24</li>
                        <li class="anlage__an__four">13353 Berlin</li>
                        <li class="anlage__an__five">(LEA)</li>
                    </ul>
                </div>
            </div>
            <div class="unter">
                <p class="unter__description">Unter Bezugnahme auf die am <input class="input__unter input__width" type="text"> geschlossene Vereinbarung nach § 81 a Abs. 2 AufenthG zwischen dem Arbeitgeber und dem LEA beauftragt der Arbeitgeber das LEA zur Durchführung eines beschleunigten Fachkräfteverfahrens nach § 81 a AufenthG. Das Verfahren wird durchgeführt zugunsten von:</p>
            </div>
            <table>
                <tr>
                    <th class="Nr">Nr.</th>
                    <th class="vorname">Name, Vorname</th>
                    <th class="Passnummer">Passnummer</th>
                    <th class="Adresse">Aktuelle Adresse</th>
                    <th class="Verfahren">Verfahren</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td><?php echo $cli_name.', '.$cli_name_first;?></td>
                    <td><?php echo $cli_pass_number;?></td>
                    <td><?php echo $cli_addr_native_street.', '.$cli_addr_native_house.$cli_addr_native_building.$cli_addr_native_flat.', '.$cli_addr_native_zip.', '.$cli_addr_native_place.', '.$cli_addr_native_land;?></td>
                    <td></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
            </table>
            <p class="table__descr">(Je genannter Person fallen Gebühren in Höhe von 411€ an (§ 47 Abs.1 Nr.15 AufenthV. Bei Minderjährigen verringert sich die Gebühr um die Hälfte (§ 50 Abs. 1 AufenthV). </p>
            <div class="berlin">
                <div class="berlin__left">
                    <p>Berlin <?php echo $cli_emp_sign_place;?>, den </p>
                    <input class="input__unter input__berlin" type="text" value="<?php echo date('d.m.Y',strtotime($cli_emp_sign_date));?>">
                    <p>[Unterschrift Arbeitgeber] </p>
                    <p>[Firmenstempel]</p>
                </div>
                <div class="berlin__right">
                    <p>Berlin, den</p>
                    <input class="input__unter input__berlin" type="text">
                    <p>[Unterschrift LEA]</p>
                </div>
            </div>
        </div>
        
    </section>        
</body>
</html>
<?php 
  exit();
endif; ?>

<?php
//ANLAGE2 button processing
if ($btnAnlage2):  
  if (strcmp(', bld. '.$cli_addr_native_building, ', bld. ') == 0)
  {
    $cli_addr_native_building = '';
  }
  else
  {
    $cli_addr_native_building = ', bld. '.$cli_addr_native_building;
  }

  if (strcmp(', apt. '.$cli_addr_native_flat, ', apt. ') == 0)
  {
    $cli_addr_native_flat = '';
  }
  else
  {
    $cli_addr_native_flat = ', apt. '.$cli_addr_native_flat;
  }
  
  if (strcmp($cli_emp_phone, '') == 0)
  {
    $cli_emp_phone = $cli_emp_mob;
  }
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="oneform.css">
    <title>Anlage 2</title>
  </head>
  <body>
    <div class="container">
      <div class="page-1">
        <p class="running-title-header">Anlage 2<span>Seite 1 von 2</span></p>
        <h1 class="title">Vollmacht für die Beantragung eines beschleunigten Fachkräfteverfahrens nach § 81a Abs. 2 Nr. 2 AufenthG</h1>
        <div class="personal-data">
          <div class="personal-data__specialist">
            <h2 class="personal-data__title">Vollmachtgeber/in / Fachkraft</h2>
            <div class="personal-data__item">
              <p class="personal-data__headline">Vorname/n, name</p>
              <p class="personal-data__data"><?php echo $cli_name.', '.$cli_name_first;?></p>
            </div>
            <div class="personal-data__item personal-data__item--mh20">
              <p class="personal-data__headline">Straße, Hausnr.:</p>
              <p class="personal-data__data"><?php echo $cli_addr_native_street.', '.$cli_addr_native_house.$cli_addr_native_building.$cli_addr_native_flat;?></p>
            </div>
            <div class="personal-data__item">
              <p class="personal-data__headline">PLZ, Ort</p>
              <p class="personal-data__data"><?php echo $cli_addr_native_zip.', '.$cli_addr_native_place;?></p>
            </div>
            <div class="personal-data__item personal-data__item--mh19">
              <p class="personal-data__headline">Land</p>
              <p class="personal-data__data"><?php echo $cli_addr_native_land;?></p>
            </div>
            <div class="personal-data__item">
              <p class="personal-data__headline">Geburtsdatum:</p>
              <p class="personal-data__data"><?php echo date('d.m.Y',strtotime($cli_birth_date));?></p>
            </div>
            <div class="personal-data__item">
              <p class="personal-data__headline">Geburtsort:</p>
              <p class="personal-data__data"><?php echo $cli_birth_place;?></p>
            </div>
            <div class="personal-data__item personal-data__item--mb0">
              <p class="personal-data__headline">Geburtsland:</p>
              <p class="personal-data__data"><?php echo $cli_birth_land;?></p>
            </div>
            <div class="personal-data__item personal-data__item--mb0">
              <p class="personal-data__headline">Telefonnummer:</p>
              <p class="personal-data__data"><?php echo $cli_mob_native;?></p>
            </div>
            <div class="personal-data__item personal-data__item--mb0">
              <p class="personal-data__headline">E-Mail:</p>
              <p class="personal-data__data"><?php echo $cli_email;?></p>
            </div>
          </div>
          <div class="personal-data__company">
            <h2 class="personal-data__title">Arbeitgeber</h2>
            <div class="personal-data__item">
              <p class="personal-data__headline">Firma:</p>
              <p class="personal-data__data"><?php echo $cli_emp;?></p>
            </div>
            <div class="personal-data__item personal-data__item--w100">
              <p class="personal-data__headline">Geschäftssitz / Sitz der maßgeblichen Betriebsstätte</p>
              <p class="personal-data__data"><?php echo $cli_emp_addr_zip.', '.$cli_emp_addr_place;?></p>
            </div>
            <h2 class="personal-data__title personal-data__title--right">Firmenstempel</h2>
            <div class="personal-data__item">
              <p class="personal-data__headline personal-data__headline--w100">vertreten durch <br>(Geschäftsführer/-in bzw. / Inhaber/-in) <br>Name, Vorname <span class="personal-data__data personal-data__data--ml10"><?php echo $cli_emp_name.', '.$cli_emp_name_first;?></p>
            </div>
            <div class="personal-data__item personal-data__item--mb9">
              <p class="personal-data__headline">Anschrift:</p>
              <p class="personal-data__data"><?php echo $cli_emp_addr_street.', '.$cli_emp_addr_house.', '.$cli_emp_addr_zip.', '.$cli_emp_addr_place;?></p>
            </div>
            <div class="personal-data__item personal-data__item--mb9">
              <p class="personal-data__headline">Telefonnummer:</p>
              <p class="personal-data__data"><?php echo $cli_emp_phone;?></p> <!-- cli-emp-mob -->
            </div>
            <div class="personal-data__item personal-data__item--mb9">
              <p class="personal-data__headline">E-Mail:</p>
              <p class="personal-data__data"><?php echo $cli_emp_email;?></p>
            </div>
          </div>
        </div>
        <div class="main-text">
          <p>Hiermit bevollmächtige ich, die von meinem Arbeitgeber bestellte, oben genannte Person (im Folgenden: „die Be&shyvollmächtigte“), beim LEA das beschleunigte Fachkräfteverfahren nach § 81a AufenthG sowie die sonstigen gege&shybenenfalls damit zusammenhängenden und in § 81a Abs. 3 AufenthG aufgeführten Verfahren zu beantragen, und mich in diesen Verfahren bezüglich aller gesetzlich zulässigen Angelegenheiten außergerichtlich zu vertreten.</p>
          <p>Ich erteile der Bevollmächtigten die Befugnis, sämtliche Erklärungen und Handlungen verbindlich vorzunehmen, die nach den gesetzlichen Regelungen vorgenommen werden können und für die Verfahren erforderlich sind.</p>
          <p>Der Umfang der Vertretungsbefugnis beinhaltet insbesondere</p>
          <ul>
            <li>die Vertretung in allen für die Durchführung des beschleunigten Fachkräfteverfahrens erforderlichen Ange&shy legenheiten gegenüber dem LEA, der Anerkennungsstelle sowie der ggf. sonstigen zuständigen Behörden auf persönlichem, schriftlichem und elektronischem Weg,</li>
            <li>das Ein- und Nachreichen der für die Verfahren erforderlichen Unterlagen, sowie die Zustimmung zur Auf&shynahme sämtlicher Unterlagen in die Ausländerakte,</li>
            <li>die Vornahme von Zahlungen von für den Abschluss der Verfahren erforderlichen Gebühren,</li>
            <li>die Entgegennahme der die Verfahren betreffenden schriftlichen sowie elektronischen Unterlagen, die Durchführung des Schriftverkehrs und das Öffnen der an mich adressierten Post.</li>
          </ul>
          <p>Die Bevollmächtigte ist berechtigt, Untervollmachten, die den Umfang dieser Vollmacht nicht überschreiten, zu er&shyteilen und zu widerrufen. Die Vollmacht erlischt mit Abschluss des beschleunigten Fachkräfteverfahrens.</p>
          <p>Da diese Vollmacht meine rechtliche Möglichkeit im beschleunigten Verfahren selbst zu handeln nicht ausschließt, bitte ich um direkten Kontakt zu mir, sofern dies zur Klärung von Sachverhalten und zur Verfahrensbeschleunigung erforderlich erscheint.</p>
          <p class="main-text__p--lh">Wir nehmen zur Kenntnis, dass die Vorabzustimmung des LEA keine Außenwirkung hat und demnach kein Ver&shywaltungsakt ist. Die Einlegung eines Rechtsmittels ist somit erst nach Ablehnung des Visums durch die zuständige Auslandsvertretung möglich. Auch die Notwendigkeit der Visumsbeantragung für eine gerichtliche Überprüfung ha&shyben wir zur Kenntnis genommen. Wir erklären unser Einverständnis, dass das LEA der Auslandsvertretung auf Anforderung die notwendigen Unterlagen zur Prüfung eines Visumsantrags übersenden darf.</p>
        </div>
        <div class="signatures">
          <div class="signatures__specialist">
            <p class="signatures__headline">Ort, Datum<span class="signatures__data"><?php echo $cli_sign_place.', '.date('d.m.Y',strtotime($cli_sign_date));?></span></p>
            <p class="signatures__sign-placeholder"></p>
            <p class="signatures__description"><img class="signatures__line" src="images/line-black.jpg">[<i>Unterschrift Vollmachtgeber/in / Fachkraft</i>]</p>
          </div>
          <div class="signatures__company">
            <p class="signatures__headline">Ort, Datum<span class="signatures__data"><?php echo $cli_sign_place.', '.date('d.m.Y',strtotime($cli_sign_date));?></span></p>
            <p class="signatures__sign-placeholder"></p>
            <p class="signatures__description signatures__description--pl12"><img class="signatures__line" src="images/line-black.jpg">[<i>Unterschrift Bevollmächtigte/r / Geschäfts-<br>führer/in</i>]</p>
          </div>
        </div>
      </div>
      <div class="page-2">
        <p class="running-title-header">Anlage 2<span>Seite 2 von 2</span></p>
        <h1 class="title">Einwilligungserklärung nach Art. 7 DSGVO</h1><br>zur Datenerhebung, -speicherung, -nutzung und -verarbeitung
        <div class="agreement">
          <p class="agreement__headline">Hiermit willige ich, [Vor- und Nachname]:</p>
          <p class="agreement__data"><?php echo $cli_name_first.' '.$cli_name;?></p>
        </div>
        <div class="main-text">
          <p>entsprechend Art. 7 DSGVO ein, dass meine Daten zum Zwecke der Durchführung des beschleunigten Fachkräfteverfahrens  sowie  der  sonstigen  gegebenenfalls  damit  zusammenhängenden  und  in  §  81a Abs. 3 AufenthG aufgeführten Verfahren durch meinen bevollmächtigten Arbeitgeber sowie den für die Verfahren zuständigen Behörden und deren Mitarbeitern erhoben, gespeichert, eingesehen, genutzt und verarbeitet werden.</p>
          <p>Zudem willige ich der Archivierung dieser Daten ein, solange dies zum Zweck der Durchführung der weiteren Verfahren und der statistischen Auswertung erforderlich ist.</p>
          <p>Ich habe in Absprache mit meinem Arbeitgeber Einblick in meine personenbezogenen Daten; bei Feh&shylerhaftigkeit erfolgt eine Korrektur.</p>
          <p>Ich erkläre, dass meine Einwilligung freiwillig und ohne Zwang erfolgt.</p>
          <p>Diese Einverständniserklärung kann ich gemäß Art. 7 Abs. 3 DSGVO jederzeit mit Wirkung für die Zu&shykunft gegenüber meinem Arbeitgeber widerrufen.</p>
          <p>Der Arbeitgeber gewährleistet jederzeit die Einhaltung der Vorschriften über den Datenschutz gemäß der Datenschutz-Grundverordnung.</p>
        </div>
        <div class="signature">
          <div class="signature__specialist">
            <p class="signature__headline">Ort, Datum:</p>
            <p class="signature__data"><?php echo $cli_sign_place.', '.date('d.m.Y',strtotime($cli_sign_date));?></p>
          </div>
          <p class="signature__sign-placeholder"></p>
          <p class="signature__description"><img class="signature__line" src="images/line-black.jpg">[Unterschrift Vollmachtgeber/in / Fachkraft]</p>
        </div>
      </div>
    </div>
  </body>
</html>
<?php 
  exit();
endif; ?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if  (!$btnAnlage1 || $btnAnlage2): ?>
    <title>ONEFORM</title>
    <?php endif; ?>
    <link rel="stylesheet" href="./style.css">
    <!-- <link rel="stylesheet" href="./glider.css"> -->
    <link rel="stylesheet" href="./css/main.css">
    <script src="./glider.js"></script>
    <!-- <script src="./script.js" defer></script>     -->
  </head>
  <script>
  window.onload = function(e){
    let allInForm = document.getElementsByName("form")
    let allInputs = allInForm[0].getElementsByTagName("input")
    console.log(allInputs)
    for (let i in allInputs) {
      !(allInputs[i].value.length > 0) ? allInputs[i].classList.add('redbox') : allInputs[i].classList.remove('redbox')
    }
  }
  function checkempty() {
    !(this.value.length > 0) ? this.classList.add('redbox') : this.classList.remove('redbox')
  }
  
</script>
  <body>
    <section class="main">
      <div class="container">
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
        <form method="post" name="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" <?php echo ($btnAnlage1 || $btnAnlage2)  ? 'hidden' : '' ?>>
          <fieldset>
            <div>
                <input type="hidden" id="id" name="id" value="<?php echo isset($id) ? $id : '' ?>" />
            </div>
            <div>
                <label for="cli_emp">Firmenname (wie im Arbeitsvertrag)</label><br>
                <input type="text" id="cli_emp" name="cli_emp" onfocus="checkempty.call(this)" onblur="checkempty.call(this)" value="<?php echo isset($cli_emp) ? $cli_emp : '' ?>" />
            </div>
            <br>
            <div>
                <h5>Geschäftssitz / Sitz der maßgeblichen Betriebsstätte:</h5>
                <label for="cli_emp_addr_street">Stra&szlig;e - Street - Улица</label><br>
                <input type="text" id="cli_emp_addr_street" name="cli_emp_addr_street" onfocus="checkempty.call(this)" onblur="checkempty.call(this)" value="<?php echo isset($cli_emp_addr_street) ? $cli_emp_addr_street : '' ?>" />
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
              <input type="email" id="cli_emp_email" name="cli_emp_email" placeholder="info@example.com" value="<?php echo isset($cli_emp_email) ? $cli_emp_email : '' ?>" />
            </div>
            <br>

            <div>
              <label for="cli_emp_phone">Phone number - Телефонный номер</label>
              <br>
              <input type="tel" id="cli_emp_phone" name="cli_emp_phone" value="<?php echo isset($cli_emp_phone) ? $cli_emp_phone : '' ?>" />
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
              <input type="text" id="cli_emp_sign_place" name="cli_emp_sign_place" value="<?php echo isset($cli_emp_sign_place) ? $cli_emp_sign_place : 'Berlin' ?>" />
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
            </div>
            <br>
          </fieldset>
      
          <h3>Worker's Data</h3>

          <fieldset>
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
            </div>
            <br>
          </fieldset>
         
          <div>
            <input type="submit" class="form-button" name="btnSave" value="Save" />
            <br>
            Your entries will be saved. You can delete them anytime
          </div>      
          
          <div>
            <input type="submit" class="form-button" name="btnAnlage1" value="Anlage1" />
          </div>      
          
          <div>
            <input type="submit" class="form-button" name="btnAnlage2" value="Anlage2" />
          </div>      
          
          <!--<button type="submit" class="form-button">SAVE entered data</button> -->
        </form>
      </div>
    </section>
  </body>
</html>
    