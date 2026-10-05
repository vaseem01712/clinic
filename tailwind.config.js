
/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./vendor/filament/**/*.blade.php",
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          50:'#eff6ff',100:'#dbeafe',200:'#bfdbfe',300:'#93c5fd',400:'#60a5fa',
          500:'#3b82f6',600:'#2563eb',700:'#1d4ed8',800:'#1e40af',900:'#1e3a8a',950:'#0b1739'
        },
        accent:{50:'#f5f3ff',100:'#ede9fe',200:'#ddd6fe',300:'#c4b5fd',400:'#8b5cf6',500:'#7c3aed',600:'#6d28d9'},
        navy:{900:'#0d1220',800:'#171c2b'}
      },
      fontFamily:{sans:['"Geist"','"Plus Jakarta Sans"','ui-sans-serif','system-ui']},
      boxShadow:{
        soft:'0 20px 70px -35px rgba(7,28,64,.28)',
        premium:'0 28px 90px -42px rgba(7,28,64,.34)'
      },
      borderRadius:{'4xl':'2rem'}
    }
  },
  plugins:[]
}
