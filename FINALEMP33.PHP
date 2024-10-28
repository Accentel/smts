<?php
include('dbconnection/connection.php');

$datatable = "request";
$results_per_page = 30;

// Get the current page number from the URL, default to 1 if not set
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$start_from = ($page - 1) * $results_per_page;

if (isset($_POST['bsearch'])) {
    $bsearch = $_POST['search'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    
    // Modify the query to include your search conditions
    $y = "SELECT * FROM request WHERE (empid LIKE '%$bsearch%' OR sname LIKE '%$bsearch%' OR indid LIKE '%$bsearch%') AND datecheck BETWEEN '$from_date' AND '$to_date' ORDER BY id DESC";
} elseif (isset($_POST['submitkk'])) {
    $uploadby = $_POST['uploadby'];
    $sname = $_POST['sname'];
    $indid = $_POST['indid'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    
    // Modify the query to include your advanced search conditions
    $y = "SELECT * FROM request WHERE
        (('' <> ' ' AND LOCATE('$uploadby', uploadby) <> 0) OR ('' = ' ' AND 1 = 1)) AND
        (('' <> ' ' AND LOCATE('$sname', sname) <> 0) OR ('' = ' ' AND 1 = 1)) AND
        (('' <> ' ' AND LOCATE('$indid', indid) <> 0) OR ('' = ' ' AND 1 = 1)) AND
        datecheck BETWEEN '$from_date' AND '$to_date' ORDER BY id DESC LIMIT $start_from, $results_per_page";
} else {
    // Default query without search
    $y = "SELECT * FROM $datatable ORDER BY id DESC LIMIT $start_from, $results_per_page";
}

$t = mysqli_query($link, $y) or die(mysqli_error($link));
$i = $start_from + 1; // Initialize the row counter for the displayed data
$start = 1;

echo "<tbody>";

while ($rs1 = mysqli_fetch_array($t)) {
    // Output your table rows here
    echo "<tr>";
    // Output table data for each column as needed
    echo "<td>" . $i . "</td>";
    echo "<td class='hidden-480'>" . $rs1['empid'] . "</td>";
    // Output other columns similarly
    echo "</tr>";
    $i++;
}

echo "</tbody>";

// Generate pagination links
$sql = "SELECT COUNT(id) AS total FROM " . $datatable;
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
$total_records = $row["total"];
$total_pages = ceil($total_records / $results_per_page);

echo "<ul class='pagination'>";
if ($page > 1) {
    echo "<li><a href='finalemp1.php?page=" . ($page - 1) . "' class='button'>Previous</a></li>";
}
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<li><a href='finalemp1.php?page=" . $i . "' class='button'>" . $i . "</a></li>";
}
if ($page < $total_pages) {
    echo "<li><a href='finalemp1.php?page=" . ($page + 1) . "' class='button'>Next</a></li>";
}
echo "</ul>";
?>
