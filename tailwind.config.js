/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {},
  },
  daisyui: {
    themes: [
      "emerald",
    ],
  },

  plugins: [
    require('daisyui'),
  ],
}