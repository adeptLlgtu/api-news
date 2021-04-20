<?php 
namespace SDFramework\Controllers;
use SDFramework\Controller;
use \SDFramework\Database;
use SDFramework\Environment;
use SDFramework\ExceptionHandler;
class DefaultController
{
   /**
    * welcome
    * Главная страница
    * @return void
    */
   public static function welcome()
   {
    return '
    <head>
    <link type="text/css" rel="stylesheet" href="/style.css">
    <div class="wrapper">
       <span>NEWS API WORKED</span>
    </div>';
   }

   /**
    * col_get_between
    * Выводит данные 
    * @param mixed $id
    * @param mixed $field
    * @return void
    */
 

   /**
    * col_get_by
    * Выводит данные 
    * @param mixed $id
    * @param mixed $field
    * @return void
    */
   public static function get_req($table)
   {
      $db = (new Database())->ORM;
    
      $data = $db->getAll('SELECT * FROM '.$table.'');
    
   
      
      return json_encode($data);
   }

   public static function get_news($flag)
   {
      $db = (new Database())->ORM;

      if($flag=='true'){
         $data = $db->getAll('SELECT * FROM news where famous=true');
      }
      else{
     
         $data = $db->getAll('SELECT * FROM news where famous is null');
      }
    
      
    
   
      
      return json_encode($data);
   }
   

   public static function get_user($field, $table, $id)
   {
      $db = (new Database())->ORM;
      $f = $field;
      if($field == "all") $f = '*';
      if($id=="0"){
         $data = $db->getAll('SELECT '.$f.' FROM '.$table);
      }
      else{
         $data = $db->getAll('SELECT '.$f.' FROM '.$table.' WHERE id='.$id);
      }
   
      
      return json_encode($data);
   }
 

   public static function registration()
   {
      $db = (new Database())->ORM;
      $data = $_POST;

      // Указываем, что будем работать с таблицей users
      $users = $db->dispense('users');
      // Заполняем объект свойствами
      $users->login = $data['login'];
      $users->password = $data['password'];
      $users->nickname = $data['nickname'];
      $users->age = $data['age'];
      $users->permission = 1;

   
      // Сохраняем объект
      $db->store($users);

      return json_encode($data);
   }

   public static function change_secure()
   {
      $db = (new Database())->ORM;
      $data = $_POST;
      

      $id = $data['id'];
      // Загружаем объект с ID = 1
      $users = $db->load('users', $id);
      // Обращаемся к свойству объекта и назначаем ему новое значение
      $users->secure = $data['permission'];
      
      // Сохраняем объект
      $db->store($users);

      return json_encode($data);
   }

   public static function delete_user()
   {
      $db = (new Database())->ORM;
      $data = $_POST;

      $id = $data['id'];
      $users = $db->load('users', $id);
      $db->trash($users);

      return json_encode($data);
   }

   public static function delete_news()
   {
      $db = (new Database())->ORM;
      $data = $_POST;

      $id = $data['id'];
      $news = $db->load('news', $id);
      $db->trash($news);

      return json_encode($data);
   }

   public static function createNews()
   {
      $db = (new Database())->ORM;
      $data = $_POST;

      // Указываем, что будем работать с таблицей users
      $news = $db->dispense('news');
      // Заполняем объект свойствами
      $news->public_date = $data['public_date'];
      $news->author_name = $data['author_name'];
      $news->title = $data['title'];
      $news->img_source = $data['img_source']; 
      $news->description = $data['description'];
      $news->video_flag = $data['video_flag'];
      $news->disclamer = $data['disclamer'];
      $news->famous = $data['famous'];
      $news->author_id = $data['author_id'];
   
      // Сохраняем объект
      $db->store($news);

      return json_encode($data);
   }

   public static function repair_news()
   {
      $db = (new Database())->ORM;
      $data = $_POST;
      

      $id = $data['id'];
      $news = $db->load('news', $id);
      // Обращаемся к свойству объекта и назначаем ему новое значение
      $news->public_date = $data['public_date'];
      $news->title = $data['title'];
      $news->img_source = $data['img_source']; 
      $news->description = $data['description'];
      $news->video_flag = $data['video_flag'];
      $news->disclamer = $data['disclamer'];
      $news->famous = $data['famous'];
      $news->author_id = $data['author_id'];
      
      
      // Сохраняем объект
      $db->store($news);

      return json_encode($data);
   }

   public static function repair_users()
   {
      $db = (new Database())->ORM;
      $data = $_POST;
      

      $id = $data['id'];
      $users = $db->load('users', $id);
      // Обращаемся к свойству объекта и назначаем ему новое значение
      $users->login = $data['login'];
      $users->nickname = $data['nickname'];
      $users->age = $data['age']; 
      $users->permission = $data['permission'];
    
      
      
      // Сохраняем объект
      $db->store($users);

      return json_encode($data);
   }

   public static function test(){

      $db = (new Database())->ORM;
      $data = $_POST;

      $id = $data['id'];
      $news = $db->load('news', $id);
      $news->description = $data['description'];
      $db->store($news);
      return json_encode($data);


   }


}
?>