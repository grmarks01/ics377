<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chicken Rice - Recipe</title>

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

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    background-color: var(--bg);
    font-family: 'Roboto', sans-serif;
    padding-bottom: 80px;
  }

  /* Header with back button */
  .header {
    background: white;
    padding: 16px 20px;
    display: flex;
    align-items: center;
    gap: 16px;
    position: sticky;
    top: 0;
    z-index: 100;
    border-bottom: 1px solid #e9ecef;
  }

  .back-btn {
    background: none;
    border: none;
    cursor: pointer;
    color: var(--dark);
    display: flex;
    align-items: center;
  }

  .back-btn .material-icons-round {
    font-size: 1.8rem;
  }

  .header-title {
    flex: 1;
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--dark);
  }

  /* Recipe image placeholder */
  .recipe-hero {
    width: 100%;
    aspect-ratio: 16 / 9;
    background: linear-gradient(135deg, #f0f2f5 0%, #e2e5e9 100%);
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .recipe-hero .material-icons-round {
    font-size: 4rem;
    color: #c8ccd4;
  }

  /* Content area */
  .content {
    max-width: 680px;
    margin: 0 auto;
    padding: 24px 20px;
  }

  .recipe-title {
    font-size: 2rem;
    font-weight: 800;
    color: var(--dark);
    margin-bottom: 12px;
  }

  .recipe-meta {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
    flex-wrap: wrap;
  }

  .meta-item {
    display: flex;
    align-items: center;
    gap: 6px;
    color: var(--text);
    font-size: 0.9rem;
  }

  .meta-item .material-icons-round {
    font-size: 1.1rem;
    color: var(--primary);
  }

  /* Action buttons */
  .action-row {
    display: flex;
    gap: 12px;
    margin-bottom: 24px;
  }

  .btn {
    flex: 1;
    border: none;
    border-radius: 12px;
    padding: 14px 20px;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: opacity 0.2s;
  }

  .btn:hover {
    opacity: 0.9;
  }

  .btn-primary {
    background: linear-gradient(195deg, var(--primary), #962f22);
    color: white;
  }

  .btn-secondary {
    background: white;
    color: var(--dark);
    border: 2px solid #e9ecef;
  }

  /* Sections */
  .section {
    margin-bottom: 32px;
  }

  .section-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 16px;
  }

  /* Ingredients */
  .ingredient-list {
    background: white;
    border-radius: 16px;
    padding: 20px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.07);
  }

  .ingredient-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 0;
    border-bottom: 1px solid #f0f2f5;
  }

  .ingredient-item:last-child {
    border-bottom: none;
  }

  .ingredient-checkbox {
    width: 20px;
    height: 20px;
    border: 2px solid #d0d4da;
    border-radius: 6px;
    cursor: pointer;
  }

  .ingredient-checkbox.checked {
    background: var(--primary);
    border-color: var(--primary);
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .ingredient-checkbox.checked::after {
    content: '✓';
    color: white;
    font-size: 0.8rem;
    font-weight: bold;
  }

  .ingredient-text {
    flex: 1;
    font-size: 0.95rem;
    color: var(--dark);
  }

  .ingredient-text.checked {
    text-decoration: line-through;
    color: var(--text);
  }

  /* Instructions */
  .instruction-list {
    background: white;
    border-radius: 16px;
    padding: 20px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.07);
  }

  .instruction-item {
    display: flex;
    gap: 16px;
    margin-bottom: 20px;
  }

  .instruction-item:last-child {
    margin-bottom: 0;
  }

  .step-number {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: var(--primary);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.9rem;
    flex-shrink: 0;
  }

  .step-text {
    flex: 1;
    font-size: 0.95rem;
    color: var(--dark);
    line-height: 1.6;
    padding-top: 4px;
  }

  /* Bottom nav */
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

  /* Badge */
  .badge {
    display: inline-block;
    background: #e8f5e9;
    color: #2e7d32;
    font-size: 0.75rem;
    font-weight: 700;
    border-radius: 20px;
    padding: 4px 12px;
    margin-bottom: 12px;
  }

  /* Toast */
  .toast {
    position: fixed;
    bottom: 90px;
    left: 50%;
    transform: translateX(-50%);
    background: var(--dark);
    color: white;
    padding: 12px 24px;
    border-radius: 50px;
    font-size: 0.85rem;
    font-weight: 600;
    z-index: 500;
    opacity: 0;
    transition: opacity 0.2s;
    pointer-events: none;
  }

  .toast.show {
    opacity: 1;
  }
</style>
</head>

<body>

<!-- Header -->
<div class="header">
  <button class="back-btn" onclick="history.back()">
    <span class="material-icons-round">arrow_back</span>
  </button>
  <div class="header-title">Recipe Details</div>
