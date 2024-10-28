/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        custom: ['Anta']
      }
    },
    colors: {
      'gray': '#C5C4C8',
      'black': '#33372C',
      'red': '#FF3B30',
      'white': {
        'light': '#F4F4F4',
        'dark': '#FFFFFF'
      },
      'blue': {
        'light': '#1E90FF',
        'dark': '#1874CD'
      },
      'green': {
        'lighter': '#66FF66',
        'light': '#32CD32',
        'dark': '#28A428'
      },
      'yellow': {
        'light': '#FFD700',
        'dark': '#DAA520'
      }
    },
    // backgroundImage : {
    //   'leaf-bg': "url(\"/assets/leaf-background.jpg\") !important" 
    // }
  },
  plugins: [],
}

