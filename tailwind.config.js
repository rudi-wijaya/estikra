import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                blue: {
                    50: "#e5f2ff",
                    100: "#cce5ff",
                    200: "#99cbff",
                    300: "#66b1ff",
                    400: "#3396ff",
                    500: "#1a8aff",
                    600: "#007AFF",
                    700: "#0066d6",
                    800: "#0052ad",
                    900: "#003d82",
                    950: "#002052",
                },
            },
        },
    },

    plugins: [forms],
};
