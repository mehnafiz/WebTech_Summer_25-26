let theme = localStorage.getItem("theme") || "light";

function applyTheme() {
    let btn = document.getElementById("themeBtn");

    if (theme === "dark") {
        document.body.classList.add("dark");
        btn.textContent = "Light Mode";
    } else {
        document.body.classList.remove("dark");
        btn.textContent = "Dark Mode";
    }
}

function toggleTheme() {
    if (theme === "dark") {
        theme = "light";
    } else {
        theme = "dark";
    }

    localStorage.setItem("theme", theme);
    applyTheme();
}

applyTheme();
