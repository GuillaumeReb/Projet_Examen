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
