document.addEventListener('DOMContentLoaded', async () => {
    const urlParams = new URLSearchParams(window.location.search);
    const productName = urlParams.get('name');

    if (productName) {
        try {
            const response = await fetch(`/api/product?name=${encodeURIComponent(productName)}`);
            const product = await response.json();

            if (product.name) {
                document.getElementById('product-name').textContent = product.name;
                document.getElementById('product-price').textContent = product.price;
                document.getElementById('product-description').textContent = product.description;
                document.getElementById('product-image').src = `assets/images/products/${product.image}`;
            } else {
                document.body.innerHTML = '<h1>Product not found.</h1>';
            }
        } catch (error) {
            console.error('Failed to load product details:', error);
            document.body.innerHTML = '<h1>Failed to load product details.</h1>';
        }
    } else {
        document.body.innerHTML = '<h1>Product not found.</h1>';
    }
});

// Pop-up modal functionality
const modal = document.getElementById("fit-assistant-modal");
const fitAssistantBtn = document.querySelector(".fit-assistant-btn");
const closeModalBtn = document.querySelector("#fit-assistant-modal .close-btn");

fitAssistantBtn.onclick = function() {
  modal.style.display = "block";
}

closeModalBtn.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Fit Assistant Logic
document.querySelector(".continue-btn").addEventListener("click", () => {
    const age = document.getElementById("age").value;
    const height = document.getElementById("height").value;
    const weight = document.getElementById("weight").value;

    if (!age || !height || !weight) {
        alert("Please fill out all fields");
        return;
    }

    const size = determineSize(age, height, weight);
    displaySizeResult(size);
});

function determineSize(age, height, weight) {
    // Normalisasi data (misalnya, dalam meter untuk tinggi dan skala tertentu untuk berat)
    const normalizedHeight = height / 100; // tinggi dalam meter
    const normalizedWeight = weight; // berat dalam kg

    // Algoritma penentuan ukuran
    let size = "";

    if (normalizedHeight < 1.55) {
        if (normalizedWeight < 50) size = "S";
        else if (normalizedWeight < 60) size = "M";
        else size = "L";
    } else if (normalizedHeight < 1.75) {
        if (normalizedWeight < 60) size = "M";
        else if (normalizedWeight < 75) size = "L";
        else size = "XL";
    } else {
        if (normalizedWeight < 70) size = "L";
        else size = "XL";
    }

    return size;
}

function displaySizeResult(size) {
    const sizeResultDiv = document.getElementById("size-result");
    const recommendedSizeSpan = document.getElementById("recommended-size");
    
    recommendedSizeSpan.textContent = size;
    sizeResultDiv.style.display = "block";
}

document.addEventListener('DOMContentLoaded', function() {
    // Temukan tombol back
    var backButton = document.querySelector('.back-btn .close-btn');

    // Tambahkan event listener untuk klik pada tombol back
    backButton.addEventListener('click', function() {
        // Kembali ke halaman sebelumnya
        window.history.back();
    });
});

