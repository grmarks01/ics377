<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Meal Planner – Home</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
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
      padding-bottom: 80px;
    }

    .app-header {
      background: #fff;
      border-bottom: 1px solid #e9ecef;
      padding: 22px 16px 18px;
      position: sticky;
      top: 0;
      z-index: 100;
    }
    .app-header h1 {
      margin: 0;
      font-size: 2rem;
      font-weight: 800;
      color: var(--primary);
      text-align: center;
      letter-spacing: -0.5px;
    }

    .search-wrapper {
      background: #fff;
      border-bottom: 1px solid #e9ecef;
      padding: 12px 20px 14px;
    }
    .search-wrapper .input-group {
      border-radius: 50px;
      overflow: hidden;
      background: #f0f2f5;
      max-width: 600px;
      margin: 0 auto;
    }
    .search-wrapper .form-control {
      background: #f0f2f5;
      border: none;
      box-shadow: none;
      font-size: 0.9rem;
      text-align: center;
      border-radius: 50px !important;
      padding: 11px 20px;
    }
    .search-wrapper .form-control::placeholder { text-align: center; }
    .search-wrapper .form-control:focus {
      background: #f0f2f5;
      box-shadow: none;
      text-align: left;
      outline: none;
    }
    .search-wrapper .form-control:focus::placeholder { text-align: left; }

    .page-content {
      max-width: 680px;
      margin: 0 auto;
      padding: 32px 20px 24px;
    }

    .section-title {
      font-size: 1.1rem;
      font-weight: 700;
      color: var(--dark);
      margin: 0 0 6px;
    }
    .section-subtitle {
      font-size: 0.88rem;
      font-weight: 400;
      color: var(--text);
      margin: 0 0 24px;
    }

    .meals-section {
      text-align: center;
      margin-bottom: 40px;
    }

    .meal-card {
      background: #fff;
      border-radius: 16px;
      padding: 18px 20px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.07);
      display: flex;
      align-items: center;
      justify-content: space-between;
      text-decoration: none;
      color: inherit;
      transition: box-shadow 0.2s, transform 0.15s;
      margin-bottom: 14px;
    }
    .meal-card:last-of-type { margin-bottom: 0; }
    .meal-card:hover {
      box-shadow: 0 6px 20px rgba(0,0,0,0.11);
      transform: translateY(-1px);
      color: inherit;
    }
    .meal-card .meal-name {
      font-size: 1.05rem;
      font-weight: 700;
      color: var(--dark);
      margin: 0 0 6px;
      text-align: left;
    }
    .meal-card .meal-meta {
      font-size: 0.82rem;
      color: var(--text);
      margin: 0;
      text-align: left;
    }
    .meal-card .make-now-btn {
      display: flex;
      align-items: center;
      gap: 6px;
      background: linear-gradient(195deg, var(--primary), #962f22);
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 10px 16px;
      font-size: 0.82rem;
      font-weight: 600;
      white-space: nowrap;
      flex-shrink: 0;
      margin-left: 16px;
      cursor: pointer;
    }
    .meal-card .make-now-btn .material-icons-round { font-size: 1rem; }

    .widget-section { margin-top: 8px; }

    .collapse-card {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.07);
      margin-bottom: 12px;
    }
    .collapse-card .collapse-toggle {
      width: 100%;
      background: none;
      border: none;
      padding: 16px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      cursor: pointer;
      text-align: left;
      border-radius: 16px;
    }
    .collapse-card .collapse-toggle[aria-expanded="true"] {
      border-radius: 16px 16px 0 0;
    }
    .collapse-card .toggle-left {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .collapse-card .toggle-title {
      font-size: 0.95rem;
      font-weight: 700;
      color: var(--dark);
      margin: 0;
    }
    .collapse-card .toggle-badge {
      font-size: 0.72rem;
      font-weight: 600;
      padding: 2px 8px;
      border-radius: 20px;
    }
    .badge-warn { background: #fdecea; color: var(--primary); }
    .badge-over { background: #fdecea; color: #e74c3c; }
    .badge-ok   { background: #e8f5e9; color: #4CAF50; }
    .collapse-card .chevron {
      font-size: 1.2rem;
      color: var(--text);
      transition: transform 0.25s ease;
      flex-shrink: 0;
    }
    .collapse-card .collapse-toggle[aria-expanded="true"] .chevron {
      transform: rotate(180deg);
    }
    .collapse-card .collapse-body {
      padding: 0 20px 18px;
      border-top: 1px solid #f0f2f5;
    }
    .collapse-card .widget-detail {
      font-size: 0.85rem;
      color: var(--text);
      margin: 14px 0 12px;
      line-height: 1.6;
    }
    .collapse-card .highlight { color: var(--primary); font-weight: 600; }
    .collapse-card .budget-amount {
      font-size: 1.6rem;
      font-weight: 800;
      color: var(--dark);
      margin: 14px 0 2px;
    }
    .collapse-card .budget-sub {
      font-size: 0.82rem;
      color: var(--text);
      margin: 0 0 6px;
    }
    .collapse-card .budget-status {
      font-size: 0.82rem;
      font-weight: 600;
      margin: 0 0 14px;
    }
    .collapse-card .widget-link {
      display: inline-flex;
      align-items: center;
      gap: 4px;
      font-size: 0.85rem;
      font-weight: 600;
      color: var(--dark);
      text-decoration: none;
    }
    .collapse-card .widget-link:hover { color: var(--primary); }

    .bottom-nav {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      background: #fff;
      border-top: 1px solid #e9ecef;
      display: flex;
      justify-content: space-around;
      align-items: center;
      padding: 6px 0 8px;
      z-index: 200;
      box-shadow: 0 -2px 10px rgba(0,0,0,0.06);
    }
    .bottom-nav a {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-decoration: none;
      color: var(--text);
      font-size: 0.55rem;
      font-weight: 500;
      gap: 2px;
      flex: 1;
      transition: color 0.2s;
    }
    .bottom-nav a .material-icons-round { font-size: 1.4rem; }
    .bottom-nav a.active { color: var(--primary); }
    .bottom-nav a:hover  { color: var(--dark); }
  </style>
</head>

<body>

  <div class="app-header">
    <h1>🍽 Meal Planner</h1>
  </div>

  <div class="search-wrapper">
    <div class="input-group">
      <input type="text" id="dashSearch" class="form-control" placeholder="🔍  Search Recipes..."
             onkeydown="if(event.key==='Enter' && this.value.trim()) window.location.href='find-recipes.php'">
    </div>
  </div>

  <div class="page-content">

    <!-- TODAY'S MEALS -->
    <section class="meals-section">
      <h2 class="section-title">Today's Meals</h2>
      <p class="section-subtitle">Here's what's on your plate today</p>
      <div id="todays-meals-container"></div>
    </section>

    <!-- COLLAPSIBLE WIDGETS -->
    <section class="widget-section">
      <h2 class="section-title">Overview</h2>

      <!-- Pantry Status -->
      <div class="collapse-card">
        <button class="collapse-toggle" onclick="toggleCard(this)" aria-expanded="false">
          <div class="toggle-left">
            <span class="material-icons-round" style="font-size:1.2rem;color:var(--primary);">kitchen</span>
            <span class="toggle-title">Pantry Status</span>
            <span class="toggle-badge badge-warn">2 missing</span>
          </div>
          <span class="material-icons-round chevron">expand_more</span>
        </button>
        <div class="collapse-body" style="display:none;">
          <p class="widget-detail">
            <span class="highlight">2 ingredients are missing</span> for today's planned meals.
            Generate a grocery list to fill the gaps.
          </p>
          <a href="grocery.php" class="widget-link">
            Generate Grocery List
            <span class="material-icons-round" style="font-size:1rem;">arrow_forward</span>
          </a>
        </div>
      </div>

      <!-- My Plan -->
      <div class="collapse-card">
        <button class="collapse-toggle" onclick="toggleCard(this)" aria-expanded="false">
          <div class="toggle-left">
            <span class="material-icons-round" style="font-size:1.2rem;color:var(--dark);">calendar_today</span>
            <span class="toggle-title">My Plan</span>
            <span class="toggle-badge" style="background:#e8eaf6;color:var(--dark);">This Week</span>
          </div>
          <span class="material-icons-round chevron">expand_more</span>
        </button>
        <div class="collapse-body" style="display:none;">
          <table id="plan-table" style="width:100%;font-size:0.83rem;border-collapse:collapse;margin:14px 0 16px;">
            <!-- populated from localStorage by JS -->
          </table>
          <a href="myplan.php" class="widget-link">
            Edit Plan
            <span class="material-icons-round" style="font-size:1rem;">arrow_forward</span>
          </a>
        </div>
      </div>

      <!-- Budget Summary — all three dynamic targets have IDs -->
      <div class="collapse-card">
        <button class="collapse-toggle" onclick="toggleCard(this)" aria-expanded="false">
          <div class="toggle-left">
            <span class="material-icons-round" style="font-size:1.2rem;color:#4CAF50;">account_balance_wallet</span>
            <span class="toggle-title">Budget Summary</span>
            <span class="toggle-badge badge-ok" id="budgetBadge">Loading…</span>
          </div>
          <span class="material-icons-round chevron">expand_more</span>
        </button>
        <div class="collapse-body" style="display:none;">
          <p class="budget-amount" id="budgetAmountEl">$–</p>
          <p class="budget-sub">spent on meals this week</p>
          <p class="budget-status" id="budgetStatusEl"></p>
          <a href="budget.php" class="widget-link">
            View Budget Details
            <span class="material-icons-round" style="font-size:1rem;">arrow_forward</span>
          </a>
        </div>
      </div>

    </section>
  </div>

  <nav class="bottom-nav">
    <a href="index.php" class="active">
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
    <a href="budget.php">
      <span class="material-icons-round">account_balance_wallet</span>Budget
    </a>
    <a href="grocery.php">
      <span class="material-icons-round">shopping_cart</span>Grocery List
    </a>
  </nav>

  <script src="assets/js/core/bootstrap.bundle.min.js"></script>
  <script src="assets/js/material-kit.js"></script>

  <script>
    // ── Collapse toggles ──
    function toggleCard(btn) {
      var body = btn.nextElementSibling;
      var isOpen = btn.getAttribute('aria-expanded') === 'true';
      if (isOpen) {
        body.style.display = 'none';
        btn.setAttribute('aria-expanded', 'false');
      } else {
        body.style.display = 'block';
        btn.setAttribute('aria-expanded', 'true');
      }
    }

    // ── Recipe data (inlined — same values as myplan.php and budget.php) ──
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

    // ── Shared localStorage keys ──
    const PLAN_KEY   = 'myPlanItems_v2';
    const BUDGET_KEY = 'weeklyBudgetGoal_v1';
    const DAY_FULL   = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];

    const defaultPlan = [
      { day: 'Mon', date: 22, meal: 'Chicken Rice', time: 30, calories: 480, cost: 12 },
      { day: 'Tue', date: 23, meal: '', time: '', calories: '', cost: '' },
      { day: 'Wed', date: 24, meal: '', time: '', calories: '', cost: '' },
      { day: 'Thu', date: 25, meal: '', time: '', calories: '', cost: '' },
      { day: 'Fri', date: 26, meal: '', time: '', calories: '', cost: '' },
      { day: 'Sat', date: 27, meal: '', time: '', calories: '', cost: '' },
      { day: 'Sun', date: 28, meal: '', time: '', calories: '', cost: '' }
    ];

    const planItems = JSON.parse(localStorage.getItem(PLAN_KEY)) || defaultPlan;

    // ── Cost helper (same logic as budget.php) ──
    function getCost(item) {
      const stored = parseFloat(item.cost);
      if (!isNaN(stored) && stored > 0) return stored;
      const rd = RECIPE_DATA[item.meal];
      return rd ? rd.cost : 0;
    }

    // ── Today's Meals (hardcoded to Monday index 0 for demo) ──
    const todayIdx  = 0;
    const todayItem = planItems[todayIdx];
    const container = document.getElementById('todays-meals-container');

    if (todayItem && todayItem.meal) {
      container.innerHTML = `
        <a href="myplan.php" class="meal-card">
          <div>
            <p class="meal-name">${todayItem.meal}</p>
            <p class="meal-meta">
              <span class="material-icons-round" style="font-size:0.85rem;vertical-align:-2px;">schedule</span>
              ${todayItem.time && todayItem.time !== '–' ? todayItem.time + ' mins' : '–'} &nbsp;·&nbsp;
              <span class="material-icons-round" style="font-size:0.85rem;vertical-align:-2px;">local_fire_department</span>
              ${todayItem.calories && todayItem.calories !== '–' ? todayItem.calories + ' cal' : '–'}
            </p>
          </div>
          <div class="make-now-btn">
            Make Now <span class="material-icons-round">arrow_forward</span>
          </div>
        </a>`;
    } else {
      container.innerHTML = `
        <a href="myplan.php" class="meal-card" style="justify-content:center;color:var(--text);">
          <span class="material-icons-round" style="margin-right:8px;">calendar_today</span>
          No meal planned for today — <strong style="margin-left:4px;">Add one</strong>
        </a>`;
    }

    // ── My Plan widget table ──
    const table = document.getElementById('plan-table');
    let rows = '';
    planItems.forEach((item, i) => {
      const isLast  = i === planItems.length - 1;
      const isToday = i === todayIdx;
      rows += `<tr${isLast ? '' : ' style="border-bottom:1px solid #f0f2f5;"'}>
        <td style="padding:8px 0;color:${isToday ? 'var(--primary)' : 'var(--text)'};width:90px;font-weight:${isToday ? '700' : '400'};">
          ${DAY_FULL[i]}
        </td>
        <td style="padding:8px 0;color:var(--dark);font-weight:600;">
          ${item.meal || '<span style="color:#9aa2b1;font-weight:400;font-style:italic;">No meal planned</span>'}
        </td>
      </tr>`;
    });
    table.innerHTML = rows;

    // ── Budget Summary widget ──
    const budgetGoal  = parseFloat(localStorage.getItem(BUDGET_KEY) || '80');
    const totalSpent  = planItems.filter(i => i.meal).reduce((sum, i) => sum + getCost(i), 0);
    const remaining   = budgetGoal - totalSpent;
    const isOver      = totalSpent > budgetGoal;

    const badgeEl  = document.getElementById('budgetBadge');
    const amountEl = document.getElementById('budgetAmountEl');
    const statusEl = document.getElementById('budgetStatusEl');

    amountEl.textContent = '$' + totalSpent.toFixed(2);

    if (totalSpent === 0) {
      badgeEl.textContent  = 'No meals yet';
      badgeEl.className    = 'toggle-badge badge-warn';
      statusEl.textContent = 'Add meals to your plan to track spending.';
      statusEl.style.color = 'var(--text)';
    } else if (isOver) {
      badgeEl.textContent  = '$' + Math.abs(remaining).toFixed(2) + ' over';
      badgeEl.className    = 'toggle-badge badge-over';
      statusEl.textContent = '$' + Math.abs(remaining).toFixed(2) + ' over your $' + budgetGoal.toFixed(0) + ' weekly budget';
      statusEl.style.color = '#e74c3c';
    } else {
      badgeEl.textContent  = '$' + remaining.toFixed(2) + ' left';
      badgeEl.className    = 'toggle-badge badge-ok';
      statusEl.textContent = '$' + remaining.toFixed(2) + ' remaining of your $' + budgetGoal.toFixed(0) + ' weekly budget';
      statusEl.style.color = '#4CAF50';
    }
  </script>

</body>
</html>
