<?php
/**
 * Лабораторна робота №6
 * Тема: Основи мови програмування PHP. Функції та об'єкти в PHP
 */

// Підключення класу та функцій
require_once __DIR__ . '/classes/House.php';
require_once __DIR__ . '/includes/functions.php';

// Завдання 4: Змінна поточної дати у форматі року
$currentYear = date('Y');

// Завдання 5: Змінна з локацією для футера
$location = "м. Київ, вул. Хрещатик, 22<br>01001, Україна";

// Завдання 6 та 7: Створення масиву об'єктів класу House
$houses = [
    new House(
        name: "Detached house • 5y old",
        price: 750000,
        address: "742 Evergreen Terrace, Springfield",
        phone: "(555) 555-4321",
        image: "https://images.unsplash.com/photo-1475855581690-80accde3ae2b?ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80",
        bedrooms: 3,
        bathrooms: 2,
        realtorName: "Tiffany Heffner",
        realtorAvatar: "https://images.unsplash.com/photo-1500522144261-ea64433bbe27?ixlib=rb-1.2.1&auto=format&fit=crop&w=751&q=80"
    ),
    new House(
        name: "Modern Villa • 2y old",
        price: 920000,
        address: "10880 Wilshire Blvd, Los Angeles",
        phone: "(555) 321-9876",
        image: "https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80",
        bedrooms: 5,
        bathrooms: 4,
        realtorName: "Alexander Wright",
        realtorAvatar: "https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-1.2.1&auto=format&fit=crop&w=751&q=80"
    ),
    new House(
        name: "Cozy Family House • 8y old",
        price: 480000,
        address: "4 Privet Drive, Little Whinging",
        phone: "(555) 888-2345",
        image: "https://images.unsplash.com/photo-1580587771525-78b9dba3b914?ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80",
        bedrooms: 4,
        bathrooms: 2,
        realtorName: "Sarah Connor",
        realtorAvatar: "https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-1.2.1&auto=format&fit=crop&w=751&q=80"
    ),
    new House(
        name: "Scandinavian Cottage • 3y old",
        price: 610000,
        address: "88 Nordic Fjord Way, Oslo",
        phone: "(555) 777-1122",
        image: "https://images.unsplash.com/photo-1513694203232-719a280e022f?ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80",
        bedrooms: 3,
        bathrooms: 2,
        realtorName: "Tiffany Heffner",
        realtorAvatar: "https://images.unsplash.com/photo-1500522144261-ea64433bbe27?ixlib=rb-1.2.1&auto=format&fit=crop&w=751&q=80"
    ),
    new House(
        name: "Luxury Lakehouse • New",
        price: 1150000,
        address: "15 Lakeview Crest, Seattle",
        phone: "(555) 999-4455",
        image: "https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80",
        bedrooms: 6,
        bathrooms: 5,
        realtorName: "Alexander Wright",
        realtorAvatar: "https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-1.2.1&auto=format&fit=crop&w=751&q=80"
    ),
    new House(
        name: "Minimalist Townhouse • 1y old",
        price: 540000,
        address: "42 Baker Street, London",
        phone: "(555) 444-6677",
        image: "https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80",
        bedrooms: 3,
        bathrooms: 3,
        realtorName: "Sarah Connor",
        realtorAvatar: "https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-1.2.1&auto=format&fit=crop&w=751&q=80"
    ),
];
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Лабораторна робота №6 - Основи PHP, функції та об'єкти</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Montserrat', sans-serif; }
  </style>
</head>
<body class="subpixel-antialiased text-gray-800 bg-gray-50 flex flex-col min-h-screen">

