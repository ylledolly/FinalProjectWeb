document.addEventListener("DOMContentLoaded", function () {
    // Get all rating containers
    const ratingContainers = document.querySelectorAll(".rating");

    // Load saved ratings from localStorage
    const savedRatings = JSON.parse(localStorage.getItem("bookRatings")) || {};

    // Initialize each rating container
    ratingContainers.forEach((container) => {
        const bookId = container.getAttribute("data-book-id");
        const stars = container.querySelectorAll(".fa-star");

        // Set initial state based on saved ratings
        const initialRating = savedRatings[bookId] || 0;
        for (let i = 0; i < initialRating; i++) {
            stars[i].style.color = "var(--bs-yellow)"; // Yellow for active stars
        }

        // Add click event listeners to stars
        stars.forEach((star, index) => {
            star.addEventListener("click", () => {
                // Set the rating
                const rating = index + 1;

                // Update the stars visually
                stars.forEach((s, i) => {
                    if (i < rating) {
                        s.style.color = "var(--bs-yellow)"; // Highlight active stars in yellow
                    } else {
                        s.style.color = "rgb(174, 174, 174)"; // Set unselected stars to gray
                    }
                });

                // Show alert with the rating
                alert(`You rated ${rating} star${rating > 1 ? 's' : ''}`);

                // Save the rating in localStorage
                savedRatings[bookId] = rating;
                localStorage.setItem("bookRatings", JSON.stringify(savedRatings));
            });
        });
    });
});
