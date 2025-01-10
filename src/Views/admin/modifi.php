<?php
require_once("../../../vendor/autoload.php");
use App\Controllers\Admin\TagController;


if(isset($_GET['id'])){
    if(empty($_GET['id'])){
      echo'semtihn hubens  in id tage';
    }else{
        $id=$_GET['id'];
    }
}

if(isset($_POST["submit"])){
    if(empty($_POST['nameTag']))
   echo'nothing to commit ';
else{
    $nameTag = $_POST['nameTag'];
    $modife= new TagController();
    $modife->checkeModife($id, $nameTag);
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://play.tailwindcss.com/MIwj5Sp9pw"></script>
    <title>Document</title>
</head>
<body>
<div class="bg-white border rounded-lg px-8 py-6 mx-auto my-8 max-w-2xl">
    <h2 class="text-2xl font-medium mb-4">Survey</h2>
    <form method="post" action="">
        <div class="mb-4">
            <?php
            $result = new TagController('');
            $row = $result->dsplayinInputModifi($id);
            ?>

            <label for="nameTag" class="block text-gray-700 font-medium mb-2">Name</label>
            <input type="nameTag" id="nameTag" value="<?= $row['tag_name'] ?>" name="nameTag"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" >
        </div>
        <div>
            <button   class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600" type="submit" name="submit" >Submit</button>
        </div>

    </form>
</div>
</body>
</html>