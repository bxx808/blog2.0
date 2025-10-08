<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_to_tags');
    }

    public function getColorAttribute()
    {
        $colors = [
            '#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4', '#FFEAA7',
            '#DDA0DD', '#98D8C8', '#F7DC6F', '#BB8FCE', '#85C1E9',
            '#F8C471', '#82E0AA', '#F1948A', '#85C1E9', '#D7BDE2',
            '#F9E79F', '#AED6F1', '#A3E4D7', '#FAD7A0', '#E8DAEF'
        ];

        return $colors[$this->id%count($colors)];
    }

    // Получить контрастный цвет текста (черный или белый)

    public function getTextColorAttribute(): string
    {
        return $this->getContrastColor($this->getColorAttribute());
    }

    /**
     * Вычисление контрастного цвета
     */
    private function getContrastColor($hexColor): string
    {
        // Удаляем # если есть
        $hexColor = ltrim($hexColor, '#');

        // Конвертируем HEX в RGB
        $r = hexdec(substr($hexColor, 0, 2));
        $g = hexdec(substr($hexColor, 2, 2));
        $b = hexdec(substr($hexColor, 4, 2));

        // Вычисляем яркость по формуле
        $brightness = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;

        // Возвращаем черный или белый в зависимости от яркости фона
        return $brightness > 128 ? '#000000' : '#FFFFFF';
    }
}
