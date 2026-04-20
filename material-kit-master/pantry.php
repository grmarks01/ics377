<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Pantry</title>

<!-- Google font -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

<!-- Google material icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

<!-- Main template CSS -->
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

  /* =========================
     WHOLE PAGE
     ========================= */
  body {
    font-family: 'Roboto', sans-serif;
    background-color: var(--bg);
    padding-bottom: 90px; /* leaves room for bottom nav */
  }

  /* makes the page wider so it feels closer to dashboard */
  .app-shell {
    max-width: 700px;
    margin: auto;
    padding: 20px;
  }

  /* ── Sticky app header ── */
  .app-header {
    background: #fff;
    border-bottom: 1px solid #e9ecef;
    padding: 22px 16px 18px;
    position: sticky;
    top: 0;
    z-index: 100;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
  }

  /* =========================
     TOP HEADER AREA
     ========================= */
  .page-title {
    font-size: 2.1rem;
    font-weight: 800;
    color: var(--primary);
    margin: 0;
  }

  .page-subtitle {
    margin-top: 3px;
    font-size: 0.85rem;
    color: var(--text);
  }

  .top-actions {
    display: flex;
    gap: 20px;
    align-items: center;
    flex-shrink: 0;
  }

  .top-actions div {
    text-align: center;
    font-size: 0.7rem;
    cursor: pointer;
    color: var(--dark);
  }

  @media (max-width: 600px) {
    .app-shell { padding: 14px; }
    .page-title { font-size: 1.7rem; }
    .pantry-card { flex-direction: column; align-items: flex-start; gap: 10px; }
    .qty-controls { align-self: flex-end; }
  }

  /* helper card */
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

  /* =========================
     SEARCH BAR
     ========================= */
  .search-wrapper {
    margin-top: 16px;
    display: flex;
    gap: 10px;
    position: relative;
  }

  .search-wrapper input {
    flex: 1;
    border-radius: 30px;
    border: none;
    padding: 12px 16px;
    background: #eef2f7;
    outline: none;
  }

  .filter-btn {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: #eef2f7;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
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

  /* =========================
     FILTER DROPDOWN MENU
     ========================= */
  .filter-menu {
    position: absolute;
    top: 55px;
    right: 0;
    width: 190px;
    background: white;
    border-radius: 14px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    padding: 8px 0;
    display: none;
    z-index: 300;
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
    font-weight: 600;
    color: var(--primary);
  }

  /* =========================
     PANTRY CARDS
     ========================= */
  .pantry-card {
    background: white;
    border-radius: 16px;
    padding: 16px;
    margin-top: 14px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
  }

  .item-name {
    font-weight: 600;
    color: var(--dark);
    font-size: 1.1rem;
  }

  .item-sub {
    font-size: 0.85rem;
    color: gray;
  }

  .low-stock {
    display: inline-block;
    margin-top: 6px;
    padding: 4px 8px;
    border-radius: 12px;
    background: #fce4e1;
    color: var(--primary);
    font-size: 0.7rem;
    font-weight: 600;
  }

  .qty-controls {
    display: flex;
    align-items: center;
    gap: 12px;
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
  }

  .qty-number {
    font-weight: 600;
    min-width: 16px;
    text-align: center;
  }

  .empty-message {
    margin-top: 18px;
    background: white;
    border-radius: 16px;
    padding: 18px;
    color: var(--text);
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    text-align: center;
  }

  /* =========================
     BOTTOM NAV
     ========================= */
  .bottom-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: #fff;
    border-top: 1px solid #e9ecef;
    display: flex;
    justify-content: space-around;
    padding: 6px 0;
    z-index: 100;
    box-shadow: 0 -2px 10px rgba(0,0,0,0.06);
  }

  .bottom-nav a {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-decoration: none;
    color: var(--text);
    font-size: 0.55rem;
    flex: 1;
  }

  .bottom-nav .material-icons-round {
    font-size: 1.4rem;
  }

  .bottom-nav a.active {
    color: var(--primary);
  }

  /* =========================
     POPUP BACKGROUND
     ========================= */
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
    margin: 0;
    font-size: 2rem;
    font-weight: 700;
    color: var(--dark);
  }

  .close-x {
    border: none;
    background: transparent;
    font-size: 2rem;
    cursor: pointer;
    color: var(--dark);
    line-height: 1;
  }

  .modal-search {
    width: 100%;
    border: none;
    background: #eef2f7;
    border-radius: 16px;
    padding: 16px 18px;
    font-size: 1rem;
    margin-bottom: 22px;
    outline: none;
  }

  .ingredient-row {
    display: grid;
    grid-template-columns: 40px 40px 40px 1fr;
    align-items: center;
    gap: 8px;
    margin-bottom: 16px;
    color: var(--dark);
    font-size: 1.05rem;
  }

  .ingredient-btn {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: none;
    background: #eef2f7;
    cursor: pointer;
    font-weight: 700;
    color: var(--dark);
  }

  .ingredient-count {
    text-align: center;
    font-weight: 600;
  }


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

  /* toast */
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
    <h1 class="page-title">My Pantry</h1>
    <div class="page-subtitle">Track ingredients you already have at home</div>
  </div>
  <div class="top-actions">
    <div onclick="openModal()">
      <span class="material-icons-round">add_circle</span><br>
      Manual
    </div>
    <div onclick="qrScan()">
      <span class="material-icons-round">qr_code_scanner</span><br>
      QR
    </div>
  </div>
