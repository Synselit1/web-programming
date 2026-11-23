<?php
/**
 * Клас House (Будинок)
 * Завдання 6: Створіть новий клас для будинків з атрибутами ціни, назви, адреси,
 * контактного телефону, зображення, кількості спалень і ванн.
 */
class House {
    public string $name;            // Назва / тип будинку
    public float $price;            // Вартість будинку
    public string $address;         // Адреса
    public string $phone;           // Контактний телефон
    public string $image;           // URL зображення
    public int $bedrooms;           // Кількість спалень
    public int $bathrooms;          // Кількість ванних кімнат
    public string $realtorName;     // Ім'я рієлтора
    public string $realtorAvatar;   // Аватарка рієлтора

    /**
     * Конструктор класу House
     */
    public function __construct(
        string $name,
        float $price,
        string $address,
        string $phone,
        string $image,
        int $bedrooms,
        int $bathrooms,
        string $realtorName = 'Tiffany Heffner',
        string $realtorAvatar = 'https://images.unsplash.com/photo-1500522144261-ea64433bbe27?ixlib=rb-1.2.1&auto=format&fit=crop&w=751&q=80'
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

    /**
     * Форматує ціну у грошовий вигляд (наприклад, $750,000)
     */
    public function getFormattedPrice(?float $customPrice = null): string {
        $amount = $customPrice ?? $this->price;
        return '$' . number_format($amount, 0, '.', ',');
    }
}
