<?php
error_reporting(0);
require_once "connection/dbcon.php";

if (($_GET['pagesize'])) {
    $pagesize = $_GET['pagesize'];
} else {
    $pagesize = 5;
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$start_from = ($page - 1) * $pagesize;

$q1 = mysqli_query($connect, "SELECT flight_id, plane_name, dep_airport, arr_airport FROM FLIGHT LIMIT $start_from, $pagesize");
$q2 = mysqli_query($connect, "SELECT flight_id, amountD FROM DEPARTURES LIMIT $start_from, $pagesize");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 9</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">

</head>

<body>
    <header>
        <h1>Список рейсів</h1>
    </header>

    
    <div class="row">
        <div class="column">
            <table>
                <caption>Рейси</caption>
                <tr>
                    <th>flightID</th>
                    <th>PlaneName</th>
                    <th>DepartureAirport</th>
                    <th>ArrivalAirport</th>
                </tr>
                <?php while ($rows = mysqli_fetch_array($q1)) : ?>
                    <tr>
                        <td><?php echo $rows['flight_id'] ?></td>
                        <td><?php echo $rows['plane_name'] ?></td>
                        <td><?php echo $rows['dep_airport'] ?></td>
                        <td><?php echo $rows['arr_airport'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
        <div class="column">
            <table>
                <caption>Кількість вилетів по кожному з рейсів</caption>
                <tr>
                    <th>FlightID</th>
                    <th>AmountDepartures</th>
                </tr>
                <?php while ($rows = mysqli_fetch_array($q2)) : ?>
                    <tr>
                        <td><?php echo $rows['flight_id'] ?></td>
                        <td><?php echo $rows['amountD'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
    <div class="text-center">
        <div class="pagination">
            <?php
            $query = 'SELECT COUNT(*) FROM flight';
            $rs_result = mysqli_query($connect, $query);
            $row = mysqli_fetch_row($rs_result);
            $total_records = $row[0];

            $total_pages = ceil($total_records / $pagesize);
            $pagLink = "";

            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    $pagLink .= "<a class = 'active' href='index.php?page="
                        . $i . "&pagesize=" . $pagesize . "'>" . $i . " </a>";
                } else {
                    $pagLink .= "<a href='index.php?page="
                        . $i . "&pagesize=" . $pagesize . "'>" . $i . " </a>";
                }
            };
            echo $pagLink;

            ?>
        </div>
    </div>
</body>

</html>