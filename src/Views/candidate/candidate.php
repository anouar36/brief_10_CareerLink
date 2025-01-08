<?php
session_start();
if (isset($_SESSION['User'])) {
  echo "<pre>";
  echo ($_SESSION['User']['id']);
  echo "</pre>";
} else {
  echo "no data";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LinkedIn Clone</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  
  <style>
    .activity-card {
      width: 90px;
      height: 90px;
      position: relative;
    }
    .activity-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 50%;
    }
    .active-dot {
      position: absolute;
      bottom: 5px;
      right: 5px;
      width: 10px;
      height: 10px;
      background-color: green;
      border-radius: 50%;
    }
    .job-card img.post-image {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
    .job-card img.company-logo {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 50%;
    }
  </style>
</head>
<body class="bg-gray-200">
  <!-- Header -->
  <header class="bg-gray-900 shadow-md">
    <div class="container mx-auto flex justify-between items-center p-4">
      <h1 class="text-2xl font-bold text-white">LinkedIn Clone</h1>
      <nav class="space-x-4">
        <a href="../../Classes/ahmed.php" class="text-gray-300 hover:text-gray-500">ahmed</a>
        <a href="#" class="text-gray-300 hover:text-gray-500">Profile</a>
        <a href="#" class="text-gray-300 hover:text-gray-500">Messages</a>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="container mx-auto mt-8 flex">
    <!-- Sidebar -->
    <aside class="w-1/4 bg-white shadow-md p-4">
      <h2 class="text-xl font-bold mb-4 text-gray-900">Profile</h2>
      <img src="https://intranet.youcode.ma/storage/users/profile/thumbnail/1242-1727859879.JPG" alt="Profile Picture" class="w-24 h-24 rounded-full mx-auto mb-4">
      <h3 class="text-lg font-bold text-center text-gray-800">John Doe</h3>
      <p class="text-gray-600 text-center">Web Developer at Company</p>
      <p class="text-gray-600 text-center">Connections: 150</p>

      <!-- Job Application History -->
      <h2 class="text-xl font-bold mb-4 mt-8 text-gray-900">Job Application History</h2>

      <?php
      require_once("../../../vendor/autoload.php");
      use App\Classes\Offer;      
      $displaye = new Offer('','','','','');
      $row = $displaye->displayOffer($_SESSION['User']['id']);
      if($row){
      foreach($row as $Offer){
        ?>
        <div class="bg-gray-100 shadow-md p-4 mb-4">
        <h4 class="font-bold text-gray-800"><?=$Offer['salary']?></h4>
        <p class="text-gray-600"><?=$Offer['date']?></p>
      </div>
        <?php
      }
    }
      
      ?>
      
      
      <!-- Add more application history cards as needed -->
    </aside>

    <!-- Feed -->
    <section class="w-3/4 ml-4">
      <!-- Add Post -->
      <div class="bg-white shadow-md p-4 mb-4">
        <div class="flex items-center mb-4 job-card bg-gray-100 shadow-md p-4">
          <img src="https://intranet.youcode.ma/storage/users/profile/thumbnail/1242-1727859879.JPG" alt="Profile Picture" class="company-logo mr-2">
          <textarea class="w-full p-2 border rounded" rows="2" placeholder="Start a post, try writing with AI assistance"></textarea>
        </div>
        <div class="flex justify-between items-center mt-2">
          <button class="flex items-center space-x-2">
            <i class="fas fa-photo-video text-blue-600"></i>
            <span class="text-gray-800">Media</span>
          </button>
          <button class="flex items-center space-x-2">
            <i class="fas fa-calendar-alt text-blue-600"></i>
            <span class="text-gray-800">Event</span>
          </button>
          <button class="flex items-center space-x-2">
            <i class="fas fa-edit text-blue-600"></i>
            <span class="text-gray-800">Write Article</span>
          </button>
          <button class="bg-blue-600 text-white px-4 py-2 rounded">Post</button>
        </div>
      </div>

      <!-- Recent Activity -->
      <h2 class="text-2xl font-bold mb-4 text-gray-900">Recent Activity</h2>
      <div class="grid grid-cols-6 gap-2">
        <div class="activity-card bg-gray-100 shadow-md p-2">
          <img src="https://intranet.youcode.ma/storage/users/profile/thumbnail/1242-1727859879.JPG" alt="User 1">
          <div class="active-dot"></div>
        </div>
        <div class="activity-card bg-gray-100 shadow-md p-2">
          <img src="https://intranet.youcode.ma/storage/users/profile/thumbnail/1242-1727859879.JPG" alt="User 2">
          <div class="active-dot"></div>
        </div>
      </div>

      <!-- Jobs Section -->
      <h2 class="text-2xl font-bold mb-4 mt-8 text-gray-900">Posted Jobs</h2>
      <div class="grid grid-cols-2 gap-4">

      <?php
         require_once("../../../vendor/autoload.php");
         use App\Controllers\Auth\authoffer;
         $posted = new Offer('','','','','');
         $result = $posted->displayOffer();
         if($result){
            foreach($result as $row){
              ?>
                <div class="job-card bg-white shadow-md p-4">
                  <div class="flex items-center mb-4">
                    <img src="https://intranet.youcode.ma/storage/users/profile/thumbnail/1242-1727859879.JPG" alt="Company 1" class="company-logo mr-2">
                    <div>
                      <h4 class="font-bold text-gray-800">Company Name</h4>
                      <p class="text-gray-600"><?= $row['post'] ?></p>
                    </div>
                  </div>
                  <img src="https://intranet.youcode.ma/storage/users/profile/thumbnail/1242-1727859879.JPG" alt="Job 1" class="post-image mb-4">
                  <p class="text-gray-600"><?= $row['description'] ?></p>
                  <button class="bg-green-600 text-white px-4 py-2 rounded mt-2"  type="Apply" name="Apply" >Apply</button>
                </div>
              <?php
           }
         }else {
           echo('No posted jobs');
          }    
       ?>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white text-center p-4 mt-8">
    <p>&copy; 2025 LinkedIn Clone</p>
  </footer>

  <!-- Job Application Modal -->
  <div id="job-application-modal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center">
    <div class="bg-white p-4 rounded">
      <h2 class="text-xl font-bold mb-4 text-gray-900">Apply for Job</h2>
      <form id="job-application-form">
        <div class="mb-4">
          <label for="name" class="block text-gray-700">Name</label>
          <input type="text" id="name" name="name" class="w-full p-2 border rounded">
        </div>
        <div class="mb-4">
          <label for="email" class="block text-gray-700">Email</label>
          <input type="email" id="email" name="email" class="w-full p-2 border rounded">
        </div>
        <div class="mb-4">
          <label for="cover-letter" class="block text-gray-700">Cover Letter</label>
          <textarea id="cover-letter" name="cover-letter" class="w-full p-2 border rounded" rows="4"></textarea>
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Submit</button>
      </form>
    </div>
  </div>
</body>
</html>
