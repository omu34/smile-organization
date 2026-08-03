import "./echo";

// AOS initialization
document.addEventListener("livewire:navigated", () => {
    AOS.init();
});

// {--Swiper Initialization-- } }
document.addEventListener("DOMContentLoaded", function() {
    new Swiper(".mySwiper", {
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        effect: "fade",
        speed: 1200,
        fadeEffect: {
            crossFade: true,
        },
    });
});

// video update listener
window.Echo.channel("videos").listen(".VideoUpdated", (e) => {
    const video = document.getElementById("hero-video");
    if (video) {
        const source = video.querySelector("source");
        source.src = e.videoUrl;
        video.load();
        video.play();
    }
});

//  {{-- Lazy Loading for Background Images --}}

document.addEventListener("DOMContentLoaded", function() {
    if ("IntersectionObserver" in window) {
        let lazyBgObserver = new IntersectionObserver(function(
            entries,
            observer,
        ) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    let element = entry.target;
                    let bg = element.dataset.bg;
                    if (bg) {
                        element.style.backgroundImage = "url(" + bg + ")";
                        element.classList.remove("lazy-bg");
                        lazyBgObserver.unobserve(element);
                    }
                }
            });
        });

        let lazyBgElements = document.querySelectorAll(".lazy-bg");
        lazyBgElements.forEach(function(element) {
            lazyBgObserver.observe(element);
        });
    }
});

// {{-- Swiper Initialization --}}

document.addEventListener("DOMContentLoaded", function() {
    new Swiper(".mySwiper", {
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        effect: "fade",
        speed: 1200,
        fadeEffect: {
            crossFade: true,
        },
    });
});

// {{-- AREA OF PRACTICE --}}

tailwind.config = {
    theme: {
        extend: {
            keyframes: {
                rotate360: {
                    "0%": {
                        transform: "rotateY(0deg)",
                    },
                    "100%": {
                        transform: "rotateY(360deg)",
                    },
                },
            },
            animation: {
                rotate360: "rotate360 120s linear infinite",
            },
        },
    },
};



window.Echo.channel('videos')
    .listen('.VideoUpdated', (e) => {
        const video = document.getElementById('hero-video');
        if (video) {
            const source = video.querySelector('source');
            source.src = e.videoUrl;
            video.load();
            video.play();
        }
    });