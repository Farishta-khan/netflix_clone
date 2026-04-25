// LOAD MOVIES FROM BACKEND
fetch("../../backend/api/get_movies.php")
.then(res => res.json())
.then(data => {
    let container = document.getElementById("moviesContainer");

    data.forEach(movie => {
        let div = document.createElement("div");
        div.classList.add("movie-card");

        div.innerHTML = `
            <p>${movie.title}</p>
        `;

        container.appendChild(div);
    });
});

// LOGOUT (simple)
function logout() {
    window.location.href = "login.html";
}