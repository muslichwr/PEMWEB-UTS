<style>
@charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);
body {
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
  line-height: 1.42em;
  color:#A7A1AE;
  background-color:#1F2739;
}

h1 {
  font-size:3em; 
  font-weight: 300;
  line-height:1em;
  text-align: center;
  color: #4DC3FA;
}

h2 {
  font-size:1em; 
  font-weight: 300;
  text-align: center;
  display: block;
  line-height:1em;
  padding-bottom: 2em;
  color: #FB667A;
}

h2 a {
  font-weight: 700;
  text-transform: uppercase;
  color: #FB667A;
  text-decoration: none;
}

.blue { color: #185875; }
.yellow { color: #FFF842; }

.container th h1 {
      font-weight: bold;
      font-size: 1em;
  text-align: left;
  color: #185875;
}

.container td {
      font-weight: normal;
      font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
       -moz-box-shadow: 0 2px 2px -2px #0E1119;
            box-shadow: 0 2px 2px -2px #0E1119;
}

.container {
      text-align: left;
      overflow: hidden;
      width: 80%;
      margin: 0 auto;
  display: table;
  padding: 0 0 8em 0;
}

.container td, .container th {
      padding-bottom: 2%;
      padding-top: 2%;
  padding-left:2%;  
}

/* Background-color of the odd rows */
.container tr:nth-child(odd) {
      background-color: #323C50;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
      background-color: #2C3446;
}

.container th {
      background-color: #1F2739;
}

.container td:first-child { color: #FB667A; }

.container tr:hover {
   background-color: #464A52;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
       -moz-box-shadow: 0 6px 6px -6px #0E1119;
            box-shadow: 0 6px 6px -6px #0E1119;
}

.container td:hover {
  background-color: #FFF842;
  color: #403E10;
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
      transition-duration: 0.4s;
      transition-property: all;
  transition-timing-function: line;
}

@media (max-width: 800px) {
.container td:nth-child(4),
.container th:nth-child(4) { display: none; }
}
</style>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<h1><span class="yellow">Muslich Wahyu Romadhon</pan></h1>
<h1>20050974034

<table class="container">
    <thead>
        <tr>
            <th><h1>No</h1></th>
            <th><h1>Judul</h1></th>
            <th><h1>Pengarang</h1></th>
            <th><h1>Tahun Terbit</h1></th>
        </tr>
    </thead>
    <tbody>
    <?php

$buku = array(
    array(
        "judul" => "Pemrograman Web dengan Laravel",
        "pengarang" => "Budi Sutejo",
        "tahun" => 2019
    ),
    array(
        "judul" => "Belajar Mandiri Python",
        "pengarang" => "Ahmad Arifin",
        "tahun" => 2010
    ),
    array(
        "judul" => "Microsoft Word untuk Penulisan Ilmiah",
        "pengarang" => "Edi Rahmadi",
        "tahun" => 2015
    ),
);


    $no =1;
    foreach($buku as $uts){
      echo "<tr>";
      echo "<td>".$no."</td>
      <td>".$uts['judul']."</td>
      <td>".$uts['pengarang']."</td>
      <td>".$uts['tahun']."</td>";
      echo "</tr>";
      $no++;
    }
    ?>
    </tbody>
</table>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>