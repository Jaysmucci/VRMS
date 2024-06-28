<?php
session_start();
include_once '../controllers/drivers-con.php';

  loadView('sidebar');
  
?>


 <style>
.grid-container {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 40px;
}
.grid-item {
  display: flex;
  flex-direction: column;
}
.full-width {
  grid-column: span 2;
}
.shift-btn {
    margin-top: 34rem;
    margin-left: 62rem;
    width: 10rem;
    cursor: pointer;
    display: flex;
    position: absolute;
    text-align: center;
    justify-content: center;
}
 </style>
 

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
                  Register
                </h2>

                <nav>
                  <ol class="flex items-center gap-2">
                    <li>
                      <a class="font-medium" href="index.html">Dashboard /</a>
                    </li>
                    <li class="text-primary">register</li>
                  </ol>
                </nav>
              </div>
              <!-- Breadcrumb End -->
              <div x-data="{ open: false }" class="p-6">
    <!-- Modal toggle button -->
    <button @click="open = true" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-dark-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 my-4">Add New Vehicle</button>

    <!-- Main modal -->
    <div x-show="open" @keydown.escape.window="open = false" class="inset-0 flex items-center justify-center modal-background z-50">
      <div @click.away="open = false" class="bg-white rounded-lg shadow dark:bg-black w-full p-4 md:p-5 relative overflow-y-hidden" style="max-height: 86%; width: 79rem; padding-bottom: 10rem;">
        <!-- Modal header -->
        <div class="flex items-center justify-between border-b pb-4 md:pb-5 dark:border-gray-600">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Register New Vehicle</h3>
          <button @click="open = false" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>

        <!-- Modal body -->
        <form autocomplete="off" class="pt-4 md:pt-5 grid-container " method="post" action="../controllers/vehicle-reg-con.php" enctype="multipart/form-data">
          <!-- Owner Details -->
          <div class="">
            <div class=" full-width">
              <h4 class="text-md font-semibold text-gray-900 dark:text-white pb-4">Owner Details</h4>
            </div>
            <div class="">
              <label for="owner_name" class="block uppercase mb-2 text-sm font-medium text-gray-900 dark:text-white">Owner Name</label>
              <input type="text" name="owner_name" id="owner_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-dark" placeholder="Input Owner's Name" required>
            </div>
            <div class="">
              <label for="owner_address" class="block uppercase mb-2 text-sm font-medium text-gray-900 dark:text-white">Owner Address</label>
              <input type="text" name="owner_address" id="owner_address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-dark" placeholder="Input Owner's Address" required>
            </div>
            <div class="">
              <label for="owner_occupation" class="block uppercase mb-2 text-sm font-medium text-gray-900 dark:text-white">Owner Occupation</label>
              <input type="text" name="owner_occupation" id="owner_occupation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-dark" placeholder="Input Owner's Occupation" required>
            </div>
            <div class="">
              <label for="owner_phone_number" class="block uppercase mb-2 text-sm font-medium text-gray-900 dark:text-white">Owner Phone Number</label>
              <input type="text" name="owner_phone_number" id="owner_phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-dark" placeholder="Input Owner's Phone Number" required>
            </div>
            <div class="">
              <label for="owner_nin" class="block uppercase mb-2 text-sm font-medium text-gray-900 dark:text-white">Owner NIN</label>
              <input type="text" name="owner_nin" id="owner_nin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-dark" placeholder="Input Owner's NIN" required>
            </div>
            <div class="">
              <label for="owner_image" class="block uppercase mb-2 text-sm font-medium text-gray-900 dark:text-white">Owner Image</label>
              <input type="file" name="owner_image" id="owner_image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-dark" required>
            </div>
          </div>

          <!-- Driver Details -->
          <div class="">
            <div class=" full-width">
              <h4 class="text-md font-semibold text-gray-900 dark:text-white pb-4">Driver Details</h4>
            </div>
            <div class="">
              <label for="driver_name" class="block uppercase mb-2 text-sm font-medium text-gray-900 dark:text-white">Driver Name</label>
              <input type="text" name="driver_name" id="driver_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-dark" placeholder="Input Driver's Name" required>
            </div>
            <div class="">
              <label for="driver_address" class="block uppercase mb-2 text-sm font-medium text-gray-900 dark:text-white">Driver Address</label>
              <input type="text" name="driver_address" id="driver_address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-dark" placeholder="Input Driver's Address" required>
            </div>
            <div class="">
              <label for="driver_identity_card_no" class="block uppercase mb-2 text-sm font-medium text-gray-900 dark:text-white">Identity Card No</label>
              <input type="text" name="driver_identity_card_no" id="driver_identity_card_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-dark" placeholder="ID Card No" required>
            </div>
            <div class="">
              <label for="driver_phone_number" class="block uppercase mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
              <input type="text" name="driver_phone_number" id="driver_phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-dark" placeholder="Input mobile number" required>
            </div>
            <div class="">
              <label for="driver_nin" class="block uppercase mb-2 text-sm font-medium text-gray-900 dark:text-white">NIN</label>
              <input type="text" name="driver_nin" id="driver_nin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-dark" placeholder="Input NIN" required>
            </div>
            <div class="">
              <label for="driver_image" class="block uppercase mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
              <input type="file" name="driver_image" id="driver_image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-dark" required>
            </div>
          </div>

          <!-- Vehicle Details -->
          <div class="">
            <div class=" full-width">
              <h4 class="text-md font-semibold text-gray-900 dark:text-white pb-4">Vehicle Details</h4>
            </div>
            <div class="">
              <label for="vehicle_type" class="block uppercase mb-2 text-sm font-medium text-gray-900 dark:text-white">Vehicle Type</label>
              <select id="vehicle_type" name="vehicle_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-dark">
                <option value="" disabled selected>Select Vehicle Type</option>
                <option value="Motorcycle">Motorcycle</option>
                <option value="Tricycle">Tricycle</option>
              </select>
            </div>
            <div class="">
              <label for="vehicle_reg_no" class="block uppercase mb-2 text-sm font-medium text-gray-900 dark:text-white">Vehicle Reg No</label>
              <input type="text" name="vehicle_reg_no" id="vehicle_reg_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-dark" placeholder="Input Vehicle Reg No" required>
            </div>
            <div class="">
              <label for="lga_code" class="block uppercase mb-2 text-sm font-medium text-gray-900 dark:text-white">LGA Code</label>
              <input type="text" name="lga_code" id="lga_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-dark" placeholder="Input LGA Code" required>
            </div>
            <div class="">
              <label for="driver_unit_no" class="block uppercase mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit No</label>
              <input type="text" name="driver_unit_no" id="driver_unit_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-dark" placeholder="Unit No" required>
            </div>
            <div class="">
              <label for="driver_lga" class="block uppercase mb-2 text-sm font-medium text-gray-900 dark:text-white">LGA</label>
              <select id="driver_lga" name="driver_lga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-dark">
                <option value="" disabled selected>Select LGA</option>
                <option value="LGA1">LGA 1</option>
                <option value="LGA2">LGA 2</option>
                <option value="LGA3">LGA 3</option>
                <option value="LGA4">LGA 4</option>
                <option value="LGA5">LGA 5</option>
              </select>
            </div>
            <!-- <div class="">
              <label for="owner_nin" class="block uppercase mb-2 text-sm font-medium text-gray-900 dark:text-white">Owner NIN</label>
              <input type="text" name="owner_nin" id="owner_nin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-dark" placeholder="Input Owner NIN" required>
            </div>
            <div class="">
              <label for="driver_nin" class="block uppercase mb-2 text-sm font-medium text-gray-900 dark:text-white">Driver NIN</label>
              <input type="text" name="driver_nin" id="driver_nin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-dark" placeholder="Input Driver NIN" required>
            </div> -->
            <div class="">
              <label for="vehicle_image" class="block uppercase mb-2 text-sm font-medium text-gray-900 dark:text-white">Vehicle Image</label>
              <input type="file" name="vehicle_image" id="vehicle_image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-dark" required>
            </div>
          </div>

            <!-- Submit Button -->
            <button type="submit" name="submit" class="shift-btn w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-4">
              Add Vehicle
            </button>
        </form>
      </div>
    </div>
  </div>

            </div>

            <!-- alert box
            <div class="p-4" x-data="{ showAlert: true }" x-init="setTimeout(() => showAlert = false, 1000)">
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
                <p>Vehicle Registered successful!</p>
              </div>
              alert box
            <div class="p-4" x-data="{ showAlert: true }" x-init="setTimeout(() => showAlert = false, 5000)">
              <div
                x-show="showAlert"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90"
                class="bg-red-500 text-white p-4 rounded-lg shadow-lg"
              >
                <p>This is an alert box that will disappear after 5 seconds.</p>
              </div> -->
          
          

</div>

<?php loadView('footer') ?>