<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Meal Planner – Find Recipes</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link href="assets/css/material-kit.css" rel="stylesheet">

  <style>
    /* ═══ BRAND COLORS ═══ */
    :root {
      --primary:   #B85042;
      --secondary: #E7E8D1;
      --accent:    #A7BEAE;
      --dark:      #344767;
      --text:      #7b809a;
      --bg:        #f8f9fa;
    }

    body { font-family: 'Roboto', sans-serif;
    background-color: var(--bg); padding-bottom: 80px; }

    /* ── Top header ── */
    .app-header {
      background: #fff; border-bottom: 1px solid #e9ecef;
      padding: 22px 16px 18px; position: sticky; top: 0; z-index: 100;
    }
    .app-header h1 {
      margin: 0; font-size: 2rem; font-weight: 800;
      color: var(--primary); text-align: center; letter-spacing: -0.5px;
    }

    /* ── Search bar ── */
    .search-wrapper {
      background: #fff; border-bottom: 1px solid #e9ecef;
      padding: 12px 20px 14px; display: flex; align-items: center; gap: 10px;
    }
    .search-wrapper .input-group {
      border-radius: 50px; overflow: hidden; background: #f0f2f5;
      flex: 1; max-width: 600px; margin: 0 auto;
    }
    .search-wrapper .form-control {
      background: #f0f2f5; border: none; box-shadow: none; font-size: 0.9rem;
      text-align: center; border-radius: 50px !important; padding: 11px 20px;
    }
    .search-wrapper .form-control::placeholder { text-align: center; }
    .search-wrapper .form-control:focus {
      background: #f0f2f5; box-shadow: none; text-align: left; outline: none;
    }
    .search-wrapper .form-control:focus::placeholder { text-align: left; }

    .filter-btn {
      background: #f0f2f5; border: none; border-radius: 50%;
      width: 44px; height: 44px; display: flex; align-items: center;
      justify-content: center; flex-shrink: 0; cursor: pointer;
      transition: background 0.15s; color: var(--dark);
    }
    .filter-btn:hover { background: #e2e5e9; }
    .filter-btn .material-icons-round { font-size: 1.3rem; }

    /* ── Page content ── */
    .page-content { max-width: 680px; margin: 0 auto; padding: 28px 0 24px; }
    .category-section { margin-bottom: 32px; }

    .category-header {
      display: flex; align-items: center; justify-content: center;
      gap: 16px; padding: 0 20px; margin-bottom: 14px;
    }
    .cat-label-wrap { flex: 1; text-align: center; }
    .cat-label { font-size: 1.1rem; font-weight: 700; color: var(--dark); margin: 0; }

    .scroll-arrow {
      background: none; border: none; padding: 4px; cursor: pointer;
      color: var(--dark); display: flex; align-items: center; border-radius: 50%;
      transition: background 0.15s, color 0.15s; flex-shrink: 0;
    }
    .scroll-arrow:hover { background: #e9ecef; }
    .scroll-arrow .material-icons-round { font-size: 1.8rem; }

    .card-row-wrapper { overflow: hidden; padding: 0 20px; }
    .card-row {
      display: flex; gap: 14px; overflow-x: auto; scroll-behavior: smooth;
      -webkit-overflow-scrolling: touch; scrollbar-width: none;
      -ms-overflow-style: none; padding-bottom: 6px;
    }
    .card-row::-webkit-scrollbar { display: none; }

    /* ── Recipe card ── */
    .recipe-card {
      background: #fff; border-radius: 16px; overflow: hidden;
      box-shadow: 0 2px 12px rgba(0,0,0,0.07);
      display: block; flex: 0 0 148px;
      transition: box-shadow 0.2s, transform 0.15s;
      text-decoration: none; color: inherit;
    }
    .recipe-card:hover {
      box-shadow: 0 6px 20px rgba(0,0,0,0.11);
      transform: translateY(-2px); color: inherit;
    }

    /* Image — clean, no overlaid buttons */
    .recipe-img {
      width: 100%; aspect-ratio: 4 / 3; background: #f0f2f5;
      display: flex; align-items: center; justify-content: center;
      text-decoration: none; display: block;
    }
    .recipe-img .material-icons-round { font-size: 2.2rem; color: #c8ccd4; }

    /* ── Action bar ── */
    .card-actions {
      display: flex; align-items: center; justify-content: space-around;
      border-top: 1px solid #f0f2f5; padding: 6px 4px;
    }
    .action-btn {
      background: none; border: none; cursor: pointer;
      display: flex; align-items: center; justify-content: center;
      width: 36px; height: 36px; border-radius: 50%;
      transition: background 0.15s; padding: 0;
    }
    .action-btn:hover { background: #f0f2f5; }
    .action-btn .material-icons-round { font-size: 1.15rem; pointer-events: none; }

    /* + Add to Plan */
    .add-btn .material-icons-round { color: var(--primary); }

    /* Bookmark */
    .save-btn .material-icons-round { color: #c8ccd4; transition: color 0.2s; }
    .save-btn.saved .material-icons-round { color: var(--primary); }

    /* Divider between action buttons */
    .action-divider { width: 1px; height: 20px; background: #e9ecef; flex-shrink: 0; }

    /* Recipe info */
    .recipe-info { padding: 8px 10px 10px; }
    .recipe-name { font-size: 0.82rem; font-weight: 700; color: var(--dark); margin: 0 0 3px; line-height: 1.25; }
    .recipe-meta {
      font-size: 0.72rem; color: var(--text); margin: 0;
      display: flex; align-items: center; gap: 3px; flex-wrap: wrap;
    }
    .recipe-meta .material-icons-round { font-size: 0.8rem; vertical-align: -2px; }

    .badge-ready {
      display: inline-block; background: #e8f5e9; color: #2e7d32;
      font-size: 0.62rem; font-weight: 700; border-radius: 20px;
      padding: 2px 7px; margin-top: 4px;
    }

    /* ── Bottom nav ── */
    .bottom-nav {
      position: fixed; bottom: 0; left: 0; right: 0; background: #fff;
      border-top: 1px solid #e9ecef; display: flex; justify-content: space-around;
      align-items: center; padding: 6px 0 8px; z-index: 200;
      box-shadow: 0 -2px 10px rgba(0,0,0,0.06);
    }
    .bottom-nav a {
      display: flex; flex-direction: column; align-items: center;
      text-decoration: none; color: var(--text); font-size: 0.55rem;
      font-weight: 500; gap: 2px; flex: 1; transition: color 0.2s;
    }
    .bottom-nav a .material-icons-round { font-size: 1.4rem; }
    .bottom-nav a.active { color: var(--primary); }
    .bottom-nav a:hover { color: var(--dark); }

    /* ── Filter sheet ── */
    .filter-backdrop {
      display: none; position: fixed; inset: 0;
      background: rgba(0,0,0,0.35); z-index: 300; align-items: flex-end;
    }
    .filter-backdrop.open { display: flex; }
    .filter-sheet {
      background: #fff; width: 100%; border-radius: 20px 20px 0 0;
      padding: 20px 24px 36px; max-width: 680px; margin: 0 auto;
    }
    .filter-sheet-header {
      display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px;
    }
    .filter-sheet-header h6 { font-size: 1.05rem; font-weight: 700; color: var(--dark); margin: 0; }
    .filter-close-btn {
      background: #f0f2f5; border: none; border-radius: 50%;
      width: 32px; height: 32px; display: flex; align-items: center;
      justify-content: center; cursor: pointer; color: var(--dark);
    }
    .filter-close-btn .material-icons-round { font-size: 1.1rem; }
    .filter-group-label {
      font-size: 0.72rem; font-weight: 700; text-transform: uppercase;
      letter-spacing: 0.07em; color: var(--text); margin: 16px 0 8px;
    }
    .filter-chips { display: flex; flex-wrap: wrap; gap: 8px; }
    .filter-chip {
      background: #f0f2f5; border: none; border-radius: 50px; padding: 7px 16px;
      font-size: 0.8rem; font-weight: 500; color: var(--dark); cursor: pointer;
      transition: background 0.15s, color 0.15s;
    }
    .filter-chip.selected { background: var(--primary); color: #fff; }
    .filter-apply-btn {
      margin-top: 24px; width: 100%;
      background: linear-gradient(195deg, var(--primary), #962f22);
      color: #fff; border: none; border-radius: 10px; padding: 13px;
      font-size: 0.9rem; font-weight: 600; cursor: pointer; transition: opacity 0.15s;
    }
    .filter-apply-btn:hover { opacity: 0.9; }

    /* ── Unsave confirmation popup ── */
    .confirm-backdrop {
      display: none; position: fixed; inset: 0;
      background: rgba(0,0,0,0.35); z-index: 400;
      align-items: center; justify-content: center; padding: 20px;
    }
    .confirm-backdrop.open { display: flex; }
    .confirm-dialog {
      background: #fff; border-radius: 20px; padding: 28px 24px 24px;
      max-width: 320px; width: 100%; text-align: center;
      box-shadow: 0 8px 32px rgba(0,0,0,0.14);
    }
    .confirm-dialog .confirm-icon { font-size: 2.4rem; color: var(--dark); margin-bottom: 12px; }
    .confirm-dialog h6 { font-size: 1rem; font-weight: 700; color: var(--dark); margin: 0 0 8px; }
    .confirm-dialog p { font-size: 0.85rem; color: var(--text); margin: 0 0 24px; line-height: 1.5; }
    .confirm-actions { display: flex; gap: 10px; }
    .confirm-cancel {
      flex: 1; background: #f0f2f5; border: none; border-radius: 10px;
      padding: 12px; font-size: 0.88rem; font-weight: 600; color: var(--dark);
      cursor: pointer; transition: background 0.15s;
    }
    .confirm-cancel:hover { background: #e2e5e9; }
    .confirm-remove {
      flex: 1; background: var(--primary); border: none; border-radius: 10px;
      padding: 12px; font-size: 0.88rem; font-weight: 600; color: #fff;
      cursor: pointer; transition: opacity 0.15s;
    }
    .confirm-remove:hover { opacity: 0.88; }

    /* ── Toast notification ── */
    .toast {
      position: fixed; bottom: 90px; left: 50%; transform: translateX(-50%);
      background: var(--dark); color: #fff; padding: 10px 20px; border-radius: 50px;
      font-size: 0.82rem; font-weight: 600; z-index: 500;
      opacity: 0; transition: opacity 0.2s; pointer-events: none; white-space: nowrap;
    }
    .toast.show { opacity: 1; }
  </style>
</head>

<body>

  <div class="app-header">
    <h1><span class="material-icons-round" style="font-size:1.6rem;vertical-align:-4px;margin-right:6px;">search</span>Find Recipes</h1>
  </div>

  <div class="search-wrapper">
    <div class="input-group">
      <input type="text" class="form-control" id="recipeSearch" placeholder="🔍  Search Recipes...">
    </div>
    <button class="filter-btn" id="filterToggle" aria-label="Filter recipes">
      <span class="material-icons-round">tune</span>
    </button>
  </div>

  <div class="page-content">

    <!-- ── Ready to Make ── -->
    <div class="category-section">
      <div class="category-header">
        <button class="scroll-arrow" onclick="scrollRow('row-ready', -1)"><span class="material-icons-round">arrow_back</span></button>
        <div class="cat-label-wrap"><p class="cat-label">Ready to Make</p></div>
        <button class="scroll-arrow" onclick="scrollRow('row-ready', 1)"><span class="material-icons-round">arrow_forward</span></button>
      </div>
      <div class="card-row-wrapper"><div class="card-row" id="row-ready">

        <div class="recipe-card" data-name="Chicken Rice">
          <a href="individual-recipe.php?recipe=Chicken%20Rice" class="recipe-img"><span class="material-icons-round">restaurant</span></a>
          <div class="card-actions">
            <button type="button" class="action-btn add-btn" onclick="addToPlan(this)" aria-label="Add to Plan"><span class="material-icons-round">add_circle_outline</span></button>
            <div class="action-divider"></div>
            <button type="button" class="action-btn save-btn" onclick="handleSave(this)" aria-label="Save recipe"><span class="material-icons-round">bookmark_border</span></button>
          </div>
          <div class="recipe-info">
            <p class="recipe-name">Chicken Rice</p>
            <p class="recipe-meta"><span class="material-icons-round">schedule</span> 30 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 480 cal</p>
            <span class="badge-ready">✓ All ingredients</span>
          </div>
        </div>

        <div class="recipe-card" data-name="Egg Fried Rice">
          <a href="individual-recipe.php?recipe=Egg%20Fried%20Rice" class="recipe-img"><span class="material-icons-round">restaurant</span></a>
          <div class="card-actions">
            <button type="button" class="action-btn add-btn" onclick="addToPlan(this)" aria-label="Add to Plan"><span class="material-icons-round">add_circle_outline</span></button>
            <div class="action-divider"></div>
            <button type="button" class="action-btn save-btn" onclick="handleSave(this)" aria-label="Save recipe"><span class="material-icons-round">bookmark_border</span></button>
          </div>
          <div class="recipe-info">
            <p class="recipe-name">Egg Fried Rice</p>
            <p class="recipe-meta"><span class="material-icons-round">schedule</span> 15 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 380 cal</p>
            <span class="badge-ready">✓ All ingredients</span>
          </div>
        </div>

      </div></div>
    </div>

    <!-- ── Quick ── -->
    <div class="category-section">
      <div class="category-header">
        <button class="scroll-arrow" onclick="scrollRow('row-quick', -1)"><span class="material-icons-round">arrow_back</span></button>
        <div class="cat-label-wrap"><p class="cat-label">Quick</p></div>
        <button class="scroll-arrow" onclick="scrollRow('row-quick', 1)"><span class="material-icons-round">arrow_forward</span></button>
      </div>
      <div class="card-row-wrapper"><div class="card-row" id="row-quick">

        <div class="recipe-card" data-name="Egg Fried Rice">
          <a href="individual-recipe.php?recipe=Egg%20Fried%20Rice" class="recipe-img"><span class="material-icons-round">restaurant</span></a>
          <div class="card-actions">
            <button type="button" class="action-btn add-btn" onclick="addToPlan(this)" aria-label="Add to Plan"><span class="material-icons-round">add_circle_outline</span></button>
            <div class="action-divider"></div>
            <button type="button" class="action-btn save-btn saved" onclick="handleSave(this)" aria-label="Unsave recipe"><span class="material-icons-round">bookmark</span></button>
          </div>
          <div class="recipe-info">
            <p class="recipe-name">Egg Fried Rice</p>
            <p class="recipe-meta"><span class="material-icons-round">schedule</span> 15 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 380 cal</p>
          </div>
        </div>

        <div class="recipe-card" data-name="Greek Salad">
          <a href="individual-recipe.php?recipe=Greek%20Salad" class="recipe-img"><span class="material-icons-round">restaurant</span></a>
          <div class="card-actions">
            <button type="button" class="action-btn add-btn" onclick="addToPlan(this)" aria-label="Add to Plan"><span class="material-icons-round">add_circle_outline</span></button>
            <div class="action-divider"></div>
            <button type="button" class="action-btn save-btn saved" onclick="handleSave(this)" aria-label="Unsave recipe"><span class="material-icons-round">bookmark</span></button>
          </div>
          <div class="recipe-info">
            <p class="recipe-name">Greek Salad</p>
            <p class="recipe-meta"><span class="material-icons-round">schedule</span> 10 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 220 cal</p>
          </div>
        </div>

        <div class="recipe-card" data-name="Avocado Toast">
          <a href="individual-recipe.php?recipe=Avocado%20Toast" class="recipe-img"><span class="material-icons-round">restaurant</span></a>
          <div class="card-actions">
            <button type="button" class="action-btn add-btn" onclick="addToPlan(this)" aria-label="Add to Plan"><span class="material-icons-round">add_circle_outline</span></button>
            <div class="action-divider"></div>
            <button type="button" class="action-btn save-btn saved" onclick="handleSave(this)" aria-label="Unsave recipe"><span class="material-icons-round">bookmark</span></button>
          </div>
          <div class="recipe-info">
            <p class="recipe-name">Avocado Toast</p>
            <p class="recipe-meta"><span class="material-icons-round">schedule</span> 8 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 290 cal</p>
          </div>
        </div>

        <div class="recipe-card" data-name="Quesadilla">
          <a href="individual-recipe.php?recipe=Quesadilla" class="recipe-img"><span class="material-icons-round">restaurant</span></a>
          <div class="card-actions">
            <button type="button" class="action-btn add-btn" onclick="addToPlan(this)" aria-label="Add to Plan"><span class="material-icons-round">add_circle_outline</span></button>
            <div class="action-divider"></div>
            <button type="button" class="action-btn save-btn" onclick="handleSave(this)" aria-label="Save recipe"><span class="material-icons-round">bookmark_border</span></button>
          </div>
          <div class="recipe-info">
            <p class="recipe-name">Quesadilla</p>
            <p class="recipe-meta"><span class="material-icons-round">schedule</span> 12 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 430 cal</p>
          </div>
        </div>

        <div class="recipe-card" data-name="Tuna Wrap">
          <a href="individual-recipe.php?recipe=Tuna%20Wrap" class="recipe-img"><span class="material-icons-round">restaurant</span></a>
          <div class="card-actions">
            <button type="button" class="action-btn add-btn" onclick="addToPlan(this)" aria-label="Add to Plan"><span class="material-icons-round">add_circle_outline</span></button>
            <div class="action-divider"></div>
            <button type="button" class="action-btn save-btn" onclick="handleSave(this)" aria-label="Save recipe"><span class="material-icons-round">bookmark_border</span></button>
          </div>
          <div class="recipe-info">
            <p class="recipe-name">Tuna Wrap</p>
            <p class="recipe-meta"><span class="material-icons-round">schedule</span> 10 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 310 cal</p>
          </div>
        </div>

      </div></div>
    </div>

    <!-- ── Seasonal ── -->
    <div class="category-section">
      <div class="category-header">
        <button class="scroll-arrow" onclick="scrollRow('row-seasonal', -1)"><span class="material-icons-round">arrow_back</span></button>
        <div class="cat-label-wrap"><p class="cat-label">Seasonal</p></div>
        <button class="scroll-arrow" onclick="scrollRow('row-seasonal', 1)"><span class="material-icons-round">arrow_forward</span></button>
      </div>
      <div class="card-row-wrapper"><div class="card-row" id="row-seasonal">

        <div class="recipe-card" data-name="Spring Pasta">
          <a href="individual-recipe.php?recipe=Spring%20Pasta" class="recipe-img"><span class="material-icons-round">restaurant</span></a>
          <div class="card-actions">
            <button type="button" class="action-btn add-btn" onclick="addToPlan(this)" aria-label="Add to Plan"><span class="material-icons-round">add_circle_outline</span></button>
            <div class="action-divider"></div>
            <button type="button" class="action-btn save-btn" onclick="handleSave(this)" aria-label="Save recipe"><span class="material-icons-round">bookmark_border</span></button>
          </div>
          <div class="recipe-info">
            <p class="recipe-name">Spring Pasta</p>
            <p class="recipe-meta"><span class="material-icons-round">schedule</span> 25 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 490 cal</p>
          </div>
        </div>

        <div class="recipe-card" data-name="Asparagus Soup">
          <a href="individual-recipe.php?recipe=Asparagus%20Soup" class="recipe-img"><span class="material-icons-round">restaurant</span></a>
          <div class="card-actions">
            <button type="button" class="action-btn add-btn" onclick="addToPlan(this)" aria-label="Add to Plan"><span class="material-icons-round">add_circle_outline</span></button>
            <div class="action-divider"></div>
            <button type="button" class="action-btn save-btn" onclick="handleSave(this)" aria-label="Save recipe"><span class="material-icons-round">bookmark_border</span></button>
          </div>
          <div class="recipe-info">
            <p class="recipe-name">Asparagus Soup</p>
            <p class="recipe-meta"><span class="material-icons-round">schedule</span> 35 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 180 cal</p>
          </div>
        </div>

        <div class="recipe-card" data-name="Pea Risotto">
          <a href="individual-recipe.php?recipe=Pea%20Risotto" class="recipe-img"><span class="material-icons-round">restaurant</span></a>
          <div class="card-actions">
            <button type="button" class="action-btn add-btn" onclick="addToPlan(this)" aria-label="Add to Plan"><span class="material-icons-round">add_circle_outline</span></button>
            <div class="action-divider"></div>
            <button type="button" class="action-btn save-btn" onclick="handleSave(this)" aria-label="Save recipe"><span class="material-icons-round">bookmark_border</span></button>
          </div>
          <div class="recipe-info">
            <p class="recipe-name">Pea Risotto</p>
            <p class="recipe-meta"><span class="material-icons-round">schedule</span> 40 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 520 cal</p>
          </div>
        </div>

        <div class="recipe-card" data-name="Strawberry Salad">
          <a href="individual-recipe.php?recipe=Strawberry%20Salad" class="recipe-img"><span class="material-icons-round">restaurant</span></a>
          <div class="card-actions">
            <button type="button" class="action-btn add-btn" onclick="addToPlan(this)" aria-label="Add to Plan"><span class="material-icons-round">add_circle_outline</span></button>
            <div class="action-divider"></div>
            <button type="button" class="action-btn save-btn" onclick="handleSave(this)" aria-label="Save recipe"><span class="material-icons-round">bookmark_border</span></button>
          </div>
          <div class="recipe-info">
            <p class="recipe-name">Strawberry Salad</p>
            <p class="recipe-meta"><span class="material-icons-round">schedule</span> 10 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 160 cal</p>
          </div>
        </div>

        <div class="recipe-card" data-name="Grilled Corn">
          <a href="individual-recipe.php?recipe=Grilled%20Corn" class="recipe-img"><span class="material-icons-round">restaurant</span></a>
          <div class="card-actions">
            <button type="button" class="action-btn add-btn" onclick="addToPlan(this)" aria-label="Add to Plan"><span class="material-icons-round">add_circle_outline</span></button>
            <div class="action-divider"></div>
            <button type="button" class="action-btn save-btn" onclick="handleSave(this)" aria-label="Save recipe"><span class="material-icons-round">bookmark_border</span></button>
          </div>
          <div class="recipe-info">
            <p class="recipe-name">Grilled Corn</p>
            <p class="recipe-meta"><span class="material-icons-round">schedule</span> 20 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 200 cal</p>
          </div>
        </div>

      </div></div>
    </div>

    <!-- ── Budget Friendly ── -->
    <div class="category-section">
      <div class="category-header">
        <button class="scroll-arrow" onclick="scrollRow('row-budget', -1)"><span class="material-icons-round">arrow_back</span></button>
        <div class="cat-label-wrap"><p class="cat-label">Budget Friendly</p></div>
        <button class="scroll-arrow" onclick="scrollRow('row-budget', 1)"><span class="material-icons-round">arrow_forward</span></button>
      </div>
      <div class="card-row-wrapper"><div class="card-row" id="row-budget">

        <div class="recipe-card" data-name="Lentil Stew">
          <a href="individual-recipe.php?recipe=Lentil%20Stew" class="recipe-img"><span class="material-icons-round">restaurant</span></a>
          <div class="card-actions">
            <button type="button" class="action-btn add-btn" onclick="addToPlan(this)" aria-label="Add to Plan"><span class="material-icons-round">add_circle_outline</span></button>
            <div class="action-divider"></div>
            <button type="button" class="action-btn save-btn saved" onclick="handleSave(this)" aria-label="Unsave recipe"><span class="material-icons-round">bookmark</span></button>
          </div>
          <div class="recipe-info">
            <p class="recipe-name">Lentil Stew</p>
            <p class="recipe-meta"><span class="material-icons-round">schedule</span> 40 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 290 cal</p>
          </div>
        </div>

        <div class="recipe-card" data-name="Bean Tacos">
          <a href="individual-recipe.php?recipe=Bean%20Tacos" class="recipe-img"><span class="material-icons-round">restaurant</span></a>
          <div class="card-actions">
            <button type="button" class="action-btn add-btn" onclick="addToPlan(this)" aria-label="Add to Plan"><span class="material-icons-round">add_circle_outline</span></button>
            <div class="action-divider"></div>
            <button type="button" class="action-btn save-btn saved" onclick="handleSave(this)" aria-label="Unsave recipe"><span class="material-icons-round">bookmark</span></button>
          </div>
          <div class="recipe-info">
            <p class="recipe-name">Bean Tacos</p>
            <p class="recipe-meta"><span class="material-icons-round">schedule</span> 20 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 340 cal</p>
          </div>
        </div>

        <div class="recipe-card" data-name="Rice &amp; Beans">
          <a href="individual-recipe.php?recipe=Rice%20%26amp;%20Beans" class="recipe-img"><span class="material-icons-round">restaurant</span></a>
          <div class="card-actions">
            <button type="button" class="action-btn add-btn" onclick="addToPlan(this)" aria-label="Add to Plan"><span class="material-icons-round">add_circle_outline</span></button>
            <div class="action-divider"></div>
            <button type="button" class="action-btn save-btn" onclick="handleSave(this)" aria-label="Save recipe"><span class="material-icons-round">bookmark_border</span></button>
          </div>
          <div class="recipe-info">
            <p class="recipe-name">Rice &amp; Beans</p>
            <p class="recipe-meta"><span class="material-icons-round">schedule</span> 30 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 320 cal</p>
          </div>
        </div>

        <div class="recipe-card" data-name="Veggie Soup">
          <a href="individual-recipe.php?recipe=Veggie%20Soup" class="recipe-img"><span class="material-icons-round">restaurant</span></a>
          <div class="card-actions">
            <button type="button" class="action-btn add-btn" onclick="addToPlan(this)" aria-label="Add to Plan"><span class="material-icons-round">add_circle_outline</span></button>
            <div class="action-divider"></div>
            <button type="button" class="action-btn save-btn" onclick="handleSave(this)" aria-label="Save recipe"><span class="material-icons-round">bookmark_border</span></button>
          </div>
          <div class="recipe-info">
            <p class="recipe-name">Veggie Soup</p>
            <p class="recipe-meta"><span class="material-icons-round">schedule</span> 35 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 180 cal</p>
          </div>
        </div>


        <div class="recipe-card" data-name="Tomato Soup">
          <a href="individual-recipe.php?recipe=Tomato%20Soup" class="recipe-img"><span class="material-icons-round">restaurant</span></a>
          <div class="card-actions">
            <button type="button" class="action-btn add-btn" onclick="addToPlan(this)" aria-label="Add to Plan"><span class="material-icons-round">add_circle_outline</span></button>
            <div class="action-divider"></div>
            <button type="button" class="action-btn save-btn" onclick="handleSave(this)" aria-label="Save recipe"><span class="material-icons-round">bookmark_border</span></button>
          </div>
          <div class="recipe-info">
            <p class="recipe-name">Tomato Soup</p>
            <p class="recipe-meta"><span class="material-icons-round">schedule</span> 25 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 210 cal</p>
          </div>
        </div>
        <div class="recipe-card" data-name="Peanut Noodles">
          <a href="individual-recipe.php?recipe=Peanut%20Noodles" class="recipe-img"><span class="material-icons-round">restaurant</span></a>
          <div class="card-actions">
            <button type="button" class="action-btn add-btn" onclick="addToPlan(this)" aria-label="Add to Plan"><span class="material-icons-round">add_circle_outline</span></button>
            <div class="action-divider"></div>
            <button type="button" class="action-btn save-btn" onclick="handleSave(this)" aria-label="Save recipe"><span class="material-icons-round">bookmark_border</span></button>
          </div>
          <div class="recipe-info">
            <p class="recipe-name">Peanut Noodles</p>
            <p class="recipe-meta"><span class="material-icons-round">schedule</span> 15 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 380 cal</p>
          </div>
        </div>

      </div></div>
    </div>

  </div><!-- /page-content -->

  <nav class="bottom-nav">
    <a href="index.php"><span class="material-icons-round">home</span>Home</a>
    <a href="myplan.php"><span class="material-icons-round">calendar_month</span>My Plan</a>
    <a href="pantry.php"><span class="material-icons-round">inventory_2</span>Pantry</a>
    <a href="my-recipes.php"><span class="material-icons-round">menu_book</span>My Recipes</a>
    <a href="find-recipes.php" class="active"><span class="material-icons-round">search</span>Find Recipes</a>
    <a href="budget.php"><span class="material-icons-round">account_balance_wallet</span>Budget</a>
    <a href="grocery.php"><span class="material-icons-round">shopping_cart</span>Grocery List</a>
  </nav>

  <footer style="text-align:center; padding: 16px; margin-bottom: 80px; font-size: 0.75rem; color: var(--text);">
    Built with <a href="https://www.creative-tim.com/product/material-kit" target="_blank" style="color:var(--text); font-weight:600;">Material Kit 3</a>
    by <a href="https://www.creative-tim.com" target="_blank" style="color:var(--text); font-weight:600;">Creative Tim</a>,
    licensed under <a href="https://github.com/creativetimofficial/material-kit/blob/master/LICENSE.md" target="_blank" style="color:var(--text); font-weight:600;">MIT</a>.
  </footer>

  <!-- Filter modal -->
  <div class="filter-backdrop" id="filterBackdrop">
    <div class="filter-sheet">
      <div class="filter-sheet-header">
        <h6>Filter Recipes</h6>
        <button class="filter-close-btn" id="filterClose"><span class="material-icons-round">close</span></button>
      </div>
      <div class="filter-group-label">Cook Time</div>
      <div class="filter-chips">
        <button class="filter-chip" onclick="toggleChip(this)">Under 15 min</button>
        <button class="filter-chip" onclick="toggleChip(this)">Under 30 min</button>
        <button class="filter-chip" onclick="toggleChip(this)">Under 60 min</button>
      </div>
      <div class="filter-group-label">Dietary</div>
      <div class="filter-chips">
        <button class="filter-chip" onclick="toggleChip(this)">Vegetarian</button>
        <button class="filter-chip" onclick="toggleChip(this)">Vegan</button>
        <button class="filter-chip" onclick="toggleChip(this)">Gluten-Free</button>
        <button class="filter-chip" onclick="toggleChip(this)">Dairy-Free</button>
      </div>
      <div class="filter-group-label">Pantry Match</div>
      <div class="filter-chips">
        <button class="filter-chip" onclick="toggleChip(this)">Ready to Make</button>
        <button class="filter-chip" onclick="toggleChip(this)">1–2 Missing</button>
      </div>
      <button class="filter-apply-btn" onclick="applyFilters()">Apply Filters</button>
    </div>
  </div>

  <!-- Unsave confirmation -->
  <div class="confirm-backdrop" id="confirmBackdrop">
    <div class="confirm-dialog">
      <span class="material-icons-round confirm-icon">bookmark_remove</span>
      <h6>Remove from My Recipes?</h6>
      <p id="confirmMessage">This recipe will be removed from your saved recipes.</p>
      <div class="confirm-actions">
        <button class="confirm-cancel" onclick="cancelUnsave()">Keep It</button>
        <button class="confirm-remove" onclick="confirmUnsave()">Remove</button>
      </div>
    </div>
  </div>

  <!-- Toast -->
  <div class="toast" id="toast"></div>

  <script src="assets/js/core/bootstrap.bundle.min.js"></script>
  <script src="assets/js/material-kit.js"></script>
  <script>
    // ── Shared localStorage key (same as my-recipes.php) ──
    const SAVED_KEY = 'mySavedRecipes_v1';

    // ── Sync saved state from localStorage on load ──
    (function syncSavedState() {
      const saved = JSON.parse(localStorage.getItem(SAVED_KEY) || '[]');
      saved.forEach(item => {
        const btn = document.querySelector(`.recipe-card[data-name="${item.name}"] .save-btn`);
        if (btn && !btn.classList.contains('saved')) {
          btn.classList.add('saved');
          btn.querySelector('.material-icons-round').textContent = 'bookmark';
          btn.setAttribute('aria-label', 'Unsave recipe');
        }
      });
    })();

    // ── URL params: day context from My Plan ──
    const _params  = new URLSearchParams(window.location.search);
    const _dayIdx  = _params.get('day');
    const _dayName = _params.get('dayName');
    const _date    = _params.get('date');

    if (_dayIdx !== null && _dayName) {
      // Show a subtle banner so users know they're in "picking" mode
      const info = document.createElement('div');
      info.style.cssText = 'background:var(--dark);color:#fff;padding:10px 20px;text-align:center;font-size:0.85rem;font-weight:600;';
      info.innerHTML = 'Selecting a recipe for ' + _dayName + ', ' + _date
        + ' &nbsp;·&nbsp; <a href="myplan.php" style="color:#f0f2f5;text-decoration:underline;">Cancel</a>';
      document.querySelector('.search-wrapper').insertAdjacentElement('beforebegin', info);
    }

    // ── Add to Plan — carries day context back to myplan.php ──
    function addToPlan(btn) {
      const name = btn.closest('.recipe-card').dataset.name;
      let url = 'myplan.php?add=' + encodeURIComponent(name);
      if (_dayIdx !== null) url += '&day=' + encodeURIComponent(_dayIdx);
      window.location.href = url;
    }

    // ── Save / Unsave ──
    let pendingUnsaveBtn = null;

    function handleSave(btn) {
      event.stopPropagation();
      const name = btn.closest('.recipe-card').dataset.name;
      if (btn.classList.contains('saved')) {
        pendingUnsaveBtn = btn;
        document.getElementById('confirmMessage').textContent =
          '"' + name + '" will be removed from your saved recipes.';
        document.getElementById('confirmBackdrop').classList.add('open');
      } else {
        btn.classList.add('saved');
        btn.querySelector('.material-icons-round').textContent = 'bookmark';
        btn.setAttribute('aria-label', 'Unsave recipe');
        // Persist to localStorage — newest first
        const saved = JSON.parse(localStorage.getItem(SAVED_KEY) || '[]');
        if (!saved.find(r => r.name === name)) {
          saved.unshift({ name: name, savedAt: Date.now() });
          localStorage.setItem(SAVED_KEY, JSON.stringify(saved));
        }
        showToast('Recipe saved to My Recipes');
      }
    }

    function cancelUnsave() {
      pendingUnsaveBtn = null;
      document.getElementById('confirmBackdrop').classList.remove('open');
    }

    function confirmUnsave() {
      if (pendingUnsaveBtn) {
        const name = pendingUnsaveBtn.closest('.recipe-card').dataset.name;
        pendingUnsaveBtn.classList.remove('saved');
        pendingUnsaveBtn.querySelector('.material-icons-round').textContent = 'bookmark_border';
        pendingUnsaveBtn.setAttribute('aria-label', 'Save recipe');
        // Remove from localStorage
        const saved = JSON.parse(localStorage.getItem(SAVED_KEY) || '[]');
        localStorage.setItem(SAVED_KEY, JSON.stringify(saved.filter(r => r.name !== name)));
        pendingUnsaveBtn = null;
      }
      document.getElementById('confirmBackdrop').classList.remove('open');
    }

    document.getElementById('confirmBackdrop').addEventListener('click', function(e) {
      if (e.target === this) cancelUnsave();
    });

    // ── Toast ──
    function showToast(msg) {
      const t = document.getElementById('toast');
      t.textContent = msg;
      t.classList.add('show');
      setTimeout(() => t.classList.remove('show'), 2500);
    }

    // ── Row scrolling ──
    function scrollRow(rowId, direction) {
      const row = document.getElementById(rowId);
      const firstCard = row.querySelector('.recipe-card');
      if (!firstCard) return;
      row.scrollBy({ left: direction * (firstCard.offsetWidth + 14) * 2, behavior: 'smooth' });
    }

    // ── Filter modal ──
    const filterToggle   = document.getElementById('filterToggle');
    const filterBackdrop = document.getElementById('filterBackdrop');
    const filterClose    = document.getElementById('filterClose');
    filterToggle.addEventListener('click', () => filterBackdrop.classList.add('open'));
    filterClose.addEventListener('click',  () => filterBackdrop.classList.remove('open'));
    filterBackdrop.addEventListener('click', (e) => { if (e.target === filterBackdrop) filterBackdrop.classList.remove('open'); });

    function toggleChip(btn) { btn.classList.toggle('selected'); }
    function applyFilters() { filterBackdrop.classList.remove('open'); }

    // ── Live search ──
    document.getElementById('recipeSearch').addEventListener('input', function () {
      const query = this.value.toLowerCase();
      document.querySelectorAll('.recipe-card').forEach(card => {
        const name = card.querySelector('.recipe-name').textContent.toLowerCase();
        card.style.display = name.includes(query) ? 'block' : 'none';
      });
    });

    // ── Pantry badge check — hero recipes only ──
    const HERO_INGREDIENTS = {
      'Chicken Rice':   ['Jasmine Rice', 'Chicken Breast', 'Garlic', 'Soy Sauce', 'Sesame Oil', 'Green Onions'],
      'Egg Fried Rice': ['Jasmine Rice', 'Eggs', 'Soy Sauce', 'Sesame Oil', 'Garlic', 'Frozen Peas', 'Green Onions'],
      'Tomato Soup':    ['Tomatoes', 'Onion', 'Garlic', 'Olive Oil', 'Vegetable Broth', 'Sugar', 'Fresh Basil'],
    };

    (function checkReadyToMake() {
      const pantry = JSON.parse(localStorage.getItem('pantryItems') || '[]');

      function isInPantry(ingredient) {
        const ing = ingredient.toLowerCase();
        return pantry.some(p => {
          const pn = p.name.toLowerCase();
          return pn.includes(ing) || ing.includes(pn.split(' ')[0]);
        });
      }

      // For each hero recipe, check if all ingredients are in pantry.
      // If yes, show badge on every card for that recipe across the page.
      // If no, remove badge (including from the Ready to Make row).
      Object.entries(HERO_INGREDIENTS).forEach(([recipeName, ingredients]) => {
        const allReady = ingredients.every(ing => isInPantry(ing));
        document.querySelectorAll(`.recipe-card[data-name="${recipeName}"]`).forEach(card => {
          const info = card.querySelector('.recipe-info');
          if (!info) return;
          const existing = info.querySelector('.badge-ready');
          if (allReady && !existing) {
            const badge = document.createElement('span');
            badge.className = 'badge-ready';
            badge.textContent = '✓ All ingredients';
            info.appendChild(badge);
          } else if (!allReady && existing) {
            existing.remove();
          }
        });
      });
    })();
  </script>

</body>
</html>
