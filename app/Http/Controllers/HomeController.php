<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view("welcome", [
            'posts' => $posts
        ]);
    }

    public function blog() {
        $posts = Post::all();
        return view('blog', [
            'posts' => $posts
        ]);
    }

    public function video() {
        return view('video');
    }

    public function gallery() {
        return view('gallery');
    }

    public function contact() {
        return view('contact');
    }

    public function projects() {

        $projects = [["ANALYSIS OF HEALTHY LIFESTYLE FORMATION OF HIGHER EDUCATION EDUCATORS (WHOQOL-BREF) KAZ) INDICATORS", "1.pdf"], ["ЖОҒАРЫ ОҚУ ОРНЫ БІЛІМГЕРЛЕРІ АРАСЫНДА САЛАУАТТЫ ӨМІР САЛТЫ ШКАЛАСЫН (WHOQOL-BREF-KAZ) ҚОЛДАНЫСҚА ЕНДІРУ", "2.pdf"], ["ҚАЗІРГІ ҰЛТТЫҚ ТӘРБИЕДЕГІ САЛАУАТТЫ ӨМІР САЛТЫНЫҢ РӨЛІ", "3.pdf"], ["THE RESULTS OF THE COURSE ON MASTERING THE ANALYSIS OF INDICATORS OF FUTURE SPECIALISTS IN THE FORMATION OF A HEALTHY LIFESTYLE ((WHOQOL-BREF) KAZ)", "4.pdf"], ["ЖОҒАРЫ ОҚУ ОРНЫ БІЛІМГЕРЛЕРІНІҢ САЛАУАТТЫ ӨМІР САЛТЫН ҰСТАНУ ЖАҒДАЙЫ МЕН ӨМІР СҮРУ САПАСЫН АНЫҚТАУ", "5.pdf"], ["LATIN AMERICAN INTERNATIONAL CONGRESS ON SOCIAL SCIENCES AND HUMANITIES -V", "6.pdf"]];

        return view('projects', ["projects" => $projects]);
    }

    public function profile() {
        return view('auth.profile');
    }

    public function singleBLOG($id) {
        $blog = Post::find($id);
        return view('single.blog', [
            'post' => $blog
        ]);
    }
}
