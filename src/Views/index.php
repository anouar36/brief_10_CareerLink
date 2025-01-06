

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    .developer-card img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 50%;
    }
    .fade-in {
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }
    .fade-in.visible {
      opacity: 1;
      transform: translateY(0);
    }
    .about-us {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 10px;
      text-align: center;
    }
  </style>
</head>
<body class="bg-gray-100">
  <!-- Header -->
  <header class="bg-gray-800 shadow-md p-4">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-3xl font-bold text-white">Company Name</h1>
      <nav>
        <div class="container mx-auto flex justify-between items-center">
          <a href="#" class="text-white hover:text-gray-300 mx-2">Home</a>
          <a href="#" class="text-white hover:text-gray-300 mx-2">About</a>
          <a href="#" class="text-white hover:text-gray-300 mx-2">Contact</a>
          <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded mx-2 hover:bg-blue-600">Sign Up</a>
          <a href="/src/Views/Auth/login.php" class="bg-green-500 text-white px-4 py-2 rounded mx-2 hover:bg-green-600">Login</a>
        </div>
      </nav>
    </div>
  </header>

  <!-- Main Image with About Us Section -->
  <div class="container mx-auto mt-8 relative">
    <img src="https://images.unsplash.com/photo-1653669487003-7d89b2020f3c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Main Image" class="w-full h-screen object-cover rounded-lg shadow-md">
    <div class="about-us">
      <h2 class="text-2xl font-bold mb-4">About Us</h2>
      <p class="text-gray-700">We are a leading company in the industry, committed to providing exceptional services and products to our customers. Our team is dedicated to innovation and excellence.</p>
    </div>
  </div>

  <!-- Separator -->
  <div class="container mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4 text-center">Meet Our Developers</h2>
  </div>

  <!-- Developers Section -->
  <section class="container mx-auto mt-8">
    <div class="grid grid-cols-4 gap-4">
      <div class="developer-card bg-white shadow-md p-4 rounded-lg text-center fade-in">
        <img src="https://intranet.youcode.ma/storage/users/profile/1242-1727859879.JPG" alt="Developer 1" class="mx-auto mb-4">
        <h3 class="font-bold">Developer 1</h3>
        <p class="text-gray-700">Front-end Developer</p>
      </div>
      <div class="developer-card bg-white shadow-md p-4 rounded-lg text-center fade-in">
        <img src="https://intranet.youcode.ma/storage/users/profile/1449-1728919457.JPG" alt="Developer 2" class="mx-auto mb-4">
        <h3 class="font-bold">Developer 2</h3>
        <p class="text-gray-700">Back-end Developer</p>
      </div>
      <div class="developer-card bg-white shadow-md p-4 rounded-lg text-center fade-in">
        <img src="https://intranet.youcode.ma/storage/users/profile/1100-1727859750.JPG" alt="Developer 3" class="mx-auto mb-4">
        <h3 class="font-bold">Developer 3</h3>
        <p class="text-gray-700">Full-stack Developer</p>
      </div>
      <div class="developer-card bg-white shadow-md p-4 rounded-lg text-center fade-in">
        <img src="https://intranet.youcode.ma/storage/users/profile/1144-1728556800.jpeg" alt="Developer 4" class="mx-auto mb-4">
        <h3 class="font-bold">Developer 4</h3>
        <p class="text-gray-700">UI/UX Designer</p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white text-center p-4 mt-8">
    <p>&copy; 2025 Company Name. All rights reserved.</p>
  </footer>

  <script>
    document.addEventListener('scroll', function() {
      const elements = document.querySelectorAll('.fade-in');
      elements.forEach(element => {
        const position = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;
        if (position < windowHeight - 100) {
          element.classList.add('visible');
        } else {
          element.classList.remove('visible');
        }
      });
    });
  </script>
</body>
</html>
