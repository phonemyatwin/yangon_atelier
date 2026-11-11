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
        canvas: '#0D0B09',       // Deepest Royal Smoked Timber / Obsidian Estate Canvas
        surface: '#15120F',      // Dark Polished Walnut / Mahogany Card Surface
        sand: '#1C1814',         // Elevated Heritage Wood Panel
        travertine: '#2A231C',   // Antique Architectural Border
        espresso: '#090806',     // Deepest Imperial Obsidian
        gold: {
          50: '#FAF6EE',
          100: '#F3EACC',
          200: '#E8D599',
          300: '#DCBF66',
          400: '#DFB873',        // Warm Candlelight Gold
          500: '#C5A059',        // Burnished Antique Gilded Gold / Ormolu
          600: '#A8823E',        // Aged Brass
          700: '#87642A',        // Patina Bronze
          800: '#65481C',
          900: '#443011',
          950: '#251A07',
        },
        stone: {
          50: '#FAF6EE',         // Crisp Champagne Ivory Heading
          100: '#F0E7D8',        // Warm Parchment High-contrast Text
          200: '#D6C8B4',        // Readable Body Text
          300: '#B5A591',        // Secondary Muted Text
          400: '#8C7D6B',        // Muted Meta Text & Icons
          500: '#665849',        // Subtle Text
          600: '#453A30',        // Divider Line
          700: '#2E261F',        // Card Border
          800: '#1F1914',        // Card Elevated Fill
          900: '#15120F',        // Surface Base
          950: '#0D0B09',        // Canvas Base
        },
        amber: {
          50: '#FAF6EE',
          100: '#F4E8D1',
          200: '#E9D0A4',
          300: '#DDB574',
          400: '#E5A95A',        // Warm Glowing Amber
          500: '#C5A059',        // Gilded Gold Anchor
          600: '#A8823E',        // Burnished Brass
          700: '#85632B',        // Antique Bronze
          800: '#5F441C',
          900: '#3D2A10',
          950: '#1F1406',
        },
        cognac: {
          50: '#FBF5EE',
          100: '#F5E6D4',
          200: '#E8CAAA',
          300: '#D9AA7D',
          400: '#C98751',
          500: '#A76634',        // Aged Saddle Leather
          600: '#8A4F25',
          700: '#6C3B1A',
          800: '#4F2911',
          900: '#33190A',
          950: '#1A0B04',
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
