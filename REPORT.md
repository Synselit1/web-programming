# ЗВІТ
## про виконання лабораторної роботи №6
### з дисципліни «Програмування та підтримка веб застосунків»

**Тема:** Основи мови програмування PHP. Функції та об'єкти в PHP  
**Мета:** Навчитися працювати з мовою PHP та її особливостями, ознайомитися з використанням функцій, об'єктів та їхніх методів.

---

## 1. Теоретичні відомості

Мова **PHP** (Hypertext Preprocessor) — це скриптова серверна мова програмування, призначена для динамічної генерації веб-сторінок. Основні концепції, що розглядаються в даній лабораторній роботі:
1. **Синтаксис та змінні:** PHP код вбудовується безпосередньо в розмітку HTML за допомогою тегів `<?php ... ?>` або короткого виводу `<?= $variable ?>`. Змінні починаються з символу `$`.
2. **Вбудовані функції:** використання стандартних функцій, таких як `date()` для роботи з часом і датами, `number_format()` для форматування грошових сум, `rand()` для генерації псевдовипадкових чисел.
3. **Користувацькі функції:** оголошення за допомогою ключового слова `function`, підтримка типізації аргументів та значень, що повертаються (Type Hinting), параметри за замовчуванням.
4. **Об'єктно-орієнтоване програмування (ООП):**
   - Оголошення класу (`class ClassName`)
   - Типізовані властивості класу (`public string $name`, `public float $price` тощо)
   - Конструктор класу (`public function __construct(...)`)
   - Методи класу для інкапсуляції бізнес-логіки та форматування даних

---

## 2. Хід роботи та виконання завдань

### Завдання 1. Встановлення та налаштування PHP сервера

Для розгортання та тестування веб-застосунку було розглянуто кілька варіантів локального середовища:
1. **Вбудований веб-сервер PHP (PHP Built-in Server):**
   Запуск сервера здійснюється однією командою з кореневої директорії проекту:
   ```powershell
   php -S 127.0.0.1:8000 -t .
   ```
   Сервер миттєво стартує та стає доступним за адресою `http://127.0.0.1:8000/`.

2. **Контейнеризація за допомогою Docker (`docker-compose.yml`):**
   Для забезпечення повної ізоляції середовища та незалежності від платформи налаштовано контейнер на базі образу `php:8.3-apache`:
   ```yaml
   version: '3.8'

   services:
     web:
       image: php:8.3-apache
       container_name: lab6_php_server
       ports:
         - "8080:80"
       volumes:
         - ./:/var/www/html/
       restart: always
   ```
   Запуск контейнера:
   ```bash
   docker compose up -d
   ```
   Після запуску проект доступний за посиланням: `http://localhost:8080/`.

---

### Завдання 2. Створення профілю на GitHub та структурування гілок проекту

1. Ініціалізовано локальний репозиторій Git у папці проекту:
   ```powershell
   git init
   git config user.name "Student"
   git config user.email "student@example.com"
   ```
2. Створено файл `.gitignore` для виключення системних файлів та тимчасових даних:
   ```text
   .idea/
   .vscode/
   *.log
   codepen.html
   ```
3. Створено основну гілку `main` та здійснено базовий коміт.
4. Створено та переключено на окрему робочу гілку `lab6` для виконання завдань лабораторної роботи №6:
   ```powershell
   git branch -M main
   git checkout -b lab6
   git add .
   git commit -m "feat(lab6): Complete laboratory work #6 on PHP basics, functions, and OOP"
   ```
5. Для публікації на віддаленому сервері GitHub:
   ```powershell
   git remote add origin https://github.com/<username>/web-programming.git
   git push -u origin lab6
   ```

---

### Завдання 3. Переробка блоку About на генерацію з боку PHP

Вихідний макет CodePen (`https://codepen.io/gmyynzug-the-sasster/pen/GRexmVW`) містить статичний блок "About".  
Було створено функцію `renderAboutBlock()` у файлі `includes/functions.php`, яка повертає HTML-код секції, забезпечуючи інкапсуляцію розмітки та можливість передачі довільного тексту і параметрів:

