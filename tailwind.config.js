const colors = require('tailwindcss/colors');

module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
  ],
  darkMode: 'media', // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        sky:colors.sky,
        cyan:colors.cyan,
        rose:colors.rose,
        Teal:colors.teal,
      },
      fontSize: {
        '2xs': '.6rem',
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}

