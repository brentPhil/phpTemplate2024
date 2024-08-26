/** @type {import('tailwindcss').Config} */
import daisyui0 from "daisyui";

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

          "success": "#27DEBF",

          "warning": "#a97e00",

          "error": "#e40036",
        },
      }
    ],
  },

  plugins: [
    daisyui0,
  ],
}