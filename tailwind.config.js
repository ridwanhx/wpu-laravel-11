/** @type {import('tailwindcss').Config} */

// tailwind.config.js
const defaultTheme = require("tailwindcss/defaultTheme");

export default {
    // menambahkan flowbite
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    darkMode: "class",
    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
                body: [
                    "Inter",
                    "ui-sans-serif",
                    "system-ui",
                    "-apple-system",
                    "system-ui",
                    "Segoe UI",
                    "Roboto",
                    "Helvetica Neue",
                    "Arial",
                    "Noto Sans",
                    "sans-serif",
                    "Apple Color Emoji",
                    "Segoe UI Emoji",
                    "Segoe UI Symbol",
                    "Noto Color Emoji",
                ],
            },
            colors: {
                primary: {
                    50: "#eff6ff",
                    100: "#dbeafe",
                    200: "#bfdbfe",
                    300: "#93c5fd",
                    400: "#60a5fa",
                    500: "#3b82f6",
                    600: "#2563eb",
                    700: "#1d4ed8",
                    800: "#1e40af",
                    900: "#1e3a8a",
                    950: "#172554",
                },
            },
        },
    },
    // menambahkan plugin flowbite
    plugins: [require("flowbite/plugin", "flowbite-typography")],

    // mendaftarkan kelas-kelas baru menggunakan safelist
    safelist: [
        // bacground red, text red
        "bg-red-100",
        "text-red-800",
        // bacground green, text green
        "bg-green-100",
        "text-green-800",
        // bacground blue, text blue
        "bg-blue-100",
        "text-blue-800",
        // bacground yellow, text yellow
        "bg-yellow-100",
        "text-yellow-800",
    ],
};
