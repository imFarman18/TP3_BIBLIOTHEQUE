
const container = document.querySelector('.container')
const input = document.getElementById('search')
const btn = document.querySelector('.submit')
const main = document.querySelector('.main')

let livre = null



function getLivre() {
    let x = input.value
    let api = `https://www.googleapis.com/books/v1/volumes?q=${x}`
    axios.get(api)
        .then(reponse => {
            let Livres = reponse.data.items
            showLivre(Livres)
        })

}

function showLivre(Livres) {
    main.innerHTML = ""; // Clear previous search results

    // Create a grid container element for the books
    const gridContainerElem = document.createElement("div");
    gridContainerElem.classList.add("grid-container");
    main.appendChild(gridContainerElem);

    Livres.forEach((Livre) => {
        const { title, authors, imageLinks } = Livre.volumeInfo;

        // Create a card element for the book
        const cardElem = document.createElement("div");
        cardElem.classList.add("card");
        cardElem.style.maxWidth = "18rem";
        
        cardElem.style.marginBottom = "5rem";
        cardElem.style.position = "relative";
        cardElem.style.left = "20px";
        cardElem.style.boxShadow = "2px 2px 40px 12px #435fc2";
        cardElem.style.transition = "transform 0.2s ease-in-out";

  
        // Create book image element
        const imageElem = document.createElement("img");
        imageElem.src = imageLinks ? imageLinks.thumbnail : "./MicrosoftTeams-image.png";
        imageElem.classList.add("card-img-top");
        imageElem.style.width = "100%";
        imageElem.style.height = "250px";
        cardElem.appendChild(imageElem);

        // Create card body element
        const cardBodyElem = document.createElement("div");
        cardBodyElem.classList.add("card-body");
        cardElem.appendChild(cardBodyElem);
        const br = document.createElement("br")
        

        // Create book title element
        const titleElem = document.createElement("h5");
        titleElem.classList.add("card-title");
        titleElem.textContent = "Nom: " + (title);
        titleElem.style.fontWeight = "bold";
        titleElem.style.fontSize = "21px";
       titleElem.style.textAlign = 'center'
        titleElem.style.backgroundColor = "rgb(56, 53, 105)";

          // Decrease font size if title is too long
          if (title.length > 40) {
            titleElem.style.fontSize = "16px";
        } else {
            titleElem.style.fontSize = "20px";
        }

        
        cardBodyElem.appendChild(br)
        cardBodyElem.appendChild(titleElem);


        // Create book authors element
        const authorsElem = document.createElement("p");
        authorsElem.classList.add("card-text");
        authorsElem.textContent = "Author: " + (authors ? authors.join(", ") : "Unknown author");
        authorsElem.style.fontSize = "14px";
        authorsElem.style.textAlign = "center";
        authorsElem.style.marginBottom = "0";
        authorsElem.style.backgroundColor = "rgb(56, 53, 105)";
        

        
        cardBodyElem.appendChild(authorsElem);


        const form = document.createElement("form");
        form.action = `./listbooks.php?titre=${title}&authors=${authors}`
        form.method = "post"
        console.log(form)
        
        const inputImg = document.createElement("input");
        inputImg.type="hidden";
        inputImg.value=imageLinks ? imageLinks.thumbnail : "./MicrosoftTeams-image.png";
        inputImg.name="image";

        // Add Ajoiter Button
        const btns = document.createElement("button")
        btns.classList.add("btn-ajouter")
        btns.textContent = "Ajouter"
        btns.style.position = "absolute !important"
        btns.style.marginTop= "40px"
        btns.style.marginBottom= "40px"
        btns.type="submit";


       cardBodyElem.appendChild(form)
       form.appendChild(inputImg)
       form.appendChild(btns)




        // Add hover effect to card element
        cardElem.addEventListener("mouseenter", () => {
            cardElem.style.transform = "scale(1.05)";
        });
        cardElem.addEventListener("mouseleave", () => {
            cardElem.style.transform = "scale(1)";
        });
        // Add card element to the grid container element
        gridContainerElem.appendChild(cardElem);
    });
}



btn.addEventListener('click', () => {
    main.innerHTML = ""
    getLivre()


}) 