</div>

<div class="app-shell">

  <div class="helper-card">
    <div class="helper-text">Need to shop for missing ingredients?</div>
    <a class="helper-link" href="grocery.php">Go to Grocery List</a>
  </div>

  <div class="search-wrapper">
    <input
      type="text"
      id="pantrySearch"
      placeholder="Search Pantry..."
      oninput="render()"
    >

    <div class="filter-btn" id="filterBtn" title="Choose a filter" onclick="toggleFilterMenu()">
      <span class="material-icons-round">tune</span>
    </div>

    <div class="filter-menu" id="filterMenu">
      <div class="filter-option" id="filter-all"      onclick="setFilter('all')">All Items</div>
      <div class="filter-option" id="filter-low"      onclick="setFilter('low')">Low Stock</div>
      <div class="filter-option" id="filter-high"     onclick="setFilter('high')">High Quantity</div>
      <div class="filter-option" id="filter-az"       onclick="setFilter('az')">A–Z</div>
      <div class="filter-option" id="filter-Produce"  onclick="setFilter('Produce')">Produce</div>
      <div class="filter-option" id="filter-Proteins" onclick="setFilter('Proteins')">Proteins</div>
      <div class="filter-option" id="filter-Grains"   onclick="setFilter('Grains')">Grains</div>
      <div class="filter-option" id="filter-Dairy"    onclick="setFilter('Dairy')">Dairy</div>
      <div class="filter-option" id="filter-Staples"  onclick="setFilter('Staples')">Staples</div>
    </div>
  </div>

  <div id="pantryList"></div>
</div>

<div class="modal" id="modal">
  <div class="modal-box">

    <div class="modal-header">
      <h2 class="modal-title">Add Ingredient</h2>
      <button class="close-x" onclick="closeModal()">×</button>
    </div>

    <input
      class="modal-search"
      type="text"
      id="popupSearch"
      placeholder="Search Ingredient..."
      oninput="renderPopupList()"
    >

    <div id="popupIngredientList"></div>

    <div class="popup-actions">
      <button class="popup-btn primary" onclick="addSelectedIngredients()">Add Selected</button>
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

  <a href="pantry.php" class="active">
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

  <a href="grocery.php">
    <span class="material-icons-round">shopping_cart</span>
    Grocery List
  </a>
</nav>

