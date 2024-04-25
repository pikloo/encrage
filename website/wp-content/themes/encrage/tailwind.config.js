/** @type {import('tailwindcss').Config} */
module.exports = {
	important: true,
	content: [ './**/*.php' ],
	theme: {
		extend: {
			fontFamily: {
				ibm: [ 'ArimoIBM Plex Sans', 'Arial', 'sans-serif' ],
			},
		},
	},
	plugins: [],
};

