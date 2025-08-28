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
                    <div
                        class="bg-white p-5 rounded-lg shadow-sm transition duration-200 hover:shadow-2xl hover:cursor-pointer hover:scale-105">
                        <div class="relative h-[200px] bg-gray-100 rounded-lg overflow-hidden video-container">
                            <video 
                                class="plyr-video w-full h-full object-cover" 
                                playsinline 
                                controls
                                muted
                                preload="metadata"
                                webkit-playsinline
                                data-plyr-config='{"controls": ["play-large", "play", "progress", "current-time", "mute", "volume", "fullscreen"], "autoplay": false, "muted": false, "clickToPlay": true, "keyboard": {"focused": true, "global": false}}'
                            >
                                <source src="{{ asset('storage/' . $lesson->video_url) }}" type="video/mp4">
                                <source src="{{ str_replace('.mp4', '.webm', asset('storage/' . $lesson->video_url)) }}" type="video/webm">
                                <p class="text-center text-gray-500 py-8">
                                    Ваш браузер не поддерживает воспроизведение видео.
                                </p>
                            </video>

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
<!-- Plyr CSS -->
<link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />

<style>
    .video-container {
        position: relative;
        width: 100%;
        height: 100%;
        background: #f3f4f6;
        border-radius: 8px;
        overflow: hidden;
    }
    
    .video-container .plyr-video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        background: #000;
    }
    
    /* Кастомизация Plyr плеера */
    .plyr {
        border-radius: 8px;
    }
    
    .plyr__video-wrapper {
        background: #000;
        border-radius: 8px;
    }
    
    .plyr__controls {
        background: linear-gradient(180deg, transparent, rgba(0, 0, 0, 0.8));
        border-radius: 0 0 8px 8px;
    }
    
    .plyr__control--overlaid {
        background: rgba(0, 0, 0, 0.7);
        border-radius: 50%;
        width: 60px;
        height: 60px;
    }
    
    .plyr__control--overlaid:hover {
        background: rgba(0, 0, 0, 0.9);
    }
    
    .plyr__control--overlaid svg {
        width: 24px;
        height: 24px;
    }
    
    /* Стили для ошибок */
    .video-error {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        z-index: 10;
    }
    
    .video-error i {
        font-size: 2rem;
        margin-bottom: 10px;
        opacity: 0.7;
    }
</style>
@endpush

@push('scripts')
<!-- Plyr JS -->
<script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Инициализация Plyr для всех видео
    const players = [];
    
    document.querySelectorAll('.plyr-video').forEach(function(video, index) {
        try {
            const player = new Plyr(video, {
                controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'fullscreen'],
                settings: [],
                clickToPlay: true,
                keyboard: { focused: true, global: false },
                tooltips: { controls: true, seek: true },
                captions: { active: false },
                fullscreen: { enabled: true, fallback: true, iosNative: true },
                ratio: null,
                volume: 0.8,
                autoplay: false,
                muted: false,
                hideControls: true,
                resetOnEnd: false,
                disableContextMenu: false,
                loadSprite: true,
                iconPrefix: 'plyr',
                iconUrl: 'https://cdn.plyr.io/3.7.8/plyr.svg',
                blankVideo: 'https://cdn.plyr.io/static/blank.mp4',
                // Настройки для Chrome
                html5: {
                    crossorigin: null,
                    nativeCaptions: true,
                    nativeTextTracks: true,
                    preload: 'metadata'
                }
            });
            
            players.push(player);
            
            // Обработчики событий для Chrome
            player.on('ready', function() {
                console.log(`Плеер ${index + 1} готов`);
                
                // Принудительная загрузка для Chrome
                const mediaElement = player.media;
                if (mediaElement) {
                    mediaElement.load();
                    
                    // Дополнительные атрибуты для Chrome
                    mediaElement.setAttribute('webkit-playsinline', 'true');
                    mediaElement.setAttribute('playsinline', 'true');
                    
                    // Обработка ошибок Chrome
                    mediaElement.addEventListener('error', function(e) {
                        console.error(`Ошибка загрузки видео ${index + 1}:`, e);
                        handleVideoError(mediaElement, index);
                    });
                    
                    // Обработка загрузки
                    mediaElement.addEventListener('loadstart', function() {
                        console.log(`Видео ${index + 1}: Начинается загрузка`);
                    });
                    
                    mediaElement.addEventListener('loadedmetadata', function() {
                        console.log(`Видео ${index + 1}: Метаданные загружены`);
                    });
                    
                    mediaElement.addEventListener('canplay', function() {
                        console.log(`Видео ${index + 1}: Готово к воспроизведению`);
                    });
                    
                    // Для Chrome - попытка исправить проблемы с воспроизведением
                    if (mediaElement.networkState === HTMLMediaElement.NETWORK_NO_SOURCE) {
                        setTimeout(function() {
                            mediaElement.load();
                        }, 100);
                    }
                }
            });
            
            player.on('error', function(event) {
                console.error(`Ошибка в плеере ${index + 1}:`, event);
                handleVideoError(player.media, index);
            });
            
        } catch (error) {
            console.error(`Плеер ${index + 1} инициализация қатесі:`, error);
            handleVideoError(video, index);
        }
    });
    
    // Функция обработки ошибок
    function handleVideoError(video, index) {
        const container = video.closest('.video-container');
        if (!container.querySelector('.video-error')) {
            const errorDiv = document.createElement('div');
            errorDiv.className = 'video-error';
            errorDiv.innerHTML = `
                <i class="fas fa-exclamation-triangle"></i>
                <div>Видео жүктелмеді</div>
                <div style="font-size: 12px; margin-top: 5px; opacity: 0.8;">Chrome үшін HTTPS қажет немесе файл табылмады</div>
                <button onclick="retryVideo(this, ${index})" 
                        style="margin-top: 10px; padding: 5px 10px; background: #f8b81f; color: white; border: none; border-radius: 4px; cursor: pointer;">
                    Қайта жүктеу
                </button>
            `;
            container.appendChild(errorDiv);
        }
    }
    
    // Функция повторной загрузки видео
    window.retryVideo = function(button, index) {
        const container = button.closest('.video-container');
        const video = container.querySelector('.plyr-video');
        const errorDiv = container.querySelector('.video-error');
        
        if (errorDiv) {
            errorDiv.remove();
        }
        
        if (video) {
            video.load();
            setTimeout(() => {
                video.play().catch(e => {
                    console.log('Автозапуск заблокирован, это нормально');
                });
            }, 500);
        }
    };
    
    // Глобальная переменная для доступа к плеерам
    window.videoPlayers = players;
});
</script>
@endpush
