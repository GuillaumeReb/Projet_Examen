document.addEventListener("DOMContentLoaded", function () {
    const phrases = [
        "Découvrez les nuances infinies de la bière, des reflets dorés aux profondeurs ambrées.",
        "Les couleurs de la bière racontent leur histoire, du soleil doré aux terres brunes.",
        "Explorez les teintes et saveurs de la bière, un voyage du clair doré à l’ombre de l'ambre."
    ];
    let currentPhraseIndex = 0;
    const textElement = document.getElementById("changing-text");

    function changePhrase() {
        textElement.textContent = phrases[currentPhraseIndex];
        currentPhraseIndex = (currentPhraseIndex + 1) % phrases.length;
    }

    changePhrase();
    setInterval(changePhrase, 30000);
});

document.addEventListener("DOMContentLoaded", function () {
    const phrases = [
        "Savourez des arômes authentiques des bières artisanales du monde entier.",
        "Explorez la richesse des saveurs avec nos sélections de bières internationales.",
        "Chaque continent vous offre une bière à découvrir, un voyage au cœur des traditions !"
    ];
    
    let currentPhraseIndex = 0;
    const textElement = document.getElementById("changing-text-continent");

    function changePhrase() {
        textElement.textContent = phrases[currentPhraseIndex];
        currentPhraseIndex = (currentPhraseIndex + 1) % phrases.length;
    }

    changePhrase();
    setInterval(changePhrase, 30000); // Change toutes les 30 secondes
});

