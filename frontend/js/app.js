const container = document.getElementById("moviesContainer");
const hero = document.getElementById("hero");

const fallbackHero = "https://via.placeholder.com/1200x500/111/fff?text=Netflix+Clone";
const fallbackImg = "https://via.placeholder.com/300x400?text=No+Image";

fetch("../../backend/api/get_movies.php")
.then(res => res.json())
.then(data => {

    console.log("DATA:", data);

    if(!data || data.length === 0){
        hero.style.backgroundImage = `url(${fallbackHero})`;
        container.innerHTML = "<h3>No movies found</h3>";
        return;
    }

    // ---------------- HERO ----------------
const hero = document.getElementById("hero");

const fallbackHero = "https://via.placeholder.com/1200x500/111/fff?text=Netflix+Clone";

fetch("../../backend/api/get_movies.php")
.then(res => res.json())
.then(data => {

    if(!data || data.length === 0){
        hero.style.backgroundImage = `url('${fallbackHero}')`;
        return;
    }

    // 🎯 RANDOM HERO EVERY LOAD
    const heroMovie = data[Math.floor(Math.random() * data.length)];

    hero.style.backgroundImage = `url('${heroMovie.image || fallbackHero}')`;

    hero.innerHTML = `
        <div class="hero-content">
            <h1>${heroMovie.title}</h1>
            <p>${heroMovie.description || ""}</p>
            <button onclick="window.open('${heroMovie.video_url}', '_blank')">
                Play
            </button>
        </div>
    `;
});
    // ---------------- GRID ----------------
    container.innerHTML = "";

    data.forEach(movie => {

        const card = document.createElement("div");
        card.className = "movie-card";

        const img = movie.image || fallbackImg;

        card.innerHTML = `
            <img src="${img}" onerror="this.src='${fallbackImg}'">
            <div class="movie-title">${movie.title}</div>
        `;

        card.onclick = () => {
            window.open(movie.video_url, "_blank");
        };

        container.appendChild(card);
    });

})
.catch(err => {
    console.log("ERROR:", err);

    hero.style.backgroundImage = `url(${fallbackHero})`;
    container.innerHTML = "<h3>Failed to load movies</h3>";
});
function logout() {
    fetch("../../backend/api/logout.php")
    .then(() => {
        window.location.href = "login.html";
    })
    .catch(() => {
        window.location.href = "login.html";
    });
}
document.getElementById("searchInput").addEventListener("input", function(e){

    const value = e.target.value.toLowerCase();

    document.querySelectorAll(".movie-card").forEach(card => {

        const title = card.innerText.toLowerCase();

        if(title.includes(value)){
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
});
const searchInput = document.getElementById("searchInput");

searchInput.addEventListener("input", function () {

    const value = this.value.toLowerCase();
    const cards = document.querySelectorAll(".movie-card");

    cards.forEach(card => {

        const title = card.innerText.toLowerCase();

        if (title.includes(value)) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
});