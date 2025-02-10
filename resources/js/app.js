import './bootstrap';

import 'flowbite';
import { initFlowbite } from 'flowbite'; // We will import initFlowbite for making the flowbite initialize


// Livewire.hook('commit', ({ component, commit, respond, succeed, fail }) => {
//     succeed(({ snapshot, effect }) => {
//         queueMicrotask(() => {
//             initFlowbite();
//         })
//     })
// })

Livewire.hook('message.processed', () => {
    // Clean up existing Flowbite instances to avoid duplication
    const modals = document.querySelectorAll('[data-modal-toggle]');
    modals.forEach(modal => {
        if (modal._flowbite) {
            modal._flowbite.dispose(); // Dispose of the existing Flowbite modal instance
        }
    });

    // Reinitialize Flowbite components
    initFlowbite();
});

document.addEventListener('livewire:load', () => {
    // Initialize Flowbite when Livewire first loads
    initFlowbite();

    


    // var options = {
    //     chart: {type: "bar", height: 350},
    //     series: [{name: "Thesis Uploads", data: @json(array_values($thesisData))}],
    //     xaxis: {categories: @json(array_keys($thesisData)), title: {text: "Month"}},
    //     yaxis: {title: {text: "Number of Thesis"}},
    //     colors: ["#008FFB"]
    
    // }
    // alert("Qwe")
    // var chart = new ApexCharts(document.querySelector('#thesisChart'), options);
    // chart.render();
    
    // Livewire.on('refreshChart', function (data){
    //     chart.updateSeries([{data: data}]);
    // })
});



// document.addEventListener('DOMContentLoaded', function () {
//     new TomSelect('.tom-select', {
//         create: false, // Users can't create new options
//         sortField: {
//             field: "text",
//             direction: "asc"
//         }
//     });

    
// });





// Ensure thesisChartData is available











//     const modal = document.getElementById('edit_student');
//   const form = document.getElementById('edit-student-form');

//   modal.addEventListener('hidden.bs.modal', () => {
//     // Reset the form
//     form.reset();
//   });


