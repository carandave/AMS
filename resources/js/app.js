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
});


document.addEventListener('livewire:navigated', () => { // We will reinitialize the Flowbite if the DOM is change in livewire in order to work properly the modal or components of flowbite
    // console.log('navigated');
    initFlowbite();
})




//     const modal = document.getElementById('edit_student');
//   const form = document.getElementById('edit-student-form');

//   modal.addEventListener('hidden.bs.modal', () => {
//     // Reset the form
//     form.reset();
//   });


