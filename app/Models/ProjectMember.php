<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ProjectMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'position',
        'description',
        'avatar_path',
        'department',
        'specialization',
        'email',
        'phone',
        'social_links',
        'skills',
        'projects',
        'status',
        'is_featured',
        'is_active',
        'sort_order',
        'order',
    ];

    protected $casts = [
        'skills' => 'array',
        'projects' => 'array',
        'social_links' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'order' => 'integer',
    ];

    // Scope для активных участников
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope для выделенных участников
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Scope для сортировки
    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('sort_order')->orderBy('full_name');
    }

    // Аксессор для полного URL аватара
    protected function avatarUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->avatar_path ? asset('storage/' . $this->avatar_path) : null,
        );
    }

    // Аксессор для короткого имени
    protected function shortName(): Attribute
    {
        return Attribute::make(
            get: fn () => explode(' ', $this->full_name)[0] ?? $this->full_name,
        );
    }

    // Аксессор для инициалов
    protected function initials(): Attribute
    {
        return Attribute::make(
            get: function () {
                $names = explode(' ', $this->full_name);
                $initials = '';
                foreach (array_slice($names, 0, 2) as $name) {
                    $initials .= strtoupper(substr($name, 0, 1));
                }
                return $initials;
            }
        );
    }

    // Метод для получения статуса на казахском
    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'active' => 'Белсенді',
            'inactive' => 'Белсенді емес',
            'alumni' => 'Түлек',
            default => 'Белгісіз',
        };
    }

    // Аксессор для получения LinkedIn URL (для обратной совместимости)
    public function getLinkedinUrlAttribute()
    {
        $socialLinks = $this->social_links ?? [];
        return $socialLinks['linkedin'] ?? null;
    }

    // Аксессор для получения Telegram username (для обратной совместимости)
    public function getTelegramUsernameAttribute()
    {
        $socialLinks = $this->social_links ?? [];
        return $socialLinks['telegram'] ?? null;
    }

    /**
     * Добавляет или обновляет социальную сеть
     * 
     * @param string $platform Ключ платформы (например, 'facebook', 'linkedin', 'instagram')
     * @param string $url URL или username
     * @return $this
     */
    public function addSocialLink(string $platform, string $url): self
    {
        $socialLinks = $this->social_links ?? [];
        $socialLinks[$platform] = $url;
        $this->social_links = $socialLinks;
        return $this;
    }

    /**
     * Удаляет социальную сеть
     * 
     * @param string $platform Ключ платформы
     * @return $this
     */
    public function removeSocialLink(string $platform): self
    {
        $socialLinks = $this->social_links ?? [];
        if (isset($socialLinks[$platform])) {
            unset($socialLinks[$platform]);
            $this->social_links = $socialLinks;
        }
        return $this;
    }

    /**
     * Проверяет наличие социальной сети
     * 
     * @param string $platform Ключ платформы
     * @return bool
     */
    public function hasSocialLink(string $platform): bool
    {
        $socialLinks = $this->social_links ?? [];
        return isset($socialLinks[$platform]) && !empty($socialLinks[$platform]);
    }

    /**
     * Получает URL или username для указанной платформы
     * 
     * @param string $platform Ключ платформы
     * @param string|null $default Значение по умолчанию
     * @return string|null
     */
    public function getSocialLink(string $platform, ?string $default = null): ?string
    {
        $socialLinks = $this->social_links ?? [];
        return $socialLinks[$platform] ?? $default;
    }

    /**
     * Получает полный URL для социальной сети с учетом шаблона
     * 
     * @param string $platform Ключ платформы
     * @return string|null
     */
    public function getSocialLinkUrl(string $platform): ?string
    {
        if (!$this->hasSocialLink($platform)) {
            return null;
        }

        $value = $this->getSocialLink($platform);
        
        return match ($platform) {
            'facebook' => 'https://facebook.com/' . $value,
            'twitter', 'x' => 'https://twitter.com/' . $value,
            'linkedin' => str_contains($value, 'http') ? $value : 'https://linkedin.com/in/' . $value,
            'instagram' => 'https://instagram.com/' . $value,
            'telegram' => 'https://t.me/' . $value,
            'github' => 'https://github.com/' . $value,
            'youtube' => str_contains($value, 'http') ? $value : 'https://youtube.com/' . $value,
            'tiktok' => 'https://tiktok.com/@' . $value,
            default => $value, // Возвращаем как есть для неизвестных платформ
        };
    }
}
