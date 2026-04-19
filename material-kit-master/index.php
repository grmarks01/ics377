<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meal Planner – Home</title>
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  
  <style>
    /* ═══ BRAND COLORS ═══ */
    :root {
      --primary: #B85042;
      --secondary: #E7E8D1;
      --accent: #A7BEAE;
      --dark: #344767;
      --text: #7b809a;
      --bg: #f8f9fa;
    }
    
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Roboto', sans-serif;
      background: var(--bg);
      padding-bottom: 80px;
    }

    /* ═══ HEADER ═══ */
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
      font-size: 1.8rem;
      font-weight: 800;
      color: var(--primary);
      text-align: center;
    }

    /* ═══ SEARCH BAR ═══ */
    .search-wrapper {
      background: #fff;
      border-bottom: 1px solid #e9ecef;
      padding: 12px 20px 14px;
    }
    .search-wrapper .search-box {
      border-radius: 50px;
      background: #f0f2f5;
      max-width: 600px;
      margin: 0 auto;
      position: relative;
    }
    .search-wrapper input {
      width: 100%;
      background: transparent;
      border: none;
      padding: 12px 20px;
      font-size: 0.9rem;
      text-align: center;
      outline: none;
    }
    .search-wrapper input::placeholder { text-align: center; }
    .search-wrapper input:focus { text-align: left; }
    .search-wrapper input:focus::placeholder { text-align: left; }

    /* ═══ MAIN CONTENT ═══ */
    .page-content {
      max-width: 680px;
      margin: 0 auto;
      padding: 32px 20px 24px;
    }

    /* ═══ TODAY'S MEALS ═══ */
    .section-title {
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--dark);
      margin: 0 0 8px;
    }
    .section-subtitle {
      font-size: 0.9rem;
      color: var(--text);
      margin: 0 0 20px;
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
      transition: all 0.2s;
      margin-bottom: 12px;
    }
    .meal-card:hover {
      box-shadow: 0 6px 20px rgba(0,0,0,0.11);
      transform: translateY(-2px);
    }
    .meal-info h3 {
      font-size: 1.1rem;
      font-weight: 700;
      color: var(--dark);
      margin: 0 0 6px;
    }
    .meal-meta {
      font-size: 0.85rem;
      color: var(--text);
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .meal-meta span {
      display: flex;
      align-items: center;
      gap: 4px;
    }
    .meal-meta .material-icons-round {
      font-size: 0.9rem;
    }
    .make-now-btn {
      background: linear-gradient(195deg, var(--primary), #962f22);
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 10px 16px;
      font-size: 0.85rem;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 6px;
      cursor: pointer;
      transition: transform 0.2s;
    }
    .make-now-btn:hover {
      transform: scale(1.05);
    }
    .make-now-btn .material-icons-round {
      font-size: 1rem;
    }

    /* ═══ OVERVIEW WIDGETS ═══ */
    .overview-section {
      margin-top: 40px;
    }

    .widget-card {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.07);
      margin-bottom: 12px;
      overflow: hidden;
    }

    .widget-header {
      width: 100%;
      background: none;
      border: none;
      padding: 16px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      cursor: pointer;
      text-align: left;
    }
    .widget-header-left {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .widget-icon {
      font-size: 1.3rem;
    }
    .widget-title {
      font-size: 1rem;
      font-weight: 700;
      color: var(--dark);
    }
    .widget-badge {
      font-size: 0.75rem;
      font-weight: 600;
      padding: 3px 10px;
      border-radius: 20px;
      margin-left: 8px;
    }
    .badge-warning {
      background: #fdecea;
      color: #e74c3c;
    }
    .badge-success {
      background: #e8f5e9;
      color: #4CAF50;
    }
    .badge-neutral {
      background: #e8eaf6;
      color: var(--dark);
    }
    
    .chevron {
      font-size: 1.3rem;
      color: var(--text);
      transition: transform 0.25s;
    }
    .widget-header[aria-expanded="true"] .chevron {
      transform: rotate(180deg);
    }

    .widget-body {
      padding: 0 20px 18px;
      border-top: 1px solid #f0f2f5;
      display: none;
    }
    .widget-body.show {
      display: block;
    }
    .widget-text {
      font-size: 0.9rem;
      color: var(--text);
      margin: 14px 0;
      line-height: 1.6;
    }
    .highlight {
      color: var(--primary);
      font-weight: 600;
    }
    .widget-link {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 0.9rem;
      font-weight: 600;
      color: var(--primary);
      text-decoration: none;
      transition: opacity 0.2s;
    }
    .widget-link:hover {
      opacity: 0.8;
    }

    .budget-amount {
      font-size: 1.8rem;
      font-weight: 800;
      color: var(--dark);
      margin: 12px 0 4px;
    }
    .budget-label {
      font-size: 0.85rem;
      color: var(--text);
      margin: 0 0 6px;
    }
    .budget-status {
      font-size: 0.85rem;
      font-weight: 600;
      margin: 0 0 12px;
    }

    /* ═══ BOTTOM NAVIGATION ═══ */
    .bottom-nav {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background: #fff;
      border-top: 1px solid #e9ecef;
      display: flex;
      justify-content: space-around;
      padding: 8px 0;
      z-index: 200;
    }
    .bottom-nav a {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-decoration: none;
      color: var(--text);
      font-size: 0.7rem;
      font-weight: 500;
      gap: 4px;
      flex: 1;
      transition: color 0.2s;
    }
    .bottom-nav a.active {
      color: var(--primary);
    }
    .bottom-nav a .material-icons-round {
      font-size: 1.5rem;
    }
  </style>
</head>

<body>
  <!-- HEADER -->
  <div class="app-header">
    <h1>Meal Planner</h1>
  </div>

  <!-- SEARCH BAR -->
  <div class="search-wrapper">
    <div class="search-box">
      <input type="text" placeholder="🔍  Search Recipes...">
    </div>
  </div>

  <!-- MAIN CONTENT -->
  <div class="page-content">
    
    <!-- TODAY'S MEALS -->
    <section>
      <h2 class="section-title">Today's Meals</h2>
      <p class="section-subtitle">Here's what's on your plate today</p>

      <a href="recipe-detail.php" class="meal-card">
        <div class="meal-info">
          <h3>Chicken Rice</h3>
          <div class="meal-meta">
            <span><span class="material-icons-round">schedule</span> 30 mins</span>
            <span><span class="material-icons-round">local_fire_department</span> 480 cal</span>
          </div>
        </div>
        <button class="make-now-btn" onclick="event.preventDefault(); alert('Starting cooking mode...');">
          Make Now <span class="material-icons-round">arrow_forward</span>
        </button>
      </a>

      <a href="recipe-detail.php" class="meal-card">
        <div class="meal-info">
          <h3>Caesar Salad</h3>
          <div class="meal-meta">
            <span><span class="material-icons-round">schedule</span> 15 mins</span>
            <span><span class="material-icons-round">local_fire_department</span> 320 cal</span>
          </div>
        </div>
        <button class="make-now-btn" onclick="event.preventDefault(); alert('Starting cooking mode...');">
          Make Now <span class="material-icons-round">arrow_forward</span>
        </button>
      </a>
    </section>

    <!-- OVERVIEW WIDGETS -->
    <section class="overview-section">
      <h2 class="section-title">Overview</h2>

      <!-- Pantry Status -->
      <div class="widget-card">
        <button class="widget-header" onclick="toggleWidget(this)" aria-expanded="false">
          <div class="widget-header-left">
            <span class="material-icons-round widget-icon" style="color: var(--primary);">kitchen</span>
            <span class="widget-title">Pantry Status</span>
            <span class="widget-badge badge-warning">2 missing</span>
          </div>
          <span class="material-icons-round chevron">expand_more</span>
        </button>
        <div class="widget-body">
          <p class="widget-text">
            <span class="highlight">2 ingredients are missing</span> for today's planned meals. Generate a grocery list to fill the gaps.
          </p>
          <a href="grocery.php" class="widget-link">
            Generate Grocery List
            <span class="material-icons-round" style="font-size: 1rem;">arrow_forward</span>
          </a>
        </div>
      </div>

      <!-- My Plan -->
      <div class="widget-card">
        <button class="widget-header" onclick="toggleWidget(this)" aria-expanded="false">
          <div class="widget-header-left">
            <span class="material-icons-round widget-icon" style="color: var(--dark);">calendar_today</span>
            <span class="widget-title">My Plan</span>
            <span class="widget-badge badge-neutral">This Week</span>
          </div>
          <span class="material-icons-round chevron">expand_more</span>
        </button>
        <div class="widget-body">
          <table style="width:100%; font-size:0.85rem; border-collapse:collapse; margin:14px 0 16px;">
            <tr style="border-bottom:1px solid #f0f2f5;">
              <td style="padding:10px 0; color:var(--text); width:100px;">Monday</td>
              <td style="padding:10px 0; color:var(--dark); font-weight:600;">Chicken Rice, Caesar Salad</td>
            </tr>
            <tr style="border-bottom:1px solid #f0f2f5;">
              <td style="padding:10px 0; color:var(--text);">Tuesday</td>
              <td style="padding:10px 0; color:var(--dark); font-weight:600;">Spaghetti Bolognese</td>
            </tr>
            <tr style="border-bottom:1px solid #f0f2f5;">
              <td style="padding:10px 0; color:var(--text);">Wednesday</td>
              <td style="padding:10px 0; color:var(--dark); font-weight:600;">Stir Fry Vegetables</td>
            </tr>
            <tr style="border-bottom:1px solid #f0f2f5;">
              <td style="padding:10px 0; color:var(--text);">Thursday</td>
              <td style="padding:10px 0; color:var(--dark); font-weight:600;">Grilled Salmon</td>
            </tr>
            <tr style="border-bottom:1px solid #f0f2f5;">
              <td style="padding:10px 0; color:var(--text);">Friday</td>
              <td style="padding:10px 0; color:var(--dark); font-weight:600;">Beef Tacos</td>
            </tr>
            <tr style="border-bottom:1px solid #f0f2f5;">
              <td style="padding:10px 0; color:var(--text);">Saturday</td>
              <td style="padding:10px 0; color:var(--dark); font-weight:600;">Mushroom Pasta</td>
            </tr>
            <tr>
              <td style="padding:10px 0; color:var(--text);">Sunday</td>
              <td style="padding:10px 0; color:var(--dark); font-weight:600;">Roast Chicken</td>
            </tr>
          </table>
          <a href="myplan.php" class="widget-link">
            Edit Plan
            <span class="material-icons-round" style="font-size:1rem;">arrow_forward</span>
          </a>
        </div>
      </div>

      <!-- Budget Summary -->
      <div class="widget-card">
        <button class="widget-header" onclick="toggleWidget(this)" aria-expanded="false">
          <div class="widget-header-left">
            <span class="material-icons-round widget-icon" style="color: #4CAF50;">account_balance_wallet</span>
            <span class="widget-title">Budget Summary</span>
            <span class="widget-badge badge-warning">$8 over</span>
          </div>
          <span class="material-icons-round chevron">expand_more</span>
        </button>
        <div class="widget-body">
          <div class="budget-amount">$88</div>
          <div class="budget-label">spent on meals last week</div>
          <div class="budget-status" style="color: #e74c3c;">$8 over your weekly budget</div>
          <a href="budget.php" class="widget-link">
            View Budget Details
            <span class="material-icons-round" style="font-size:1rem;">arrow_forward</span>
          </a>
        </div>
      </div>

    </section>

  </div>

  <!-- BOTTOM NAVIGATION -->
  <nav class="bottom-nav">
    <a href="index.php" class="active">
      <span class="material-icons-round">home</span>
      Home
    </a>
    <a href="myplan.php">
      <span class="material-icons-round">calendar_today</span>
      My Plan
    </a>
    <a href="pantry.php">
      <span class="material-icons-round">kitchen</span>
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
    function toggleWidget(btn) {
      const body = btn.nextElementSibling;
      const isOpen = btn.getAttribute('aria-expanded') === 'true';
      
      if (isOpen) {
        body.classList.remove('show');
        btn.setAttribute('aria-expanded', 'false');
      } else {
        body.classList.add('show');
        btn.setAttribute('aria-expanded', 'true');
      }
    }
  </script>

</body>
</html>
