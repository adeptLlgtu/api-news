<?php

 /*
 |--------------------------------------------------------------------------
 | Файл маршрутизации
 |--------------------------------------------------------------------------
 */

namespace SDFramework\Routes;
$route->before('GET', '/.*', function() {
  //
 });
$route->get('/', function() {
  echo \SDFramework\Controllers\DefaultController::welcome();
});
//GET FIELD FROM TABLE BY FIELD_VALUE
$route->get('/api/from:(\w+)', function($table) {
  echo \SDFramework\Controllers\DefaultController::get_req($table);
});

$route->get('/api/flag:(\w+)', function($flag) {
  echo \SDFramework\Controllers\DefaultController::get_news($flag);
});

$route->get('/api/get:(\w+)/from:(\w+)/id:(\w+)', function($field, $table, $id) {
  echo \SDFramework\Controllers\DefaultController::get_user($field, $table,  $id);
});
////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////
$route->post('/api/registration', function() {
  echo \SDFramework\Controllers\DefaultController::registration();
});

$route->post('/api/delete_news', function() {
  echo \SDFramework\Controllers\DefaultController::delete_news();
});

$route->post('/api/delete_user', function() {
  echo \SDFramework\Controllers\DefaultController::delete_user();
});

$route->post('/api/repair_news', function() {
  echo \SDFramework\Controllers\DefaultController::repair_news();
});

$route->post('/api/repair_users', function() {
  echo \SDFramework\Controllers\DefaultController::repair_users();
});


$route->post('/api/createNews', function() {
  echo \SDFramework\Controllers\DefaultController::createNews();
});


?>