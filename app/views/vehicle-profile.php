<?php 
session_start();
include_once '../controllers/vehicle-con.php';
loadView('sidebar');
?>



      <!-- ===== Content Area Start ===== -->
      <div
        class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden"
      >

         <!-- ===== Main Content Start ===== -->
         <main>
          <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mx-auto ">
              <!-- Breadcrumb Start -->
              <div
                class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between"
              >
                <h2 class="text-title-md2 font-bold text-black dark:text-white">
                  VehicleProfile
                </h2>

                <nav>
                  <ol class="flex items-center gap-2">
                    <li>
                      <a class="font-medium" href="home">Dashboard /</a>
                    </li>
                    <li class="text-primary">vehicle-profile</li>
                  </ol>
                </nav>
              </div>


            </div>
    
          
          
<!-- Start of Table -->
<!-- <div
  class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1"
> -->


<div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <!-- <div class="text-center text-2xl font-bold mb-6">Leaderboard</div> -->
        <?php foreach($data as $logs) : ?>
        <div class="bg-gray-300 rounded-lg ">
            <div class="leaderboard-item flex  p-4 border-b border-gray-700" onclick="viewUserDetails('SG', 870647)">
                <img src="../controllers/<?php echo $logs['vehicle_image'] ?>" alt="SG" class="w-12 h-12 rounded-full">
                <div class="ml-4 flex-1">
                    <div class="text-xl font-semibold"><?php echo $logs['vehicle_type'] ?></div>
                    <div class="text-yellow-400"><?php echo $logs['vehicle_registration_no'] ?></div>
                </div>
                <div class="text-gray-500"><button class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><a href="vehicle-details?vehicle_id=<?php echo $logs['vehicle_id'] ?>">view</a></button></div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>


<?php loadView('footer') ?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Leaderboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
</head>
<body class="bg-gray-900 text-white flex items-center justify-center h-screen">
   

    <script>
        function viewUserDetails(username, score) {
            alert('User: ' + username + '\nScore: ' + score);
            // Implement the logic to view detailed information about the user
        }
    </script>
</body>
</html> -->
