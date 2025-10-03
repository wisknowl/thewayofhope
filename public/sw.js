/**
 * Service Worker for The Way of Hope
 * Caches static assets for offline functionality
 */

const CACHE_NAME = 'wayofhope-v1';
const urlsToCache = [
    '/',
    '/assets/css/style.css',
    '/assets/js/main.js',
    '/assets/js/performance.js',
    '/about',
    '/programs',
    '/get-involved',
    '/donate',
    '/news',
    '/events',
    '/gallery',
    '/store',
    '/contact'
];

// Install event
self.addEventListener('install', function(event) {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(function(cache) {
                return cache.addAll(urlsToCache);
            })
    );
});

// Fetch event
self.addEventListener('fetch', function(event) {
    event.respondWith(
        caches.match(event.request)
            .then(function(response) {
                // Return cached version or fetch from network
                return response || fetch(event.request);
            }
        )
    );
});

// Activate event
self.addEventListener('activate', function(event) {
    event.waitUntil(
        caches.keys().then(function(cacheNames) {
            return Promise.all(
                cacheNames.map(function(cacheName) {
                    if (cacheName !== CACHE_NAME) {
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});
