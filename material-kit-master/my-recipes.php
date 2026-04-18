<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Meal Planner – My Recipes</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link href="assets/css/material-kit.css" rel="stylesheet">

  <style>
    body { background-color: #f8f9fa; padding-bottom: 80px; }

    .app-header {
      background: #fff; border-bottom: 1px solid #e9ecef;
      padding: 22px 16px 18px; position: sticky; top: 0; z-index: 100;
    }
    .app-header h5 {
      margin: 0; font-size: 1.6rem; font-weight: 800;
      color: #344767; text-align: center; letter-spacing: -0.5px;
    }

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
      transition: background 0.15s; color: #344767;
    }
    .filter-btn:hover { background: #e2e5e9; }
    .filter-btn .material-icons-round { font-size: 1.3rem; }

    .page-content { max-width: 680px; margin: 0 auto; padding: 28px 0 24px; }
    .category-section { margin-bottom: 32px; }

    .category-header {
      display: flex; align-items: center; justify-content: center;
      gap: 16px; padding: 0 20px; margin-bottom: 14px;
    }
    .cat-label-wrap { flex: 1; text-align: center; }
    .cat-label { font-size: 1.1rem; font-weight: 700; color: #344767; margin: 0 0 2px; }
    .sort-badge {
      font-size: 0.65rem; font-weight: 600; color: #7b809a;
      background: #f0f2f5; border-radius: 20px; padding: 2px 8px; white-space: nowrap;
    }

    .scroll-arrow {
      background: none; border: none; padding: 4px; cursor: pointer;
      color: #344767; display: flex; align-items: center; border-radius: 50%;
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

    .empty-state {
      flex: 0 0 100%; text-align: center; padding: 24px 0; color: #7b809a; font-size: 0.85rem;
    }
    .empty-state .material-icons-round { font-size: 2.4rem; color: #d0d4da; display: block; margin-bottom: 8px; }

    /* ── Recipe card ── */
    .recipe-card {
      background: #fff; border-radius: 16px; overflow: hidden;
      box-shadow: 0 2px 12px rgba(0,0,0,0.07); text-decoration: none;
      color: inherit; display: block; flex: 0 0 148px;
      transition: box-shadow 0.2s, transform 0.15s;
    }
    .recipe-card:hover {
      box-shadow: 0 6px 20px rgba(0,0,0,0.11);
      transform: translateY(-2px); color: inherit;
    }

    /* Image area — position context for both buttons */
    .recipe-img-placeholder {
      width: 100%; aspect-ratio: 4 / 3; background: #f0f2f5;
      display: flex; align-items: center; justify-content: center;
      position: relative;
    }
    .recipe-img-placeholder > .material-icons-round {
      font-size: 2.2rem; color: #c8ccd4;
    }

    /* Shared button style */
    .card-btn {
      position: absolute; bottom: 6px;
      background: rgba(255,255,255,0.88); border: none; border-radius: 50%;
      width: 28px; height: 28px; display: flex; align-items: center;
      justify-content: center; cursor: pointer;
      box-shadow: 0 1px 4px rgba(0,0,0,0.15); transition: transform 0.15s; padding: 0;
    }
    .card-btn:hover { transform: scale(1.15); }
    .card-btn .material-icons-round { font-size: 1rem; pointer-events: none; transition: color 0.2s; }

    /* Save — bottom-left of image */
    .save-btn { left: 6px; }
    .save-btn .material-icons-round { color: #344767; } /* always saved = always filled */

    /* Heart — bottom-right of image */
    .heart-btn { right: 6px; }
    .heart-btn .material-icons-round { color: #c8ccd4; }
    .heart-btn.favorited .material-icons-round { color: #e74c3c; }

    .recipe-info { padding: 10px 10px 12px; }
    .recipe-name { font-size: 0.82rem; font-weight: 700; color: #344767; margin: 0 0 4px; line-height: 1.25; }
    .recipe-meta {
      font-size: 0.72rem; color: #7b809a; margin: 0;
      display: flex; align-items: center; gap: 3px; flex-wrap: wrap;
    }
    .recipe-meta .material-icons-round { font-size: 0.8rem; vertical-align: -2px; }

    .badge-ready {
      display: inline-block; background: #e8f5e9; color: #2e7d32;
      font-size: 0.62rem; font-weight: 700; border-radius: 20px; padding: 2px 7px; margin-bottom: 5px;
    }
    .badge-new {
      display: inline-block; background: #e3f2fd; color: #1565c0;
      font-size: 0.62rem; font-weight: 700; border-radius: 20px; padding: 2px 7px; margin-bottom: 5px;
    }

    /* ── Bottom nav ── */
    .bottom-nav {
      position: fixed; bottom: 0; left: 0; right: 0; background: #fff;
      border-top: 1px solid #e9ecef; display: flex; justify-content: space-around;
      align-items: center; padding: 6px 0 8px; z-index: 200;
      box-shadow: 0 -2px 10px rgba(0,0,0,0.06);
    }
    .bottom-nav a {
      display: flex; flex-direction: column; align-items: center; text-decoration: none;
      color: #7b809a; font-size: 0.55rem; font-weight: 500; gap: 2px; flex: 1; transition: color 0.2s;
    }
    .bottom-nav a .material-icons-round { font-size: 1.4rem; }
    .bottom-nav a.active { color: #e74c3c; }
    .bottom-nav a:hover { color: #344767; }

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
    .filter-sheet-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; }
    .filter-sheet-header h6 { font-size: 1.05rem; font-weight: 700; color: #344767; margin: 0; }
    .filter-close-btn {
      background: #f0f2f5; border: none; border-radius: 50%;
      width: 32px; height: 32px; display: flex; align-items: center;
      justify-content: center; cursor: pointer; color: #344767;
    }
    .filter-close-btn .material-icons-round { font-size: 1.1rem; }
    .filter-group-label {
      font-size: 0.72rem; font-weight: 700; text-transform: uppercase;
      letter-spacing: 0.07em; color: #7b809a; margin: 16px 0 8px;
    }
    .filter-chips { display: flex; flex-wrap: wrap; gap: 8px; }
    .filter-chip {
      background: #f0f2f5; border: none; border-radius: 50px; padding: 7px 16px;
      font-size: 0.8rem; font-weight: 500; color: #344767; cursor: pointer;
      transition: background 0.15s, color 0.15s;
    }
    .filter-chip.selected { background: #e74c3c; color: #fff; }
    .filter-apply-btn {
      margin-top: 24px; width: 100%;
      background: linear-gradient(195deg, #42424a, #191919);
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
    .confirm-dialog .confirm-icon { font-size: 2.4rem; color: #344767; margin-bottom: 12px; }
    .confirm-dialog h6 { font-size: 1rem; font-weight: 700; color: #344767; margin: 0 0 8px; }
    .confirm-dialog p { font-size: 0.85rem; color: #7b809a; margin: 0 0 24px; line-height: 1.5; }
    .confirm-actions { display: flex; gap: 10px; }
    .confirm-cancel {
      flex: 1; background: #f0f2f5; border: none; border-radius: 10px;
      padding: 12px; font-size: 0.88rem; font-weight: 600; color: #344767; cursor: pointer;
      transition: background 0.15s;
    }
    .confirm-cancel:hover { background: #e2e5e9; }
    .confirm-remove {
      flex: 1; background: #e74c3c; border: none; border-radius: 10px;
      padding: 12px; font-size: 0.88rem; font-weight: 600; color: #fff; cursor: pointer;
      transition: opacity 0.15s;
    }
    .confirm-remove:hover { opacity: 0.88; }
  </style>
</head>

<body>

  <div class="app-header">
    <h5><span class="material-icons-round" style="font-size:1.6rem;vertical-align:-4px;margin-right:6px;">menu_book</span>My Recipes</h5>
  </div>

  <div class="search-wrapper">
    <div class="input-group">
      <input type="text" class="form-control" id="recipeSearch" placeholder="🔍  Search My Recipes...">
    </div>
    <button class="filter-btn" id="filterToggle" aria-label="Filter recipes">
      <span class="material-icons-round">tune</span>
    </button>
  </div>

  <div class="page-content">

    <!-- Macro to keep card HTML DRY — each card uses this pattern:
         save-btn (bottom-left) + heart-btn (bottom-right) inside .recipe-img-placeholder -->

    <!-- ══ 1. RECENTLY ADDED — chronological ══ -->
    <div class="category-section">
      <div class="category-header">
        <button class="scroll-arrow" onclick="scrollRow('row-added',-1)"><span class="material-icons-round">arrow_back</span></button>
        <div class="cat-label-wrap">
          <p class="cat-label">Recently Added</p>
          <span class="sort-badge">Most Recent First</span>
        </div>
        <button class="scroll-arrow" onclick="scrollRow('row-added',1)"><span class="material-icons-round">arrow_forward</span></button>
      </div>
      <div class="card-row-wrapper"><div class="card-row" id="row-added">

        <div class="recipe-card" data-name="Mushroom Pasta">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><span class="badge-new">New</span><p class="recipe-name">Mushroom Pasta</p><p class="recipe-meta"><span class="material-icons-round">schedule</span> 25 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 510 cal</p></div>
          </a>
        </div>

        <div class="recipe-card" data-name="Greek Salad">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><span class="badge-new">New</span><p class="recipe-name">Greek Salad</p><p class="recipe-meta"><span class="material-icons-round">schedule</span> 10 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 220 cal</p></div>
          </a>
        </div>

        <div class="recipe-card" data-name="Chicken Rice">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><span class="badge-new">New</span><p class="recipe-name">Chicken Rice</p><p class="recipe-meta"><span class="material-icons-round">schedule</span> 30 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 480 cal</p></div>
          </a>
        </div>

        <div class="recipe-card" data-name="Bean Tacos">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><p class="recipe-name">Bean Tacos</p><p class="recipe-meta"><span class="material-icons-round">schedule</span> 20 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 340 cal</p></div>
          </a>
        </div>

        <div class="recipe-card" data-name="Avocado Toast">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><p class="recipe-name">Avocado Toast</p><p class="recipe-meta"><span class="material-icons-round">schedule</span> 8 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 290 cal</p></div>
          </a>
        </div>

      </div></div>
    </div>

    <!-- ══ 2. FAVORITES — A–Z ══ -->
    <div class="category-section">
      <div class="category-header">
        <button class="scroll-arrow" onclick="scrollRow('row-favorites',-1)"><span class="material-icons-round">arrow_back</span></button>
        <div class="cat-label-wrap">
          <p class="cat-label"><span class="material-icons-round" style="font-size:1.1rem;vertical-align:-3px;color:#e74c3c;">favorite</span> Favorites</p>
          <span class="sort-badge">A – Z</span>
        </div>
        <button class="scroll-arrow" onclick="scrollRow('row-favorites',1)"><span class="material-icons-round">arrow_forward</span></button>
      </div>
      <div class="card-row-wrapper"><div class="card-row" id="row-favorites">
        <div class="empty-state" id="favorites-empty">
          <span class="material-icons-round">favorite_border</span>
          Tap ♡ on any recipe to save it here
        </div>
      </div></div>
    </div>

    <!-- ══ 3. RECENTLY MADE — chronological ══ -->
    <div class="category-section">
      <div class="category-header">
        <button class="scroll-arrow" onclick="scrollRow('row-made',-1)"><span class="material-icons-round">arrow_back</span></button>
        <div class="cat-label-wrap">
          <p class="cat-label">Recently Made</p>
          <span class="sort-badge">Most Recent First</span>
        </div>
        <button class="scroll-arrow" onclick="scrollRow('row-made',1)"><span class="material-icons-round">arrow_forward</span></button>
      </div>
      <div class="card-row-wrapper"><div class="card-row" id="row-made">

        <div class="recipe-card" data-name="Chicken Rice">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><p class="recipe-name">Chicken Rice</p><p class="recipe-meta"><span class="material-icons-round">history</span> Today</p></div>
          </a>
        </div>

        <div class="recipe-card" data-name="Caesar Salad">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><p class="recipe-name">Caesar Salad</p><p class="recipe-meta"><span class="material-icons-round">history</span> Yesterday</p></div>
          </a>
        </div>

        <div class="recipe-card" data-name="Bean Tacos">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><p class="recipe-name">Bean Tacos</p><p class="recipe-meta"><span class="material-icons-round">history</span> 2 days ago</p></div>
          </a>
        </div>

        <div class="recipe-card" data-name="Mushroom Pasta">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><p class="recipe-name">Mushroom Pasta</p><p class="recipe-meta"><span class="material-icons-round">history</span> 4 days ago</p></div>
          </a>
        </div>

        <div class="recipe-card" data-name="Greek Salad">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><p class="recipe-name">Greek Salad</p><p class="recipe-meta"><span class="material-icons-round">history</span> 1 week ago</p></div>
          </a>
        </div>

      </div></div>
    </div>

    <!-- ══ 4. READY TO MAKE — A–Z ══ -->
    <div class="category-section">
      <div class="category-header">
        <button class="scroll-arrow" onclick="scrollRow('row-ready',-1)"><span class="material-icons-round">arrow_back</span></button>
        <div class="cat-label-wrap">
          <p class="cat-label">Ready to Make</p>
          <span class="sort-badge">A – Z</span>
        </div>
        <button class="scroll-arrow" onclick="scrollRow('row-ready',1)"><span class="material-icons-round">arrow_forward</span></button>
      </div>
      <div class="card-row-wrapper"><div class="card-row" id="row-ready">

        <div class="recipe-card" data-name="Caesar Salad">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><span class="badge-ready">✓ All ingredients</span><p class="recipe-name">Caesar Salad</p><p class="recipe-meta"><span class="material-icons-round">schedule</span> 15 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 320 cal</p></div>
          </a>
        </div>

        <div class="recipe-card" data-name="Egg Fried Rice">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><span class="badge-ready">✓ All ingredients</span><p class="recipe-name">Egg Fried Rice</p><p class="recipe-meta"><span class="material-icons-round">schedule</span> 15 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 380 cal</p></div>
          </a>
        </div>

        <div class="recipe-card" data-name="Lentil Stew">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><span class="badge-ready">✓ All ingredients</span><p class="recipe-name">Lentil Stew</p><p class="recipe-meta"><span class="material-icons-round">schedule</span> 40 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 290 cal</p></div>
          </a>
        </div>

        <div class="recipe-card" data-name="Tomato Soup">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><span class="badge-ready">✓ All ingredients</span><p class="recipe-name">Tomato Soup</p><p class="recipe-meta"><span class="material-icons-round">schedule</span> 25 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 210 cal</p></div>
          </a>
        </div>

        <div class="recipe-card" data-name="Veggie Stir Fry">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><span class="badge-ready">✓ All ingredients</span><p class="recipe-name">Veggie Stir Fry</p><p class="recipe-meta"><span class="material-icons-round">schedule</span> 20 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 310 cal</p></div>
          </a>
        </div>

      </div></div>
    </div>

    <!-- ══ 5. QUICK — A–Z ══ -->
    <div class="category-section">
      <div class="category-header">
        <button class="scroll-arrow" onclick="scrollRow('row-quick',-1)"><span class="material-icons-round">arrow_back</span></button>
        <div class="cat-label-wrap">
          <p class="cat-label">Quick</p>
          <span class="sort-badge">Under 30 min &nbsp;·&nbsp; A – Z</span>
        </div>
        <button class="scroll-arrow" onclick="scrollRow('row-quick',1)"><span class="material-icons-round">arrow_forward</span></button>
      </div>
      <div class="card-row-wrapper"><div class="card-row" id="row-quick">

        <div class="recipe-card" data-name="Avocado Toast">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><p class="recipe-name">Avocado Toast</p><p class="recipe-meta"><span class="material-icons-round">schedule</span> 8 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 290 cal</p></div>
          </a>
        </div>

        <div class="recipe-card" data-name="Bean Tacos">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><p class="recipe-name">Bean Tacos</p><p class="recipe-meta"><span class="material-icons-round">schedule</span> 20 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 340 cal</p></div>
          </a>
        </div>

        <div class="recipe-card" data-name="Caesar Salad">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><p class="recipe-name">Caesar Salad</p><p class="recipe-meta"><span class="material-icons-round">schedule</span> 15 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 320 cal</p></div>
          </a>
        </div>

        <div class="recipe-card" data-name="Egg Fried Rice">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><p class="recipe-name">Egg Fried Rice</p><p class="recipe-meta"><span class="material-icons-round">schedule</span> 15 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 380 cal</p></div>
          </a>
        </div>

        <div class="recipe-card" data-name="Greek Salad">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><p class="recipe-name">Greek Salad</p><p class="recipe-meta"><span class="material-icons-round">schedule</span> 10 min &nbsp;·&nbsp; <span class="material-icons-round">local_fire_department</span> 220 cal</p></div>
          </a>
        </div>

      </div></div>
    </div>

    <!-- ══ 6. BUDGET FRIENDLY — A–Z ══ -->
    <div class="category-section">
      <div class="category-header">
        <button class="scroll-arrow" onclick="scrollRow('row-budget',-1)"><span class="material-icons-round">arrow_back</span></button>
        <div class="cat-label-wrap">
          <p class="cat-label">Budget Friendly</p>
          <span class="sort-badge">A – Z</span>
        </div>
        <button class="scroll-arrow" onclick="scrollRow('row-budget',1)"><span class="material-icons-round">arrow_forward</span></button>
      </div>
      <div class="card-row-wrapper"><div class="card-row" id="row-budget">

        <div class="recipe-card" data-name="Avocado Toast">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><p class="recipe-name">Avocado Toast</p><p class="recipe-meta"><span class="material-icons-round">schedule</span> 8 min &nbsp;·&nbsp; $1.40/srv</p></div>
          </a>
        </div>

        <div class="recipe-card" data-name="Bean Tacos">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><p class="recipe-name">Bean Tacos</p><p class="recipe-meta"><span class="material-icons-round">schedule</span> 20 min &nbsp;·&nbsp; $1.50/srv</p></div>
          </a>
        </div>

        <div class="recipe-card" data-name="Egg Fried Rice">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><p class="recipe-name">Egg Fried Rice</p><p class="recipe-meta"><span class="material-icons-round">schedule</span> 15 min &nbsp;·&nbsp; $1.30/srv</p></div>
          </a>
        </div>

        <div class="recipe-card" data-name="Lentil Stew">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><p class="recipe-name">Lentil Stew</p><p class="recipe-meta"><span class="material-icons-round">schedule</span> 40 min &nbsp;·&nbsp; $1.80/srv</p></div>
          </a>
        </div>

        <div class="recipe-card" data-name="Veggie Stir Fry">
          <a href="individual-recipe.php">
            <div class="recipe-img-placeholder">
              <span class="material-icons-round">restaurant</span>
              <button class="card-btn save-btn" onclick="handleUnsave(this)" aria-label="Remove from My Recipes"><span class="material-icons-round">bookmark</span></button>
              <button class="card-btn heart-btn" onclick="toggleFavorite(this)" aria-label="Favorite"><span class="material-icons-round">favorite</span></button>
            </div>
            <div class="recipe-info"><p class="recipe-name">Veggie Stir Fry</p><p class="recipe-meta"><span class="material-icons-round">schedule</span> 20 min &nbsp;·&nbsp; $1.60/srv</p></div>
          </a>
        </div>

      </div></div>
    </div>

  </div><!-- /page-content -->

  <nav class="bottom-nav">
    <a href="index.php"><span class="material-icons-round">home</span>Home</a>
    <a href="myplan.php"><span class="material-icons-round">calendar_today</span>My Plan</a>
    <a href="pantry.php"><span class="material-icons-round">kitchen</span>Pantry</a>
    <a href="my-recipes.php" class="active"><span class="material-icons-round">menu_book</span>My Recipes</a>
    <a href="find-recipes.php"><span class="material-icons-round">search</span>Find Recipes</a>
    <a href="budget.php"><span class="material-icons-round">account_balance_wallet</span>Budget</a>
    <a href="grocery.php"><span class="material-icons-round">shopping_cart</span>Grocery List</a>
  </nav>

  <footer style="text-align:center; padding: 16px; margin-bottom: 80px; font-size: 0.75rem; color: #7b809a;">
    Built with <a href="https://www.creative-tim.com/product/material-kit" target="_blank" style="color:#7b809a; font-weight:600;">Material Kit 3</a>
    by <a href="https://www.creative-tim.com" target="_blank" style="color:#7b809a; font-weight:600;">Creative Tim</a>,
    licensed under <a href="https://github.com/creativetimofficial/material-kit/blob/master/LICENSE.md" target="_blank" style="color:#7b809a; font-weight:600;">MIT</a>.
  </footer>

  <!-- Filter modal -->
  <div class="filter-backdrop" id="filterBackdrop">
    <div class="filter-sheet">
      <div class="filter-sheet-header">
        <h6>Filter My Recipes</h6>
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
      <div class="filter-group-label">Show Only</div>
      <div class="filter-chips">
        <button class="filter-chip" onclick="toggleChip(this)">Favorites</button>
        <button class="filter-chip" onclick="toggleChip(this)">Ready to Make</button>
      </div>
      <button class="filter-apply-btn" onclick="applyFilters()">Apply Filters</button>
    </div>
  </div>

  <!-- Unsave confirmation popup -->
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

  <script src="assets/js/core/bootstrap.bundle.min.js"></script>
  <script src="assets/js/material-kit.js"></script>
  <script>
    // ── Unsave ──
    let pendingUnsaveBtn = null;

    function handleUnsave(btn) {
      event.preventDefault();
      event.stopPropagation();
      pendingUnsaveBtn = btn;
      const name = btn.closest('.recipe-card').dataset.name;
      document.getElementById('confirmMessage').textContent =
        '"' + name + '" will be removed from your saved recipes.';
      document.getElementById('confirmBackdrop').classList.add('open');
    }

    function cancelUnsave() {
      pendingUnsaveBtn = null;
      document.getElementById('confirmBackdrop').classList.remove('open');
    }

    function confirmUnsave() {
      if (pendingUnsaveBtn) {
        const name = pendingUnsaveBtn.closest('.recipe-card').dataset.name;
        document.querySelectorAll(`.recipe-card[data-name="${name}"]`).forEach(c => c.style.display = 'none');
        favorites.delete(name);
        rebuildFavoritesRow();
        pendingUnsaveBtn = null;
      }
      document.getElementById('confirmBackdrop').classList.remove('open');
    }

    document.getElementById('confirmBackdrop').addEventListener('click', function(e) {
      if (e.target === this) cancelUnsave();
    });

    // ── Favorites ──
    const favorites = new Set();

    function toggleFavorite(btn) {
      event.preventDefault();
      event.stopPropagation();
      const name = btn.closest('.recipe-card').dataset.name;
      if (favorites.has(name)) favorites.delete(name);
      else favorites.add(name);

      document.querySelectorAll('.recipe-card').forEach(c => {
        if (c.dataset.name === name) {
          const h = c.querySelector('.heart-btn');
          if (h) {
            if (favorites.has(name)) h.classList.add('favorited');
            else h.classList.remove('favorited');
          }
        }
      });
      rebuildFavoritesRow();
    }

    function rebuildFavoritesRow() {
      const row   = document.getElementById('row-favorites');
      const empty = document.getElementById('favorites-empty');
      row.querySelectorAll('.recipe-card').forEach(c => c.remove());
      if (favorites.size === 0) { empty.style.display = 'block'; return; }
      empty.style.display = 'none';
      [...favorites].sort((a, b) => a.localeCompare(b)).forEach(name => {
        const source = document.querySelector(`.recipe-card[data-name="${name}"]`);
        if (!source) return;
        const clone = source.cloneNode(true);
        const h = clone.querySelector('.heart-btn');
        if (h) { h.classList.add('favorited'); h.setAttribute('onclick', 'toggleFavorite(this)'); }
        const s = clone.querySelector('.save-btn');
        if (s) s.setAttribute('onclick', 'handleUnsave(this)');
        row.appendChild(clone);
      });
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
  </script>

</body>
</html>
