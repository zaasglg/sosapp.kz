<main>
    <div style="background-image: url('assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            <livewire:components.header />
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>

    <section class="bg-gray-50">
        <div class="w-11/12 lg:w-10/12 mx-auto py-24">
            <h2 class="text-center text-3xl font-bebas">Видео САБАҚТАР</h2>
            <div class="grid items-start grid-cols-1 lg:grid-cols-3 gap-5 mt-10">

                @foreach ($videoLessons as $lesson)
                    <div class="bg-white p-5 rounded-lg shadow-sm transition duration-200 hover:shadow-2xl hover:cursor-pointer hover:scale-105">
                        <div class="relative h-[200px] bg-gray-100 rounded-lg overflow-hidden video-container">
                            <video-js
                                id="video-player-{{ $loop->index }}"
                                class="video-js vjs-default-skin w-full h-full"
                                controls
                                preload="auto"
                                data-setup='{"fluid": true, "responsive": true}'
                            >
                                <source src="{{ asset('storage/' . $lesson->video_url) }}" type="video/mp4">
                                <p class="vjs-no-js">
                                    Видео көру үшін, қолдағыңыз браузерде JavaScript қосылуы керек.
                                    <a href="{{ asset('storage/' . $lesson->video_url) }}" target="_blank">
                                        Видеоны жүктеу
                                    </a>
                                </p>
                            </video-js>

                            <div class="bg-[#f8b81f] absolute top-2 left-2 px-4 py-1 rounded bg-opacity-85 z-10">
                                <span class="text-xs text-white font-bold">
                                    {{ $lesson->created_at ? $lesson->created_at->format('d.m.Y') : '22.10.2024' }}
                                </span>
                            </div>
                        </div>
                        <div>
                            <h2 class="mt-3 font-bold">{{ $lesson->title }}</h2>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
</main>

@push('styles')
<!-- Video.js CSS -->
<link href="https://vjs.zencdn.net/8.8.0/video-js.css" rel="stylesheet">

<style>
    .video-container {
        position: relative;
        width: 100%;
        height: 200px;
        background: #f3f4f6;
        border-radius: 8px;
        overflow: hidden;
    }
    
    .video-js {
        width: 100%;
        height: 100%;
        border-radius: 8px;
    }
    
    .video-js .vjs-tech {
        object-fit: cover;
    }
    
    /* Кастомные стили для Video.js */
    .video-js .vjs-big-play-button {
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 50%;
        width: 60px;
        height: 60px;
        background: rgba(0, 0, 0, 0.7);
        border: none;
        font-size: 24px;
    }
    
    .video-js .vjs-big-play-button:hover {
        background: rgba(0, 0, 0, 0.9);
    }
    
    .video-js .vjs-control-bar {
        background: linear-gradient(180deg, transparent, rgba(0, 0, 0, 0.8));
        border-radius: 0 0 8px 8px;
    }
    
    .video-js .vjs-slider {
        background: rgba(255, 255, 255, 0.3);
    }
    
    .video-js .vjs-load-progress {
        background: rgba(255, 255, 255, 0.4);
    }
    
    .video-js .vjs-play-progress {
        background: #f8b81f;
    }
    
    .video-js .vjs-volume-level {
        background: #f8b81f;
    }
    
    .video-js .vjs-progress-control .vjs-progress-holder {
        height: 4px;
    }
    
    .video-js .vjs-progress-control .vjs-progress-holder .vjs-load-progress,
    .video-js .vjs-progress-control .vjs-progress-holder .vjs-play-progress {
        height: 4px;
    }
</style>
@endpush

@push('scripts')
<!-- Video.js JS -->
<script src="https://vjs.zencdn.net/8.8.0/video.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const players = [];
    
    // Инициализация Video.js для всех видео
    document.querySelectorAll('video-js').forEach(function(video, index) {
        try {
            const player = videojs(video.id, {
                fluid: true,
                responsive: true,
                controls: true,
                preload: 'auto',
                playbackRates: [0.5, 1, 1.25, 1.5, 2],
                plugins: {
                    // Можно добавить плагины
                },
                techOrder: ['html5'],
                html5: {
                    vhs: {
                        overrideNative: true
                    }
                }
            });
            
            players.push(player);
            
            // Обработчики событий
            player.ready(function() {
                console.log(`Video.js плеер ${index + 1} готов`);
            });
            
            player.on('error', function(event) {
                console.error(`Ошибка в Video.js плеере ${index + 1}:`, event);
                
                // Показываем пользовательское сообщение об ошибке
                const container = video.closest('.video-container');
                const errorDiv = document.createElement('div');
                errorDiv.className = 'video-error';
                errorDiv.innerHTML = `
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); 
                         background: rgba(0, 0, 0, 0.8); color: white; padding: 20px; border-radius: 8px; text-align: center;">
                        <i class="fas fa-exclamation-triangle" style="font-size: 2rem; margin-bottom: 10px; opacity: 0.7;"></i>
                        <div>Видео жүктелмеді</div>
                        <div style="font-size: 12px; margin-top: 5px; opacity: 0.8;">Файл табылмады немесе қолдау көрсетілмейді</div>
                    </div>
                `;
                container.appendChild(errorDiv);
            });
            
            player.on('loadstart', function() {
                console.log(`Video.js плеер ${index + 1}: Жүктеу басталды`);
            });
            
            player.on('canplay', function() {
                console.log(`Video.js плеер ${index + 1}: Ойнатуға дайын`);
            });
            
        } catch (error) {
            console.error(`Video.js плеер ${index + 1} инициализация қатесі:`, error);
        }
    });
    
    // Глобальная переменная для доступа к плеерам
    window.videoPlayers = players;
});
</script>
@endpush