<!-- Навігаційне меню -->
<nav class="sticky top-0 z-50 h-20 bg-[#243c5a] p-5 sm:px-24 xl:px-64 shadow-md">
  <div class="mx-auto flex justify-between items-center h-full">
    <a href="#" class="uppercase text-white text-xl xl:text-3xl font-bold whitespace-no-wrap leading-normal tracking-tighter">
      PHP Real Estate
    </a>
    <button class="block md:hidden uppercase inline-flex items-center bg-green-500 hover:bg-green-600 px-3 py-2 rounded-lg text-white font-semibold">
      Menu
      <svg class="h-4 fill-current ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
      </svg>
    </button>
    <div class="hidden md:flex space-x-2">
      <a href="#houses" class="px-4 py-2 uppercase text-white text-base font-bold whitespace-no-wrap leading-normal tracking-tighter hover:text-green-400 transition">Будинки</a>
      <a href="#portfolio" class="px-4 py-2 uppercase text-white text-base font-bold whitespace-no-wrap leading-normal tracking-tighter hover:text-green-400 transition">Portfolio</a>
      <a href="#about" class="px-4 py-2 uppercase text-white text-base font-bold whitespace-no-wrap leading-normal tracking-tighter hover:text-green-400 transition">Про нас</a>
      <a href="#contact" class="px-4 py-2 uppercase text-white text-base font-bold whitespace-no-wrap leading-normal tracking-tighter hover:text-green-400 transition">Контакти</a>
    </div>
  </div>
</nav>

