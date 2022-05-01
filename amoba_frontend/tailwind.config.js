module.exports = {
  content: [
    "./public/**/*.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        descripcion: "#7C8498",
        descripcion_variant: "#ACBADC",
        titulo: "#3D465B",
        link: "#3568F0",
        "link-hover": "#353cf0",
        container: "#EEF0F6",
      },
    },
    fontFamily: {
      "Sofia Pro": ["Sofia Pro", "sans-serif"],
    },
  },
  plugins: [require("flowbite/plugin")],
};
