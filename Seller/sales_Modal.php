<!-- Modal for Adding Sales Report -->
<div id="addSalesReportModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
           
        </div>

        <!-- Modal Content -->
        <div class="modal-content py-4 text-left px-6">
            <h2 class="text-xl font-semibold mb-4">Sales Report for the month of:</h2>

            <form>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="month">Month:</label>
                    <input type="text" class="border border-gray-300 rounded-md px-3 py-2 placeholder-gray-400 focus:outline-none focus:ring focus:border-blue-500 w-400" id="month" name="month" placeholder="Month">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="year">Year:</label>
                    <input type="text" class="border border-gray-300 rounded-md px-3 py-2 placeholder-gray-400 focus:outline-none focus:ring focus:border-blue-500 w-400" id="year" name="year" placeholder="Year">
                </div>

                <!-- Sales Details Table -->
                <table class="min-w-full divide-y divide-gray-800 border border-gray-800 mb-4">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit Sold</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Sales</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider"> <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md" id="openAddModal">+</button></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Sales details rows will be added here dynamically -->
                    </tbody>
                </table>

                
                
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="total">Total:</label>
                    <input type="text" class="border border-gray-300 rounded-md px-3 py-2 placeholder-gray-400 focus:outline-none focus:ring focus:border-blue-500 w-400" id="total" name="total" placeholder="Total">
                </div>
                
               
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="notes">Notes:</label>
                    <textarea class="border border-gray-300 rounded-md px-3 py-2 placeholder-gray-400 focus:outline-none focus:ring focus:border-blue-500 w-600" id="notes" name="notes" placeholder="Notes"></textarea>
                </div>

               

                
                <div class="flex justify-end">
                    <button type="button" id="addSalesReport" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md mr-2">Add</button>
                    <button type="button" id="cancelAddSalesReport" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for Updating Sales Report -->
<div id="updateSalesReportModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
           
        </div>

        <!-- Modal Content -->
        <div class="modal-content py-4 text-left px-6">
            <h2 class="text-xl font-semibold mb-4">Sales Report for the month of:</h2>

            <form>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="month">Month:</label>
                    <input type="text" class="border border-gray-300 rounded-md px-3 py-2 placeholder-gray-400 focus:outline-none focus:ring focus:border-blue-500 w-400" id="month" name="month" placeholder="Month">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="year">Year:</label>
                    <input type="text" class="border border-gray-300 rounded-md px-3 py-2 placeholder-gray-400 focus:outline-none focus:ring focus:border-blue-500 w-400" id="year" name="year" placeholder="Year">
                </div>

                <!-- Sales Details Table -->
                <table class="min-w-full divide-y divide-gray-800 border border-gray-800 mb-4">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit Sold</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Sales</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider"> <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md" id="openAddModal">+</button></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Sales details rows will be added here dynamically -->
                    </tbody>
                </table>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="total">Total:</label>
                    <input type="text" class="border border-gray-300 rounded-md px-3 py-2 placeholder-gray-400 focus:outline-none focus:ring focus:border-blue-500 w-400" id="total" name="total" placeholder="Total">
                </div>
                
               
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="notes">Notes:</label>
                    <textarea class="border border-gray-300 rounded-md px-3 py-2 placeholder-gray-400 focus:outline-none focus:ring focus:border-blue-500 w-600" id="notes" name="notes" placeholder="Notes"></textarea>
                </div>

               

                
                <div class="flex justify-end">
                    <button type="button" id="updateSalesReport" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md mr-2">Update</button>
                    
                    <button type="button" id="cancelUpdateSalesReport" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    </div>

    

<!-- Modal for Sales Report -->
<div id="salesReportModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
  <div class="modal-container">
    <div class="modal-content bg-white p-6 rounded-lg shadow-lg">
      <div class="flex justify-end">
        <button class="text-gray-500 hover:text-gray-700" onclick="closeModal('salesReportModal')">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      <h2 class="text-2xl text-center font-semibold mb-4">Sales Report for the month of <br> January 2023</h2>
      <!-- Sales Table -->
      <table class="table-auto w-full mb-4">
        <thead>
          <tr>
            <th class="px-4 py-2">Plant Category</th>
            <th class="px-4 py-2">Units Sold</th>
            <th class="px-4 py-2">Total Sales</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="border px-4 py-2">Snake Plants</td>
            <td class="border px-4 py-2">50</td>
            <td class="border px-4 py-2">500</td>
          </tr>
          <tr>
            <td class="border px-4 py-2">Cactus</td>
            <td class="border px-4 py-2">30</td>
            <td class="border px-4 py-2">750</td>
          </tr>
        
        </tbody>
       
        <tfoot>
          <tr>
            <td class="border px-4 py-2"><strong>Total:</strong></td>
            <td class="border px-4 py-2"><strong>80</strong></td>
            <td class="border px-4 py-2"><strong>1,250</strong></td>
          </tr>
        </tfoot>
      </table>
      <!-- Notes -->
      <div class="mb-4">
        <p><strong>Notes:</strong><br> * Majority of the orders were paid through GCash. </p>
      </div>
    </div>
  </div>
</div>
                </td>
            </tr>
        </tbody>
    </table>
</div>