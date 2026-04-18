<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Grocery List</title>

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
<link href="assets/css/material-kit.css" rel="stylesheet">

<style>
  body {
    background-color: #f8f9fa;
    padding-bottom: 95px;
  }

  .app-shell {
    max-width: 820px;
    margin: auto;
    padding: 24px;
  }

  .top-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
    margin-bottom: 18px;
  }

  .page-title {
    font-size: 2.1rem;
    font-weight: 700;
    color: #344767;
    margin: 0;
  }

  .page-subtitle {
    margin-top: 4px;
    font-size: 0.9rem;
    color: #7b809a;
  }

  .top-actions {
    display: flex;
    align-items: center;
    gap: 14px;
  }

  .icon-action {
    text-align: center;
    font-size: 0.72rem;
    color: #344767;
    cursor: pointer;
    min-width: 58px;
  }

  .icon-action .material-icons-round {
    display: block;
    font-size: 2rem;
    margin-bottom: 2px;
  }

  .helper-card {
    margin-top: 16px;
    background: white;
    border-radius: 16px;
    padding: 14px 16px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 14px;
    margin-bottom: 16px;
  }

  .helper-text {
    color: #67748e;
    font-size: 0.9rem;
  }

  .helper-link {
    background: #eef2f7;
    color: #344767;
    text-decoration: none;
    border-radius: 12px;
    padding: 10px 14px;
    font-weight: 600;
    font-size: 0.85rem;
    white-space: nowrap;
  }

  .search-row {
    display: flex;
    align-items: center;
    gap: 12px;
    position: relative;
    margin-bottom: 18px;
  }

  .search-input {
    flex: 1;
    border: none;
    outline: none;
    border-radius: 30px;
    background: #eef2f7;
    padding: 14px 18px;
    font-size: 1rem;
    color: #344767;
  }

  .filter-btn {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: #eef2f7;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    color: #344767;
    position: relative;
  }

  .filter-btn.active::after {
    content: "";
    width: 10px;
    height: 10px;
    background: #e74c3c;
    border-radius: 50%;
    position: absolute;
    top: 6px;
    right: 6px;
  }

  .filter-menu {
    position: absolute;
    top: 58px;
    right: 0;
    width: 220px;
    background: white;
    border-radius: 14px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    display: none;
    z-index: 300;
    overflow: hidden;
  }

  .filter-option {
    padding: 12px 16px;
    cursor: pointer;
    color: #344767;
    font-size: 0.95rem;
  }

  .filter-option:hover {
    background: #f5f7fa;
  }

  .filter-option.selected {
    background: #eef2f7;
    color: #e74c3c;
    font-weight: 600;
  }

  .section-title {
    margin-top: 24px;
    margin-bottom: 10px;
    font-size: 1rem;
    font-weight: 700;
    color: #67748e;
    text-transform: uppercase;
    letter-spacing: 0.04em;
  }

  .grocery-card {
    background: white;
    border-radius: 18px;
    padding: 16px 18px;
    margin-top: 12px;
    display: grid;
    grid-template-columns: 42px 1.7fr 95px 120px 42px;
    align-items: center;
    gap: 12px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
  }

  .check-btn {
    width: 28px;
    height: 28px;
    border: 2px solid #cfd8e3;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    color: white;
    background: white;
  }

  .check-btn.checked {
    background: #344767;
    border-color: #344767;
  }

  .item-name {
    font-weight: 600;
    color: #344767;
    font-size: 1rem;
    line-height: 1.2;
  }

  .item-meta {
    margin-top: 4px;
    font-size: 0.8rem;
    color: #7b809a;
  }

  .checked-text {
    text-decoration: line-through;
    color: #9aa2b1;
  }

  .item-price {
    text-align: center;
    font-weight: 600;
    color: #344767;
  }

  .qty-controls {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
  }

  .qty-btn {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #eef2f7;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    user-select: none;
    font-weight: bold;
    color: #344767;
  }

  .qty-number {
    min-width: 16px;
    text-align: center;
    font-weight: 600;
    color: #344767;
  }

  .delete-btn {
    cursor: pointer;
    color: #e74c3c;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .total-box {
    margin-top: 24px;
    background: white;
    padding: 18px;
    border-radius: 18px;
    text-align: center;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
  }

  .total-label {
    color: #7b809a;
    font-size: 0.95rem;
  }

  .total-value {
    margin-top: 6px;
    font-size: 1.45rem;
    font-weight: 700;
    color: #344767;
  }

  .empty-message {
    margin-top: 18px;
    background: white;
    border-radius: 18px;
    padding: 20px;
    color: #67748e;
    text-align: center;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
  }

  .modal {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.35);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 500;
  }

  .modal-box {
    background: white;
    padding: 24px;
    border-radius: 18px;
    width: 430px;
    max-width: 92%;
    box-shadow: 0 12px 30px rgba(0,0,0,0.18);
  }

  .modal-title {
    margin: 0 0 16px 0;
    font-size: 1.6rem;
    font-weight: 700;
    color: #344767;
  }

  .modal-input {
    width: 100%;
    margin-bottom: 12px;
    padding: 12px 14px;
    border-radius: 12px;
    border: none;
    background: #eef2f7;
    outline: none;
  }

  .modal-actions {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-top: 12px;
  }

  .modal-btn {
    border: none;
    background: #eef2f7;
    color: #344767;
    border-radius: 12px;
    padding: 10px 18px;
    font-weight: 600;
    cursor: pointer;
  }

  .modal-btn.primary {
    background: #344767;
    color: white;
  }

  .bottom-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: white;
    border-top: 1px solid #e9ecef;
    display: flex;
    justify-content: space-around;
    padding: 6px 0;
    z-index: 100;
  }

  .bottom-nav a {
    flex: 1;
    text-align: center;
    font-size: 0.6rem;
    color: #7b809a;
    text-decoration: none;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .bottom-nav .material-icons-round {
    font-size: 1.4rem;
  }

  .bottom-nav a.active {
    color: #e74c3c;
  }

  .toast {
    position: fixed;
    top: 20px;
    right: 20px;
    background: #344767;
    color: white;
    padding: 12px 16px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    display: none;
    z-index: 800;
    font-size: 0.9rem;
    font-weight: 600;
  }
</style>
</head>

<body>

<div class="toast" id="toastMessage"></div>

<div class="app-shell">

  <div class="top-row">
    <div>
      <h1 class="page-title">Grocery List</h1>
      <div class="page-subtitle">Track items you still need to buy</div>
    </div>

    <div class="top-actions">
      <div class="icon-action" onclick="openModal()">
        <span class="material-icons-round">add_circle</span>
        Add Item
      </div>
    </div>
  </div>

  <div class="helper-card">
    <div class="helper-text">Already bought something? It can move into your pantry.</div>
    <a class="helper-link" href="pantry.php">Check Pantry</a>
  </div>

  <div class="search-row">
    <input
      class="search-input"
      id="search"
      placeholder="Search grocery items..."
      oninput="render()"
    >

    <div class="filter-btn" id="filterBtn" onclick="toggleFilterMenu()">
      <span class="material-icons-round">tune</span>
    </div>

    <div class="filter-menu" id="filterMenu">
      <div class="filter-option" id="filter-all" onclick="setFilter('all')">All Items</div>
      <div class="filter-option" id="filter-unchecked" onclick="setFilter('unchecked')">Unchecked Only</div>
      <div class="filter-option" id="filter-checked" onclick="setFilter('checked')">Checked Only</div>
      <div class="filter-option" id="filter-produce" onclick="setFilter('Produce')">Produce</div>
      <div class="filter-option" id="filter-proteins" onclick="setFilter('Proteins')">Proteins</div>
    </div>
  </div>

  <div id="list"></div>

  <div class="total-box">
    <div class="total-label">Cost Estimate</div>
    <div class="total-value" id="total">$0.00</div>
  </div>

</div>

<div class="modal" id="modal">
  <div class="modal-box">
    <h2 class="modal-title">Add Item</h2>

    <input id="name" class="modal-input" placeholder="Name">
    <input id="category" class="modal-input" placeholder="Category (Produce or Proteins)">
    <input id="price" class="modal-input" placeholder="Price">
    <input id="qty" class="modal-input" placeholder="Qty">

    <div class="modal-actions">
      <button class="modal-btn primary" onclick="addItem()">Add</button>
      <button class="modal-btn" onclick="closeModal()">Close</button>
    </div>
  </div>
</div>

<nav class="bottom-nav">
  <a href="index.php">
    <span class="material-icons-round">home</span>
    Home
  </a>

  <a href="myplan.php">
    <span class="material-icons-round">calendar_month</span>
    My Plan
  </a>

  <a href="pantry.php">
    <span class="material-icons-round">inventory_2</span>
    Pantry
  </a>

  <a href="#">
    <span class="material-icons-round">menu_book</span>
    Recipes
  </a>

  <a href="#">
    <span class="material-icons-round">search</span>
    Find
  </a>

  <a href="#">
    <span class="material-icons-round">account_balance_wallet</span>
    Budget
  </a>

  <a href="grocery.php" class="active">
    <span class="material-icons-round">shopping_cart</span>
    Grocery
  </a>
</nav>

<script>
  const KEY = "groceryItems_v5";
  const PANTRY_KEY = "pantryItems";

  const defaultItems = [
    {name:"Garlic Bulbs (Individual)", category:"Produce", price:1.00, qty:2, checked:false},
    {name:"Onions, Yellow 3 lb Bag", category:"Produce", price:2.99, qty:1, checked:false},
    {name:"Ground Beef, Tube, 2 lb", category:"Proteins", price:5.00, qty:1, checked:false}
  ];

  let items = JSON.parse(localStorage.getItem(KEY)) || defaultItems;
  let currentFilter = "all";

  function save() {
    localStorage.setItem(KEY, JSON.stringify(items));
  }

  function showToast(message) {
    const toast = document.getElementById("toastMessage");
    toast.textContent = message;
    toast.style.display = "block";

    clearTimeout(window.toastTimeout);
    window.toastTimeout = setTimeout(() => {
      toast.style.display = "none";
    }, 1800);
  }

  function updateFilterUI() {
    document.querySelectorAll(".filter-option").forEach(option => {
      option.classList.remove("selected");
    });

    const selected = document.getElementById("filter-" + currentFilter.toLowerCase().replace(/\s+/g, "-"));
    if (selected) {
      selected.classList.add("selected");
    }

    const filterBtn = document.getElementById("filterBtn");
    if (currentFilter !== "all") {
      filterBtn.classList.add("active");
    } else {
      filterBtn.classList.remove("active");
    }
  }

  function toggleFilterMenu() {
    const menu = document.getElementById("filterMenu");
    menu.style.display = menu.style.display === "block" ? "none" : "block";
  }

  function setFilter(type) {
    currentFilter = type;
    document.getElementById("filterMenu").style.display = "none";
    updateFilterUI();
    render();

    if (type === "all") showToast("Showing all grocery items");
    if (type === "unchecked") showToast("Filter applied: Unchecked Only");
    if (type === "checked") showToast("Filter applied: Checked Only");
    if (type === "Produce") showToast("Filter applied: Produce");
    if (type === "Proteins") showToast("Filter applied: Proteins");
  }

  function render() {
    let html = "";
    let total = 0;
    const searchText = document.getElementById("search").value.toLowerCase().trim();

    let filteredItems = items.filter(item =>
      item.name.toLowerCase().includes(searchText)
    );

    if (currentFilter === "unchecked") {
      filteredItems = filteredItems.filter(item => !item.checked);
    }

    if (currentFilter === "checked") {
      filteredItems = filteredItems.filter(item => item.checked);
    }

    if (currentFilter === "Produce" || currentFilter === "Proteins") {
      filteredItems = filteredItems.filter(item => item.category === currentFilter);
    }

    if (filteredItems.length === 0) {
      html = `
        <div class="empty-message">
          No grocery items found for this search or filter.
        </div>
      `;
      document.getElementById("list").innerHTML = html;
      document.getElementById("total").innerText = "$0.00";
      return;
    }

    const categories = [...new Set(filteredItems.map(item => item.category))];

    categories.forEach(category => {
      html += `<div class="section-title">${category}</div>`;

      const itemsInCategory = filteredItems.filter(item => item.category === category);

      itemsInCategory.forEach(item => {
        const realIndex = items.findIndex(realItem =>
          realItem.name === item.name &&
          realItem.category === item.category &&
          realItem.price === item.price &&
          realItem.qty === item.qty
        );

        total += item.price * item.qty;

        html += `
          <div class="grocery-card">
            <div class="check-btn ${item.checked ? 'checked' : ''}" onclick="moveToPantry(${realIndex})">
              <span class="material-icons-round" style="font-size:18px;">check</span>
            </div>

            <div>
              <div class="item-name ${item.checked ? 'checked-text' : ''}">${item.name}</div>
              <div class="item-meta">${item.category}</div>
            </div>

            <div class="item-price">$${item.price.toFixed(2)}</div>

            <div class="qty-controls">
              <div class="qty-btn" onclick="minus(${realIndex})">-</div>
              <div class="qty-number">${item.qty}</div>
              <div class="qty-btn" onclick="plus(${realIndex})">+</div>
            </div>

            <div class="delete-btn" onclick="removeItem(${realIndex})">
              <span class="material-icons-round">delete</span>
            </div>
          </div>
        `;
      });
    });

    document.getElementById("list").innerHTML = html;
    document.getElementById("total").innerText = "$" + total.toFixed(2);
  }

  function plus(i) {
    items[i].qty++;
    save();
    render();
    showToast("Grocery list updated");
  }

  function minus(i) {
    if (items[i].qty > 0) items[i].qty--;
    save();
    render();
    showToast("Grocery list updated");
  }

  function removeItem(i) {
    items.splice(i, 1);
    save();
    render();
    showToast("Item removed");
  }

  function openModal() {
    document.getElementById("modal").style.display = "flex";
  }

  function closeModal() {
    document.getElementById("modal").style.display = "none";
  }

  function addItem() {
    let name = document.getElementById("name").value.trim();
    let category = document.getElementById("category").value.trim();
    let price = parseFloat(document.getElementById("price").value);
    let qty = parseInt(document.getElementById("qty").value);

    if (!name || !category || isNaN(price) || isNaN(qty)) {
      alert("Fill everything");
      return;
    }

    items.push({name, category, price, qty, checked:false});

    document.getElementById("name").value = "";
    document.getElementById("category").value = "";
    document.getElementById("price").value = "";
    document.getElementById("qty").value = "";

    save();
    closeModal();
    render();
    showToast("Item added");
  }

  /* =========================================
     MOVE ITEM TO PANTRY
     Option B:
     - add to pantry
     - remove from grocery
     ========================================= */
  function moveToPantry(index) {
    const groceryItem = items[index];

    let pantryItems = JSON.parse(localStorage.getItem(PANTRY_KEY)) || [];

    /* convert grocery item into pantry shape */
    const pantryIndex = pantryItems.findIndex(item => item.name === groceryItem.name);

    if (pantryIndex !== -1) {
      pantryItems[pantryIndex].qty += groceryItem.qty;
    } else {
      pantryItems.push({
        name: groceryItem.name,
        sub: groceryItem.category,
        qty: groceryItem.qty
      });
    }

    /* save pantry */
    localStorage.setItem(PANTRY_KEY, JSON.stringify(pantryItems));

    /* remove from grocery */
    items.splice(index, 1);
    save();
    render();

    showToast("Moved to Pantry");
  }

  document.addEventListener("click", function(event) {
    const menu = document.getElementById("filterMenu");
    const button = document.getElementById("filterBtn");

    if (!menu.contains(event.target) && !button.contains(event.target)) {
      menu.style.display = "none";
    }
  });

  updateFilterUI();
  render();
</script>

</body>
</html>