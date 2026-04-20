<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Plan</title>

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

  .top-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
    margin-bottom: 18px;
  }

  .page-title {
    font-size: 2rem;
    font-weight: 800;
    color: var(--primary);
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
    margin-bottom: 16px;
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

  .week-bar {
    margin-bottom: 18px;
    background: white;
    border-radius: 18px;
    padding: 16px 18px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
  }

  .week-arrow {
    display: flex;
    align-items: center;
    gap: 6px;
    color: var(--dark);
    cursor: pointer;
    user-select: none;
    font-weight: 600;
  }

  .week-center {
    text-align: center;
  }

  .week-title {
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--dark);
  }

  .week-subtitle {
    font-size: 0.85rem;
    color: var(--text);
    margin-top: 2px;
  }

  .day-card {
    margin-top: 14px;
    background: white;
    border-radius: 18px;
    padding: 18px;
    display: grid;
    grid-template-columns: 120px 1fr 120px 44px;
    gap: 14px;
    align-items: center;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
  }

  .day-info {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .date-circle {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: #eef2f7;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    color: var(--dark);
  }

  .day-name {
    font-weight: 700;
    color: var(--dark);
    font-size: 1rem;
  }

  .meal-name {
    font-weight: 600;
    color: var(--dark);
    font-size: 1rem;
  }

  .meal-meta {
    margin-top: 4px;
    font-size: 0.82rem;
    color: var(--text);
  }

  .meal-empty {
    color: #9aa2b1;
    font-style: italic;
  }

  .plan-btn {
    border: none;
    background: #eef2f7;
    color: var(--dark);
    border-radius: 14px;
    padding: 10px 16px;
    font-weight: 600;
    cursor: pointer;
  }

  .plan-btn.primary {
    background: var(--dark);
    color: white;
  }

  .delete-btn {
    cursor: pointer;
    color: var(--primary);
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .summary-grid {
    margin-top: 22px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 14px;
  }

  .summary-card {
    background: white;
    border-radius: 18px;
    padding: 18px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
  }

  .summary-title {
    font-size: 0.9rem;
    color: var(--text);
    margin-bottom: 6px;
  }

  .summary-value {
    font-size: 1.35rem;
    font-weight: 700;
    color: var(--dark);
  }

  .summary-subtext {
    margin-top: 6px;
    font-size: 0.82rem;
    color: var(--text);
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

  .empty-message {
    margin-top: 18px;
    background: white;
    border-radius: 18px;
    padding: 20px;
    color: var(--text);
    text-align: center;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
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

  @media (max-width: 900px) {
    .day-card {
      grid-template-columns: 1fr;
      gap: 12px;
    }

    .summary-grid {
      grid-template-columns: 1fr;
    }

    .week-bar {
      flex-direction: column;
      gap: 10px;
    }
  }
</style>
</head>

<body>

<div class="toast" id="toastMessage"></div>

<div class="app-shell">

  <div class="top-row">
    <div>
      <h1 class="page-title">My Plan</h1>
      <div class="page-subtitle">Plan your meals for the week</div>
    </div>

    <div class="top-actions">
      <div class="icon-action" onclick="goPickRecipe(0)">
        <span class="material-icons-round">add_circle</span>
        Add Meal
      </div>
    </div>
  </div>

  <div class="helper-card">
    <div class="helper-text">Need meal ideas before planning your week?</div>
    <a class="helper-link" href="find-recipes.php">Go to Find Recipes</a>
  </div>

  <div class="week-bar">
    <div class="week-arrow" onclick="changeWeek(-1)">
      <span class="material-icons-round">chevron_left</span>
      Previous Week
    </div>

    <div class="week-center">
      <div class="week-title" id="weekTitle">Monday 22 - Sunday 28</div>
      <div class="week-subtitle">Weekly meal plan overview</div>
    </div>

    <div class="week-arrow" onclick="changeWeek(1)">
      Next Week
      <span class="material-icons-round">chevron_right</span>
    </div>
  </div>

  <div id="planList"></div>

  <div class="summary-grid">
    <div class="summary-card">
      <div class="summary-title">Meals Planned</div>
      <div class="summary-value" id="plannedCount">0</div>
      <div class="summary-subtext">number of days with meals</div>
    </div>

    <div class="summary-card">
      <div class="summary-title">Estimated Calories</div>
      <div class="summary-value" id="totalCalories">0</div>
      <div class="summary-subtext">weekly total</div>
    </div>

    <div class="summary-card">
      <div class="summary-title">Estimated Cost</div>
      <div class="summary-value" id="totalCost">$0</div>
      <div class="summary-subtext">based on meals added</div>
    </div>
  </div>

</div>

<nav class="bottom-nav">
  <a href="index.php">
    <span class="material-icons-round">home</span>
    Home
  </a>

  <a href="myplan.php" class="active">
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

  <a href="grocery.php">
    <span class="material-icons-round">shopping_cart</span>
    Grocery List
  </a>
</nav>

<script>
  const RECIPE_DATA = {
    'Avocado Toast':    { time: 8,  cal: 290, cost: 3.50 },
    'Asparagus Soup':   { time: 35, cal: 180, cost: 5.00 },
    'Bean Tacos':       { time: 20, cal: 340, cost: 7.00 },
    'Caesar Salad':     { time: 15, cal: 320, cost: 6.00 },
    'Chicken Rice':     { time: 30, cal: 480, cost: 12.00 },
    'Egg Fried Rice':   { time: 15, cal: 380, cost: 8.00 },
    'Greek Salad':      { time: 10, cal: 220, cost: 5.00 },
    'Grilled Corn':     { time: 20, cal: 200, cost: 4.00 },
    'Lentil Stew':      { time: 40, cal: 290, cost: 6.00 },
    'Mushroom Pasta':   { time: 25, cal: 510, cost: 9.00 },
    'Omelette':         { time: 10, cal: 280, cost: 4.00 },
    'Pasta Primavera':  { time: 25, cal: 420, cost: 8.00 },
    'Pea Risotto':      { time: 40, cal: 520, cost: 11.00 },
    'Peanut Noodles':   { time: 15, cal: 380, cost: 7.00 },
    'Quesadilla':       { time: 12, cal: 430, cost: 6.00 },
    'Rice & Beans':     { time: 30, cal: 320, cost: 5.00 },
    'Spring Pasta':     { time: 25, cal: 490, cost: 9.00 },
    'Strawberry Salad': { time: 10, cal: 160, cost: 5.00 },
    'Tomato Soup':      { time: 25, cal: 210, cost: 5.00 },
    'Tuna Wrap':        { time: 10, cal: 310, cost: 6.00 },
    'Veggie Soup':      { time: 35, cal: 180, cost: 5.00 },
    'Veggie Stir Fry':  { time: 20, cal: 310, cost: 7.00 },
  };

  const PLAN_KEY = "myPlanItems_v2";

  const defaultPlan = [
    { day: "Mon", date: 22, meal: "Chicken Rice", time: 30, calories: 480, cost: 12 },
    { day: "Tue", date: 23, meal: "", time: "", calories: "", cost: "" },
    { day: "Wed", date: 24, meal: "", time: "", calories: "", cost: "" },
    { day: "Thu", date: 25, meal: "", time: "", calories: "", cost: "" },
    { day: "Fri", date: 26, meal: "", time: "", calories: "", cost: "" },
    { day: "Sat", date: 27, meal: "", time: "", calories: "", cost: "" },
    { day: "Sun", date: 28, meal: "", time: "", calories: "", cost: "" }
  ];

  let planItems = JSON.parse(localStorage.getItem(PLAN_KEY)) || defaultPlan;
  let weekStart = 22;

  function savePlan() {
    localStorage.setItem(PLAN_KEY, JSON.stringify(planItems));
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

  function renderPlan() {
    const container = document.getElementById("planList");
    let html = "";

    if (planItems.length === 0) {
      container.innerHTML = `
        <div class="empty-message">
          No meals planned yet. Add a meal to get started.
        </div>
      `;
      updateSummary();
      return;
    }

    planItems.forEach((item, index) => {
      html += `
        <div class="day-card">
          <div class="day-info">
            <div class="date-circle">${item.date}</div>
            <div class="day-name">${item.day}</div>
          </div>

          <div>
            ${
              item.meal
                ? `
                  <div class="meal-name">${item.meal}</div>
                  <div class="meal-meta">${item.time} mins &nbsp;·&nbsp; ${item.calories} cal &nbsp;·&nbsp; $${item.cost}</div>
                `
                : `
                  <div class="meal-name meal-empty">No meal planned</div>
                  <div class="meal-meta">Click add meal to plan this day</div>
                `
            }
          </div>

          <div>
            ${
              item.meal
                ? `<button class="plan-btn" onclick="${pendingRecipe ? 'addPendingToDay(' + index + ')' : 'goPickRecipe(' + index + ')'}">${pendingRecipe ? 'Add Here' : 'Edit Meal'}</button>`
                : `<button class="plan-btn primary" onclick="${pendingRecipe ? 'addPendingToDay(' + index + ')' : 'goPickRecipe(' + index + ')'}">${pendingRecipe ? 'Add Here' : 'Add Meal'}</button>`
            }
          </div>

          <div class="delete-btn" onclick="removeMeal(${index})">
            <span class="material-icons-round">delete</span>
          </div>
        </div>
      `;
    });

    container.innerHTML = html;
    updateSummary();
  }

  function updateSummary() {
    let plannedCount = 0;
    let totalCalories = 0;
    let totalCost = 0;

    planItems.forEach(item => {
      if (item.meal) {
        plannedCount++;
        totalCalories += Number(item.calories || 0);
        totalCost += Number(item.cost || 0);
      }
    });

    document.getElementById("plannedCount").innerText = plannedCount;
    document.getElementById("totalCalories").innerText = totalCalories;
    document.getElementById("totalCost").innerText = "$" + totalCost.toFixed(2);
  }

  function goPickRecipe(index) {
    const item = planItems[index];
    window.location.href = 'my-recipes.php?day=' + index
      + '&dayName=' + encodeURIComponent(item.day)
      + '&date=' + encodeURIComponent(item.date);
  }

  function addPendingToDay(index) {
    if (!pendingRecipe) return;
    const rd       = RECIPE_DATA[pendingRecipe] || {};
    const wasEmpty = !planItems[index].meal;

    planItems[index].meal     = pendingRecipe;
    planItems[index].time     = rd.time  ?? planItems[index].time     ?? '–';
    planItems[index].calories = rd.cal   ?? planItems[index].calories ?? '–';
    planItems[index].cost     = rd.cost  ?? planItems[index].cost     ?? '–';

    savePlan();
    pendingRecipe = null;
    window.history.replaceState({}, '', 'myplan.php');
    renderPlan();
    const item = planItems[index];
    showToast((wasEmpty ? 'Added to ' : 'Updated ') + item.day + ', ' + item.date);
  }

  function removeMeal(index) {
    if (!planItems[index].meal) {
      showToast("No meal to remove");
      return;
    }

    planItems[index].meal     = "";
    planItems[index].time     = "";
    planItems[index].calories = "";
    planItems[index].cost     = "";

    savePlan();
    renderPlan();
    showToast("Meal removed");
  }

  function changeWeek(direction) {
    weekStart += (direction * 7);

    planItems.forEach((item, index) => {
      item.date = weekStart + index;
    });

    const weekEnd = weekStart + 6;
    document.getElementById("weekTitle").innerText = `Monday ${weekStart} - Sunday ${weekEnd}`;

    savePlan();
    renderPlan();
    showToast("Week changed");
  }

  let pendingRecipe = null;

  (function handleIncomingRecipe() {
    const params     = new URLSearchParams(window.location.search);
    const recipeName = params.get('add');
    const dayIndex   = params.get('day');

    if (!recipeName) return;

    window.history.replaceState({}, '', 'myplan.php');

    const name = decodeURIComponent(recipeName);
    const rd   = RECIPE_DATA[name] || {};

    if (dayIndex !== null) {
      const idx = parseInt(dayIndex, 10);
      if (idx >= 0 && idx < planItems.length) {
        const wasEmpty = !planItems[idx].meal;
        planItems[idx].meal     = name;
        planItems[idx].time     = rd.time  ?? planItems[idx].time     ?? '–';
        planItems[idx].calories = rd.cal   ?? planItems[idx].calories ?? '–';
        planItems[idx].cost     = rd.cost  ?? planItems[idx].cost     ?? '–';
        savePlan();
        const item = planItems[idx];
        setTimeout(() => showToast(
          (wasEmpty ? 'Added to ' : 'Updated ') + item.day + ', ' + item.date
        ), 300);
      }
    } else {
      pendingRecipe = name;
    }
  })();

  document.getElementById("weekTitle").innerText = `Monday ${weekStart} - Sunday ${weekStart + 6}`;
  renderPlan();

  if (pendingRecipe) {
    const banner = document.createElement('div');
    banner.style.cssText = 'background:#344767;color:#fff;padding:12px 20px;text-align:center;font-size:0.88rem;font-weight:600;margin-bottom:16px;border-radius:12px;';
    banner.textContent = 'Select a day to add "' + pendingRecipe + '"';
    document.getElementById('planList').insertAdjacentElement('beforebegin', banner);
  }
</script>

</body>
</html>
