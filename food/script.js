function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'nl'}, 'google_translate_element');
}

// Functie om de geselecteerde taal op te slaan in localStorage
function saveSelectedLanguage() {
    let select = document.querySelector(".goog-te-combo");
    if (select) {
        select.addEventListener("change", function () {
            localStorage.setItem("selectedLanguage", select.value);
        });
    }
}

// Functie om de opgeslagen taal toe te passen bij het laden van de pagina
function applySavedLanguage() {
    let selectedLanguage = localStorage.getItem("selectedLanguage");
    if (selectedLanguage && selectedLanguage !== "nl") {
        let select = document.querySelector(".goog-te-combo");
        if (select) {
            select.value = selectedLanguage;
            select.dispatchEvent(new Event("change"));
        }
    }
}

// Wacht tot de pagina geladen is om de functies toe te passen
window.addEventListener("load", function () {
    saveSelectedLanguage();
    setTimeout(applySavedLanguage, 500); // Wacht even om ervoor te zorgen dat Google Translate geladen is
});