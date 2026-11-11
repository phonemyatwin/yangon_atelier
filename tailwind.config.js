/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./components/**/*.php",
    "./admin/**/*.php",
    "./admin/components/**/*.php",
    "./js/**/*.js",
    "./admin/js/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        canvas: '#FAFAFA',
        surface: '#FFFFFF',
        sand: '#F4F4F5',
        brand: {
          50: '#FBF8F5',
          100: '#F5ECE3',
          200: '#EBD8C5',
          700: '#8A5832',
          800: '#5A3820',
          900: '#2A1A0E',
          950: '#150D07',
        },
        obsidian: '#121214',
      },
      fontFamily: {
        sans: ['"Plus Jakarta Sans"', 'system-ui', '-apple-system', 'BlinkMacSystemFont', '"Segoe UI"', 'Roboto', 'sans-serif'],
        serif: ['"Playfair Display"', 'Georgia', 'serif']
      }
    },
  },
  plugins: [],
}
