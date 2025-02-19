<div>
    {{-- Stop trying to control. --}}

    @if (auth()->user()->role == "Student")
    <div class="grid grid-cols-4 gap-4">
        <div class="col-span-1">
            <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Total Thesis Uploaded</h5>
                <p class="text-xl font-normal text-gray-700 dark:text-gray-400">{{ $totalThesisUploaded }}</p>
            </a>
        </div>

        <div class="col-span-1">
            <a href="#" class="block max-w-sm p-6 bg-green-100 text-green-800 border border-gray-200 rounded-lg shadow-sm hover:bg-green-200 ">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Approved Request Thesis</h5>
                <p class="text-xl font-normal text-green-700 ">{{ $myTotalApprovedThesisRequest }}</p>
            </a>
        </div>

        <div class="col-span-1">
            <a href="#" class="block max-w-sm p-6 bg-orange-100 border border-gray-200 rounded-lg shadow-sm hover:bg-orange-300 ">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Pending Request Thesis </h5>
                <p class="text-xl font-normal text-orange-700 ">{{ $myTotalPendingThesisRequest }}</p>
            </a>
        </div>

        <div class="col-span-1">
            <a href="#" class="block max-w-sm p-6 bg-red-100 border border-gray-200 rounded-lg shadow-sm hover:bg-red-300">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Rejected Request Thesis</h5>
                <p class="text-xl font-normal text-red-700 ">{{ $myTotalDeniedThesisRequest }}</p>
            </a>
        </div>
    </div>
    @endif

    @if (auth()->user()->role == "Admin" || auth()->user()->role == "Faculty")
    <div class="grid grid-cols-4 gap-4">
        <div class="col-span-1">
            <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Total Thesis Uploaded</h5>
                <p class="text-xl font-normal text-gray-700 dark:text-gray-400">{{ $totalThesisUploaded }}</p>
            </a>
        </div>

        <div class="col-span-1">
            <a href="#" class="block max-w-sm p-6 bg-green-100 text-green-800 border border-gray-200 rounded-lg shadow-sm hover:bg-green-200 ">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Approved Request Thesis</h5>
                <p class="text-xl font-normal text-green-700 ">{{ $totalApprovedThesisRequest }}</p>
            </a>
        </div>

        <div class="col-span-1">
            <a href="#" class="block max-w-sm p-6 bg-orange-100 border border-gray-200 rounded-lg shadow-sm hover:bg-orange-300 ">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Pending Request Thesis </h5>
                <p class="text-xl font-normal text-orange-700 ">{{ $totalPendingThesisRequest }}</p>
            </a>
        </div>

        <div class="col-span-1">
            <a href="#" class="block max-w-sm p-6 bg-red-100 border border-gray-200 rounded-lg shadow-sm hover:bg-red-300">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Rejected Request Thesis</h5>
                <p class="text-xl font-normal text-red-700 ">{{ $totalDeniedThesisRequest }}</p>
            </a>
        </div>
    </div>
    @endif

    
    

    <div class="grid grid-cols-2 gap-4 mt-5">

        @if (auth()->user()->role == "Admin" || auth()->user()->role == "Faculty")
        <div class="col-span-1">
            <h2 class="text-lg font-bold">Graph Thesis Uploads</h2>

            <!-- Chart Container -->
            <div id="thesisChart"></div>

            
            
        </div>

        <div class="col-span-1">

            <div id="requestThesisChart"></div>

        </div>
        @endif
    </div>

    <script>
        function renderThesisChart() {
            // Hanapin ang chart container
            var chartContainer = document.querySelector("#thesisChart");
    
            // Siguraduhin na may container bago mag-render
            if (!chartContainer) return;
    
            // Check kung may existing chart at i-destroy ito
            if (window.thesisChartInstance) {
                window.thesisChartInstance.destroy();
            }
    
            var options = {
                chart: {
                    type: 'bar',
                    height: 400
                },
                series: [{
                    name: 'Thesis Uploaded',
                    data: @json(array_values($chartData))
                }],
                xaxis: {
                    categories: @json(array_keys($chartData)),
                    title: {
                        text: 'Year'
                    }
                },
                yaxis: {
                    title: {
                        text: 'Number of Upload Thesis'
                    }
                }
            };
    
            // Render new chart
            window.thesisChartInstance = new ApexCharts(chartContainer, options);
            window.thesisChartInstance.render();
        }
    
        document.addEventListener('DOMContentLoaded', function () {
            renderThesisChart(); // Initial render kapag nag-load ang page
        });
    
        document.addEventListener('livewire:navigated', function () {
            renderThesisChart(); // Render ulit kapag bumalik sa page
        });




        function renderRequestThesisChart() {
            // Hanapin ang chart container
            var chartContainer2 = document.querySelector("#requestThesisChart");

            // Siguraduhin na may container bago mag-render
            if (!chartContainer2) return;

            // Check kung may existing chart at i-destroy ito
            if (window.requestThesisChartInstance) {
                window.requestThesisChartInstance.destroy();
            }

            var options = {
                chart: {
                    type: 'line',
                    height: 400
                },
                series: [{
                    name: 'Thesis Requested',
                    data: @json(array_values($chartDataRequest))
                }],
                xaxis: {
                    categories: @json(array_keys($chartDataRequest)),
                    title: {
                        text: 'Year'
                    }
                },
                yaxis: {
                    title: {
                        text: 'Number of Approved Request Download Thesis'
                    }
                },
                stroke: {
                    curve: 'smooth',
                    width: 3,
                    colors: ['#28A745'] // Green Line
                },
                colors: ['#28A745'], // Ensures that all elements follow green color
                markers: {
                    size: 5,
                    colors: ['#28A745'], // Green dot points
                    strokeColors: '#000000', // Black border for contrast
                    strokeWidth: 2
                }
                
            };

            // Render new chart
            window.requestThesisChartInstance = new ApexCharts(chartContainer2, options);
            window.requestThesisChartInstance.render();
        }

        // Initial render kapag nag-load ang page
        document.addEventListener('DOMContentLoaded', function () {
            renderRequestThesisChart();
        });

        // Render ulit kapag bumalik sa page
        document.addEventListener('livewire:navigated', function () {
            renderRequestThesisChart();
        });

        
    </script>
</div>



