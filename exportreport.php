<?php

include 'connect.php';

if(!isset($_SESSION['uid'])){
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Report</title>
    <script src="csvtable/table-to-csv.min.js"></script>
</head>
<body>
    <?= include 'header.php' ?>

    <div class="container">
        <a href="" id="btndownload" class="btn btn-success" >Download</a>

        <table class="table" id="mytable">
            <thead>
                <tr>
                    <th>Token#</th>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Fee</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
<tr>
                <td>101</td>
                <td>Ahmed</td>
                <td>Dr.Ghufran</td>
                <td>400</td>
               <td><a href="">Edit</a></td>
            </tr>
            <tr>
                <td>102</td>
                <td>Wali</td>
                <td>Dr.Ghufran</td>
                <td>3500</td>
              <td><a href="">Edit</a></td>
            </tr>
            <tr>
                <td>103</td>
                <td>Zeeshan</td>
                <td>Dr.Ghufran</td>
                <td>600</td>
                
            </tr>
            </tbody>
            
        </table>
    </div>

<script>
    function main() {
    const tableToCSV = new TableToCSV("#mytable", {
        filename: "OPDReport.csv",
        delimiter: ",", //delimiter (optional) default value ","
        ignoreColumns: [4], //column index (optional)
    });
    document.querySelector("#btndownload").addEventListener("click", (e) => {
        tableToCSV.download();
    });
}
main();
</script>

</body>
</html>