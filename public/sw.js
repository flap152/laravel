importScripts('workbox-sw.prod.v2.0.1.js');

// Put this at the top of your SW file.
//self.workbox.logLevel = self.workbox.LOG_LEVEL.verbose;

/**
 * DO NOT EDIT THE FILE MANIFEST ENTRY
 *
 * The method precache() does the following:
 * 1. Cache URLs in the manifest to a local cache.
 * 2. When a network request is made for any of these URLs the response
 *    will ALWAYS comes from the cache, NEVER the network.
 * 3. When the service worker changes ONLY assets with a revision change are
 *    updated, old cache entries are left as is.
 *
 * By changing the file manifest manually, your users may end up not receiving
 * new versions of files because the revision hasn't changed.
 *
 * Please use workbox-build or some other tool / approach to generate the file
 * manifest which accounts for changes to local files and update the revision
 * accordingly.
 */
const fileManifest = [
  {
    "url": "index.php",
    "revision": "b9901d13f00ef92e0793e2d9fcd57431"
  }
];

const workboxSW = new self.WorkboxSW();
workboxSW.precache(fileManifest);


/**
 * registerNavigationRoute() is used for sites that follow the App Shell Model,
 * https://developers.google.com/web/fundamentals/architecture/app-shell
 * It tells the service worker that whenever there's a navigation request for
 * a new URL, instead of returning the HTML for that URL, return a previously
 * cached "shell" HTML file instead.
 *
 * If you want more control over which navigations use the "shell" HTML, you
 * can provide an optional array of regular expressions:
 *   - whitelist (which defaults to [/./])
 *   - blacklist (which defaults to [])
 *
 * (For the purposes of this demo, which doesn't follow the App Shell Model,
 * registerNavigationRoute() is commented out.)
 */
// workboxSW.router.registerNavigationRoute('app-shell.html', {
//   whitelist: [/./],
//   blacklist: [],
// });

/**
 * Requests for URLs that aren't precached can be handled by runtime caching.
 * Workbox has a flexible routing system, giving you control over which caching
 * strategies to use for which kind of requests.
 *
 * registerRoute() takes a RegExp or a string as its first parameter.
 *   - RegExps can match any part of the request URL.
 *   - Strings are Express-style routes, parsed by
 *     https://github.com/nightwolfz/path-to-regexp
 *
 * registerRoute() takes a caching strategy as its second parameter.
 * The built-in strategies are:
 *   - cacheFirst
 *   - cacheOnly
 *   - networkFirst
 *   - networkOnly
 *   - staleWhileRevalidate
 * Advice about which strategies to use for various assets can be found at
 * https://developers.google.com/web/fundamentals/instant-and-offline/offline-cookbook/
 *
 * Each strategy can be configured with additional options, controlling the
 * name of the cache that's used, cache expiration policies, which response
 * codes are considered valid (useful when you want to cache opaque responses)
 * and whether updates to previously cached responses should trigger a message
 * using the BroadcastChannel API.
 *
 * The following routes show this flexibility put to use.
 */

/**
 * Set up a route that will match any URL requested that ends in .txt.
 * Handle those requests using a network-first strategy.
 */
// workboxSW.router.registerRoute(
//     /\.txt$/,
//     workboxSW.strategies.networkFirst()
// );

/**
 * Set up a route that will match any URL requested that starts with
 * https://httpbin.org/delay/.
 * Handle those requests using a network-first strategy, but with a timeout.
 * If there's no network response before the timeout, then return the previous
 * response from the cache instead.
 */
// workboxSW.router.registerRoute(
//     'https://httpbin.org/delay/(.*)',
//     workboxSW.strategies.networkFirst({networkTimeoutSeconds: 3})
// );

/**
 * Set up a route that will match any URL requested that starts with
 * https://httpbin.org/image/.
 * Handle those requests using a cache-first strategy, storing them in a
 * dedicated cache named 'images'.
 * That cache has a maximum size of 2 entries,
 * and once that's reached, the least-recently used entry will be deleted.
 * Additionally, any entries older than 7 * 24 * 60 * 60 seconds (1 week) will
 * be deleted.
 * Because the image responses are cross-domain and don't use CORS, they will
 * be "opaque", and have a status code of 0. When using a cache-first strategy,
 * we need to explicitly opt-in to caching responses with a status of 0.
 */
// workboxSW.router.registerRoute(
//     '/img/(.*)',
//     workboxSW.strategies.cacheFirst({
//         cacheName: 'images',
//         cacheExpiration: {
//             maxEntries: 5,
//             maxAgeSeconds: 7 * 24 * 60 * 60,
//         },
//         cacheableResponse: {statuses: [0, 200]},
//     })
// );
//
//
// workboxSW.router.registerRoute(
//     '/pdfs/(.*)',
//     workboxSW.strategies.cacheFirst({
//         cacheName: 'pdfs',
//         cacheExpiration: {
//             maxEntries: 5,
//         },
//         cacheableResponse: {statuses: [0, 200]},
//     })
// );


// workboxSW.router.registerRoute(
//     '/index.php',
//     workboxSW.strategies.cacheFirst({
//         cacheName: 'php1',
//         cacheExpiration: {
//             maxEntries: 5,
//         },
//         cacheableResponse: {statuses: [0, 200]},
//     })
// );
//

/*
workboxSW.router.registerRoute(
    '/pj/(.*)',
    workboxSW.strategies.cacheFirst({
        cacheName: 'pjs',
        cacheExpiration: {
            maxEntries: 150,
        },
        cacheableResponse: {statuses: [0, 200]},
    })
);

workboxSW.router.registerRoute(
    '/documents/(.*)',
    workboxSW.strategies.cacheFirst({
        cacheName: 'docs',
        cacheExpiration: {
            maxEntries: 150,
        },
        cacheableResponse: {statuses: [0, 200]},
    })
);


workboxSW.router.registerRoute(
    '/vehicules/(.*)',
    workboxSW.strategies.cacheFirst({
        cacheName: 'vehs',
        cacheExpiration: {
            maxEntries: 15,
        },
        cacheableResponse: {statuses: [0, 200]},
    })
);

workboxSW.router.registerRoute(
    '/loginddd',
    workboxSW.strategies.networkOnly({
  })
);

workboxSW.router.registerRoute(
    '/dashboard',
    workboxSW.strategies.cacheFirst({
        cacheName: 'all',
        cacheExpiration: {
            maxEntries: 500,
        },
        cacheableResponse: {statuses: [0, 200]},
    })
);
*/