<script>
  const defaultItems = [
    {name:"Chicken Breast", category:"Proteins", sub:"lb",     qty:2},
    {name:"Jasmine Rice",   category:"Grains",   sub:"cups",   qty:4},
    {name:"Soy Sauce",      category:"Staples",  sub:"bottle", qty:1},
    {name:"Sesame Oil",     category:"Staples",  sub:"bottle", qty:1},
    {name:"Ground Beef",    category:"Proteins", sub:"lb",     qty:1},
    {name:"Eggs",           category:"Proteins", sub:"dozen",  qty:1},
    {name:"Frozen Peas",    category:"Produce",  sub:"bag",    qty:1},
    {name:"Garlic",         category:"Produce",  sub:"bulb",   qty:3},
    {name:"Onions",         category:"Produce",  sub:"lb",     qty:2}
  ];

  let items = JSON.parse(localStorage.getItem("pantryItems")) || defaultItems;
  let currentFilter = "all";

  // ── Normalize legacy / mis-spelled categories on load ──────
  const CATEGORY_MAP = {
    "veg": "Produce", "vegetable": "Produce", "vegetables": "Produce",
    "produce": "Produce", "fruit": "Produce", "fruits": "Produce",
    "protein": "Proteins", "proteins": "Proteins", "meat": "Proteins",
    "grain": "Grains", "grains": "Grains", "bread": "Grains",
    "dairy": "Dairy",
    "staple": "Staples", "staples": "Staples", "pantry": "Staples",
  };
  let normalizedAny = false;
  items.forEach(item => {
    const key = (item.category || "").toLowerCase().trim();
    if (CATEGORY_MAP[key] && item.category !== CATEGORY_MAP[key]) {
      item.category = CATEGORY_MAP[key];
      normalizedAny = true;
    } else if (!item.category) {
      item.category = "Staples"; // safe fallback
      normalizedAny = true;
    }
  });
  if (normalizedAny) localStorage.setItem("pantryItems", JSON.stringify(items));

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


  function savePantry() {
    localStorage.setItem("pantryItems", JSON.stringify(items));
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

  function updateFilterMenuUI() {
    document.querySelectorAll(".filter-option").forEach(option => {
      option.classList.remove("selected");
    });

    const selectedOption = document.getElementById("filter-" + currentFilter);
    if (selectedOption) {
      selectedOption.classList.add("selected");
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

  function setFilter(filterType) {
    currentFilter = filterType;
    document.getElementById("filterMenu").style.display = "none";
    updateFilterMenuUI();
    render();

    const labels = {
      all:"Showing all pantry items", low:"Filter: Low Stock",
      high:"Filter: High Quantity",   az:"Filter: A–Z",
      Produce:"Filter: Produce", Proteins:"Filter: Proteins",
      Grains:"Filter: Grains",   Dairy:"Filter: Dairy", Staples:"Filter: Staples"
    };
    showToast(labels[filterType] || "Filter applied");
  }

  function render() {
    const pantryList = document.getElementById("pantryList");
    const searchText = document.getElementById("pantrySearch").value.toLowerCase().trim();
    const CATS = ["Produce","Proteins","Grains","Dairy","Staples"];
    const catFilters = new Set(CATS);

    let filtered = items.filter(item =>
      item.name.toLowerCase().includes(searchText)
    );

    if (currentFilter === "low")  filtered = filtered.filter(i => i.qty <= 1);
    if (currentFilter === "high") filtered = filtered.filter(i => i.qty >= 3);
    if (catFilters.has(currentFilter)) filtered = filtered.filter(i => i.category === currentFilter);
    if (currentFilter === "az")   filtered = [...filtered].sort((a,b) => a.name.localeCompare(b.name));

    if (filtered.length === 0) {
      pantryList.innerHTML = `<div class="empty-message">No ingredients found. Try another search or filter.</div>`;
      return;
    }

    // Group by category (preserve order; flat A-Z skips grouping)
    let html = "";
    if (currentFilter === "az") {
      filtered.forEach(item => {
        const ri = items.findIndex(r => r.name === item.name && r.sub === item.sub);
        html += pantryCardHTML(item, ri);
      });
    } else {
      const groups = currentFilter !== "all" && catFilters.has(currentFilter)
        ? [currentFilter]
        : [...new Set(filtered.map(i => i.category || "Other"))];
      groups.forEach(cat => {
        const inCat = filtered.filter(i => (i.category || "Other") === cat);
        if (inCat.length === 0) return;
        html += `<div class="section-title">${cat}</div>`;
        inCat.forEach(item => {
          const ri = items.findIndex(r => r.name === item.name && r.sub === item.sub);
          html += pantryCardHTML(item, ri);
        });
      });
    }

    pantryList.innerHTML = html;
  }

  function pantryCardHTML(item, ri) {
    return `
      <div class="pantry-card">
        <div>
          <div class="item-name">${item.name}</div>
          <div class="item-sub">${item.sub}</div>
          ${item.qty <= 1 ? '<div class="low-stock">Low stock</div>' : ''}
        </div>
        <div class="qty-controls">
          <div class="qty-btn" onclick="decrease(${ri})">-</div>
          <div class="qty-number">${item.qty}</div>
          <div class="qty-btn" onclick="increase(${ri})">+</div>
        </div>
      </div>`;
  }

  function increase(i) {
    items[i].qty++;
    savePantry();
    render();
    showToast("Pantry updated");
  }

  function decrease(i) {
    if (items[i].qty > 1) {
      items[i].qty--;
      savePantry();
      render();
      showToast("Pantry updated");
    } else if (items[i].qty === 1) {
      const name = items[i].name;
      items.splice(i, 1);
      savePantry();
      render();
      showToast(`${name} removed from pantry`);
    }
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

  // ── Add selected to pantry ────────────────────────────────
  function addSelectedIngredients() {
    let addedAny = false;
    popupSelections.forEach(sel => {
      if (sel.qty <= 0) return;
      const ei = items.findIndex(i => i.name === sel.name);
      if (ei !== -1) {
        items[ei].qty += sel.qty;
      } else {
        items.push({ name:sel.name, category:sel.category, sub:sel.unit, qty:sel.qty });
      }
      addedAny = true;
    });
    savePantry();
    render();
    closeModal();
    showToast(addedAny ? "Ingredients added to pantry" : "No ingredients selected");
  }

  function qrScan() {
    showToast("QR Scanner Prototype");
  }

  document.addEventListener("click", function(event) {
    const filterMenu = document.getElementById("filterMenu");
    const filterButton = document.querySelector(".filter-btn");

    if (!filterMenu.contains(event.target) && !filterButton.contains(event.target)) {
      filterMenu.style.display = "none";
    }
  });

  updateFilterMenuUI();
  render();
  renderPopupList();
</script>

</body>
</html>