```php
function renderAboutBlock(
    string $heading = 'About',
    string $col1 = 'Freelancer is a free tailwind css theme created from Freelancer theme by Start Bootstrap...',
    string $col2 = 'You can create your own custom avatar for the masthead...',
    string $btnText = 'Free Download!'
): string {
    $headingEscaped = htmlspecialchars($heading);
    $col1Escaped = htmlspecialchars($col1);
    $col2Escaped = htmlspecialchars($col2);
    $btnTextEscaped = htmlspecialchars($btnText);

    return <<<HTML
  <section class="bg-green-500 -mt-12 py-16">
    <h1 class="text-center uppercase text-white text-4xl font-bold leading-none tracking-normal">
      {$headingEscaped}
    </h1>
    <!-- Розділювач з іконкою зірочки -->
    <div class="flex flex-row items-center justify-center py-4">
      <span class="h-1 w-24 bg-white rounded-full mx-2"></span>
      <svg class="h-12 fill-current text-white" viewBox="0 0 24 24">...</svg>
      <span class="h-1 w-24 bg-white rounded-full mx-2"></span>
    </div>
    <!-- Текстові колонки -->
    <div class="flex flex-col lg:flex-row max-w-lg md:max-w-2xl lg:max-w-3xl mx-auto">
      <div class="mx-6 text-white text-xl py-4">{$col1Escaped}</div>
      <div class="mx-6 text-white text-xl py-4">{$col2Escaped}</div>
    </div>
    <div class="flex justify-center py-8">
      <button class="bg-transparent hover:bg-white hover:text-black text-white border-2 border-white font-normal py-3 px-5 rounded-lg inline-flex items-center transition duration-200">
        <span>{$btnTextEscaped}</span>
      </button>
    </div>
  </section>
HTML;
}
```

У файлі `index.php` статичний блок замінено на виклик функції:
```php
<div id="about">
  <?= renderAboutBlock(
      heading: 'Про Проект',
      col1: 'Freelancer is a free tailwind css theme created from Freelancer theme by Start Bootstrap.',
      col2: 'У цій версії всі динамічні секції побудовані на об\'єктній моделі PHP 8...',
      btnText: 'Завантажити Звіт'
  ); ?>
</div>
```

---

### Завдання 4. Динамічне виведення поточного року у футері сайту

У статичному макеті було прописано жорстку дату `2019`.  
Для того щоб рік завжди автоматично оновлювався, використано стандартну функцію PHP `date('Y')`:

```php
// Отримання поточного року
$currentYear = date('Y');
```

У розмітці футера:
```html
<footer class="bg-gray-900 py-6 border-t border-gray-800">
  <p class="text-center text-gray-400 text-sm">
    Copyright &copy; Your Website <?= $currentYear; ?> &bull; Всі права захищено.
  </p>
</footer>
```
Тепер при відкритті сайту автоматично виводиться актуальний рік (`2026`).

---

### Завдання 5. Динамічне виведення локації у футері

Створено змінну `$location` на початку скрипта `index.php`:
```php
$location = "м. Київ, вул. Хрещатик, 22<br>01001, Україна";
```

У блоці футера замість статичного тексту Bari, Italy виведено значення цієї змінної:
```html
<div class="p-6 md:w-1/3">
  <h3 class="uppercase text-2xl font-bold leading-none tracking-normal pb-5">Локація</h3>
  <p class="text-gray-300 leading-relaxed"><?= $location; ?></p>
</div>
```

---

### Завдання 6. Створення класу House для опису будинків