<main class="flex-grow">
  <!-- Шапка сайту -->
  <section class="bg-green-500 py-24">
    <figure class="container px-16 pt-4 mx-auto">
      <img class="mb-8 h-48 mx-auto" src="https://francescomansi.me/img/start-tailwind/avataaars.svg" alt="Avatar">
    </figure>
    <h1 class="text-center uppercase text-white text-4xl lg:text-5xl font-extrabold leading-none tracking-normal">
      PHP Каталог Нерухомості
    </h1>
    <div class="flex flex-row items-center justify-center py-4">
      <span class="h-1 w-24 bg-white rounded-full mx-2"></span>
      <svg class="h-10 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M6.1 21.98a1 1 0 0 1-1.45-1.06l1.03-6.03-4.38-4.26a1 1 0 0 1 .56-1.71l6.05-.88 2.7-5.48a1 1 0 0 1 1.8 0l2.7 5.48 6.06.88a1 1 0 0 1 .55 1.7l-4.38 4.27 1.04 6.03a1 1 0 0 1-1.46 1.06l-5.4-2.85-5.42 2.85zm4.95-4.87a1 1 0 0 1 .93 0l4.08 2.15-.78-4.55a1 1 0 0 1 .29-.88l3.3-3.22-4.56-.67a1 1 0 0 1-.76-.54l-2.04-4.14L9.47 9.4a1 1 0 0 1-.75.54l-4.57.67 3.3 3.22a1 1 0 0 1 .3.88l-.79 4.55 4.09-2.15z"/>
      </svg>
      <span class="h-1 w-24 bg-white rounded-full mx-2"></span>
    </div>
    <p class="px-12 text-center text-white text-lg font-normal">
      Об'єктно-орієнтований PHP &bull; Динамічна генерація контенту &bull; Акційні ціни
    </p>
  </section>

  <!-- Секція будинків (Завдання 6, 7, 8) -->
  <section id="houses" class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-center uppercase text-gray-900 text-3xl font-extrabold tracking-tight mb-2">
        Доступні Будинки
      </h2>
      <p class="text-center text-gray-600 mb-10 max-w-2xl mx-auto">
        Секція згенерована динамічно через об'єкти PHP класу <code class="bg-gray-200 px-2 py-0.5 rounded text-sm text-pink-600">House</code>.
        Акційні будинки (зі знижкою до 30%) мають перекреслену стару ціну та виділену червону ціну більшого розміру.
      </p>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php foreach ($houses as $house): ?>
          <?php
            // Завдання 8: Виклик функції для рандомного розрахунку акції (0-30%)
            $promo = calculateHousePromo(chancePercent: 60, maxPercent: 30);
            $hasPromo = $promo['isPromo'] && ($promo['percent'] > 0);
          ?>
          <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col justify-between transform hover:-translate-y-1 transition duration-300">
            <!-- Зображення будинку -->
            <div class="relative bg-cover bg-center h-56 p-4" style="background-image: url('<?= htmlspecialchars($house->image) ?>')">
              <?php if ($hasPromo): ?>
                <span class="absolute top-3 left-3 bg-red-600 text-white font-extrabold text-xs uppercase px-3 py-1.5 rounded-full shadow-lg tracking-wider animate-pulse">
                  Акція -<?= $promo['percent'] ?>%
                </span>
              <?php endif; ?>
              <div class="flex justify-end">
                <span class="bg-white/80 backdrop-blur p-2 rounded-full text-red-500 hover:text-red-600 cursor-pointer shadow">
                  <svg class="h-5 w-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M12.76 3.76a6 6 0 0 1 8.48 8.48l-8.53 8.54a1 1 0 0 1-1.42 0l-8.53-8.54a6 6 0 0 1 8.48-8.48l.76.75.76-.75zm7.07 7.07a4 4 0 1 0-5.66-5.66l-1.46 1.47a1 1 0 0 1-1.42 0L9.83 5.17a4 4 0 1 0-5.66 5.66L12 18.66l7.83-7.83z"></path>
                  </svg>
                </span>
              </div>
            </div>

            <!-- Інформація про будинок та ціни -->
            <div class="p-6 flex-grow flex flex-col justify-between">
              <div>
                <p class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1">
                  <?= htmlspecialchars($house->name) ?>
                </p>

                <!-- Завдання 8: Виведення ціни (звичайна або перекреслена + акційна у червоному кольорі більшим шрифтом) -->
                <?php if ($hasPromo): ?>
                  <?php $discountedPrice = getDiscountedPrice($house->price, $promo['percent']); ?>
                  <div class="my-2">
                    <div class="text-sm text-gray-400 font-medium">Стара ціна:</div>
                    <div class="flex items-baseline space-x-3">
                      <span class="text-xl text-gray-400 line-through">
                        <?= $house->getFormattedPrice($house->price) ?>
                      </span>
                      <span class="text-3xl font-extrabold text-red-600 tracking-tight">
                        <?= $house->getFormattedPrice($discountedPrice) ?>
                      </span>
                    </div>
                  </div>
                <?php else: ?>
                  <div class="my-2">
                    <div class="text-sm text-gray-400 font-medium">Ціна:</div>
                    <p class="text-2xl font-bold text-gray-900">
                      <?= $house->getFormattedPrice($house->price) ?>
                    </p>
                  </div>
                <?php endif; ?>

                <p class="text-gray-600 text-sm mt-1 flex items-center">
                  <svg class="h-4 w-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                  </svg>
                  <?= htmlspecialchars($house->address) ?>
                </p>
              </div>

              <!-- Характеристики: спальні та ванни -->
              <div class="flex pt-4 mt-4 border-t border-gray-100 text-gray-600 text-sm">
                <div class="flex-1 inline-flex items-center">
                  <svg class="h-5 w-5 text-gray-400 fill-current mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M0 16L3 5V1a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v4l3 11v5a1 1 0 0 1-1 1v2h-1v-2H2v2H1v-2a1 1 0 0 1-1-1v-5zM19 5h1V1H4v4h1V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1h2V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1zm0 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V6h-2v2a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V6H3.76L1.04 16h21.92L20.24 6H19zM1 17v4h22v-4H1zM6 4v4h4V4H6zm8 0v4h4V4h-4z"></path>
                  </svg>
                  <span><strong class="text-gray-900"><?= $house->bedrooms ?></strong> Спальні</span>
                </div>
                <div class="flex-1 inline-flex items-center">
                  <svg class="h-5 w-5 text-gray-400 fill-current mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M17.03 21H7.97a4 4 0 0 1-1.3-.22l-1.22 2.44-.9-.44 1.22-2.44a4 4 0 0 1-1.38-1.55L.5 11h7.56a4 4 0 0 1 1.78.42l2.32 1.16a4 4 0 0 0 1.78.42h9.56l-2.9 5.79a4 4 0 0 1-1.37 1.55l1.22 2.44-.9.44-1.22-2.44a4 4 0 0 1-1.3.22zM21 11h2.5a.5.5 0 1 1 0 1h-9.06a4.5 4.5 0 0 1-2-.48l-2.32-1.15A3.5 3.5 0 0 0 8.56 10H.5a.5.5 0 0 1 0-1h8.06c.7 0 1.38.16 2 .48l2.32 1.15a3.5 3.5 0 0 0 1.56.37H20V2a1 1 0 0 0-1.74-.67c.64.97.53 2.29-.32 3.14l-.35.36-3.54-3.54.35-.35a2.5 2.5 0 0 1 3.15-.32A2 2 0 0 1 21 2v9zm-5.48-9.65l2 2a1.5 1.5 0 0 0-2-2zm-10.23 17A3 3 0 0 0 7.97 20h9.06a3 3 0 0 0 2.68-1.66L21.88 14h-7.94a5 5 0 0 1-2.23-.53L9.4 12.32A3 3 0 0 0 8.06 12H2.12l3.17 6.34z"></path>
                  </svg>
                  <span><strong class="text-gray-900"><?= $house->bathrooms ?></strong> Ванні</span>
                </div>
              </div>
            </div>

            <!-- Рієлтор та контакт -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
              <div class="flex items-center">
                <img class="w-10 h-10 rounded-full object-cover mr-3 border-2 border-white shadow-sm" src="<?= htmlspecialchars($house->realtorAvatar) ?>" alt="<?= htmlspecialchars($house->realtorName) ?>">
                <div>
                  <p class="font-bold text-gray-900 text-sm leading-tight"><?= htmlspecialchars($house->realtorName) ?></p>
                  <p class="text-xs text-gray-500"><?= htmlspecialchars($house->phone) ?></p>
                </div>
              </div>
              <a href="tel:<?= htmlspecialchars($house->phone) ?>" class="text-green-600 hover:text-green-700 bg-green-50 hover:bg-green-100 p-2 rounded-lg transition" title="Зателефонувати">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Секція Portfolio (оригінальна галерея) -->
  <section id="portfolio" class="bg-white py-16">
    <h2 class="text-center uppercase text-black text-4xl font-bold leading-none tracking-normal">
      Portfolio
    </h2>
    <div class="flex flex-row items-center justify-center py-4">
      <span class="h-1 w-24 bg-black rounded-full mx-2"></span>
      <svg class="h-12 fill-current text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M6.1 21.98a1 1 0 0 1-1.45-1.06l1.03-6.03-4.38-4.26a1 1 0 0 1 .56-1.71l6.05-.88 2.7-5.48a1 1 0 0 1 1.8 0l2.7 5.48 6.06.88a1 1 0 0 1 .55 1.7l-4.38 4.27 1.04 6.03a1 1 0 0 1-1.46 1.06l-5.4-2.85-5.42 2.85zm4.95-4.87a1 1 0 0 1 .93 0l4.08 2.15-.78-4.55a1 1 0 0 1 .29-.88l3.3-3.22-4.56-.67a1 1 0 0 1-.76-.54l-2.04-4.14L9.47 9.4a1 1 0 0 1-.75.54l-4.57.67 3.3 3.22a1 1 0 0 1 .3.88l-.79 4.55 4.09-2.15z"/>
      </svg>
      <span class="h-1 w-24 bg-black rounded-full mx-2"></span>
    </div>
    <div class="flex flex-col sm:flex-row sm:flex-wrap px-6 max-w-md md:max-w-6xl mx-auto">
      <div class="w-full sm:w-1/2 md:w-1/3 p-4">
        <img alt="Cabin" class="rounded-lg shadow hover:opacity-90 transition" src="https://francescomansi.me/img/start-tailwind/portfolio/cabin.png">
      </div>
      <div class="w-full sm:w-1/2 md:w-1/3 p-4">
        <img alt="Cake" class="rounded-lg shadow hover:opacity-90 transition" src="https://francescomansi.me/img/start-tailwind/portfolio/cake.png">
      </div>
      <div class="w-full sm:w-1/2 md:w-1/3 p-4">
        <img alt="Circus" class="rounded-lg shadow hover:opacity-90 transition" src="https://francescomansi.me/img/start-tailwind/portfolio/circus.png">
      </div>
      <div class="w-full sm:w-1/2 md:w-1/3 p-4">
        <img alt="Game" class="rounded-lg shadow hover:opacity-90 transition" src="https://francescomansi.me/img/start-tailwind/portfolio/game.png">
      </div>
      <div class="w-full sm:w-1/2 md:w-1/3 p-4">
        <img alt="Safe" class="rounded-lg shadow hover:opacity-90 transition" src="https://francescomansi.me/img/start-tailwind/portfolio/safe.png">
      </div>
      <div class="w-full sm:w-1/2 md:w-1/3 p-4">
        <img alt="Submarine" class="rounded-lg shadow hover:opacity-90 transition" src="https://francescomansi.me/img/start-tailwind/portfolio/submarine.png">
      </div>
    </div>
  </section>

  <!-- Завдання 3: Виведення блоку About за допомогою PHP функції -->
  <div id="about">
    <?= renderAboutBlock(
        heading: 'Про Проект',
        col1: 'Freelancer is a free tailwind css theme created from Freelancer theme by Start Bootstrap. The entire template was written using only the default configuration file.',
        col2: 'У цій версії всі динамічні секції побудовані на об\'єктній моделі PHP 8, включаючи генерацію карток будинків, розрахунок знижок та автоматичне оновлення копірайту!',
        btnText: 'Завантажити Звіт'
    ); ?>
  </div>

  <!-- Секція контактів -->
  <section id="contact" class="bg-white py-16">
    <h2 class="text-center uppercase text-black text-4xl font-bold leading-none tracking-normal">
      Зворотний зв'язок
    </h2>
    <div class="flex flex-row items-center justify-center py-4">
      <span class="h-1 w-24 bg-black rounded-full mx-2"></span>
      <svg class="h-12 fill-current text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M6.1 21.98a1 1 0 0 1-1.45-1.06l1.03-6.03-4.38-4.26a1 1 0 0 1 .56-1.71l6.05-.88 2.7-5.48a1 1 0 0 1 1.8 0l2.7 5.48 6.06.88a1 1 0 0 1 .55 1.7l-4.38 4.27 1.04 6.03a1 1 0 0 1-1.46 1.06l-5.4-2.85-5.42 2.85zm4.95-4.87a1 1 0 0 1 .93 0l4.08 2.15-.78-4.55a1 1 0 0 1 .29-.88l3.3-3.22-4.56-.67a1 1 0 0 1-.76-.54l-2.04-4.14L9.47 9.4a1 1 0 0 1-.75.54l-4.57.67 3.3 3.22a1 1 0 0 1 .3.88l-.79 4.55 4.09-2.15z"/>
      </svg>
      <span class="h-1 w-24 bg-black rounded-full mx-2"></span>
    </div>
    <form class="px-6 pb-12 max-w-2xl mx-auto space-y-4">
      <div class="border-b-2 border-gray-300 py-3">
        <input class="appearance-none bg-transparent border-none w-full placeholder-gray-500 py-2 leading-tight text-xl focus:outline-none"
               type="text" placeholder="Ваше ім'я" aria-label="Ім'я">
      </div>
      <div class="border-b-2 border-gray-300 py-3">
        <input class="appearance-none bg-transparent border-none w-full placeholder-gray-500 py-2 leading-tight text-xl focus:outline-none"
               type="email" placeholder="Email адреса" aria-label="Email">
      </div>
      <div class="border-b-2 border-gray-300 py-3">
        <input class="appearance-none bg-transparent border-none w-full placeholder-gray-500 py-2 leading-tight text-xl focus:outline-none"
               type="tel" placeholder="Номер телефону" aria-label="Телефон">
      </div>
      <div class="border-b-2 border-gray-300 py-3">
        <textarea class="appearance-none border-none w-full placeholder-gray-500 py-2 leading-tight text-xl focus:outline-none resize-none"
                  rows="4" placeholder="Повідомлення"></textarea>
      </div>
      <div class="pt-4">
        <button type="button" class="bg-green-500 hover:bg-green-600 transition font-bold px-8 py-4 rounded-lg text-white shadow-md">
          Надіслати
        </button>
      </div>
    </form>
  </section>

  <!-- Секція інформації та локації (Завдання 5: виведення змінної $location) -->
  <section class="bg-gray-800 py-16">
    <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row text-white text-center justify-between">
      <!-- Завдання 5: Локація виводиться зі змінної PHP -->
      <div class="p-6 md:w-1/3">
        <h3 class="uppercase text-2xl font-bold leading-none tracking-normal pb-5">Локація</h3>
        <p class="text-gray-300 leading-relaxed"><?= $location; ?></p>
      </div>
      <div class="p-6 md:w-1/3">
        <h3 class="uppercase text-2xl font-bold leading-none tracking-normal">Ми в соцмережах</h3>
        <div class="flex justify-center py-5 space-x-2">
          <span class="rounded-full border-2 border-white p-3 hover:bg-white hover:text-gray-800 cursor-pointer transition">
            <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Twitter</title><path d="M6.29 18.25c7.55 0 11.67-6.25 11.67-11.67v-.53c.8-.59 1.49-1.3 2.04-2.13-.75.33-1.54.55-2.36.65a4.12 4.12 0 0 0 1.8-2.27c-.8.48-1.68.81-2.6 1a4.1 4.1 0 0 0-7 3.74 11.65 11.65 0 0 1-8.45-4.3 4.1 4.1 0 0 0 1.27 5.49C2.01 8.2 1.37 8.03.8 7.7v.05a4.1 4.1 0 0 0 3.3 4.03 4.1 4.1 0 0 1-1.86.07 4.1 4.1 0 0 0 3.83 2.85A8.23 8.23 0 0 1 0 16.4a11.62 11.62 0 0 0 6.29 1.84"></path></svg>
          </span>
          <span class="rounded-full border-2 border-white p-3 hover:bg-white hover:text-gray-800 cursor-pointer transition">
            <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>GitHub</title><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
          </span>
          <span class="rounded-full border-2 border-white p-3 hover:bg-white hover:text-gray-800 cursor-pointer transition">
            <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>LinkedIn</title><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
          </span>
        </div>
      </div>
      <div class="p-6 md:w-1/3">
        <h3 class="uppercase text-2xl font-bold leading-none tracking-normal pb-5">Про автора</h3>
        <p class="text-gray-300 leading-relaxed text-sm">
          Лабораторна робота виконана в рамках курсу «Програмування та підтримка веб застосунків».
          Використано мову <span class="text-green-400 font-semibold">PHP 8</span> та фреймворк <span class="text-green-400 font-semibold">Tailwind CSS</span>.
        </p>
      </div>
    </div>
  </section>
</main>

<!-- Завдання 4: Футер сайту з актуальним роком за допомогою date('Y') -->
<footer class="bg-gray-900 py-6 border-t border-gray-800">
  <p class="text-center text-gray-400 text-sm">
    Copyright &copy; Your Website <?= $currentYear; ?> &bull; Всі права захищено.
  </p>
</footer>

</body>
</html>
