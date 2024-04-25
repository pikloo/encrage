/** @type {import('tailwindcss').Config} */
module.exports = {
	important: true,
	content: [ './**/*.php' ],
	theme: {
		extend: {
			fontFamily: {
				ibm: [ 'ArimoIBM Plex Sans', 'Arial', 'sans-serif' ],
			},
			keyframes: {
				"slide-in-up": {
					"0%": {
						visibility: "visible",
						transform: "translate3d(0, 100%, 0)",
					},
					"100%": {
						transform: "translate3d(0, 0, 0)",
					},
				},
			},
			animation: {
                slideInUp: "slide-in-up 0.5s ease-in-out",
            },
		},
	},
	plugins: [],
};

