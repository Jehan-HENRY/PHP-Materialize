self.addEventListener('install', e => {
  e.waitUntil(caches.open('happy.trip').then(cache => {
    return cache.addAll([
      './',
      './index.php',
      './partials/header.php',
      './partials/footer.php',
      './inscription.php',
      './connexion.php',
      './deconnexion.php',
      './profil.php',
      './editionprofil.php',
      './travel.php',
      './vendor/css/materialize.min.css',
      './vendor/fonts/roboto/Roboto-Light.woff2',
      './vendor/fonts/roboto/Roboto-Medium.woff2',
      './vendor/fonts/roboto/Roboto-Regular.woff2',
      './vendor/js/draggable.bundle.min.js',
      './vendor/js/jquery-3.3.1.js',
      './vendor/js/materialize.min.js',
      './stylesheets/main.css',
      './images/icon-192x192.png',
      './images/icon-256x256.png',
      './images/icon-384x384.png',
      './images/icon-512x512.png',
      './images/parallax1.jpeg',
      './images/parallax2.jpeg',
      './images/partage.jpeg',
      './images/prepare.jpeg',
      './images/voyage.jpeg',
      './favicon.ico',
      './robots.txt',
      './sitemap.xml',
      './manifest.json'
    ]);
  }));
});

self.addEventListener('activate', event => {
  event.waitUntil(self.clients.claim());
});

self.addEventListener('fetch', event => {
  event.respondWith(caches.match(event.request, {ignoreSearch: true}).then(response => {
    return response || fetch(event.request);
  }));
});
