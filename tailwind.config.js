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
        'strong': '#FFFFFF',
        'weak': '#F4F4F4'
      },
      'blue': {
        'weak': '#1E90FF',
        'strong': '#1874CD'
      },
      'green': {
        'weak': '#32CD32',
        'strong': '#28A428'
      },
      'yellow': {
        'weak': '#FFD700',
        'strong': '#DAA520'
      }
    },
    // backgroundImage : {
    //   'leaf-bg': "url(\"/assets/leaf-background.jpg\") !important" 
    // }
  },
  plugins: [],
}

