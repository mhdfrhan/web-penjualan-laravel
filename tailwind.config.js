/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php"
  ],
  theme: {
    extend: {
      fontFamily: {
        poppins : "'Poppins', sans-serif"
      }
    },
  },
  darkMode: 'class',
  plugins: [
    require('flowbite/plugin')
  ],
}
