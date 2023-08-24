<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provinces</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
<?php
require './class/Function.php';
$ressource = fopen('./data/data.csv', 'r');
$province = [];
$region = [];
$district = [];
$commune = [];
$fokontany = [];
//tant que on arrive pas à la fin du FICHIER
while(!feof($ressource))
{
    $data[] = fgetcsv($ressource, 21694, ';', '"', '\\');
    
}

fclose($ressource);

for ($i=1; $i < 21695; $i++) { 
    array_push($province, $data[$i][5]);
    array_push($region, $data[$i][4]);
    array_push($commune, $data[$i][3]);
    array_push($district, $data[$i][2]);
    array_push($fokontany, $data[$i][1]);
}
$unique_province = array_unique($province);
$unique_commune = array_unique($commune);
$unique_region = array_unique($region);
$unique_district = array_unique($district);
$unique_fokontany = array_unique($fokontany);
/*****Ici ON REAFFECTE LES CLES Des tableaux EN CROISSANT POUR MIEUX CIBLES LES DONNEES */
foreach($unique_region as $reg)
{
    $new_reg[]=$reg;
}
foreach($unique_province as $prov)
{
    $new_prov[]=$prov;
}

foreach($unique_commune as $com)
{
    $new_com[]=$com;
}

foreach($unique_district as $dist)
{
    $new_dist[]=$dist;
}

foreach($unique_fokontany as $foko)
{
    $new_foko[]=$foko;
}
?>
<div class="container">
    <div class="titres">
        <h1>LES PROVINCES DE MADAGASCAR</h1>
    </div>
    <div class="btn_select">
        <div class="select_province">
            <label for="">PROVINCES:</label>
            <select name="province" id="select_btn">
            <?php foreach($unique_province as $key => $prov):?>
                    <?php if($prov != '\N'):?>
                <option value="<?=$prov?>"><?=$prov?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </div>
        <div class="select_region">
            <label for="">REGIONS:</label>
            <select name="region">
                <?php foreach($unique_region as $key => $reg):?>
                    <option value="<?=$reg?>"><?=$reg?></option>
                <?php endforeach?>
            </select>
        </div>
    </div>
    <div class="content_table" style ="overflow-x:auto">
        <table>
            <thead>
                <tr>
                    <th>Province</th>
                    <th>Regions</th>
                    <th>Distrika</th>
                    <th>Kaomina</th>
                    <th>Fokontany</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for($i=1;$i<21695;$i++):?>
                    <tr class="<?=$data[$i][5]?>" id="toggle">
                        <td><?=$data[$i][5]?></td>
                        <td><?=$data[$i][4]?></td>
                        <td><?=$data[$i][3]?></td>
                        <td><?=$data[$i][2]?></td>
                        <td><?=$data[$i][1]?></td> 
                    </tr>
                    <?php endfor?>
            </tbody>
        </table>
    </div>   
</div>
    <script src="./assets/index.js"></script> 
</body>
</html>