<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Profile;
use App\Livewire\Auth\Register;
use App\Livewire\BookViewer;
use App\Livewire\BookList;
use App\Livewire\BusinessTripList;
use App\Livewire\BusinessTripViewer;
use App\Livewire\Gallery;
use App\Livewire\CalorieCalculator;
use App\Livewire\Pages\Blog;
use App\Livewire\Pages\ChatBot;
use App\Livewire\Pages\Certificates;
use App\Livewire\Pages\Contact;
use App\Livewire\Pages\Exercises;
use App\Livewire\Pages\Help;
use App\Livewire\Pages\Home;
use App\Livewire\Pages\Lesson;
use App\Livewire\Pages\Nutrition;
use App\Livewire\Pages\Project;
use App\Livewire\Pages\ProjectMembers;
use App\Livewire\Pages\SportEvents;
use App\Livewire\SportEventViewer;
use App\Livewire\Pages\TestFor;
use App\Livewire\SeminarList;
use App\Livewire\SeminarViewer;
use App\Livewire\ScientificResults;
use App\Livewire\ProfessionalDevelopment;
use App\Livewire\ProfessionalDevelopmentViewer;
use Illuminate\Support\Facades\Route;

Route::get("/", Home::class)->name("home");
Route::get("/blog", Blog::class)->name("blog");
Route::get("/chat", action: ChatBot::class)->name("chat");
Route::get('/blog/${id}', [HomeController::class, "singleBLOG"])->name(
    "blog.single"
);
Route::get("/video", Lesson::class)->name("lesson");

Route::get("/contact", Contact::class)->name("contact");
Route::get("/projects", Project::class)->name("projects");
Route::get("/nutrition", Nutrition::class)->name("nutrition");
Route::get("/calculator", CalorieCalculator::class)->name("calculator");
Route::get("/help", Help::class)->name("help");
Route::get("/test", TestFor::class)->name("test");
Route::get("/exercises", Exercises::class)->name("exercises");
Route::get("/sport-events", SportEvents::class)->name("sport-events");
Route::get("/sport-event/{eventId}", SportEventViewer::class)->name("sport-event.view");

Route::get("/login", Login::class)->name("login");
Route::get("/logout", [LoginController::class, "logout"])->name("auth.logout");
Route::get("/register", Register::class)->name("register");
Route::post("/register", [RegisterController::class, "register"])->name(
    "auth.register"
);
Route::get("/profile", Profile::class)->name("profile");

Route::view("/privacy-policy", "privacy-policy");
Route::get("/books", BookList::class)->name("books.list");
Route::get("/book/{bookId}", BookViewer::class)->name("book.view");
Route::get("/business-trips", BusinessTripList::class)->name(
    "business-trips.list"
);
Route::get("/business-trip/{businessTripId}", BusinessTripViewer::class)->name(
    "business-trip.view"
);
Route::get("/seminars", SeminarList::class)->name("seminars.list");
Route::get("/seminar/{seminarId}", SeminarViewer::class)->name("seminar.view");
Route::get("/gallery", Gallery::class)->name("gallery");
Route::view("/within-project/2", "project.project2")->name("project.2");
Route::view("/within-project/3", "project.project3")->name("project.3");
Route::get("/within-project/4", ScientificResults::class)->name("project.4");
Route::get("/within-project/5", ProfessionalDevelopment::class)->name("professional-development");
Route::get("/professional-development/{id}", ProfessionalDevelopmentViewer::class)->name("professional-development.view");
Route::get("/within-project/6", Certificates::class)->name("project.6");
Route::get("/project-members", ProjectMembers::class)->name("project-members");
Route::get("/project-member/{memberId}", App\Livewire\Pages\ProjectMemberDetail::class)->name("project-member.view");
Route::get("/professional-development/{id}", ProfessionalDevelopmentViewer::class)->name("professional-development.view");
