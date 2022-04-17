<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Setting the pages character encoding -->
    <meta charset="UTF-8">

    <!-- The meta viewport will scale my content to any device width -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link to my stylesheet -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>


    <!-- Lets start with the table element -->
    <table>
        <!-- The first row is the tables header -->
        <tr>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Ukuran</th>
            <th>Contact</th>
            <th>Warna</th>
        </tr>

        <!-- Next we will have the template which we will use inside
	  		the loop and poplulate with the data from the json file. -->

        <?php

			$json_data = file_get_contents("jualan.json");
			$products = json_decode($json_data, true);
			if(count($products) != 0){
				foreach ($products as $product) {
					?>
        <tr>
            <td>
                <img src="<?php echo $product['gambar']; ?>" alt="">
            </td>
            <td>
                <?php echo $product['name']; ?>
            </td>
            <td>
                <?php echo $product['price']; ?>;
            </td>
            <td>
                <?php echo $product['ukuran']; ?>
            </td>
            <td>
                <?php echo $product['email']; ?>
            </td>
            <td>
                <select name="warna" id="warna">
                    <option value="pilih warna">Pilih Warna</option>
                    <option value="merah">Merah</option>
                    <option value="kuning">Kuning</option>
                    <option value="hijau">Hijau</option>
                </select>
            </td>
        </tr>
        <?php
				}
			}
		?>
    </table>
</body>

</html>