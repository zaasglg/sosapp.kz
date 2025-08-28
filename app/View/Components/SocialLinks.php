<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SocialLinks extends Component
{
    /**
     * Member with social links
     *
     * @var mixed
     */
    public $member;
    
    /**
     * Size of the social link icons (sm, md, lg)
     * 
     * @var string
     */
    public $size;
    
    /**
     * Whether to show email link
     * 
     * @var bool
     */
    public $showEmail;

    /**
     * Configuration for supported social networks
     *
     * @var array
     */
    public $networks = [
        'facebook' => [
            'icon' => 'fab fa-facebook-f',
            'color' => 'text-blue-700',
            'hover' => 'hover:bg-blue-100',
        ],
        'twitter' => [
            'icon' => 'fab fa-twitter',
            'color' => 'text-blue-500',
            'hover' => 'hover:bg-blue-100',
        ],
        'x' => [
            'icon' => 'fab fa-x-twitter',
            'color' => 'text-gray-800',
            'hover' => 'hover:bg-gray-100',
        ],
        'linkedin' => [
            'icon' => 'fab fa-linkedin-in',
            'color' => 'text-blue-700',
            'hover' => 'hover:bg-blue-100',
        ],
        'telegram' => [
            'icon' => 'fab fa-telegram-plane',
            'color' => 'text-blue-500',
            'hover' => 'hover:bg-blue-100',
        ],
        'instagram' => [
            'icon' => 'fab fa-instagram',
            'color' => 'text-pink-600',
            'hover' => 'hover:bg-pink-100',
        ],
        'github' => [
            'icon' => 'fab fa-github',
            'color' => 'text-gray-800',
            'hover' => 'hover:bg-gray-100',
        ],
        'youtube' => [
            'icon' => 'fab fa-youtube',
            'color' => 'text-red-600',
            'hover' => 'hover:bg-red-100',
        ],
        'tiktok' => [
            'icon' => 'fab fa-tiktok',
            'color' => 'text-black',
            'hover' => 'hover:bg-gray-100',
        ],
        'website' => [
            'icon' => 'fas fa-globe',
            'color' => 'text-green-600',
            'hover' => 'hover:bg-green-100',
        ],
        'email' => [
            'icon' => 'fas fa-envelope',
            'color' => 'text-gray-600',
            'hover' => 'hover:bg-gray-100',
        ],
    ];

    /**
     * Create a new component instance.
     */
    public function __construct($member, $size = 'md', $showEmail = true)
    {
        $this->member = $member;
        $this->size = $size;
        $this->showEmail = $showEmail;
    }

    /**
     * Get the size class based on the size prop
     */
    public function getSizeClass()
    {
        return match($this->size) {
            'sm' => 'w-6 h-6 text-xs',
            'lg' => 'w-10 h-10 text-base',
            default => 'w-8 h-8 text-sm', // md size
        };
    }

    /**
     * Get available social links for this member
     */
    public function getAvailableSocialLinks()
    {
        $links = [];
        
        // Add email if showEmail is true
        if ($this->showEmail && !empty($this->member->email)) {
            $links['email'] = 'mailto:' . $this->member->email;
        }
        
        // Add social links from the member
        if (!empty($this->member->social_links) && is_array($this->member->social_links)) {
            foreach ($this->member->social_links as $platform => $value) {
                if (isset($this->networks[$platform]) && !empty($value)) {
                    $links[$platform] = $this->member->getSocialLinkUrl($platform);
                }
            }
        }
        
        return $links;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.social-links', [
            'links' => $this->getAvailableSocialLinks(),
            'sizeClass' => $this->getSizeClass(),
        ]);
    }
}
