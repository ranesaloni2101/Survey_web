<?php
date_default_timezone_set("Asia/Kolkata");

$file = "Concord_Hourly_Log.csv";

// Create file with header if not exists
if (!file_exists($file)) {
    $header = [
        "Date","Shift Operator","Hour",
        "Filter Pump","Multi Grade","Micrin",
        "HP Pump","Booster Pump","Motor Valve",
        "Permeate Out","Reject Out",
        "Cond Feed","Cond Permeate","Cond Reject",
        "pH Feed","pH Reject",
        "Feed Temp","Feed Flow",
        "1st Stage Permeate","2nd Stage Permeate","Final Permeate",
        "Feed Flowmeter","Permeate Flowmeter",
        "Remarks","Entry Timestamp"
    ];
    $fp = fopen($file, 'w');
    fputcsv($fp, $header);
    fclose($fp);
}

// Append entry
$data = [
    date("Y-m-d"),
    $_POST['shift_operator'],
    $_POST['time'],
    $_POST['filter_pump'],
    $_POST['multi_grade'],
    $_POST['micrin'],
    $_POST['hp_pump'],
    $_POST['booster_pump'],
    $_POST['motor_valve'],
    $_POST['permeate_out'],
    $_POST['reject_out'],
    $_POST['cond_feed'],
    $_POST['cond_perm'],
    $_POST['cond_reject'],
    $_POST['ph_feed'],
    $_POST['ph_reject'],
    $_POST['feed_temp'],
    $_POST['feed_flow'],
    $_POST['perm1'],
    $_POST['perm2'],
    $_POST['final_perm'],
    $_POST['feed_fm'],
    $_POST['perm_fm'],
    $_POST['remarks'],
    date("Y-m-d H:i:s")
];

$fp = fopen($file, 'a');
fputcsv($fp, $data);
fclose($fp);

// Redirect back
header("Location: index.html");
exit;