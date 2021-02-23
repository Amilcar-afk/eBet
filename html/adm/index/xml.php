<?php
  include('includes/config.php');

  $bdd = bdd();
  $resp = $bdd->prepare('SELECT mail, name, firstname, login, passwd, city, phoneNumber, ip FROM USR');
  $resp->execute([]);

  $xw = xmlwriter_open_memory();
  xmlwriter_set_indent($xw, 1);
  $res = xmlwriter_set_indent_string($xw, ' ');

  xmlwriter_start_document($xw, '1.0', 'UTF-8');
  // Un premier élément
  xmlwriter_start_element($xw, 'CLIENTS');

  while($data = $resp->fetch()) {
    // Début d'un élément enfant
    xmlwriter_start_element($xw, 'client');
      // Attribut
      xmlwriter_start_attribute($xw, 'mail');
        xmlwriter_text($xw, $data['mail']);
      xmlwriter_end_attribute($xw);

      // Deuxième élément
      xmlwriter_start_element($xw, 'name');
        // Attribut
        xmlwriter_start_attribute($xw, 'lastName');
          xmlwriter_text($xw, $data['name']);
        xmlwriter_end_attribute($xw);

        xmlwriter_start_attribute($xw, 'firstName');
          xmlwriter_text($xw, $data['firstname']);
        xmlwriter_end_attribute($xw);
      xmlwriter_end_element($xw);

      // Troisième élément
      xmlwriter_start_element($xw, 'country');
        // Attribut
        xmlwriter_start_attribute($xw, 'name');
          xmlwriter_text($xw, $data['city']);
        xmlwriter_end_attribute($xw);
      xmlwriter_end_element($xw);

      // Quatrième élément
      xmlwriter_start_element($xw, 'login');
        // Attribut
        xmlwriter_start_attribute($xw, 'name');
          xmlwriter_text($xw, $data['login']);
        xmlwriter_end_attribute($xw);
      xmlwriter_end_element($xw);

      // Cinquième élément
      xmlwriter_start_element($xw, 'phoneNumber');
        // Attribut
        xmlwriter_start_attribute($xw, 'mobile');
          xmlwriter_text($xw, $data['phoneNumber']);
        xmlwriter_end_attribute($xw);
      xmlwriter_end_element($xw);

      // Sixième élément
      xmlwriter_start_element($xw, 'IP');
        // Attribut
        xmlwriter_start_attribute($xw, 'log');
          xmlwriter_text($xw, $data['ip']);
        xmlwriter_end_attribute($xw);
      xmlwriter_end_element($xw);

    xmlwriter_end_element($xw);
  }
  xmlwriter_end_element($xw); // tag1
  echo xmlwriter_output_memory($xw);
?>
