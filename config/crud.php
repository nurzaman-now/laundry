<?php
// $db = new MYSQLi("localhost", "laundryb_dress", "cucipakaian123", "laundryb_dress");
$db = new MYSQLi("localhost", "root", "", "laundry");
if ($db->connect_error > 0) {
  die('Connection error');
} else {
  echo '';
};
function create($table, $column, $value, $message = null)
{
  $db = $GLOBALS['db'];
  $sql = "INSERT INTO " . $table . " (" . $column . ") VALUES(" . $value . ")";
  $create = $db->query($sql);
  if ($create) {
    if ($message)
      echo ('<script>alert("' . $message . '");</script>');
    return true;
  } else {
    if ($message)
      echo ('<script>alert("Gagal")</script>');
    return false;
  }
};

function read($table, $column, $condition = null)
{
  $db = $GLOBALS['db'];
  $sql = "SELECT " . $column . " FROM " . $table;
  if ($condition) {
    $sql = $sql .  $condition;
  }
  $read = $db->query($sql);
  if ($read->num_rows > 0) {
    return $read;
  } else {
    return false;
  }
}

function update($table, $column, $condition, $message = null)
{
  $db = $GLOBALS['db'];
  $sql = "UPDATE " . $table . " SET " . $column . " WHERE " . $condition;
  $update = $db->query($sql);
  if ($update) {
    if ($message)
      echo ('<script>alert("' . $message . '");</script>');
    return true;
  } else {
    if ($message)
      echo ('<script>alert("Gagal")</script>');
    return false;
  }
}

function deletedb($table, $condition, $message)
{
  $db = $GLOBALS['db'];
  $sql = "DELETE FROM " . $table . " WHERE " . $condition;
  $delete = $db->query($sql);
  if ($delete) {
    echo ('<script>alert("' . $message . '");</script>');
    return true;
  } else {
    echo ('<script>alert("Gagal")</script>');
    return false;
  }
}
