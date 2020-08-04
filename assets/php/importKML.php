<?php
    require_once('connectd.php');

    $file = "testImport.kml";
    $xml = simplexml_load_file($file);
    $placemarks = $xml->Document->Folder->Placemark;
    for ($i = 0; $i < count($placemarks); $i++) {
        $coordinates = $placemarks[$i]->ExtendedData->SchemaData->SimpleData[2][0];
        $cor_d = $placemarks[$i]->Point->coordinates;
        $name = $placemarks[$i]->name;
        $coords = explode(",",$cor_d, 2);
        $coord = join(',', $coords);
        echo $coord;
        $sql = "INSERT INTO dbmap (TenDiaDiem, ToaDo) VALUES ('$name','$coord')";
        mysqli_query($con,$sql);
        //echo'<script>alert("Đã nhập dữ liệu vào CSDL");</script>';
    }
    echo'<script>alert("Đã nhập dữ liệu vào CSDL");</script>';
?>
