<?php
session_start();
include_once '../controllers/drivers-con.php';

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
                  Drivers
                </h2>

                <nav>
                  <ol class="flex items-center gap-2">
                    <li>
                      <a class="font-medium" href="index.html">Dashboard /</a>
                    </li>
                    <li class="text-primary">drivers</li>
                  </ol>
                </nav>
              </div>
              

            </div>

            <!-- alert box -->
            <div class="p-4" x-data="{ showAlert: true }" x-init="setTimeout(() => showAlert = false, 5000)">
              <div
                x-show="showAlert"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90"
                class="bg-green-500 text-white p-4 rounded-lg shadow-lg"
              >
                <p>This is an alert box that will disappear after 5 seconds.</p>
              </div>
          
          
<!-- Start of Table -->
<div
  class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1"
>
<div class="container ml-4 px-4 py-8">
    <!-- input search bar -->
    <div class="flex justify-between items-center mb-4">
      <input
        type="text"
        id="searchInput"
        onkeyup="filterTable()"
        placeholder="Search for names.."
        class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
      <select id="rowsPerPage" onchange="changeRowsPerPage()" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="5">5 rows</option>
        <option value="10">10 rows</option>
      </select>
    </div>


    <div class="table-container">
  <table style="margin: 0 1rem 0 -2rem;" class="table-fixed divide-x divide-y divide-gray-200 dark:divide-gray-700">
    <thead>
      <tr class="bg-gray-200 text-left dark:bg-gray-800">
        <th class="text-sm px-2 py-2 font-medium text-black dark:text-white">ID</th>
        <th class="text-sm px-2 py-2 font-medium text-black dark:text-white">Name</th>
        <th class="text-sm px-2 py-2 font-medium text-black dark:text-white">Address</th>
        <th class="text-sm px-2 py-2 font-medium text-black dark:text-white">Identity Card No</th>
        <th class="text-sm px-2 py-2 font-medium text-black dark:text-white">Unit No</th>
        <th class="text-sm px-2 py-2 font-medium text-black dark:text-white">LGA</th>
        <th class="text-sm px-2 py-2 font-medium text-black dark:text-white">Phone Number</th>
        <th class="text-sm px-2 py-2 font-medium text-black dark:text-white">NIN</th>
        <th class="text-sm px-2 py-2 font-medium text-black dark:text-white">Vehicle Type</th>
        <th class="text-sm px-2 py-2 font-medium text-black dark:text-white">Vehicle Reg No</th>
        <th class="text-sm px-2 py-2 font-medium text-black dark:text-white">LGA Code</th>
        <th class="text-sm px-2 py-2 font-medium text-black dark:text-white">Owner ID</th>
        <th class="text-sm px-2 py-2 font-medium text-black dark:text-white">Image</th>
        <th class="text-sm px-2 py-2 font-medium text-black dark:text-white">Status</th>
        <th class="text-sm px-2 py-2 font-medium text-black dark:text-white">Actions</th>
      </tr>
    </thead>
    <tbody id="tableBody" class="text-sm bg-white divide-x divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
      <?php foreach($new as $vehicle) : ?>
      <tr>
        <td class="border-r px-2 py-2 whitespace-nowrap"><?php echo htmlspecialchars($vehicle['id']) ?></td>
        <td class="border-r px-2 py-2 whitespace-nowrap"><?php echo htmlspecialchars($vehicle['name']) ?></td>
        <td class="border-r px-2 py-2 whitespace-nowrap"><?php echo htmlspecialchars($vehicle['address']) ?></td>
        <td class="border-r px-2 py-2 whitespace-nowrap"><?php echo htmlspecialchars($vehicle['identity_card_no']) ?></td>
        <td class="border-r px-2 py-2 whitespace-nowrap"><?php echo htmlspecialchars($vehicle['unit_no']) ?></td>
        <td class="border-r px-2 py-2 whitespace-nowrap"><?php echo htmlspecialchars($vehicle['lga']) ?></td>
        <td class="border-r px-2 py-2 whitespace-nowrap"><?php echo htmlspecialchars($vehicle['phone_number']) ?></td>
        <td class="border-r px-2 py-2 whitespace-nowrap"><?php echo htmlspecialchars($vehicle['nin']) ?></td>
        <td class="border-r px-2 py-2 whitespace-nowrap"><?php echo htmlspecialchars($vehicle['vehicle_type']) ?></td>
        <td class="border-r px-2 py-2 whitespace-nowrap"><?php echo htmlspecialchars($vehicle['vehicle_registration_no']) ?></td>
        <td class="border-r px-2 py-2 whitespace-nowrap"><?php echo htmlspecialchars($vehicle['lga_code']) ?></td>
        <td class="border-r px-2 py-2 whitespace-nowrap"><?php echo htmlspecialchars($vehicle['owner_id']) ?></td>
        <td class="border-r px-2 py-2 whitespace-nowrap">
          <img src="../controllers/<?php echo htmlspecialchars($vehicle['image']) ?>" alt="Profile Image" class="w-10 h-10 profile-image">
        </td>
        <td class="border-r px-2 py-2 whitespace-nowrap">
          <p class="  inline-flex rounded-full bg-success bg-opacity-10 px-3 text-sm font-small text-success">active</p>
        </td>
        <td class="border-r px-2 py-2 whitespace-nowrap">
          <div class="flex items-center space-x-3.5" x-data="{ showModal: false, vehicleId: null }">
          <button class="hover:text-primary" @click="showModal = true; vehicleId = <?php echo $vehicle['id']; ?>">
                <!-- SVG for view -->
                <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z" fill=""/>
                  <path d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z" fill=""/>
                </svg>
              </button>
            <!-- Modal -->
            <div x-show="showModal" @keydown.escape.window="showModal = false" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
              <!-- Modal Container -->
              <div @click.away="showModal = false" style="height: 21rem; width: 34rem;" class="bg-white dark:bg-black relative items-center justify-center flex flex-col items-center justify-center" x-show="showModal" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                <!-- Close Icon -->
                <button @click="showModal = false" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 focus:outline-none">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
                <!-- QR Code Section -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                  <template x-if="vehicleId">
                    <?php foreach($new as $vehicle) : ?>
                    <div x-show="vehicleId === <?php echo $vehicle['id']; ?>">
                      <img src="../controllers/<?php echo htmlspecialchars($vehicle['image']) ?>" alt="Driver Image" class="h-40 w-40 rounded-full" style="height: 8rem; width: 8rem;">
                    </div>
                    <?php endforeach; ?>
                  </template>
                </div>
              </div>
            </div>
            <!-- modal end -->
            <button class="hover:text-secondary">
            <svg  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 18 18">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
            </svg>
            </button>

            <button class="hover:text-danger">
                <svg
                  class="fill-current"
                  width="18"
                  height="18"
                  viewBox="0 0 18 18"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M13.7535 2.47502H11.5879V1.9969C11.5879 1.15315 10.9129 0.478149 10.0691 0.478149H7.90352C7.05977 0.478149 6.38477 1.15315 6.38477 1.9969V2.47502H4.21914C3.40352 2.47502 2.72852 3.15002 2.72852 3.96565V4.8094C2.72852 5.42815 3.09414 5.9344 3.62852 6.1594L4.07852 15.4688C4.13477 16.6219 5.09102 17.5219 6.24414 17.5219H11.7004C12.8535 17.5219 13.8098 16.6219 13.866 15.4688L14.3441 6.13127C14.8785 5.90627 15.2441 5.3719 15.2441 4.78127V3.93752C15.2441 3.15002 14.5691 2.47502 13.7535 2.47502ZM7.67852 1.9969C7.67852 1.85627 7.79102 1.74377 7.93164 1.74377H10.0973C10.2379 1.74377 10.3504 1.85627 10.3504 1.9969V2.47502H7.70664V1.9969H7.67852ZM4.02227 3.96565C4.02227 3.85315 4.10664 3.74065 4.24727 3.74065H13.7535C13.866 3.74065 13.9785 3.82502 13.9785 3.96565V4.8094C13.9785 4.9219 13.8941 5.0344 13.7535 5.0344H4.24727C4.13477 5.0344 4.02227 4.95002 4.02227 4.8094V3.96565ZM11.7285 16.2563H6.27227C5.79414 16.2563 5.40039 15.8906 5.37227 15.3844L4.95039 6.2719H13.0785L12.6566 15.3844C12.6004 15.8625 12.2066 16.2563 11.7285 16.2563Z"
                    fill=""
                  />
                  <path
                    d="M9.00039 9.11255C8.66289 9.11255 8.35352 9.3938 8.35352 9.75942V13.3313C8.35352 13.6688 8.63477 13.9782 9.00039 13.9782C9.33789 13.9782 9.64727 13.6969 9.64727 13.3313V9.75942C9.64727 9.3938 9.33789 9.11255 9.00039 9.11255Z"
                    fill=""
                  />
                  <path
                    d="M11.2502 9.67504C10.8846 9.64692 10.6033 9.90004 10.5752 10.2657L10.4064 12.7407C10.3783 13.0782 10.6314 13.3875 10.9971 13.4157C11.0252 13.4157 11.0252 13.4157 11.0533 13.4157C11.3908 13.4157 11.6721 13.1625 11.6721 12.825L11.8408 10.35C11.8408 9.98442 11.5877 9.70317 11.2502 9.67504Z"
                    fill=""
                  />
                  <path
                    d="M6.72245 9.67504C6.38495 9.70317 6.1037 10.0125 6.13182 10.35L6.3287 12.825C6.35683 13.1625 6.63808 13.4157 6.94745 13.4157C6.97558 13.4157 6.97558 13.4157 7.0037 13.4157C7.3412 13.3875 7.62245 13.0782 7.59433 12.7407L7.39745 10.2657C7.39745 9.90004 7.08808 9.64692 6.72245 9.67504Z"
                    fill=""
                  />
                </svg>
              </button>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<div class="pagination-controls mt-4">
      <button onclick="prevPage()" id="prevButton" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">Previous</button>
      <button onclick="nextPage()" id="nextButton" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">Next</button>
    </div>
</div>

<?php loadView('footer') ?>