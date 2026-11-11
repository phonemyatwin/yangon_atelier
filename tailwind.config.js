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
        canvas: '#F5EFE6',       // Warm architectural atelier canvas (replaces sterile white)
        surface: '#FAF6F0',      // Elevated ivory alabaster card surface
        sand: '#EDE5D8',         // Muted limestone / travertine fill
        travertine: '#E2D8C9',   // Architectural travertine border
        espresso: '#161311',     // Deep smoked walnut anchor
        stone: {
          50: '#F7F3EC',         // Warm sand / ivory tint
          100: '#EFE9DF',        // Muted travertine fill
          200: '#E2D8C9',        // Soft architectural limestone border
          300: '#CEBFAC',        // Subtle divider tone
          400: '#9E8E7C',        // Muted captions & icons
          500: '#736555',        // Medium secondary text
          600: '#54483C',        // Readable warm body text
          700: '#3E342B',        // Subheaders & strong labels
          800: '#28221B',        // Primary architectural headings
          900: '#1A1613',        // Deep smoked walnut
          950: '#100E0C',        // Rich obsidian espresso
        },
        amber: {
          50: '#FBF7F0',
          100: '#F5EBDB',
          200: '#EAD6B8',
          300: '#DCBD90',
          400: '#CCA068',
          500: '#B58245',
          600: '#996733',
          700: '#7C4E26',
          800: '#613B1E',
          900: '#452814',
          950: '#25140A',
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
