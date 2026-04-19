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
  /* =========================
     WHOLE PAGE
     ========================= */
  body {
    background-color: #f8f9fa;
    padding-bottom: 90px; /* leaves room for bottom nav */
  }

  /* makes the page wider so it feels closer to dashboard */
  .app-shell {
    max-width: 700px;
    margin: auto;
    padding: 20px;
  }

  /* =========================
     TOP HEADER AREA
     ========================= */
  .page-title {
    font-size: 2rem;
    font-weight: 700;
    color: #344767;
  }

  .page-subtitle {
    margin-top: 4px;
    font-size: 0.9rem;
    color: #7b809a;
  }

  .top-actions {
    display: flex;
    gap: 20px;
    align-items: center;
  }

  .top-actions div {
    text-align: center;
    font-size: 0.7rem;
    cursor: pointer;
    color: #344767;
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
    background: #e74c3c;
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
    color: #344767;
    font-size: 0.95rem;
  }

  .filter-option:hover {
    background: #f5f7fa;
  }

  .filter-option.selected {
    background: #eef2f7;
    font-weight: 600;
    color: #e74c3c;
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
    color: #344767;
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
    color: #e74c3c;
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
    color: #67748e;
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
    color: #7b809a;
    font-size: 0.55rem;
    flex: 1;
  }

  .bottom-nav .material-icons-round {
    font-size: 1.4rem;
  }

  .bottom-nav a.active {
    color: #e74c3c;
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
    max-width: 92%;
    border-radius: 18px;
    padding: 28px 26px 24px;
    box-shadow: 0 12px 30px rgba(0,0,0,0.18);
  }

  .modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 18px;
  }

  .modal-title {
    margin: 0;
    font-size: 2rem;
    font-weight: 700;
    color: #344767;
  }

  .close-x {
    border: none;
    background: transparent;
    font-size: 2rem;
    cursor: pointer;
    color: #344767;
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
    color: #344767;
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
    color: #344767;
  }

  .ingredient-count {
    text-align: center;
    font-weight: 600;
  }

  .popup-actions {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-top: 28px;
  }

  .popup-btn {
    border: none;
    background: #eef2f7;
    color: #344767;
    border-radius: 14px;
    padding: 12px 22px;
    font-weight: 600;
    cursor: pointer;
  }

  .popup-btn.primary {
    background: #344767;
    color: white;
  }

  /* toast */
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

  <div style="display:flex; justify-content:space-between; align-items:center;">
    <div>
      <div class="page-title">My Pantry</div>
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
      <div class="filter-option" id="filter-all" onclick="setFilter('all')">All Items</div>
      <div class="filter-option" id="filter-low" onclick="setFilter('low')">Low Stock</div>
      <div class="filter-option" id="filter-high" onclick="setFilter('high')">High Quantity</div>
      <div class="filter-option" id="filter-az" onclick="setFilter('az')">A–Z</div>
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
    {name:"Chicken breast", sub:"1 lb", qty:2},
    {name:"Rice", sub:"5 cups", qty:4},
    {name:"Soy sauce", sub:"Bottle", qty:1},
    {name:"Ground Beef", sub:"2 lb", qty:1},
    {name:"Garlic", sub:"3 cloves", qty:3},
    {name:"Onions", sub:"2", qty:2}
  ];

  let items = JSON.parse(localStorage.getItem("pantryItems")) || defaultItems;
  let currentFilter = "all";

  let popupIngredients = [
    {name:"Jasmine Rice", sub:"Cups", qty:0},
    {name:"Basmati Rice", sub:"Cups", qty:1},
    {name:"Brown Rice", sub:"Cups", qty:0},
    {name:"Green Onion", sub:"Bunch", qty:0},
    {name:"Olive Oil", sub:"Bottle", qty:0}
  ];

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

    if (filterType === "all") showToast("Showing all pantry items");
    if (filterType === "low") showToast("Filter applied: Low Stock");
    if (filterType === "high") showToast("Filter applied: High Quantity");
    if (filterType === "az") showToast("Filter applied: A–Z");
  }

  function render() {
    const pantryList = document.getElementById("pantryList");
    const searchText = document.getElementById("pantrySearch").value.toLowerCase().trim();

    let filteredItems = items.filter(item =>
      item.name.toLowerCase().includes(searchText)
    );

    if (currentFilter === "low") {
      filteredItems = filteredItems.filter(item => item.qty <= 1);
    }

    if (currentFilter === "high") {
      filteredItems = filteredItems.filter(item => item.qty >= 3);
    }

    if (currentFilter === "az") {
      filteredItems = [...filteredItems].sort((a, b) => a.name.localeCompare(b.name));
    }

    let html = "";

    if (filteredItems.length === 0) {
      html = `
        <div class="empty-message">
          No ingredients found. Try another search or filter.
        </div>
      `;
    } else {
      filteredItems.forEach((item) => {
        const realIndex = items.findIndex(realItem =>
          realItem.name === item.name && realItem.sub === item.sub
        );

        html += `
          <div class="pantry-card">
            <div>
              <div class="item-name">${item.name}</div>
              <div class="item-sub">${item.sub}</div>
              ${item.qty <= 1 ? '<div class="low-stock">Low stock</div>' : ''}
            </div>

            <div class="qty-controls">
              <div class="qty-btn" onclick="decrease(${realIndex})">-</div>
              <div class="qty-number">${item.qty}</div>
              <div class="qty-btn" onclick="increase(${realIndex})">+</div>
            </div>
          </div>
        `;
      });
    }

    pantryList.innerHTML = html;
  }

  function increase(i) {
    items[i].qty++;
    savePantry();
    render();
    showToast("Pantry updated");
  }

  function decrease(i) {
    if (items[i].qty > 0) {
      items[i].qty--;
    }
    savePantry();
    render();
    showToast("Pantry updated");
  }

  function openModal() {
    document.getElementById("modal").style.display = "flex";
    renderPopupList();
  }

  function closeModal() {
    document.getElementById("modal").style.display = "none";
  }

  function renderPopupList() {
    const popupList = document.getElementById("popupIngredientList");
    const popupSearchText = document.getElementById("popupSearch").value.toLowerCase().trim();

    const filteredPopupItems = popupIngredients.filter(item =>
      item.name.toLowerCase().includes(popupSearchText)
    );

    let html = "";

    filteredPopupItems.forEach((item) => {
      const realIndex = popupIngredients.findIndex(realItem =>
        realItem.name === item.name && realItem.sub === item.sub
      );

      html += `
        <div class="ingredient-row">
          <button class="ingredient-btn" onclick="changePopupQty(${realIndex}, 1)">+</button>
          <div class="ingredient-count" id="popupQty${realIndex}">${item.qty}</div>
          <button class="ingredient-btn" onclick="changePopupQty(${realIndex}, -1)">-</button>
          <div>${item.name} (${item.sub})</div>
        </div>
      `;
    });

    popupList.innerHTML = html;
  }

  function changePopupQty(index, amount) {
    popupIngredients[index].qty += amount;

    if (popupIngredients[index].qty < 0) {
      popupIngredients[index].qty = 0;
    }

    renderPopupList();
  }

  function addSelectedIngredients() {
    let addedAny = false;

    popupIngredients.forEach(popupItem => {
      if (popupItem.qty > 0) {
        const existingIndex = items.findIndex(item => item.name === popupItem.name);

        if (existingIndex !== -1) {
          items[existingIndex].qty += popupItem.qty;
        } else {
          items.push({
            name: popupItem.name,
            sub: popupItem.sub,
            qty: popupItem.qty
          });
        }

        popupItem.qty = 0;
        addedAny = true;
      }
    });

    savePantry();
    render();
    renderPopupList();
    closeModal();

    if (addedAny) {
      showToast("Ingredients added to pantry");
    } else {
      showToast("No ingredients selected");
    }
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
