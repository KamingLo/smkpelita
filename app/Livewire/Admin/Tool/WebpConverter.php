<?php

namespace App\Livewire\Admin\Tool;

use Livewire\Component;
use Livewire\Attributes\Layout;


class WebpConverter extends Component
{
    #[Layout('components.layouts.admin')]
    public function render()
    {

        return view('livewire.admin.tool.webp-converter');
    }
}
