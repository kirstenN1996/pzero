<?php

include('simple_html_dom.php');
$html = new simple_html_dom();
$html->load_file('https://www.worldometers.info/coronavirus/');

$table = $html->find('#main_table_countries_today', 0);

$tableData = [];

foreach ($table->find('tr') as $row) {
    $rowData = [];
    $rowData['country'] = trim($row->find('td', 1)->plaintext);

    $rowData['total_cases'] = trim($row->find('td', 2)->plaintext);
    $rowData['new_cases'] = trim($row->find('td', 3)->plaintext);
    $rowData['total_deaths'] = trim($row->find('td', 4)->plaintext);
    $rowData['new_deaths'] = trim($row->find('td', 5)->plaintext);
    $rowData['total_recovered'] = trim($row->find('td', 6)->plaintext);

    $tableData[] = $rowData;
}

$jsonData = json_encode($tableData);

echo $jsonData;

?>
