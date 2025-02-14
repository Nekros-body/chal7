<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <h6>Mees Cathering</h6>
        <nav>
<li><a href="#">home</a></li>
<li><a href="#">Info</a></li>
            </ul>
        </nav>
    </header>
    <div class="inhoud">
    <?php
        $producten = array('image.png', 'soep.png', "snacks.png", 'gebak.png','broodjes.png' );

        foreach($producten as $key => $value) {
            print "<div class='item$key'><img src='../img/$value'></div>";
        }
?>
    </div>
</body>
</html>