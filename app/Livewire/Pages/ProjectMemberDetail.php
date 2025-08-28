<?php

namespace App\Livewire\Pages;

use App\Models\ProjectMember;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class ProjectMemberDetail extends Component
{
    public $memberId;
    public $member;

    public function mount($memberId)
    {
        $this->memberId = $memberId;
        $this->member = ProjectMember::active()->findOrFail($memberId);
    }

    public function render()
    {
        // Get related members (same department or with similar skills)
        $relatedMembers = Cache::remember('related_members_' . $this->memberId, 3600, function () {
            $query = ProjectMember::active()
                ->where('id', '!=', $this->memberId)
                ->ordered();

            // First try to find members from the same department
            if ($this->member->department) {
                $query->where('department', $this->member->department);
            }
            
            $members = $query->limit(4)->get();
            
            // If we don't have enough related members by department, add some by skills
            if ($members->count() < 4 && !empty($this->member->skills)) {
                $skillIds = ProjectMember::active()
                    ->where('id', '!=', $this->memberId)
                    ->whereNotIn('id', $members->pluck('id')->toArray())
                    ->ordered()
                    ->limit(4 - $members->count())
                    ->get();
                    
                $members = $members->concat($skillIds);
            }
            
            return $members;
        });

        return view('livewire.pages.project-member-detail', [
            'member' => $this->member,
            'relatedMembers' => $relatedMembers,
        ]);
    }
}
