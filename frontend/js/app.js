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
    const heroMovie = data.find(m => m.image) || data[0];

    hero.style.backgroundImage = `url('${heroMovie.image || fallbackHero}')`;

    hero.innerHTML = `
        <div class="hero-content">
            <h1>${heroMovie.title}</h1>
            <p>${heroMovie.description || ""}</p>
            <button onclick="window.open('${heroMovie.video_url}', '_blank')">
                ▶ Play
            </button>
        </div>
    `;

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