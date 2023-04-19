/** @type {import('tailwindcss').Config} */
const colors = require("tailwindcss/colors");
module.exports = {
  content: [
    './footer.php',
    './header.php',
    './template-parts/**/*.{html,js,php}',
  ],
  theme: {
    extend: {
    	colors: {
    		primary: "#3f2a56",
        secondary: "#16c4cf",
        //font color
        // #5191FA
        body: "#222",
    	}
    },
    fontFamily: {
      main: ['Open Sans', 'sans-serif']
    },
  },
  corePlugins: {
    outline: false
  },
  plugins: []
}
