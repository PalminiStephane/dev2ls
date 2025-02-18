const CACHE_NAME = 'dev2ls-v1';
const urlsToCache = [
  '/perso/dev2ls/public/',
  '/perso/dev2ls/public/index.php',
  '/perso/dev2ls/public/assets/css/style.css',
  '/perso/dev2ls/public/assets/js/script.js',
  '/perso/dev2ls/public/manifest.json',
  '/perso/dev2ls/public/assets/icons/icon-192x192.png'
];

self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        console.log('Cache ouvert');
        return cache.addAll(urlsToCache);
      })
  );
});

self.addEventListener('activate', event => {
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cache => {
          if (cache !== CACHE_NAME) {
            return caches.delete(cache);
          }
        })
      );
    })
  );
});

self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request)
      .then(response => {
        if (response) {
          return response;
        }
        return fetch(event.request);
      })
  );
});