<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Budget Tracker</title>

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
    background-color: var(--bg);
    padding-bottom: 95px;
    font-family: 'Roboto', sans-serif;
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
    font-weight: 800;
    color: var(--primary);
    margin: 0;
  }

  .page-subtitle {
    margin-top: 4px;
    font-size: 0.9rem;
    color: var(--text);
  }

  .helper-card {
    background: white;
    border-radius: 16px;
    padding: 14px 16px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 14px;
    margin-bottom: 20px;
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

  .budget-overview {
    background: white;
    border-radius: 18px;
    padding: 24px;
    margin-bottom: 20px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
    text-align: center;
  }

  .budget-label {
    font-size: 0.9rem;
    color: var(--text);
    margin-bottom: 8px;
  }

  .budget-amount {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--dark);
    margin-bottom: 12px;
  }

  .budget-status {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 16px;
  }

  .status-over  { color: #e74c3c; }
  .status-under { color: #2ecc71; }
  .status-even  { color: var(--text); }

  .progress-bar {
    width: 100%;
    height: 12px;
    background: #f0f2f5;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 8px;
  }

  .progress-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--primary), #962f22);
    border-radius: 10px;
    transition: width 0.3s ease;
  }

  .progress-fill.over { background: linear-gradient(90deg, #e74c3c, #c0392b); }

  .progress-text {
    font-size: 0.85rem;
    color: var(--text);
  }

  .budget-input-row {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin-top: 14px;
  }

  .budget-input-label {
    font-size: 0.85rem;
    color: var(--text);
    font-weight: 500;
  }

  .budget-input {
    width: 90px;
    border: 2px solid #eef2f7;
    border-radius: 10px;
    padding: 6px 10px;
    font-size: 1rem;
    font-weight: 700;
    color: var(--dark);
    text-align: center;
    outline: none;
    transition: border-color 0.2s;
    font-family: 'Roboto', sans-serif;
  }

  .budget-input:focus { border-color: var(--primary); }

  .section-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--dark);
    margin: 24px 0 16px;
  }

  .stat-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
    gap: 16px;
    margin-bottom: 24px;
  }

  .stat-card {
    background: white;
    border-radius: 16px;
    padding: 20px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
  }

  .stat-label {
    font-size: 0.85rem;
    color: var(--text);
    margin-bottom: 8px;
  }

  .stat-value {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--dark);
  }

  .expense-card {
    background: white;
    border-radius: 16px;
    padding: 18px 20px;
    margin-bottom: 12px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
  }

  .expense-info h4 {
    font-size: 1rem;
    font-weight: 600;
    color: var(--dark);
    margin: 0 0 4px 0;
  }

  .expense-date {
    font-size: 0.8rem;
    color: var(--text);
  }

  .expense-meta {
    font-size: 0.78rem;
    color: var(--text);
    margin-top: 2px;
  }

  .expense-amount {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--primary);
    white-space: nowrap;
  }

  .empty-message {
    background: white;
    border-radius: 18px;
    padding: 40px 20px;
    text-align: center;
    color: var(--text);
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
  }

  .empty-message .material-icons-round {
    font-size: 3rem;
    color: #d0d4da;
    margin-bottom: 12px;
    display: block;
  }

  .empty-message a {
    color: var(--primary);
    font-weight: 600;
    text-decoration: none;
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

  .bottom-nav .material-icons-round { font-size: 1.4rem; }
  .bottom-nav a.active { color: var(--primary); }

  @media (max-width: 600px) {
    .stat-grid { grid-template-columns: 1fr 1fr; }
  }
</style>
</head>

<body>

<div class="app-shell">

  <div class="top-row">
    <div>
      <h1 class="page-title">Budget Tracker</h1>
      <div class="page-subtitle">Manage your weekly meal spending</div>
    </div>
  </div>

  <div class="helper-card">
    <div class="helper-text">Track meals from your weekly plan</div>
    <a class="helper-link" href="myplan.php">View My Plan</a>
  </div>

  <div class="budget-overview">
    <div class="budget-label">This Week's Spending</div>
    <div class="budget-amount" id="totalSpent">$0.00</div>
    <div class="budget-status" id="budgetStatus">Loading…</div>
    <div class="progress-bar">
      <div class="progress-fill" id="progressFill" style="width:0%"></div>
    </div>
    <div class="progress-text" id="progressText"></div>
    <div class="budget-input-row">
      <span class="budget-input-label">Weekly Goal: $</span>
      <input class="budget-input" id="budgetGoalInput" type="number" min="1" step="5" value="80"
             oninput="updateBudgetGoal(this.value)">
    </div>
  </div>

  <h2 class="section-title">Weekly Summary</h2>
  <div class="stat-grid">
    <div class="stat-card">
      <div class="stat-label">Weekly Budget</div>
      <div class="stat-value" id="statGoal">$80</div>
    </div>
    <div class="stat-card">
      <div class="stat-label">Meals This Week</div>
      <div class="stat-value" id="statMeals">0</div>
    </div>
    <div class="stat-card">
      <div class="stat-label">Avg per Meal</div>
      <div class="stat-value" id="statAvg">$–</div>
    </div>
    <div class="stat-card">
      <div class="stat-label">Remaining</div>
      <div class="stat-value" id="statRemaining">$–</div>
    </div>
  </div>

  <h2 class="section-title">This Week's Meals</h2>
  <div id="mealList"></div>

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
  <a href="budget.php" class="active">
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

  const PLAN_KEY   = 'myPlanItems_v2';
  const BUDGET_KEY = 'weeklyBudgetGoal_v1';

  const DAY_FULL = {
    Mon: 'Monday', Tue: 'Tuesday', Wed: 'Wednesday',
    Thu: 'Thursday', Fri: 'Friday', Sat: 'Saturday', Sun: 'Sunday'
  };

  const defaultPlan = [
    { day: 'Mon', date: 22, meal: 'Chicken Rice', time: 30, calories: 480, cost: 12 },
    { day: 'Tue', date: 23, meal: '', time: '', calories: '', cost: '' },
    { day: 'Wed', date: 24, meal: '', time: '', calories: '', cost: '' },
    { day: 'Thu', date: 25, meal: '', time: '', calories: '', cost: '' },
    { day: 'Fri', date: 26, meal: '', time: '', calories: '', cost: '' },
    { day: 'Sat', date: 27, meal: '', time: '', calories: '', cost: '' },
    { day: 'Sun', date: 28, meal: '', time: '', calories: '', cost: '' },
  ];

  const planItems = JSON.parse(localStorage.getItem(PLAN_KEY)) || defaultPlan;
  let budgetGoal  = parseFloat(localStorage.getItem(BUDGET_KEY) || '80');

  document.getElementById('budgetGoalInput').value = budgetGoal;

  function getCost(item) {
    const stored = parseFloat(item.cost);
    if (!isNaN(stored) && stored > 0) return stored;
    const rd = RECIPE_DATA[item.meal];
    return rd ? rd.cost : 0;
  }

  function render() {
    const planned    = planItems.filter(i => i.meal);
    const totalSpent = planned.reduce((sum, i) => sum + getCost(i), 0);
    const mealCount  = planned.length;
    const avgPerMeal = mealCount > 0 ? totalSpent / mealCount : 0;
    const remaining  = budgetGoal - totalSpent;
    const isOver     = totalSpent > budgetGoal;
    const pct        = budgetGoal > 0 ? Math.min((totalSpent / budgetGoal) * 100, 100) : 0;

    document.getElementById('totalSpent').textContent = '$' + totalSpent.toFixed(2);
    document.getElementById('statGoal').textContent   = '$' + budgetGoal.toFixed(0);
    document.getElementById('statMeals').textContent  = mealCount;
    document.getElementById('statAvg').textContent    = mealCount > 0 ? '$' + avgPerMeal.toFixed(2) : '$–';

    const remEl = document.getElementById('statRemaining');
    remEl.textContent = (remaining >= 0 ? '$' : '-$') + Math.abs(remaining).toFixed(2);
    remEl.style.color = remaining >= 0 ? '#2ecc71' : '#e74c3c';

    const statusEl = document.getElementById('budgetStatus');
    if (mealCount === 0) {
      statusEl.textContent = 'No meals planned yet';
      statusEl.className   = 'budget-status status-even';
    } else if (isOver) {
      statusEl.textContent = '$' + Math.abs(remaining).toFixed(2) + ' over budget';
      statusEl.className   = 'budget-status status-over';
    } else {
      statusEl.textContent = '$' + remaining.toFixed(2) + ' under budget';
      statusEl.className   = 'budget-status status-under';
    }

    const fill = document.getElementById('progressFill');
    fill.style.width = pct + '%';
    fill.className   = 'progress-fill' + (isOver ? ' over' : '');
    document.getElementById('progressText').textContent =
      '$' + totalSpent.toFixed(2) + ' of $' + budgetGoal.toFixed(0) +
      ' weekly budget (' + Math.round((totalSpent / budgetGoal) * 100) + '%)';

    const listEl = document.getElementById('mealList');
    if (planned.length === 0) {
      listEl.innerHTML = `
        <div class="empty-message">
          <span class="material-icons-round">restaurant_menu</span>
          No meals planned this week yet.<br><br>
          <a href="myplan.php">Go to My Plan →</a>
        </div>`;
      return;
    }

    listEl.innerHTML = planned.map(item => {
      const cost = getCost(item);
      const cal  = item.calories && item.calories !== '–' ? item.calories + ' cal' : '';
      const time = item.time     && item.time     !== '–' ? item.time     + ' min' : '';
      const meta = [time, cal].filter(Boolean).join(' · ');
      return `
        <div class="expense-card">
          <div class="expense-info">
            <h4>${item.meal}</h4>
            <div class="expense-date">${DAY_FULL[item.day] || item.day}, Apr ${item.date}</div>
            ${meta ? `<div class="expense-meta">${meta}</div>` : ''}
          </div>
          <div class="expense-amount">$${cost.toFixed(2)}</div>
        </div>`;
    }).join('');
  }

  function updateBudgetGoal(val) {
    const parsed = parseFloat(val);
    if (!isNaN(parsed) && parsed > 0) {
      budgetGoal = parsed;
      localStorage.setItem(BUDGET_KEY, budgetGoal.toString());
      render();
    }
  }

  render();
</script>

</body>
</html>
