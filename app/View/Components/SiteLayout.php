<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SiteLayout extends Component
{
    public $title;

    public $valentine;

    public function __construct(?string $title = null)
    {
        $this->title = $title;
        $this->valentine = $this->isValentineDay();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.site.layout');
    }

    private function isValentineDay(): bool
    {
        return date('m-d') === '11-13';
    }
}
