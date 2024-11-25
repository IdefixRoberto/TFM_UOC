//*************************************** 14/02/2024  ******************************************************************

Hui estic intentant que no em done el error 

Warning: Undefined variable $insert in C:\xampp\htdocs\TFM\Models\homeModel.php on line 24

Warning: Undefined property: homeModel::$ in C:\xampp\htdocs\TFM\Models\homeModel.php on line 24

Fatal error: Uncaught Error: Call to a member function execute() on null in C:\xampp\htdocs\TFM\Models\homeModel.php:24 Stack trace: #0 C:\xampp\htdocs\TFM\Controllers\Home.php(26): homeModel->setUser('nom', 'cognoms', 'email', 'contrasenya', 'naixement', true, 'sexe') #1 C:\xampp\htdocs\TFM\Libraires\Core\Load.php(13): Home->insertar('') #2 C:\xampp\htdocs\TFM\index.php(50): require_once('C:\\xampp\\htdocs...') #3 {main} thrown in C:\xampp\htdocs\TFM\Models\homeModel.php on line 24




Solucionat el error era que utiltzava   //Ara utilitze executar la consulta amb els valors incorporats al array
     $resInsert = $insert->execute($arrayDades);

     i no havia d'utilitzar execute,ja estava tot preparat per incorporar la base de dades. 



     25 de febrer

     Tinc problemes amb els permisos he de buscar on tinc el problema real



Warning: Undefined property: Permisos::$model in C:\xampp\htdocs\TFM\Controllers\Permisos.php on line 16

Fatal error: Uncaught Error: Call to a member function selectModulos() on null in C:\xampp\htdocs\TFM\Controllers\Permisos.php:16 Stack trace: #0 C:\xampp\htdocs\TFM\Libraires\Core\Load.php(13): Permisos->getPermisosRol(27) #1 C:\xampp\htdocs\TFM\index.php(54): require_once('C:\\xampp\\htdocs...') #2 {main} thrown in C:\xampp\htdocs\TFM\Controllers\Permisos.php on line 16


//Torne a començar a fer de bellnou els permisos, no sé on està el error i una retirada a temps es una vitoria


// 27 de febrer 2024

He borrat els commits sense voler, he perdut tota possibilitat de recuperar-los i comence de nou amb ells, pero els problemes de  

<br />
<b>Fatal error</b>: Uncaught TypeError: RolesModel::insertRol(): Argument #3 ($status) must be of type int, string given, called in C:\xampp\htdocs\TFM\Controllers\Roles.php on line 78 and defined in C:\xampp\htdocs\TFM\Models\RolesModel.php:37
Stack trace:
#0 C:\xampp\htdocs\TFM\Controllers\Roles.php(78): RolesModel-&gt;insertRol('0', 'd', 'd', 1)
#1 C:\xampp\htdocs\TFM\Libraires\Core\Load.php(13): Roles-&gt;setRol('')
#2 C:\xampp\htdocs\TFM\index.php(54): require_once('C:\\xampp\\htdocs...')
#3 {main}
 thrown in <b>C:\xampp\htdocs\TFM\Models\RolesModel.php</b> on line <b>37</b><br />


Unchecked runtime.lastError: The message port closed before a response was received

Ja han estat resolts, després de mirar-me els tutorials:

https://www.youtube.com/watch?v=Kky4k0gptdY&list=PLMPZIgg1n4Jmv-SlkAglSj-X_Z1f371eC&index=39


27/02

Els permisos estàn costant més del que em pensava ara tinc el problema 

  <br />
<b>Parse error</b>:  syntax error, unexpected identifier &quot;dep&quot;, expecting &quot;;&quot; or &quot;{&quot; in <b>C:\xampp\htdocs\TFM\Controllers\Permisos.php</b> on line <b>91</b><br />


Error amb les bases de dades

Fatal error: Uncaught PDOException: SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '0' for key 'PRIMARY' in C:\xampp\htdocs\TFM\Libraires\Core\Mysql.php:32 Stack trace: #0 C:\xampp\htdocs\TFM\Libraires\Core\Mysql.php(32): PDOStatement->execute(Array) #1 C:\xampp\htdocs\TFM\Models\PermisosModel.php(31): Mysql->insert('INSERT INTO per...', Array) #2 C:\xampp\htdocs\TFM\Controllers\Permisos.php(107): PermisosModel->insertPermisos(49, 1, 0, 0, 0, 0) #3 C:\xampp\htdocs\TFM\Libraires\Core\Load.php(13): Permisos->setPermisos('') #4 C:\xampp\htdocs\TFM\index.php(54): require_once('C:\\xampp\\htdocs...') #5 {main} thrown in C:\xampp\htdocs\TFM\Libraires\Core\Mysql.php on line 32



28 de febrer de 2024

Error solucionat quan el Rols usuaris ja existia, no avisaba de forma correcta deia que s'incorporaba pero no.

He fet un inventing, li he donat valor -7 per donar-li un valor raro quan diga que existeix, per a que la validació siga correcta






















