/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
    colors: {
      'gray': '#C5C4C8',
      'black': '#33372C',
      'red': '#FF3B30',
      'white': {
        'ligth': '#F4F4F4',
        'dark': '#FFFFFF'
      },
      'blue': {
        'ligth': '#1E90FF',
        'dark': '#1874CD'
      },
      'green': {
        'ligth': '#32CD32',
        'dark': '#28A428'
      },
      'yellow': {
        'ligth': '#FFD700',
        'dark': '#DAA520'
      }
    },
    // backgroundImage : {
    //   'leaf-bg': "url(\"/assets/leaf-background.jpg\") !important" 
    // }
  },
  plugins: [],
}

