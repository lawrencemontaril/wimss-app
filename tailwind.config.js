/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: ['./storage/framework/views/*.php', './resources/**/*.blade.php', './resources/**/*.js', './resources/**/*.vue', './node_modules/flowbite/**/*.js'],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'Roboto', 'sans-serif'],
            },
            maxWidth: {
                '8xl': '90rem',
            },
        },
    },
    plugins: [require('flowbite/plugin')],
};
