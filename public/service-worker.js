const CACHE_NAME = 'dev2ls-v1';
const urlsToCache = [
  '/',
  '/index.php',
  '/assets/css/style.css',
  '/assets/js/script.js',
  '/manifest.json',
  '/assets/icons/icon-192x192.png',
  '/offline.html'
];

// Installation et mise en cache des ressources
self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        console.log('Cache ouvert');
        return cache.addAll(urlsToCache);
      })
      .catch(error => {
        console.warn('Erreur lors de la mise en cache :', error);
      })
  );
});

// Activation : suppression des anciens caches
self.addEventListener('activate', event => {
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cache => {
          if (cache !== CACHE_NAME) {
            console.log('Suppression du cache obsolète :', cache);
            return caches.delete(cache);
          }
        })
      );
    })
  );
});

// Interception des requêtes réseau et gestion du cache
self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request)
      .then(response => {
        return response || fetch(event.request).catch(() => {
          return caches.match('/offline.html');
        });
      })
  );
});
