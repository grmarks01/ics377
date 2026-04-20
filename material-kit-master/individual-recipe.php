<?php
$recipe = $_GET['recipe'] ?? '';

$heroPages = [
  'Chicken Rice'   => 'chickenrice.php',
  'Egg Fried Rice' => 'eggfriedrice.php',
  'Tomato Soup'    => 'tomatosoup.php',
];

if (isset($heroPages[$recipe])) {
  header('Location: ' . $heroPages[$recipe]);
  exit;
}

$recipeName = htmlspecialchars($recipe ?: 'Recipe');
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $recipeName ?> - Recipe</title>

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
    background: #e8eaf6;
    color: var(--dark);
    font-size: 0.75rem;
    font-weight: 700;
    border-radius: 20px;
    padding: 4px 12px;
    margin-bottom: 12px;
  }

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

  <span class="badge">Recipe Preview</span>

  <h1 class="recipe-title" id="recipeTitle"></h1>

  <div class="recipe-meta">
    <div class="meta-item">
      <span class="material-icons-round">schedule</span>
      <span id="metaTime">–</span> minutes
    </div>
    <div class="meta-item">
      <span class="material-icons-round">local_fire_department</span>
      <span id="metaCal">–</span> calories
    </div>
    <div class="meta-item">
      <span class="material-icons-round">attach_money</span>
      $<span id="metaCost">–</span> per serving
    </div>
  </div>

  <div class="action-row">
    <button class="btn btn-primary" id="completeBtn" onclick="markCompleted()">
      <span class="material-icons-round">check_circle</span>
      Mark Completed
    </button>
    <button class="btn btn-secondary" id="addToPlanBtn">
      <span class="material-icons-round">add_circle_outline</span>
      Add to Plan
    </button>
  </div>

  <div class="section">
    <h2 class="section-title">Ingredients</h2>
    <div class="ingredient-list" id="ingredientList"></div>
  </div>

  <div class="section">
    <h2 class="section-title">Instructions</h2>
    <div class="instruction-list" id="instructionList"></div>
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

  const FALLBACK_INGREDIENTS = {
    'Avocado Toast':    ['2 slices sourdough bread', '1 ripe avocado', '1 lemon, juiced', 'Red pepper flakes', 'Salt and pepper to taste'],
    'Asparagus Soup':   ['1 bunch asparagus, trimmed', '1 onion, diced', '2 cloves garlic', '2 cups vegetable broth', '1 tbsp olive oil', 'Salt and pepper to taste'],
    'Bean Tacos':       ['1 can black beans, drained', '8 small tortillas', '1 cup shredded lettuce', '1 tomato, diced', '½ cup salsa', '½ cup sour cream'],
    'Caesar Salad':     ['1 head romaine lettuce', '½ cup Caesar dressing', '½ cup croutons', '¼ cup parmesan, shaved', 'Black pepper to taste'],
    'Greek Salad':      ['2 cups cherry tomatoes', '1 cucumber, sliced', '½ red onion, sliced', '½ cup kalamata olives', '½ cup feta cheese', '3 tbsp olive oil'],
    'Grilled Corn':     ['4 ears of corn', '2 tbsp butter', '1 lime', 'Chili powder to taste', 'Salt to taste'],
    'Lentil Stew':      ['1 cup red lentils', '1 onion, diced', '2 carrots, diced', '2 cloves garlic', '1 can diced tomatoes', '3 cups vegetable broth', '1 tsp cumin'],
    'Mushroom Pasta':   ['12 oz pasta', '2 cups mushrooms, sliced', '3 cloves garlic', '2 tbsp olive oil', '½ cup parmesan', 'Fresh parsley', 'Salt and pepper'],
    'Omelette':         ['3 large eggs', '2 tbsp butter', '¼ cup cheese, shredded', '2 tbsp milk', 'Salt and pepper'],
    'Pasta Primavera':  ['12 oz pasta', '1 zucchini, sliced', '1 bell pepper, sliced', '1 cup cherry tomatoes', '3 cloves garlic', '3 tbsp olive oil', 'Parmesan to serve'],
    'Pea Risotto':      ['1½ cups arborio rice', '1 cup frozen peas', '1 onion, diced', '4 cups vegetable broth', '½ cup parmesan', '2 tbsp butter'],
    'Peanut Noodles':   ['8 oz noodles', '3 tbsp peanut butter', '2 tbsp soy sauce', '1 tbsp sesame oil', '1 lime', '2 cloves garlic', 'Green onions to garnish'],
    'Quesadilla':       ['4 large flour tortillas', '1½ cups shredded cheese', '½ cup black beans', '½ bell pepper, diced', '1 tbsp oil', 'Sour cream to serve'],
    'Rice & Beans':     ['1 cup long grain rice', '1 can kidney beans, drained', '1 onion, diced', '2 cloves garlic', '1 can diced tomatoes', '1 tsp cumin'],
    'Spring Pasta':     ['12 oz pasta', '1 cup snap peas', '1 cup asparagus, chopped', '2 cloves garlic', '3 tbsp olive oil', 'Lemon zest', 'Parmesan to serve'],
    'Strawberry Salad': ['4 cups mixed greens', '1 cup strawberries, sliced', '¼ cup walnuts', '¼ cup feta cheese', '3 tbsp balsamic vinaigrette'],
    'Tuna Wrap':        ['2 large flour tortillas', '1 can tuna, drained', '2 tbsp mayo', '1 cup lettuce', '1 tomato, sliced', 'Salt and pepper'],
    'Veggie Soup':      ['2 carrots, diced', '2 celery stalks, diced', '1 onion, diced', '1 can diced tomatoes', '3 cups vegetable broth', '1 cup green beans', '2 cloves garlic'],
    'Veggie Stir Fry':  ['2 cups broccoli florets', '1 bell pepper, sliced', '1 carrot, julienned', '2 cloves garlic', '2 tbsp soy sauce', '1 tbsp sesame oil', 'Cooked rice to serve'],
  };

  const DEFAULT_STEPS = [
    'Gather and prep all ingredients — wash, chop, and measure everything before you start.',
    'Heat your pan or pot over medium to medium-high heat with a little oil or butter.',
    'Add aromatics (garlic, onion) first and cook until softened and fragrant, about 2–3 minutes.',
    'Add the main ingredients and cook, stirring occasionally, until done.',
    'Season with salt, pepper, and any spices. Taste and adjust.',
    'Plate and serve immediately. Store leftovers in an airtight container for up to 3 days.',
  ];

  // ── Read recipe name from URL ──
  const params     = new URLSearchParams(window.location.search);
  const recipeName = params.get('recipe') || 'Recipe';
  const rd         = RECIPE_DATA[recipeName] || {};

  // ── Populate meta ──
  document.getElementById('recipeTitle').textContent = recipeName;
  document.getElementById('metaTime').textContent    = rd.time || '–';
  document.getElementById('metaCal').textContent     = rd.cal  || '–';
  document.getElementById('metaCost').textContent    = rd.cost ? rd.cost.toFixed(2) : '–';
  document.getElementById('addToPlanBtn').onclick    = () => {
    window.location.href = 'myplan.php?add=' + encodeURIComponent(recipeName);
  };

  // ── Ingredients (simple checklist, no pantry logic needed here) ──
  const ingredients = FALLBACK_INGREDIENTS[recipeName] || ['See full recipe for ingredients.'];
  const listEl      = document.getElementById('ingredientList');

  ingredients.forEach(text => {
    const item = document.createElement('div');
    item.className = 'ingredient-item';
    item.innerHTML = `
      <div class="ingredient-checkbox" onclick="toggleIngredient(this)"></div>
      <div class="ingredient-text">${text}</div>
    `;
    listEl.appendChild(item);
  });

  // ── Instructions ──
  const instrEl = document.getElementById('instructionList');
  DEFAULT_STEPS.forEach((step, i) => {
    instrEl.innerHTML += `
      <div class="instruction-item">
        <div class="step-number">${i + 1}</div>
        <div class="step-text">${step}</div>
      </div>`;
  });

  // ── Helpers ──
  function toggleIngredient(checkbox) {
    checkbox.classList.toggle('checked');
    checkbox.nextElementSibling.classList.toggle('checked');
  }

  function showToast(message) {
    const toast = document.getElementById('toast');
    toast.textContent = message;
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 2500);
  }

  function extractName(rawText) {
    return rawText
      .split(',')[0]
      .trim()
      .replace(/^[\d½¼¾⅓⅔⅛]+\s*/, '')
      .replace(/^(cups?|tbsp|tsp|oz|lbs?|g|kg|ml|l|cans?|bunch|head|cloves?|slices?|large|medium|small|fresh|frozen|dried)\s+/i, '')
      .trim();
  }

  function markCompleted() {
    const ingredients = FALLBACK_INGREDIENTS[recipeName] || [];
    let pantry = JSON.parse(localStorage.getItem('pantryItems') || '[]');
    let removed = 0;

    ingredients.forEach(text => {
      const name = extractName(text);
      if (!name) return;
      const idx = pantry.findIndex(p =>
        p.name.toLowerCase().includes(name.toLowerCase()) ||
        name.toLowerCase().includes(p.name.toLowerCase().split(' ')[0])
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
</script>

</body>
</html>
