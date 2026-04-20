<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Egg Fried Rice - Recipe</title>

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

<style>
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
    background-color: var(--bg);
    font-family: 'Roboto', sans-serif;
    padding-bottom: 80px;
  }

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

  .back-btn .material-icons-round { font-size: 1.8rem; }

  .header-title {
    flex: 1;
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--dark);
  }

  .recipe-hero {
    width: 100%;
    aspect-ratio: 16 / 9;
    background: linear-gradient(135deg, #f0f2f5 0%, #e2e5e9 100%);
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .recipe-hero .material-icons-round { font-size: 4rem; color: #c8ccd4; }

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

  .meta-item .material-icons-round { font-size: 1.1rem; color: var(--primary); }

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

  .btn:hover { opacity: 0.9; }

  .btn-primary {
    background: linear-gradient(195deg, var(--primary), #962f22);
    color: white;
  }

  .btn-secondary {
    background: white;
    color: var(--dark);
    border: 2px solid #e9ecef;
  }

  .section { margin-bottom: 32px; }

  .section-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 16px;
  }

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

  .ingredient-item:last-child { border-bottom: none; }

  .ingredient-checkbox {
    width: 20px;
    height: 20px;
    border: 2px solid #d0d4da;
    border-radius: 6px;
    cursor: pointer;
    flex-shrink: 0;
  }

  .ingredient-checkbox.in-pantry {
    background: #A7BEAE;
    border-color: #A7BEAE;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .ingredient-checkbox.in-pantry::after {
    content: '✓';
    color: white;
    font-size: 0.8rem;
    font-weight: bold;
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

  .ingredient-text.checked { text-decoration: line-through; color: var(--text); }

  .pantry-tag {
    font-size: 0.7rem;
    font-weight: 600;
    color: #2e7d32;
    background: #e8f5e9;
    border-radius: 20px;
    padding: 2px 8px;
    white-space: nowrap;
  }

  .missing-btn {
    width: 100%;
    margin-top: 16px;
    border: none;
    border-radius: 12px;
    padding: 14px;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    background: #fff3e0;
    color: #e65100;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: opacity 0.2s;
  }

  .missing-btn:hover { opacity: 0.85; }
  .missing-btn.hidden { display: none; }

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

  .instruction-item:last-child { margin-bottom: 0; }

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

  .bottom-nav {
    position: fixed;
    bottom: 0; left: 0; right: 0;
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

  .badge {
    display: inline-block;
    font-size: 0.75rem;
    font-weight: 700;
    border-radius: 20px;
    padding: 4px 12px;
    margin-bottom: 12px;
  }

  .badge-ready  { background: #e8f5e9; color: #2e7d32; }
  .badge-missing { background: #fff3e0; color: #e65100; }

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
    white-space: nowrap;
  }

  .toast.show { opacity: 1; }
</style>
</head>

<body>

<div class="header">
  <button class="back-btn" onclick="history.back()">
    <span class="material-icons-round">arrow_back</span>
  </button>
  <div class="header-title">Recipe Details</div>
</div>

<div class="recipe-hero">
  <span class="material-icons-round">restaurant</span>
</div>

<div class="content">

  <span class="badge" id="pantryBadge">Checking pantry…</span>

  <h1 class="recipe-title">Egg Fried Rice</h1>

  <div class="recipe-meta">
    <div class="meta-item">
      <span class="material-icons-round">schedule</span>
      15 minutes
    </div>
    <div class="meta-item">
      <span class="material-icons-round">local_fire_department</span>
      380 calories
    </div>
    <div class="meta-item">
      <span class="material-icons-round">attach_money</span>
      $8 per serving
    </div>
  </div>

  <div class="action-row">
    <button class="btn btn-primary" id="completeBtn" onclick="markCompleted()">
      <span class="material-icons-round">check_circle</span>
      Mark Completed
    </button>
    <button class="btn btn-secondary" onclick="addToPlan()">
      <span class="material-icons-round">add_circle_outline</span>
      Add to Plan
    </button>
  </div>

  <div class="section">
    <h2 class="section-title">Ingredients</h2>
    <div class="ingredient-list" id="ingredientList">
      <!-- populated by JS with pantry matching -->
    </div>
    <button class="missing-btn hidden" id="missingBtn" onclick="addMissingToGrocery()">
      <span class="material-icons-round">add_shopping_cart</span>
      <span id="missingBtnLabel">Add missing ingredients to Grocery List</span>
    </button>
  </div>

  <div class="section">
    <h2 class="section-title">Instructions</h2>
    <div class="instruction-list">
      <div class="instruction-item">
        <div class="step-number">1</div>
        <div class="step-text">Cook rice ahead of time and let it cool completely — day-old rice works best as it fries without clumping.</div>
      </div>
      <div class="instruction-item">
        <div class="step-number">2</div>
        <div class="step-text">Heat sesame oil in a large wok or skillet over high heat. Add garlic and stir-fry for 30 seconds until fragrant.</div>
      </div>
      <div class="instruction-item">
        <div class="step-number">3</div>
        <div class="step-text">Push garlic to the side and crack eggs into the wok. Scramble quickly, breaking into small pieces as they cook.</div>
      </div>
      <div class="instruction-item">
        <div class="step-number">4</div>
        <div class="step-text">Add the cold rice. Stir-fry everything together over high heat for 3–4 minutes, pressing the rice against the wok to get some crispy bits.</div>
      </div>
      <div class="instruction-item">
        <div class="step-number">5</div>
        <div class="step-text">Add soy sauce and frozen peas. Stir-fry for another 2 minutes until peas are heated through and everything is well combined.</div>
      </div>
      <div class="instruction-item">
        <div class="step-number">6</div>
        <div class="step-text">Taste and season with salt and pepper. Garnish with sliced green onions and serve immediately.</div>
      </div>
    </div>
  </div>

</div>

<nav class="bottom-nav">
  <a href="index.php"><span class="material-icons-round">home</span>Home</a>
  <a href="myplan.php"><span class="material-icons-round">calendar_month</span>My Plan</a>
  <a href="pantry.php"><span class="material-icons-round">inventory_2</span>Pantry</a>
  <a href="my-recipes.php"><span class="material-icons-round">menu_book</span>My Recipes</a>
  <a href="find-recipes.php" class="active"><span class="material-icons-round">search</span>Find Recipes</a>
  <a href="budget.php"><span class="material-icons-round">account_balance_wallet</span>Budget</a>
  <a href="grocery.php"><span class="material-icons-round">shopping_cart</span>Grocery List</a>
</nav>

<div class="toast" id="toast"></div>

<script>
  // ── Ingredients for this recipe ──
  const INGREDIENTS = [
    { text: '3 cups cooked rice',        key: 'rice' },
    { text: '3 eggs',                    key: 'egg' },
    { text: '2 tbsp soy sauce',          key: 'soy sauce' },
    { text: '1 tbsp sesame oil',         key: 'sesame oil' },
    { text: '2 cloves garlic, minced',   key: 'garlic' },
    { text: '1 cup frozen peas',         key: 'peas' },
    { text: '2 green onions, chopped',   key: 'onion' },
    { text: 'Salt and pepper to taste',  key: 'salt' },
  ];

  // ── Load pantry from localStorage ──
  const pantryItems = JSON.parse(localStorage.getItem('pantryItems') || '[]');

  function isInPantry(key) {
    return pantryItems.some(p => p.name.toLowerCase().includes(key.toLowerCase())
      || key.toLowerCase().includes(p.name.toLowerCase().split(' ')[0]));
  }

  // ── Build ingredient list with pantry matching ──
  const listEl    = document.getElementById('ingredientList');
  const missingBtn = document.getElementById('missingBtn');
  const badgeEl   = document.getElementById('pantryBadge');
  let missingItems = [];

  INGREDIENTS.forEach(ing => {
    const inPantry = isInPantry(ing.key);
    if (!inPantry) missingItems.push(ing.text);

    const item = document.createElement('div');
    item.className = 'ingredient-item';
    item.innerHTML = `
      <div class="ingredient-checkbox ${inPantry ? 'in-pantry' : ''}"
           onclick="${inPantry ? '' : 'toggleIngredient(this)'}"></div>
      <div class="ingredient-text">${ing.text}</div>
      ${inPantry ? '<span class="pantry-tag">In Pantry</span>' : ''}
    `;
    listEl.appendChild(item);
  });

  // ── Badge and missing button ──
  if (missingItems.length === 0) {
    badgeEl.textContent = '✓ All ingredients in pantry';
    badgeEl.className   = 'badge badge-ready';
  } else {
    badgeEl.textContent = missingItems.length + ' ingredient' + (missingItems.length > 1 ? 's' : '') + ' missing';
    badgeEl.className   = 'badge badge-missing';
    document.getElementById('missingBtnLabel').textContent =
      'Add ' + missingItems.length + ' missing ingredient' + (missingItems.length > 1 ? 's' : '') + ' to Grocery List';
    missingBtn.classList.remove('hidden');
  }

  // ── Toggle manual check ──
  function toggleIngredient(checkbox) {
    checkbox.classList.toggle('checked');
    checkbox.nextElementSibling.classList.toggle('checked');
  }

  // ── Grocery helpers ──
  function guessCategory(name) {
    const n = name.toLowerCase();
    if (/chicken|beef|pork|tuna|salmon|shrimp|egg/.test(n))             return 'Proteins';
    if (/rice|pasta|bread|noodle|tortilla|flour|crouton/.test(n))       return 'Grains';
    if (/milk|cheese|butter|cream|yogurt|parmesan|feta/.test(n))        return 'Dairy';
    if (/oil|sauce|broth|sugar|salt|pepper|spice|vinegar|soy/.test(n))  return 'Staples';
    return 'Produce';
  }

  function extractName(rawText) {
    return rawText
      .split(',')[0]
      .trim()
      .replace(/^[\d½¼¾⅓⅔⅛]+\s*/, '')
      .replace(/^(cups?|tbsp|tsp|oz|lbs?|g|kg|ml|l|cans?|bunch|head|cloves?|slices?|large|medium|small|fresh|frozen|dried)\s+/i, '')
      .trim();
  }

  function addMissingToGrocery() {
    const GROCERY_KEY = 'groceryItems_v5';
    let groceryItems = JSON.parse(localStorage.getItem(GROCERY_KEY) || '[]');
    let added = 0;

    missingItems.forEach(text => {
      const name = extractName(text);
      if (!name) return;
      if (!groceryItems.some(g => g.name.toLowerCase() === name.toLowerCase())) {
        groceryItems.push({ name, category: guessCategory(name), unit: '', price: 0, qty: 1, checked: false });
        added++;
      }
    });

    localStorage.setItem(GROCERY_KEY, JSON.stringify(groceryItems));
    showToast('Added ' + added + ' item' + (added !== 1 ? 's' : '') + ' to Grocery List');
    missingBtn.classList.add('hidden');
  }

  function showToast(message) {
    const toast = document.getElementById('toast');
    toast.textContent = message;
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 2500);
  }

  function markCompleted() {
    let pantry = JSON.parse(localStorage.getItem('pantryItems') || '[]');
    let removed = 0;

    INGREDIENTS.forEach(ing => {
      const idx = pantry.findIndex(p =>
        p.name.toLowerCase().includes(ing.key.toLowerCase()) ||
        ing.key.toLowerCase().includes(p.name.toLowerCase().split(' ')[0])
      );
      if (idx !== -1) {
        pantry[idx].qty = (pantry[idx].qty || 1) - 1;
        if (pantry[idx].qty <= 0) {
          pantry.splice(idx, 1);
        }
        removed++;
      }
    });

    localStorage.setItem('pantryItems', JSON.stringify(pantry));

    const btn = document.getElementById('completeBtn');
    btn.innerHTML = '<span class="material-icons-round">check_circle</span> Completed!';
    btn.disabled = true;
    btn.style.opacity = '0.6';
    btn.style.cursor = 'default';

    showToast(removed > 0
      ? removed + ' ingredient' + (removed !== 1 ? 's' : '') + ' removed from pantry'
      : 'Recipe marked complete');
  }

  function addToPlan() {
    window.location.href = 'myplan.php?add=Egg Fried Rice';
  }
</script>

</body>
</html>
