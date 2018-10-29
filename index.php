<?php  

require 'vendor/autoload.php';

use App\ModelFactory;

$model_factory = new ModelFactory();

//Teste de Select
$return_select1 = $model_factory->select('users', ['id', 'name', 'email'])->execute();
echo "<br> {$return_select1} <br>";

$return_select2 = $model_factory->select('users', ['id', 'name', 'email'])->where(['id'=>1, 'name'=>'John Doe'])->execute();
echo "<br> {$return_select2} <br>";

$return_select3 = $model_factory->select('users', [])->execute();
echo "<br> {$return_select3} <br>";

$return_select4 = $model_factory->select('users', [])->where(['id'=>1, 'name'=>'John Doe'])->execute();
echo "<br> {$return_select4} <br>";


//Teste de Insert
$return_insert = $model_factory->insert('users', ['id', 'name', 'email'])->execute();
echo "<br> {$return_insert} <br>";

//Teste de Update
$return_update = $model_factory->update('users', ['id', 'name', 'email'])->where(['id'=>2])->execute();
echo "<br> {$return_update} <br>";

//Teste de Delete
$return_delete = $model_factory->delete('users')->where(['id'=>4])->execute();
echo "<br> {$return_delete} <br>";
