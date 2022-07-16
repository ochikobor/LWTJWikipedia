module.exports = {
   purge: [
     './resources/**/*.blade.php',
     './resources/**/*.js',
     './resources/**/*.vue',
   ],
  darkMode: false, // or 'media' or 'class'
  theme: {
        colors: {
            blue: {
                light: '#65efff',
                DEFAULT: '#00BCE4',
                dark: '#008cb2',
            }
            
        }
  },
  variants: {},
  plugins: [],
}