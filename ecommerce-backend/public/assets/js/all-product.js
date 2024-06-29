document.addEventListener('DOMContentLoaded', async () => {
    const productList = document.querySelector('.shop-content');

    try {
        const response = await fetch('/api/products');
        const products = await response.json();

        products.forEach(product => {
            const productBox = document.createElement('div');
            productBox.classList.add('product-box');

            productBox.innerHTML = `
                <a href="/product-template.html?name=${encodeURIComponent(product.product_name)}" class="btn-primary">
                    <img src="assets/images/products/${product.image}" alt="${product.product_name}" class="product-img">
                    <h2 class="product-title">${product.product_name}</h2>
                    <span class="product-price">Rp ${formatRupiah(product.price)}</span>
                </a>
                <i class='bx bx-shopping-bag add-cart' data-title="${product.product_name}" data-price="${product.price}" data-img="assets/images/products/${product.image}"></i>
            `;

            productList.appendChild(productBox);
        });

        start();
    } catch (error) {
        console.error('Error fetching products:', error);
    }
});

// OPEN & CLOSE CART
const cartIcon = document.querySelector("#cart-icon");
const cart = document.querySelector(".cart");
const closeCart = document.querySelector("#cart-close");

cartIcon.addEventListener("click", () => {
    cart.classList.add("active");
});

closeCart.addEventListener("click", () => {
    cart.classList.remove("active");
});

// =============== START ====================
function start() {
    loadCartItemsFromLocalStorage();
    addEvents();
}

// ============= UPDATE & RERENDER ===========
function update() {
    addEvents();
    updateTotal();
}

// =============== ADD EVENTS ===============
function addEvents() {
    // Remove items from cart
    let cartRemove_btns = document.querySelectorAll(".cart-remove");
    cartRemove_btns.forEach((btn) => {
        btn.addEventListener("click", handle_removeCartItem);
    });

    // Change item quantity
    let cartQuantity_inputs = document.querySelectorAll(".cart-quantity");
    cartQuantity_inputs.forEach((input) => {
        input.addEventListener("change", handle_changeItemQuantity);
    });

    // Add item to cart
    let addCart_btns = document.querySelectorAll(".add-cart");
    addCart_btns.forEach((btn) => {
        btn.addEventListener("click", handle_addCartItem);
    });

    // Buy Order
    const buy_btn = document.querySelector(".btn-buy");
    if (buy_btn) {
        buy_btn.addEventListener("click", handle_buyOrder);
    }
}

// ============= HANDLE EVENTS FUNCTIONS =============
let itemsAdded = [];

function handle_addCartItem() {
    let title = this.dataset.title;
    let price = this.dataset.price;
    let imgSrc = this.dataset.img;

    let newToAdd = {
        title,
        price: parseInt(price),
        imgSrc,
        quantity: 1
    };

    // handle item is already exist
    if (itemsAdded.find((el) => el.title == newToAdd.title)) {
        alert("This Item Is Already Exist!");
        return;
    } else {
        itemsAdded.push(newToAdd);
    }

    // Add product to cart
    let cartBoxElement = CartBoxComponent(title, newToAdd.price, imgSrc, newToAdd.quantity);
    let newNode = document.createElement("div");
    newNode.innerHTML = cartBoxElement;
    const cartContent = cart.querySelector(".cart-content");
    cartContent.appendChild(newNode);

    saveCartItemsToLocalStorage();

    // Show notification
    showNotification("Item added to cart!");

    update();
}

function handle_removeCartItem() {
    const title = this.parentElement.querySelector(".cart-product-title").innerText;
    this.parentElement.remove();
    itemsAdded = itemsAdded.filter((el) => el.title !== title);

    saveCartItemsToLocalStorage();

    update();
}

function handle_changeItemQuantity() {
    if (isNaN(this.value) || this.value < 1) {
        this.value = 1;
    }
    this.value = Math.floor(this.value); // to keep it integer

    const title = this.parentElement.querySelector(".cart-product-title").innerText;
    const item = itemsAdded.find((el) => el.title == title);
    if (item) {
        item.quantity = parseInt(this.value);
    }

    saveCartItemsToLocalStorage();

    update();
}

function handle_buyOrder() {
    if (itemsAdded.length <= 0) {
        alert("There is No Order to Place Yet! \nPlease Make an Order first.");
        return;
    }
    window.location.href = "cart.html";
}

// =========== UPDATE & RERENDER FUNCTIONS =========
function updateTotal() {
    let cartBoxes = document.querySelectorAll(".cart-box");
    const totalElement = cart.querySelector(".total-price");
    let total = 0;

    cartBoxes.forEach((cartBox) => {
        let priceElement = cartBox.querySelector(".cart-price");
        let priceString = priceElement.innerText.replace("Rp ", "").replace(/\./g, '');
        let price = parseFloat(priceString);
        let quantity = cartBox.querySelector(".cart-quantity").value;
        total += price * quantity;
    });

    // Menggunakan format mata uang Rupiah
    totalElement.innerHTML = 'Rp ' + formatRupiah(total);
}

// ============= HTML COMPONENTS =============
function CartBoxComponent(title, price, imgSrc, quantity) {
    return `
        <div class="cart-box">
            <img src=${imgSrc} alt="" class="cart-img">
            <div class="detail-box">
                <div class="cart-product-title">${title}</div>
                <div class="cart-price">Rp ${formatRupiah(price)}</div>
                <input type="number" value="${quantity}" class="cart-quantity">
            </div>
            <!-- REMOVE CART  -->
            <i class='bx bxs-trash-alt cart-remove'></i>
        </div>`;
}

// ============= HELPER FUNCTION =============
function formatRupiah(angka) {
    let number_string = angka.toString().split('.')[0];
    let sisa = number_string.length % 3;
    let rupiah = number_string.substr(0, sisa);
    let ribuan = number_string.substr(sisa).match(/\d{3}/g);

    if (ribuan) {
        let separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    return rupiah;
}

function saveCartItemsToLocalStorage() {
    localStorage.setItem('cartItems', JSON.stringify(itemsAdded));
}

function loadCartItemsFromLocalStorage() {
    const savedItems = JSON.parse(localStorage.getItem('cartItems'));
    if (savedItems) {
        itemsAdded = savedItems;

        const cartContent = cart.querySelector(".cart-content");
        cartContent.innerHTML = '';

        itemsAdded.forEach(item => {
            let cartBoxElement = CartBoxComponent(item.title, item.price, item.imgSrc, item.quantity);
            let newNode = document.createElement("div");
            newNode.innerHTML = cartBoxElement;
            cartContent.appendChild(newNode);
        });

        update();
    }
}

function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.innerText = message;
    document.body.appendChild(notification);

    setTimeout(() => {
        notification.classList.add('show');
    }, 100);

    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}
