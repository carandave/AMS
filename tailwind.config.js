import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import flowbite from 'flowbite/plugin';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                fadeDown: {
                    '0%': { opacity: '0', transform: 'translateY(-13%)' },
                    '20%': { opacity: '0', transform: 'translateY(-6%)' },
                    '40%': { opacity: '0', transform: 'translateY(-2%)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
            },
            animation: {
                fadeDown: 'fadeDown 0.5s ease-out',
            }
        },
    },

    plugins: [forms, flowbite],
};
