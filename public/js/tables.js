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

// const texte = 'Savourez des arômes authentiques des bières artisanales du monde entier.';
// const blanc = '          '; // Espace entre chaque répétition du texte
// const nbTexte = 4; // Nombre de répétitions du texte

// const msg = (texte + blanc).repeat(nbTexte); // Répéter le texte

// // Sélectionner l'élément où le texte va défiler
// const scrollingTextElement = document.getElementById('changing-text-continent');

//  // Fonction pour mettre le texte dans l'élément et redémarrer l'animation
//  function updateText(newText) {
//     scrollingTextElement.textContent = newText;

//     // Réinitialiser l'animation en utilisant JavaScript
//     scrollingTextElement.style.animation = 'none'; // Stopper l'animation
//     scrollingTextElement.offsetHeight; // Trigger reflow pour redémarrer l'animation
//     scrollingTextElement.style.animation = ''; // Relancer l'animation
// }

// // Initialiser avec le texte
// updateText(msg);

// Si vous voulez changer le texte après un certain délai, vous pouvez faire ceci :
// setInterval(() => {
//     updateText(msg); // Vous pouvez changer le texte ici si nécessaire
// }, 30000); // Par exemple, toutes les 30 secondes
