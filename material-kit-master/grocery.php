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
    :root {
      --primary:   #B85042;
      --secondary: #E7E8D1;
      --accent:    #A7BEAE;
      --dark:      #344767;
      --text:      #7b809a;
      --bg:        #f8f9fa;
    }

  body {
    font-family: 'Roboto', sans-serif;
    background-color: var(--bg);
    padding-bottom: 95px;
  }

  .app-shell {
    max-width: 820px;
    margin: auto;
    padding: 24px;
  }

  /* ── Sticky app header ── */
  .app-header {
    background: #fff;
    border-bottom: 1px solid #e9ecef;
    padding: 18px 20px 14px;
    position: sticky;
    top: 0;
    z-index: 100;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .page-title {
    font-size: 2rem;
    font-weight: 800;
    color: #2e7d32;
    margin: 0;
  }

  .page-subtitle {
    margin-top: 4px;
    font-size: 0.9rem;
    color: var(--text);
  }

  .top-actions {
    display: flex;
    align-items: center;
    gap: 14px;
  }

  .icon-action {
    text-align: center;
    font-size: 0.72rem;
    color: var(--dark);
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
    color: var(--text);
    font-size: 0.9rem;
  }

  .helper-link {
    background: #eef2f7;
    color: var(--dark);
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
    color: var(--dark);
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
    color: var(--dark);
    position: relative;
  }

  .filter-btn.active::after {
    content: "";
    width: 10px;
    height: 10px;
    background: var(--primary);
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
    color: var(--dark);
    font-size: 0.95rem;
  }

  .filter-option:hover {
    background: #f5f7fa;
  }

  .filter-option.selected {
    background: #eef2f7;
    color: var(--primary);
    font-weight: 600;
  }

  .section-title {
    margin-top: 24px;
    margin-bottom: 10px;
    font-size: 1rem;
    font-weight: 700;
    color: var(--text);
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
    background: var(--dark);
    border-color: var(--dark);
  }

  .item-name {
    font-weight: 600;
    color: var(--dark);
    font-size: 1rem;
    line-height: 1.2;
  }

  .item-meta {
    margin-top: 4px;
    font-size: 0.8rem;
    color: var(--text);
  }

  .checked-text {
    text-decoration: line-through;
    color: #9aa2b1;
  }

  .item-price {
    text-align: center;
    font-weight: 600;
    color: var(--dark);
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
    color: var(--dark);
  }

  .qty-number {
    min-width: 16px;
    text-align: center;
    font-weight: 600;
    color: var(--dark);
  }

  .delete-btn {
    cursor: pointer;
    color: var(--primary);
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
    color: var(--text);
    font-size: 0.95rem;
  }

  .total-value {
    margin-top: 6px;
    font-size: 1.45rem;
    font-weight: 700;
    color: var(--dark);
  }

  .empty-message {
    margin-top: 18px;
    background: white;
    border-radius: 18px;
    padding: 20px;
    color: var(--text);
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
    width: 520px;
    max-width: 94%;
    max-height: 88vh;
    border-radius: 18px;
    padding: 0;
    box-shadow: 0 12px 30px rgba(0,0,0,0.18);
    display: flex;
    flex-direction: column;
    overflow: hidden;
  }

  .modal-header {
    padding: 22px 24px 0;
    flex-shrink: 0;
  }

  .modal-search {
    margin: 14px 24px 0;
    flex-shrink: 0;
  }

  #popupIngredientList {
    flex: 1;
    overflow-y: auto;
    padding: 4px 24px 8px;
    min-height: 0;
  }

  .popup-actions {
    padding: 16px 24px 20px;
    border-top: 1px solid #f0f2f5;
    flex-shrink: 0;
  }

  @media (max-width: 600px) {
    .modal {
      align-items: flex-end;
    }
    .modal-box {
      max-width: 100%;
      width: 100%;
      max-height: 82vh;
      border-radius: 20px 20px 0 0;
    }
  }

  .modal-title {
    margin: 0 0 16px 0;
    font-size: 1.6rem;
    font-weight: 700;
    color: var(--dark);
  }

  /* popup-btn kept from pantry-style */

  .popup-btn {
    border: none;
    background: #eef2f7;
    color: var(--dark);
    border-radius: 14px;
    padding: 12px 22px;
    font-weight: 600;
    cursor: pointer;
  }

  .popup-btn.primary {
    background: var(--dark);
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
    box-shadow: 0 -2px 10px rgba(0,0,0,0.06);
  }

  .bottom-nav a {
    flex: 1;
    text-align: center;
    font-size: 0.55rem;
    color: var(--text);
    text-decoration: none;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .bottom-nav .material-icons-round {
    font-size: 1.4rem;
  }

  .bottom-nav a.active {
    color: var(--primary);
  }

  .toast {
    position: fixed;
    top: 20px;
    right: 20px;
    background: var(--dark);
    color: white;
    padding: 12px 16px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    display: none;
    z-index: 800;
    font-size: 0.9rem;
    font-weight: 600;
  }

  @media (max-width: 600px) {
    .app-shell {
      padding: 14px;
    }
    .grocery-card {
      grid-template-columns: 36px 1fr 36px;
      grid-template-rows: auto auto;
    }
    .grocery-card .item-price {
      display: none;
    }
    .grocery-card .qty-controls {
      grid-column: 3;
      grid-row: 1 / 3;
      flex-direction: column;
      gap: 4px;
    }
    .grocery-card .delete-btn {
      grid-column: 1;
      grid-row: 2;
    }
    .page-title {
      font-size: 1.6rem;
    }
  }


  /* ── Popup ingredient list ── */
  .popup-category-label {
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.07em;
    color: var(--text);
    margin: 14px 0 6px;
  }

  .ingredient-row {
    display: grid;
    grid-template-columns: 30px 28px 30px 1fr 64px;
    align-items: center;
    gap: 6px;
    margin-bottom: 10px;
  }

  .ingredient-btn {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    border: none;
    background: #eef2f7;
    cursor: pointer;
    font-weight: 700;
    font-size: 1rem;
    color: var(--dark);
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .ingredient-count {
    text-align: center;
    font-weight: 700;
    font-size: 1rem;
    color: var(--dark);
  }

  .ingredient-name {
    font-size: 0.92rem;
    color: var(--dark);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .unit-input {
    border: 1px solid #e9ecef;
    border-radius: 8px;
    background: #eef2f7;
    padding: 4px 6px;
    font-size: 0.78rem;
    color: var(--text);
    width: 100%;
    outline: none;
    text-align: center;
  }

  .unit-input:focus {
    border-color: var(--primary);
    color: var(--dark);
  }

</style>
</head>

<body>

<div class="toast" id="toastMessage"></div>

<div class="app-header">
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

<div class="app-shell">

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
      <div class="filter-option" id="filter-all"       onclick="setFilter('all')">All Items</div>
      <div class="filter-option" id="filter-unchecked"  onclick="setFilter('unchecked')">Unchecked Only</div>
      <div class="filter-option" id="filter-checked"    onclick="setFilter('checked')">Checked Only</div>
      <div class="filter-option" id="filter-Produce"    onclick="setFilter('Produce')">Produce</div>
      <div class="filter-option" id="filter-Proteins"   onclick="setFilter('Proteins')">Proteins</div>
      <div class="filter-option" id="filter-Grains"     onclick="setFilter('Grains')">Grains</div>
      <div class="filter-option" id="filter-Dairy"      onclick="setFilter('Dairy')">Dairy</div>
      <div class="filter-option" id="filter-Staples"    onclick="setFilter('Staples')">Staples</div>
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
    <div class="modal-header">
      <h2 class="modal-title">Add to Grocery List</h2>
      <button class="close-x" onclick="closeModal()">×</button>
    </div>

    <input
      class="modal-search"
      type="text"
      id="popupSearch"
      placeholder="Search ingredients..."
      oninput="renderPopupList()"
    >

    <div id="popupIngredientList"></div>

    <div class="popup-actions">
      <button class="popup-btn primary" onclick="addSelectedToGrocery()">Add Selected</button>
      <button class="popup-btn" onclick="closeModal()">Close</button>
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

  <a href="my-recipes.php">
    <span class="material-icons-round">menu_book</span>
    My Recipes
  </a>

  <a href="find-recipes.php">
    <span class="material-icons-round">search</span>
    Find Recipes
  </a>

  <a href="budget.php">
    <span class="material-icons-round">account_balance_wallet</span>
    Budget
  </a>

  <a href="grocery.php" class="active">
    <span class="material-icons-round">shopping_cart</span>
    Grocery List
  </a>
</nav>

<script>
  const KEY = "groceryItems_v5";
  const PANTRY_KEY = "pantryItems";

  const defaultItems = [
    {name:"Garlic",      category:"Produce",  unit:"bulb", price:0.50, qty:2, checked:false},
    {name:"Onions",      category:"Produce",  unit:"lb",   price:1.20, qty:1, checked:false},
    {name:"Ground Beef", category:"Proteins", unit:"lb",   price:5.00, qty:1, checked:false}
  ];

  let items = JSON.parse(localStorage.getItem(KEY)) || defaultItems;
  let currentFilter = "all";

  // ── Shared ingredient catalog ──────────────────────────────
  const INGREDIENT_CATALOG = [
    // Produce
    {name:"Avocado",          category:"Produce",  unit:"each",   price:1.50},
    {name:"Bell Pepper",      category:"Produce",  unit:"each",   price:1.29},
    {name:"Broccoli",         category:"Produce",  unit:"head",   price:1.99},
    {name:"Garlic",           category:"Produce",  unit:"bulb",   price:0.50},
    {name:"Green Onion",      category:"Produce",  unit:"bunch",  price:0.99},
    {name:"Lemon",            category:"Produce",  unit:"each",   price:0.79},
    {name:"Mushrooms",        category:"Produce",  unit:"lb",     price:2.99},
    {name:"Onions",           category:"Produce",  unit:"lb",     price:1.20},
    {name:"Spinach",          category:"Produce",  unit:"bag",    price:3.49},
    {name:"Tomatoes",         category:"Produce",  unit:"lb",     price:1.50},
    // Proteins
    {name:"Chicken Breast",   category:"Proteins", unit:"lb",     price:4.99},
    {name:"Eggs",             category:"Proteins", unit:"dozen",  price:3.99},
    {name:"Ground Beef",      category:"Proteins", unit:"lb",     price:5.00},
    {name:"Salmon",           category:"Proteins", unit:"lb",     price:8.99},
    {name:"Tuna",             category:"Proteins", unit:"can",    price:1.50},
    // Grains
    {name:"Basmati Rice",     category:"Grains",   unit:"cups",   price:1.20},
    {name:"Bread",            category:"Grains",   unit:"loaf",   price:2.99},
    {name:"Brown Rice",       category:"Grains",   unit:"cups",   price:0.90},
    {name:"Jasmine Rice",     category:"Grains",   unit:"cups",   price:1.00},
    {name:"Pasta",            category:"Grains",   unit:"box",    price:1.29},
    // Dairy
    {name:"Butter",           category:"Dairy",    unit:"stick",  price:1.50},
    {name:"Cheddar Cheese",   category:"Dairy",    unit:"block",  price:4.99},
    {name:"Greek Yogurt",     category:"Dairy",    unit:"cup",    price:1.49},
    {name:"Milk",             category:"Dairy",    unit:"gallon", price:3.49},
    // Staples
    {name:"Black Pepper",     category:"Staples",  unit:"jar",    price:2.49},
    {name:"Garlic Powder",    category:"Staples",  unit:"jar",    price:1.99},
    {name:"Olive Oil",        category:"Staples",  unit:"bottle", price:5.99},
    {name:"Salt",             category:"Staples",  unit:"box",    price:0.99},
    {name:"Soy Sauce",        category:"Staples",  unit:"bottle", price:2.99},
    {name:"Tomato Sauce",     category:"Staples",  unit:"can",    price:1.49},
  ];

  // Working copy for popup qty & editable units (reset each open)
  let popupSelections = [];


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
    if (type === "Produce")  showToast("Filter: Produce");
    if (type === "Proteins") showToast("Filter: Proteins");
    if (type === "Grains")   showToast("Filter: Grains");
    if (type === "Dairy")    showToast("Filter: Dairy");
    if (type === "Staples")  showToast("Filter: Staples");
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

    const CAT_FILTERS = new Set(["Produce","Proteins","Grains","Dairy","Staples"]);
    if (CAT_FILTERS.has(currentFilter)) {
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
              <div class="item-meta">${item.unit || item.category}</div>
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


  // ── Popup open/close ───────────────────────────────────────
  function openModal() {
    // Reset selections from catalog
    popupSelections = INGREDIENT_CATALOG.map(item => ({
      ...item, qty: 0
    }));
    renderPopupList();
    document.getElementById("modal").style.display = "flex";
    document.getElementById("popupSearch").value = "";
  }

  function closeModal() {
    document.getElementById("modal").style.display = "none";
  }

  // ── Render searchable ingredient list ─────────────────────
  function renderPopupList() {
    const list  = document.getElementById("popupIngredientList");
    const query = document.getElementById("popupSearch").value.toLowerCase().trim();

    const filtered = popupSelections.filter(item =>
      item.name.toLowerCase().includes(query) ||
      item.category.toLowerCase().includes(query)
    );

    if (filtered.length === 0) {
      list.innerHTML = '<div style="color:var(--text);font-size:0.85rem;padding:10px 0;">No ingredients found.</div>';
      return;
    }

    // Group by category
    const cats = [...new Set(filtered.map(i => i.category))];
    let html = "";
    cats.forEach(cat => {
      html += `<div class="popup-category-label">${cat}</div>`;
      filtered.filter(i => i.category === cat).forEach(item => {
        const idx = popupSelections.indexOf(item);
        html += `
          <div class="ingredient-row">
            <button class="ingredient-btn" onclick="changePopupQty(${idx},1)">+</button>
            <div class="ingredient-count">${item.qty}</div>
            <button class="ingredient-btn" onclick="changePopupQty(${idx},-1)">-</button>
            <div class="ingredient-name">${item.name}</div>
            <input class="unit-input" value="${item.unit}" onchange="popupSelections[${idx}].unit=this.value" title="Edit unit">
          </div>`;
      });
    });
    list.innerHTML = html;
  }

  function changePopupQty(idx, amount) {
    popupSelections[idx].qty = Math.max(0, popupSelections[idx].qty + amount);
    renderPopupList();
  }

  // ── Add selected to grocery list ──────────────────────────
  function addSelectedToGrocery() {
    let addedAny = false;
    popupSelections.forEach(sel => {
      if (sel.qty <= 0) return;
      const ei = items.findIndex(i => i.name === sel.name);
      if (ei !== -1) {
        items[ei].qty += sel.qty;
      } else {
        items.push({
          name: sel.name,
          category: sel.category,
          unit: sel.unit,
          price: sel.price,
          qty: sel.qty,
          checked: false
        });
      }
      addedAny = true;
    });
    save();
    render();
    closeModal();
    showToast(addedAny ? "Items added to grocery list" : "No items selected");
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
        category: groceryItem.category,
        sub: groceryItem.unit || groceryItem.category,
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
