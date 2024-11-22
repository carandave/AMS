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

document.addEventListener('livewire:navigated', () => { // We will reinitialize the Flowbite if the DOM is change in livewire in order to work properly the modal or components of flowbite
    // console.log('navigated');
    initFlowbite();
})


