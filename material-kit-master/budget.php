<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Budget Tracker</title>
  <link rel="stylesheet" href="assets/css/material-kit.min.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />
  <style>
    :root {
      --primary: #344767;
      --accent:  #7928ca;
      --danger:  #e74c3c;
      --success: #2dce89;
      --warn:    #f5a623;
      --light:   #f0f2f5;
      --dark:    #344767;
      --text:    #67748e;
      --card-bg: #ffffff;
      --radius:  16px;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'Roboto', sans-serif;
      background: var(--light);
      padding-bottom: 90px;
    }

    .app-shell {
      max-width: 480px;
      margin: 0 auto;
      padding: 20px 16px 0;
    }

    /* ── Header ── */
    .top-row {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 16px;
    }
    .page-title {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--dark);
    }
    .page-subtitle {
      font-size: 0.85rem;
      color: var(--text);
      margin-top: 2px;
    }

    /* ── Helper card ── */
    .helper-card {
      background: var(--card-bg);
      border-radius: var(--radius);
      padding: 14px 16px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 14px;
      margin-bottom: 20px;
    }
    .helper-text { color: var(--text); font-size: 0.9rem; }
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

    /* ── Budget overview ── */
    .budget-overview {
      background: var(--card-bg);
      border-radius: var(--radius);
      padding: 24px 20px 20px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.07);
      margin-bottom: 20px;
      text-align: center;
    }
    .budget-label {
      font-size: 0.8rem;
      color: var(--text);
      text-transform: uppercase;
      letter-spacing: 0.06em;
      margin-bottom: 6px;
    }
    .budget-amount {
      font-size: 2.8rem;
      font-weight: 800;
      color: var(--dark);
      line-height: 1;
      margin-bottom: 6px;
    }
    .budget-status {
      font-size: 0.88rem;
      font-weight: 600;
      margin-bottom: 14px;
    }
    .status-under { color: var(--success); }
    .status-over  { color: var(--danger); }
    .status-even  { color: var(--text); }

    .progress-bar {
      background: #eef2f7;
      border-radius: 999px;
      height: 10px;
      overflow: hidden;
      margin-bottom: 6px;
    }
    .progress-fill {
      height: 100%;
      border-radius: 999px;
      background: linear-gradient(90deg, #7928ca, #ff0080);
      transition: width 0.4s ease;
      max-width: 100%;
    }
    .progress-fill.over { background: linear-gradient(90deg, var(--danger), #ff6b6b); }
    .progress-text {
      font-size: 0.78rem;
      color: var(--text);
    }

    /* ── Budget input row ── */
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
    }
    .budget-input:focus { border-color: var(--accent); }

    /* ── Section title ── */
    .section-title {
      font-size: 0.8rem;
      font-weight: 700;
      color: var(--text);
      text-transform: uppercase;
      letter-spacing: 0.08em;
      margin-bottom: 12px;
    }

    /* ── Stats grid ── */
    .stat-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
      margin-bottom: 20px;
    }
    .stat-card {
      background: var(--card-bg);
      border-radius: var(--radius);
      padding: 16px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      text-align: center;
    }
    .stat-label {
      font-size: 0.75rem;
      color: var(--text);
      margin-bottom: 6px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }
    .stat-value {
      font-size: 1.45rem;
      font-weight: 800;
      color: var(--dark);
    }

    /* ── Meal expense list ── */
    .expense-card {
      background: var(--card-bg);
      border-radius: var(--radius);
      padding: 14px 16px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
    }
    .expense-info h4 {
      font-size: 0.95rem;
      font-weight: 600;
      color: var(--dark);
    }
    .expense-date {
      font-size: 0.78rem;
      color: var(--text);
      margin-top: 2px;
    }
    .expense-amount {
      font-size: 1.05rem;
      font-weight: 700;
      color: var(--dark);
    }
    .expense-meta {
      font-size: 0.75rem;
      color: var(--text);
      margin-top: 2px;
      text-align: right;
    }

    /* ── Empty state ── */
    .empty-state {
      background: var(--card-bg);
      border-radius: var(--radius);
      padding: 40px 20px;
      text-align: center;
      color: var(--text);
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    .empty-state .material-icons-round {
      font-size: 2.5rem;
      margin-bottom: 10px;
      display: block;
      opacity: 0.4;
    }

    /* ── Bottom nav ── */
    .bottom-nav {
      position: fixed;
      bottom: 0; left: 0; right: 0;
      background: #fff;
      display: flex;
      justify-content: space-around;
      align-items: center;
      padding: 8px 0 10px;
      box-shadow: 0 -2px 12px rgba(0,0,0,0.07);
      z-index: 100;
    }
    .bottom-nav a {
      display: flex;
      flex-direction: column;
      align-items: center;
      font-size: 0.6rem;
      color: var(--text);
      text-decoration: none;
      gap: 2px;
      padding: 4px 6px;
      border-radius: 10px;
      transition: color 0.15s;
    }
    .bottom-nav a .material-icons-round { font-size: 1.3rem; }
    .bottom-nav a.active { color: var(--accent); font-weight: 700; }

    @media (max-width: 768px) {
      .stat-grid { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

<!-- Load shared recipe data -->
<script src="assets/js/recipe-data.js"></script>

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

  <!-- Budget Overview (values injected by JS) -->
  <div class="budget-overview">
    <div class="budget-label">This Week's Spending</div>
    <div class="budget-amount" id="totalSpent">$0.00</div>
    <div class="budget-status" id="budgetStatus">Loading…</div>

    <div class="progress-bar">
      <div class="progress-fill" id="progressFill" style="width: 0%;"></div>
    </div>
    <div class="progress-text" id="progressText">$0 of $– weekly budget</div>

    <div class="budget-input-row">
      <span class="budget-input-label">Weekly Goal: $</span>
      <input
        class="budget-input"
        id="budgetGoalInput"
        type="number"
        min="1"
        step="5"
        value="80"
        oninput="updateBudgetGoal(this.value)"
      />
    </div>
  </div>

  <!-- Quick Stats -->
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

  <!-- Meal list -->
  <h2 class="section-title">This Week's Meals</h2>
  <div id="mealList"></div>

</div><!-- /app-shell -->

<nav class="bottom-nav">
  <a href="index.php">
    <span class="material-icons-round">home</span>Home
  </a>
  <a href="myplan.php">
    <span class="material-icons-round">calendar_month</span>My Plan
  </a>
  <a href="pantry.php">
    <span class="material-icons-round">inventory_2</span>Pantry
  </a>
  <a href="my-recipes.php">
    <span class="material-icons-round">menu_book</span>My Recipes
  </a>
  <a href="find-recipes.php">
    <span class="material-icons-round">search</span>Find Recipes
  </a>
  <a href="budget.php" class="active">
    <span class="material-icons-round">account_balance_wallet</span>Budget
  </a>
  <a href="grocery.php">
    <span class="material-icons-round">shopping_cart</span>Grocery List
  </a>
</nav>

<script>
  // ── Recipe data (inlined — no external file dependency) ──
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

  // ── Keys ──
  const PLAN_KEY   = 'myPlanItems_v2';
  const BUDGET_KEY = 'weeklyBudgetGoal_v1';

  // ── Day label helpers ──
  const DAY_FULL = {
    Mon: 'Monday',   Tue: 'Tuesday', Wed: 'Wednesday',
    Thu: 'Thursday', Fri: 'Friday',  Sat: 'Saturday', Sun: 'Sunday'
  };

  // ── Same defaultPlan as myplan.php — keeps both pages in sync ──
  const defaultPlan = [
    { day: 'Mon', date: 22, meal: 'Chicken Rice', time: 30, calories: 480, cost: 12 },
    { day: 'Tue', date: 23, meal: '', time: '', calories: '', cost: '' },
    { day: 'Wed', date: 24, meal: '', time: '', calories: '', cost: '' },
    { day: 'Thu', date: 25, meal: '', time: '', calories: '', cost: '' },
    { day: 'Fri', date: 26, meal: '', time: '', calories: '', cost: '' },
    { day: 'Sat', date: 27, meal: '', time: '', calories: '', cost: '' },
    { day: 'Sun', date: 28, meal: '', time: '', calories: '', cost: '' },
  ];

  // ── Read from localStorage — falls back to defaultPlan only if the key is missing ──
  const planItems  = JSON.parse(localStorage.getItem(PLAN_KEY)) || defaultPlan;
  let   budgetGoal = parseFloat(localStorage.getItem(BUDGET_KEY) || '80');

  // ── Sync goal input ──
  document.getElementById('budgetGoalInput').value = budgetGoal;

  // ── Render everything ──
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
    const avgPerMeal = mealCount > 0 ? (totalSpent / mealCount) : 0;
    const remaining  = budgetGoal - totalSpent;
    const pct        = budgetGoal > 0 ? Math.min((totalSpent / budgetGoal) * 100, 100) : 0;
    const isOver     = totalSpent > budgetGoal;

    // ── Overview ──
    document.getElementById('totalSpent').textContent   = '$' + totalSpent.toFixed(2);
    document.getElementById('statGoal').textContent     = '$' + budgetGoal.toFixed(0);
    document.getElementById('statMeals').textContent    = mealCount;
    document.getElementById('statAvg').textContent      = mealCount > 0 ? '$' + avgPerMeal.toFixed(2) : '$–';

    const remEl = document.getElementById('statRemaining');
    remEl.textContent  = (remaining >= 0 ? '$' : '-$') + Math.abs(remaining).toFixed(2);
    remEl.style.color  = remaining >= 0 ? 'var(--success)' : 'var(--danger)';

    // ── Status badge ──
    const statusEl = document.getElementById('budgetStatus');
    if (mealCount === 0) {
      statusEl.textContent  = 'No meals planned yet';
      statusEl.className    = 'budget-status status-even';
    } else if (isOver) {
      statusEl.textContent  = '$' + Math.abs(remaining).toFixed(2) + ' over budget';
      statusEl.className    = 'budget-status status-over';
    } else {
      statusEl.textContent  = '$' + remaining.toFixed(2) + ' under budget';
      statusEl.className    = 'budget-status status-under';
    }

    // ── Progress bar ──
    const fill = document.getElementById('progressFill');
    fill.style.width = pct + '%';
    fill.className   = 'progress-fill' + (isOver ? ' over' : '');
    document.getElementById('progressText').textContent =
      '$' + totalSpent.toFixed(2) + ' of $' + budgetGoal.toFixed(0) +
      ' weekly budget (' + Math.round((totalSpent / budgetGoal) * 100) + '%)';

    // ── Meal list ──
    const listEl = document.getElementById('mealList');
    if (planned.length === 0) {
      listEl.innerHTML = `
        <div class="empty-state">
          <span class="material-icons-round">restaurant_menu</span>
          No meals planned this week yet.<br>
          <a href="myplan.php" style="color:var(--accent);font-weight:600;text-decoration:none;">Go to My Plan →</a>
        </div>`;
      return;
    }

    listEl.innerHTML = planned.map(item => {
      const cal  = item.calories && item.calories !== '–' ? item.calories + ' cal' : '';
      const time = item.time     && item.time !== '–'     ? item.time + ' min'     : '';
      const meta = [time, cal].filter(Boolean).join(' · ');
      return `
        <div class="expense-card">
          <div class="expense-info">
            <h4>${item.meal}</h4>
            <div class="expense-date">${DAY_FULL[item.day] || item.day}, Apr ${item.date}</div>
          </div>
          <div>
            <div class="expense-amount">$${getCost(item).toFixed(2)}</div>
            ${meta ? `<div class="expense-meta">${meta}</div>` : ''}
          </div>
        </div>`;
    }).join('');
  }

  // ── Budget goal edit ──
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
