<?php

namespace App\Livewire;

use Livewire\Component;

class CalorieCalculator extends Component
{
    public $age, $weight, $height, $gender, $activity, $fat_percentage;
    public $calories, $protein, $fat, $carbs, $effective_weight, $bmi;

    public function calculate()
    {
        // Расчет BMR
        $bmr = ($this->gender === 'male')
            ? (10 * $this->weight + 6.25 * $this->height - 5 * $this->age + 5)
            : (10 * $this->weight + 6.25 * $this->height - 5 * $this->age - 161);

        // Расчет дневной калорийности
        $this->calories = $bmr * $this->activity;

        // Расчет белков, жиров и углеводов
        $this->protein = round($this->weight * 1.8, 2); // Белки в граммах
        $this->fat = round($this->calories * 0.4 / 9, 2); // Жиры в граммах
        $this->carbs = round(($this->calories - ($this->protein * 4 + $this->fat * 9)) / 4, 2); // Углеводы в граммах

        // Эффективный вес
        $this->effective_weight = round(($this->height - 100) * (1 - ($this->gender === 'male' ? 0.1 : 0.15)), 2);

        // Индекс массы тела
        $this->bmi = round($this->weight / (($this->height / 100) ** 2), 2);
    }

    public function render()
    {
        return view('livewire.calorie-calculator');
    }
}
