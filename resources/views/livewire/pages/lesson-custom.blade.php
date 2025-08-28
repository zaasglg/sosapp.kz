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
                            <video 
                                class="custom-video-player w-full h-full object-cover" 
                                controls
                                preload="metadata"
                                playsinline
                                poster="{{ $lesson->thumbnail ?? asset('assets/images/video-placeholder.jpg') }}"
                            >
                                <source src="{{ asset('storage/' . $lesson->video_url) }}" type="video/mp4">
                                <div class="video-fallback">
                                    <i class="fas fa-video text-4xl text-gray-400 mb-4"></i>
                                    <p class="text-gray-600">Видео қолдау көрсетілмейді</p>
                                    <a href="{{ asset('storage/' . $lesson->video_url) }}" 
                                       class="inline-block mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                                        Жүктеу
                                    </a>
                                </div>
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
<style>
    .video-container {
        position: relative;
        width: 100%;
        height: 200px;
        background: #f3f4f6;
        border-radius: 8px;
        overflow: hidden;
    }
    
    .custom-video-player {
        width: 100%;
        height: 100%;
        background: #000;
        border-radius: 8px;
    }
    
    .custom-video-player::-webkit-media-controls {
        display: flex !important;
        opacity: 1 !important;
    }
    
    .custom-video-player::-webkit-media-controls-panel {
        display: flex !important;
        opacity: 1 !important;
        background: linear-gradient(180deg, transparent, rgba(0, 0, 0, 0.8));
        border-radius: 0 0 8px 8px;
    }
    
    .custom-video-player::-webkit-media-controls-play-button {
        background-color: rgba(248, 184, 31, 0.8);
        border-radius: 50%;
        border: none;
        width: 50px;
        height: 50px;
        margin: auto;
    }
    
    .custom-video-player::-webkit-media-controls-play-button:hover {
        background-color: rgba(248, 184, 31, 1);
    }
    
    .custom-video-player::-webkit-media-controls-timeline {
        background: rgba(255, 255, 255, 0.3);
        border-radius: 2px;
        height: 4px;
    }
    
    .custom-video-player::-webkit-media-controls-current-time-display,
    .custom-video-player::-webkit-media-controls-time-remaining-display {
        color: white;
        font-size: 12px;
    }
    
    .custom-video-player::-webkit-media-controls-volume-slider {
        background: rgba(255, 255, 255, 0.3);
        border-radius: 2px;
        height: 4px;
    }
    
    .custom-video-player::-webkit-media-controls-mute-button,
    .custom-video-player::-webkit-media-controls-fullscreen-button {
        background-color: transparent;
        border: none;
        color: white;
    }
    
    .custom-video-player::-webkit-media-controls-mute-button:hover,
    .custom-video-player::-webkit-media-controls-fullscreen-button:hover {
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 4px;
    }
    
    /* Фоновый постер для видео */
    .video-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        z-index: -1;
    }
    
    .video-fallback {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: white;
        z-index: 5;
    }
    
    /* Анимация загрузки */
    .custom-video-player[data-loading="true"]::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 40px;
        height: 40px;
        border: 3px solid rgba(248, 184, 31, 0.3);
        border-top: 3px solid #f8b81f;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        z-index: 10;
    }
    
    @keyframes spin {
        0% { transform: translate(-50%, -50%) rotate(0deg); }
        100% { transform: translate(-50%, -50%) rotate(360deg); }
    }
    
    /* Ошибка загрузки */
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
        color: #f8b81f;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const videos = document.querySelectorAll('.custom-video-player');
    
    videos.forEach(function(video, index) {
        // Показываем индикатор загрузки
        video.setAttribute('data-loading', 'true');
        
        // Обработчики событий
        video.addEventListener('loadstart', function() {
            console.log(`Видео ${index + 1}: Начинается загрузка`);
            video.setAttribute('data-loading', 'true');
        });
        
        video.addEventListener('loadedmetadata', function() {
            console.log(`Видео ${index + 1}: Метаданные загружены`);
            console.log(`Размеры: ${video.videoWidth}x${video.videoHeight}`);
            console.log(`Длительность: ${video.duration} секунд`);
            video.removeAttribute('data-loading');
        });
        
        video.addEventListener('canplay', function() {
            console.log(`Видео ${index + 1}: Готово к воспроизведению`);
            video.removeAttribute('data-loading');
        });
        
        video.addEventListener('error', function(e) {
            console.error(`Видео ${index + 1}: Ошибка загрузки`, e);
            video.removeAttribute('data-loading');
            
            // Показываем сообщение об ошибке
            const container = video.closest('.video-container');
            let errorDiv = container.querySelector('.video-error');
            
            if (!errorDiv) {
                errorDiv = document.createElement('div');
                errorDiv.className = 'video-error';
                errorDiv.innerHTML = `
                    <i class="fas fa-exclamation-triangle"></i>
                    <div style="font-size: 16px; margin-bottom: 8px;">Видео жүктелмеді</div>
                    <div style="font-size: 12px; opacity: 0.8;">Файл табылмады немесе қолдау көрсетілмейді</div>
                    <button onclick="this.parentElement.parentElement.querySelector('video').load()" 
                            class="mt-3 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                        Қайта жүктеу
                    </button>
                `;
                container.appendChild(errorDiv);
            }
        });
        
        video.addEventListener('waiting', function() {
            video.setAttribute('data-loading', 'true');
        });
        
        video.addEventListener('playing', function() {
            video.removeAttribute('data-loading');
        });
        
        // Принудительная загрузка видео
        video.load();
    });
});
</script>
@endpush