Створено окремий файл `classes/House.php`, в якому описано клас `House` відповідно до вимог завдання:
- `name` (назва / тип будинку)
- `price` (базова ціна)
- `address` (адреса розташування)
- `phone` (контактний телефон рієлтора)
- `image` (посилання на фото будинку)
- `bedrooms` (кількість спалень)
- `bathrooms` (кількість ванних кімнат)
- `realtorName` (ім'я відповідального рієлтора)
- `realtorAvatar` (фото рієлтора)

```php
<?php
class House {
    public string $name;
    public float $price;
    public string $address;
    public string $phone;
    public string $image;
    public int $bedrooms;
    public int $bathrooms;
    public string $realtorName;
    public string $realtorAvatar;

    public function __construct(
        string $name,
        float $price,
        string $address,
        string $phone,
        string $image,
        int $bedrooms,
        int $bathrooms,
        string $realtorName = 'Tiffany Heffner',
        string $realtorAvatar = 'https://images.unsplash.com/...'
    ) {
        $this->name = $name;
        $this->price = $price;
        $this->address = $address;
        $this->phone = $phone;
        $this->image = $image;
        $this->bedrooms = $bedrooms;
        $this->bathrooms = $bathrooms;
        $this->realtorName = $realtorName;
        $this->realtorAvatar = $realtorAvatar;
    }

    public function getFormattedPrice(?float $customPrice = null): string {
        $amount = $customPrice ?? $this->price;
        return '$' . number_format($amount, 0, '.', ',');
    }
}
```

---

### Завдання 7. Ініціалізація масиву об'єктів та циклічне виведення

У файлі `index.php` створено масив екземплярів класу `House` з різними параметрами, фотографіями та характеристиками:
```php
$houses = [
    new House(
        name: "Detached house • 5y old",
        price: 750000,
        address: "742 Evergreen Terrace, Springfield",
        phone: "(555) 555-4321",
        image: "https://images.unsplash.com/photo-1475855581690-80accde3ae2b?auto=format&fit=crop&w=750&q=80",
        bedrooms: 3,
        bathrooms: 2
    ),
    new House(
        name: "Modern Villa • 2y old",
        price: 920000,
        address: "10880 Wilshire Blvd, Los Angeles",
        phone: "(555) 321-9876",
        image: "https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=750&q=80",
        bedrooms: 5,
        bathrooms: 4,
        realtorName: "Alexander Wright"
    ),
    // ... додаткові об'єкти будинків
];
```

Виведення карток здійснюється за допомогою конструкції `foreach ($houses as $house)`:
```php
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
  <?php foreach ($houses as $house): ?>
    <!-- Генерація картки для кожного об'єкта -->
    ...
  <?php endforeach; ?>
</div>
```

---

### Завдання 8. Функція акції та розрахунок знижки (0–30%)

Написано функцію `calculateHousePromo()`, яка рандомно визначає, чи підпадає конкретний будинок під акцію, та генерує знижку в межах від 0% до 30%:

```php
function calculateHousePromo(int $chancePercent = 60, int $maxPercent = 30): array {
    $maxPercent = min(30, max(1, $maxPercent));
    $hasPromo = (rand(1, 100) <= $chancePercent);

    if ($hasPromo) {
        $discount = rand(5, $maxPercent); // випадкова знижка від 5% до 30%
        return [
            'isPromo' => true,
            'percent' => $discount
        ];
    }

    return [
        'isPromo' => false,
        'percent' => 0
    ];
}
```

Також реалізовано допоміжну функцію для розрахунку нової ціни:
```php
function getDiscountedPrice(float $originalPrice, int $percent): float {
    if ($percent <= 0) {
        return $originalPrice;
    }
    return round($originalPrice * (1 - ($percent / 100)), 2);
}
```

У циклі виведення будинків:
```php
<?php
  $promo = calculateHousePromo(chancePercent: 60, maxPercent: 30);
  $hasPromo = $promo['isPromo'] && ($promo['percent'] > 0);
?>
<!-- У картці будинку -->
<?php if ($hasPromo): ?>
  <?php $discountedPrice = getDiscountedPrice($house->price, $promo['percent']); ?>
  <div class="my-2">
    <div class="text-sm text-gray-400 font-medium">Стара ціна:</div>
    <div class="flex items-baseline space-x-3">
      <!-- Перекреслена стара ціна -->
      <span class="text-xl text-gray-400 line-through">
        <?= $house->getFormattedPrice($house->price) ?>
      </span>
      <!-- Нова акційна ціна у червоному кольорі та більшим шрифтом -->
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
```

---

## 3. Структура створеного проекту

```text
lab6/
├── classes/
│   └── House.php            # Клас будинку (ООП, властивості, методи)
├── includes/
│   └── functions.php        # Функції renderAboutBlock(), calculateHousePromo()
├── index.php                # Головний файл веб-сторінки
├── docker-compose.yml       # Конфігурація для запуску в Docker Container
├── .gitignore               # Виключення для Git
└── REPORT.md                # Звіт про виконання лабораторної роботи
```

---

## 4. Висновки

Під час виконання лабораторної роботи №6:
1. Ознайомилися з основами мови програмування PHP 8, її синтаксисом та взаємодією з HTML-розміткою.
2. Розгорнули локальний сервер розробки за допомогою вбудованого сервера `php -S` та підготували конфігурацію контейнера `docker-compose.yml`.
3. Організували роботу з системою контролю версій Git, створили відповідні гілки (`main`, `lab6`) та зафіксували всі етапи розробки.
4. Навчилися створювати функції користувача в PHP, інкапсулювати в них генерацію блоків сторінки (секція About) та передавати параметри.
5. Застосували роботу зі стандартними функціями дати (`date()`), випадкових чисел (`rand()`) та математичних операцій.
6. Засвоїли принципи об'єктно-орієнтованого програмування в PHP: створили клас `House`, типізовані властивості, конструктор та метод форматування ціни.
7. Реалізували динамічну секцію каталогу нерухомості з випадковим розрахунком акцій (до 30%) та умовним стилізуванням ціни (перекреслена стара ціна, більший шрифт та червоний колір для акційної).
