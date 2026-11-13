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
        // Theme: "Warm Travertine & Smoked Clay"
        canvas: '#EDE8E0',       // Main Page Canvas: Warm Oat / Travertine
        surface: '#F6F3EE',      // Card & Form Surfaces: Raw Linen / Sand
        clay: {
          DEFAULT: '#DFD8CD',    // Muted Sections, Pills & Hover Fills: Muted Clay
          hover: '#D5CDC1',
          light: '#EBE5DC',
        },
        taupe: {
          DEFAULT: '#C9C0B3',    // Borders & Hairlines: Weathered Taupe
          dark: '#B5ABA0',
          light: '#DCD4C8',
        },
        roast: {
          DEFAULT: '#362F2A',    // Primary Text & Headings: Deep Roast
          muted: '#4A413A',
        },
        umber: {
          DEFAULT: '#6E6359',    // Secondary Copy & Labels: Warm Umber
          muted: '#85786C',
        },
        terracotta: {
          DEFAULT: '#8A5A44',    // Primary CTA Buttons: Burnished Terracotta
          hover: '#704735',      // Hover Terracotta
          light: '#F2ECE8',
          dark: '#583627',
        },
        walnut: {
          DEFAULT: '#4A4038',    // Footer & Admin Sidebar: Smoked Walnut
          light: '#5A4E45',
          dark: '#3A322B',
          border: '#5C5046',
        },
        // Status Badges
        sage: {
          DEFAULT: '#3F624D',    // In Stock: Muted Sage text
          bg: '#DCE5DF',         // In Stock: Muted Sage background
          border: '#C6D6CB',
        },
        amberbadge: {
          DEFAULT: '#8C5327',    // Low Stock: Warm Amber text
          bg: '#EFE2D5',         // Low Stock: Warm Amber background
          border: '#E0CFBF',
        },
        rosebadge: {
          DEFAULT: '#8C3B3B',    // Delete/Errors: Muted Rose text
          bg: '#EFE0E0',         // Delete/Errors: Muted Rose background
          border: '#DFC8C8',
        },
      },
      fontFamily: {
        sans: ['"Plus Jakarta Sans"', 'Inter', 'system-ui', '-apple-system', 'BlinkMacSystemFont', '"Segoe UI"', 'Roboto', 'sans-serif'],
        serif: ['"Playfair Display"', 'Georgia', 'serif']
      }
    },
  },
  plugins: [],
}
