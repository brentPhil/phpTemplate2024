/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {},
  },
  daisyui: {
    themes: [
      {
        mytheme: {

          "primary": "#00c4aa",

          "secondary": "#00a0ff",

          "accent": "#007a00",

          "neutral": "#181701",

          "base-100": "#fcfcfc",

          "info": "#5ec0ff",

          "success": "#00e498",

          "warning": "#a97e00",

          "error": "#e40036",
        },
      }
    ],
  },

  plugins: [
    require('daisyui'),
  ],
}