/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary :"#176B87",
        secondry :"#053B50",
        bodyBG: "#F0F0F0"
      }
    },
  },
  plugins: [],
}

