<?php
$url = "http://api.openweathermap.org/data/2.5/forecast?&id=1185241&lang=en&units=metric&APPID=813925bd91a5aef562c9e714e55514dc";
$contents = file_get_contents($url);
$clima=json_decode($contents);

$weather_list = $clima->list;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forecast</title>
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link href="css/styles.css" rel="stylesheet">
</head>
<body>
<h1 class="text-black text-center">Dhaka-weather forecast of seven days</h1>

    <div class="container flex-lg-nowrap">
    <section class="container py-1 mb-4 ">
        <div class="row">

            <?php
            foreach ($weather_list as $list) {
                foreach ($list as $list_item) {
                    if (is_string($list_item)) {
                        if (strlen($list_item) == 19) {
                            $temp_min = $list->main->temp_min;
                            $temp_max = $list->main->temp_max;
            ?>
            <div class="col-lg-3">
                    <div class="card bg-blue text-black mb-3 " >
                        <div class="card-header text-black">
                                <h2>Date: <?php echo substr($list_item, 0, 10); ?></h2>
                                <h2>Time: <?php echo substr($list_item, 12, 19); ?></h2>
                        </div>

                    <div class="card-body bg-white text-dark">
                        <div>
                            <div class="container">
                                <h4>Min Temp: <?php echo $temp_min . "&deg;C"; ?></h4>
                                <h4>Max Temp: <?php echo $temp_max . "&deg;C"; ?></h4>
                            </div>
                            
                        </div>
                    </div>
                    </div>

            </div>
    <?php
            }
        }
    }
}
    ?>
            
        </div>
         
    </section>
        </div>
    </div>

</body>
</html>