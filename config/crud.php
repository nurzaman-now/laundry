<?php
$db = new MYSQLi("localhost", "root", "", "laundry");
if ($db->connect_error > 0) {
  die('Connection error');
} else {
  echo '';
};
function create($table, $column, $value, $message)
{
  $db = $GLOBALS['db'];
  $sql = "INSERT INTO " . $table . " (" . $column . ") VALUES(" . $value . ")";
  $create = $db->query($sql);
  if ($create) {
    echo ('<script>alert("' . $message . '")</script>');
    return true;
  } else {
    echo ('<script>alert("Gagal")</script>');
    return false;
  }
};

function read($table, $column, $add = false, $condition, $message)
{
  $db = $GLOBALS['db'];
  $sql = "SELECT " . $column . " FROM " . $table;
  if ($add) {
    $sql = $sql . " WHERE " . $condition;
  }
  $read = $db->query($sql);
  if ($read->num_rows > 0) {
    $row = $read->fetch_object();
    echo ('<script>alert("' . $message . '")</script>');
    return $row;
  } else {
    echo ('<script>alert("Gagal")</script>');
    return false;
  }
}
