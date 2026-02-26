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
                    50: "#eef0fd",
                    100: "#dde2fb",
                    200: "#bbc5f7",
                    300: "#99a8f3",
                    400: "#778bef",
                    500: "#6a82ec",
                    600: "#5a74e8",
                    700: "#4560d0",
                    800: "#3450b8",
                    900: "#1c30a0",
                    950: "#0e1860",
                },
            },
        },
    },

    plugins: [forms],
};
