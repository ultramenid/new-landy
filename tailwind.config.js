/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

export default {
    darkMode: 'false',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './vendor/masmerise/livewire-toaster/resources/views/*.blade.php', // 👈
      ],
  theme: {
    extend: {
        colors: {
            newgray: {
                50: '#f9fafb',
                100: '#f4f5f7',
                200: '#e5e7eb',
                300: '#d5d6d7',
                400: '#9e9e9e',
                500: '#707275',
                600: '#4c4f52',
                700: '#24262d',
                800: '#1a1c23',
                900: '#121317',
              },
        },
        fontFamily: {
            'sans': ['Poppins', ...defaultTheme.fontFamily.sans],
        },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}

