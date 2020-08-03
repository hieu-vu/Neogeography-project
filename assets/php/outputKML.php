<?php
require_once("connectd.php");
if (isset($_POST['btn-output'])) {
    // Selects all the rows in the markers table.
    $query = 'SELECT * FROM addbeer';
    $result = mysqli_query($connect,$query);

    if (!$result) 
    {
    die('Invalid query: ' . mysqli_error($connect));
    }

    // Creates an array of strings to hold the lines of the KML file.
    $kml = array('<?xml version="1.0" encoding="UTF-8"?>');
    $kml[] = '<kml xmlns="http://www.opengis.net/kml/2.2">';
    $kml[] = ' <Document>';
    $kml[] = '      <name>KmlFile</name>';
    $kml[] = '      <Style id="sh_beerLocation">';
    $kml[] = '          <IconStyle>';
    $kml[] = '              <Icon>';
    $kml[] = '                  <href>https://v-hius.github.io/assets/img/beerLocation.png</href>';
    $kml[] = '              </Icon>';
    $kml[] = '          </IconStyle>';
    $kml[] = '      </Style>';

    // Iterates through the rows, printing a node for each row.
    while ($row = @mysqli_fetch_assoc($result))
    {
    $kml[] = '      <Placemark id="placemark' . $row['id'] . '">';
    $kml[] = '          <name>' . $row['TenDiaDiem'] . '</name>';
    $kml[] = '          <description><![CDATA[' . $row['DiaChi'] . ']]></description>';
    $kml[] = '          <styleUrl>#sh_beerLocation</styleUrl>';
    $kml[] = '          <Point>';
    $kml[] = '                  <coordinates>' . $row['ToaDo'] . ',0</coordinates>';
    $kml[] = '          </Point>';
    $kml[] = '      </Placemark>';
    } 

    // End XML file
    $kml[] = ' </Document>';
    $kml[] = '</kml>';
    $kmlOutput = join($kml, "\n");

    header('Content-type: application/vnd.google-earth.kml+xml');
    header('Content-Disposition: attachment; filename="kml_output.kml"');

    echo $kmlOutput;
}
?>