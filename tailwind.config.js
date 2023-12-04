/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["*.php"],
  theme: {
    screens:{
      'lilPhone' : '390px'
    },
    extend: {
      colors:{
        'tt': '#e5e7eb00'
      }
    },
  },
  plugins: [],
}

