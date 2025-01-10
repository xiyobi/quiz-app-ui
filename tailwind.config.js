/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["resources/views/**/*.{php,html}","public/js/**/*.{php,html,js}"],
  theme: {
    extend: {
      colors: {
        primary: {
          "50": "#eff6ff",
          "100": "#dbeafe",
          "200": "#bfdbfe",
          "300": "#93c5fd",
          "400": "#60a5fa",
          "500": "#3b82f6",
          "600": "#2563eb",
          "700": "#1d4ed8",
          "800": "#1e40af",
          "900": "#1e3a8a",
          "950": "#172554"
        }
      }
    },
    fontFamily: {
      'body': [
        'Inter',
        'ui-sans-serif',
        'system-ui',
        '-apple-system',
        'system-ui',
        'Segue UI',
        'Roboto',
        'Helvetica Nee',
        'Arial',
        'Not Sans',
        'sans-serif',
        'Apple Color Emoji',
        'Segue UI Emoji',
        'Segue UI Symbol',
        'Not Color Emoji'
      ],
      'sans': [
        'Inter',
        'ui-sans-serif',
        'system-ui',
        '-apple-system',
        'system-ui',
        'Segue UI',
        'Roboto',
        'Helvetica Nee',
        'Arial',
        'Not Sans',
        'sans-serif',
        'Apple Color Emoji',
        'Segue UI Emoji',
        'Segue UI Symbol',
        'Not Color Emoji'
      ]
    }
  },
  plugins: [],
}

