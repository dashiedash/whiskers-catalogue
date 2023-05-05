/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            sans: "'Noto Sans', ui-sans-serif, sans-serif",
            serif: "'Playfair Display', ui-serif, serif",
        },
        extend: {},
    },
    plugins: [],
};
