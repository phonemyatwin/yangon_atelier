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
        canvas: '#FAF8F5',       // Warm architectural atelier canvas
        surface: '#FFFFFF',      // Crisp elevated alabaster cards
        sand: '#F3EDE4',         // Muted limestone / travertine fill
        stone: {
          50: '#FAF8F5',
          100: '#F4EFE8',
          200: '#E8E2D8',
          300: '#D6CCC0',
          400: '#A89E90',
          500: '#786F63',
          600: '#57524A',
          700: '#443F38',
          800: '#2A2622',
          900: '#1C1917',
          950: '#13110F',
        },
        cognac: {
          50: '#FDF9F4',
          100: '#F9EFE4',
          200: '#F2DCC7',
          300: '#E6C3A1',
          400: '#D5A276',
          500: '#BD804E',
          600: '#A46635',
          700: '#864E25',
          800: '#6C3D1D',
          900: '#462612',
          950: '#241308',
        }
      },
      fontFamily: {
        sans: ['"Plus Jakarta Sans"', 'system-ui', '-apple-system', 'BlinkMacSystemFont', '"Segoe UI"', 'Roboto', 'sans-serif'],
        serif: ['"Playfair Display"', 'Georgia', 'serif']
      }
    },
  },
  plugins: [],
}
