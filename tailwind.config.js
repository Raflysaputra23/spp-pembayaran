/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: ["./index.php","./app/view/**/*.{php,html}","./js/**/*.js"],
  theme: {
    extend: {
      maxWidth: {
        '65' : '26rem',
      }
    },
  },
  plugins: [],
}