</div>

<!-- Hero Image -->
<div class="recipe-hero">
  <span class="material-icons-round">restaurant</span>
</div>

<!-- Content -->
<div class="content">

  <span class="badge">✓ All ingredients in pantry</span>

  <h1 class="recipe-title">Chicken Rice</h1>

  <div class="recipe-meta">
    <div class="meta-item">
      <span class="material-icons-round">schedule</span>
      30 minutes
    </div>
    <div class="meta-item">
      <span class="material-icons-round">local_fire_department</span>
      480 calories
    </div>
    <div class="meta-item">
      <span class="material-icons-round">attach_money</span>
      $12 per serving
    </div>
  </div>

  <!-- Actions -->
  <div class="action-row">
    <button class="btn btn-primary" onclick="startCooking()">
      <span class="material-icons-round">play_arrow</span>
      Start Cooking
    </button>
    <button class="btn btn-secondary" onclick="addToPlan()">
      <span class="material-icons-round">add_circle_outline</span>
      Add to Plan
    </button>
  </div>

  <!-- Ingredients Section -->
  <div class="section">
    <h2 class="section-title">Ingredients</h2>
    <div class="ingredient-list">
      <div class="ingredient-item">
        <div class="ingredient-checkbox" onclick="toggleIngredient(this)"></div>
        <div class="ingredient-text">2 cups jasmine rice</div>
      </div>
      <div class="ingredient-item">
        <div class="ingredient-checkbox" onclick="toggleIngredient(this)"></div>
        <div class="ingredient-text">1 lb chicken breast, diced</div>
      </div>
      <div class="ingredient-item">
        <div class="ingredient-checkbox" onclick="toggleIngredient(this)"></div>
        <div class="ingredient-text">3 cloves garlic, minced</div>
      </div>
      <div class="ingredient-item">
        <div class="ingredient-checkbox" onclick="toggleIngredient(this)"></div>
        <div class="ingredient-text">2 tbsp soy sauce</div>
      </div>
      <div class="ingredient-item">
        <div class="ingredient-checkbox" onclick="toggleIngredient(this)"></div>
        <div class="ingredient-text">1 tbsp sesame oil</div>
      </div>
      <div class="ingredient-item">
        <div class="ingredient-checkbox" onclick="toggleIngredient(this)"></div>
        <div class="ingredient-text">2 green onions, chopped</div>
      </div>
      <div class="ingredient-item">
        <div class="ingredient-checkbox" onclick="toggleIngredient(this)"></div>
        <div class="ingredient-text">Salt and pepper to taste</div>
      </div>
    </div>
  </div>

  <!-- Instructions Section -->
  <div class="section">
    <h2 class="section-title">Instructions</h2>
    <div class="instruction-list">
      <div class="instruction-item">
        <div class="step-number">1</div>
        <div class="step-text">Rinse rice thoroughly under cold water until water runs clear. Cook rice according to package instructions.</div>
      </div>
      <div class="instruction-item">
        <div class="step-number">2</div>
        <div class="step-text">Heat sesame oil in a large pan or wok over medium-high heat. Add minced garlic and cook until fragrant, about 30 seconds.</div>
      </div>
      <div class="instruction-item">
        <div class="step-number">3</div>
        <div class="step-text">Add diced chicken to the pan. Season with salt and pepper. Cook until chicken is golden brown and cooked through, about 6-8 minutes.</div>
      </div>
      <div class="instruction-item">
        <div class="step-number">4</div>
        <div class="step-text">Add soy sauce to the chicken and stir well to coat. Cook for another minute.</div>
      </div>
      <div class="instruction-item">
        <div class="step-number">5</div>
        <div class="step-text">Serve chicken over cooked rice. Garnish with chopped green onions.</div>
      </div>
      <div class="instruction-item">
        <div class="step-number">6</div>
        <div class="step-text">Enjoy your homemade chicken rice! Store leftovers in an airtight container in the refrigerator for up to 3 days.</div>
      </div>
    </div>
  </div>

</div>

<!-- Bottom Nav -->
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

  <a href="find-recipes.php" class="active">
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

<!-- Toast -->
<div class="toast" id="toast"></div>

<script>
  function toggleIngredient(checkbox) {
    checkbox.classList.toggle('checked');
    const text = checkbox.nextElementSibling;
    text.classList.toggle('checked');
  }

  function showToast(message) {
    const toast = document.getElementById('toast');
    toast.textContent = message;
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 2000);
  }

  function startCooking() {
    showToast('Starting cooking mode...');
    // In real app, would navigate to cooking mode
  }

  function addToPlan() {
    window.location.href = 'myplan.php?add=Chicken Rice';
  }
</script>

</body>
</html>
