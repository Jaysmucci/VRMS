<?php 
session_start();
// require dirname(__DIR__) . './../helpers.php';
include_once '../controllers/vehicle-d-con.php';
// loadView('header');
// loadView('navbar');
loadView('sidebar');
?>



      <!-- ===== Content Area Start ===== -->
      <div
        class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden"
      >

         <!-- ===== Main Content Start ===== -->
         <main>
          <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mx-auto">
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


<div class="p-8 w-full">
    <div class="bg-dark grid grid-cols-3 gap-4">
        <!-- Driver Section -->
        <div class="bg-white rounded-lg shadow-lg col-span-2 p-4">
            <div class="flex items-center mb-8">
                <img src="../controllers/<?php echo htmlspecialchars($details['image']); ?>" alt="Driver" class="w-24 h-24 rounded-lg border border-gray-300">
                <div class="ml-4">
                    <h2 class="text-xl font-semibold"><b>Name:</b> <?php echo htmlspecialchars($details['name']); ?></h2>
                    <h2 class="text-xl font-semibold"><b>Phone Number:</b> <?php echo htmlspecialchars($details['phone_number']); ?></h2>
                </div>
            </div>

            <div class="flex items-center mb-8">
              <?php if($combined) : ?>
                <img src="../controllers/<?php echo htmlspecialchars($details['image']); ?>" alt="Owner" class="w-24 h-24 rounded-lg border border-gray-300">
                <div class="ml-4">
                    <h2 class="text-xl font-semibold"><b>Owner Name:</b> <?php echo htmlspecialchars($combined['owner_name']); ?></h2>
                    <h2 class="text-xl font-semibold"><b>Owner Phone Number:</b> <?php echo htmlspecialchars($combined['owner_phone']); ?></h2>
                </div>
                <?php endif; ?>
            </div>

            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4"><b>Vehicle Information</b></h2>
                <?php if ($combined): ?>
                    <p><b>Registration Number:</b> <?php echo htmlspecialchars($combined['vehicle_reg_no']); ?></p>
                    <p><b>LGA:</b> <?php echo htmlspecialchars($combined['lga']); ?></p>
                    <p><b>LGA Code:</b> <?php echo htmlspecialchars($combined['lga_code']); ?></p>
                    <p><b>Vehicle Type:</b> <?php echo htmlspecialchars($combined['vehicle_type']); ?></p>
                    <p><b>Unit No:</b> <?php echo htmlspecialchars($combined['unit_no']); ?></p>
                <?php else: ?>
                    <p>No vehicle details found for the provided vehicle ID.</p>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- QR Code Section -->
        <div class="bg-white rounded-lg shadow-lg h-80 items-center justify-center p-4 grid grid-rows-2 gap-4">
          <?php if($qr && $qr !== 'No unit number') : ?>
            <img src="<?php echo htmlspecialchars($qr); ?>" alt="QR Code" class="bg-white w-40 h-40  border border-gray-300 mt-8">
            <a href="../controllers/download.php?unit_no=<?php echo urlencode($unit_no) ?>"><button class=" bg-blue-700 text-white px-6  flex flex-cols py-2 rounded-lg">
              <svg class="ml-3 mr-2 w-6 h-6 text-gray-800 dark:text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" viewBox="0 0 18 18">
  <path fill-rule="" d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z" clip-rule=""/>
  <path fill-rule="" d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z" clip-rule=""/>
</svg> Download</button></a>
            <?php else: ?>
                <p>QR code not available.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- <div class="p-4" x-data="{ showAlert: true }" x-init="setTimeout(() => showAlert = false, 5000)">
    <div
      x-show="showAlert"
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="opacity-0 transform scale-90"
      x-transition:enter-end="opacity-100 transform scale-100"
      x-transition:leave="transition ease-in duration-300"
      x-transition:leave-start="opacity-100 transform scale-100"
      x-transition:leave-end="opacity-0 transform scale-90"
      class="bg-blue-500 text-white p-4 rounded-lg shadow-lg"
    >
      <p>This is an alert box that will disappear after 5 seconds.</p>
    </div> -->
    <!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tailwind CSS Table with Search and Pagination</title>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mx-auto p-4" x-data="tableComponent()">
    <div class="mb-4">
      <input
        type="text"
        class="border border-gray-300 p-2 rounded-lg w-full"
        placeholder="Search..."
        x-model="searchQuery"
        @input="filterTable"
      />
    </div>

    <table class="min-w-full bg-white">
      <thead>
        <tr>
          <th class="py-2 px-4 border-b">Name</th>
          <th class="py-2 px-4 border-b">Email</th>
          <th class="py-2 px-4 border-b">Role</th>
        </tr>
      </thead>
      <tbody>
        <template x-for="(row, index) in paginatedRows" :key="index">
          <tr>
            <td class="py-2 px-4 border-b" x-text="row.name"></td>
            <td class="py-2 px-4 border-b" x-text="row.email"></td>
            <td class="py-2 px-4 border-b" x-text="row.role"></td>
          </tr>
        </template>
      </tbody>
    </table>

    <div class="flex justify-between mt-4">
      <button
        class="bg-blue-500 text-white px-4 py-2 rounded-lg"
        :disabled="currentPage === 1"
        @click="prevPage"
      >
        Prev
      </button>
      <button
        class="bg-blue-500 text-white px-4 py-2 rounded-lg"
        :disabled="currentPage === totalPages"
        @click="nextPage"
      >
        Next
      </button>
    </div>
  </div>

  <script>
    function tableComponent() {
      return {
        searchQuery: '',
        currentPage: 1,
        rowsPerPage: 5,
        rows: [
          { name: 'John Doe', email: 'john@example.com', role: 'Admin' },
          { name: 'Jane Smith', email: 'jane@example.com', role: 'User' },
          { name: 'Michael Brown', email: 'michael@example.com', role: 'Editor' },
          { name: 'Sarah Johnson', email: 'sarah@example.com', role: 'Admin' },
          { name: 'Chris Lee', email: 'chris@example.com', role: 'User' },
          { name: 'Paul Walker', email: 'paul@example.com', role: 'Editor' },
          { name: 'Laura Wilson', email: 'laura@example.com', role: 'User' },
          { name: 'Kevin White', email: 'kevin@example.com', role: 'Admin' },
          { name: 'Emma Davis', email: 'emma@example.com', role: 'User' },
          { name: 'Olivia Martinez', email: 'olivia@example.com', role: 'Editor' },
        ],
        get filteredRows() {
          return this.rows.filter(row => {
            return (
              row.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
              row.email.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
              row.role.toLowerCase().includes(this.searchQuery.toLowerCase())
            );
          });
        },
        get paginatedRows() {
          const start = (this.currentPage - 1) * this.rowsPerPage;
          const end = this.currentPage * this.rowsPerPage;
          return this.filteredRows.slice(start, end);
        },
        get totalPages() {
          return Math.ceil(this.filteredRows.length / this.rowsPerPage);
        },
        filterTable() {
          this.currentPage = 1;
        },
        nextPage() {
          if (this.currentPage < this.totalPages) {
            this.currentPage++;
          }
        },
        prevPage() {
          if (this.currentPage > 1) {
            this.currentPage--;
          }
        }
      };
    }
  </script>
</body>
</html> -->



<?php loadView('footer') ?>
