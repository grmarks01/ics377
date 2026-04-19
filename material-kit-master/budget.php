<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Budget Tracker</title>

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
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
    font-weight: 700;
    color: var(--primary);
    margin: 0;
  }

  .page-subtitle {
    margin-top: 4px;
    font-size: 0.9rem;
    color: var(--text);
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

  .status-over {
    color: #e74c3c;
  }

  .status-under {
    color: #2ecc71;
  }

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

  .progress-text {
    font-size: 0.85rem;
    color: var(--text);
  }

  .section-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--dark);
    margin: 24px 0 16px;
  }

  .stat-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
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

  .expense-amount {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--primary);
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
  }

  .btn-primary {
    background: linear-gradient(195deg, var(--primary), #962f22);
    color: white;
    border: none;
    border-radius: 12px;
    padding: 12px 24px;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    transition: opacity 0.2s;
  }

  .btn-primary:hover {
    opacity: 0.9;
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
    color: #67748e;
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

  @media (max-width: 768px) {
    .stat-grid {
      grid-template-columns: 1fr;
    }
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

  <!-- Budget Overview -->
  <div class="budget-overview">
    <div class="budget-label">This Week's Spending</div>
    <div class="budget-amount">$88.00</div>
    <div class="budget-status status-over">$8.00 over budget</div>
    
    <div class="progress-bar">
      <div class="progress-fill" style="width: 110%;"></div>
    </div>
    <div class="progress-text">$88 of $80 weekly budget (110%)</div>
  </div>

  <!-- Quick Stats -->
  <h2 class="section-title">Weekly Summary</h2>
  <div class="stat-grid">
    <div class="stat-card">
      <div class="stat-label">Weekly Budget</div>
      <div class="stat-value">$80</div>
    </div>

    <div class="stat-card">
      <div class="stat-label">Meals This Week</div>
      <div class="stat-value">7</div>
    </div>

    <div class="stat-card">
      <div class="stat-label">Avg per Meal</div>
      <div class="stat-value">$12.57</div>
    </div>

    <div class="stat-card">
      <div class="stat-label">Remaining</div>
      <div class="stat-value" style="color: #e74c3c;">-$8</div>
    </div>
  </div>

  <!-- Recent Expenses -->
  <h2 class="section-title">This Week's Meals</h2>

  <div class="expense-card">
    <div class="expense-info">
      <h4>Chicken Rice</h4>
      <div class="expense-date">Monday, Apr 22</div>
    </div>
    <div class="expense-amount">$12.00</div>
  </div>

  <div class="expense-card">
    <div class="expense-info">
      <h4>Spaghetti Bolognese</h4>
      <div class="expense-date">Tuesday, Apr 23</div>
    </div>
    <div class="expense-amount">$15.00</div>
  </div>

  <div class="expense-card">
    <div class="expense-info">
      <h4>Stir Fry Vegetables</h4>
      <div class="expense-date">Wednesday, Apr 24</div>
    </div>
    <div class="expense-amount">$10.00</div>
  </div>

  <div class="expense-card">
    <div class="expense-info">
      <h4>Grilled Salmon</h4>
      <div class="expense-date">Thursday, Apr 25</div>
    </div>
    <div class="expense-amount">$18.00</div>
  </div>

  <div class="expense-card">
    <div class="expense-info">
      <h4>Beef Tacos</h4>
      <div class="expense-date">Friday, Apr 26</div>
    </div>
    <div class="expense-amount">$14.00</div>
  </div>

  <div class="expense-card">
    <div class="expense-info">
      <h4>Mushroom Pasta</h4>
      <div class="expense-date">Saturday, Apr 27</div>
    </div>
    <div class="expense-amount">$11.00</div>
  </div>

  <div class="expense-card">
    <div class="expense-info">
      <h4>Roast Chicken</h4>
      <div class="expense-date">Sunday, Apr 28</div>
    </div>
    <div class="expense-amount">$8.00</div>
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

  <a href="budget.php" class="active">
    <span class="material-icons-round">account_balance_wallet</span>
    Budget
  </a>

  <a href="grocery.php">
    <span class="material-icons-round">shopping_cart</span>
    Grocery List
  </a>
</nav>

</body>
</html>
