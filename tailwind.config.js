/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                navy:      '#1B263A',
                'navy-light': '#243352',
                pink:      '#F5C3DB',
                'pink-dark':  '#CC3366',
                'pink-mid':   '#E8A0C0',
            },
            fontFamily: {
                title: ['Homestead', 'Georgia', 'serif'],
                body:  ['Lexend', 'sans-serif'],
            },
        },
    },
    plugins: [],
}
